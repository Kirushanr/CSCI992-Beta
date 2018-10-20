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
    public function notifications(){
        $user = Auth::user();
        $book=($user->book_notification==true)?'checked':'';
        $electronic=($user->electronic_notification==true)?'checked':'';
        $essential=($user->essential_notification==true)?'checked':'';
        return view("account.partial.notifications")->with(compact('book','electronic','essential'));
        
    }
    public function setNotifications(Request $request){
        $user = Auth::user();
        $type=$request->input('type');
        $status=($request->input('status')=='true') ? true:false;
        if($type=='book'){
            $user->book_notification=$status;
        }else if($type=='electronic'){
            $user->electronic_notification=$status;
        }else if($type=='essential'){
            $user->essential_notification=$status;
        }
        $user->save();
    }
}
