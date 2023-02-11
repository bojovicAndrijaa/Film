<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Resources\FilmResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $wrap='film';
    public function index()
    {
        $films=Film::all();

        $my_films=array();
        foreach($films as $film){
            array_push($my_films,new BookResource($film));
        }

        return $my_films;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film){
        return new FilmResource($film);
    }

    public function getByReziser($reziser_id){
        $films=Film::get()->where('reziser_id',$reziser_id);

        if(count($films)==0){
            return response()->json('Reziser with this id does not exist!');
        }

        $my_films=array();
        foreach($films as $film){
            array_push($my_films,new FilmResource($film));
        }

        return $my_films;
    }

    public function myFilms(Request $request){
        $films=Film::get()->where('user_id',Auth::user()->id);  // komentar
        if(count($films)==0){
            return 'You dont have saved films!';
        }
        $my_films=array();
        foreach($films as $film){
            array_push($my_films,new FilmResource($film));
        }

        return $my_films;
    }

    public function getByKategorija($kategorija_id){
        $films=Film::get()->where('kategorija_id',$kategorija_id);

        if(count($films)==0){
            return response()->json('This category id does not exist!');
        }

        $my_films=array();
        foreach($films as $film){
            array_push($my_films,new FilmResource($film));
        }

        return $my_films;
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|String|max:255',
            'duration'=>'required|Integer|max:3000000',            
            'award'=>'required|String|max:255',
            'reziser_id'=>'required',
            'kategorija_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $film=new Film;
        $film->name=$request->name;
        $film->duration=$request->duration;
        $film->award=$request->award;
      
        $film->user_id=Auth::user()->id;
        $film->kategorija_id=$request->kategorija_id;
        $film->reziser_id=$request->reziser_id;

        $film->save();

        return response()->json(['Film stored successfully',new FilmResource($film)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|String|max:255',
            'duration'=>'required|Integer|max:3000000',            
            'award'=>'required|String|max:255',
            'reziser_id'=>'required',
            'kategorija_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $film->name=$request->name;
        $film->duration=$request->duration;
        $film->award=$request->award;      
        $film->user_id=Auth::user()->id;
        $film->kategorija_id=$request->kategorija_id;
        $film->reziser_id=$request->reziser_id;

        $result=$film->update();

        if($result==false){
            return response()->json('Problem updating film!');
        }
        return response()->json(['Film updated successfully!',new FilmResource($film)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return response()->json('Book '.$film->title .'deleted successfully!');
    }
}
