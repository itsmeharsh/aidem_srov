<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Edit Business</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/business/create_business" method="post" role="form" enctype="multipart/form-data" >
          <div class="form-group">
          <label for="email">Business ID</label>
          <input type="text" class="form-control" name="business_id">
        </div>
        <div class="form-group">
          <label for="email">name</label>
          <input type="text" class="form-control" name="name">
        </div><br>
        <label style="color: red;">images</label><br>
        <div class="form-group">
          <label for="email">image1</label>
          <input type="file" class="form-control" name="image1">
        </div>
         <div class="form-group">
          <label for="email">image2</label>
          <input type="file" class="form-control" name="image2">
        </div>
          <div class="form-group">
              <label for="email">is_images_deleted_ids (comma seperated)</label>
              <input type="text" class="form-control" name="is_images_deleted_ids">
          </div>
      
         <div class="form-group">
          <label for="email">image count</label>
          <input type="number" class="form-control" name="is_iCount">
        </div>
           <br>
        <label style="color: red;">Videos</label><br>
         <div class="form-group">
          <label for="email">video count</label>
          <input type="number" class="form-control" name="is_vCount">
        </div>
         <div class="form-group">
          <label for="email">video 1</label>
          <input type="file" class="form-control" name="video1">
        </div>
          <div class="form-group">
          <label for="email">thumb1</label>
          <input type="file" class="form-control" name="thumb1">
        </div>
          <div class="form-group">
          <label for="email">video 2</label>
          <input type="file" class="form-control" name="video2">
        </div>
          <div class="form-group">
          <label for="email">thumb2</label>
          <input type="file" class="form-control" name="thumb2">
        </div>

          <div class="form-group">
              <label for="email">is_video_deleted_ids (comma seperated)</label>
              <input type="text" class="form-control" name="is_video_deleted_ids">
          </div>
         
          
        
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>