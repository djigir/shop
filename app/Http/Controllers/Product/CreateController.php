<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        $groups = Group::all();
        return view('product.create', compact('groups', 'categories','tags', 'colors'));
    }
}
