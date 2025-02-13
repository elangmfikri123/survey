<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEra extends Model
{
    use HasFactory;

    protected $connection = 'era';
    protected $table = 'form';
    protected $primaryKey = 'id_form';

    protected $guarded = ['id_form'];

    public function mekanik()
    {
        return $this->belongsTo(UserEra::class, 'id_mekanik', 'id_user')->where('level', 'mekanik');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
