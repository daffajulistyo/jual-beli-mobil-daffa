<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Mobil Sedan',
                'description' => 'Mobil sedan yang nyaman untuk perjalanan sehari-hari.',
                'price' => 250000000,
                'category_id' => 1, // Ganti dengan ID kategori yang sesuai
            ],
            [
                'name' => 'Mobil SUV',
                'description' => 'SUV yang cocok untuk berbagai medan.',
                'price' => 350000000,
                'category_id' => 2, // Ganti dengan ID kategori yang sesuai
            ],
            // Tambahkan produk lainnya sesuai kebutuhan
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
