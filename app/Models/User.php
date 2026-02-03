<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'nim',
        'nip',
        'role',
        'dosen_pembimbing_id',
        'judul_ta',
        'progress',
        'tahap_ta',
        'status_ta',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get dosen pembimbing (untuk mahasiswa)
     */
    public function dosenPembimbing()
    {
        return $this->belongsTo(User::class, 'dosen_pembimbing_id');
    }

    /**
     * Get mahasiswa bimbingan (untuk dosen)
     */
    public function mahasiswaBimbingan()
    {
        return $this->hasMany(User::class, 'dosen_pembimbing_id');
    }

    /**
     * Get mahasiswa bimbingan sebagai pembimbing 1 (via JudulTA atau langsung User)
     */
    public function bimbinganPembimbing1()
    {
        return $this->hasMany(User::class, 'dosen_pembimbing_id');
    }

    /**
     * Get mahasiswa bimbingan sebagai pembimbing 2 (placeholder - return empty)
     */
    public function bimbinganPembimbing2()
    {
        return $this->hasMany(User::class, 'dosen_pembimbing_id')->whereRaw('1=0');
    }

    /**
     * Check if user is mahasiswa
     */
    public function isMahasiswa(): bool
    {
        return $this->role === 'mahasiswa';
    }

    /**
     * Check if user is dosen
     */
    public function isDosen(): bool
    {
        return $this->role === 'dosen';
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
