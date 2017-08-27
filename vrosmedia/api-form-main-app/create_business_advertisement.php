<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h2>Create Business advertisement</h2>
    <?php
    include('header.php');
    ?>
    <form action="<?php echo $path; ?>/business/create_business_advertisement" method="post" role="form" enctype="multipart/form-data" >

        <div class="form-group">
            <label for="email">name</label>
            <input type="text" class="form-control" name="name">
        </div>
         <div class="form-group">
            <label for="email">time</label>
            <input type="text" class="form-control" name="time">
        </div>
        <div class="form-group">
            <label for="email">description</label>
            <input type="text" class="form-control" name="description">
        </div>

        <div class="form-group">
            <label for="email">user_id</label>
            <input type="text" class="form-control" name="user_id">
        </div>
        <div class="form-group">
            <label for="email">business_id</label>
            <input type="text" class="form-control" name="business_id">
        </div>

        <div class="form-group">
            <label for="email">cover image</label>
            <input type="file" class="form-control" name="image">
        </div>
         <div class="form-group">
            <label for="email">Footer image</label>
            <input type="file" class="form-control" name="image_footer">
        </div>

        <div class="form-group">
            <label for="email">start_time</label>
            <input type="text" class="form-control" name="start_time">
        </div>
        <div class="form-group">
            <label for="email">end_time</label>
            <input type="text" class="form-control" name="end_time">
        </div>
        <div class="form-group">
            <label for="email">ads_type(1 or 2)</label>
            <input type="text" class="form-control" name="ads_type">
        </div>
        <div class="form-group">
            <label for="email">cityID</label>
            <input type="text" class="form-control" name="cityID">
        </div>
      

        <div class="form-group">
            <label for="email">transaction_id</label>
            <input type="text" class="form-control" name="transaction_id">
        </div>

        





        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>