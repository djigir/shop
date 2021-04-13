<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'created_at',
        'updated_at',
    ];

    public static function getCategoryFromFile($data)
    {
        Category::firstOrCreate(['title' => $data], ['title' => $data]);
    }

    /* Relations */
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
