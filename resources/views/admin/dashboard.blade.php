<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Repositori TA UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-pink: #c2185b;
            --primary-dark: #880e4f;
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
            background: linear-gradient(180deg, var(--primary-pink) 0%, var(--primary-dark) 100%);
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
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
        }
        
        .stat-icon.blue { background: linear-gradient(135deg, #667eea, #764ba2); }
        .stat-icon.green { background: linear-gradient(135deg, #11998e, #38ef7d); }
        .stat-icon.yellow { background: linear-gradient(135deg, #f093fb, #f5576c); }
        .stat-icon.red { background: linear-gradient(135deg, #fc4a1a, #f7b733); }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #666;
        }
        
        /* Table Card */
        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .table-card-header {
            background: linear-gradient(135deg, var(--primary-pink), var(--primary-dark));
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table thead th {
            background: #f8f9fa;
            font-weight: 600;
            border: none;
            padding: 1rem;
            font-size: 0.85rem;
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            font-size: 0.9rem;
        }
        
        .table tbody tr:hover {
            background: #f8f9fa;
        }
        
        /* Quick Actions */
        .quick-action-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .quick-action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            color: inherit;
        }
        
        .quick-action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .quick-action-card h6 {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .quick-action-card p {
            font-size: 0.8rem;
            color: #666;
            margin: 0;
        }
        
        /* Badge */
        .badge-role {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .badge-role.mahasiswa { background: #e3f2fd; color: #1565c0; }
        .badge-role.dosen { background: #fff3e0; color: #e65100; }
        .badge-role.admin { background: #fce4ec; color: #c2185b; }
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
            <div class="profile-avatar">👑</div>
            <div class="profile-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
            <span class="profile-badge">Administrator</span>
        </div>
        
        <nav class="sidebar-menu">
            <div class="menu-label">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="menu-item active">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146z"/>
                </svg>
                <span>Dashboard</span>
            </a>
            
            <div class="menu-label">Manajemen</div>
            <a href="{{ route('admin.users.index') }}" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                    <path d="M5.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zM1 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8z"/>
                </svg>
                <span>Kelola User</span>
            </a>
            <a href="{{ route('admin.judul.index') }}" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828z"/>
                </svg>
                <span>Kelola Judul TA</span>
            </a>
            <a href="{{ route('admin.reports') }}" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <span>Laporan</span>
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
                <h4>Dashboard Administrator</h4>
                <p>Kelola sistem repositori tugas akhir</p>
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
                                <div class="stat-value">{{ $totalMahasiswa ?? 0 }}</div>
                                <div class="stat-label">Total Mahasiswa</div>
                            </div>
                            <div class="stat-icon blue">🎓</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-value">{{ $totalDosen ?? 0 }}</div>
                                <div class="stat-label">Total Dosen</div>
                            </div>
                            <div class="stat-icon green">👨‍🏫</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-value">{{ $totalJudulTA ?? 0 }}</div>
                                <div class="stat-label">Total Judul TA</div>
                            </div>
                            <div class="stat-icon yellow">📚</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-value">{{ $judulMenunggu ?? 0 }}</div>
                                <div class="stat-label">Menunggu Approval</div>
                            </div>
                            <div class="stat-icon red">⏳</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <h5 class="mb-3">Aksi Cepat</h5>
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <a href="{{ route('admin.users.create') }}" class="quick-action-card">
                        <div class="quick-action-icon" style="background: #e3f2fd;">➕</div>
                        <h6>Tambah User</h6>
                        <p>Buat akun baru</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.index') }}?role=mahasiswa" class="quick-action-card">
                        <div class="quick-action-icon" style="background: #e8f5e9;">🎓</div>
                        <h6>Kelola Mahasiswa</h6>
                        <p>Lihat daftar mahasiswa</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.index') }}?role=dosen" class="quick-action-card">
                        <div class="quick-action-icon" style="background: #fff3e0;">👨‍🏫</div>
                        <h6>Kelola Dosen</h6>
                        <p>Lihat daftar dosen</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.judul.index') }}?status=pending" class="quick-action-card">
                        <div class="quick-action-icon" style="background: #fce4ec;">📋</div>
                        <h6>Review Judul</h6>
                        <p>Approve judul TA</p>
                    </a>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Mahasiswa Terbaru -->
                <div class="col-md-6">
                    <div class="table-card">
                        <div class="table-card-header">
                            <span>🎓 Mahasiswa Terbaru</span>
                            <a href="{{ route('admin.users.index') }}?role=mahasiswa" class="text-white text-decoration-none" style="font-size: 0.8rem;">
                                Lihat Semua →
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Terdaftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($mahasiswaTerbaru ?? [] as $mhs)
                                    <tr>
                                        <td>{{ $mhs->name }}</td>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>{{ $mhs->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-3 text-muted">Belum ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Judul TA Terbaru -->
                <div class="col-md-6">
                    <div class="table-card">
                        <div class="table-card-header">
                            <span>📚 Judul TA Terbaru</span>
                            <a href="{{ route('admin.judul.index') }}" class="text-white text-decoration-none" style="font-size: 0.8rem;">
                                Lihat Semua →
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Mahasiswa</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($judulTerbaru ?? [] as $judul)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::limit($judul->judul, 30) }}</td>
                                        <td>{{ $judul->mahasiswa->name ?? '-' }}</td>
                                        <td>{{ $judul->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-3 text-muted">Belum ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
