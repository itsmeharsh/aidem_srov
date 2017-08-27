

<section id="content">

    <!--start container-->
    <div class="container">

        <div id="profile-page" class="section">
            <div align="right"><a  class="btn" href="<?php echo ADMIN_MAIN_URL; ?>/business/graph/<?php echo $businessData['id']; ?>" style="">Graph</a></div>
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?php echo $businessData['url']; ?>" alt="user background">
                </div>
                <figure class="card-profile-image">
                    <img src="<?php echo $businessData['CreatedUserData'][0]['userImage']; ?>" alt="profile image" class="circle z-depth-2 responsive-img activator" height="100" width="100">
                </figure>
                <div class="card-content">
                    <div class="row">
                        <div class="col s3 offset-s2">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $businessData['title']; ?></h4>
<!--                            <p class="medium-small grey-text">Project Manager</p>-->
                        </div>
                       
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><a class=" modal-trigger " href="#likes_popup"><?php echo $businessData['totallike']; ?></a></h4>
                            <p class="medium-small " style="color: #00bcd4;"><a class=" modal-trigger" href="#likes_popup">Total Likes</a></p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><a class=" modal-trigger " href="#likes_popup"><?php echo $businessData['totalfavorite']; ?></a></h4>
                            <p class="medium-small " style="color: #00bcd4;"><a class=" modal-trigger " href="#likes_popup">Total Favorite</a></p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><a class=" modal-trigger " href="#likes_popup"><?php echo $businessData['totalshare']; ?></a></h4>
                            <p class="medium-small " style="color: #00bcd4;"><a class=" modal-trigger " href="#likes_popup">Total Share</a></p>
                        </div>
<!--                        <div class="col s1 right-align">
                            <a class="btn-floating activator waves-effect waves-light darken-2 right">
                                <i class="mdi-action-perm-identity"></i>
                            </a>
                        </div>-->
                    </div>
                </div>
