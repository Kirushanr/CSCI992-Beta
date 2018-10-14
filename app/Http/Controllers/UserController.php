<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['selling', 'wishList']
        ]);
    }

    public function selling()
    {
        $ads = Auth::user()->ads()->orderBy('created_at', 'desc')->paginate(5);
        return view('user.selling', compact('ads'));
    }

    public function wishList(Request $request)
    {
        $user = $request->user();
        $ads = $user->favoriteAds()->paginate(10);

        return view('user.wishList', compact('ads'));
    }
}
