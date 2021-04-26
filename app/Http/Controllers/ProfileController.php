<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function settings()
    {
        return view('profile.settings');
    }

    public function editLoginAndPass(Request $request) {
        $user = User::find(auth()->user()->id);
        if ($request->get('name') == null && $request->get('password') == null){
            return redirect()->route('profile.settings')->withErrors(['errors' => 'Не возможно обновить пустые данные!']);
        }
        if($request->get('name') != null){
            $user->update(['name' => $request->get('name')]);
            return redirect()->route('profile.settings')->with(['success' => 'Данные успешно обновлены']);
        }
        if ($request->get('password') != null) {
            $password = \Hash::make($request->get('password'));
            $user->update(['password' => $password]);
            return redirect()->route('profile.settings')->with(['success' => 'Данные успешно обновлены']);
        }
        return redirect()->route('profile.settings')->with(['error' => 'Произошла ошибка попробуйте еще раз']);
    }

}
