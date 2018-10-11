<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Http\Requests\AdvertStoreRequest;
use App\Advert;
use App\Book;
use App\Electronics;
use App\User;
use App\Notifications\NewAdvert;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdvertsController extends Controller
{

    public function index(Request $request)
    {
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

    public function postAdvert(AdvertStoreRequest $request)
    {


        $validated = $request->validated();
        $advert = new Advert;
        $advert->title = $validated["title"];
        $advert->description = $validated["description"];
        $advert->price = $validated["price"];
        $advert->user_id = 1;
        $advert->advert_type = $validated["type"];
        $photos = $validated["photos"];
        $paths = [];
        $filecount = 0;
        foreach ($photos as $photo) {

            if ($filecount == 3) {
                break;
            }
            $paths[] = $photo->store('adverts','public');
            $filecount = $filecount + 1;
        }

        $advert->image_url_1 = (isset($paths[0]) ? $paths[0] : 'public/default.jpeg');
        $advert->image_url_2 = (isset($paths[1]) ? $paths[1] : 'public/default.jpeg');
        $advert->image_url_3 = (isset($paths[2]) ? $paths[2] : 'public/default.jpeg');

        try {
            $advert_insert = $advert->save();
            if ($validated["type"] == "book") {

                $book = new Book;
                $book->author = $validated["author"];
                $book->ISBN = $validated["ISBN"];
                $book->course_code = $validated["subjectcode"];
                $book->edition = $validated["edition"];
                $book->advert_id = $advert->id;
                $book->save();

            } else if ($validated["type"] == "electronics") {
                $electronics = new Electronics;
                $electronics->model = $validated["model"];
                $electronics->type = $validated["devicetype"];
                $electronics->has_warranty = (isset($validated["haswarranty"]) ? true : false);
                $electronics->advert_id = $advert->id;
                $electronics->save();
            }

            if ($advert_insert) {
                Notification::send(User::first(), new NewAdvert($advert->id, $validated["type"]));
                return redirect()->route('post-ad-type.show', ['type' => $validated["type"]])->with(['result' =>'success', 'advert_id'=>$advert->id]);
            }

        } catch (Exception $exception) {
            throw $exception;
        }


    }

    public function viewAdvert($id)
    {
        try {
            $model = Advert::findOrFail($id);
            $username  = User::findOrFail($model->user_id)->name;
            
            return view('adverts.view', compact('model','username'));
        } catch (ModelNotFoundException $mexception) {
            abort(404);
        }

    }

}