
<?php
extract($Userdata);
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
                            <h4 class="card-title grey-text text-darken-4"><?php echo $my_business_count; ?></h4>
                            <p class="medium-small grey-text">Business</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $my_offer_count; ?></h4>
                            <p class="medium-small grey-text">Offers</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4"><?php echo $my_ads_count; ?></h4>
                            <p class="medium-small grey-text">Advertisment</p>
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
                    <div class="card light-blue">
                        <div class="card-content white-text">
                            <span class="card-title">About Me!</span>
                            <p><?php echo $description; ?></p>
                        </div>
                    </div>
                    <!-- Profile About  -->

                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-action-bookmark"></i> Favorite Book</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $fav_book; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-av-queue-music"></i> Favorite Music</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $fav_music; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-maps-local-restaurant"></i>Favorite Food</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $fav_food; ?></div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-maps-local-bar"></i>Favorite Drink</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $fav_drink; ?></div>
                            </div>
                        </li>
                         <li class="collection-item">
                            <div class="row">
                                <div class="col s5 grey-text darken-1"><i class="mdi-maps-place"></i>Favorite Place</div>
                                <div class="col s7 grey-text text-darken-4 right-align"><?php echo $fav_place; ?></div>
                            </div>
                        </li>
                    </ul>
                    <!--/ Profile About Details  -->

                    <!-- Profile About  -->
                    <div class="card amber darken-2">
                        <div class="card-content white-text center-align">
                            <p class="card-title"><i class="mdi-social-group-add"></i> 3685</p>
                            <p>Followers</p>
                        </div>
                    </div>
                    <!-- Profile About  -->

                    <!-- Profile feed  -->
                    <ul id="profile-page-about-feed" class="collection z-depth-1">
                        <li class="collection-item avatar">
                            <img src="images/avatar.jpg" alt="" class="circle">
                            <span class="title">Project Title</span>
                            <p>Task assigned to new changes.
                                <br> <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-file-folder circle"></i>
                            <span class="title">New Project</span>
                            <p>First Line of Project Work
                                <br> <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-social-domain"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-action-assessment circle green"></i>
                            <span class="title">New Payment</span>
                            <p>Last UK Project Payment
                                <br> <span class="ultra-small">$ 3,684.00</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-editor-attach-money"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-av-play-arrow circle red"></i>
                            <span class="title">Latest News</span>
                            <p>company management news
                                <br> <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content"><i class="mdi-action-track-changes"></i></a>
                        </li>
                    </ul>
                    <!-- Profile feed  -->

                    <!-- task-card -->
                    <ul id="task-card" class="collection with-header">
                        <li class="collection-header cyan">
                            <h4 class="task-card-title">My Task</h4>
                            <p class="task-card-date">March 26, 2015</p>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task1">
                            <label for="task1" style="text-decoration: none;">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
                            </label>
                            <span class="task-cat teal">Mobile App</span>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task2">
                            <label for="task2" style="text-decoration: none;">Check the new API standerds. <a href="#" class="secondary-content"><span class="ultra-small">Monday</span></a>
                            </label>
                            <span class="task-cat purple">Web API</span>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task3" checked="checked">
                            <label for="task3" style="text-decoration: line-through;">Check the new Mockup of ABC. <a href="#" class="secondary-content"><span class="ultra-small">Wednesday</span></a>
                            </label>
                            <span class="task-cat pink">Mockup</span>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task4" checked="checked" disabled="disabled">
                            <label for="task4" style="text-decoration: line-through;">I did it !</label>
                            <span class="task-cat cyan">Mobile App</span>
                        </li>
                    </ul>
                    <!-- task-card -->

                    <!-- Profile Total sell -->
                    <div class="card center-align">
                        <div class="card-content purple white-text">
                            <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Your Profit</p>
                            <h4 class="card-stats-number">$8990.63</h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
                            </p>
                        </div>
                        <div class="card-action purple darken-2">
                            <div id="sales-compositebar"><canvas width="214" height="25" style="display: inline-block; width: 214px; height: 25px; vertical-align: top;"></canvas></div>
                        </div>
                    </div>

                    <!-- flight-card -->
                    <div id="flight-card" class="card">
                        <div class="card-header amber darken-2">
                            <div class="card-title">
                                <h4 class="flight-card-title">Your Next Flight</h4>
                                <p class="flight-card-date">June 18, Thu 04:50</p>
                            </div>
                        </div>
                        <div class="card-content-bg white-text">
                            <div class="card-content">
                                <div class="row flight-state-wrapper">
                                    <div class="col s5 m5 l5 center-align">
                                        <div class="flight-state">
                                            <h4 class="margin">LDN</h4>
                                            <p class="ultra-small">London</p>
                                        </div>
                                    </div>
                                    <div class="col s2 m2 l2 center-align">
                                        <i class="mdi-device-airplanemode-on flight-icon"></i>
                                    </div>
                                    <div class="col s5 m5 l5 center-align">
                                        <div class="flight-state">
                                            <h4 class="margin">SFO</h4>
                                            <p class="ultra-small">San Francisco</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6 m6 l6 center-align">
                                        <div class="flight-info">
                                            <p class="small"><span class="grey-text text-lighten-4">Depart:</span> 04.50</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Terminal:</span> B</p>
                                        </div>
                                    </div>
                                    <div class="col s6 m6 l6 center-align flight-state-two">
                                        <div class="flight-info">
                                            <p class="small"><span class="grey-text text-lighten-4">Arrive:</span> 08.50</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Terminal:</span> C</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- flight-card -->

                    <!-- Map Card -->
                    <div class="map-card">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142" class="" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; position: absolute; left: -11px; top: -173px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -11px; top: 83px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 245px; top: -173px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 245px; top: 83px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -11px; top: -173px;"><canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -11px; top: 83px;"><canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 245px; top: -173px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 245px; top: 83px;"></div></div></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="position: absolute; left: -11px; top: -173px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i301!3i384!4i256!2m3!1e0!2sm!3i369048339!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0&amp;token=20789" draggable="false" alt="" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -11px; top: 83px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i301!3i385!4i256!2m3!1e0!2sm!3i369048363!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0&amp;token=69699" draggable="false" alt="" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 245px; top: -173px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i302!3i384!4i256!2m3!1e0!2sm!3i369048339!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0&amp;token=26398" draggable="false" alt="" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 245px; top: 83px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i302!3i385!4i256!2m3!1e0!2sm!3i369048363!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0&amp;token=75308" draggable="false" alt="" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=40.67,-73.94&amp;z=10&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 14px; top: 35px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2016 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 166px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span style="">Map data ©2016 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2016 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div style="cursor: pointer; width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@40.67,-73.94,10z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; -webkit-user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="-webkit-user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;"><div title="Zoom in" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div><div title="Zoom out" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px;"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; background-color: rgb(255, 255, 255); display: none;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div></div></div>
                            </div>
                            <div class="card-content">
                                <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                                    <i class="mdi-maps-pin-drop"></i>
                                </a>
                                <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Company Name LLC</a>
                                </h4>
                                <p class="blog-post-content">Some more information about this company.</p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Company Name LLC <i class="mdi-navigation-close right"></i></span>
                                <p>Here is some more information about this company. As a creative studio we believe no client is too big nor too small to work with us to obtain good advantage.By combining the creativity of artists with the precision of engineers we develop custom solutions that achieve results.Some more information about this company.</p>
                                <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Manager Name</p>
                                <p><i class="mdi-communication-business cyan-text text-darken-2"></i> 125, ABC Street, New Yourk, USA</p>
                                <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                                <p><i class="mdi-communication-email cyan-text text-darken-2"></i> support@geekslabs.com</p>
                            </div>
                        </div>
                    </div>
                    <!-- Map Card -->

                </div>
              
                 <!-- Business Cards -->
                    <div class="col m8 19 business-cards">
                    	<h4 class="header">Business</h4>
                    	   
                          <?php 
                            if(count($BusinessData)>0){
                                for($i=0;$i<=count($BusinessData)-1;$i++){
                            ?>
                                <div class="card col m4 13">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="<?php echo $BusinessData[$i]['url']; ?>" alt="office" style="height:212px;">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4"><?php echo $BusinessData[$i]['name']; ?> <i class="mdi-navigation-more-vert right"></i></span>
                                        <p><a href="#"><?php echo $BusinessData[$i]['location']; ?></a>
                                        </p>
                                    </div>
<!--                                    <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                        <span class="card-title grey-text text-darken-4">Card Title <i class="mdi-navigation-close right"></i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>-->
                                </div>
                          <?php } } ?>
			
				    
                    </div>
                    
                    <div class="divider"></div>
                    
                    <div class="col m8 19 business-cards">
                    	<h4 class="header">Offers</h4>
                    	
                           <?php 
                             if(count($offersData)>0){
                                 for($i=0;$i<=count($offersData)-1;$i++){
                             ?>
                                   
                                <div class="card col m4 13">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="<?php echo $offersData[$i]['url']; ?>" alt="office" style="height:212px;">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4"><?php echo $offersData[$i]['name']; ?><i class="mdi-navigation-more-vert right"></i></span>
                                        <p><a href="#"><?php echo $offersData[$i]['location']; ?></a>
                                        </p>
                                    </div>
<!--                                    <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                        <span class="card-title grey-text text-darken-4">Card Title <i class="mdi-navigation-close right"></i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>-->
                                </div>
			
                             <?php } } ?>
			     
                    </div>
                    
                    
                    <!-- Business Cards -->
              
                
    </div>
</section>