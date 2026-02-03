<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresBimbingan extends Model
{
    use HasFactory;

    protected $table = 'progres_bimbingans';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'judul',
        'deskripsi',
        'file_path',
        'status',
        'feedback',
        'feedback_at',
    ];

    protected $casts = [
        'feedback_at' => 'datetime',
    ];

    /**
     * Relasi ke mahasiswa
     */
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    /**
     * Relasi ke dosen
     */
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
