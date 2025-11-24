<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JudulTA extends Model
{
    protected $table = 'judul_tas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'abstrak_bahasa_indonesia',
        'peminatan',
        'arah_profesi',
        'angkatan',
        'nama_penulis',
        'nim_penulis',
    ];

    protected $casts = [
        'angkatan' => 'integer',
    ];
}
