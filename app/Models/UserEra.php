<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserEra extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = 'era'; // Koneksi ke database 'era'
    protected $table = 'user'; // Nama tabel
    protected $primaryKey = 'id_user'; // Primary key tabel

    protected $fillable = [
        'kode',
        'nama',
        'username',
        'password',
        'level',
        'status',
        'token_fcm',
    ];

    protected $hidden = [
        'password',
    ];

    public function forms()
    {
        return $this->hasMany(FormEra::class, 'id_mekanik', 'id_user');
    }
}
