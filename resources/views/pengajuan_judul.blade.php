<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengajuan Judul TA | Repositori UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --light-green: #89C99A;
            --dark-green: #38761D;
            --bg-color: #f8f9fa;
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
        .nav-tabs .nav-link {
            color: #666;
            border-bottom: 2px solid transparent;
        }
        .nav-tabs .nav-link.active {
            color: var(--dark-green);
            border-bottom: 3px solid var(--dark-green);
            background-color: transparent;
        }
        .btn-custom-green {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: #ffffff;
            font-weight: 500;
        }
        .btn-custom-green:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: #ffffff;
        }
        .card-header {
            background-color: var(--light-green) !important;
            color: white;
        }
        .form-control:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.25rem rgba(137, 201, 154, 0.25);
        }
        .badge-peminatan {
            font-size: 0.85rem;
            padding: 0.5rem 0.75rem;
        }
        .chat-box .message {
            margin-bottom: 1rem;
        }
        .message.sent {
            text-align: right;
        }
        .message.sent .bubble {
            background-color: var(--light-green);
            color: white;
            display: inline-block;
            padding: 0.75rem 1rem;
            border-radius: 1rem;
            max-width: 70%;
        }
        .message.received .bubble {
            background-color: #e9ecef;
            display: inline-block;
            padding: 0.75rem 1rem;
            border-radius: 1rem;
            max-width: 70%;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand brand-text" href="#">📚 Repositori TA - UIN Suka</a>
            <div class="ms-auto d-flex align-items-center">
                <span class="navbar-text me-3 d-none d-md-inline">Selamat Datang!</span>
                <a href="#" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row mb-3">
            <div class="col">
                <h3 style="color: var(--dark-green);">🎓 Portal Pengajuan Judul Tugas Akhir</h3>
                <p class="text-muted">Kelola pengajuan, lihat dokumentasi, dan konsultasi dengan dosen Anda</p>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" id="pengajuanTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="kumpulan-judul-tab" data-bs-toggle="tab" 
                    data-bs-target="#kumpulan-judul" type="button" role="tab">
                    📚 Kumpulan Judul
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pengajuan-tab" data-bs-toggle="tab" 
                    data-bs-target="#pengajuan" type="button" role="tab">
                    📝 Pengajuan Judul
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="konsultasi-tab" data-bs-toggle="tab" 
                    data-bs-target="#konsultasi" type="button" role="tab">
                    💬 Konsultasi
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="dokumentasi-tab" data-bs-toggle="tab" 
                    data-bs-target="#dokumentasi" type="button" role="tab">
                    📄 Dokumentasi
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="pengajuanTabsContent">
            
            <!-- TAB 1: KUMPULAN JUDUL -->
            <div class="tab-pane fade show active" id="kumpulan-judul" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">📚 Daftar Judul Tugas Akhir Terdahulu (2020+)</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" class="mb-4">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Peminatan:</label>
                                    <select name="peminatan" class="form-select">
                                        <option value="semua">-- Semua --</option>
                                        <option value="sistem_informasi">Sistem Informasi</option>
                                        <option value="sistem_cerdas">Sistem Cerdas</option>
                                        <option value="rekayasa_perangkat_lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="jaringan_komputer">Jaringan Komputer</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Arah Profesi:</label>
                                    <select name="arah_profesi" class="form-select">
                                        <option value="semua">-- Semua --</option>
                                        <option value="ilmuan">Ilmuan</option>
                                        <option value="wirausaha">Wirausaha</option>
                                        <option value="professional">Professional</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Angkatan:</label>
                                    <select name="angkatan" class="form-select">
                                        <option value="">-- Semua --</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-custom-green w-100">Filter</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title">Sistem Informasi Manajemen Apotek Berbasis Web</h6>
                                        <p class="card-text small text-muted">Aplikasi desktop untuk pengelolaan data apotek dengan fitur inventori dan pelaporan</p>
                                        <div class="mb-2">
                                            <span class="badge bg-info badge-peminatan">Sistem Informasi</span>
                                            <span class="badge bg-warning badge-peminatan">Professional</span>
                                            <span class="badge bg-secondary badge-peminatan">2023</span>
                                        </div>
                                        <small class="text-secondary">Oleh: <strong>Ahmad Rizki</strong> (NIM: 20201001)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title">Klasifikasi Penyakit Tanaman Padi Menggunakan Deep Learning</h6>
                                        <p class="card-text small text-muted">Sistem AI untuk identifikasi penyakit pada tanaman padi menggunakan CNN</p>
                                        <div class="mb-2">
                                            <span class="badge bg-info badge-peminatan">Sistem Cerdas</span>
                                            <span class="badge bg-warning badge-peminatan">Ilmuan</span>
                                            <span class="badge bg-secondary badge-peminatan">2023</span>
                                        </div>
                                        <small class="text-secondary">Oleh: <strong>Siti Fatimah</strong> (NIM: 20201005)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <button class="btn btn-outline-secondary">Tampilkan Lebih Banyak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: PENGAJUAN JUDUL -->
            <div class="tab-pane fade" id="pengajuan" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">📝 Form Pengajuan Judul</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengajuan.store') ?? '#' }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Mahasiswa:</label>
                                    <input type="text" name="nama_mahasiswa" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">NIM:</label>
                                    <input type="text" name="nim_mahasiswa" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Tugas Akhir:</label>
                                <input type="text" name="judul" class="form-control form-control-lg" 
                                    placeholder="Masukkan judul TA Anda" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Peminatan:</label>
                                    <select name="peminatan" class="form-select" required>
                                        <option value="">-- Pilih Peminatan --</option>
                                        <option value="sistem_informasi">Sistem Informasi</option>
                                        <option value="sistem_cerdas">Sistem Cerdas</option>
                                        <option value="rekayasa_perangkat_lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="jaringan_komputer">Jaringan Komputer</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Arah Profesi:</label>
                                    <select name="arah_profesi" class="form-select" required>
                                        <option value="">-- Pilih Arah Profesi --</option>
                                        <option value="ilmuan">Ilmuan</option>
                                        <option value="wirausaha">Wirausaha</option>
                                        <option value="professional">Professional</option>
                                    </select>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <strong>ℹ️ Informasi Penting:</strong> Pastikan judul Anda unik dan belum ada dalam daftar kumpulan judul. Admin akan melakukan review dalam 1-2 hari kerja.
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom-green btn-lg">
                                    ✓ Ajukan Judul
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- TAB 3: KONSULTASI -->
            <div class="tab-pane fade" id="konsultasi" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">💬 Ruang Konsultasi dengan Dosen</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chat-box border rounded p-3 mb-3" style="height: 400px; overflow-y: auto; background-color: #f9f9f9;">
                                    <div class="message received mb-3">
                                        <div class="bubble">
                                            <strong>Dr. Ahmad Wijaya</strong><br>
                                            Halo! Bagaimana perkembangan TA Anda?
                                            <br><small class="d-block mt-1">10:30 AM</small>
                                        </div>
                                    </div>
                                    <div class="message sent mb-3">
                                        <div class="bubble">
                                            Assalamu'alaikum Pak, saya sudah fix judul TA saya dan sedang membuat proposal. Apakah ada yang perlu saya perbaiki?
                                            <br><small class="d-block mt-1">10:35 AM</small>
                                        </div>
                                    </div>
                                </div>

                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Ketik pesan Anda..." required>
                                        <button class="btn btn-custom-green" type="submit">Kirim</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <h6 class="fw-bold mb-3">📋 Daftar Dosen Pembimbing</h6>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        <div class="d-flex w-100 justify-content-between">
                                            <strong>Dr. Ahmad Wijaya</strong>
                                            <span class="badge bg-success rounded-pill">Aktif</span>
                                        </div>
                                        <small>Sistem Informasi</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <strong>Dr. Siti Nurhaliza</strong>
                                            <span class="badge bg-secondary rounded-pill">Offline</span>
                                        </div>
                                        <small>Rekayasa Perangkat Lunak</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 4: DOKUMENTASI -->
            <div class="tab-pane fade" id="dokumentasi" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">📄 Dokumentasi Tugas Akhir Selesai</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penulis (NIM)</th>
                                        <th>Peminatan</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Sistem Informasi Manajemen Apotek</strong><br>
                                            <small class="text-muted">Aplikasi desktop untuk pengelolaan data apotek...</small>
                                        </td>
                                        <td>Ahmad Rizki (20201001)</td>
                                        <td><span class="badge bg-info">Sistem Informasi</span></td>
                                        <td>2023</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#abstrakModal1">👁️ Abstrak</button>
                                            <a href="#" class="btn btn-sm btn-success">📥 Skripsi</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Klasifikasi Penyakit Tanaman dengan Deep Learning</strong><br>
                                            <small class="text-muted">Sistem AI untuk identifikasi penyakit tanaman...</small>
                                        </td>
                                        <td>Siti Fatimah (20201005)</td>
                                        <td><span class="badge bg-success">Sistem Cerdas</span></td>
                                        <td>2023</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#abstrakModal2">👁️ Abstrak</button>
                                            <a href="#" class="btn btn-sm btn-success">📥 Skripsi</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal Abstrak -->
                        <div class="modal fade" id="abstrakModal1" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Abstrak: Sistem Informasi Manajemen Apotek</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Bahasa Indonesia:</h6>
                                        <p>Penelitian ini mengembangkan sistem informasi manajemen apotek berbasis desktop dengan fitur lengkap untuk pengelolaan stok obat, penjualan, dan pelaporan. Sistem dibangun menggunakan teknologi C# dengan database SQL Server...</p>
                                        
                                        <h6 class="mt-3">Bahasa Inggris:</h6>
                                        <p>This research develops a desktop-based pharmacy management information system with comprehensive features for drug stock management, sales, and reporting. The system is built using C# technology with SQL Server database...</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="abstrakModal2" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Abstrak: Klasifikasi Penyakit Tanaman dengan Deep Learning</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Bahasa Indonesia:</h6>
                                        <p>Penelitian ini mengembangkan sistem klasifikasi penyakit tanaman padi menggunakan teknologi Deep Learning dengan arsitektur CNN. Dataset terdiri dari 5000 gambar penyakit padi yang sudah dilabeli...</p>
                                        
                                        <h6 class="mt-3">Bahasa Inggris:</h6>
                                        <p>This research develops a rice plant disease classification system using Deep Learning technology with CNN architecture. The dataset consists of 5000 labeled images of rice plant diseases...</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>