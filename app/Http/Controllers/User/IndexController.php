<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('user.index', compact('users'));
    }
}
