<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Update Profile</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/user/update_profile_data" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">user_id</label>
          <input type="text" class="form-control" name="user_id">
        </div>
       
         <div class="form-group">
          <label for="email">name</label>
          <input type="text" class="form-control" name="name">
        </div>
         <div class="form-group">
          <label for="email">phone</label>
          <input type="text" class="form-control" name="phone">
        </div>
         <div class="form-group">
          <label for="email">address</label>
          <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
          <label for="email">workphone</label>
          <input type="text" class="form-control" name="work_phone">
        </div>
         <div class="form-group">
          <label for="email">workemail</label>
          <input type="text" class="form-control" name="work_email">
        </div>
         <div class="form-group">
          <label for="email">image</label>
          <input type="file" class="form-control" name="image">
        </div>
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>