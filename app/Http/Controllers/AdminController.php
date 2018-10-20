<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Advert;
use App\User;
use App\Report;
use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function getReportedAdverts(){
        $reports = Report::where('has_solved',0)->get(); 
        return view('admin.partial.reported')->with(compact('reports'));
    }

    public function banAdvert(Request $request){
        $advert_id=$request->input('id');
        $advert = Advert::findorFail($advert_id);
        $advert->expired=true;
        $advert->save();
        $result = Report::where('advert_id', $advert_id)->update(['has_solved' => true]);
    }


    public function getBannedAdverts(){
        $banned = Report::where('has_solved',1)->get(); 
        return view('admin.partial.banned')->with(compact('banned'));
    }
}