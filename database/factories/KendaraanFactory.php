<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomor_polisi' => strtoupper(fake()->unique()->bothify('Z #### ??')),
            'merek' => fake()->randomElement([
                'Honda',
                'Yamaha',
                'Toyota',
                'Suzuki',
                'Mitsubishi',
            ]),
            'tipe' => fake()->randomElement([
                'Beat',
                'Vario',
                'NMAX',
                'Avanza',
                'Ertiga',
            ]),
            'kategori' => fake()->randomElement([
                'Motor',
                'Mobil',
            ]),
            'tahun' => fake()->numberBetween(2015, 2026),
            'warna' => fake()->randomElement([
                'Hitam',
                'Putih',
                'Merah',
                'Biru',
                'Abu-abu',
            ]),
            'keterangan' => fake()->optional()->sentence(),
        ];
    }
}
