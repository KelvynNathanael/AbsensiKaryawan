<!DOCTYPE html>
<html>
<head>
    <title>Tabel Kehadiran Berdasarkan Periode Bulan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="{{route ('absen.index')}}">Kembali</a>
        <h2>Tabel Kehadiran Berdasarkan Periode Bulan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>201408</th>
                    <th>201409</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row['nik'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['201408'] }}</td>
                        <td>{{ $row['201409'] }}</td>
                        <td>{{ $row['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
