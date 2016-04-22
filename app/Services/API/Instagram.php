<?php

namespace App\Services\API;

class Instagram{
  protected $clientID;
  public function __construct(array $config = [])
  {
    $this->clientID = $config['clientID'];
  }

  public function images()
  {
    $clientID = $this->clientID;
    $url = "https://api.instagram.com/v1/media/search?lat=48.858844&lng=2.294351&client_id=$clientID";
    $jsonString = file_get_contents($url);
    // var_dump($jsonString);
    // echo $jsonString;
    // dd($jsonString);
    // $json = json_decode($jsonString);
    // return $json;
    // $posts = json_decode($jsonString, true);
    // dd($posts);
    // return $posts;
    // var_dump($posts);
    echo $jsonString;

    // return $jsonString;
  }
}


//https://api.instagram.com/v1/media/search?lat=48.858844&lng=2.294351&client_id=32c49420641e47cf8af943b347fdfd0f
