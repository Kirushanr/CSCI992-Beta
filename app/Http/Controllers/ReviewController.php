<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserReview;
use App\User;
use App\Ratings;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {
        try {
            $user = User::findOrFail($id);   
            $user_id = $id;
            $username = $user->name;
            $ratings = $user->ratings;
           /// dd($ratings);
            return view('reviews.userreview')->with(compact('ratings', 'username','id'));
        } catch (ModelNotFoundException $mexception) {
            abort(404);
        }
    }

    public function post($id){
        try{

            $user = User::findOrFail($id);
            $seller= $user->name;
            return view('reviews.postreview')->with(compact('id','seller'));
        }catch(ModelNotFoundException $mexception){
            abort(404);
        }
     
    }

    public function store(StoreUserReview $request, $id){
        
        $validated = $request->validated();
        
        try{
            $user=User::findOrFail($id);
            $rating = new Ratings;
            $rating->rating = $validated['rating'];
            $rating->review =$validated['review'];
            $rating->user_id = \Auth::id();
            $rating->reviewer=\Auth::user()->name;
            if($user->ratings()->save($rating)){
                return redirect()->route('reviews.show',$user->id)->with(['result' =>'success']);
            }
        }catch(ModelNotFoundException $mexception){
            abort(404);
        }
     

    }
}
