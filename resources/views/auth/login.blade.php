<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Repositori TA UIN Sunan Kalijaga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #008B8B;
            --primary-dark: #006666;
            --bg-light: #f8f9fa;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Header */
        .header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .brand img {
            height: 50px;
        }
        
        .brand-text h1 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-teal);
            margin: 0;
        }
        
        .brand-text small {
            font-size: 0.75rem;
            color: #666;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .login-container {
            width: 100%;
            max-width: 500px;
        }
        
        /* Login Card */
        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--primary-teal) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .login-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            font-size: 0.9rem;
            opacity: 0.9;
            margin: 0;
        }
        
        /* Role Selector */
        .role-selector {
            padding: 1.5rem 2rem;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }
        
        .role-selector-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #555;
            margin-bottom: 0.75rem;
            display: block;
        }
        
        .role-tabs {
            display: flex;
            gap: 0.5rem;
        }
        
        .role-tab {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
        }
        
        .role-tab:hover {
            border-color: var(--primary-teal);
            background: #f0f9f9;
        }
        
        .role-tab.active {
            border-color: var(--primary-teal);
            background: linear-gradient(135deg, var(--primary-teal) 0%, var(--primary-dark) 100%);
            color: white;
        }
        
        .role-tab .role-icon {
            font-size: 1.5rem;
        }
        
        .role-tab .role-name {
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .role-tab.active .role-name {
            color: white;
        }
        
        /* Login Form */
        .login-form {
            padding: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-label .label-icon {
            font-size: 1rem;
        }
        
        .form-control {
            padding: 0.85rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 3px rgba(0, 139, 139, 0.1);
        }
        
        .form-control::placeholder {
            color: #aaa;
        }
        
        .input-hint {
            font-size: 0.75rem;
            color: #888;
            margin-top: 0.35rem;
        }
        
        /* Password Toggle */
        .password-wrapper {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            padding: 5px;
        }
        
        .password-toggle:hover {
            color: var(--primary-teal);
        }
        
        /* Submit Button */
        .btn-login {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--primary-teal) 0%, var(--primary-dark) 100%);
            border: none;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 139, 139, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        /* Alert */
        .alert {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        
        .alert-danger {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            color: #c53030;
        }
        
        .alert-success {
            background: #f0fff4;
            border: 1px solid #9ae6b4;
            color: #276749;
        }
        
        /* Footer Link */
        .login-footer {
            padding: 1.25rem 2rem;
            text-align: center;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
        
        .login-footer a {
            color: var(--primary-teal);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .login-footer a:hover {
            text-decoration: underline;
        }
        
        /* ID Label Dynamic */
        #id-label {
            transition: all 0.3s ease;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .role-tabs {
                flex-direction: column;
            }
            
            .role-tab {
                flex-direction: row;
                justify-content: center;
            }
            
            .login-form {
                padding: 1.5rem;
            }
            
            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="brand">
            <img src="{{ asset('Images/Logo-UIN-SUKA.png') }}" alt="Logo UIN" onerror="this.style.display='none'">
            <div class="brand-text">
                <h1>Manajemen Repositori Tugas Akhir</h1>
                <small>UIN Sunan Kalijaga Yogyakarta</small>
            </div>
        </div>
        <a href="{{ route('home') }}" style="color: var(--primary-teal); text-decoration: none; font-size: 0.9rem;">
            ← Kembali ke Beranda
        </a>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="login-container">
            <div class="login-card">
                <!-- Login Header -->
                <div class="login-header">
                    <h2>🔐 Masuk ke Sistem</h2>
                    <p>Silakan pilih role dan masukkan kredensial Anda</p>
                </div>

                <!-- Role Selector -->
                <div class="role-selector">
                    <span class="role-selector-label">Masuk sebagai:</span>
                    <div class="role-tabs">
                        <div class="role-tab active" data-role="mahasiswa" onclick="selectRole('mahasiswa')">
                            <span class="role-icon">🎓</span>
                            <span class="role-name">Mahasiswa</span>
                        </div>
                        <div class="role-tab" data-role="dosen" onclick="selectRole('dosen')">
                            <span class="role-icon">👨‍🏫</span>
                            <span class="role-name">Dosen</span>
                        </div>
                        <div class="role-tab" data-role="admin" onclick="selectRole('admin')">
                            <span class="role-icon">👑</span>
                            <span class="role-name">Admin</span>
                        </div>
                    </div>
                </div>

                <!-- Login Form -->
                <form class="login-form" method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    <input type="hidden" name="role" id="role-input" value="mahasiswa">

                    <!-- Alert Messages -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- ID User Input -->
                    <div class="form-group">
                        <label class="form-label" for="id_user">
                            <span class="label-icon" id="id-icon">🆔</span>
                            <span id="id-label">NIM (Nomor Induk Mahasiswa)</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="id_user" 
                            name="id_user" 
                            placeholder="Masukkan NIM Anda"
                            value="{{ old('id_user') }}"
                            required
                            autocomplete="username"
                        >
                        <div class="input-hint" id="id-hint">Contoh: 22106050070</div>
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label class="form-label" for="password">
                            <span class="label-icon">🔑</span>
                            Password
                        </label>
                        <div class="password-wrapper">
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="Masukkan password Anda"
                                required
                                autocomplete="current-password"
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember" style="font-size: 0.9rem; color: #666;">
                                Ingat saya
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        Masuk
                    </button>
                </form>

                <!-- Footer -->
                <div class="login-footer">
                    <a href="{{ route('home') }}">← Kembali ke Halaman Utama</a>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Role configuration
        const roleConfig = {
            mahasiswa: {
                label: 'NIM (Nomor Induk Mahasiswa)',
                placeholder: 'Masukkan NIM Anda',
                hint: 'Contoh: 22106050070',
                icon: '🆔'
            },
            dosen: {
                label: 'NIP (Nomor Induk Pegawai)',
                placeholder: 'Masukkan NIP Anda',
                hint: 'Contoh: 198505152010011001',
                icon: '🪪'
            },
            admin: {
                label: 'ID User / Username',
                placeholder: 'Masukkan ID User atau Username',
                hint: 'Contoh: admin',
                icon: '👤'
            }
        };

        // Select role function
        function selectRole(role) {
            // Update active tab
            document.querySelectorAll('.role-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector(`.role-tab[data-role="${role}"]`).classList.add('active');

            // Update hidden input
            document.getElementById('role-input').value = role;

            // Update form labels and placeholders
            const config = roleConfig[role];
            document.getElementById('id-label').textContent = config.label;
            document.getElementById('id_user').placeholder = config.placeholder;
            document.getElementById('id-hint').textContent = config.hint;
            document.getElementById('id-icon').textContent = config.icon;

            // Clear input value
            document.getElementById('id_user').value = '';
            document.getElementById('id_user').focus();
        }

        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                `;
            }
        }

        // Initialize based on URL parameter or default
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const role = urlParams.get('role') || 'mahasiswa';
            selectRole(role);
        });
    </script>

</body>
</html>
