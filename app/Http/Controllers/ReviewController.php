<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ReviewController extends Controller
{
    public function index($id)
    {
        try {
            $user = User::findOrFail($id);   
            $user_id = $id;
            $username = $user->name;
            $ratings = $user->ratings;
            return view('reviews.userreview')->with(compact('ratings', 'username','id'));
        } catch (ModelNotFoundException $mexception) {
            abort(404);
        }
    }

    public function post($id){
        $user = User::findOrFail($id);
        
        return view('reviews.postreview')->with(compact('id'));
    }
    public function store(){
        
    }
}
