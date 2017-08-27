<p class="center login-form-text"> <?php $this->general_model->getAdminMessages(); ?></p>
<!--DataTables example Row grouping-->
<div id="row-grouping" class="section" >
   <div class="row">
      <div class="col s12 m4 l3">
      </div>
      <div class="col s12 m8 l9" style="width:100% !important;" id="admin_offer_results">
         <table id="data-table-simple" class="display" cellspacing="0" width="100%">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Cover Image</th>
                  <th>Business</th>
                  <th>Location</th>
                  <th>Start time</th>
                  <th>End time</th>
                  <th>status</th>                 
                  <th><?php echo $this->lang->line("ACTION"); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach($offerData as $value){                                                               
                           
                           
                           echo '<tr id="removeTR"> 
                                    <td style="color:#827717 ;">'.$value->name.'</td> 
                                    <td style="color:#827717 ;"><img src="'.DOMAIN_URL.'/'.$value->image_path.'" height="100" width="100"></td>     
                                    <td style="color:#039be5 ;"><a href="#">'.$value->businessName.'</a></td> 
                                    <td style="color:#827717 ;">'.$value->location.'</td>                                            
                                    <td style="color:#827717 ;">'.$value->start_time.'</td>
                                    <td style="color:#827717 ;">'.$value->end_time.'</td>
                                    <td style="color:'.$value->is_active_color.';">'.$value->is_active.'</td> 
                  
                                     <td style="font-size: 120%;color:#827717 ;">
                                       <a id='.$user->id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/offers/detailView/'.$value->id.'/'.$value->user_id.'"  style=""><i class="mdi-image-remove-red-eye"></i></a>
                                        <a class="loadPage" id='.$value->id.'  href="'.ADMIN_MAIN_URL.'/offers/add/'.$value->business_id.'" style="color:#ff4081;"><i class="mdi-image-edit"></i></a>'
                                   . '<a id='.$value->id.' class="deleteAction jsgrid-button jsgrid-delete-button" href="#"  style="color:#ff4081;"><i class="mdi-action-delete"></i></a></td>
                                 </tr>';                                        
                           
                   }
                  
                  
                  ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
   <a href="<?php echo ADMIN_MAIN_URL; ?>offers/add" class="loadPage btn-floating btn-large">
   <i class="mdi-content-add"></i>
   </a>               
</div>

