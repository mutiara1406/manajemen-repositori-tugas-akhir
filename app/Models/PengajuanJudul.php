<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanJudul extends Model
{
    protected $table = 'pengajuan_juduls';

    protected $fillable = [
        'user_id',
        'nama_mahasiswa',
        'nim_mahasiswa',
        'judul',
        'peminatan',
        'arah_profesi',
        'status',
        'catatan_admin',
    ];

    /**
     * Relationship dengan User (Mahasiswa)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
