<?php

namespace App\Models;

use App\Models\CustomerCA;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormCA extends Model
{
    use HasFactory;

    protected $table = 'formca';
    protected $guarded = ['id'];
    
    public function customer()
    {
        return $this->belongsTo(CustomerCA::class);
    }
}
