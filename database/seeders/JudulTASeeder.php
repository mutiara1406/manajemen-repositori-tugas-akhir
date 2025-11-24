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
                'abstrak_bahasa_indonesia' => 'Penelitian ini mengembangkan sistem informasi manajemen apotek berbasis web dengan fitur lengkap untuk pengelolaan stok obat, penjualan, dan pelaporan. Sistem dibangun menggunakan teknologi Laravel dengan database MySQL untuk meningkatkan efisiensi operasional apotek.',
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
                'abstrak_bahasa_indonesia' => 'Platform e-learning ini dirancang khusus untuk Sekolah Menengah Kejuruan (SMK) dengan fitur komprehensif seperti kuis interaktif, forum diskusi, dan sistem tracking progress siswa. Aplikasi dibangun menggunakan framework Laravel dan Vue.js untuk memberikan pengalaman pengguna yang responsif dan intuitif.',
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
                'abstrak_bahasa_indonesia' => 'Aplikasi mobile laundry ini menyediakan solusi pemesanan jasa laundry yang mudah dan cepat dengan integrasi pembayaran online melalui berbagai metode. Fitur real-time tracking memungkinkan pelanggan untuk memantau status pencucian pakaian mereka secara langsung.',
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
                'abstrak_bahasa_indonesia' => 'Penelitian ini menganalisis sentimen publik terhadap produk teknologi melalui data media sosial menggunakan Natural Language Processing (NLP). Studi ini mengumpulkan data dari Twitter dan Instagram, kemudian menganalisisnya dengan algoritma machine learning untuk memberikan insight tentang persepsi konsumen.',
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
                'abstrak_bahasa_indonesia' => 'Penelitian ini mengembangkan model CNN (Convolutional Neural Network) untuk mendeteksi dan mengklasifikasikan penyakit pada tanaman padi dengan akurasi tinggi. Sistem ini menggunakan dataset gambar padi yang sudah berlabel untuk melatih model dan mencapai akurasi lebih dari 95%.',
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
                'abstrak_bahasa_indonesia' => 'Penelitian ini mengimplementasikan chatbot cerdas berbasis NLP dan machine learning untuk meningkatkan layanan customer service. Chatbot ini dapat memahami pertanyaan pelanggan dalam bahasa alami dan memberikan respons yang relevan secara otomatis, meningkatkan efisiensi layanan.',
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
                'abstrak_bahasa_indonesia' => 'Sistem prediksi ini menggabungkan dua algoritma machine learning yaitu LSTM (Long Short-Term Memory) dan Random Forest untuk memprediksi harga saham dengan akurasi tinggi. Sistem ini membantu investor membuat keputusan investasi yang lebih baik berdasarkan analisis data historis.',
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
                'abstrak_bahasa_indonesia' => 'Framework testing otomatis ini dikembangkan menggunakan Selenium untuk meningkatkan efisiensi proses QA testing pada aplikasi web. Framework ini mendukung berbagai browser dan menyediakan reporting komprehensif untuk mempercepat identifikasi bug.',
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
                'abstrak_bahasa_indonesia' => 'Penelitian ini melakukan analisis mendalam tentang keamanan web application melalui penetration testing dan vulnerability assessment. Hasil penelitian memberikan rekomendasi security best practices untuk meningkatkan perlindungan terhadap serangan cyber.',
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
                'abstrak_bahasa_indonesia' => 'Implementasi sistem keamanan jaringan enterprise ini menggunakan firewall dan Intrusion Detection System (IDS) untuk monitoring real-time. Sistem dapat mendeteksi dan mencegah serangan jaringan dengan efektif sambil menjaga performa jaringan.',
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
                'abstrak_bahasa_indonesia' => 'Solusi cloud computing ini dirancang khusus untuk UMKM menggunakan Infrastructure as Code (IaC) dengan Terraform. Solusi ini memberikan skalabilitas dan fleksibilitas tinggi dengan biaya yang lebih efisien dibandingkan infrastruktur on-premise.',
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
                'abstrak_bahasa_indonesia' => 'Penelitian ini melakukan analisis perbandingan antara protokol MQTT dan CoAP untuk IoT network dengan fokus pada performa, konsumsi energi, dan keandalan. Hasil penelitian memberikan rekomendasi pemilihan protokol berdasarkan skenario penggunaan IoT yang berbeda.',
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
