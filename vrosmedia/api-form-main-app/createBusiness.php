<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h2>Create Business</h2>
	  <?php
		include('header.php');
	  ?>
      <form action="<?php echo $path; ?>/business/create_business" method="post" role="form" enctype="multipart/form-data" >
          
        <div class="form-group">
          <label for="email">name</label>
          <input type="text" class="form-control" name="name">
        </div>
           <div class="form-group">
          <label for="email">description</label>
          <input type="text" class="form-control" name="description">
        </div>
           <div class="form-group">
          <label for="email">email</label>
          <input type="text" class="form-control" name="email">
        </div>
           <div class="form-group">
          <label for="email">location</label>
          <input type="text" class="form-control" name="location">
        </div>
        
           <div class="form-group">
          <label for="email">mobile</label>
          <input type="text" class="form-control" name="mobile">
        </div>
          <div class="form-group">
          <label for="email">address</label>
          <textarea  class="form-control" name="address"></textarea>
        </div>
           <div class="form-group">
          <label for="email">deLatitude</label>
          <input type="text" class="form-control" name="deLatitude">
        </div>
           <div class="form-group">
          <label for="email">deLongitude</label>
          <input type="text" class="form-control" name="deLongitude">
        </div>
           <div class="form-group">
          <label for="email">user_id</label>
          <input type="text" class="form-control" name="user_id">
        </div>
           <div class="form-group">
          <label for="email">category_id</label>
          <input type="text" class="form-control" name="category_id">
        </div>
         <div class="form-group">
          <label for="email">working_hours</label>
          <input type="text" class="form-control" name="working_hours">
        </div>
        <div class="form-group">
          <label for="email">since</label>
          <input type="text" class="form-control" name="since">
        </div>
          <div class="form-group">
              <label for="email">website</label>
              <input type="text" class="form-control" name="website">
          </div>
          <div class="form-group">
              <label for="email">fb_link</label>
              <input type="text" class="form-control" name="fb_link">
          </div>
           <div class="form-group">
              <label for="email">twitter_link</label>
              <input type="text" class="form-control" name="twitter_link">
          </div>
           <div class="form-group">
              <label for="email">gplus_link</label>
              <input type="text" class="form-control" name="gplus_link">
          </div>
       
           <div class="form-group">
          <label for="email">cover image</label>
          <input type="file" class="form-control" name="cover_image">
         </div>
        
          <br>
          <lable style="color:red;">Images</lable>
          </br><br>
          <div class="form-group">
          <label for="email">image 1 </label>
          <input type="file" class="form-control" name="image1">
         </div>
          <div class="form-group">
          <label for="email">image 2</label>
          <input type="file" class="form-control" name="image2">
        </div>
           <br>
          <lable style="color:red;">Videos</lable>
          </br><br>
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
          <label for="email">is_iCount</label>
          <input type="text" class="form-control" name="is_iCount">
        </div>
        <div class="form-group">
          <label for="email">is_vCount</label>
          <input type="text" class="form-control" name="is_vCount">
        </div>
        
		<button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>