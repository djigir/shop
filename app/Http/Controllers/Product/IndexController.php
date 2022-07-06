<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $productsQuery = Product::query();
        if($request->filled('sort')) {
            $productsQuery->orderBy($request->sort, 'desc');
        }
        $products = $productsQuery->paginate(10);

        return view('product.index', compact('products'));
    }
}
