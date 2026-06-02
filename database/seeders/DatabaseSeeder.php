<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@velora.studio',
            'password' => bcrypt('password'),
        ]);

        $products = \App\Support\VeloraCatalog::products();

        foreach ($products as $p) {
            \App\Models\Product::create([
                'sku' => $p['id'],
                'name' => $p['name'],
                'collection' => $p['collection'],
                'price' => $p['price'],
                'image' => $p['image'],
                'tag' => $p['tag'],
                'category' => $p['category'],
                'sizes' => $p['sizes'],
                'colors' => $p['colors'],
            ]);
        }
    }
}
