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
  </nav>

  <?php if(session('success')) : ?>
    <div class="alert alert-success" role="alert">Review was successfully Inserted.</div>
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

  <!-- Content Section -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-5">
          <h1>Dvd Search</h1>
          <!--Send a request to route /dvds, which displays results.php through dvdcontroller's results method-->
          <form action="/dvds" method="post">
            DVD Title: <input type="text" name="dvd_title">
            <?php echo csrf_field() ?>
            <br>
            <div class = "form-group">
              <label class="col-md-4 control-label" for="Genre">Genre</label>
              <select name="genre">
                <?php foreach($genres as $genre) : ?>
                  <option value="<?php echo $genre->id ?>"> <?php echo $genre->genre_name ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class = "form-group">
              <label class="col-md-4 control-label" for="Sound">Sound</label>
              <select name="sound">
                <?php foreach($sounds as $sound) : ?>
                  <option value="<?php echo $sound->id ?>"> <?php echo $sound->sound_name ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class = "form-group">
              <label class="col-md-4 control-label" for="Label">Label</label>
              <select name="label">
                <?php foreach($labels as $label) : ?>
                  <option value="<?php echo $label->id ?>"> <?php echo $label->label_name ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class = "form-group">
              <label class="col-md-4 control-label" for="Rating">Rating</label>
              <select name="rating">
                <?php foreach($ratings as $rating) : ?>
                  <option value="<?php echo $rating->id ?>"> <?php echo $rating->rating_name ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class = "form-group">
              <label class="col-md-4 control-label" for="Format">Format</label>
              <select name="format">
                <?php foreach($formats as $format) : ?>
                  <option value="<?php echo $format->id ?>"> <?php echo $format->format_name ?></option>
                <?php endforeach; ?>
              </select>
            </div>


            <input type="submit" value="insert">
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
