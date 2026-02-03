<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat akun Admin
        $admin = User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@uin-suka.ac.id',
            'nip' => '199001012020011001',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat akun Dosen 1
        $dosen1 = User::create([
            'name' => 'Dr. Ahmad Fauzi, M.Kom',
            'username' => 'ahmadfauzi',
            'email' => 'ahmad.fauzi@uin-suka.ac.id',
            'nip' => '198505152010011001',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        // Buat akun Dosen 2
        $dosen2 = User::create([
            'name' => 'Dr. Siti Aminah, M.T',
            'username' => 'sitiaminah',
            'email' => 'siti.aminah@uin-suka.ac.id',
            'nip' => '198703202012012001',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        // Buat akun Mahasiswa 1
        User::create([
            'name' => 'Mutiara Hasibuan',
            'username' => 'mutiara',
            'email' => 'mutiara@student.uin-suka.ac.id',
            'nim' => '22106050070',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
            'dosen_pembimbing_id' => $dosen1->id,
            'judul_ta' => 'Implementasi Machine Learning untuk Prediksi Kelulusan Mahasiswa',
            'progress' => 45,
            'tahap_ta' => 'bab2',
            'status_ta' => 'aktif',
        ]);

        // Buat akun Mahasiswa 2
        User::create([
            'name' => 'Budi Santoso',
            'username' => 'budi',
            'email' => 'budi@student.uin-suka.ac.id',
            'nim' => '21106050001',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
            'dosen_pembimbing_id' => $dosen1->id,
            'judul_ta' => 'Sistem Informasi Manajemen Perpustakaan Berbasis Web',
            'progress' => 70,
            'tahap_ta' => 'bab4',
            'status_ta' => 'aktif',
        ]);

        // Buat akun Mahasiswa 3
        User::create([
            'name' => 'Dewi Lestari',
            'username' => 'dewi',
            'email' => 'dewi@student.uin-suka.ac.id',
            'nim' => '21106050015',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
            'dosen_pembimbing_id' => $dosen2->id,
            'judul_ta' => 'Analisis Sentimen Media Sosial Menggunakan Deep Learning',
            'progress' => 25,
            'tahap_ta' => 'bab1',
            'status_ta' => 'aktif',
        ]);

        // Buat akun Mahasiswa 4
        User::create([
            'name' => 'Rizky Pratama',
            'username' => 'rizky',
            'email' => 'rizky@student.uin-suka.ac.id',
            'nim' => '20106050022',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
            'dosen_pembimbing_id' => $dosen1->id,
            'judul_ta' => 'Pengembangan Aplikasi E-Commerce dengan Framework Laravel',
            'progress' => 100,
            'tahap_ta' => 'selesai',
            'status_ta' => 'selesai',
        ]);

        // Panggil seeder judul TA
        $this->call([
            JudulTASeeder::class,
        ]);
    }
}
