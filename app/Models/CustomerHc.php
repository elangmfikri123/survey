<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerHc extends Model
{
    use HasFactory;

    protected $table = 'customerhc';
    protected $guarded = ['id'];

    public function form()
    {
        return $this->hasOne(FormHc::class);
    }
}
