
<?php
extract($Userdata);
//pre($Userdata);
extract($BusinessData);
?>
<section id="content">

    <!--start container-->
    <div class="container">

        <div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?php echo DOMAIN_URL.'/assets/admin/images/' ?>user-profile-bg.jpg" alt="user background">
                </div>
                <figure class="card-profile-image">
                    <img src="<?php echo $image ?>" alt="profile image" class="circle z-depth-2 responsive-img activator" height="100" width="100">
                </figure>
                <div class="card-content">
                    <div class="row">
                        <div class="col s3 offset-s2">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $name; ?></h4>
<!--                            <p class="medium-small grey-text">Project Manager</p>-->
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $texi_number; ?></h4>
                            <p class="medium-small grey-text">TAXI Number</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $taxi_company['name']; ?></h4>
                            <p class="medium-small grey-text">TAXI Company</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $taxi_class['name']; ?></h4>
                            <p class="medium-small grey-text">TAXI Class</p>
                        </div>
                        
                        <div class="col s1 right-align">
                            <a class="btn-floating activator waves-effect waves-light darken-2 right">
                                <i class="mdi-action-perm-identity"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-reveal">
                    <p>
                        <span class="card-title grey-text text-darken-4"><?php echo $name; ?> <i class="mdi-navigation-close right"></i></span>
                        <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Application User</span>
                    </p>

                    <p><?php echo $description; ?></p>

                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> <?php echo $phone; ?></p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> <?php echo $email; ?></p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                    <p><i class="mdi-action-bookmark cyan-text text-darken-2"></i> <?php echo $fav_book; ?></p>
                </div>
            </div>
            <!--/ profile-page-header -->

            <!-- profile-page-content -->
            <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m4">
                    <!-- Profile About  -->
                  
                    <!-- Profile About  -->

                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1">City</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $CityName['name']; ?></div>
                            </div>
                        </li>
                        
                    </ul>
                    <!--/ Profile About Details  -->

                    <!-- Profile About  -->
                    
                    <!-- Profile About  -->

                    <!-- Profile feed  -->
                 
                    <!-- Profile feed  -->

                    <!-- task-card -->
                  

                </div>
              
              
                
    </div>
          
</section>