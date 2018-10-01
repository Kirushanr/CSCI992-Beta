<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertsController extends Controller
{

    public function getAdvertHome(Request $request){
        return view('adverts.home');
    }

    public function getAdvert(Request $request, $type)
    {
        $advert_category = array('book', 'electronics', 'essentials');
        $has_category = in_array($type, $advert_category);

        if ($has_category) {
            return view('adverts.advert', ['type' => $type]);
        }
        abort(404);
   }
}
