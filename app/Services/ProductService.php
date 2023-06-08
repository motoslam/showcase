<?php

namespace App\Services;

use App\Filters\ProductFilter;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    public function all(ProductFilter $filters)
    {
        return Product::filter($filters)->get();
    }

    public function getOffer(Request $request, Product $product)
    {
        if ($request->has('color') and $request->has('size')) {
            return $product->offers()
                ->where('color_id', $request->get('color'))
                ->where('size_id', $request->get('size'))
                ->first() ?? 'empty';
        }

        return null;
    }

}
