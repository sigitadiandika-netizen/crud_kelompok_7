<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kendaraan</title>
</head>
<body>
    <h1>Manajemen Kendaraan</h1>

    <p>Halaman pengelolaan data kendaraan.</p>

    <h2>Daftar Kendaraan</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Polisi</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Warna</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($kendaraans as $kendaraan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kendaraan->nomor_polisi }}</td>
                    <td>{{ $kendaraan->merek }}</td>
                    <td>{{ $kendaraan->tipe }}</td>
                    <td>{{ $kendaraan->kategori }}</td>
                    <td>{{ $kendaraan->tahun }}</td>
                    <td>{{ $kendaraan->warna }}</td>
                    <td>{{ $kendaraan->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada data kendaraan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
