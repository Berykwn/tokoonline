<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'nama' => 'Asus',
            'gambar' => 'Asus.png'
        ]);
        DB::table('brands')->insert([
            'nama' => 'MSI',
            'gambar' => 'MSI.png'
        ]);
        DB::table('brands')->insert([
            'nama' => 'Lenovo',
            'gambar' => 'Lenovo.png'
        ]);
        DB::table('brands')->insert([
            'nama' => 'Apple',
            'gambar' => 'Apple.png'
        ]);
    }
}
