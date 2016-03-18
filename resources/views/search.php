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

<!-- Content Section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-5">
        <h1>Dvd Search</h1>
        <!--Send a request to route /dvds, which displays results.php through dvdcontroller's results method-->
        <form action="/dvds" method="get">
            DVD Title: <input type="text" name="dvd_title">
            <br>
            <select name="genre_name">
                <?php foreach($genres as $genre) : ?>
                    <option value="<?php echo $genre->genre_name ?>"> <?php echo $genre->genre_name ?></option>
                <?php endforeach; ?>
                <option value="All">All</option>
            </select>

            <select name="rating_name">
                <?php foreach($ratings as $rating) : ?>
                    <option value="<?php echo $rating->rating_name ?>"> <?php echo $rating->rating_name ?></option>
                <?php endforeach; ?>
                <option value="All">All</option>
            </select>
            <input type="submit" value= "Search">
        </form>
                </div>
        </div>

    </div>
</section>


<!-- Footer -->
<footer>

</footer>
</body>
</html>
