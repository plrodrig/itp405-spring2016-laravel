<?php
namespace  App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
Use App\Http\Controllers\Controller;
use Validator;
use App\Models\Genre;
use App\Models\Label;
use App\Models\Sound;
use App\Models\Rating;
use App\Models\Format;
use App\Models\Dvd;


class DvdController extends Controller{
    //presents dvds of a genre
    public function genreResults($id){

      $genre = Genre::find($id);
      $dvds = DVD::with('genre', 'rating') ->where('genre_id', '=', $id)->get();

      return view('genreResults', [
        'genre' => $genre,
        'dvds'=> $dvds
      ]);
    }
    //Renders a view, presents asearch form
    public function search(){

        //$genres = DB::table('genres')->get();
        //using eloquent to get all genres
        $genres = Genre::all();
        $ratings = DB::table('ratings')->get();
        return view('search', [
            'genres' => $genres,
            'ratings' => $ratings
        ]);
    }
    //Renders a view, presents form to insert new DVD
    public function create(){

        return view('create', [
          'genres' => Genre::all(),
          'labels' => Label::all(),
          'sounds' => Sound::all(),
          'ratings' => Rating::all(),
          'formats' => Format::all()
        ]);
    }
    //on the search page, form submits to another url that is associated with this method
    public function results(Request $request)
    {
        $dvd_title = $request->input('dvd_title', '');
        $rating_title = $request->input('rating_name', '');
        $genre_title = $request->input('genre_name', '');


        //First makes one query search
        $movies = DB::table('dvds')
        ->select('title', 'dvds.id', 'genre_name', 'rating_name', 'label_name', 'sound_name', 'format_name')
            ->join('labels', 'dvds.label_id', '=', 'labels.id')
            ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->join('formats', 'dvds.format_id', '=', 'formats.id')
            ->join('genres', 'dvds.genre_id', '=', 'genres.id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id');
        //filter through my results based on criteria
        if($dvd_title != ''){
            $movies = $movies->where('title', 'like', "%$dvd_title%");
        }

        if($genre_title !== 'All' && $genre_title != ''){
            $movies = $movies->where('genre_name', 'like', $genre_title);
        }

        if($rating_title !== 'All' && $rating_title != ''){
            $movies = $movies->where('rating_name', 'like', $rating_title);
            //$movies = $movies->where('genre_id', '=', $genre_title);
        }

        $movies = $movies->get();

        $ratings = DB::table('ratings')->get();
        //return list of data, the results
        return view('results', [
            'dvd_title' => $dvd_title,
            'rating_title'=> $rating_title,
            'genre_title' => $genre_title,
            'ratings' => $ratings,
            'movies' => $movies,
        ]);
    }
    //delivers a view that presents review form to a user, as well as details of dvd and other reviews
    public function details($id){
        $movieID = $id;
        $reviews = DB::table('reviews')
            ->select('dvd_id', 'title', 'description', 'rating')
            ->orderBy('title')
            ->where('dvd_id', '=', $id)
            ->get();
        $movie = DB::table('dvds')
            ->select('label_name', 'title', 'release_date', 'award', 'sound_name', 'genre_name', 'rating_name', 'format_name', 'dvds.id')
            ->join('labels', 'dvds.label_id', '=', 'labels.id')
            //get record where foreign key matches primary key
            //combine rows from two or more tables based on a common field
            ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->join('genres', 'dvds.genre_id', '=', 'genres.id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->join('formats', 'dvds.format_id', '=', 'formats.id')
            //get record for desired id
            ->where('dvds.id', '=', $id)
            ->get();
     //   dd($movie);
     //to pass reviews to view, pass in the array
     //create a key called reviews so in view there is a variable called reviews
        return view('details', [
            'movie' => $movie,
            'reviews' => $reviews,
            'movieID' => $id
        ]);
    }
    //process data, wont have its own view, insert into the databse, do some validations & redirect back to same view
    public function store($id, Request $request){

      $validation = Validator::make($request->all(),[
        'title' => 'required|min:5',
        'rating' => 'digits_between:1,10',
        'description' => 'required|min:10',
        'dvd_id' => 'required|integer'

      ]);

      //if validation fails, redirect to same page with errors
      if($validation->fails()){
        return redirect('dvds/' . $id)
        ->withInput()
        ->withErrors($validation);
      }
      //If Reached this point, can insert review into database

      DB::table('reviews')->insert([
        'title' => $request->input('title'),
        'rating' => $request->input('rating'),
        'description' => $request->input('description'),
        'dvd_id'=> $id
      ]);
      //$id = $request->input('dvdId');
      return redirect('dvds/' . $id)->with('success', true);
    }

    public function insertDvd(Request $request){
      $validation = Validator::make($request->all(),[
        'dvd_title' => 'required',
        'genre' => 'required',
        'sound' => 'required',
        'label' => 'required',
        'rating' => 'required',
        'format' => 'required'
      ]);

      //if validation fails, redirect to same page with errors
      if($validation->fails()){
        return redirect('dvds/create')
        ->withInput()
        ->withErrors($validation);
      }
      //add Dvd to DB
      $dvd = new Dvd([
        'title' => $request->input('dvd_title'),
        'genre_id' => $request->input('genre'),
        'sound_id' => $request->input('sound'),
        'label_id' => $request->input('label'),
        'rating_id' => $request->input('rating'),
        'format_id' => $request->input('format')
      ]);
      $dvd->save();
      return redirect('dvds/create')->with('success', true);
    }
}
