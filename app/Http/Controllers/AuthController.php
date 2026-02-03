<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show unified login page
     */
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectToDashboard(Auth::user());
        }
        
        return view('auth.login');
    }

    /**
     * Handle login request berdasarkan role
     * 
     * Alur Login:
     * 1. User memilih role (mahasiswa/dosen/admin)
     * 2. Form menyesuaikan dengan role:
     *    - Mahasiswa: NIM sebagai id_user
     *    - Dosen: NIP sebagai id_user
     *    - Admin: username/id_user
     * 3. Sistem memvalidasi kredensial
     * 4. Redirect ke dashboard sesuai role
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ], [
            'id_user.required' => 'ID User wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'role.required' => 'Silakan pilih role Anda.',
            'role.in' => 'Role tidak valid.',
        ]);

        $idUser = $request->id_user;
        $role = $request->role;
        $user = null;

        // Cari user berdasarkan role dan identifier yang sesuai
        switch ($role) {
            case 'mahasiswa':
                // Mahasiswa login menggunakan NIM
                $user = User::where('nim', $idUser)
                    ->where('role', 'mahasiswa')
                    ->first();
                
                if (!$user) {
                    return back()
                        ->withInput($request->only('id_user', 'role'))
                        ->withErrors(['id_user' => 'NIM tidak ditemukan atau bukan akun mahasiswa.']);
                }
                break;

            case 'dosen':
                // Dosen login menggunakan NIP
                $user = User::where('nip', $idUser)
                    ->where('role', 'dosen')
                    ->first();
                
                if (!$user) {
                    return back()
                        ->withInput($request->only('id_user', 'role'))
                        ->withErrors(['id_user' => 'NIP tidak ditemukan atau bukan akun dosen.']);
                }
                break;

            case 'admin':
                // Admin login menggunakan username, email, atau NIP
                $user = User::where('role', 'admin')
                    ->where(function ($query) use ($idUser) {
                        $query->where('username', $idUser)
                            ->orWhere('email', $idUser)
                            ->orWhere('nip', $idUser);
                    })
                    ->first();
                
                if (!$user) {
                    return back()
                        ->withInput($request->only('id_user', 'role'))
                        ->withErrors(['id_user' => 'ID User tidak ditemukan atau bukan akun admin.']);
                }
                break;
        }

        // Verifikasi password
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('id_user', 'role'))
                ->withErrors(['password' => 'Password yang Anda masukkan salah.']);
        }

        // Login user
        Auth::login($user, $request->filled('remember'));

        // Regenerate session untuk keamanan
        $request->session()->regenerate();

        // DEBUG: Log untuk memastikan user terautentikasi
        \Log::info('Login berhasil', [
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'role' => Auth::user()->role
        ]);

        // Redirect ke dashboard sesuai role
        return $this->redirectToDashboard($user);
    }

    /**
     * Redirect user ke dashboard sesuai role
     */
    protected function redirectToDashboard(User $user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect('/admin/dashboard');
            case 'dosen':
                return redirect('/dosen/dashboard');
            case 'mahasiswa':
                return redirect('/mahasiswa/dashboard');
            default:
                return redirect('/');
        }
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah berhasil logout.');
    }
}
