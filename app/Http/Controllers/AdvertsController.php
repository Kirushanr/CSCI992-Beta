<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Http\Requests\AdvertStoreRequest;
use App\Http\Requests\UpdateAdvert;
use App\Advert;
use App\Book;
use App\Electronics;
use App\User;
use App\Notifications\NewAdvert;
use Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdvertsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $user_id=Auth::id();
        $validated = $request->validated();
        $advert = new Advert;
        $advert->title = $validated["title"];
        $advert->description = $validated["description"];
        $advert->price = $validated["price"];
        $advert->user_id =  $user_id;
        $advert->advert_type = $validated["type"];
        $photos = $validated["photos"];
        $paths = [];
        $filecount = 0;
        foreach ($photos as $photo) {
            if ($filecount == 3) {
                break;
            }
            $paths[] = $photo->store('adverts', 'public');
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
            } elseif ($validated["type"] == "electronics") {
                $electronics = new Electronics;
                $electronics->model = $validated["model"];
                $electronics->type = $validated["devicetype"];
                $electronics->has_warranty = (isset($validated["haswarranty"]) ? true : false);
                $electronics->advert_id = $advert->id;
                $electronics->save();
            }
           
            if ($advert_insert) {
                //send notifications to users if notification for the category is on
                if($validated["type"]=='book'){
                    $users=User::where('book_notification',1)->where('id', '!=', $user_id)->get();
                    Notification::send($users, new NewAdvert($advert->id, $validated["type"],''));

                }else if($validated["type"] == "electronics"){
                    $users=User::where('electronic_notification',1)->where('id', '!=', $user_id)->get();
                    Notification::send($users, new NewAdvert($advert->id, $validated["type"],''));
                
                }else if($validated["type"]="essentials"){
                    $users=User::where('essential_notification',1)->where('id', '!=', $user_id)->get();
                    Notification::send($users, new NewAdvert($advert->id, $validated["type"],''));

                }
                
                return redirect()->route('post-ad-type.show', ['type' => $validated["type"]])->with(['result' =>'success', 'advert_id'=>$advert->id]);
            }
        } catch (Exception $exception) {
           abort(503);
        }
    }

    public function viewAdvert($id)
    {
        try {
            $model = Advert::findOrFail($id);
            $username  = User::findOrFail($model->user_id)->name;
            if($model->expired==true){
                return view("adverts.banned");
            }

            if($model->advert_type=="book"){
                $books = Book::where('advert_id',$model->id)->get();
                return view('adverts.view', compact('model', 'username','books'));
            }else if($model->advert_type=="electronics"){
                $electronics = Electronics::where('advert_id',$model->id)->get();
                return view('adverts.view', compact('model', 'username','electronics'));
            }

            return view('adverts.view', compact('model', 'username'));
        } catch (ModelNotFoundException $mexception) {
            abort(404);
        }
    }

    public function editAdvert($id)
    {
        try {
            $model = Advert::findOrFail($id);
            $type = $model->advert_type;
            
            if ($type =='book') {
                $book = Book::where('advert_id', '=', $model->id)->firstOrFail();
                return view('adverts.edit.advert', ['type' => $type,'book'=>$book, 'advert'=>$model, 'electronics'=>[]]);
                
            } elseif ($type == 'electronics') {
                $book=[];
                $electronics = Electronics::where('advert_id', '=', $model->id)->firstOrFail();
                return view('adverts.edit.advert', ['type' => $type,'electronics'=>$electronics, 'advert'=>$model,'book'=>[]]);
            } else {
                return view('adverts.edit.advert', ['type' => $type, 'advert'=>$model,'book'=>[],'electronics'=>[]]);
            }
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        
    }

    public function updateAdvert(UpdateAdvert $request,$id)
    {
        try {
            $validated = $request->validated();
            $advert = Advert::findOrFail($id);
            $advert->title = $validated["title"];
            $advert->description = $validated["description"];
            $advert->price = $validated["price"];
            $advert->user_id = Auth::id();
            $advert->advert_type = $validated["type"];
            $paths = [];
            $filecount = 0;
            if(isset($validated["photos"])){
                $photos = $validated["photos"];
                foreach ($photos as $photo) {
                    if ($filecount == 3) {
                        break;
                    }
                    $paths[] = $photo->store('adverts', 'public');
                    $filecount = $filecount + 1;
                }
                $advert->image_url_1 = (isset($paths[0]) ? $paths[0] :$advert->image_url_1);
                $advert->image_url_2 = (isset($paths[1]) ? $paths[1] :$advert->image_url_2);
                $advert->image_url_3 = (isset($paths[2]) ? $paths[2] :$advert->image_url_3);
            }


            $advert_update = $advert->save();
            if($advert_update){
                if($validated["type"]=="Book"){
                    $book = Book::where('advert_id', '=', $advert->id)->firstOrFail();
                    $book->author = $validated["author"];
                    $book->ISBN = $validated["ISBN"];
                    $book->course_code = $validated["subjectcode"];
                    $book->edition = $validated["edition"];
                    $book->advert_id = $advert->id;
                    $book->save();
                }
                else if($validated["type"]=="Electronics"){
                    $electronics = Electronics::where('advert_id', '=', $model->id)->firstOrFail();
                    $electronics->model = $validated["model"];
                    $electronics->type = $validated["devicetype"];
                    $electronics->has_warranty = (isset($validated["haswarranty"]) ? true : false);
                    $electronics->advert_id = $advert->id;
                    $electronics->save();
                }
            }

            if ($advert_update) {
                //Notification::send(User::first(), new NewAdvert($advert->id, $validated["type"], 'update'));
                return redirect()->route('user-dashboard')->with(['result' =>'success', 'advert_id'=>$advert->id]);
            }
            
            
        } catch (ModelNotFoundException $mexception) {
            abort(404);
        }catch(Exception $e){
            abort(503);
        }
      

    }
}
