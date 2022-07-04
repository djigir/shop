<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('product.index', compact('products'));
    }
}
