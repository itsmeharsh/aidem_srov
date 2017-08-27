
<ul id="slide-out" class="side-nav fixed leftside-navigation">
                  <li class="user-details cyan darken-2">
                      <div class="row">
                          <div class="col col s4 m4 l4">
                              <img src="<?php echo ADMIN_URL; ?>images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                          </div>
                          <div class="col col s8 m8 l8">
                              <ul id="profile-dropdown" class="dropdown-content">
                                  <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                  </li>
                                  <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                  </li>                             
                                  <li>  <?php  echo anchor(ADMIN_MAIN_URL.'logout', '<i class="mdi-hardware-keyboard-tab"></i>Logout');  ?>
                                  </li>
                                
                              </ul>
                              <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                              <p class="user-roal">Administrator</p>
                          </div>
                      </div>
                  </li>
                 
                   <?php
                     if($arrMenus['sec_rows'] > 0){
                        foreach($arrMenus['sec_results'] as $sections){
                            $sec_pages = explode(',',$sections->pagename);
                            $sec_title = explode(',',$sections->title);
                            $permission=$sections->eUsertype;   
                                if($permission==$_SESSION['ADMINPERMISSION'] OR $permission=='All'){
                                  
                                 
                   ?>
                       <?php 
                                    for($i=0;$i<count($sec_pages);$i++)
                                    {?> 
                  <li class="bold">
                                    <?php
                                        echo anchor(ADMIN_MAIN_URL.$sec_pages[$i], '<i class="'.$sections->icon.'"></i><span class="title">'. $sec_title[$i]. '</span> ') 
                                    ?> 
                                 </li>
                                 <?php }?>

                   <?php } }  } ?>
                  
                  
                  

                  <li class="li-hover"><p class="ultra-small margin more-text">VROS Media Logo</p></li>
                 
              </ul>
              <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>