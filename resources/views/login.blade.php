<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Repositori Tugas Akhir UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --light-green: #89C99A; /* Hijau muda yang tidak cerah */
            --dark-green: #38761D;  /* Hijau gelap untuk aksen */
            --bg-color: #f8f9fa;    /* Warna latar belakang putih/abu-abu muda */
        }
        body {
            background-color: var(--bg-color);
        }
        .login-card {
            max-width: 400px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-top: 5px solid var(--light-green); /* Aksen di bagian atas */
        }
        .header-text {
            color: var(--dark-green);
            font-weight: 600;
        }
        .btn-custom {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: #ffffff;
            font-weight: 500;
            padding: 10px 0;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-custom:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: #ffffff;
        }
        .form-control:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.25rem rgba(137, 201, 154, 0.25);
        }
        .logo-placeholder {
            font-size: 2rem;
            color: var(--light-green);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-card w-100">
        <div class="text-center">
            {{-- Logo atau Icon (Ganti dengan logo UIN Sunan Kalijaga jika ada) --}}
            <h1 class="logo-placeholder">🎓</h1>
            <h4 class="header-text mb-4">Repositori Tugas Akhir</h4>
            <p class="text-muted">Prodi Informatika UIN Sunan Kalijaga</p>
        </div>

        <form method="POST" action="LOGIN_ACTION_URL_HERE">
            @csrf {{-- Tambahkan CSRF token jika menggunakan Laravel --}}
            
            <div class="mb-3">
                <label for="email" class="form-label">Email / NIM / NIP</label>
                <input type="text" class="form-control" id="email" name="identifier" 
                       placeholder="Masukkan email atau nomor identitas Anda" required autofocus>
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Masukkan kata sandi Anda" required>
            </div>
            
            {{-- Bagian Hak Akses - Dapat diimplentasikan di backend 
                 berdasarkan format email/NIM/NIP yang dimasukkan. 
                 Untuk UX yang lebih baik, role tidak perlu dipilih di form. --}}
            
            <div class="d-grid">
                <button type="submit" class="btn btn-custom">
                    Masuk ke Sistem
                </button>
            </div>
            
            <div class="mt-4 text-center">
                <a href="FORGOT_PASSWORD_URL_HERE" class="text-secondary" 
                   style="font-size: 0.85rem; text-decoration: none;">Lupa Kata Sandi?</a>
            </div>
        </form>
        
        <div class="text-center mt-5">
             <p class="text-muted" style="font-size: 0.75rem;">© {{ date('Y') }} Sistem Informasi TA</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>