<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Store App Event</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/setting/add_business_revenue_count" method="post" role="form" >
        <div class="form-group">
          <label for="email">user_id:</label>
          <input type="text" class="form-control" name="user_id">
        </div>
        <div class="form-group">
          <label for="email">type:</label>
          <input type="text" class="form-control" name="type"> 1=Click 2=Impression 3=QR Reader
        </div>
        <div class="form-group">
          <label for="email">business_id:</label>
          <input type="text" class="form-control" name="business_id">
        </div>
        <div class="form-group">
          <label for="email">offer_id:</label>
          <input type="text" class="form-control" name="offer_id">
        </div>
        <div class="form-group">
          <label for="email">ads_id:</label>
          <input type="text" class="form-control" name="ads_id">
        </div>
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>