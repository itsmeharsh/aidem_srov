<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>City Map</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/map/get" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">userid:</label>
          <input type="text" class="form-control" name="userid">
        </div>
          <div class="form-group">
          <label for="email">cityID:</label>
          <input type="text" class="form-control" name="cityID">
        </div>
       <div class="form-group">
          <label for="email">lat:</label>
          <input type="text" class="form-control" name="lat">
        </div>
        <div class="form-group">
          <label for="email">lng:</label>
          <input type="text" class="form-control" name="lng">
        </div>
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>