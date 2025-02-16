<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SukuCadangEra extends Model
{
    use HasFactory;

    protected $connection = 'era';
    protected $table = 'sukucadang';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
