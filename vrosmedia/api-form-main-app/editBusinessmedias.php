<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Edit Business Medias</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/business/edit_business_medias" method="post" role="form" enctype="multipart/form-data" >
          <div class="form-group">
          <label for="email">Business ID</label>
          <input type="text" class="form-control" name="business_id">
        </div>
        <div class="form-group">
          <label for="email">image</label>
          <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
          <label for="email">row_id</label>
          <input type="text" class="form-control" name="row_id">
        </div>
          
          <div class="form-group">
          <label for="email">is_default (1 or 0)</label>
          <input type="text" class="form-control" name="is_default">
        </div>
           <div class="form-group">
          <label for="email">type (i or v)</label>
          <input type="text" class="form-control" name="type">
        </div>
          
        
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>