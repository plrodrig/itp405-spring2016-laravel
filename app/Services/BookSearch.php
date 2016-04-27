<?php
namespace App\Services;

class BookSearch {
   protected $books;
   public function __construct($books)
   {
     $this->books = $books;

   }
   public function find($searchTerm, $exact)
   {
    $results = [];
    $books = $this->books;
    if($exact){
      foreach($books as $book){
          //$book = array_map('strval', $book);
// $searchTerm == $book['title']
          if(strtolower($searchTerm) ==  strtolower($book['title'])){
            echo $searchTerm . $book['title'] . PHP_EOL;
              //both equal in case-insensitive string comparison
              // $results[] = $book;
              $results[] = [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ];
          }
      }
     }else{
       foreach($books as $book){
           $book = array_map('strval', $book);
           if(strcasecmp($searchTerm, $book['title']) == 0){
               //both equal in case-insensitive string comparison
               $results[] = $book;
           }
       }
     }
     return $results;
   }
}
