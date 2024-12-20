<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data kategori mobil yang akan dimasukkan
        $categories = [
            [
                'name' => 'SUV',
                'description' => 'Kategori untuk Sport Utility Vehicle, mobil yang cocok untuk berbagai medan.',
            ],
            [
                'name' => 'Sedan',
                'description' => 'Kategori untuk mobil sedan, ideal untuk penggunaan sehari-hari.',
            ],
            [
                'name' => 'Hatchback',
                'description' => 'Kategori untuk mobil hatchback, praktis dan efisien.',
            ],
            [
                'name' => 'MPV',
                'description' => 'Kategori untuk Multi-Purpose Vehicle, cocok untuk keluarga besar.',
            ],
            [
                'name' => 'Crossover',
                'description' => 'Kategori untuk crossover, kombinasi antara SUV dan sedan.',
            ],
            [
                'name' => 'Sport',
                'description' => 'Kategori untuk mobil sport, dirancang untuk performa tinggi.',
            ],
            [
                'name' => 'Pickup',
                'description' => 'Kategori untuk mobil pickup, ideal untuk angkutan barang.',
            ],
            [
                'name' => 'Electric',
                'description' => 'Kategori untuk mobil listrik, ramah lingkungan dan efisien.',
            ],
        ];

        // Menyimpan data kategori ke dalam tabel
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
