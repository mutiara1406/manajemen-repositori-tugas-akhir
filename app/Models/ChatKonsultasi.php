<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatKonsultasi extends Model
{
    protected $table = 'chat_konsultasis';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'pesan',
        'pengirim',
    ];

    /**
     * Relationship dengan User (Mahasiswa)
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    /**
     * Relationship dengan User (Dosen)
     */
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
