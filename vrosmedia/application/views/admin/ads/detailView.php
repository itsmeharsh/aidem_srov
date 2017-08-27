

<section id="content">

    <!--start container-->
    <div class="container">

        <div id="profile-page" class="section">
            <!-- profile-page-header --><div align="right"><a class="btn">Edit</a>&nbsp;<a class="btn">Payment History</a></div>
            <div id="profile-page-header" class="card">
               
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?php echo $adsData['url']; ?>" alt="user background">
                </div>
                <figure class="card-profile-image">
                    <img src="<?php echo $adsData['CreatedUserData'][0]['userImage']; ?>" alt="profile image" class="circle z-depth-2 responsive-img activator" height="100" width="100">
                </figure>
                <div class="card-content">
                    <div class="row">
                        <div class="col s3 offset-s2">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $adsData['name']; ?></h4>
<!--                            <p class="medium-small grey-text">Project Manager</p>-->
                        </div>
                       
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><a class=" modal-trigger " href="javascript:void(0);"><?php echo $adsData['totalclicks']; ?></a></h4>
                            <p class="medium-small " style="color: #00bcd4;"><a class=" modal-trigger" href="javascript:void(0);">Total Clicks</a></p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><a class=" modal-trigger " href="javascript:void(0);"><?php echo $adsData['remaining_days']; ?> Days</a></h4>
                            <p class="medium-small " style="color: #00bcd4;"><a class=" modal-trigger " href="javascript:void(0);">Remaining Days</a></p>
                        </div>
                     
                        <?php
                        if($adsData['is_active']==1){
                            $status='Active';
                            $color='green';
                        }else{
                             $status='Expired';
                             $color='red';
                        }  
                        
                        if($adsData['deleted']==0){
                            $status='Deleted';
                            $color='red';
                        }
                        if($adsData['eStatus']==0){
                            $status='Inactive';
                            $color='yellow';
                            $text_color='black';
                        }
                        else{
                             $status='Active';
                             $color='green';
                        }  
                        
                        ?>
                        <div class="col s1 right-align" >
                            <a class="btn-floating activator waves-effect waves-light darken-2 right" style="background-color:<?php echo $color; ?> !important;  width: 104px !important; text-align: center !important; color:<?php echo $text_color; ?>; height: 35px !important;">
                               <?php echo $status; ?>
                            </a>
                        </div>
                        
                    </div>
                </div>
<!--            
            </div>
            <!--/ profile-page-header -->

            <!-- profile-page-content -->
            <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m4">
                    <!-- Profile About  -->
                    <div class="card light-blue">
                        <div class="card-content white-text">
                            <span class="card-title">About Advertisment!</span>
                            <p><?php echo $adsData['description']; ?></p>
                        </div>
                    </div>
                    <!-- Profile About  -->

                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-query-builder"></i> Start Date</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $adsData['start_time']; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-query-builder"></i>End Date</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $adsData['end_time']; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-restore"></i>duration</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $adsData['duration']; ?> Days</div>
                            </div>
                        </li>
                       
                    </ul>
                    <!--/ Profile About Details  -->

                    <!-- Profile About  -->
                    <div class="card amber darken-2">
                        <div class="card-content white-text center-align">
                            <p class="card-title"><i class="mdi-action-payment"></i> Payment Details</p>
                           
                        </div>
                    </div>
                    <!-- Profile About  -->

                    <!-- Profile feed  -->
                    <ul id="profile-page-about-feed" class="collection z-depth-1">
                         <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-query-builder"></i> Start Date</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $adsData['start_time']; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-query-builder"></i>End Date</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $adsData['end_time']; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-restore"></i>duration</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $adsData['duration']; ?> Days</div>
                            </div>
                        </li>
                       
                    </ul>
                    <!-- Profile feed  -->

                    <!-- task-card -->
                    
                    <!-- task-card -->

                    <!-- Profile Total sell -->
                    

                    <!-- flight-card -->
                    
                    <!-- flight-card -->

                    <!-- Map Card -->
                    
                    <!-- Map Card -->

                </div>
              
                 <!-- Business Cards -->
                  
                    
                    <div class="divider"></div>
                    
                   
                    <div class="col m8 19 business-cards">
                    	<h4 class="header">Business</h4>
                    	   
                           <div class="card col m4 13">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <a  class="jsgrid-button " href="<?php echo ADMIN_MAIN_URL.'/business/detailView/'.$adsData['BusinessData']['id'].'/'.$adsData['BusinessData']['user_id']; ?>"  style=""> <img class="activator" src="<?php echo $adsData['BusinessData']['url']; ?>" alt="office" style="height:212px;"></a>
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4"><?php echo $adsData['BusinessData']['title']; ?> <i class="mdi-navigation-more-vert right"></i></span>
                                        <p><a href="#"><?php echo $adsData['BusinessData']['address']; ?></a>
                                        </p>
                                    </div>
<!--                                    <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                        <span class="card-title grey-text text-darken-4">Card Title <i class="mdi-navigation-close right"></i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>-->
                                </div>
			
				    
                    </div>
                    
                    <!-- Business Cards -->
              
                <div class="divider"></div>
              
       
              
               
    </div>
            <div id="map" style="width: 100%; height: 350px;"></div>
</section>


 <script>

      function initMap() {
        var myLatLng = {lat: <?php echo $businessData['latitude'];  ?>, lng: <?php echo $businessData['longitude'];  ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAQG7ZCYf4HIK3L2znRJowB8LI-Vw--Hrk&callback=initMap">
 </script> 
 