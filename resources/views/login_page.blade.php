<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login {{ ucfirst($role ?? 'User') }} | Repositori TA UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #008B8B;
            --primary-dark: #006666;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }
        
        /* Top Bar */
        .top-bar {
            background: #333;
            padding: 0.5rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .top-bar img {
            height: 30px;
        }
        
        .hamburger {
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Login Breadcrumb */
        .login-breadcrumb {
            background: var(--primary-teal);
            padding: 0.5rem 1rem;
            color: white;
            font-size: 0.9rem;
        }
        
        .login-breadcrumb a {
            color: white;
            text-decoration: none;
        }
        
        .login-breadcrumb a:hover {
            text-decoration: underline;
        }
        
        /* Header Brand */
        .header-brand {
            background: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
        
        .brand-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .brand-content img {
            height: 70px;
        }
        
        .brand-text h1 {
            font-size: 1.5rem;
            font-weight: 300;
            color: #333;
            letter-spacing: 2px;
            margin: 0;
        }
        
        .brand-text h1 strong {
            font-weight: 700;
            color: var(--primary-teal);
        }
        
        .brand-text small {
            font-size: 0.7rem;
            color: var(--primary-teal);
            text-transform: uppercase;
            letter-spacing: 1px;
            background: #ffd700;
            padding: 0.15rem 0.5rem;
            display: inline-block;
        }
        
        .dark-mode-btn {
            width: 50px;
            height: 50px;
            background: var(--primary-teal);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .dark-mode-btn svg {
            width: 24px;
            height: 24px;
            fill: white;
        }
        
        /* Login Container */
        .login-container {
            max-width: 600px;
            margin: 3rem auto;
            padding: 0 1rem;
        }
        
        .login-title {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .login-title h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
            text-transform: uppercase;
        }
        
        .login-title p {
            color: #666;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        
        .login-title p a {
            color: var(--primary-teal);
            text-decoration: none;
        }
        
        .login-title p a:hover {
            text-decoration: underline;
        }
        
        /* Role Badge */
        .role-badge {
            display: inline-block;
            padding: 0.35rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .role-badge.mahasiswa {
            background: #e3f2fd;
            color: #1565c0;
        }
        
        .role-badge.dosen {
            background: #fff3e0;
            color: #e65100;
        }
        
        .role-badge.admin {
            background: #fce4ec;
            color: #c2185b;
        }
        
        /* Login Form */
        .login-form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        
        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .form-row label {
            width: 120px;
            font-weight: 500;
            color: #333;
            font-size: 0.9rem;
        }
        
        .form-row input {
            flex: 1;
            padding: 0.6rem 0.75rem;
            border: 1px solid #ccc;
            font-size: 0.9rem;
        }
        
        .form-row input:focus {
            outline: none;
            border-color: var(--primary-teal);
        }
        
        .btn-login {
            background: var(--primary-teal);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.9rem;
        }
        
        .btn-login:hover {
            background: var(--primary-dark);
        }
        
        .login-note {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.8rem;
            color: #666;
        }
        
        .alert-danger {
            background: #ffeaea;
            border: 1px solid #ffcaca;
            color: #c0392b;
            padding: 0.75rem 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }
        
        /* Back Link */
        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .back-link a {
            color: var(--primary-teal);
            text-decoration: none;
            font-size: 0.85rem;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .form-row {
                flex-direction: column;
                align-items: stretch;
            }
            
            .form-row label {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            
            .header-brand {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <img src="{{ asset('Images/Logo-UIN-SUKA.png') }}" alt="Logo" onerror="this.style.display='none'">
        <div class="hamburger">☰</div>
    </div>

    <!-- Breadcrumb -->
    <div class="login-breadcrumb">
        <a href="{{ route('home') }}">Home</a> / Login {{ ucfirst($role ?? 'User') }}
    </div>

    <!-- Header Brand -->
    <header class="header-brand">
        <div class="brand-content">
            <img src="{{ asset('Images/Logo-UIN-SUKA.png') }}" alt="Logo UIN" onerror="this.style.display='none'">
            <div class="brand-text">
                <h1>INSTITUTIONAL <strong>REPOSITORY</strong></h1>
                <small>UIN Sunan Kalijaga Yogyakarta</small>
            </div>
        </div>
        <div class="dark-mode-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
            </svg>
        </div>
    </header>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-title">
            <span class="role-badge {{ $role ?? 'mahasiswa' }}">
                @if(($role ?? 'mahasiswa') == 'admin')
                    👑 Administrator
                @elseif(($role ?? 'mahasiswa') == 'dosen')
                    👨‍🏫 Dosen
                @else
                    🎓 Mahasiswa
                @endif
            </span>
            <h2>LOGIN</h2>
            <p>Please enter your username and password. If you have forgotten your password, you may <a href="#">reset</a> it.</p>
        </div>

        @if(session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="login-form" method="POST" action="{{ route('login.submit') }}">
            @csrf
            <input type="hidden" name="role" value="{{ $role ?? 'mahasiswa' }}">
            
            <div class="form-row">
                <label for="identifier">
                    @if(($role ?? 'mahasiswa') == 'mahasiswa')
                        NIM:
                    @elseif(($role ?? 'mahasiswa') == 'dosen')
                        NIP:
                    @else
                        Username:
                    @endif
                </label>
                <input type="text" id="identifier" name="identifier" required value="{{ old('identifier') }}"
                       placeholder="Masukkan {{ ($role ?? 'mahasiswa') == 'mahasiswa' ? 'NIM' : (($role ?? 'mahasiswa') == 'dosen' ? 'NIP' : 'Username') }}">
            </div>
            
            <div class="form-row">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password">
                <button type="submit" class="btn-login ms-2">Login</button>
            </div>
            
            <p class="login-note">Note: you must have cookies enabled.</p>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Halaman Utama</a>
        </div>
    </div>

</body>
</html>
