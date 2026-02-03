<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProgresBimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    /**
     * Display dosen dashboard
     */
    public function dashboard()
    {
        // Data dummy untuk development (tanpa login)
        $dosen = (object) [
            'id' => 1,
            'name' => 'Dr. Ahmad Fauzi, M.Kom',
            'nip' => '198505152010011001',
            'email' => 'ahmad.fauzi@uin-suka.ac.id',
            'role' => 'dosen',
        ];
        
        // Data dummy mahasiswa bimbingan
        $mahasiswaBimbingan = collect([
            (object) [
                'id' => 1,
                'name' => 'Mutiara Hasibuan',
                'nim' => '22106050070',
                'judul_ta' => 'Implementasi Machine Learning untuk Prediksi Kelulusan Mahasiswa',
                'progress' => 45,
                'tahap_ta' => 'bab2',
                'status_ta' => 'aktif',
                'updated_at' => now()->subDays(2),
            ],
            (object) [
                'id' => 2,
                'name' => 'Budi Santoso',
                'nim' => '21106050001',
                'judul_ta' => 'Sistem Informasi Manajemen Perpustakaan Berbasis Web',
                'progress' => 70,
                'tahap_ta' => 'bab4',
                'status_ta' => 'aktif',
                'updated_at' => now()->subDays(1),
            ],
            (object) [
                'id' => 3,
                'name' => 'Dewi Lestari',
                'nim' => '21106050015',
                'judul_ta' => 'Analisis Sentimen Media Sosial Menggunakan Deep Learning',
                'progress' => 25,
                'tahap_ta' => 'bab1',
                'status_ta' => 'aktif',
                'updated_at' => now()->subHours(5),
            ],
            (object) [
                'id' => 4,
                'name' => 'Rizky Pratama',
                'nim' => '20106050022',
                'judul_ta' => 'Pengembangan Aplikasi E-Commerce dengan Framework Laravel',
                'progress' => 100,
                'tahap_ta' => 'selesai',
                'status_ta' => 'selesai',
                'updated_at' => now()->subWeek(),
            ],
            (object) [
                'id' => 5,
                'name' => 'Siti Rahma',
                'nim' => '22106050033',
                'judul_ta' => 'Aplikasi Pendeteksi Penyakit Tanaman Berbasis Android',
                'progress' => 10,
                'tahap_ta' => 'proposal',
                'status_ta' => 'pending',
                'updated_at' => now()->subDays(3),
            ],
        ]);
        
        // Get progres bimbingan from database
        $progresBimbingan = ProgresBimbingan::with(['mahasiswa', 'dosen'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Count pending progres
        $pendingProgresCount = ProgresBimbingan::where('status', 'pending')->count();
        
        // Statistics for dashboard
        $menungguReview = $pendingProgresCount;
        $chatBelumDibaca = 0; // TODO: Implement unread chat count
        $mahasiswaSelesai = $mahasiswaBimbingan->where('status_ta', 'selesai')->count();

        return view('dosen.dashboard', compact(
            'mahasiswaBimbingan', 
            'dosen', 
            'progresBimbingan', 
            'pendingProgresCount',
            'menungguReview',
            'chatBelumDibaca',
            'mahasiswaSelesai'
        ));
    }

    /**
     * Get detail mahasiswa
     */
    public function detailMahasiswa($id)
    {
        $mahasiswa = User::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ]);
    }

    /**
     * Update progress mahasiswa
     */
    public function updateProgress(Request $request, $id)
    {
        $request->validate([
            'progress' => 'required|integer|min:0|max:100',
            'tahap_ta' => 'required|string',
            'catatan' => 'nullable|string'
        ]);

        $mahasiswa = User::findOrFail($id);
        $mahasiswa->update([
            'progress' => $request->progress,
            'tahap_ta' => $request->tahap_ta,
        ]);

        return redirect()->back()->with('success', 'Progress mahasiswa berhasil diupdate.');
    }
}
