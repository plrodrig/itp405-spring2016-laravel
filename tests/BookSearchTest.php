<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookSearchTest extends TestCase
{


public function testMatchBooks()
{
  $books = [
    [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
    [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
    [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
    [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
    [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
    [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
    [ 'title' => 'Head First Java', 'pages' => 200 ]
  ];
  // Arrange
  $search = new \App\Services\BookSearch($books);
  //Act
  $results = $search->find('javascript', false);
  //Assert
  $this->assertArraySubset($results, [
    [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
    [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
    [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
  ]);
 }

 public function testFindExactMatch()
 {
   $books = [
     [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
     [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
     [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
     [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
     [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
     [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
     [ 'title' => 'Head First Java', 'pages' => 200 ]
   ];
   //Arrange
   $search = new \App\Services\BookSearch($books);

    // returns [ 'title' => JavaScript Web Applications', 'pages' => 99 ]
    $results = $search->find('javascript web applications', true);
    // dd(count($results));
    $this->assertEquals($results, [
      [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
    ]);
 }


 public function testFindExactMatchFalse()
 {
   $books = [
     [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
     [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
     [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
     [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
     [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
     [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
     [ 'title' => 'Head First Java', 'pages' => 200 ]
   ];
   //Arrange
   $search = new \App\Services\BookSearch($books);

    // returns [ 'title' => JavaScript Web Applications', 'pages' => 99 ]
    $results = $search->find('javascript web application', true);
    // dd(count($results));
    $this->assertEquals($results,
      []
    );
 }

}
