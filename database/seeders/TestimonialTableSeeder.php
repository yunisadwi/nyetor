<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonial;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data gambar testimoni
        Testimonial::insert([
            ['image' => 'frontend/images/testimonial1.png'],
            ['image' => 'frontend/images/testimonial2.png'],
            ['image' => 'frontend/images/testimonial3.png'],
            ['image' => 'frontend/images/testimonial4.png'],
        ]);


    }
}
