<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['красный', 'черный', 'зеленый', 'синий', 'белый'];
        foreach ($colors as $color) {
            Color::create([
                'name' => $color
            ]);
        }

        $sizes = ['39', '40', '41', '42', '43', '44'];
        foreach ($sizes as $size) {
            Size::create([
                'name' => $size
            ]);
        }
    }
}
