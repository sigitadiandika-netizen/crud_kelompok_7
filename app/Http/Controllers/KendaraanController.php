<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();

        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_polisi' => 'required|string|max:255|unique:kendaraans,nomor_polisi',
            'merek' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'kategori' => 'required|in:Motor,Mobil',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'warna' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Kendaraan::create($validated);

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
    $kendaraan = Kendaraan::findOrFail($id);

    return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, string $id)
    {
    $kendaraan = Kendaraan::findOrFail($id);

    $validated = $request->validate([
        'nomor_polisi' => 'required|string|max:255|unique:kendaraans,nomor_polisi,' . $kendaraan->id,
        'merek' => 'required|string|max:255',
        'tipe' => 'required|string|max:255',
        'kategori' => 'required|in:Motor,Mobil',
        'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        'warna' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    $kendaraan->update($validated);

    return redirect()
        ->route('kendaraan.index')
        ->with('success', 'Data kendaraan berhasil diperbarui.');
    }

public function destroy(string $id)
{
    $kendaraan = Kendaraan::findOrFail($id);

    $kendaraan->delete();

    return redirect()
        ->route('kendaraan.index')
        ->with('success', 'Data kendaraan berhasil dihapus.');
}
}
