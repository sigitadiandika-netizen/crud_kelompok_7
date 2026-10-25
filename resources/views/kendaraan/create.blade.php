@extends('layouts.main')

@section('title', 'Tambah Kendaraan')

@section('content')
<div class="container py-4">

    <h2 class="mb-1">Tambah Kendaraan</h2>
    <p class="text-secondary mb-4">Masukkan data kendaraan baru.</p>

    <div class="card shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('kendaraan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nomor_polisi" class="form-label">
                        Nomor Polisi
                    </label>
                    <input type="text" name="nomor_polisi"
                        id="nomor_polisi" class="form-control"
                        value="{{ old('nomor_polisi') }}" required>
                    @error('nomor_polisi')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="merek" class="form-label">Merek</label>
                    <input type="text" name="merek" id="merek"
                        class="form-control" value="{{ old('merek') }}" required>
                    @error('merek')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <input type="text" name="tipe" id="tipe"
                        class="form-control" value="{{ old('tipe') }}" required>
                    @error('tipe')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" id="kategori"
                        class="form-select" required>
                        <option value="">Pilih kategori</option>
                        <option value="Motor" @selected(old('kategori') == 'Motor')>Motor</option>
                        <option value="Mobil" @selected(old('kategori') == 'Mobil')>Mobil</option>
                    </select>
                    @error('kategori')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" name="tahun" id="tahun"
                        class="form-control" min="1900"
                        max="{{ date('Y') + 1 }}"
                        value="{{ old('tahun') }}" required>
                    @error('tahun')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="warna" class="form-label">Warna</label>
                    <input type="text" name="warna" id="warna"
                        class="form-control" value="{{ old('warna') }}" required>
                    @error('warna')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan"
                        class="form-control" rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('kendaraan.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>

</div>
@endsection
