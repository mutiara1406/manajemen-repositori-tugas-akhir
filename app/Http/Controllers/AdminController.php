<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JudulTA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function dashboard()
    {
        // Statistik
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalJudulTA = JudulTA::count();
        $judulMenunggu = JudulTA::where('status', 'pending')->count();
        
        // Data terbaru
        $mahasiswaTerbaru = User::where('role', 'mahasiswa')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $judulTerbaru = JudulTA::with('mahasiswa')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'totalJudulTA',
            'judulMenunggu',
            'mahasiswaTerbaru',
            'judulTerbaru'
        ));
    }

    /**
     * Display list of all users
     */
    public function indexUsers(Request $request)
    {
        $query = User::query();
        
        // Filter by role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
        
        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nim', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $users = $query->orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show create user form
     */
    public function createUser()
    {
        return view('admin.users.create');
    }

    /**
     * Store new user
     */
    public function storeUser(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ];
        
        // Tambahan validasi berdasarkan role
        if ($request->role === 'mahasiswa') {
            $rules['nim'] = 'required|string|unique:users,nim';
        } elseif ($request->role === 'dosen') {
            $rules['nip'] = 'required|string|unique:users,nip';
        }
        
        $validated = $request->validate($rules);
        
        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ];
        
        if ($request->role === 'mahasiswa') {
            $userData['nim'] = $validated['nim'];
        } elseif ($request->role === 'dosen') {
            $userData['nip'] = $validated['nip'];
        }
        
        User::create($userData);
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Show edit user form
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ];
        
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6|confirmed';
        }
        
        $validated = $request->validate($rules);
        
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        if ($request->filled('password')) {
            $user->password = bcrypt($validated['password']);
        }
        
        $user->save();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil diupdate.');
    }

    /**
     * Delete user
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting self
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }
        
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }

    /**
     * Display list of Judul TA
     */
    public function indexJudulTA(Request $request)
    {
        $query = JudulTA::with('mahasiswa');
        
        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhereHas('mahasiswa', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%{$search}%")
                            ->orWhere('nim', 'like', "%{$search}%");
                    });
            });
        }
        
        $judulTAs = $query->orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.judul.index', compact('judulTAs'));
    }

    /**
     * Approve Judul TA
     */
    public function approveJudul($id)
    {
        $judul = JudulTA::findOrFail($id);
        $judul->status = 'approved';
        $judul->save();
        
        return back()->with('success', 'Judul TA berhasil disetujui.');
    }

    /**
     * Reject Judul TA
     */
    public function rejectJudul(Request $request, $id)
    {
        $judul = JudulTA::findOrFail($id);
        $judul->status = 'rejected';
        $judul->catatan_reviewer = $request->catatan;
        $judul->save();
        
        return back()->with('success', 'Judul TA berhasil ditolak.');
    }

    /**
     * Display reports page
     */
    public function reports()
    {
        // Statistik per peminatan
        $peminatanStats = JudulTA::selectRaw('peminatan, count(*) as total')
            ->groupBy('peminatan')
            ->get();
            
        // Statistik per tahun
        $yearlyStats = JudulTA::selectRaw('YEAR(created_at) as year, count(*) as total')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();
            
        // Statistik per dosen
        $dosenStats = User::where('role', 'dosen')
            ->withCount('mahasiswaBimbingan')
            ->orderBy('mahasiswa_bimbingan_count', 'desc')
            ->get();
        
        return view('admin.reports', compact(
            'peminatanStats',
            'yearlyStats',
            'dosenStats'
        ));
    }
}
