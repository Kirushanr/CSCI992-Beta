<?php
/**
 * Created by PhpStorm.
 * User: 1world0x00
 * Date: 10/10/18
 * Time: 6:24 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ReviewPostController extends Controller
{
    /*
     * Create a new controller instance
     *
     * @return void
     *
     * */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function posts(){
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function show($id){
        $post = Post::find($id);
        return view('postsShow', compact('post'));
    }

    public function postPost(Request $request){
        request()->validate(['rate' => 'required']);
        $post = Post::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);
        return redirect()->route("posts");
    }
}