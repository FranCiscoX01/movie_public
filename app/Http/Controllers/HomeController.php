<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryMovies;
use DB;
use App\Film;
use App\Picture;

class HomeController extends Controller
{
    public function index()
    {
        $estrenos = DB::table('films as f')
                        ->join('pivot_category_film as pcf','pcf.film_id','=','f.id')
                        ->join('category_movies as cm','cm.id','=','pcf.category_id')
                        ->join('pictures as pic','pic.id','=','f.picture_id')
                        ->where('pcf.category_id',3)
                        ->where('cm.status','!=',3)
                        ->where('f.status',1)
                        ->select('f.*', 'pic.url', 'pic.slug')
                        ->limit(8)
                        ->distinct()
                        ->get();

        $recomendado = DB::table('films as f')
                        ->join('pivot_category_film as pcf','pcf.film_id','=','f.id')
                        ->join('pictures as pic','pic.id','=','f.picture_id')
                        ->where('f.status',1)
						->select('f.*', 'pic.url', 'pic.slug')
						->limit(8)
						->inRandomOrder()
						->distinct()
                        ->get();

        $recomendado_slider = DB::table('films as f')
                        ->join('pivot_category_film as pcf','pcf.film_id','=','f.id')
                        ->join('pictures as pic','pic.id','=','f.picture_id')
                        ->where('f.status',1)
						->select('f.*', 'pic.url', 'pic.slug')
						->limit(3)
						->inRandomOrder()
						->distinct()
                        ->get();



        //return json_encode($estrenos);
        return view('home', compact('estrenos','recomendado','recomendado_slider'));
    }

    public function searchFilm(Request $request)
    {
        $search = $request->s;

        $categories = CategoryMovies::where('status',1)->select('id', 'name')->get();

        $categories->reject(function($categories) {
            $categories->count = DB::table('pivot_category_film as pcf')
                                        ->join('category_movies as cm','pcf.category_id','=','cm.id')
                                        ->where('cm.status',1)
                                        ->where('cm.id',$categories->id)
                                        ->distinct()
                                        ->count();
        });

        //return json_encode($categories);
        return view('search.index', compact('search','categories'));
    }

    public function getDataSearch(Request $request)
    {
        $result = DB::table('films as f')
                        ->join('pictures as pic','pic.id','=','f.picture_id')
                        ->where('f.name','LIKE','%'.$request['string'].'%')
                        ->orWhere('f.description','LIKE','%'.$request['string'].'%')
                        ->where('f.status',1)
						->select('f.*', 'pic.url', 'pic.slug')
						->distinct()
                        ->paginate(12);

        return $result;
    }

    public function filmInformation($id)
    {
        $data = Film::find($id);

        $data->picture = Picture::find($data->picture_id);

        $data->categories = DB::table('pivot_category_film as pcf')
                                    ->join('category_movies as cm','cm.id','=','pcf.category_id')
                                    ->where('pcf.film_id',$id)
                                    ->where('pcf.status',1)
                                    ->where('cm.status',1)
                                    ->select('cm.name')
                                    ->get();

        //return json_encode($data);

        return view('film.index', compact('data'));
    }

    public function getDataCategory($id)
    {
        $id_category = $id;

        $categories = CategoryMovies::where('status',1)->select('id', 'name')->get();

        $categories->reject(function($categories) {
            $categories->count = DB::table('pivot_category_film as pcf')
                                        ->join('category_movies as cm','pcf.category_id','=','cm.id')
                                        ->where('cm.status',1)
                                        ->where('cm.id',$categories->id)
                                        ->distinct()
                                        ->count();
        });

        return view('search.category', compact('id_category', 'categories'));
    }

    public function getDataCategorySearch(Request $request)
    {
        $data = DB::table('pivot_category_film as pcf')
                            ->join('films as f','pcf.film_id','=','f.id')
                            ->join('pictures as pic','pic.id','=','f.picture_id')
                            ->where('pcf.category_id',$request['id'])
                            ->select('f.*', 'pic.url', 'pic.slug')
                            ->paginate(12);


        return $data;
    }
}
