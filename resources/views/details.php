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
            <a class="navbar-brand href="#"> Priscilla's Movie Database</a>
        </div>
    </div>
    <!-- /.container -->
</nav>
<div class="row">
    <div class="col-md-4 col-md-offset-5">
        <h1>Details</h1>

    </div>
</div>

<?php if(session('success')) : ?>
  <div class="alert alert-success" role="alert">Review was successfully added.</div>
<?php endif ?>
<?php if (count($errors) > 0) : ?>
  <ul style="list-style: none;">
    <?php foreach($errors->all() as $error) : ?>

        <div class="alert alert-danger">
          <li>
            <?php echo $error ?>
          </li>
         </div>


    <?php endforeach ?>
  </ul>
<?php endif ?>
<dl class="dl-horizontal">
        <dt>Title</dt>
        <dd><?php echo $movie[0]->title ?></dd>
        <dt>Release Date</dt>
        <dd><?php echo $movie[0]->release_date ?></dd>
        <dt>Award</dt>
        <dd><?php echo $movie[0]->award ?></dd>
        <dt>Label</dt>
        <dd><?php echo $movie[0]->label_name ?></dd>
        <dt>Sound</dt>
        <dd><?php echo $movie[0]->sound_name ?></dd>
        <dt>Genre</dt>
        <dd><?php echo $movie[0]->genre_name ?></dd>
        <dt>Rating</dt>
        <dd><?php echo $movie[0]->rating_name ?></dd>
        <dt>Format</dt>
        <dd><?php echo $movie[0]->format_name ?></dd>

</dl>

<div class="col-md-4 col-md-offset-5">
<form action="/dvds/<?php echo $movieID ?>" method="post">
  <?php echo csrf_field() ?>
    <div class = "form-group">
  <label class="col-md-4 control-label" for="selectbasic">
    Title: </label>
    <input type="text" name="title" value="<?php echo old('title') ?>">
    <input type="hidden" name="dvd_id" value="<?php echo $movieID ?>">
    </div>
    <div class = "form-group">
     <label class="col-md-4 control-label" for="Rating">Rating</label>
    <select name="rating" value="<?php echo old('rating') ?>">
        <?php for($x = 1; $x <=10; $x++) : ?>
            <option value="<?php echo $x ?>"> <?php echo $x ?> <br> </option>
        <?php endfor; ?>
    </select>
    </div>
    <div class = "form-group">
     <label class="col-md-4 control-label" for="Comments">Description</label>

    <textarea name="description" rows="5" cols="30"><?php echo old('description') ?></textarea>
    <input type="submit" value= "Add">
    </div>


</form>
</div>
<table class="table table-hover">
  <thead>
      <th>Reviews</th>
      <th>Description</th>
      <th>Rating</th>
  </thread>
  <!--Table that loops over a  list of results and outputs each one to its own data cell-->
    <?php foreach ($reviews as $review) :?>
        <tr>
          <td><?php echo $review->title ?></td>
          <td><?php echo $review->description ?></td>
          <td><?php echo $review->rating ?></td>
        </tr>
    <?php endforeach ?>
</table>
</body>
</html>
