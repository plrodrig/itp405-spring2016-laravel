<?php
namespace  App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
Use App\Http\Controllers\Controller;
class DvdController extends Controller{
    //Renders a view, presents a page that displays search form
    public function search(){
        $genres = DB::table('genres')->get();
        $ratings = DB::table('ratings')->get();
        return view('search', [
            'genres' => $genres,
            'ratings' => $ratings
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
        ->select('title', 'genre_name', 'rating_name', 'label_name', 'sound_name', 'format_name')
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
        return view('results', [
            'dvd_title' => $dvd_title,
            'rating_title'=> $rating_title,
            'genre_title' => $genre_title,
            'ratings' => $ratings,
            'movies' => $movies,
        ]);
    }
}