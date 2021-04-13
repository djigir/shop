<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'id',
        'category_id',
        'title',
        'created_at',
        'updated_at',
    ];

    public static function getSubCategoryFromFile($category_name, $data)
    {
        $category = Category::select('id')->where('title', $category_name)->first();
        SubCategory::firstOrCreate(['title' => $data], ['category_id' => $category->id, 'title' => $data]);
    }
}
