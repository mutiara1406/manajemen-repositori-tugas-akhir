<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositori Tugas Akhir | Prodi Informatika UIN Sunan Kalijaga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #008B8B;
            --primary-dark: #006666;
            --accent-orange: #FF6B35;
            --bg-light: #f0f0f0;
            --text-dark: #2c3e50;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #ffffff;
            color: var(--text-dark);
        }
        
        /* Top Navigation */
        .top-nav {
            background-color: var(--primary-teal);
            padding: 0.5rem 2rem;
        }
        
        .top-nav .nav-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .top-nav .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
        }
        
        .top-nav .nav-brand img {
            height: 40px;
        }
        
        .top-nav .nav-brand-text {
            line-height: 1.2;
        }
        
        .top-nav .nav-brand-text small {
            font-size: 0.65rem;
            opacity: 0.9;
            display: block;
        }
        
        .top-nav .nav-brand-text strong {
            font-size: 0.9rem;
            font-weight: 700;
            display: block;
        }
        
        .top-nav .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .top-nav a {
            color: white;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: opacity 0.3s;
        }
        
        .top-nav a:hover {
            opacity: 0.8;
        }
        
        /* Sign On Dropdown */
        .signon-dropdown {
            position: relative;
        }
        
        .signon-btn {
            background: transparent;
            color: white;
            border: none;
            padding: 0.4rem 0.75rem;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .signon-btn:hover {
            opacity: 0.8;
        }
        
        .dropdown-menu-signon {
            position: absolute;
            top: 100%;
            right: 0;
            background: #333;
            min-width: 180px;
            display: none;
            z-index: 1000;
            margin-top: 0.25rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .dropdown-menu-signon.show {
            display: block;
        }
        
        .dropdown-menu-signon a {
            display: block;
            padding: 0.75rem 1rem;
            color: white;
            text-decoration: none;
            font-size: 0.85rem;
            border-bottom: 1px solid #444;
            transition: background 0.2s;
        }
        
        .dropdown-menu-signon a:last-child {
            border-bottom: none;
        }
        
        .dropdown-menu-signon a:hover {
            background: #444;
        }
        
        .dropdown-menu-signon a .role-icon {
            margin-right: 0.5rem;
        }
        
        /* Search Section */
        .search-section {
            background: var(--bg-light);
            padding: 2rem;
        }
        
        .search-box {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            gap: 0.5rem;
        }
        
        .search-box input {
            flex: 1;
            padding: 0.85rem 1.25rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.95rem;
        }
        
        .search-box input:focus {
            outline: none;
            border-color: var(--primary-teal);
        }
        
        .search-box .btn-search {
            background: var(--accent-orange);
            color: white;
            border: none;
            padding: 0.85rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
        }
        
        .search-box .btn-search:hover {
            background: #e55a2b;
        }
        
        /* Categories Section - 4 Peminatan */
        .categories-section {
            padding: 2.5rem 2rem;
            background: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .section-title h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
        }
        
        .section-title p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
            max-width: 1100px;
            margin: 0 auto;
        }
        
        .category-card {
            background: var(--primary-teal);
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            color: white;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,139,139,0.3);
        }
        
        .category-card .icon {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        
        .category-card .icon svg {
            width: 32px;
            height: 32px;
            fill: white;
        }
        
        .category-card h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .category-card p {
            font-size: 0.8rem;
            opacity: 0.9;
            margin-bottom: 1rem;
        }
        
        .category-card .count {
            background: rgba(255,255,255,0.2);
            padding: 0.35rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 1rem;
        }
        
        /* Filter Peminatan Dropdown */
        .peminatan-filter-wrapper {
            margin-top: 1rem;
            text-align: left;
        }
        
        .peminatan-filter-wrapper label {
            display: block;
            font-size: 0.75rem;
            margin-bottom: 0.35rem;
            opacity: 0.9;
        }
        
        .peminatan-select {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 4px;
            background: white;
            color: #333;
            font-size: 0.8rem;
            cursor: pointer;
        }
        
        .peminatan-select:focus {
            outline: none;
            border-color: var(--accent-orange);
        }
        
        .category-card .btn-browse {
            background: var(--accent-orange);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .category-card .btn-browse:hover {
            background: #e55a2b;
        }
        
        /* Latest Additions Section */
        .latest-section {
            background: white;
            padding: 2.5rem 2rem;
            border-top: 1px solid #e0e0e0;
        }
        
        .latest-section .section-title h2 {
            font-size: 1.3rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .latest-list {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .latest-item {
            padding: 1rem 0;
            border-bottom: 1px solid #e8e8e8;
            line-height: 1.6;
        }
        
        .latest-item:last-child {
            border-bottom: none;
        }
        
        .latest-item .author {
            color: #333;
            font-size: 0.9rem;
        }
        
        .latest-item .title-link {
            color: var(--primary-teal);
            font-style: italic;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .latest-item .title-link:hover {
            text-decoration: underline;
        }
        
        .latest-item .thesis-info {
            color: #333;
            font-size: 0.9rem;
        }
        
        .btn-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary-teal);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .btn-read-more:hover {
            background: var(--primary-dark);
            color: white;
        }
        
        .latest-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.5rem;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Dosen Section */
        .dosen-section {
            padding: 2.5rem 2rem;
            background: white;
        }
        
        .dosen-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .dosen-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.25rem;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid #e0e0e0;
        }
        
        .dosen-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transform: translateY(-3px);
        }
        
        .dosen-card .avatar {
            width: 60px;
            height: 60px;
            background: var(--primary-teal);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
        }
        
        .dosen-card h5 {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }
        
        .dosen-card p {
            font-size: 0.7rem;
            color: #666;
            margin: 0;
        }
        
        .dosen-card .stats {
            margin-top: 0.75rem;
            font-size: 0.7rem;
            color: var(--primary-teal);
            font-weight: 600;
        }
        
        /* Footer */
        .footer {
            background: var(--primary-dark);
            color: white;
            padding: 1.5rem 2rem;
            text-align: center;
        }
        
        .footer p {
            font-size: 0.8rem;
            opacity: 0.9;
            margin: 0;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .dosen-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .category-grid, .latest-grid {
                grid-template-columns: 1fr;
            }
            .search-box {
                flex-direction: column;
            }
            .top-nav .nav-menu {
                gap: 0.75rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>

    <!-- Top Navigation -->
    <nav class="top-nav">
        <div class="nav-menu">
            <!-- Left: Branding -->
            <div class="nav-brand">
                <img src="{{ asset('Images/Logo-UIN-SUKA.png') }}" alt="Logo UIN" onerror="this.style.display='none'">
                <div class="nav-brand-text">
                    <small>Prodi Informatika</small>
                    <strong>INSTITUTIONAL REPOSITORY</strong>
                    <small>UIN Sunan Kalijaga Yogyakarta</small>
                </div>
            </div>
            
            <!-- Right: Navigation Links -->
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">Panduan</a>
                
                <!-- Sign On Dropdown -->
                <div class="signon-dropdown">
                    <button class="signon-btn" onclick="toggleSignonDropdown()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                        Sign on to:
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                        </svg>
                    </button>
                    
                    <div class="dropdown-menu-signon" id="signonDropdown">
                        <a href="{{ route('login.admin') }}">
                            <span class="role-icon">👑</span> Admin
                        </a>
                        <a href="{{ route('login.dosen') }}">
                            <span class="role-icon">👨‍🏫</span> Dosen
                        </a>
                        <a href="{{ route('login.mahasiswa') }}">
                            <span class="role-icon">🎓</span> Mahasiswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Section -->
    <section class="search-section">
        <form class="search-box" id="mainSearchForm">
            <input type="text" id="mainSearchInput" placeholder="Masukkan kata kunci pencarian judul tugas akhir...">
            <button type="submit" class="btn-search">Search</button>
        </form>
    </section>

    <!-- Categories by 4 Peminatan -->
    <section class="categories-section">
        <div class="section-title">
            <h2>PEMINATAN</h2>
            <p>Jelajahi tugas akhir berdasarkan peminatan Prodi Informatika</p>
        </div>
        
        <div class="category-grid">
            <!-- Sistem Informasi -->
            <div class="category-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                </div>
                <h4>SISTEM INFORMASI</h4>
                <p>Analisis & Pengembangan SI</p>
                <a href="?peminatan=sistem_informasi" class="btn-browse mt-3">BROWSE</a>
            </div>
            
            <!-- Sistem Cerdas -->
            <div class="category-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
                        <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
                    </svg>
                </div>
                <h4>SISTEM CERDAS</h4>
                <p>AI & Machine Learning</p>
                <a href="?peminatan=sistem_cerdas" class="btn-browse mt-3">BROWSE</a>
            </div>
            
            <!-- Jaringan Komputer -->
            <div class="category-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path d="M6 9a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3A.5.5 0 0 1 6 9zM3.854 4.146a.5.5 0 1 0-.708.708L4.793 6.5 3.146 8.146a.5.5 0 1 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12z"/>
                    </svg>
                </div>
                <h4>JARINGAN KOMPUTER</h4>
                <p>Infrastruktur & Keamanan</p>
                <a href="?peminatan=jaringan_komputer" class="btn-browse mt-3">BROWSE</a>
            </div>
            
            <!-- Rekayasa Perangkat Lunak -->
            <div class="category-card">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
                    </svg>
                </div>
                <h4>REKAYASA PERANGKAT LUNAK</h4>
                <p>Software Engineering</p>
                <a href="?peminatan=rekayasa_perangkat_lunak" class="btn-browse mt-3">BROWSE</a>
            </div>
        </div>
    </section>

    <!-- Latest Additions -->
    <section class="latest-section">
        <div class="section-title">
            <h2>LATEST ADDITIONS</h2>
        </div>
        
        <div class="latest-list">
            @forelse(($judulTAs ?? collect())->take(3) as $judul)
            <div class="latest-item">
                <span class="author">{{ $judul->nama_penulis ?? 'Anonim' }}, NIM: {{ $judul->nim_penulis ?? '-' }} ({{ $judul->angkatan ?? date('Y') }})</span>
                <a href="#" class="title-link">{{ strtoupper($judul->judul) }}</a>.
                <span class="thesis-info">Skripsi thesis, UIN SUNAN KALIJAGA YOGYAKARTA.</span>
            </div>
            @empty
            <div class="latest-item">
                <p class="text-muted">Belum ada data judul tersedia</p>
            </div>
            @endforelse
        </div>
        
        <div class="latest-footer">
            <a href="#" class="btn-read-more">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5.793L8.146 4.854a.5.5 0 1 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L10.793 8.5H5a.5.5 0 0 1-.5-.5z"/>
                </svg>
                Read More
            </a>
        </div>
    </section>

    <!-- Dosen Section -->
    <section class="dosen-section">
        <div class="section-title">
            <h2>👨‍🏫 Dosen Informatika</h2>
            <p>Dosen Prodi Informatika UIN Sunan Kalijaga</p>
        </div>
        
        <div class="dosen-grid">
            @forelse($dosenList ?? [] as $dosen)
            <div class="dosen-card">
                <div class="avatar">{{ strtoupper(substr($dosen->nama ?? $dosen->name, 0, 2)) }}</div>
                <h5>{{ $dosen->nama ?? $dosen->name }}</h5>
                <p>{{ $dosen->nip ?? 'NIP -' }}</p>
            </div>
            @empty
            <div class="dosen-card">
                <div class="avatar">DR</div>
                <h5>Dosen 1</h5>
                <p>NIP 198xxxxxxx</p>
            </div>
            <div class="dosen-card">
                <div class="avatar">IR</div>
                <h5>Dosen 2</h5>
                <p>NIP 198xxxxxxx</p>
            </div>
            <div class="dosen-card">
                <div class="avatar">MK</div>
                <h5>Dosen 3</h5>
                <p>NIP 198xxxxxxx</p>
            </div>
            <div class="dosen-card">
                <div class="avatar">AS</div>
                <h5>Dosen 4</h5>
                <p>NIP 198xxxxxxx</p>
            </div>
            @endforelse
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>© {{ date('Y') }} Repositori Tugas Akhir - Prodi Informatika UIN Sunan Kalijaga Yogyakarta</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sign On Dropdown
        function toggleSignonDropdown() {
            const dropdown = document.getElementById('signonDropdown');
            dropdown.classList.toggle('show');
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('signonDropdown');
            const signonBtn = document.querySelector('.signon-btn');
            
            if (!dropdown.contains(e.target) && !signonBtn.contains(e.target)) {
                dropdown.classList.remove('show');
            }
        });
        
        // Search functionality
        document.getElementById('mainSearchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = document.getElementById('mainSearchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.title-card');
            
            cards.forEach(card => {
                const title = card.querySelector('h5').textContent.toLowerCase();
                const meta = card.querySelector('.meta').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || meta.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
        
        // Peminatan dropdown filter
        function filterByPeminatan(selectElement) {
            const profesi = selectElement.dataset.profesi;
            const peminatan = selectElement.value;
            
            if (peminatan) {
                // Redirect to filtered results
                window.location.href = '?profesi=' + profesi + '&peminatan=' + peminatan;
            }
        }
    </script>
</body>
</html>
