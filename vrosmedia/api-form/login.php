<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Driver Login</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>user/login" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">texi_no:</label>
          <input type="text" class="form-control" name="texi_no">
        </div>
        <div class="form-group">
          <label for="pwd">name:</label>
          <input type="text" class="form-control" name="name">Driver Name
        </div>
		<div class="form-group">
          <label for="pwd">deviceid:</label>
          <input type="text" class="form-control" name="deviceid">
        </div>
            <div class="form-group">
          <label for="email">cityID:</label>
          <input type="text" class="form-control" name="cityID">
        </div>
		    <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>