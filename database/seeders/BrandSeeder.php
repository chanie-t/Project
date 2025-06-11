<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
            'name' => 'Apple',
            'slug' => 'apple',
            'description' => 'Thương hiệu Apple nổi tiếng với các sản phẩm công nghệ cao cấp.',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Samsung',
            'slug' => 'samsung',
            'description' => 'Samsung là thương hiệu điện tử hàng đầu thế giới.',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Sony',
            'slug' => 'sony',
            'description' => 'Sony nổi tiếng với các sản phẩm điện tử và giải trí.',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
