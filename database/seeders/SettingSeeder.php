<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'alamat' => 'Bandung Timur',
            'phone' => '0878184747396',
            'email' => 'nyetormotor@gmail.com',
            'footer_description' => 'sewa motor terpercaya',
            'tentang_perusahaan' => 'membantu perjalanan',
            'sejarah_perusahaan' => 'Berdiri sejak tahun 2024',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'twitter' => 'https://www.twitter.com/',
        ]);
    }
}
