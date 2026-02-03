<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen | Repositori Tugas Akhir UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #008B8B;
            --primary-dark: #006666;
            --accent-orange: #FF6B35;
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
            min-height: calc(100vh - 56px);
        }
        
        .sidebar-nav {
            width: 240px;
            background: #ffffff;
            padding: 0;
            height: calc(100vh - 56px);
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.08);
            position: fixed;
            top: 56px;
            left: 0;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 999;
            border-radius: 0 1rem 1rem 0;
            border-right: 1px solid #e0e0e0;
        }
        
        .content-area-wrapper {
            margin-left: 240px;
            flex: 1;
        }
        
        .sidebar-nav .nav-link {
            color: #2c3e50;
            padding: 0.65rem 0.85rem;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.8rem;
            margin: 0.15rem 0.5rem;
            border-radius: 0.5rem;
        }
        
        .sidebar-nav .nav-link:hover {
            background-color: #e6f2f2;
            border-left-color: var(--primary-teal);
            color: var(--primary-dark);
        }
        
        .sidebar-nav .nav-link.active {
            background-color: #d9efef;
            color: var(--primary-dark);
            border-left-color: var(--primary-teal);
            font-weight: 600;
        }
        
        .sidebar-nav .nav-link svg {
            width: 30px;
            height: 30px;
            padding: 7px;
            background: #e6f2f2;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            color: var(--primary-teal);
        }
        
        .sidebar-nav .nav-link:hover svg,
        .sidebar-nav .nav-link.active svg {
            background: var(--primary-teal);
            color: white;
        }
        
        .content-area {
            padding: 1.5rem;
            min-height: calc(100vh - 56px);
            font-size: 0.85rem;
        }
        
        .content-area h5 {
            font-size: 1rem;
        }
        
        .content-area h6 {
            font-size: 0.85rem;
        }
        
        .content-area .card-header {
            font-size: 0.85rem;
        }
        
        .content-area .table {
            font-size: 0.8rem;
        }
        
        .content-area .table th {
            font-size: 0.75rem;
        }
        
        .content-area .btn {
            font-size: 0.75rem;
        }
        
        .content-area .form-control,
        .content-area .form-select {
            font-size: 0.8rem;
        }
        
        .content-area .stat-card .stat-number {
            font-size: 1.5rem;
        }
        
        .content-area .stat-card .stat-label {
            font-size: 0.7rem;
        }
        
        .tab-content {
            animation: fadeIn 0.4s ease-in;
        }
        
        @media (max-width: 768px) {
            .sidebar-nav {
                position: fixed;
                transform: translateX(-100%);
            }
            
            .content-area-wrapper {
                margin-left: 0;
            }
            
            footer {
                margin-left: 0 !important;
            }
        }
        
        @media (min-width: 769px) {
            .sidebar-nav {
                width: 240px;
                min-height: auto;
                padding: 0;
                display: flex;
                flex-direction: column;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }
            
            .sidebar-nav .nav-link {
                padding: 0.75rem 1rem;
                border-left: none;
                border-bottom: 3px solid transparent;
                white-space: nowrap;
            }
            
            .sidebar-nav .nav-link:hover {
                border-left: none;
                border-bottom-color: var(--primary-teal);
            }
            
            .sidebar-nav .nav-link.active {
                border-left: none;
                border-bottom: 3px solid var(--primary-teal);
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
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .btn-custom-green {
            background-color: var(--primary-teal);
            border-color: var(--primary-teal);
            color: #ffffff;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .btn-custom-green:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 139, 139, 0.3);
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
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 0.2rem rgba(0, 139, 139, 0.15);
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
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border: 1px solid var(--card-border);
            border-radius: 0.75rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            box-shadow: 0 6px 16px rgba(0, 139, 139, 0.2);
            border-color: var(--primary-teal);
            transform: translateY(-2px);
        }
        .stat-card .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-dark);
        }
        .stat-card .stat-label {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        
        .mahasiswa-card {
            background: white;
            padding: 1.25rem;
            border: 1px solid var(--card-border);
            border-radius: 0.75rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }
        .mahasiswa-card:hover {
            box-shadow: 0 6px 16px rgba(0, 139, 139, 0.2);
            border-color: var(--primary-teal);
            transform: translateY(-2px);
        }
        
        .progress-bar-custom {
            background-color: var(--primary-teal);
        }
        
        .badge-status {
            font-size: 0.8rem;
            padding: 0.4rem 0.75rem;
            border-radius: 0.5rem;
        }
        
        .badge-proposal { background-color: #f39c12; color: white; }
        .badge-bab1 { background-color: #3498db; color: white; }
        .badge-bab2 { background-color: #9b59b6; color: white; }
        .badge-bab3 { background-color: #1abc9c; color: white; }
        .badge-bab4 { background-color: #e74c3c; color: white; }
        .badge-bab5 { background-color: var(--primary-teal); color: white; }
        .badge-selesai { background-color: var(--primary-dark); color: white; }
    </style>
</head>
<body>

    <!-- Modern Header (Same as Mahasiswa) -->
    <header style="background: #ffffff; padding: 0; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); border-bottom: 1px solid #e0e0e0;">
        <div style="max-width: 100%; margin: 0; padding: 0.5rem 1.5rem; display: flex; justify-content: space-between; align-items: center;">
            <!-- Left Side: UIN Logo + Text + Title -->
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="padding: 0.35rem;">
                        <img src="{{ asset('images/OIP.png') }}" alt="UIN Logo" style="height: 40px;">
                    </div>
                    <div style="display: flex; flex-direction: column; line-height: 1.2;">
                        <span style="font-weight: 600; color: #666; font-size: 0.65rem; letter-spacing: 0.5px; text-transform: uppercase;">Universitas Islam Negeri</span>
                        <span style="font-weight: 700; color: #2c3e50; font-size: 1rem;">SUNAN KALIJAGA</span>
                    </div>
                </div>
                <!-- Divider -->
                <div style="width: 1px; height: 35px; background: #e0e0e0;"></div>
                <!-- Title -->
                <div style="display: flex; flex-direction: column; line-height: 1.2;">
                    <span style="font-size: 0.95rem; color: #008B8B; font-weight: 600;">Manajemen Repositori Tugas Akhir</span>
                    <span style="font-size: 0.7rem; color: #666;">Portal Dosen Pembimbing</span>
                </div>
            </div>

            <!-- Right Side: Logout Only -->
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <!-- Logout Button -->
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: flex; align-items: center; gap: 0.5rem; background: #dc3545; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.8rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#c82333'" onmouseout="this.style.background='#dc3545'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div class="main-wrapper">
        <!-- Sidebar Navigation -->
        <nav class="sidebar-nav" id="dosenNav">
            <!-- Profile Section -->
            <div style="padding: 1.25rem 0.75rem; background: #ffffff; display: flex; flex-direction: column; align-items: center; gap: 0.5rem; border-bottom: 1px solid #e0e0e0;">
                <!-- Profile Avatar -->
                <div style="width: 50px; height: 50px; border-radius: 50%; background: #e6f2f2; display: flex; align-items: center; justify-content: center; border: 2px solid #008B8B;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#008B8B" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                </div>
                <!-- Profile Info -->
                <div style="text-align: center;">
                    <h6 style="color: #2c3e50; margin: 0; font-weight: 600; font-size: 0.75rem;">{{ $dosen->name ?? 'DOSEN' }}</h6>
                    <span style="color: #666; font-size: 0.65rem;">{{ $dosen->nip ?? 'NIP' }}</span>
                </div>
                <span class="badge" style="background: #008B8B; color: white; font-size: 0.6rem;">Dosen Pembimbing</span>
            </div>

            <!-- Menu Label -->
            <div style="padding: 0.75rem 0.75rem 0.4rem 0.75rem;">
                <h6 style="color: #999; margin: 0; font-size: 0.6rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Menu</h6>
            </div>

            <!-- Menu Items -->
            <a href="#daftar-mahasiswa" class="nav-link active" data-bs-toggle="tab" data-bs-target="#daftar-mahasiswa">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                </svg>
                <span>Mahasiswa Bimbingan</span>
            </a>
            <a href="#konsultasi" class="nav-link" data-bs-toggle="tab" data-bs-target="#konsultasi">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <span>Konsultasi</span>
            </a>
            <a href="#progres-bimbingan" class="nav-link" data-bs-toggle="tab" data-bs-target="#progres-bimbingan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                </svg>
                <span>Progres Bimbingan</span>
                @if(($pendingProgresCount ?? 0) > 0)
                <span class="badge bg-danger ms-auto" style="font-size: 0.6rem;">{{ $pendingProgresCount }}</span>
                @endif
            </a>
        </nav>

        <!-- Content Area Wrapper -->
        <div class="content-area-wrapper">
            <div class="content-area">
            <!-- Tabs Content -->
            <div class="tab-content" id="dosenTabsContent">
                
                <!-- TAB 1: DAFTAR MAHASISWA BIMBINGAN -->
                <div class="tab-pane fade show active" id="daftar-mahasiswa" role="tabpanel">
                    <div class="card" style="min-height: 700px;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people-fill me-2" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/></svg> Daftar Mahasiswa Bimbingan</h5>
                            <div class="d-flex align-items-center gap-3">
                                <div class="input-group" style="width: 300px;">
                                    <span class="input-group-text bg-light border-end-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-muted" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></span>
                                    <input type="text" class="form-control border-start-0" id="searchMahasiswa" placeholder="Cari nama atau NIM...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Mahasiswa List -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Judul Tugas Akhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mahasiswaBimbingan ?? [] as $index => $mahasiswa)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $mahasiswa->nim }}</td>
                                            <td>
                                                <strong>{{ $mahasiswa->name }}</strong>
                                            </td>
                                            <td>
                                                <small>{{ Str::limit($mahasiswa->judul_ta ?? 'Belum ada judul', 50) }}</small>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-custom-green" data-bs-toggle="modal" data-bs-target="#detailModal{{ $mahasiswa->id }}">
                                                    Detail
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5">
                                                <div style="color: #7f8c8d;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="text-secondary" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/></svg>
                                                    <p class="mt-3">Belum ada mahasiswa bimbingan</p>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: KONSULTASI -->
                <div class="tab-pane fade" id="konsultasi" role="tabpanel">
                    <div class="row" style="height: calc(100vh - 180px); min-height: 600px;">
                        <!-- Daftar Mahasiswa untuk Chat -->
                        <div class="col-md-3 pe-0" style="position: relative; z-index: 10;">
                            <div class="card h-100" style="border-radius: 0.75rem 0 0 0.75rem; border-right: none;">
                                <div class="card-header" style="background: var(--primary-dark); color: white; border-radius: 0.75rem 0 0 0;">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill me-1" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/></svg> Mahasiswa Bimbingan</h6>
                                </div>
                                <div class="card-body p-2" style="overflow-y: auto;">
                                    <div class="mb-2">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text bg-light border-end-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-muted" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></span>
                                            <input type="text" class="form-control form-control-sm border-start-0" id="searchChat" placeholder="Cari...">
                                        </div>
                                    </div>
                                    <div class="chat-list">
                                        @forelse($mahasiswaBimbingan ?? [] as $mahasiswa)
                                        <div class="chat-item p-2 mb-1" style="background: #f8f9fa; border-radius: 0.5rem; cursor: pointer; transition: all 0.3s; border-left: 3px solid transparent; position: relative; z-index: 20;" 
                                             onclick="selectChat('{{ $mahasiswa->id }}', '{{ $mahasiswa->name }}', '{{ $mahasiswa->nim }}')"
                                             id="chatItem{{ $mahasiswa->id }}">
                                            <div class="d-flex align-items-center">
                                                <div style="width: 36px; height: 36px; border-radius: 50%; background: var(--primary-teal); display: flex; align-items: center; justify-content: center; margin-right: 0.5rem; flex-shrink: 0;">
                                                    <span style="color: white; font-weight: 600; font-size: 0.85rem;">{{ substr($mahasiswa->name, 0, 1) }}</span>
                                                </div>
                                                <div style="min-width: 0;">
                                                    <h6 class="mb-0 text-truncate" style="font-size: 0.8rem; font-weight: 600;">{{ $mahasiswa->name }}</h6>
                                                    <small class="text-muted" style="font-size: 0.7rem;">{{ $mahasiswa->nim }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="text-center py-4 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="text-secondary" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/></svg>
                                            <p class="mt-2" style="font-size: 0.8rem;">Belum ada mahasiswa</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Area Chat -->
                        <div class="col-md-9 ps-0">
                            <div class="card h-100 d-flex flex-column" style="border-radius: 0 0.75rem 0.75rem 0;">
                                <!-- Header Chat -->
                                <div id="chatHeader" class="card-header align-items-center" style="display: none; background: white;">
                                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary-teal); display: flex; align-items: center; justify-content: center; margin-right: 0.75rem;">
                                        <span style="color: white; font-weight: 600;" id="chatAvatar">M</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0" id="chatName">Nama Mahasiswa</h6>
                                        <small class="text-muted" id="chatNim">NIM</small>
                                    </div>
                                </div>

                                <!-- Pesan Chat -->
                                <div id="chatMessages" class="card-body flex-grow-1" style="overflow-y: auto; background: #f5f7fa;">
                                    <div class="text-center py-5 text-muted" id="chatPlaceholder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="text-secondary" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/></svg>
                                        <p class="mt-3">Pilih mahasiswa untuk memulai konsultasi</p>
                                    </div>
                                </div>

                                <!-- Input Pesan -->
                                <div id="chatInput" class="card-footer" style="display: none; background: white;">
                                    <form id="chatForm" class="d-flex gap-2 align-items-end">
                                        <input type="hidden" id="selectedMahasiswaId" value="">
                                        <div class="flex-grow-1">
                                            <div id="fileSelectedWrapper" style="display: none;" class="mb-2">
                                                <span class="badge bg-light text-dark border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/></svg>
                                                    <span id="fileName"></span>
                                                    <a href="#" onclick="clearFile(); return false;" class="text-danger ms-2">✕</a>
                                                </span>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="messageInput" placeholder="Ketik pesan...">
                                                <label class="input-group-text" style="cursor: pointer; background: #f8f9fa;" for="fileInput" title="Lampirkan file">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#666" viewBox="0 0 16 16"><path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/></svg>
                                                </label>
                                                <input type="file" id="fileInput" style="display: none;" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-custom-green">
                                            Kirim <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: PROGRES BIMBINGAN -->
                <div class="tab-pane fade" id="progres-bimbingan" role="tabpanel">
                    <div class="card" style="min-height: 700px;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                    <path d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                                </svg>
                                Progres Bimbingan Mahasiswa
                            </h5>
                            <div class="d-flex align-items-center gap-3">
                                <select class="form-select form-select-sm" id="filterStatusProgres" style="width: 180px;">
                                    <option value="semua">Semua Status</option>
                                    <option value="pending">Menunggu Review</option>
                                    <option value="reviewed">Sudah Direview</option>
                                </select>
                                <div class="input-group" style="width: 250px;">
                                    <input type="text" class="form-control form-control-sm" id="searchProgres" placeholder="Cari mahasiswa...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Stats Cards -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="stat-number text-warning">{{ ($progresBimbingan ?? collect())->where('status', 'pending')->count() }}</div>
                                        <div class="stat-label">Menunggu Review</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="stat-number" style="color: var(--primary-teal);">{{ ($progresBimbingan ?? collect())->where('status', 'reviewed')->count() }}</div>
                                        <div class="stat-label">Sudah Direview</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="stat-number text-primary">{{ ($progresBimbingan ?? collect())->count() }}</div>
                                        <div class="stat-label">Total Progres</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="stat-number text-info">{{ ($progresBimbingan ?? collect())->groupBy('mahasiswa_id')->count() }}</div>
                                        <div class="stat-label">Mahasiswa Aktif</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Progres List -->
                            <div class="progres-list">
                                @forelse($progresBimbingan ?? [] as $progres)
                                <div class="progres-card mb-3 p-3 border rounded shadow-sm" 
                                     data-status="{{ $progres->status }}"
                                     data-mahasiswa="{{ strtolower($progres->mahasiswa->name ?? '') }}"
                                     style="border-left: 4px solid {{ $progres->status === 'reviewed' ? 'var(--primary-teal)' : '#ffc107' }} !important;">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-flex align-items-start gap-3">
                                                <!-- Avatar -->
                                                <div style="width: 45px; height: 45px; border-radius: 50%; background: linear-gradient(135deg, var(--primary-dark), var(--primary-teal)); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                    <span style="color: white; font-weight: 600; font-size: 1.1rem;">{{ substr($progres->mahasiswa->name ?? 'M', 0, 1) }}</span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex align-items-center gap-2 mb-1">
                                                        <span class="badge" style="background-color: {{ $progres->status === 'reviewed' ? 'var(--primary-teal)' : '#ffc107' }}; color: {{ $progres->status === 'reviewed' ? 'white' : '#333' }};">
                                                            {{ $progres->status === 'reviewed' ? 'Sudah Direview' : 'Menunggu Review' }}
                                                        </span>
                                                        <span class="badge bg-secondary">{{ $progres->kategori_label }}</span>
                                                    </div>
                                                    <h6 class="fw-bold mb-1" style="font-size: 0.95rem;">{{ $progres->judul }}</h6>
                                                    <div class="text-muted mb-2" style="font-size: 0.8rem;">
                                                        <strong>{{ $progres->mahasiswa->name ?? 'Mahasiswa' }}</strong> 
                                                        ({{ $progres->mahasiswa->nim ?? 'NIM' }})
                                                        • Dikirim: {{ $progres->created_at->format('d M Y, H:i') }}
                                                    </div>
                                                    <p class="mb-2" style="font-size: 0.85rem;">{{ Str::limit($progres->deskripsi, 150) }}</p>
                                                    
                                                    <!-- Files -->
                                                    @if($progres->files && count($progres->files) > 0)
                                                    <div class="d-flex flex-wrap gap-2 mb-2">
                                                        @foreach($progres->files as $file)
                                                        <a href="{{ asset('storage/' . $file['path']) }}" target="_blank" class="btn btn-outline-secondary btn-sm" style="font-size: 0.75rem;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                                            </svg>
                                                            {{ $file['original_name'] ?? basename($file['path']) }}
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                    @endif

                                                    <!-- Feedback Display -->
                                                    @if($progres->status === 'reviewed' && $progres->feedback)
                                                    <div class="bg-light p-2 rounded mt-2" style="border-left: 3px solid var(--primary-teal);">
                                                        <small class="text-muted d-block mb-1">Feedback Anda ({{ $progres->feedback_at?->format('d M Y, H:i') }}):</small>
                                                        <p class="mb-0" style="font-size: 0.85rem;">{{ $progres->feedback }}</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center justify-content-end">
                                            @if($progres->status === 'pending')
                                            <button class="btn btn-custom-green btn-sm" onclick="openFeedbackModal({{ $progres->id }}, '{{ addslashes($progres->judul) }}', '{{ addslashes($progres->mahasiswa->name ?? '') }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                Berikan Feedback
                                            </button>
                                            @else
                                            <span class="badge px-3 py-2" style="background-color: rgba(0, 139, 139, 0.15); color: var(--primary-teal);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                                Sudah Direview
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ccc" viewBox="0 0 16 16" class="mb-3">
                                        <path d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                                    </svg>
                                    <h6 class="text-muted">Belum ada progres bimbingan</h6>
                                    <p class="text-muted" style="font-size: 0.85rem;">Progres dari mahasiswa akan muncul di sini.</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Feedback -->
                <div class="modal fade" id="modalFeedback" tabindex="-1" aria-labelledby="modalFeedbackLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background: linear-gradient(135deg, #006666 0%, #008B8B 100%); color: white;">
                                <h5 class="modal-title" id="modalFeedbackLabel">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    Berikan Feedback
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="formFeedback" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label text-muted" style="font-size: 0.85rem;">Progres:</label>
                                        <p class="fw-bold mb-0" id="feedbackProgresTitle"></p>
                                        <small class="text-muted" id="feedbackMahasiswaName"></small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Feedback <span class="text-danger">*</span></label>
                                        <textarea name="feedback" class="form-control" rows="5" placeholder="Berikan feedback, saran, atau catatan untuk mahasiswa..." required></textarea>
                                        <small class="text-muted">Feedback akan langsung terlihat di halaman mahasiswa.</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-custom-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                        </svg>
                                        Kirim Feedback
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div> <!-- End content-area-wrapper -->
    </div>

    <!-- Footer -->
    <footer style="background-color: var(--primary-dark); color: white; padding: 1rem 2rem; text-align: center; margin-left: 240px;">
        <small>© {{ date('Y') }} Sistem Informasi Repositori Tugas Akhir - Prodi Informatika UIN Sunan Kalijaga Yogyakarta</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tab navigation handler - Fix untuk perpindahan tab
        document.querySelectorAll('.sidebar-nav .nav-link[data-bs-toggle="tab"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active from all nav links
                document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                
                // Hide all tab panes
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Show target tab pane
                const targetId = this.getAttribute('data-bs-target');
                const targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                }
            });
        });

        // Search mahasiswa
        document.getElementById('searchMahasiswa')?.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Search chat
        document.getElementById('searchChat')?.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const items = document.querySelectorAll('.chat-item');
            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Chat functionality
        let selectedMahasiswaId = null;
        let chatMessages = {};

        function selectChat(id, name, nim) {
            console.log('selectChat called:', id, name, nim); // Debug
            selectedMahasiswaId = id;
            
            const selectedMahasiswaIdInput = document.getElementById('selectedMahasiswaId');
            if (selectedMahasiswaIdInput) {
                selectedMahasiswaIdInput.value = id;
            }
            
            // Update header
            const chatHeader = document.getElementById('chatHeader');
            if (chatHeader) {
                chatHeader.style.display = 'flex';
                chatHeader.classList.add('d-flex');
            }
            
            const chatInput = document.getElementById('chatInput');
            if (chatInput) {
                chatInput.style.display = 'block';
            }
            
            const chatPlaceholder = document.getElementById('chatPlaceholder');
            if (chatPlaceholder) {
                chatPlaceholder.style.display = 'none';
            }
            
            const chatName = document.getElementById('chatName');
            if (chatName) {
                chatName.textContent = name;
            }
            
            const chatNim = document.getElementById('chatNim');
            if (chatNim) {
                chatNim.textContent = nim;
            }
            
            const chatAvatar = document.getElementById('chatAvatar');
            if (chatAvatar) {
                chatAvatar.textContent = name.charAt(0);
            }

            // Highlight selected chat
            document.querySelectorAll('.chat-item').forEach(item => {
                item.style.background = '#f8f9fa';
                item.style.borderLeft = '3px solid transparent';
            });
            const selectedItem = document.getElementById('chatItem' + id);
            console.log('Looking for chatItem' + id, selectedItem); // Debug
            if (selectedItem) {
                selectedItem.style.background = '#e6f2f2';
                selectedItem.style.borderLeft = '3px solid var(--primary-dark)';
            }

            // Load messages
            loadMessages(id, name);
        }

        function loadMessages(mahasiswaId, name) {
            const messagesContainer = document.getElementById('chatMessages');
            
            // Contoh chat berbeda untuk setiap mahasiswa berdasarkan ID
            const allMessages = {
                '1': [
                    { sender: 'mahasiswa', text: 'Selamat pagi Pak, saya ingin konsultasi mengenai BAB 2 skripsi saya.', time: '09:00' },
                    { sender: 'dosen', text: 'Selamat pagi. Silakan, ada yang bisa saya bantu?', time: '09:05' },
                    { sender: 'mahasiswa', text: 'Saya masih bingung dengan kajian pustaka yang relevan untuk penelitian saya.', time: '09:10' },
                    { sender: 'dosen', text: 'Coba kamu cari jurnal-jurnal terbaru yang berkaitan dengan topik penelitianmu Jean. Saya lampirkan beberapa referensi.', time: '09:15', file: 'referensi-jurnal.pdf' },
                    { sender: 'mahasiswa', text: 'Baik Pak, terima kasih. Saya akan coba cari dan pelajari.', time: '09:20' },
                ],
                '2': [
                    { sender: 'mahasiswa', text: 'Assalamualaikum Pak, saya Budi. Mau konsultasi proposal skripsi.', time: '10:00' },
                    { sender: 'dosen', text: 'Waalaikumsalam Budi. Silakan, sudah sampai mana proposalnya?', time: '10:05' },
                    { sender: 'mahasiswa', text: 'Sudah selesai BAB 1 Pak. Ini saya lampirkan draft-nya.', time: '10:08', file: 'proposal-bab1-budi.docx' },
                    { sender: 'dosen', text: 'Baik, saya review dulu ya. Nanti saya kasih feedback.', time: '10:15' },
                    { sender: 'mahasiswa', text: 'Siap Pak, terima kasih.', time: '10:17' },
                    { sender: 'dosen', text: 'Sudah saya cek. Ada beberapa revisi di latar belakang masalah. Tolong diperbaiki bagian yang saya tandai.', time: '14:30', file: 'revisi-bab1-budi.pdf' },
                ],
                '3': [
                    { sender: 'mahasiswa', text: 'Pak, saya Siti. Mau tanya tentang metodologi penelitian.', time: '13:00' },
                    { sender: 'dosen', text: 'Iya Siti, ada yang bisa dibantu?', time: '13:10' },
                    { sender: 'mahasiswa', text: 'Saya bingung antara menggunakan metode kualitatif atau kuantitatif untuk penelitian saya tentang sistem informasi.', time: '13:12' },
                    { sender: 'dosen', text: 'Untuk penelitian pengembangan sistem, biasanya lebih cocok menggunakan metode R&D atau waterfall. Apa tujuan utama penelitianmu?', time: '13:20' },
                    { sender: 'mahasiswa', text: 'Saya ingin membuat sistem informasi perpustakaan Pak.', time: '13:22' },
                    { sender: 'dosen', text: 'Kalau begitu, gunakan metode waterfall atau agile. Saya kirimkan contoh metodologi yang bisa kamu pelajari.', time: '13:30', file: 'contoh-metodologi-waterfall.pdf' },
                    { sender: 'mahasiswa', text: 'Terima kasih Pak, sangat membantu!', time: '13:35' },
                ],
                '4': [
                    { sender: 'mahasiswa', text: 'Selamat sore Pak, saya Dewi. Mau konsultasi BAB 4 hasil penelitian.', time: '15:00' },
                    { sender: 'dosen', text: 'Sore Dewi. Silakan, sudah selesai pengumpulan datanya?', time: '15:10' },
                    { sender: 'mahasiswa', text: 'Sudah Pak, ini data kuesionernya sudah saya rekap.', time: '15:12', file: 'data-kuesioner-dewi.xlsx' },
                    { sender: 'dosen', text: 'Bagus. Coba olah datanya menggunakan SPSS untuk uji validitas dan reliabilitas dulu.', time: '15:20' },
                    { sender: 'mahasiswa', text: 'Baik Pak, nanti saya coba. Kalau ada kesulitan saya chat lagi ya Pak.', time: '15:25' },
                ],
                '5': [
                    { sender: 'mahasiswa', text: 'Pak, saya Eko. Mau tanya tentang sidang skripsi.', time: '08:00' },
                    { sender: 'dosen', text: 'Pagi Eko. Iya, ada apa?', time: '08:15' },
                    { sender: 'mahasiswa', text: 'Kapan kira-kira saya bisa daftar sidang Pak? Skripsi saya tinggal revisi akhir.', time: '08:17' },
                    { sender: 'dosen', text: 'Kalau revisi akhir sudah selesai, bisa langsung daftar ke akademik. Pastikan semua berkas administrasi lengkap.', time: '08:25' },
                    { sender: 'mahasiswa', text: 'Siap Pak! Ini daftar berkas yang perlu disiapkan apa saja ya?', time: '08:28' },
                    { sender: 'dosen', text: 'Nanti saya kirimkan checklistnya ya.', time: '08:35', file: 'checklist-sidang.pdf' },
                    { sender: 'mahasiswa', text: 'Terima kasih banyak Pak!', time: '08:40' },
                ]
            };

            // Ambil pesan berdasarkan ID, jika tidak ada gunakan default
            const dummyMessages = allMessages[mahasiswaId] || [
                { sender: 'mahasiswa', text: 'Selamat pagi Pak, saya ' + name + '. Ada yang ingin saya konsultasikan.', time: '09:00' },
                { sender: 'dosen', text: 'Selamat pagi ' + name + '. Silakan, ada yang bisa saya bantu?', time: '09:05' },
            ];

            messagesContainer.innerHTML = '';
            dummyMessages.forEach(msg => {
                const isSent = msg.sender === 'dosen';
                const fileIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/></svg>`;
                const messageHtml = `
                    <div class="d-flex ${isSent ? 'justify-content-end' : 'justify-content-start'} mb-3">
                        <div style="max-width: 70%;">
                            <div style="background: ${isSent ? 'var(--primary-teal)' : '#ffffff'}; color: ${isSent ? 'white' : '#333'}; padding: 0.75rem 1rem; border-radius: ${isSent ? '1rem 1rem 0 1rem' : '1rem 1rem 1rem 0'}; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                ${msg.text}
                                ${msg.file ? `<div class="mt-2"><a href="#" style="color: ${isSent ? 'white' : 'var(--primary-dark)'}; text-decoration: underline; font-size: 0.85rem;">${fileIcon} ${msg.file}</a></div>` : ''}
                            </div>
                            <div style="font-size: 0.7rem; color: #999; margin-top: 0.25rem; text-align: ${isSent ? 'right' : 'left'};">${msg.time}</div>
                        </div>
                    </div>
                `;
                messagesContainer.innerHTML += messageHtml;
            });

            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        // File input handler
        document.getElementById('fileInput')?.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                document.getElementById('fileSelectedWrapper').style.display = 'block';
                document.getElementById('fileName').textContent = this.files[0].name;
            }
        });

        function clearFile() {
            document.getElementById('fileInput').value = '';
            document.getElementById('fileSelectedWrapper').style.display = 'none';
        }

        // Chat form submit
        document.getElementById('chatForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value;
            const fileInputEl = document.getElementById('fileInput');
            const file = fileInputEl.files[0];

            if (message.trim() || file) {
                const messagesContainer = document.getElementById('chatMessages');
                const now = new Date();
                const time = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
                const fileIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/></svg>`;
                
                const messageHtml = `
                    <div class="d-flex justify-content-end mb-3">
                        <div style="max-width: 70%;">
                            <div style="background: var(--primary-teal); color: white; padding: 0.75rem 1rem; border-radius: 1rem 1rem 0 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                ${message}
                                ${file ? `<div class="mt-2"><a href="#" style="color: white; text-decoration: underline; font-size: 0.85rem;">${fileIcon} ${file.name}</a></div>` : ''}
                            </div>
                            <div style="font-size: 0.7rem; color: #999; margin-top: 0.25rem; text-align: right;">${time}</div>
                        </div>
                    </div>
                `;
                messagesContainer.innerHTML += messageHtml;
                messagesContainer.scrollTop = messagesContainer.scrollHeight;

                // Clear input
                messageInput.value = '';
                clearFile();
            }
        });

        // ========== PROGRES BIMBINGAN FUNCTIONALITY ==========
        
        // Open feedback modal
        function openFeedbackModal(progresId, title, mahasiswaName) {
            const modal = new bootstrap.Modal(document.getElementById('modalFeedback'));
            document.getElementById('feedbackProgresTitle').textContent = title;
            document.getElementById('feedbackMahasiswaName').textContent = 'Dari: ' + mahasiswaName;
            document.getElementById('formFeedback').action = '/progres-bimbingan/' + progresId + '/feedback';
            modal.show();
        }

        // Handle feedback form submission
        document.getElementById('formFeedback')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Mengirim...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close modal
                    bootstrap.Modal.getInstance(document.getElementById('modalFeedback')).hide();
                    
                    // Show success alert
                    const alertHtml = `
                        <div class="alert alert-success alert-dismissible fade show position-fixed" style="top: 80px; right: 20px; z-index: 9999; max-width: 400px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            <strong>Berhasil!</strong> Feedback telah dikirim ke mahasiswa.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
                    document.body.insertAdjacentHTML('beforeend', alertHtml);
                    
                    // Reload page after 1.5s
                    setTimeout(() => location.reload(), 1500);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });

        // Filter progres by status
        document.getElementById('filterStatusProgres')?.addEventListener('change', function() {
            const status = this.value;
            const cards = document.querySelectorAll('.progres-card');
            
            cards.forEach(card => {
                const cardStatus = card.dataset.status;
                if (status === 'semua' || cardStatus === status) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Search progres
        document.getElementById('searchProgres')?.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.progres-card');
            
            cards.forEach(card => {
                const mahasiswa = card.dataset.mahasiswa;
                const text = card.textContent.toLowerCase();
                if (text.includes(searchTerm) || mahasiswa.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
