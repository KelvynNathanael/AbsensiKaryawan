<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nik', 'name'];
    
    public function absens()
    {
        return $this->hasMany(Absen::class);
    }

}
