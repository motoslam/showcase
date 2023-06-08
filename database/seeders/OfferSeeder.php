<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = Color::all();
        $sizes = Size::all();
        $products = Product::all();

        foreach ($products as $product) {

            for ($i = 1; $i <= rand(2, 6); $i++) {

                $product->offers()->create([
                    'color_id' => $colors->random()->id,
                    'size_id' => $sizes->random()->id,
                    'code' =>  (string) Str::uuid(),
                    'quantity' => rand(1, 6),
                    'price' => rand(99, 999),
                ]);

            }
        }
    }
}
