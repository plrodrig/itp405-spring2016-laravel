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
    $posts = json_decode($jsonString);

    var_dump($posts);
  }
}


//https://api.instagram.com/v1/media/search?lat=48.858844&lng=2.294351&client_id=32c49420641e47cf8af943b347fdfd0f
