<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status TA | Repositori UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --light-green: #89C99A; /* Hijau muda yang tidak cerah */
            --dark-green: #38761D;  /* Hijau gelap untuk aksen */
            --bg-color: #f8f9fa;    /* Warna latar belakang putih/abu-abu muda */
            --card-border: #e3e3e0; 
        }
        body {
            background-color: var(--bg-color);
        }
        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid var(--card-border);
        }
        .brand-text {
            color: var(--dark-green);
            font-weight: 700;
        }
        .main-container {
            max-width: 960px;
        }
        .status-card {
            border-left: 5px solid var(--light-green);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        }
        .timeline {
            list-style-type: none;
            position: relative;
            padding-left: 1.5rem;
        }
        .timeline:before {
            content: ' ';
            background: var(--card-border);
            display: inline-block;
            position: absolute;
            left: 20px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }
        .timeline-item {
            margin: 20px 0;
        }
        .timeline-item:before {
            content: ' ';
            background: var(--light-green);
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid white;
            left: 11px;
            width: 18px;
            height: 18px;
            z-index: 401;
        }
        .timeline-item-danger:before { background: #dc3545; }
        .timeline-item-warning:before { background: #ffc107; }
        .timeline-item-secondary:before { background: #6c757d; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid main-container">
            <a class="navbar-brand brand-text" href="#">
                <span class="d-none d-sm-inline">Repositori TA</span> UIN Suka
            </a>
            <div class="ms-auto d-flex align-items-center">
                <span class="navbar-text me-3 d-none d-md-inline">
                    Selamat Datang, **Nama Mahasiswa**!
                </span>
                <a href="/search-ta" class="btn btn-sm btn-outline-secondary me-2">Cari Judul</a>
                <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-5 main-container">

        <div class="card status-card mb-4">
            <div class="card-body p-4">
                <p class="text-muted mb-1">Judul yang Diajukan:</p>
                <h4 class="card-title" style="color: var(--dark-green);">
                    Rancang Bangun Sistem Informasi Manajemen Repositori Tugas Akhir
                </h4>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Status Saat Ini:</p>
                        {{-- Contoh Status: Sedang Ditinjau --}}
                        <h5 class="mb-0"><span class="badge bg-warning text-dark">Sedang Ditinjau Admin/Dospem</span></h5>
                        
                        {{-- Contoh Status: Disetujui --}}
                        </div>
                    <div>
                        {{-- Tombol ini hanya muncul jika status "Disetujui" --}}
                        <a href="/upload-dokumen" class="btn btn-custom-green">
                            <i class="bi bi-upload me-1"></i> Upload Dokumen
                        </a>
                     </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: #fff;">
                <h5 class="mb-0 header-text" style="color: var(--dark-green);">
                    <i class="bi bi-list-check me-2"></i>Riwayat Status Pengajuan
                </h5>
            </div>
            <div class="card-body p-4">
                <ul class="timeline">
                    <li class="timeline-item">
                        <strong>Judul Disetujui</strong>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            12 November 2025, 14:30
                        </p>
                        <p class="mb-0">Selamat! Judul Anda telah disetujui oleh Dosen Pembimbing. Anda dapat melanjutkan ke tahap proposal.</p>
                    </li>
                    
                    <li class="timeline-item timeline-item-danger">
                        <strong>Revisi Diperlukan</strong>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            10 November 2025, 10:00
                        </p>
                        <p class="mb-0">
                            **Catatan dari Dospem:** "Ruang lingkup terlalu luas. Mohon dipersempit pada studi kasus implementasi di Prodi Informatika saja."
                        </p>
                    </li>
                    
                    <li class="timeline-item timeline-item-warning">
                        <strong>Sedang Ditinjau Admin/Dospem</strong>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            9 November 2025, 16:00
                        </p>
                        <p class="mb-0">Judul Anda sedang dalam proses peninjauan oleh Admin dan Dosen Pembimbing.</p>
                    </li>
                    
                    <li class="timeline-item timeline-item-secondary">
                        <strong>Judul Diajukan</strong>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">
                            9 November 2025, 15:30
                        </p>
                        <p class="mb-0">Mahasiswa berhasil mengajukan judul.</p>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>