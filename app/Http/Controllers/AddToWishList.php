<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AddToWishList extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post(Request $request){
        $user = Auth::user();
        $advert_id=$request->input('advert_id');
        $results = $user->wishlist()->sync($advert_id);        
    }

}
