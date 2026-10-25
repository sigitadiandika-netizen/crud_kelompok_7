@extends('layouts.main')

@section('title', 'Daftar Kendaraan')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Data Kendaraan</h2>
            <p class="text-secondary mb-0">Kelola data kendaraan.</p>
        </div>

        <a href="#" class="btn btn-primary">
            + Tambah Kendaraan
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-primary">
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
                                <td class="fw-semibold">{{ $kendaraan->nomor_polisi }}</td>
                                <td>{{ $kendaraan->merek }}</td>
                                <td>{{ $kendaraan->tipe }}</td>
                                <td>{{ $kendaraan->kategori }}</td>
                                <td>{{ $kendaraan->tahun }}</td>
                                <td>{{ $kendaraan->warna }}</td>
                                <td>{{ $kendaraan->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    Belum ada data kendaraan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
