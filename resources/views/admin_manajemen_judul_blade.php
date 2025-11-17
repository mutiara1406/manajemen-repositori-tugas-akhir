<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Judul | Repositori UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --light-green: #89C99A; /* Hijau muda yang tidak cerah */
            --dark-green: #38761D;  /* Hijau gelap untuk aksen */
            --bg-color: #f8f9fa;    /* Warna latar belakang putih/abu-abu muda */
        }
        body {
            background-color: var(--bg-color);
        }
        /* Layout Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #ffffff;
            border-right: 1px solid #e3e3e0;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .main-content {
            margin-left: 250px; /* Lebar sidebar */
            padding: 30px;
        }
        .sidebar-header {
            padding: 0 20px 20px 20px;
            border-bottom: 1px solid #e3e3e0;
        }
        .sidebar-header .brand-text {
            color: var(--dark-green);
            font-weight: 700;
            font-size: 1.2rem;
        }
        .sidebar .nav-link {
            color: #555;
            font-weight: 500;
            padding: 10px 20px;
        }
        .sidebar .nav-link.active {
            color: var(--dark-green);
            background-color: #e7f5e9;
            border-left: 4px solid var(--light-green);
            padding-left: 16px; /* 20px - 4px */
        }
        .sidebar .nav-link:hover {
            background-color: #f1f1f1;
        }
        .btn-custom-green {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: #ffffff;
        }
        .btn-custom-green:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: #ffffff;
        }
        .form-control:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.25rem rgba(137, 201, 154, 0.25);
        }
    </style>
</head>
<body>

    <nav class="sidebar">
        <div class="sidebar-header text-center">
            <a class="brand-text" href="#">
                <i class="bi bi-shield-lock me-2"></i>Admin Repositori
            </a>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/admin-dashboard">
                    <i class="bi bi-grid-fill me-2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/manajemen-judul">
                    <i class="bi bi-card-checklist me-2"></i>Manajemen Judul
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/manajemen-dokumen">
                    <i class="bi bi-file-earmark-bar-graph-fill me-2"></i>Manajemen Dokumen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/manajemen-mahasiswa">
                    <i class="bi bi-people-fill me-2"></i>Manajemen Mahasiswa
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link text-danger" href="/logout">
                    <i class="bi bi-box-arrow-left me-2"></i>Logout
                </a>
            </li>
        </ul>
    </nav>

    <main class="main-content">
        <h3 style="color: var(--dark-green);">Manajemen Pengajuan Judul TA</h3>
        <p class="text-muted">Setujui, tolak, atau edit judul yang diajukan oleh mahasiswa.</p>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-7">
                        <label for="search" class="form-label">Cari Nama / NIM / Judul</label>
                        <input type="text" class="form-control" id="search" 
                               placeholder="Ketikkan nama mahasiswa, NIM, atau kata kunci judul...">
                    </div>
                    <div class="col-md-3">
                        <label for="filter_status" class="form-label">Filter Status</label>
                        <select id="filter_status" class="form-select">
                            <option value="pending" selected>Menunggu Persetujuan (3)</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                            <option value="all">Tampilkan Semua</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-custom-green w-100"><i class="bi bi-search me-1"></i> Cari</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Mahasiswa (NIM)</th>
                                <th scope="col">Judul Diajukan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ahmad Kurniawan<br><small class="text-muted">21105011001</small></td>
                                <td>Rancang Bangun Sistem Informasi... (Judul Anda)</td>
                                <td>17 Nov 2025</td>
                                <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                        <i class="bi bi-search me-1"></i> Review
                                    </button>
                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="bi bi-pencil-fill me-1"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Budi Santoso<br><small class="text-muted">20105011020</small></td>
                                <td>Implementasi Algoritma...</td>
                                <td>15 Nov 2025</td>
                                <td><span class="badge bg-success">Disetujui</span></td>
                                <td class="text-center">
                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="bi bi-pencil-fill me-1"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Citra Lestari<br><small class="text-muted">21105011015</small></td>
                                <div>Analisis Sentimen...</div>
                                <td>14 Nov 2025</td>
                                <td><span class="badge bg-danger">Ditolak</span></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                        <i class="bi bi-search me-1"></i> Review
                                    </button>
                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="bi bi-pencil-fill me-1"></i> Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel" style="color: var(--dark-green);">
                        <i class="bi bi-search me-2"></i>Review Pengajuan Judul
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Mahasiswa:</h6>
                    <p>Ahmad Kurniawan (21105011001)</p>
                    
                    <h6>Judul Diajukan:</h6>
                    <p>Rancang Bangun Sistem Informasi Manajemen Repositori Tugas Akhir Mahasiswa Menggunakan Metode Waterfall (Studi kasus Prodi Informatika UIN Sunan Kalijaga)</p>
                    
                    <h6>Deskripsi/Ruang Lingkup:</h6>
                    <p class="text-muted">Sistem informasi ini dirancang untuk mengelola seluruh proses tugas akhir (TA) mahasiswa, mulai dari tahap pembuatan judul hingga penyimpanan dokumen akhir...</p>
                    
                    <h6>Metode:</h6>
                    <p>Waterfall</p>

                    <hr>
                    <form action="/admin/approve-reject" method="POST">
                        @csrf
                        <input type="hidden" name="submission_id" value="1"> <div class="mb-3">
                            <label for="admin_notes" class="form-label fw-bold">Catatan / Alasan Revisi (Wajib jika ditolak)</label>
                            <textarea class="form-control" id="admin_notes" name="admin_notes" rows="3" 
                                      placeholder="Contoh: Judul terlalu mirip dengan TA sebelumnya. Mohon persempit ruang lingkup..."></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="action" value="tolak" class="btn btn-danger">
                        <i class="bi bi-x-circle me-1"></i> Tolak / Revisi
                    </button>
                    <button type="submit" name="action" value="setujui" class="btn btn-custom-green">
                        <i class="bi bi-check-circle me-1"></i> Setujui Judul
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel" style="color: var(--dark-green);">
                        <i class="bi bi-pencil-fill me-2"></i>Edit Data Tugas Akhir
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/edit-judul" method="POST">
                    <div class="modal-body">
                        <p class="text-muted">Admin dapat mengubah data TA jika ada revisi atas arahan Dosen Pembimbing.</p>
                        @csrf
                        <input type="hidden" name="submission_id" value="1"> <div class="mb-3">
                            <label for="edit_judul" class="form-label fw-bold">Judul Tugas Akhir</label>
                            <input type="text" class="form-control" id="edit_judul" name="judul" 
                                   value="Rancang Bangun Sistem Informasi Manajemen Repositori...">
                        </div>
                        <div class="mb-3">
                            <label for="edit_deskripsi" class="form-label fw-bold">Deskripsi / Ruang Lingkup</label>
                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="4">Sistem informasi ini dirancang...</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_metode" class="form-label fw-bold">Metode</label>
                            <input type="text" class="form-control" id="edit_metode" name="metode" value="Waterfall">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-custom-green">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>