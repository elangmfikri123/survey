<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomercHc extends Model
{
    use HasFactory;

    protected $table = 'customerchc';
    protected $guarded = ['id'];

    public function form()
    {
        return $this->hasOne(FormcHc::class);
    }
}
