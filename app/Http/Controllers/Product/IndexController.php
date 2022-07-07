<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function __invoke(Request $request)
    {
        $products = Product::orderByDesc('id')->paginate(10);

        if ($request->has('sort_column')) {
            $products = $this->productService->sorting($request, Product::query());
        }

        if ($request->has('search_query')) {
            $products = $this->productService->search($request->get('search_query'), Product::query());
        }

        return view('product.index', compact('products'));
    }
}
