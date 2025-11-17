<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Judul TA | Repositori UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --light-green: #89C99A; /* Hijau muda yang tidak cerah */
            --dark-green: #38761D;  /* Hijau gelap untuk aksen */
            --bg-color: #f8f9fa;    /* Warna latar belakang putih/abu-abu muda */
            --card-border: #e3e3e0; /* Border kartu */
        }
        body {
            background-color: var(--bg-color);
            min-height: 100vh;
        }
        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid var(--card-border);
        }
        .brand-text {
            color: var(--dark-green);
            font-weight: 700;
        }
        .search-container {
            max-width: 900px;
        }
        .form-control:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.25rem rgba(137, 201, 154, 0.25);
        }
        .btn-search {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: #ffffff;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-search:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: #ffffff;
        }
        .result-card {
            border-left: 5px solid var(--light-green);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .result-title {
            color: var(--dark-green);
            font-weight: 600;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid search-container">
            <a class="navbar-brand brand-text" href="#">
                <span class="d-none d-sm-inline">Repositori TA</span> UIN Suka
            </a>
            <div class="ms-auto d-flex align-items-center">
                {{-- Tombol untuk Mahasiswa --}}
                <a href="/login" class="btn btn-sm btn-outline-secondary me-2">Login</a>
                <a href="/pengajuan-judul" class="btn btn-sm btn-search">Ajukan Judul TA</a>
            </div>
        </div>
    </nav>

    <div class="container py-5 search-container">
        <h2 class="text-center mb-4 header-text">Cari Ide dan Referensi Tugas Akhir</h2>
        
        <form class="mb-5">
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" name="query" 
                       placeholder="Masukkan kata kunci (misalnya: 'Machine Learning', 'Sistem Informasi Akademik', 'BPMN')" 
                       aria-label="Cari Judul TA" required>
                <button class="btn btn-search" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.085.122l3.02 3.02a1 1 0 0 0 1.415-1.415l-3.02-3.02a.98.98 0 0 0-.122-.085m-5.44.896a5.5 5.5 0 1 1 10.999 0 5.5 5.5 0 0 1-10.999 0z"/>
                    </svg>
                    Cari
                </button>
            </div>
            <div class="mt-2 text-muted text-center" style="font-size: 0.85rem;">
                Anda dapat mencari berdasarkan Judul, Nama Mahasiswa, atau Kata Kunci.
            </div>
        </form>

        <div id="results">
            <h5 class="header-text mb-3">Hasil Pencarian untuk "Sistem Informasi" (Contoh)</h5>
            
            <div class="card mb-3 p-3 result-card">
                <div class="card-body">
                    <h6 class="result-title">Sistem Informasi Manajemen Repositori Tugas Akhir Mahasiswa Menggunakan Metode Waterfall</h6>
                    <p class="card-text mb-1" style="font-size: 0.9rem;">
                        **Penulis:** (Mahasiswa/Admin) | **Tahun:** 2025 | **Status:** Selesai | **Metode:** Waterfall
                    </p>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">
                        **Rekomendasi Sistem:** Proposal TA Anda sudah memiliki referensi yang kuat. Fokus pada studi kasus yang berbeda atau penambahan fitur modern (misalnya AI Proofreading) untuk memperbarui topik.
                    </p>
                </div>
            </div>

            <div class="card mb-3 p-3 result-card">
                <div class="card-body">
                    <h6 class="result-title">Rancang Bangun Sistem Informasi Perpustakaan Digital Berbasis Web Semantik</h6>
                    <p class="card-text mb-1" style="font-size: 0.9rem;">
                        **Penulis:** N. Wibowo | **Tahun:** 2020 | **Status:** Selesai | **Metode:** MDD
                    </p>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">
                        **Rekomendasi Sistem:** Topik ini relevan. Anda bisa mempertimbangkan penggunaan *framework* yang lebih baru (misalnya Laravel 12) atau fokus pada integrasi sistem ini dengan modul akademik lain (misalnya Sistem Informasi Nilai).
                    </p>
                </div>
            </div>

            <div class="card mb-3 p-3 bg-light" style="border: 1px solid var(--light-green);">
                <div class="card-body">
                    <h6 class="result-title">Saran Awal Topik (Fitur Rekomendasi Judul Otomatis)</h6>
                    <p class="card-text mb-1" style="font-size: 0.9rem;">
                        Jika Anda belum memiliki judul, sistem menyarankan beberapa topik terkait "Sistem Informasi":
                    </p>
                    <ul class="list-unstyled mb-0" style="font-size: 0.85rem;">
                        <li>• Implementasi Microservices untuk Layanan Akademik.</li>
                        <li>• Analisis Kebutuhan Sistem E-Learning Adaptif.</li>
                        <li>• Perancangan UI/UX Sistem Informasi Pengajuan Proposal TA.</li>
                    </ul>
                    <p class="text-secondary mt-2 mb-0" style="font-size: 0.8rem;">
                        *Disclaimer: Rekomendasi ini bukan keputusan mutlak, tetap konsultasikan dengan Dosen Pembimbing Anda.*
                    </p>
                </div>
            </div>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>