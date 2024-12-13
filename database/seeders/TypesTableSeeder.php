<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::insert([
            ['nama' => 'Honda Beat'],
            ['nama' => 'Vario'],
            ['nama' => 'Yamaha Nmax'],
        ]);
    }
}
