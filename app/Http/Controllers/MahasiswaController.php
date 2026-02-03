<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JudulTA;
use App\Models\ChatKonsultasi;
use App\Models\ProgresBimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display mahasiswa dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        // Get dosen pembimbing
        $dosenPembimbing = $user->dosenPembimbing;
        
        // Get pengajuan judul terbaru
        $pengajuanJudul = $user->judul_ta ?? null;
        
        // Get progress bimbingan
        $progressBimbingan = ProgresBimbingan::where('mahasiswa_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Get chat konsultasi terbaru
        $chatTerbaru = ChatKonsultasi::where('mahasiswa_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Get unread chat count
        $unreadChatCount = ChatKonsultasi::where('mahasiswa_id', $user->id)
            ->where('is_read', false)
            ->where('pengirim', 'dosen')
            ->count();
        
        return view('mahasiswa.dashboard', compact(
            'user',
            'dosenPembimbing',
            'pengajuanJudul',
            'progressBimbingan',
            'chatTerbaru',
            'unreadChatCount'
        ));
    }
}
