    <p class="center login-form-text"> <?php $this->general_model->getAdminMessages(); ?></p>  
        
            <!--DataTables example Row grouping-->
            <div id="row-grouping" class="section" >
             
              <div class="row">
                <div class="col s12 m4 l3">
                  
                </div>
                  <div class="col s12 m8 l9" style="width:100% !important;" id="admin_user_results">
                  <table id="data-table-simple" class="display" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th><?php echo $this->lang->line("NM"); ?></th>
                              <th><?php echo $this->lang->line("PROFILE_PIC"); ?></th>
                              <th><?php echo $this->lang->line("EMAIL"); ?></th>
                              <th><?php echo $this->lang->line("PHONE"); ?></th>
                              <th>Online status</th>
                              <th><?php echo $this->lang->line("STATUS"); ?></th>
                               
                               <th><?php echo $this->lang->line("ACTION"); ?></th>
                          </tr>
                      </thead>
                   
                     
                   
                      <tbody>
                          
                          <?php
                         
                           foreach($userData as $user){ 
                               
                                   /* user type */
                               if(preg_match("/uploads/i", $user->image)){
                                   $user->image=DOMAIN_URL.'/'.$user->image;
                               }
                                    
                                    /* user status */
                                    if($user->active==1){
                                       $user_status='Active';
                                       $user_status_color='green';
                                    }else{
                                       $user_status='Inactive';   
                                       $user_status_color='red';
                                    }
                                    
                                     if($user->is_active_status=='Online'){
                                       $is_active_status_color='Green';
                                      
                                    }else{
                                       $is_active_status_color='Red';
                                    }
                                    echo '<tr id="removeTR"> 
                                             <td style="color:#827717 ; font-size: 120%;">'.$user->name.'</td>

                                             <td><img src="'.$user->image.'" height="100" width="100"></td>
                                             <td style="font-size: 120%;color:#827717 ;">'.$user->email.'</td> 
                                             <td style="font-size: 120%;color:#827717 ;">'.$user->phone.'</td> 
                                              <td style="font-size: 120%;color:#827717 ; color:'.$is_active_status_color.' ;">'.$user->is_active_status.'</td>     
                                             <td style="font-size: 120%;color:#827717 ;"><a id='.$user->id.' class="statusValue changeStatus btn btn-large waves-effect waves-light '.$user_status_color.' darken-4">'.$user_status.'</a></td> 
                                             <td style="font-size: 120%;">
                                                 <a id='.$user->id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/user/detailView/'.$UserType.'/'.$user->id.'"  style=""><i class="mdi-image-remove-red-eye"></i></a>
                                                 <a class="loadPage" id='.$user->id.'  href="'.ADMIN_MAIN_URL.'/user/add/'.$UserType.'/'.$user->id.'" style=""><i class="mdi-image-edit"></i></a>
                                                 <a id='.$user->id.' class="deleteAction jsgrid-button jsgrid-delete-button" href="#"  style=""><i class="mdi-action-delete"></i></a>

                                                 </td>
                                          </tr>';   
                                      
                                    
                            }
                          
                           
                          ?>
                          
                      </tbody>
                   
                  </table>
                </div>
              </div>
            </div>
           <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
               <a href="<?php echo ADMIN_MAIN_URL; ?>/user/add/<?php echo $UserType; ?>" class="loadPage btn-floating btn-large">
                  <i class="mdi-content-add"></i>
                </a>
               
            </div>
