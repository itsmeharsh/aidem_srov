<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Graph</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/api/graph" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">userid:</label>
          <input type="text" class="form-control" name="userid">
        </div>
        <div class="form-group">
          <label for="email">type:</label>
          <input type="text" class="form-control" name="type"> 1=Click 2=Impression 3=QR Reader
        </div>
        
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>