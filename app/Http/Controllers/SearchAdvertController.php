<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SearchAdvertController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $category = $request->get('category');
       	$this->getElectronicsAdverts();

    }

    public function getElectronicsAdverts()
    {   
        $data=DB::table('adverts')->join('electronics','adverts.id','=','electronics.advert_id')->select('adverts.title','adverts.description','adverts.price','electronics.model','electronics.type')->get();
        echo "<pre>";
        print_r($data);

    }
}

