<?php


namespace App\Service;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function productStore($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tags'])) {
                $tagsIds = $data['tags'];
                unset($data['tags']);
            }

            if (isset($data['colors'])) {
                $colorsIds = $data['colors'];
                unset($data['colors']);
            }

            if (isset($data['product_images'])) {
                $productImages = $data['product_images'];
                unset($data['product_images']);
            }

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

            $product = Product::firstOrCreate([
                'title' => $data['title']
            ], $data);

            if (isset($tagsIds)) {
                $product->tags()->attach($tagsIds);
            }

            if (isset($colorsIds)) {
                $product->colors()->attach($colorsIds);
            }

            foreach ($productImages as $productImage) {
                $currentImagesCount = ProductImage::where('product_id', $product->id)->count();
                if ($currentImagesCount > 3) continue;

                $filePath = Storage::disk('public')->put('/images', $productImage);
                ProductImage::create([
                    'product_id' => $product->id,
                    'file_path' => $filePath,
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function productUpdate($data, $product)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tags'])) {
                $tagsIds = $data['tags'];
                unset($data['tags']);
            }

            if (isset($data['colors'])) {
                $colorsIds = $data['colors'];
                unset($data['colors']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $product->update($data);

            if (isset($tagsIds)) {
                $product->tags()->sync($tagsIds);
            }

            // убрать все тэги у товара
            if (empty($tagsIds)) {
                $product->tags()->detach();
            }

            if (isset($colorsIds)) {
                $product->colors()->sync($colorsIds);
            }

            // убрать все цвета у товара
            if (empty($colorsIds)) {
                $product->colors()->detach();
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $product;
    }

    public function sorting($request, $productsQuery)
    {
        if ($request->filled('sort_column')) {
            $productsQuery->orderBy($request->get('sort_column'), $request->get('sort_direction'));
        }

        if (!$request->filled('sort_column')) {
            $productsQuery->orderByDesc('id');
        }

        return $products = $productsQuery->paginate(10);
    }

    public function search($query, $productsQuery)
    {
        return $productsQuery->where('title','LIKE','%'.$query.'%')
            ->orWhere('description','LIKE','%'.$query.'%')
            ->orWhere('content','LIKE','%'.$query.'%')
            ->paginate(10);
    }
}
