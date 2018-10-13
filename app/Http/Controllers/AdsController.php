<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Ad;
use App\Book;
use App\Electronic;
use App\Kitchenware;
use DB;

class AdsController extends Controller
{
    public function create($type)
    {
        if ($type == 1) {
            return view('adverts.book');
        } elseif ($type == 2) {
            return view('adverts.electro');
        } else {
            return view('adverts.kitchen');
        }
    }

    public function store($type, Request $request)
    {
        // check login
        if (Auth::check())
        {
            $nextId = DB::table('ads')->max('id') + 1;

            // store book info
            if ($type == 1) {
                $this->validate($request, [
                    'title' => 'required|max:250',
                    'isbn' => 'required|min:10|max:13',
                    'code' => 'required|min:7|max:10',
                    'author' => 'required|max:50',
                    'edition' => 'required|max:50',
                    'price' => 'required|numeric|digits_between:0,10',
                    'visibility' => 'required',
                    'uploadfile' => 'required',
                    'description' => 'required|max:500'
                ]);

                if ($request->hasFile('uploadfile')) {
                    // upload file
                    $uploadfile = $request->file('uploadfile');
                    // get file extension
                    $ext = $uploadfile->getClientOriginalExtension();

                    // deal with the file name
                    $temp_name = str_random(20);
                    $filename = $temp_name . "." . $ext;
                    $dirname = date('Ymd',time());
                    // save image
                    $res = $uploadfile->move('./uploads/' . $dirname, $filename);
                }

                Ad::create([
                    'title' => $request->title,
                    'price' => $request->price,
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                    'user_id' => auth::user()->id,
                    'type' => $type,
                    'image' => $filename
                ]);

                Book::create([
                    'isbn' => $request->isbn,
                    'courseCode' => $request->code,
                    'author' => $request->author,
                    'edition' => $request->edition,
                    'advert_id' => $nextId,
                ]);
            } elseif($type == 2) {
                $this->validate($request, [
                    'title' => 'required|max:250',
                    'model' => 'required|max:50',
                    'warranty' => 'required|max:50',
                    'price' => 'required|max:50',
                    'visibility' => 'required',
                    'uploadfile' => 'required',
                    'description' => 'required|max:500'
                ]);

                if ($request->hasFile('uploadfile')) {
                    // upload file
                    $uploadfile = $request->file('uploadfile');
                    // get file extension
                    $ext = $uploadfile->getClientOriginalExtension();

                    // deal with the file name
                    $temp_name = str_random(20);
                    $filename = $temp_name . "." . $ext;
                    $dirname = date('Ymd',time());
                    // save image
                    $res = $uploadfile->move('./uploads/' . $dirname, $filename);
                }

                Ad::create([
                    'title' => $request->title,
                    'price' => $request->price,
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                    'user_id' => auth::user()->id,
                    'type' => $type,
                    'image' => $filename
                ]);

                Electronic::create([
                    'model' => $request->model,
                    'warranty' => $request->warranty,
                    'advert_id' => $nextId,
                ]);
            } else {
                $this->validate($request, [
                    'title' => 'required|max:250',
                    'model' => 'required|max:50',
                    'warranty' => 'required|max:50',
                    'price' => 'required|max:50',
                    'visibility' => 'required',
                    'uploadfile' => 'required',
                    'description' => 'required|max:500'
                ]);

                if ($request->hasFile('uploadfile')) {
                    // upload file
                    $uploadfile = $request->file('uploadfile');
                    // get file extension
                    $ext = $uploadfile->getClientOriginalExtension();

                    // deal with the file name
                    $temp_name = str_random(20);
                    $filename = $temp_name . "." . $ext;
                    $dirname = date('Ymd',time());
                    // save image
                    $res = $uploadfile->move('./uploads/' . $dirname, $filename);
                }

                Ad::create([
                    'title' => $request->title,
                    'price' => $request->price,
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                    'user_id' => auth::user()->id,
                    'type' => $type,
                    'image' => $filename
                ]);

                Kitchenware::create([
                    'model' => $request->model,
                    'warranty' => $request->warranty,
                    'advert_id' => $nextId,
                ]);
            }
            return redirect()->back();

        } else {
            echo 'please login';
            return redirect('/');
        }
    }

    public function remove(Request $request, Ad $ad)
    {
        $request->user()->ads()->where('id', $ad->id)->delete();
    }

