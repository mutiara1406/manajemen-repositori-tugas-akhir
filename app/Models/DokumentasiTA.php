<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumentasiTA extends Model
{
    protected $table = 'dokumentasi_tas';

    protected $fillable = [
        'judul',
        'nama_penulis',
        'nim_penulis',
        'jenis_ta',
        'peminatan',
        'dosen_pembimbing',
        'prodi',
        'arah_profesi',
        'tahun_selesai',
        'abstrak_bahasa_indonesia',
        'abstrak_bahasa_inggris',
        'file_lembar_pengesahan',
        'file_skripsi_full_text',
        'date_deposited',
        'last_modified',
    ];

    protected $casts = [
        'tahun_selesai' => 'integer',
    ];
}
