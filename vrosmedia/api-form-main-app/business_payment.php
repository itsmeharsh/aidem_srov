<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h2>Ads and offer Payment</h2>
    <?php
    include('header.php');
    ?>
    <form action="<?php echo $path; ?>/business/business_payment" method="post" role="form" enctype="multipart/form-data" >

       

        <div class="form-group">
            <label for="email">user_id</label>
            <input type="text" class="form-control" name="user_id">
        </div>
        <div class="form-group">
            <label for="email">business_id</label>
            <input type="text" class="form-control" name="business_id">
        </div>

      
        <div class="form-group">
            <label for="email">type</label>
            <input type="text" class="form-control" name="type">
        </div>
        <div class="form-group">
            <label for="email">duration</label>
            <input type="text" class="form-control" name="duration">
        </div>
        <div class="form-group">
            <label for="email">payment_date (yyyy-mm-dd)</label>
            <input type="text" class="form-control" name="payment_date">
        </div>


        <div class="form-group">
            <label for="email">amount</label>
            <input type="text" class="form-control" name="amount">
        </div>
        <div class="form-group">
            <label for="email">transaction_id</label>
            <input type="text" class="form-control" name="transaction_id">
        </div>

        <div class="form-group">
            <label for="email">payment_status</label>
            <input type="text" class="form-control" name="payment_status">
        </div>
        <div class="form-group">
            <label for="email">intent</label>
            <input type="text" class="form-control" name="intent">
        </div>


        <div class="form-group">
            <label for="email">response_type</label>
            <input type="text" class="form-control" name="response_type">
        </div>
        <div class="form-group">
            <label for="email">environment</label>
            <input type="text" class="form-control" name="environment">
        </div>






        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>