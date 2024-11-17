<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    //Halaman utama
    public function index()
    {
        $employees = $employees = Employee::all();
        $absens = Absen::join('employees', 'absens.employee_id', '=', 'employees.id')
            ->orderBy('employees.nik', 'asc')
            ->select('absens.*')
            ->get();

        return view('absen.index', compact('employees', 'absens'));
    }

    //Create Absen
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'tanggal_absen' => 'required|date',
        ]);
    
        Absen::create([
            'employee_id' => $request->employee_id,
            'tanggal_absen' => $request->tanggal_absen,
        ]);
    
        return redirect()->back()->with('success', 'Data absen berhasil disimpan!');
    }
    

    //table kehadiran berdasarkan tanggal (nomor 3)
    public function xTables()
    {
        // Ambil semua data tanggal unik
        $dates = Absen::select(DB::raw('DISTINCT DATE(tanggal_absen) as tanggal'))
        ->orderBy('tanggal')
        ->pluck('tanggal')
        ->toArray();

        // Ambil data absens dan hitung berdasarkan tanggal
        $data = Absen::join('employees', 'absens.employee_id', '=', 'employees.id')
        ->select('employees.nik', 'employees.name', 'absens.tanggal_absen')
        ->get()
        ->groupBy('nik');

        // Susun data
        $result = [];
        foreach ($data as $nik => $absences) {
            $row = [
                'nik' => $nik,
                'name' => $absences->first()->name,
            ];

            foreach ($dates as $date) {
                if ($absences->contains('tanggal_absen', $date)) {
                    $row[$date] = 'X';
                } else {
                    $row[$date] = '';
                }
            }
            
            $row['total'] = $absences->count(); //hitung total kehadiran untuk nomor 4
            $result[] = $row;
        }

        return view('absen.xTables', [
            'columns' => $dates,
            'data' => $result,
        ]);
    }

    
    public function monthlyAbsences()
    {
        // Ambil jumlah absensi berdasarkan bulan
        $data = DB::table('absens')
            ->join('employees', 'absens.employee_id', '=', 'employees.id')
            ->select(
                'employees.nik',
                'employees.name',
                DB::raw("DATE_FORMAT(tanggal_absen, '%Y%m') as bulan"),
                DB::raw("COUNT(*) as jumlah")
            )
            ->groupBy('employees.nik', 'employees.name', 'bulan')
            ->get()
            ->groupBy('nik');
    
        // Susun data
        $result = [];
        foreach ($data as $nik => $absences) {
            $row = [
                'nik' => $nik,
                'name' => $absences->first()->name,
                '201408' => 0,
                '201409' => 0,
                'total' => 0,
            ];
    
            foreach ($absences as $absence) {
                $row[$absence->bulan] = $absence->jumlah;
                $row['total'] += $absence->jumlah;
            }
    
            $result[] = $row;
        }
    
        return view('absen.monthly', [
            'data' => $result,
        ]);
    }

}
