<?php

namespace App\Http\Controllers;

use App\Models\JudulTA;
use App\Models\PengajuanJudul;
use App\Models\ChatKonsultasi;
use App\Models\DokumentasiTA;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Tampilkan halaman pengajuan judul dengan 4 tab
     */
    public function index(Request $request)
    {
        // Tab 1: Kumpulan Judul
        $peminatan = $request->get('peminatan', 'semua');
        $arahProfesi = $request->get('arah_profesi', 'semua');
        $angkatan = $request->get('angkatan', null);
        $search = $request->get('search', '');

        // Check apakah ada filter atau search yang aktif
        $hasFilter = $search || ($peminatan !== 'semua') || ($arahProfesi !== 'semua') || $angkatan;

        $judulQuery = JudulTA::query();

        // Hanya tampilkan hasil jika ada filter atau search
        if ($hasFilter) {
            // Search filter
            if ($search) {
                $judulQuery->where(function($q) use ($search) {
                    $q->where('judul', 'LIKE', '%' . $search . '%')
                      ->orWhere('abstrak_bahasa_indonesia', 'LIKE', '%' . $search . '%')
                      ->orWhere('deskripsi', 'LIKE', '%' . $search . '%')
                      ->orWhere('nama_penulis', 'LIKE', '%' . $search . '%');
                });
            }

            if ($peminatan !== 'semua') {
                $judulQuery->where('peminatan', $peminatan);
            }
            if ($arahProfesi !== 'semua') {
                $judulQuery->where('arah_profesi', $arahProfesi);
            }
            if ($angkatan) {
                $judulQuery->where('angkatan', $angkatan);
            }

            $judulList = $judulQuery->paginate(10);
        } else {
            // Jika tidak ada filter, tampilkan collection kosong
            $judulList = collect([]);
        }

        $daftarAngkatan = JudulTA::distinct()->pluck('angkatan')->sort();

        // Tab 3: Chat Konsultasi (ambil history chat user saat ini)
        $chatHistory = auth()->check() 
            ? ChatKonsultasi::where('mahasiswa_id', auth()->id())->latest()->paginate(20)
            : [];

        // Tab 4: Dokumentasi TA
        $dokumentasiQuery = DokumentasiTA::query();
        if ($peminatan !== 'semua') {
            $dokumentasiQuery->where('peminatan', $peminatan);
        }
        $dokumentasiList = $dokumentasiQuery->paginate(10);

        return view('pengajuan_judul', [
            'judulList' => $judulList,
            'daftarAngkatan' => $daftarAngkatan,
            'chatHistory' => $chatHistory,
            'dokumentasiList' => $dokumentasiList,
            'peminatan' => $peminatan,
            'arahProfesi' => $arahProfesi,
            'hasFilter' => $hasFilter,
        ]);
    }

    /**
     * Handle pengajuan judul baru (Tab 2 - Form Submit)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim_mahasiswa' => 'required|string|max:20',
            'judul' => 'required|string|max:255',
            'peminatan' => 'required|in:sistem_informasi,sistem_cerdas,rekayasa_perangkat_lunak,jaringan_komputer',
            'arah_profesi' => 'required|in:ilmuan,wirausaha,professional',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        PengajuanJudul::create($validated);

        return redirect('/pengajuan-judul')->with('success', 'Pengajuan judul berhasil dikirim! Menunggu approval admin.');
    }

    /**
     * Handle pengiriman pesan konsultasi (Tab 3 - Chat Submit)
     */
    public function sendChat(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:users,id',
            'pesan' => 'required|string|max:1000',
            'file_attachment' => 'nullable|file',
        ]);

        $fileAttachmentPath = null;
        if ($request->hasFile('file_attachment')) {
            $fileAttachmentPath = $request->file('file_attachment')->store('chat_attachments', 'public');
        }

        ChatKonsultasi::create([
            'mahasiswa_id' => auth()->id(),
            'dosen_id' => $validated['dosen_id'],
            'pesan' => $validated['pesan'],
            'file_attachment' => $fileAttachmentPath,
            'pengirim' => 'mahasiswa',
        ]);

        return redirect('/pengajuan-judul#konsultasi')->with('success', 'Pesan konsultasi berhasil dikirim!');
    }

    /**
     * Filter data (untuk AJAX jika diperlukan)
     */
    public function filter(Request $request)
    {
        $peminatan = $request->get('peminatan', 'semua');
        $arahProfesi = $request->get('arah_profesi', 'semua');
        $angkatan = $request->get('angkatan', null);

        $judulQuery = JudulTA::query();

        if ($peminatan !== 'semua') {
            $judulQuery->where('peminatan', $peminatan);
        }
        if ($arahProfesi !== 'semua') {
            $judulQuery->where('arah_profesi', $arahProfesi);
        }
        if ($angkatan) {
            $judulQuery->where('angkatan', $angkatan);
        }

        $judulList = $judulQuery->paginate(10);

        return response()->json($judulList);
    }

    /**
     * Store dokumentasi TA baru (Tab 4 - Dokumentasi Submit)
     */
    public function storeDokumentasi(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'nama_penulis' => 'required|string|max:255',
            'nim_penulis' => 'required|string|max:20',
            'jenis_ta' => 'required|in:Skripsi,Thesis,Disertasi',
            'dosen_pembimbing' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'peminatan' => 'required|in:sistem_informasi,sistem_cerdas,rekayasa_perangkat_lunak,jaringan_komputer',
            'abstrak_bahasa_indonesia' => 'required|string',
            'abstrak_bahasa_inggris' => 'required|string',
            'file_skripsi' => 'nullable|file|mimes:pdf',
            'file_pengesahan' => 'nullable|file|mimes:pdf',
        ]);

        // Handle file uploads
        if ($request->hasFile('file_skripsi')) {
            $filePath = $request->file('file_skripsi')->store('dokumentasi', 'public');
            $validated['file_skripsi_full_text'] = $filePath;
        }

        if ($request->hasFile('file_pengesahan')) {
            $filePath = $request->file('file_pengesahan')->store('dokumentasi', 'public');
            $validated['file_lembar_pengesahan'] = $filePath;
        }

        $validated['date_deposited'] = now();
        $validated['last_modified'] = now();
        $validated['tahun_selesai'] = now()->year;

        DokumentasiTA::create($validated);

        return redirect('/pengajuan-judul#dokumentasi')->with('success', 'Dokumentasi TA berhasil disimpan!');
    }
}
