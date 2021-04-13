<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category',
        'sub_category',
        'article',
        'title',
        'price',
        'discount_price',
        'provider_price',
        'availability',
        'description',
        'img',
        'img_2',
        'img_3',
        'img_4',
        'weight',
        'dimensions',
        'manufacturer',
        'size',
        'color',
        'textile',
        'model_growth',
        'season',
        'production',
        'length',
        'sleeve_length',
        'add_info',
        'accessories',
        'print',
    ];
}
