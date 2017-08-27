<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>User Login with social</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/user/social_login" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
	  <label for="email">social_type</label>
          <input type="text" class="form-control" name="social_type">
        </div>
	<div class="form-group">
	  <label for="email">social_id</label>
          <input type="text" class="form-control" name="social_id">
        </div>
	<div class="form-group">
	  <label for="email">email</label>
          <input type="text" class="form-control" name="email">
        </div>
	<div class="form-group">
	  <label for="email">first_name</label>
          <input type="text" class="form-control" name="first_name">
        </div>
	<div class="form-group">
	  <label for="email">last_name</label>
          <input type="text" class="form-control" name="last_name">
        </div>
        <div class="form-group">
          <label for="pwd">image</label>
          <input type="file" class="form-control" name="image">
        </div>  
          
           <div class="form-group">
          <label for="pwd">Lattitude</label>
          <input type="text" class="form-control" name="deLatitude">
        </div>
          <div class="form-group">
          <label for="pwd">Longitude</label>
          <input type="text" class="form-control" name="deLongitude">
        </div>
	<div class="form-group">
          <label for="pwd">deviceid</label>
          <input type="text" class="form-control" name="deviceid">
        </div>
	<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>