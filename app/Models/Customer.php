<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $guarded = ['id'];

    public function form()
    {
        return $this->hasOne(Form::class);
    }
    // public function isFormFilled()
    // {
    //     return $this->form()->exists() && $this->form->status === 'Terisi';
    // }
    public function hasFilledForm()
    {
        return $this->form()->exists();
    }
}
