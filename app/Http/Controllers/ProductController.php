<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Filters\ProductFilter;
use App\Services\ProductService;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    protected ProductService $productService;
    protected PropertyService $propertyService;

    public function __construct(ProductService $productService, PropertyService $propertyService)
    {
        $this->productService = $productService;
        $this->propertyService = $propertyService;
    }

    public function index(ProductFilter $filters): View
    {
        $products = $this->productService->all($filters);

        $properties = $this->propertyService->getAllProperties();

        return view('welcome', compact('products', 'properties'));
    }

    public function show(Request $request, Product $product): View
    {
        $offer = $this->productService->getOffer($request, $product);

        return view('detail', compact('product', 'offer'));
    }
}
