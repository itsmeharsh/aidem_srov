<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Share Event With Friends Detail</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/event/share_event_with_friends" method="post" role="form" >
        <div class="form-group">
          <label for="email">event id</label>
          <input type="text" class="form-control" name="event_id">
        </div>
          <div class="form-group">
          <label for="email">user id</label>
          <input type="text" class="form-control" name="user_id">
        </div>
        <div class="form-group">
          <label for="email">friends ids</label>
          <input type="text" class="form-control" name="friends_ids">
        </div>
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>