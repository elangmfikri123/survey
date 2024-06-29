<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCA extends Model
{
    use HasFactory;

    protected $table = 'customerca';
    protected $guarded = ['id'];

    public function form()
    {
        return $this->hasOne(FormCA::class);
    }
}
