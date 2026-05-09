<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Smartphone',
            'Laptop',
            'Tablet',
            'Smartwatch',
            'Earphone & Headset',
            'Speaker Bluetooth',
            'Gaming Accessories',
            'Keyboard & Mouse',
            'Charger & Adapter',
            'Power Bank',
            'Kabel Data',
            'Casing & Pelindung HP',
            'Tempered Glass',
            'Holder & Stand Gadget',
            'Kamera & Aksesoris',
            'Storage & Memory',
            'Router & Networking',
            'Smart Home Devices',
            'Printer & Accessories',
            'Monitor Komputer',
            'Aksesoris Laptop',
            'Tripod & Ring Light',
            'Mikrofon & Audio',
            'Wearable Devices',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'created_by' => 'system',
            ]);
        }
    }
}
