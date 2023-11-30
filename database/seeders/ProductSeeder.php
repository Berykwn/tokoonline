<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nama' => 'ASUS ROG ZEPHYRUS M16 GU603ZE I7-12700H RTX3050Ti 16G 512G 165Hz W11',
            'harga' => 26589000,
            'brand_id' => 1,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'Asus rog m16.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'MSI KATANA GF76 12UC [9S7-17L422-057] i7-12700H 8GB 512GB RTX3050 4GB',
            'harga' => 17999000,
            'brand_id' => 2,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'MSI katana.png'
        ]);
        DB::table('products')->insert([
            'nama' => 'Lenovo Legion Slim S7 GeForce RTX™ 3050Ti - Ryzen 7 5800H 16GB 512GB',
            'harga' => 18199000,
            'brand_id' => 3,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'Lenovo slim.png'
        ]);
        DB::table('products')->insert([
            'nama' => 'Apple MacBook Air (13.3 inci, M1 2020) 8GB RAM, 256GB SSD, Space Grey, Original Ibox',
            'harga' => 16699000,
            'brand_id' => 4,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'Macbook air.png'
        ]);
        DB::table('products')->insert([
            'nama' => 'ASUS TUF DASH F15 FX516PM i7-11370H DDR4 16GB SSD 512GB RTX3060 6G 144Hz W10 OHS',
            'harga' => 18999000,
            'brand_id' => 1,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'Asus tuf f15.png'
        ]);
        DB::table('products')->insert([
            'nama' => 'Lenovo Legion 5 3QID OHS AMD Ryzen 7 5800H Win10 16GB 512GB SSD 15.6" FHD IPS 165Hz NVIDIA 3050 Ti 4GB Laptop Gaming',
            'harga' => 19999000,
            'brand_id' => 3,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'Lenovo legion.png'
        ]);
        DB::table('products')->insert([
            'nama' => 'MSI Modern 14 B5M (9S7-14DL24-069)',
            'harga' => 9799000,
            'brand_id' => 2,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'MSI modern.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'Apple MacBook Pro 13 inch 8GB, 256GB, 8 Core CPU Apple M1 Chip, Silver, Original Ibox',
            'harga' => 21199000,
            'brand_id' => 4,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga tempora alias sequi nemo, ipsam corrupti. Cumque dolorum illo magni? Accusantium neque autem non modi natus sed qui totam optio voluptatum ipsam nam voluptatibus quos laudantium magni itaque ullam facere, pariatur eum, labore harum! Laboriosam numquam consectetur rem architecto earum sint. Alias minima, neque autem fugit et ab sit eaque libero explicabo eum impedit! Voluptate earum similique magnam beatae, omnis tempora inventore autem in. Perferendis earum, quod hic, magni ratione dolorum eligendi voluptates distinctio pariatur quae consequatur, ea fuga? Dolore quo cum minima voluptatibus aut est. Excepturi aperiam earum voluptate expedita.',
            'terjual' => 1,
            'gambar' => 'Macbook pro.png'
        ]);
        
        
    }
}
