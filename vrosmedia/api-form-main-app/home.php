<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Home</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/business/home" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">Lattitude</label>
          <input type="text" class="form-control" name="deLatitude">
        </div>
         <div class="form-group">
          <label for="email">Longitude</label>
          <input type="text" class="form-control" name="deLongitude">
        </div>
         <div class="form-group">
          <label for="email">Limit</label>
          <input type="text" class="form-control" name="Limit">
        </div>
           <div class="form-group">
          <label for="email">Offset</label>
          <input type="text" class="form-control" name="Offset">
        </div>
         <div class="form-group">
          <label for="email">Radius</label>
          <input type="text" class="form-control" name="iRadius">
        </div>
           <div class="form-group">
          <label for="email">User ID</label>
          <input type="text" class="form-control" name="user_id">
        </div>
           <div class="form-group">
          <label for="email">Distance Type</label>
          <input type="text" class="form-control" name="DistanceType">
        </div>
          <div class="form-group">
              <label for="email">start date</label>
              <input type="text" class="form-control" name="start_date">
          </div>
          <div class="form-group">
              <label for="email">end date</label>
              <input type="text" class="form-control" name="end_date">
          </div>
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>