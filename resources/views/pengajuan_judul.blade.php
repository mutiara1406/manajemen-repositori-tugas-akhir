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
            --bg-color: #f5f7fa;
            --card-border: #e1e8ed;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #2c3e50;
        }
        
        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid var(--card-border);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .brand-text {
            color: var(--dark-green);
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .nav-tabs {
            border-bottom: 2px solid white;
            gap: 0.5rem;
            background: white;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-top: -1rem;
        }
        
        .nav-tabs .nav-link {
            color: #7f8c8d;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            background: transparent;
            font-size: 0.95rem;
        }
        .nav-tabs .nav-link:hover {
            color: var(--dark-green);
            border-bottom-color: var(--dark-green);
        }
        .nav-tabs .nav-link.active {
            color: var(--dark-green);
            border-bottom-color: var(--dark-green);
            background-color: transparent;
        }
        
        .btn-custom-green {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: #ffffff;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .btn-custom-green:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(46, 204, 113, 0.3);
        }
        
        .card {
            border: 1px solid var(--card-border);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }
        
        .card-header {
            background-color: white !important;
            border-bottom: 1px solid var(--card-border);
            padding: 1.5rem;
        }
        .card-header h5 {
            color: #2c3e50;
            font-weight: 600;
            margin: 0;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.2rem rgba(137, 201, 154, 0.1);
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
        
        .tab-content {
            animation: fadeIn 0.4s ease-in;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .judul-card {
            background: white;
            padding: 1.5rem;
            border: 1px solid var(--card-border);
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .judul-card:hover {
            box-shadow: 0 6px 16px rgba(46, 204, 113, 0.15);
            border-color: var(--light-green);
            transform: translateY(-2px);
        }
        .judul-card h6 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 0.75rem;
            line-height: 1.4;
            font-size: 1rem;
        }
        .judul-card p {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        .table thead {
            background-color: var(--bg-color);
            border-bottom: 2px solid var(--card-border);
        }
        .table thead th {
            font-weight: 700;
            color: #2c3e50;
            border: none;
        }
        .table tbody tr {
            border-bottom: 1px solid var(--card-border);
            transition: all 0.3s ease;
        }
        .table tbody tr:hover {
            background-color: var(--bg-color);
        }

        /* Pagination Styling */
        .pagination {
            gap: 0.25rem;
        }
        .page-link {
            color: var(--dark-green);
            border: 1px solid var(--card-border);
            border-radius: 0.4rem;
            padding: 0.5rem 0.75rem;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background-color: white;
        }
        .page-link:hover {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 2px 6px rgba(137, 201, 154, 0.3);
        }
        .page-item.active .page-link {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: white;
            box-shadow: 0 2px 8px rgba(56, 118, 29, 0.2);
        }
        .page-item.disabled .page-link {
            color: #bdbdbd;
            background-color: #f5f5f5;
            border-color: #e0e0e0;
            cursor: not-allowed;
        }
        .pagination + .text-center {
            margin-top: 1rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid" style="max-width: 1100px; margin-left: auto; margin-right: auto; padding: 0 1rem;">
            <a class="navbar-brand brand-text" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/UIN_Sunan_Kalijaga_Logo.svg/200px-UIN_Sunan_Kalijaga_Logo.svg.png" 
                     alt="UIN Logo" style="height: 40px; margin-right: 0.75rem; display: inline-block;">
                Repositori TA - UIN Suka
            </a>
            <div class="ms-auto d-flex align-items-center">
                <span class="navbar-text me-3 d-none d-md-inline">Selamat Datang!</span>
                <a href="#" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div style="background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); padding: 3rem 1rem; margin-bottom: 0;">
        <div style="max-width: 1100px; margin: 0 auto;">
            <h1 style="color: white; font-weight: 800; font-size: 2.5rem; margin: 0; letter-spacing: -1px; text-align: center;">
                Manajemen Repositori Tugas Akhir
            </h1>
        </div>
    </div>

    <div class="container-fluid" style="max-width: 1100px; margin-left: auto; margin-right: auto; padding: 0 1rem;">
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" id="pengajuanTabs" role="tablist" style="max-width: 100%; margin-left: auto; margin-right: auto;">
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
        <div class="tab-content" id="pengajuanTabsContent" style="max-width: 1100px; margin-left: auto; margin-right: auto;">
            
            <!-- TAB 1: KUMPULAN JUDUL -->
            <div class="tab-pane fade show active" id="kumpulan-judul" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">📚 Daftar Judul Tugas Akhir Terdahulu (2020+)</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" class="mb-4" action="{{ route('pengajuan.index') }}">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Peminatan:</label>
                                    <select name="peminatan" class="form-select">
                                        <option value="semua" {{ $peminatan === 'semua' ? 'selected' : '' }}>-- Semua --</option>
                                        <option value="sistem_informasi" {{ $peminatan === 'sistem_informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                        <option value="sistem_cerdas" {{ $peminatan === 'sistem_cerdas' ? 'selected' : '' }}>Sistem Cerdas</option>
                                        <option value="rekayasa_perangkat_lunak" {{ $peminatan === 'rekayasa_perangkat_lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                        <option value="jaringan_komputer" {{ $peminatan === 'jaringan_komputer' ? 'selected' : '' }}>Jaringan Komputer</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Arah Profesi:</label>
                                    <select name="arah_profesi" class="form-select">
                                        <option value="semua" {{ $arahProfesi === 'semua' ? 'selected' : '' }}>-- Semua --</option>
                                        <option value="ilmuan" {{ $arahProfesi === 'ilmuan' ? 'selected' : '' }}>Ilmuan</option>
                                        <option value="wirausaha" {{ $arahProfesi === 'wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                        <option value="professional" {{ $arahProfesi === 'professional' ? 'selected' : '' }}>Professional</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Angkatan:</label>
                                    <select name="angkatan" class="form-select">
                                        <option value="">-- Semua --</option>
                                        <option value="2024" {{ request('angkatan') == '2024' ? 'selected' : '' }}>2024</option>
                                        <option value="2023" {{ request('angkatan') == '2023' ? 'selected' : '' }}>2023</option>
                                        <option value="2022" {{ request('angkatan') == '2022' ? 'selected' : '' }}>2022</option>
                                        <option value="2021" {{ request('angkatan') == '2021' ? 'selected' : '' }}>2021</option>
                                        <option value="2020" {{ request('angkatan') == '2020' ? 'selected' : '' }}>2020</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-custom-green w-100">Filter</button>
                                </div>
                            </div>
                        </form>

                        @if($judulList->count() > 0)
                            <div class="row">
                                @foreach($judulList as $judul)
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $judul->judul }}</h6>
                                                <p class="card-text small text-muted">{{ $judul->deskripsi }}</p>
                                                <div class="mb-2">
                                                    <span class="badge bg-info badge-peminatan">
                                                        @switch($judul->peminatan)
                                                            @case('sistem_informasi') Sistem Informasi @break
                                                            @case('sistem_cerdas') Sistem Cerdas @break
                                                            @case('rekayasa_perangkat_lunak') Rekayasa Perangkat Lunak @break
                                                            @case('jaringan_komputer') Jaringan Komputer @break
                                                        @endswitch
                                                    </span>
                                                    <span class="badge bg-warning badge-peminatan">
                                                        @switch($judul->arah_profesi)
                                                            @case('ilmuan') Ilmuan @break
                                                            @case('wirausaha') Wirausaha @break
                                                            @case('professional') Professional @break
                                                        @endswitch
                                                    </span>
                                                    <span class="badge bg-secondary badge-peminatan">{{ $judul->angkatan }}</span>
                                                </div>
                                                <small class="text-secondary">Oleh: <strong>{{ $judul->nama_penulis }}</strong> (NIM: {{ $judul->nim_penulis }})</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    {{ $judulList->links('pagination.custom') }}
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info text-center" role="alert">
                                <p class="mb-0">📭 Tidak ada data judul yang sesuai dengan filter Anda. Coba ubah kriteria filter.</p>
                            </div>
                        @endif
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