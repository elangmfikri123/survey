<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormcHc extends Model
{
    use HasFactory;

    protected $table = 'formchc';
    protected $guarded = ['id'];
    
    public function customer()
    {
        return $this->belongsTo(CustomercHc::class);
    }
}
