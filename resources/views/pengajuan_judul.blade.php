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
            display: flex;
            flex-direction: column;
        }
        
        .main-wrapper {
            display: flex;
            flex: 1;
        }
        
        .sidebar-nav {
            width: 220px;
            background-color: #355E3B;
            padding: 1.5rem 0;
            min-height: calc(100vh - 200px);
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-nav .nav-link {
            color: #ffffff;
            padding: 0.75rem 1rem;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.95rem;
        }
        
        .sidebar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: #7FD8BE;
            color: #ffffff;
        }
        
        .sidebar-nav .nav-link.active {
            background-color: #4A8659;
            color: white;
            border-left-color: #7FD8BE;
            font-weight: 700;
        }
        
        .content-area {
            flex: 1;
            padding: 2rem;
            overflow-y: auto;
            min-height: 100vh;
        }
        
        .tab-content {
            animation: fadeIn 0.4s ease-in;
        }
        
        @media (max-width: 768px) {
            .sidebar-nav {
                width: 100%;
                min-height: auto;
                padding: 1rem 0;
                display: flex;
                overflow-x: auto;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }
            
            .sidebar-nav .nav-link {
                padding: 0.75rem 1rem;
                border-left: none;
                border-bottom: 3px solid transparent;
                white-space: nowrap;
            }
            
            .sidebar-nav .nav-link:hover {
                border-left: none;
                border-bottom-color: var(--light-green);
            }
            
            .sidebar-nav .nav-link.active {
                border-left: none;
                border-bottom: 3px solid var(--light-green);
            }
            
            .main-wrapper {
                flex-direction: column;
            }
            
            .content-area {
                padding: 1rem;
            }
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
        <div class="container-fluid" style="max-width: 100%; margin: 0; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; background: white; border-bottom: 1px solid #e0e0e0;">
            <!-- Left Side: UIN Logo + Text -->
            <div style="display: flex; align-items: center; gap: 1rem;">
                <img src="{{ asset('images/OIP.png') }}" alt="UIN Logo" style="height: 60px;">
                <div style="display: flex; flex-direction: column; line-height: 1.2;">
                    <span style="font-weight: 700; color: #2c3e50; font-size: 0.9rem;">UNIVERSITAS ISLAM NEGERI</span>
                    <span style="font-weight: 700; color: #2c3e50; font-size: 1.1rem;">SUNAN KALIJAGA</span>
                    <span style="color: #666; font-size: 0.75rem; letter-spacing: 0.5px;">YOGYAKARTA</span>
                </div>
            </div>

            <!-- Right Side: Title -->
            <div style="text-align: right;">
                <span style="font-size: 1.1rem; color: #b8860b; font-weight: 600;">Manajemen Repositori Tugas Akhir</span>
                <div style="font-size: 0.9rem; color: #2c3e50; font-weight: 500;">UIN Sunan Kalijaga</div>
            </div>

            <!-- Navbar Toggle for Mobile -->
            <div class="ms-auto d-flex align-items-center d-lg-none">
                <span class="navbar-text me-3" style="font-size: 0.9rem;">Selamat Datang!</span>
            </div>
        </div>
    </nav>

    <div class="main-wrapper">
        <!-- Sidebar Navigation -->
        <nav class="sidebar-nav" id="pengajuanNav">
            <!-- Profile Section -->
            <div style="padding: 1rem 0.75rem; margin-bottom: 1rem; border-bottom: 1px solid rgba(255, 255, 255, 0.2); display: flex; flex-direction: column; align-items: center; text-align: center;">
                <!-- Profile Avatar -->
                <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 0.5rem; border: 2px solid rgba(255, 255, 255, 0.3);">
                    <span style="font-size: 1.8rem;">👩‍🎓</span>
                </div>
                <!-- Profile Info -->
                <h6 style="color: #ffffff; margin: 0.4rem 0 0.2rem 0; font-weight: 600; font-size: 0.85rem;">MUTIARA HASIBUAN</h6>
                <small style="color: rgba(255, 255, 255, 0.7); margin: 0; font-size: 0.75rem;">22106050070</small>
            </div>

            <!-- Menu Label -->
            <div style="padding: 0 0.75rem; margin-bottom: 0.75rem;">
                <h6 style="color: rgba(255, 255, 255, 0.8); margin: 0; opacity: 0.9; font-size: 0.85rem; font-weight: 600;">Menu</h6>
            </div>

            <!-- Menu Items -->
            <a href="#kumpulan-judul" class="nav-link active" data-bs-toggle="tab" data-bs-target="#kumpulan-judul">
                <span style="font-size: 1.2rem;">📚</span>
                <span>Kumpulan Judul</span>
            </a>
            <a href="#pengajuan" class="nav-link" data-bs-toggle="tab" data-bs-target="#pengajuan">
                <span style="font-size: 1.2rem;">📝</span>
                <span>Pengajuan Judul</span>
            </a>
            <a href="#konsultasi" class="nav-link" data-bs-toggle="tab" data-bs-target="#konsultasi">
                <span style="font-size: 1.2rem;">💬</span>
                <span>Konsultasi</span>
            </a>
            <a href="#dokumentasi" class="nav-link" data-bs-toggle="tab" data-bs-target="#dokumentasi">
                <span style="font-size: 1.2rem;">📄</span>
                <span>Dokumentasi</span>
            </a>

            <!-- Logout Button -->
            <div style="padding: 0.75rem 1rem; margin-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.2);">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger w-100" style="font-size: 0.85rem; padding: 0.5rem;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Tabs Content -->
            <div class="tab-content" id="pengajuanTabsContent">
                
                <!-- TAB 1: KUMPULAN JUDUL -->
                <div class="tab-pane fade show active" id="kumpulan-judul" role="tabpanel">
                    <div class="card" style="min-height: 700px;">
                        <div class="card-header">
                            <h5 class="mb-0">📚 Daftar Judul Tugas Akhir Terdahulu (2020+)</h5>
                        </div>
                        <div class="card-body">
                            <!-- Search Section -->
                            <div class="mb-4">
                                <form method="GET" action="{{ route('pengajuan.index') }}" class="d-flex gap-2">
                                    <input type="hidden" name="peminatan" value="{{ $peminatan ?? 'semua' }}">
                                    <input type="hidden" name="arah_profesi" value="{{ $arahProfesi ?? 'semua' }}">
                                    <input type="hidden" name="angkatan" value="{{ request('angkatan', '') }}">
                                    <input type="text" name="search" class="form-control" placeholder="🔍 Cari judul tugas akhir..." value="{{ request('search', '') }}">
                                    <button type="submit" class="btn btn-custom-green">Cari</button>
                                    @if(request('search'))
                                        <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Reset</a>
                                    @endif
                                </form>
                            </div>

                            <form method="GET" class="mb-4" action="{{ route('pengajuan.index') }}">
                                <input type="hidden" name="search" value="{{ request('search', '') }}">
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

                            @if($hasFilter && $judulList->count() > 0)
                            <div class="row">
                                @foreach($judulList as $judul)
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $judul->judul }}</h6>
                                                <p class="card-text small text-muted">{{ $judul->abstrak_bahasa_indonesia ?? $judul->deskripsi }}</p>
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

                            <!-- Search Bottom Section -->
                            <div class="row mt-4 mb-4">
                                <div class="col-12">
                                    <form method="GET" action="{{ route('pengajuan.index') }}" class="d-flex gap-2">
                                        <input type="hidden" name="peminatan" value="{{ $peminatan ?? 'semua' }}">
                                        <input type="hidden" name="arah_profesi" value="{{ $arahProfesi ?? 'semua' }}">
                                        <input type="hidden" name="angkatan" value="{{ request('angkatan', '') }}">
                                        <input type="text" name="search" class="form-control" placeholder="🔍 Cari judul tugas akhir..." value="{{ request('search', '') }}">
                                        <button type="submit" class="btn btn-custom-green">Cari</button>
                                        @if(request('search'))
                                            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Reset</a>
                                        @endif
                                    </form>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    {{ $judulList->links('pagination.custom') }}
                                </div>
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
                        <div class="row" style="height: 600px;">
                            <!-- Sebelah Kiri: Chat Messages -->
                            <div class="col-md-8 d-flex flex-column">
                                <div class="chat-box border rounded p-3 mb-3 flex-grow-1" style="overflow-y: auto; background-color: #f9f9f9;">
                                    @if($chatHistory && count($chatHistory) > 0)
                                        @foreach($chatHistory as $chat)
                                            <div class="message mb-3">
                                                @if($chat->pengirim === 'mahasiswa')
                                                    <!-- Pesan dari Mahasiswa (Kanan) -->
                                                    <div class="d-flex justify-content-end">
                                                        <div class="bubble" style="background-color: #89C99A; color: white; padding: 10px 15px; border-radius: 15px; max-width: 70%;">
                                                            <p class="mb-2">{{ $chat->pesan }}</p>
                                                            @if($chat->file_attachment)
                                                                <div class="mt-2">
                                                                    <a href="{{ asset('storage/' . $chat->file_attachment) }}" target="_blank" class="btn btn-sm btn-light">
                                                                        📎 Download File
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            <small class="d-block mt-1" style="opacity: 0.9;">{{ $chat->created_at->format('H:i') }}</small>
                                                        </div>
                                                    </div>
                                                @else
                                                    <!-- Pesan dari Dosen (Kiri) -->
                                                    <div class="d-flex justify-content-start">
                                                        <div class="bubble" style="background-color: #e9ecef; color: #333; padding: 10px 15px; border-radius: 15px; max-width: 70%;">
                                                            <strong>{{ $chat->dosen->name ?? 'Dosen' }}</strong><br>
                                                            <p class="mb-2">{{ $chat->pesan }}</p>
                                                            @if($chat->file_attachment)
                                                                <div class="mt-2">
                                                                    <a href="{{ asset('storage/' . $chat->file_attachment) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                        📎 Download File
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            <small class="d-block mt-1">{{ $chat->created_at->format('H:i') }}</small>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center text-muted mt-5">
                                            <p>💭 Belum ada pesan. Mulai percakapan dengan dosen pembimbing Anda!</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Form Input Chat -->
                                <form method="POST" action="{{ route('pengajuan.sendChat') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="dosen_id" value="1">
                                    <div class="input-group mb-2">
                                        <input type="text" name="pesan" class="form-control" 
                                            placeholder="Ketik pesan Anda..." required>
                                        <button class="btn btn-custom-green" type="submit">Kirim</button>
                                    </div>
                                    <div class="input-group">
                                        <input type="file" name="file_attachment" class="form-control">
                                    </div>
                                </form>
                            </div>

                            <!-- Sebelah Kanan: Profil Dosen Pembimbing -->
                            <div class="col-md-4 ps-3 border-start">
                                <h6 class="fw-bold mb-3">�‍🏫 Dosen Pembimbing</h6>
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <div style="width: 80px; height: 80px; background-color: #89C99A; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                            👨‍🎓
                                        </div>
                                        <h6 class="fw-bold">Dr. Ahmad Wijaya</h6>
                                        <p class="text-muted small mb-2">Sistem Informasi</p>
                                        <hr>
                                        <div class="text-start">
                                            <p class="mb-2"><small class="text-muted">📧 Email:</small><br>
                                                <small>ahmad.wijaya@uin-suka.ac.id</small></p>
                                            <p class="mb-0"><small class="text-muted">📱 Telepon:</small><br>
                                                <small>+62-812-3456-7890</small></p>
                                        </div>
                                    </div>
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
                        <h5 class="mb-0">📄 Form Dokumentasi Tugas Akhir</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengajuan.storeDokumentasi') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Row 1: Judul -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Tugas Akhir:</label>
                                <input type="text" name="judul" class="form-control form-control-lg" 
                                    placeholder="Masukkan judul TA" required>
                            </div>

                            <!-- Row 2: Nama dan NIM -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Penulis:</label>
                                    <input type="text" name="nama_penulis" class="form-control" 
                                        placeholder="Nama lengkap penulis" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">NIM:</label>
                                    <input type="text" name="nim_penulis" class="form-control" 
                                        placeholder="NIM penulis" required>
                                </div>
                            </div>

                            <!-- Row 3: Jenis TA dan Prodi -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Jenis Tugas Akhir:</label>
                                    <select name="jenis_ta" class="form-select" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Skripsi">Skripsi</option>
                                        <option value="Thesis">Thesis</option>
                                        <option value="Disertasi">Disertasi</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Program Studi:</label>
                                    <input type="text" name="prodi" class="form-control" 
                                        placeholder="Contoh: Teknik Informatika" required>
                                </div>
                            </div>

                            <!-- Row 4: Dosen Pembimbing dan Peminatan -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Dosen Pembimbing:</label>
                                    <input type="text" name="dosen_pembimbing" class="form-control" 
                                        placeholder="Nama dosen pembimbing" required>
                                </div>
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
                            </div>

                            <!-- Row 5: Abstrak Bahasa Indonesia -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Abstrak Bahasa Indonesia:</label>
                                <textarea name="abstrak_bahasa_indonesia" class="form-control" rows="4" 
                                    placeholder="Masukkan abstrak dalam bahasa Indonesia" required></textarea>
                            </div>

                            <!-- Row 6: Abstrak Bahasa Inggris -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Abstrak Bahasa Inggris:</label>
                                <textarea name="abstrak_bahasa_inggris" class="form-control" rows="4" 
                                    placeholder="Masukkan abstrak dalam bahasa Inggris" required></textarea>
                            </div>

                            <!-- Row 7: File Upload -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">File Skripsi (PDF):</label>
                                    <input type="file" name="file_skripsi" class="form-control" 
                                        accept=".pdf">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">File Lembar Pengesahan (PDF):</label>
                                    <input type="file" name="file_pengesahan" class="form-control" 
                                        accept=".pdf">
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-outline-secondary">Bersihkan</button>
                                <button type="submit" class="btn btn-custom-green">Simpan Dokumentasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Initialize sidebar active state on page load
    function initSidebar() {
        const activeTab = document.querySelector('.tab-pane.show.active');
        if (activeTab) {
            const tabId = activeTab.id;
            const navLink = document.querySelector(`.sidebar-nav .nav-link[href="#${tabId}"]`);
            if (navLink) {
                document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => l.classList.remove('active'));
                navLink.classList.add('active');
            }
        }
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        initSidebar();
    });
    
    // Handle sidebar active state on tab change
    document.addEventListener('shown.bs.tab', function (e) {
        const target = e.target;
        const tabTarget = target.getAttribute('data-bs-target') || target.getAttribute('href');
        
        // Remove active from all nav links
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
            link.classList.remove('active');
        });
        
        // Add active to the corresponding nav link
        const activeLink = document.querySelector(`.sidebar-nav .nav-link[href="${tabTarget}"]`);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    });
    
    // Handle sidebar click to activate tab
    document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const tabPane = document.querySelector(targetId);
            
            if (tabPane) {
                // Remove active from all tabs and nav links
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => {
                    l.classList.remove('active');
                });
                
                // Add active to current tab and nav link
                tabPane.classList.add('show', 'active');
                this.classList.add('active');
            }
        });
    });
</script>
</body>
</html>