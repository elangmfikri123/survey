<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelesaian extends Model
{
    use HasFactory;

    protected $connection = 'era';
    protected $table = 'penyelesaian';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
