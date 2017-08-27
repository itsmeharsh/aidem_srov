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
                              <th>Name</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th><?php echo $this->lang->line("ACTION"); ?></th>
                          </tr>
                      </thead>
                   
                     
                   
                      <tbody>
                          
                          <?php
                         
                           foreach($CompanyData as $company){ 

                                    
                                    /* user status */
                                    if($company->active==1){
                                       $company_status='Active';
                                       $company_status_color='green';
                                    }else{
                                       $company_status='Inactive';   
                                       $company_status_color='red';
                                    }
                                    echo '<tr id="removeTR"> 
                                             <td style="color:#827717 ; font-size: 120%;">'.$company->name.'</td>

                                             <td style="font-size: 120%;color:#827717 ;">'.$company->description.'</td>

                                             <td style="font-size: 120%;color:#827717 ;"><a id='.$company->id.' class="statusValue changeStatus btn btn-large waves-effect waves-light '.$company_status_color.' darken-4">'.$company_status.'</a></td> 
                                             <td style="font-size: 120%;">

                                                 <a class="loadPage" id='.$company->id.'  href="'.ADMIN_MAIN_URL.'/taxi/add_company/'.$company->id.'" style=""><i class="mdi-image-edit"></i></a>
                                                 <a id='.$company->id.' class="deleteAction jsgrid-button jsgrid-delete-button" href="#"  style=""><i class="mdi-action-delete"></i></a>

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
               <a href="<?php echo ADMIN_MAIN_URL; ?>/taxi/add_company/" class="loadPage btn-floating btn-large">
                  <i class="mdi-content-add"></i>
                </a>
               
            </div>
