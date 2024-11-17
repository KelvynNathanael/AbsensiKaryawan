<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Absen;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Absen::insert([
            ['employee_id' => 1, 'tanggal_absen' => '2014-08-30'],
            ['employee_id' => 2, 'tanggal_absen' => '2014-08-30'],
            ['employee_id' => 2, 'tanggal_absen' => '2014-08-31'],
            ['employee_id' => 2, 'tanggal_absen' => '2014-09-01'],
            ['employee_id' => 1, 'tanggal_absen' => '2014-09-02'],
            ['employee_id' => 3, 'tanggal_absen' => '2014-08-29'],
            ['employee_id' => 4, 'tanggal_absen' => '2014-08-29'],
            ['employee_id' => 4, 'tanggal_absen' => '2014-08-31'],
            ['employee_id' => 3, 'tanggal_absen' => '2014-09-02'],
        ]); 
    }
}
