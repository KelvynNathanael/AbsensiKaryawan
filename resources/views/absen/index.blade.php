<!DOCTYPE html>
<html>
<head>
    <title>Absen Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="{{route ('absen.xTables')}}">Table Kehadiran berdasarkan tanggal</a>
        <br>
        <a href="{{route ('absen.monthly')}}">Table Kehadiran bulanan</a>
        <h2>Form Input Absen</h2>
        <form method="POST" action="{{ route('absen.store') }}">
            @csrf
            <div class="mb-3">
                <label for="employee_id" class="form-label">Karyawan</label>
                <select class="form-control" name="employee_id" required>
                    <option value="">Pilih Karyawan</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nik }} - {{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_absen" class="form-label">Tanggal Absen</label>
                <input type="date" class="form-control" name="tanggal_absen" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <h2 class="mt-5">Data Absen</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Absen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absens as $absen)
                    <tr>
                        <td>{{ $absen->employee->nik }}</td>
                        <td>{{ $absen->employee->name }}</td>
                        <td>{{ $absen->tanggal_absen }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
