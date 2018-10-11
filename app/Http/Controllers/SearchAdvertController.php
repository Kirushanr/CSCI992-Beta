<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Advert;
use App\Book;
use App\Electronics;

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


        $category = $request->get('category');
        $sort = $request->get('sort');


        /**
         * 0=> All Categories
         * 1=> Books
         * 2=> Electronics
         * 3=> Essentials
         */
        $os = array(0, 1, 2, 3);


        $adverts = array();


        $sort_cateogry = array('newest', 'pricelowhigh', 'pricehighlow', 'name');
        $sort_by = (in_array($sort, $sort_cateogry) ? $sort : 'newest');
      
        //Check if the category is available
        if (in_array($category, $os)) {

            switch ($category) {
                case 0:
                    $adverts = $this->getAllAdverts($sort_by);
                    break;
                case 1:
                    $adverts = $this->getBookAdverts($sort_by);
                    break;
                case 2:
                    $adverts = $this->getElectronicsAdverts($sort_by);
                    break;
                case 3:
                    $adverts = $this->getEssentials($sort_by);
                    break;
            }
        }
        
        return view("search.search")->with('adverts', $adverts);
    }

    public function getElectronicsAdverts($param)
    {
        $DB = DB::table('adverts')
            ->join('electronics', 'adverts.id', '=', 'electronics.advert_id')
            ->select(
                'adverts.id',
                'adverts.title',
                'adverts.description',
                'image_url_1',
                'image_url_2',
                'image_url_3',
                'adverts.price',
                'adverts.advert_type',
                'adverts.created_at'
            )->where([
                ['visibility', '=', true],
                ['expired', '=', false],
            ]);

        if ($param == "newest") {
            $DB = $DB->orderBy('adverts.created_at', 'desc');
        } else if ($param == "pricelowhigh") {
            $DB = $DB->orderBy('adverts.price', 'asc');
        } else if ($param == "pricehighlow") {
            $DB = $DB->orderBy('adverts.price', 'desc');
        } else {
            $DB = $DB->orderBy('adverts.title', 'asc');
        }


        $data = $DB->get();

        return $data;
    }


    public function getAllAdverts($param)
    {
        $DB = DB::table('adverts')->select(
            'adverts.id',
            'adverts.title',
            'adverts.description',
            'image_url_1',
            'image_url_2',
            'image_url_3',
            'adverts.price',
            'adverts.advert_type',
            'adverts.created_at'
        )->where([
            ['visibility', '=', true],
            ['expired', '=', false],
        ]);

        if ($param == "newest") {
            $DB = $DB->orderBy('adverts.created_at', 'desc');
        } else if ($param == "pricelowhigh") {
            $DB = $DB->orderBy('adverts.price', 'asc');
        } else if ($param == "pricehighlow") {
            $DB = $DB->orderBy('adverts.price', 'desc');
        } else {
            $DB = $DB->orderBy('adverts.title', 'asc');
        }


        $data = $DB->get();
        return $data;
    }

    public function getBookAdverts($param)
    {
        $DB = DB::table('adverts')
            ->join('books', 'adverts.id', '=', 'books.advert_id')
            ->select(
                'adverts.id',
                'adverts.title',
                'adverts.description',
                'image_url_1',
                'image_url_2',
                'image_url_3',
                'adverts.price',
                'adverts.advert_type',
                'adverts.created_at'
            )->where([
                ['adverts.visibility', '=', true],
                ['adverts.expired', '=', false],
            ]);

        if ($param == "newest") {
            $DB = $DB->orderBy('adverts.created_at', 'desc');
        } else if ($param == "pricelowhigh") {
            $DB = $DB->orderBy('adverts.price', 'asc');
        } else if ($param == "pricehighlow") {
            $DB = $DB->orderBy('adverts.price', 'desc');
        } else {
            $DB = $DB->orderBy('adverts.title', 'asc');
        }


        $data = $DB->get();



        return $data;
    }

    public function getEssentials($param)
    {
        $DB = DB::table('adverts')->select(
            'adverts.id',
            'adverts.title',
            'adverts.description',
            'image_url_1',
            'image_url_2',
            'image_url_3',
            'adverts.price',
            'adverts.advert_type',
            'adverts.created_at'
        )->where([
            ['visibility', '=', true],
            ['expired', '=', false],
            ['advert_type','=','essentials']
        ]);

        if ($param == "newest") {
            $DB = $DB->orderBy('adverts.created_at', 'desc');
        } else if ($param == "pricelowhigh") {
            $DB = $DB->orderBy('adverts.price', 'asc');
        } else if ($param == "pricehighlow") {
            $DB = $DB->orderBy('adverts.price', 'desc');
        } else {
            $DB = $DB->orderBy('adverts.title', 'asc');
        }


        $data = $DB->get();
        return $data;
    }
}

