<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = ['employee_id', 'tanggal_absen'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
