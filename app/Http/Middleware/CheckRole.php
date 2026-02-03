<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * Middleware ini memvalidasi apakah user yang login memiliki role yang sesuai
     * untuk mengakses route tertentu.
     *
     * Usage:
     * Route::middleware(['auth', 'role:admin'])->group(...)
     * Route::middleware(['auth', 'role:dosen'])->group(...)
     * Route::middleware(['auth', 'role:mahasiswa'])->group(...)
     * Route::middleware(['auth', 'role:admin,dosen'])->group(...) // Multiple roles
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $roles  Comma-separated list of allowed roles
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();
        
        // Parse allowed roles (support multiple roles separated by comma)
        $allowedRoles = explode(',', $roles);
        
        // Check if user's role is in the allowed roles
        if (!in_array($user->role, $allowedRoles)) {
            // Redirect based on user's actual role
            $redirectRoute = match ($user->role) {
                'admin' => 'admin.dashboard',
                'dosen' => 'dosen.dashboard',
                'mahasiswa' => 'mahasiswa.dashboard',
                default => 'home',
            };
            
            return redirect()->route($redirectRoute)
                ->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        return $next($request);
    }
}
