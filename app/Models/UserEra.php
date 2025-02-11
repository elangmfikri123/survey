<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserEra extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = 'era'; 
    protected $table = 'user'; 
    protected $primaryKey = 'id_user'; 

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
