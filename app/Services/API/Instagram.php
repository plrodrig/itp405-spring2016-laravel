<?php

namespace App\Services\API;
use Cache;

class Instagram{
  protected $clientID;
  public function __construct(array $config = [])
  {
    $this->clientID = $config['clientID'];
  }

  public function images($lat, $lng)
  {
    if(Cache::get($lat+$lng)){
      //return data from Cache
      $jsonString =  Cache::get($lat+$lng);
    } else {
      //request data from Instagram
      //Put data in the Cache
      //return that data
      $clientID = $this->clientID;
      $url = "https://api.instagram.com/v1/media/search?lat=$lat&lng=$lng&client_id=$clientID";
      $jsonString = file_get_contents($url);

      Cache::put($lat+$lng, $jsonString, 30);
    }
    return $jsonString;
      //echo $jsonString;

  }
}


//https://api.instagram.com/v1/media/search?lat=48.858844&lng=2.294351&client_id=32c49420641e47cf8af943b347fdfd0f
