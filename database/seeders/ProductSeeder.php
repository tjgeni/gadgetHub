<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adjectives = [
            'Ultra', 'Pro', 'Max', 'Lite', 'Prime',
            'Elite', 'Air', 'Neo', 'Core', 'Vision',
        ];

        $brands = [
            'Samsung', 'Xiaomi', 'Asus', 'Lenovo', 'Logitech',
            'Razer', 'JBL', 'Sony', 'Anker', 'Apple',
        ];

        $productTypes = [
            'Smartphone', 'Laptop', 'Tablet', 'Smartwatch',
            'Keyboard', 'Mouse', 'Headset', 'Speaker',
            'Power Bank', 'Charger',
        ];

        $categories = Category::pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {

            $brand = $brands[array_rand($brands)];
            $adj = $adjectives[array_rand($adjectives)];
            $type = $productTypes[array_rand($productTypes)];

            Product::create([
                'name' => "$brand $type $adj $i",
                'description' => "Produk $type berkualitas tinggi dari $brand dengan performa optimal dan desain modern. Cocok untuk kebutuhan harian maupun profesional.",
                'price' => rand(150000, 15000000),
                'stock' => rand(5, 150),
                'category_id' => $categories[array_rand($categories)],
                'created_by' => 'system',
            ]);
        }
    }
}
