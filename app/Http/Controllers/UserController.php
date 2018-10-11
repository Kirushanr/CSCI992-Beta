<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['selling']
        ]);
    }

    public function selling(User $user)
    {
        $ads = Auth::user()->ads()->orderBy('created_at', 'desc')->paginate(5);
        return view('user.selling', compact('ads'));
    }
}
