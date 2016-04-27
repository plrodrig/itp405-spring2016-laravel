<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @foreach($images as $image)
      <div>
        {{ $image['images']['low_resolution']['url'] }}
        <img src="{{$image['images']['low_resolution']['url']}}">
      </div>
    @endforeach

  </body>
</html>
