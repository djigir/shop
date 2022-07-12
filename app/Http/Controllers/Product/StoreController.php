<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Service\ProductService;


class StoreController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $this->productService->productStore($data);

        return redirect()->route('product.index');
    }
}
