@extends('layouts.main')

@section('title', 'Daftar Kendaraan')

@section('content')
<div class="container py-4">

    {{-- Judul halaman dan tombol tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Data Kendaraan</h2>
            <p class="text-secondary mb-0">
                Kelola data kendaraan yang terdaftar.
            </p>
        </div>

        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
            + Tambah Kendaraan
        </a>
    </div>

    {{-- Notifikasi berhasil --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Tutup"></button>
        </div>
    @endif

    {{-- Tabel daftar kendaraan --}}
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
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kendaraans as $kendaraan)
                            <tr>
                                <td>{{ $kendaraans->firstItem() + $loop->index }}</td>
                                <td class="fw-semibold">
                                    {{ $kendaraan->nomor_polisi }}
                                </td>
                                <td>{{ $kendaraan->merek }}</td>
                                <td>{{ $kendaraan->tipe }}</td>
                                <td>{{ $kendaraan->kategori }}</td>
                                <td>{{ $kendaraan->tahun }}</td>
                                <td>{{ $kendaraan->warna }}</td>
                                <td>{{ $kendaraan->keterangan ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-secondary">
                                    Belum ada data kendaraan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $kendaraans->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
