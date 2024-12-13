<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Motor;

class MotorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() :void
    {
        Motor::insert([
            [
                'nama_motor' => 'Beat 2016',
                'slug' => 'beat-2016',
                'type_id' => 1, // Sesuaikan dengan type_id yang sesuai
                'price' => 8000,
                'description' => 'Motor Honda Beat, irit bahan bakar dan nyaman.',
                'image' => 'frontend/images/beat-2016.jpg', // Ganti dengan link gambar yang sesuai
                'status' => 1,
            ],
            [
                'nama_motor' => 'Beat 2018',
                'slug' => 'Beat-2018',
                'type_id' => 1, // Sesuaikan dengan type_id yang sesuai
                'price' => 8000,
                'description' => 'Motor Honda Beat, irit bahan bakar dan nyaman.',
                'image' => 'frontend/images/beat-2018.jpg', // Ganti dengan link gambar yang sesuai
                'status' => 1,
            ],
            [
                'nama_motor' => 'Vario KZR',
                'slug' => 'vario-kzr',
                'type_id' => 2, // Sesuaikan dengan type_id yang sesuai
                'price' => 10000,
                'description' => 'Motor Honda Vario, elegan dan nyaman.',
                'image' => 'frontend/images/vario-kzr.png', // Ganti dengan link gambar yang sesuai
                'status' => 1,
            ],
            [
                'nama_motor' => 'Vario LED Series',
                'slug' => 'vario-led-series',
                'type_id' => 2, // Sesuaikan dengan type_id yang sesuai
                'price' => 12000,
                'description' => 'Motor Honda Vario, elegan dan nyaman.',
                'image' => 'frontend/images/vario-led-series.jpg', // Ganti dengan link gambar yang sesuai
                'status' => 1,
            ],
            [
                'nama_motor' => 'Nmax',
                'slug' => 'nmax',
                'type_id' => 3, // Sesuaikan dengan type_id yang sesuai
                'price' => 14000,
                'description' => 'Motor Yamaha Nmax, nyaman untuk perjalanan jauh.',
                'image' => 'frontend/images/nmax.png', // Ganti dengan link gambar yang sesuai
                'status' => 1,
            ],
        ]);
    }
}
