<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'nomor_polisi',
        'merek',
        'tipe',
        'kategori',
        'tahun',
        'warna',
        'keterangan',
    ];
}
