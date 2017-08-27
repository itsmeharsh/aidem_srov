<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Friends Requests</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/friends/friends_requestLists" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">user_id</label>
          <input type="text" class="form-control" name="user_id">
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