<!--                <div class="card-reveal">
                    <p>
                        <span class="card-title grey-text text-darken-4"><?php echo $name; ?> <i class="mdi-navigation-close right"></i></span>
                        <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Application User</span>
                    </p>

                    <p><?php echo $description; ?></p>

                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> <?php echo $phone; ?></p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> <?php echo $email; ?></p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                    <p><i class="mdi-action-bookmark cyan-text text-darken-2"></i> <?php echo $fav_book; ?></p>
                </div>-->
            </div>
            <!--/ profile-page-header -->

            <!-- profile-page-content -->
            <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m4">
                    <!-- Profile About  -->
                    <div class="card light-blue">
                        <div class="card-content white-text">
                            <span class="card-title">About Me!</span>
                            <p><?php echo $businessData['description']; ?></p>
                        </div>
                    </div>
                    <!-- Profile About  -->

                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-turned-in"></i> Since</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $businessData['since']; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-communication-email"></i>email</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $businessData['email']; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-communication-location-on"></i>Location</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $businessData['location']; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-maps-navigation"></i>address</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $businessData['address']; ?></div>
                            </div>
                        </li>
                         <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-communication-phone"></i>mobile</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $businessData['mobile']; ?></div>
                            </div>
                        </li>
                    </ul>
                    <!--/ Profile About Details  -->

                    <!-- Profile About  -->
                    <div class="card amber darken-2">
                        <div class="card-content white-text center-align">
                            <p class="card-title"><i class="mdi-action-work"></i> Working Hours</p>
                           
                        </div>
                    </div>
                    <!-- Profile About  -->

                    <!-- Profile feed  -->
                    <ul id="profile-page-about-feed" class="collection z-depth-1">
                        <?php
                        for($w=0;$w<=count($businessData['working_hours'])-1;$w++){
                        ?>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><?php echo $businessData['working_hours'][$w]['day']; ?></div>
                                <?php
                                if($businessData['working_hours'][$w]['is_working']==1){
                                ?>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $businessData['working_hours'][$w]['start'].'-'.$businessData['working_hours'][$w]['end']; ?></div>
                                <?php }else{ ?>
                                <div class="col s7 right-align" style="color:#ff4081;">Closed</div>
                                <?php } ?>
                            </div>
                        </li>
                        <?php } ?>
                       
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
              <div id="profile-page-wall" class="col s12 m8">
                <!-- profile-page-wall-share -->
                <div id="profile-page-wall-share" class="row">
                  <div class="col s12">
                    <ul class="tabs tab-profile z-depth-1 light-blue" style="width: 100%;">
                        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="<?php echo ($businessData['website']!='') ? $businessData['website']: 'javascript:void(0);' ; ?>" target=""> Website</a>
                      </li> 
                      <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="<?php echo ($businessData['fb_link']!='') ? $businessData['fb_link']: 'javascript:void(0);' ; ?>">Facebook</a>
                      </li>
                      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="<?php echo ($businessData['twitter_link']!='') ? $businessData['twitter_link']: 'javascript:void(0);' ; ?>"> Twitter</a>
                      </li>
                      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="<?php echo ($businessData['gplus_link']!='') ? $businessData['gplus_link']: 'javascript:void(0);' ; ?>"> Google+</a>
                      </li> 
                    </ul>
                  </div></div></div>
                 <!-- Business Cards -->
                    <div class="col m8 19 business-cards">
                    	<h4 class="header">Images</h4>
                    	   
                          <?php 
                            if(count($businessData['medias'])>0){
                                for($img=0;$img<=count($businessData['medias'])-1;$img++){
                                    if($businessData['medias'][$img]['type']=='i'){
                            ?>
                                <div class="card col m4 13">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="<?php echo $businessData['medias'][$img]['image_path']; ?>" alt="office" style="height:212px;">
                                    </div>
                                   
                                </div>
                                    <?php } } }else { ?>
                                    <div class="card col m4 13">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        No Data found!!
                                    </div>
                                   
                                </div>
                          <?php } ?>
			
				    
                    </div>
                    
                    <div class="divider"></div>
                    <div class="col m8 19 business-cards">
                    	<h4 class="header">Videos</h4>
                    	   
                          <?php 
                             if(count($businessData['medias'])>0){
                                for($n=0;$n<=count($businessData['medias'])-1;$n++){
                                    if($businessData['medias'][$n]['type']=='v'){
                                   
                            ?>
                                <div class="card col m4 13">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="<?php echo $businessData['medias'][$n]['image_path']; ?>" alt="office" style="height:212px;">
                                    </div>
                                   
                                </div>
                                
                           <?php } } }else { ?>
                                    <div>No Data Found!!</div>   
                               
                          <?php } ?>
			
				    
                    </div>
                    
                    <div class="divider"></div>
                    <div class="col m8 19 business-cards">
                    	<h4 class="header">Comments</h4>
                    	   
                         <div class="col s12 m8 l9">
                                <ul class="collection">
                                  <?php 
                                    if(count($businessData['CommentedusersLists'])>0){
                                      for($cmt=0;$cmt<=count($businessData['CommentedusersLists'])-1;$cmt++){
                                             
                                    ?>  
                                    
                                        <li class="collection-item avatar">
                                          <img src="<?php echo $businessData['CommentedusersLists'][$cmt]['userImage']; ?>" alt="" class="circle">
                                          <br><span class="title"><?php echo $businessData['CommentedusersLists'][$cmt]['comment']; ?></span>
                                        

                                          <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i><?php echo $businessData['CommentedusersLists'][$cmt]['rate']; ?></a>
                                        </li>
                                   <?php } } else { ?>
                                        
                                    <div>No Comments Found!!</div>   
                               
                                  <?php } ?>
			
                                </ul>
                        </div>
			
				    
                    </div>
                    
                    
                    
                    <!-- Business Cards -->
              <div id="likes_popup" class="modal">
                  <div class="modal-content">
                    <ul class="collection">
                                  <?php 
                                    if(count($businessData['LikedusersLists'])>0){
                                      for($lk=0;$lk<=count($businessData['LikedusersLists'])-1;$lk++){
                                             
                                    ?>  
                                    
                                        <li class="collection-item avatar">
                                          <img src="<?php echo $businessData['LikedusersLists'][$lk]['userImage']; ?>" alt="" class="circle">
                                          <br>
                                          <span class="title"><?php echo $businessData['LikedusersLists'][$lk]['name']; ?></span>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <span class="title" style="color:<?php echo ($businessData['LikedusersLists'][$lk]['is_like']==1) ? 'green' : 'red';  ?>">Liked</span>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <span class="title" style="color:<?php echo ($businessData['LikedusersLists'][$lk]['is_share']==1) ? 'green' : 'red';  ?>">Shared</span>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <span class="title" style="color:<?php echo ($businessData['LikedusersLists'][$lk]['is_favourite']==1) ? 'green' : 'red';  ?>">favourited</span>
                                        
                                        </li>
                                   <?php } } else { ?>
                                        
                                    <div>No Comments Found!!</div>   
                               
                                  <?php } ?>
			
                                </ul>
                  </div>
                  <div class="modal-footer">
                    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">OK</a>
                  </div>
                </div>
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
 