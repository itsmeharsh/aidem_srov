<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>User Register with email</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/user/register" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">name</label>
          <input type="text" class="form-control" name="name">
        </div>

	<div class="form-group">
          <label for="pwd">email</label>
          <input type="text" class="form-control" name="email">
        </div>
	<div class="form-group">
          <label for="pwd">password</label>
          <input type="text" class="form-control" name="password">
        </div>
	<div class="form-group">
          <label for="pwd">image</label>
          <input type="file" class="form-control" name="image">
        </div>
	
	<div class="form-group">
          <label for="pwd">deviceid</label>
          <input type="text" class="form-control" name="deviceid">
        </div>
           <div class="form-group">
          <label for="pwd">Lattitude</label>
          <input type="text" class="form-control" name="deLatitude">
        </div>
          <div class="form-group">
          <label for="pwd">Longitude</label>
          <input type="text" class="form-control" name="deLongitude">
        </div>
	
	<button type="submit" class="btn btn-default">Submit</button>
	
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>