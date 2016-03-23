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

<!--Display the Genre-->

<h1>Genre:<?php echo $genre->genre_name ?><h1>
  <table class="table table-hover">
    <thead>
        <th>Title </th>
        <th>Rating</th>
        <th>Genre</th>
        <th>Label</th>
    </thread>
    <!--Table that loops over a  list of results and outputs each one to its own data cell-->

      <?php foreach($dvds as $dvd) : ?>
        <tr>
          <td><?php echo $dvd->title ?></td>
          <td><?php echo $dvd->rating_name ?></td>
          <td><?php echo $dvd->genre_name ?></td>
          <td><?php echo $dvd->label_name ?></td>
        </tr>
      <?php endforeach; ?>

  </table>

</body>
</html>
