@extends('layout')
@section('content')
    @foreach($images as $image)
      <div>
        <h4> Location: </h4> <p> {{$image['location']['name']}} </p> 
         <img src="{{$image['images']['low_resolution']['url']}}">
      </div>
    @endforeach
@endsection
