<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa | Repositori TA UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #008B8B;
            --primary-dark: #006666;
            --sidebar-width: 260px;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--primary-teal) 0%, var(--primary-dark) 100%);
            color: white;
            overflow-y: auto;
            z-index: 1000;
        }
        
        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        
        .sidebar-brand img {
            height: 50px;
            margin-bottom: 0.5rem;
        }
        
        .sidebar-brand h5 {
            font-size: 0.9rem;
            margin: 0;
            font-weight: 600;
        }
        
        .sidebar-profile {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .profile-avatar {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            margin: 0 auto 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }
        
        .profile-name {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }
        
        .profile-nim {
            font-size: 0.8rem;
            opacity: 0.8;
        }
        
        .profile-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.7rem;
            margin-top: 0.5rem;
        }
        
        .sidebar-menu {
            padding: 1rem 0;
        }
        
        .menu-label {
            padding: 0.75rem 1.5rem 0.5rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.6;
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            gap: 0.75rem;
        }
        
        .menu-item:hover, .menu-item.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .menu-item.active {
            border-left: 3px solid white;
        }
        
        .menu-item svg {
            width: 18px;
            height: 18px;
        }
        
        .menu-item span {
            font-size: 0.9rem;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }
        
        .topbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .topbar-title h4 {
            margin: 0;
            font-weight: 600;
            color: #333;
        }
        
        .topbar-title p {
            margin: 0;
            font-size: 0.85rem;
            color: #666;
        }
        
        .content-wrapper {
            padding: 2rem;
        }
        
        /* Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            height: 100%;
        }
        
        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .stat-icon.blue { background: #e3f2fd; }
        .stat-icon.green { background: #e8f5e9; }
        .stat-icon.yellow { background: #fff8e1; }
        .stat-icon.red { background: #ffebee; }
        
        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
        }
        
        .stat-label {
            font-size: 0.85rem;
            color: #666;
        }
        
        /* Info Cards */
        .info-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .info-card-header {
            background: linear-gradient(135deg, var(--primary-teal), var(--primary-dark));
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }
        
        .info-card-body {
            padding: 1.5rem;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        .info-value {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }
        
        /* Quick Actions */
        .quick-action {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
            gap: 1rem;
        }
        
        .quick-action:hover {
            background: #e9ecef;
            color: #333;
            transform: translateY(-2px);
        }
        
        .quick-action-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        
        .quick-action-text h6 {
            margin: 0;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .quick-action-text p {
            margin: 0;
            font-size: 0.75rem;
            color: #666;
        }
        
        /* Progress Bar */
        .progress-custom {
            height: 10px;
            border-radius: 5px;
            background: #e9ecef;
        }
        
        .progress-custom .progress-bar {
            background: linear-gradient(90deg, var(--primary-teal), var(--primary-dark));
            border-radius: 5px;
        }
        
        /* Badges */
        .badge-status {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-status.aktif { background: #d4edda; color: #155724; }
        .badge-status.pending { background: #fff3cd; color: #856404; }
        .badge-status.selesai { background: #cce5ff; color: #004085; }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('Images/Logo-UIN-SUKA.png') }}" alt="Logo" onerror="this.style.display='none'">
            <h5>Repositori TA</h5>
        </div>
        
        <div class="sidebar-profile">
            <div class="profile-avatar">🎓</div>
            <div class="profile-name">{{ $user->name }}</div>
            <div class="profile-nim">{{ $user->nim }}</div>
            <span class="profile-badge">Mahasiswa</span>
        </div>
        
        <nav class="sidebar-menu">
            <div class="menu-label">Menu Utama</div>
            <a href="{{ route('mahasiswa.dashboard') }}" class="menu-item active">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146z"/>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('pengajuan.index') }}" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687z"/>
                </svg>
                <span>Kumpulan Judul</span>
            </a>
            <a href="{{ route('pengajuan.index') }}#pengajuan" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5V6.5z"/>
                </svg>
                <span>Pengajuan Judul</span>
            </a>
            <a href="{{ route('pengajuan.index') }}#konsultasi" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                </svg>
                <span>Konsultasi</span>
                @if($unreadChatCount > 0)
                <span class="badge bg-danger ms-auto">{{ $unreadChatCount }}</span>
                @endif
            </a>
            <a href="{{ route('pengajuan.index') }}#progres-bimbingan" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                </svg>
                <span>Progres Bimbingan</span>
            </a>
            <a href="{{ route('pengajuan.index') }}#dokumentasi" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                </svg>
                <span>Dokumentasi</span>
            </a>
            
            <div class="menu-label mt-3">Akun</div>
            <a href="#" class="menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Bar -->
        <div class="topbar">
            <div class="topbar-title">
                <h4>Dashboard</h4>
                <p>Selamat datang kembali, {{ $user->name }}!</p>
            </div>
            <div>
                <span class="text-muted" style="font-size: 0.85rem;">{{ now()->format('l, d F Y') }}</span>
            </div>
        </div>
        
        <!-- Content -->
        <div class="content-wrapper">
            <!-- Alert Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            
            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-value">{{ $user->progress ?? 0 }}%</div>
                                <div class="stat-label">Progress TA</div>
                            </div>
                            <div class="stat-icon blue">📊</div>
                        </div>
                        <div class="progress-custom">
                            <div class="progress-bar" style="width: {{ $user->progress ?? 0 }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-value">{{ ucfirst($user->tahap_ta ?? 'proposal') }}</div>
                                <div class="stat-label">Tahap Saat Ini</div>
                            </div>
                            <div class="stat-icon green">📝</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-value">{{ $progressBimbingan->count() ?? 0 }}</div>
                                <div class="stat-label">Total Bimbingan</div>
                            </div>
                            <div class="stat-icon yellow">💬</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-value">
                                    <span class="badge-status {{ $user->status_ta ?? 'pending' }}">{{ ucfirst($user->status_ta ?? 'pending') }}</span>
                                </div>
                                <div class="stat-label">Status TA</div>
                            </div>
                            <div class="stat-icon red">📋</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Dosen Pembimbing Info -->
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-card-header">
                            👨‍🏫 Dosen Pembimbing
                        </div>
                        <div class="info-card-body">
                            @if($dosenPembimbing)
                            <div class="text-center mb-3">
                                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-teal), var(--primary-dark)); border-radius: 50%; margin: 0 auto 0.75rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                    👨‍🎓
                                </div>
                                <h6 class="mb-1">{{ $dosenPembimbing->name }}</h6>
                                <small class="text-muted">NIP: {{ $dosenPembimbing->nip }}</small>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value">{{ $dosenPembimbing->email }}</span>
                            </div>
                            @else
                            <div class="text-center py-3">
                                <div style="font-size: 3rem; margin-bottom: 1rem;">👤</div>
                                <p class="text-muted mb-0">Belum ada dosen pembimbing</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Judul TA -->
                <div class="col-md-8">
                    <div class="info-card">
                        <div class="info-card-header">
                            📚 Judul Tugas Akhir
                        </div>
                        <div class="info-card-body">
                            @if($pengajuanJudul)
                            <h5 class="mb-3">{{ $pengajuanJudul }}</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <span class="info-label">Progress</span>
                                        <span class="info-value">{{ $user->progress ?? 0 }}%</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <span class="info-label">Tahap</span>
                                        <span class="info-value">{{ ucfirst($user->tahap_ta ?? 'proposal') }}</span>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="text-center py-4">
                                <div style="font-size: 3rem; margin-bottom: 1rem;">📝</div>
                                <p class="text-muted mb-3">Belum ada judul yang diajukan</p>
                                <a href="{{ route('pengajuan.index') }}#pengajuan" class="btn btn-primary">Ajukan Judul</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="row g-4 mt-2">
                <div class="col-12">
                    <h5 class="mb-3">Aksi Cepat</h5>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('pengajuan.index') }}#pengajuan" class="quick-action">
                        <div class="quick-action-icon" style="background: #e3f2fd;">📄</div>
                        <div class="quick-action-text">
                            <h6>Ajukan Judul</h6>
                            <p>Submit proposal judul TA</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('pengajuan.index') }}#konsultasi" class="quick-action">
                        <div class="quick-action-icon" style="background: #fff3e0;">💬</div>
                        <div class="quick-action-text">
                            <h6>Konsultasi</h6>
                            <p>Chat dengan dosen</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('pengajuan.index') }}#progres-bimbingan" class="quick-action">
                        <div class="quick-action-icon" style="background: #e8f5e9;">📊</div>
                        <div class="quick-action-text">
                            <h6>Upload Progres</h6>
                            <p>Kirim progres bimbingan</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('pengajuan.index') }}#dokumentasi" class="quick-action">
                        <div class="quick-action-icon" style="background: #fce4ec;">📁</div>
                        <div class="quick-action-text">
                            <h6>Dokumentasi</h6>
                            <p>Upload dokumen TA</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
