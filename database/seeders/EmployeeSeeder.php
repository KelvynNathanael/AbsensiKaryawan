<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        employee::insert([
            ['nik' => 'A001', 'name' => 'Andi'],
            ['nik' => 'A002', 'name' => 'Susi'],
            ['nik' => 'A003', 'name' => 'Toni'],
            ['nik' => 'A004', 'name' => 'Hendra'],
        ]);
    }
}
