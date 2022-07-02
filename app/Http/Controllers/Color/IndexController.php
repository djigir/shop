<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class IndexController extends Controller
{
    public function __invoke()
    {
        $colors = Color::orderBy('created_at', 'DESC')->paginate(10);
        return view('color.index', compact('colors'));
    }
}
