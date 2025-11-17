<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen | Repositori UIN Suka</title>
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
        .form-control:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.25rem rgba(137, 201, 154, 0.25);
        }
        .btn-custom-green {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: #ffffff;
            font-weight: 500;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-custom-green:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: #ffffff;
        }
        .upload-card {
            border: 1px dashed var(--card-border);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .upload-card:hover {
            border-color: var(--light-green);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .file-status {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 10px 15px;
            font-size: 0.9rem;
        }
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
                <a href="/status-ta" class="btn btn-sm btn-outline-secondary me-2">Status TA</a>
                <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-5 main-container">

        <h3 class="mb-4" style="color: var(--dark-green);">
            <i class="bi bi-file-earmark-arrow-up me-2"></i>Manajemen Dokumen Tugas Akhir
        </h3>
        
        <div class="alert alert-success" style="background-color: #e7f5e9; border-color: #d1ebd5;">
            <h5 class="alert-heading" style="color: var(--dark-green);">Judul Anda Telah Disetujui!</h5>
            <p class="mb-0">"Rancang Bangun Sistem Informasi Manajemen Repositori Tugas Akhir"</p>
            <hr>
            <p class="mb-0" style="font-size: 0.9rem;">
                Silakan unggah dokumen yang diperlukan pada slot di bawah ini.
            </p>
        </div>

        <div class="card upload-card mb-4">
            <div class="card-body p-4">
                <h5 class="card-title" style="color: var(--dark-green);">1. Proposal / Business Plan</h5>
                <p class="card-text text-muted" style="font-size: 0.9rem;">
                    Unggah file Proposal, Laporan Proyek, atau Business Plan Anda yang telah disetujui. (Format: .pdf)
                </p>
                
                <div class="file-status d-flex justify-content-between align-items-center mb-3">
                    <span>
                        <i class="bi bi-file-earmark-check-fill text-success me-2"></i>
                        proposal_final_disetujui.pdf (2.4 MB)
                    </span>
                    <span class="badge bg-success">Sudah Diunggah</span>
                </div>
                <form method="POST" action="/upload-proposal" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="file" class="form-control" id="file_proposal" name="file_proposal" required>
                        <button class="btn btn-custom-green" type="submit">
                            <i class="bi bi-upload me-1"></i> Ganti/Unggah
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card upload-card mb-4">
            <div class="card-body p-4">
                <h5 class="card-title" style="color: var(--dark-green);">2. Dokumen Final (Skripsi / Laporan TA)</h5>
                <p class="card-text text-muted" style="font-size: 0.9rem;">
                    Unggah dokumen Skripsi atau Laporan Akhir Anda yang sudah di-ACC. (Format: .pdf)
                </p>

                <div class="file-status d-flex justify-content-between align-items-center mb-3">
                    <span>
                        <i class="bi bi-file-earmark-excel-fill text-danger me-2"></i>
                        Belum ada file yang diunggah.
                    </span>
                    <span class="badge bg-secondary">Kosong</span>
                </div>

                <form method="POST" action="/upload-final" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="file" class="form-control" id="file_final" name="file_final" required>
                        <button class="btn btn-custom-green" type="submit">
                            <i class="bi bi-upload me-1"></i> Unggah
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card upload-card mb-4">
            <div class="card-body p-4">
                <h5 class="card-title" style="color: var(--dark-green);">3. Resource Tambahan (Opsional)</h5>
                <p class="card-text text-muted" style="font-size: 0.9rem;">
                    Masukkan link GitHub untuk kode program, atau unggah file .zip berisi data pendukung (perhitungan, desain sistem, dll).
                </p>

                <form method="POST" action="/upload-resource">
                    @csrf
                    <label for="github_link" class="form-label">Link GitHub/GitLab (jika ada)</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-github"></i></span>
                        <input type="url" class="form-control" id="github_link" name="github_link" 
                               placeholder="https://github.com/username/repo">
                    </div>

                    <label for="file_zip" class="form-label">File Lampiran (Format: .zip, .rar)</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="file_zip" name="file_zip" accept=".zip,.rar">
                    </div>
                    
                    <button class="btn btn-custom-green mt-3" type="submit">
                        <i class="bi bi-save me-1"></i> Simpan Resource
                    </button>
                </form>
            </div>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>