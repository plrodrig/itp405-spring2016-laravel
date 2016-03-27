<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\DVD;
use Response;
use Validator;
class GenreController extends Controller
{
  //works like a form submission
  public function store(Request $request){
    $validation = Validator::make($request->all(),[
      'title' => 'required|unique:dvds,title'
    ]);
    if($validation->passes()){
      $dvd        = new Dvd();
      $dvd->id    = $request->input('id');
      $dvd->title = $request->input('title');
      $dvd->award = $request->input('award');
      $dvd->genre_id = $request->input('genre_id');
      $dvd->rating_id = $request->input('rating_id');
      $dvd->save();
      return [
        'dvd' => $dvd
      ];
    }
    return Response::json([
      'error' => [
        'title' => $validation->errors()->get('title')
        ]
    ], 422);

  }
  //Get genres and display to page
    public function index()
    {
      //return array of Genre objects
      return[
        'genres' => Genre::all()
      ];
    }

  //Get a single Genre
  public function show($id)
  {
    //check if genre found, if it exists
    //return 200 response code
    $genre = Genre::find($id);
    if(!$genre){
      return Response::json([
        'error' => 'Genre not found'
      ], 400);
    }
    return[
      'genre' => $genre
    ];

  }
}
