<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Add Event Attendee</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/event/add_event_attendee" method="post" role="form" >
        <div class="form-group">
          <label for="email">event id</label>
          <input type="text" class="form-control" name="event_id">
        </div>
          <div class="form-group">
          <label for="email">user id</label>
          <input type="text" class="form-control" name="user_id">
        </div>
        <div class="form-group">
          <label for="email">touser_id</label>
          <input type="text" class="form-control" name="touser_id">
        </div>
           <div class="form-group">
          <label for="email">invitation_status (0=Pending 1=Accept 2=Reject 3=May be)</label>
          <input type="text" class="form-control" name="invitation_status">
        </div>
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>