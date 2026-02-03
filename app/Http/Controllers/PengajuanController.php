<?php

namespace App\Http\Controllers;

use App\Models\JudulTA;
use App\Models\PengajuanJudul;
use App\Models\ChatKonsultasi;
use App\Models\DokumentasiTA;
use App\Models\ProgresBimbingan;
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

        // Count unread messages from dosen
        $unreadChatCount = auth()->check()
            ? ChatKonsultasi::where('mahasiswa_id', auth()->id())
                ->where('pengirim', 'dosen')
                ->where('is_read', false)
                ->count()
            : 0;

        // Tab 4: Dokumentasi TA
        $dokumentasiQuery = DokumentasiTA::query();
        if ($peminatan !== 'semua') {
            $dokumentasiQuery->where('peminatan', $peminatan);
        }
        $dokumentasiList = $dokumentasiQuery->paginate(10);

        // Tab 5: Progres Bimbingan
        $mahasiswaId = auth()->id() ?? 1;
        $progresBimbinganList = ProgresBimbingan::where('mahasiswa_id', $mahasiswaId)
            ->with('dosen')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pengajuan_judul', [
            'judulList' => $judulList,
            'daftarAngkatan' => $daftarAngkatan,
            'chatHistory' => $chatHistory,
            'unreadChatCount' => $unreadChatCount,
            'dokumentasiList' => $dokumentasiList,
            'progresBimbinganList' => $progresBimbinganList,
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
            'judul' => 'required|string|max:255',
            'file' => 'required|file',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('pengajuan_judul', 'public');
        }

        // Get user info (if authenticated)
        $userData = [
            'nama_mahasiswa' => auth()->user()->name ?? 'Anonymous',
            'nim_mahasiswa' => auth()->user()->email ?? 'N/A',
            'judul' => $validated['judul'],
            'peminatan' => 'umum',
            'user_id' => auth()->id(),
            'status' => 'pending',
            'file_path' => $filePath,
        ];

        PengajuanJudul::create($userData);

        return redirect('/pengajuan-judul')->with('success', 'Pengajuan judul berhasil dikirim! File akan diproses oleh admin.');
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

        // Gunakan auth()->id() jika login, atau default ke ID 1 untuk development
        $mahasiswaId = auth()->id() ?? 1;

        ChatKonsultasi::create([
            'mahasiswa_id' => $mahasiswaId,
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

    /**
     * Mark all chat messages as read
     */
    public function markChatAsRead()
    {
        if (auth()->check()) {
            ChatKonsultasi::where('mahasiswa_id', auth()->id())
                ->where('pengirim', 'dosen')
                ->where('is_read', false)
                ->update(['is_read' => true]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Store new progress bimbingan (Tab 5 - Progres Submit)
     */
    public function storeProgresBimbingan(Request $request)
    {
        $validated = $request->validate([
            'kategori_progres' => 'required|string|in:proposal,bab1,bab2,bab3,bab4,bab5,revisi,lainnya',
            'deskripsi_progres' => 'required|string',
            'file_progres' => 'required|array|min:1',
            'file_progres.*' => 'file|max:51200', // 50MB max per file
            'dosen_id' => 'required|integer',
        ]);

        // Generate judul from kategori
        $kategoriLabels = [
            'proposal' => 'Proposal',
            'bab1' => 'BAB 1 - Pendahuluan',
            'bab2' => 'BAB 2 - Tinjauan Pustaka',
            'bab3' => 'BAB 3 - Metodologi',
            'bab4' => 'BAB 4 - Hasil & Pembahasan',
            'bab5' => 'BAB 5 - Penutup',
            'revisi' => 'Revisi',
            'lainnya' => 'Lainnya',
        ];
        $judul = $kategoriLabels[$validated['kategori_progres']] ?? $validated['kategori_progres'];

        // Handle multiple file uploads
        $filePaths = [];
        if ($request->hasFile('file_progres')) {
            foreach ($request->file('file_progres') as $file) {
                $path = $file->store('progres_bimbingan', 'public');
                $filePaths[] = [
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension(),
                ];
            }
        }

        // Create progress record
        $mahasiswaId = auth()->id() ?? 1;
        
        ProgresBimbingan::create([
            'mahasiswa_id' => $mahasiswaId,
            'dosen_id' => $validated['dosen_id'],
            'judul' => $judul,
            'kategori' => $validated['kategori_progres'],
            'deskripsi' => $validated['deskripsi_progres'],
            'files' => $filePaths,
            'status' => 'pending',
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Progres bimbingan berhasil dikirim ke dosen pembimbing!'
            ]);
        }

        return redirect('/pengajuan-judul#progres-bimbingan')->with('success', 'Progres bimbingan berhasil dikirim!');
    }

    /**
     * Get all progress bimbingan for current user
     */
    public function getProgresBimbingan(Request $request)
    {
        $mahasiswaId = auth()->id() ?? 1;
        
        $progresList = ProgresBimbingan::where('mahasiswa_id', $mahasiswaId)
            ->with('dosen')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json($progresList);
        }

        return $progresList;
    }

    /**
     * Submit feedback from dosen for a progress
     */
    public function submitFeedback(Request $request, $id)
    {
        $validated = $request->validate([
            'feedback' => 'required|string',
        ]);

        $progres = ProgresBimbingan::findOrFail($id);
        
        $progres->update([
            'feedback' => $validated['feedback'],
            'status' => 'reviewed',
            'feedback_at' => now(),
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Feedback berhasil dikirim!'
            ]);
        }

        return redirect()->back()->with('success', 'Feedback berhasil dikirim!');
    }
}
