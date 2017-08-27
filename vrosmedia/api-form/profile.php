<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Get Profile</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/user/get_profile_data" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">userid:</label>
          <input type="text" class="form-control" name="userid">
        </div>
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>