<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/instagram/{lat}/{lng}', function($lat, $lng){
  $instagram = new Instagram([
    'clientID' => '32c49420641e47cf8af943b347fdfd0f'
  ]);
  $images = $instagram->images();
});


Route::get('/', function () {
    return view('welcome');
});


//Define routes for API
Route::group(['prefix' => 'api/v1', 'namespace' => 'API'], function(){
  //GET /api/v1/dvds
  //Route::get('dvds', 'DvdController@index');
  Route::get('dvds', 'GenreController@showDvds');
  Route::get('dvds/{id}', 'GenreController@showDvd');
  //getting a list of somethng is called index in laravel, its a convention.
  //To accesss a single resource, name it show
  //GET api/v1/genres/{id}
  Route::get('genres/{id}', 'GenreController@show');
  //URL Path is
  //GET api/v1/artists
  Route::get('genres', 'GenreController@index');
  //get a single genre, the genre resource
  //define as GET api/v1/genres/{id}

  //create a dvd, so POST api/v1/dvd
  Route::post('dvds', 'GenreController@store');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
  Route::get('/genres/{id}/dvds', 'DvdController@genreResults');
  Route::get('/dvds/create', 'DvdController@create');
  Route::post('/dvds', 'DvdController@insertDvd');
  Route::get('/dvds/search', 'DvdController@search');
  Route::get('/dvds', 'DvdController@results');
  Route::get('/dvds/{id}', 'DvdController@details');
  Route::post('/dvds/{id}', 'DvdController@store');
});
