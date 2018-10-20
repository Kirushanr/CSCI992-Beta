<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $user = Auth::user();
        $adverts =$user->adverts;
        return view('account.partial.useradverts')->with(compact('adverts'));
    }
    
    public function getWishList(){
        $user = Auth::user();
        $adverts =$user->wishlist;   
        return view("account.partial.userwishlist")->with('adverts', $adverts);
      
    }
}
