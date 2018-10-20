<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index($id){

        return view('report.userreport')->with(compact('id'));
    }

    public function store(Request $request,$id){
        $user = \Auth::user();
        $advert_id=$id;
        $reason = $request->input('reason');
       
        $description =$request->input('description');
        $results = $user->reports()
        ->sync([1=>['advert_id'=>$id,'report_type'=>$reason, 'description'=>$description,'created_at'=> \Carbon\Carbon::now()->toDateTimeString()]]);
        
        return redirect()->route('report.show',$advert_id)->with(['result' =>'success']);
    }
}
