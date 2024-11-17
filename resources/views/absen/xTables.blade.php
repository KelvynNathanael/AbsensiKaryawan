<!DOCTYPE html>
<html>
<head>
    <title>Absen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="{{route ('absen.index')}}">Kembali</a>
        <h2>Tabel Kehadiran (Berdasarkan Tanggal)</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    @foreach ($columns as $date)
                        <th>{{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}</th>
                    @endforeach
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row['nik'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        @foreach ($columns as $date)
                            <td>{{ $row[$date] }}</td>
                        @endforeach
                        <td>{{ $row['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
