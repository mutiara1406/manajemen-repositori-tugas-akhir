<?php

namespace Database\Seeders;

use App\Models\JudulTA;
use Illuminate\Database\Seeder;

class JudulTASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judulData = [
            // Sistem Informasi - Professional - 2024
            [
                'judul' => 'Sistem Informasi Manajemen Apotek Berbasis Web',
                'deskripsi' => 'Aplikasi web untuk pengelolaan data apotek dengan fitur inventori, penjualan, dan pelaporan',
                'peminatan' => 'sistem_informasi',
                'arah_profesi' => 'professional',
                'angkatan' => 2024,
                'nama_penulis' => 'Ahmad Rizki',
                'nim_penulis' => '20241001',
            ],
            // Sistem Informasi - Professional - 2023
            [
                'judul' => 'Platform E-Learning untuk SMK Menggunakan Laravel',
                'deskripsi' => 'Aplikasi pembelajaran online dengan fitur kuis, forum diskusi, dan tracking progress siswa',
                'peminatan' => 'sistem_informasi',
                'arah_profesi' => 'professional',
                'angkatan' => 2023,
                'nama_penulis' => 'Budi Santoso',
                'nim_penulis' => '20231002',
            ],
            // Sistem Informasi - Wirausaha - 2022
            [
                'judul' => 'Aplikasi Mobile untuk Pemesanan Laundry Berbasis Android',
                'deskripsi' => 'Sistem booking laundry dengan integrasi pembayaran online dan tracking real-time',
                'peminatan' => 'sistem_informasi',
                'arah_profesi' => 'wirausaha',
                'angkatan' => 2022,
                'nama_penulis' => 'Cindy Wijaya',
                'nim_penulis' => '20221003',
            ],
            // Sistem Informasi - Ilmuan - 2021
            [
                'judul' => 'Analisis Sentimen Media Sosial Terhadap Produk Teknologi',
                'deskripsi' => 'Penelitian menggunakan NLP untuk menganalisis ulasan produk dari Twitter dan Instagram',
                'peminatan' => 'sistem_informasi',
                'arah_profesi' => 'ilmuan',
                'angkatan' => 2021,
                'nama_penulis' => 'Dina Kusuma',
                'nim_penulis' => '20211004',
            ],
            // Sistem Cerdas - Ilmuan - 2024
            [
                'judul' => 'Klasifikasi Penyakit Tanaman Padi Menggunakan Deep Learning',
                'deskripsi' => 'Model CNN untuk deteksi dan klasifikasi penyakit pada tanaman padi dengan akurasi tinggi',
                'peminatan' => 'sistem_cerdas',
                'arah_profesi' => 'ilmuan',
                'angkatan' => 2024,
                'nama_penulis' => 'Siti Fatimah',
                'nim_penulis' => '20241005',
            ],
            // Sistem Cerdas - Professional - 2023
            [
                'judul' => 'Chatbot Cerdas untuk Customer Service Menggunakan NLP',
                'deskripsi' => 'Implementasi chatbot berbasis machine learning untuk menangani pertanyaan pelanggan otomatis',
                'peminatan' => 'sistem_cerdas',
                'arah_profesi' => 'professional',
                'angkatan' => 2023,
                'nama_penulis' => 'Eka Pratama',
                'nim_penulis' => '20231006',
            ],
            // Sistem Cerdas - Wirausaha - 2022
            [
                'judul' => 'Prediksi Harga Saham Menggunakan LSTM dan Random Forest',
                'deskripsi' => 'Sistem prediksi pasar saham dengan kombinasi machine learning untuk keputusan investasi',
                'peminatan' => 'sistem_cerdas',
                'arah_profesi' => 'wirausaha',
                'angkatan' => 2022,
                'nama_penulis' => 'Fahmi Riyadi',
                'nim_penulis' => '20221007',
            ],
            // Rekayasa Perangkat Lunak - Professional - 2024
            [
                'judul' => 'Framework Testing Otomatis untuk Aplikasi Web Berbasis Selenium',
                'deskripsi' => 'Pengembangan framework QA testing untuk meningkatkan efisiensi testing di industri',
                'peminatan' => 'rekayasa_perangkat_lunak',
                'arah_profesi' => 'professional',
                'angkatan' => 2024,
                'nama_penulis' => 'Galih Hermawan',
                'nim_penulis' => '20241008',
            ],
            // Rekayasa Perangkat Lunak - Ilmuan - 2023
            [
                'judul' => 'Analisis Keamanan dan Vulnerability Assessment pada Web Application',
                'deskripsi' => 'Penelitian tentang penetration testing dan security best practices untuk aplikasi web',
                'peminatan' => 'rekayasa_perangkat_lunak',
                'arah_profesi' => 'ilmuan',
                'angkatan' => 2023,
                'nama_penulis' => 'Hendra Suryanto',
                'nim_penulis' => '20231009',
            ],
            // Jaringan Komputer - Professional - 2022
            [
                'judul' => 'Implementasi Network Security Menggunakan Firewall dan IDS',
                'deskripsi' => 'Studi implementasi sistem keamanan jaringan enterprise dengan monitoring real-time',
                'peminatan' => 'jaringan_komputer',
                'arah_profesi' => 'professional',
                'angkatan' => 2022,
                'nama_penulis' => 'Indah Permatasari',
                'nim_penulis' => '20221010',
            ],
            // Jaringan Komputer - Wirausaha - 2021
            [
                'judul' => 'Solusi Cloud Computing untuk UMKM Dengan Infrastructure as Code',
                'deskripsi' => 'Implementasi cloud infrastructure menggunakan Terraform untuk skalabilitas bisnis',
                'peminatan' => 'jaringan_komputer',
                'arah_profesi' => 'wirausaha',
                'angkatan' => 2021,
                'nama_penulis' => 'Joko Supriyanto',
                'nim_penulis' => '20211011',
            ],
            // Jaringan Komputer - Ilmuan - 2020
            [
                'judul' => 'Analisis Performa dan Optimasi Protokol Komunikasi pada IoT Network',
                'deskripsi' => 'Penelitian tentang protokol MQTT vs CoAP untuk IoT dengan evaluasi performa',
                'peminatan' => 'jaringan_komputer',
                'arah_profesi' => 'ilmuan',
                'angkatan' => 2020,
                'nama_penulis' => 'Kusuma Wijaya',
                'nim_penulis' => '20201012',
            ],
        ];

        foreach ($judulData as $data) {
            JudulTA::create($data);
        }
    }
}
