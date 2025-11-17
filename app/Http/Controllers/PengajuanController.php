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
        ]);

        ChatKonsultasi::create([
            'mahasiswa_id' => auth()->id(),
            'dosen_id' => $validated['dosen_id'],
            'pesan' => $validated['pesan'],
            'pengirim' => 'mahasiswa',
        ]);

        return redirect('/pengajuan-judul')->with('success', 'Pesan konsultasi berhasil dikirim!');
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
}
