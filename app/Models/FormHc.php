<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormHc extends Model
{
    use HasFactory;

    protected $table = 'formhc';
    protected $guarded = ['id'];
    
    public function customer()
    {
        return $this->belongsTo(CustomerHc::class);
    }
}
