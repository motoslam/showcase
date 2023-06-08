<?php

namespace App\Services;

use App\Models\Color;
use App\Models\Size;

class PropertyService
{
    public function getAllProperties(): array
    {
        return [
            'color' => Color::all(),
            'size' => Size::all(),
        ];
    }
}