    public function edit($ad_id)
    {
        //$advert = DB::table('ads')->where('id', $ad_id)->pluck('type');
        $advert = Ad::where('id', $ad_id);
        $type = $advert->pluck('type')[0];

        if ($type == '1') {
            // Book::where
            $categories = DB::table('books')->where('advert_id', $ad_id);
            return view('edit.book', compact('advert', 'categories'));
        } elseif ($type == '2') {
            $categories = DB::table('electronics')->where('advert_id', $ad_id);
            return view('edit.electro', compact('advert', 'categories'));
        } else {
            $categories = DB::table('kitchenwares')->where('advert_id', $ad_id);
            return view('edit.kitchen', compact('advert', 'categories'));
        }

    }

    public function update($ad_id, Request $request)
    {
        $advert = Ad::where('id', $ad_id);
        $type = $advert->pluck('type')[0];
        //return $type;
        // check login
        if (Auth::check())
        {
            // store book info
            if ($type == '1') {
                $this->validate($request, [
                    'title' => 'required|max:250',
                    'isbn' => 'required|min:10|max:13',
                    'code' => 'required|min:7|max:10',
                    'author' => 'required|max:50',
                    'edition' => 'required|max:50',
                    'price' => 'required|numeric|digits_between:0,10',
                    'visibility' => 'required',
                    'uploadfile' => 'required',
                    'description' => 'required|max:500'
                ]);

                if ($request->hasFile('uploadfile')) {
                    // upload file
                    $uploadfile = $request->file('uploadfile');
                    // get file extension
                    $ext = $uploadfile->getClientOriginalExtension();

                    // deal with the file name
                    $temp_name = str_random(20);
                    $filename = $temp_name . "." . $ext;
                    //$dirname = date('Ymd',time());
                    // save image
                    $uploadfile->move('./uploads/20180917/', $filename);
                }

                $advert->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                    'user_id' => auth::user()->id,
                    'type' => $type,
                    'image' => $filename
                ]);

                $book = Book::where('advert_id', $ad_id);
                $book->update([
                    'isbn' => $request->isbn,
                    'courseCode' => $request->code,
                    'author' => $request->author,
                    'edition' => $request->edition,
                ]);
            } elseif($type == '2') {
                $this->validate($request, [
                    'title' => 'required|max:250',
                    'model' => 'required|max:50',
                    'warranty' => 'required|max:50',
                    'price' => 'required|max:50',
                    'visibility' => 'required',
                    'uploadfile' => 'required',
                    'description' => 'required|max:500'
                ]);

                if ($request->hasFile('uploadfile')) {
                    // upload file
                    $uploadfile = $request->file('uploadfile');
                    // get file extension
                    $ext = $uploadfile->getClientOriginalExtension();

                    // deal with the file name
                    $temp_name = str_random(20);
                    $filename = $temp_name . "." . $ext;
                    //$dirname = date('Ymd',time());
                    // save image
                    $uploadfile->move('./uploads/20180917/', $filename);
                }

                $advert->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                    'user_id' => auth::user()->id,
                    'type' => $type,
                    'image' => $filename
                ]);

                $electronic = Electronic::where('advert_id', $ad_id);
                $electronic->update([
                    'model' => $request->model,
                    'warranty' => $request->warranty,
                ]);
            } else {
                $this->validate($request, [
                    'title' => 'required|max:250',
                    'model' => 'required|max:50',
                    'warranty' => 'required|max:50',
                    'price' => 'required|max:50',
                    'visibility' => 'required',
                    'uploadfile' => 'required',
                    'description' => 'required|max:500'
                ]);

                if ($request->hasFile('uploadfile')) {
                    // upload file
                    $uploadfile = $request->file('uploadfile');
                    // get file extension
                    $ext = $uploadfile->getClientOriginalExtension();

                    // deal with the file name
                    $temp_name = str_random(20);
                    $filename = $temp_name . "." . $ext;
                    //$dirname = date('Ymd',time());
                    // save image
                    $uploadfile->move('./uploads/20180917/', $filename);
                }

                $advert->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                    'user_id' => auth::user()->id,
                    'type' => $type,
                    'image' => $filename
                ]);

                $kitchenware = Kitchenware::where('advert_id', $ad_id);
                $kitchenware->update([
                    'model' => $request->model,
                    'warranty' => $request->warranty,
                ]);
            }
            return redirect('/user/selling');

            //session()->flash('success', 'advertise information has updated!');
        } else {
            echo 'please login';
            return redirect('/');
        }
    }
}
