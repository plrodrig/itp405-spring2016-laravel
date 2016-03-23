<!doctype html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <title>Song Search</title>
    </head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand href="#">Priscilla's Movie Database</a>
        </div>
    </div>
    <!-- /.container -->
</nav>
<div class="row">
<div class="col-md-6">
<dl class="dl-horizontal">
        <dt>Genre</dt>
        <?php foreach($genres as $genre) : ?>

          <dd>   <a href="/genres/<?php echo $genre->id ?>/dvds"><?php echo $genre->genre_name ?> </a> <dd>
        <?php endforeach; ?>
</dl>
</div>
<div class="col-md-6">
<div class="panel" style="width: 600px; margin: 0 auto;">
    <div class="panel-heading">
        <h3 class="panel-title"></h3>
    </div>
    <div class="panel-body">
      <h1>DVD Search</h1>
  <form action="/dvds" method="get" class="form-horizontal" novalidate="">
        <div class="form-group">
              <label class="control-label col-md-3">DVD title: </label>
                <div class="col-md-6">
                  <input class='form-control' type="text" name="dvd_title">
                </div>
        </div>
        <div class="form-group">
              <label class="control-label col-md-3">Genre: </label>
                <div class="col-md-6">
                  <select class='form-control' name="genre_name">
                      <?php foreach($genres as $genre) : ?>
                          <option value="<?php echo $genre->genre_name ?>"> <?php echo $genre->genre_name ?></option>
                      <?php endforeach; ?>
                      <option value="All">All</option>
                  </select>
                </div>
        </div>
        <div class="form-group">
              <label class="control-label col-md-3">Rating: </label>
                <div class="col-md-6">
                  <select class='form-control' name="rating_name">
                      <?php foreach($ratings as $rating) : ?>
                          <option value="<?php echo $rating->rating_name ?>"> <?php echo $rating->rating_name ?></option>
                      <?php endforeach; ?>
                      <option value="All">All</option>
                  </select>
                </div>
        </div>
    <div class='form-group'>
        <div class='col-md-7 col-md-offset-3'>
          <input type="submit" value= "Search" class='btn btn-primary'>
        </div>
    </div>
  </form>
		</div>
		<div class="input_fields_wrap">
			<!-- Dynamic Fields go here -->
		</div>
	</div>
</div>
</div>
</div> <!--./container-->

<!-- Footer -->
<footer>

</footer>
</body>
</html>
