<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'All kinds of electronic devices and gadgets.',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'name' => 'Books',
            'slug' => 'books',
            'description' => 'A wide range of books and literature.',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'name' => 'Clothing',
            'slug' => 'clothing',
            'description' => 'Apparel and fashion items.',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'name' => 'Home & Kitchen',
            'slug' => 'home-kitchen',
            'description' => 'Home appliances and kitchenware.',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'name' => 'Sports',
            'slug' => 'sports',
            'description' => 'Sporting goods and outdoor equipment.',
            'created_at' => now(),
            'updated_at' => now()
            ],
        ]);
    }
}
