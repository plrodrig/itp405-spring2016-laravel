<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Results</title>
</head>
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
    <div class="col-md-4 col-md-offset-5">
        <h1>Results</h1>

        <p>Your search criteria <span class="bg-info"> <?php echo $dvd_title ?></p> </span>
        <p>Your search criteria <span class="bg-info"><?php echo $rating_title ?></p> </span>
        <p>Your search criteria <span class="bg-info"><?php echo $genre_title ?></p> </span>

    </div>
</div>

<table class="table table-hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>Rating</th>
        <th>Genre</th>
        <th>Label</th>
        <th>Sound</th>
        <th>Format</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach($movies as $movie) : ?>
    <tr>
        <td><?php echo $movie->title ?></td>
        <td><?php echo $movie->rating_name ?></td>
        <td><?php echo $movie->genre_name ?></td>
        <td><?php echo $movie->label_name ?></td>
        <td><?php echo $movie->sound_name ?></td>
        <td><?php echo $movie->format_name ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>