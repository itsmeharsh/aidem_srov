<p class="center login-form-text"> <?php $this->general_model->getAdminMessages(); ?></p>
<!--DataTables example Row grouping-->
<div id="row-grouping" class="section" >
   <div class="row">
      <div class="col s12 m4 l3">
      </div>
      <div class="col s12 m8 l9" style="width:100% !important;" id="admin_business_results">
         <table id="data-table-simple" class="display" cellspacing="0" width="100%">
            <thead>
               <tr>
                  <th><?php echo $this->lang->line("BNAME"); ?></th>
                  <th><?php echo $this->lang->line("COVER_IMAGE"); ?></th>
                  <th><?php echo $this->lang->line("SINCE"); ?></th>
                  <th><?php echo $this->lang->line("LOCATION"); ?></th>
                  <th><?php echo $this->lang->line("EMAIL"); ?></th>
                  <th><?php echo $this->lang->line("TOTALLIKE"); ?></th>
                  <th><?php echo $this->lang->line("TOTALSHARE"); ?></th>
                  <th><?php echo $this->lang->line("TOTALFAV"); ?></th>
                  <th><?php echo $this->lang->line("AVG_RAT"); ?></th>
                  <th><?php echo $this->lang->line("ACTION"); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach($businessData as $value){                                                               
                           
                           
                           echo '<tr id="removeTR"> 
                                    <td style="color:#827717 ;">'.$value->name.'</td> 
                                    <td style="color:#827717 ;"><img src="'.DOMAIN_URL.'/'.$value->cover_image.'" height="100" width="100"></td>     
                                    <td style="color:#827717 ;">'.$value->since.'</td> 
                                    <td style="color:#827717 ;">'.$value->location.'</td>                                            
                                    <td style="color:#827717 ;">'.$value->email.'</td>
                                    <td style="color:#827717 ;">'.$value->totallike.'</td>
                                    <td style="color:#827717 ;">'.$value->totalshare.'</td>
                                    <td style="color:#827717 ;">'.$value->totalfavorite.'</td>
                                    <td style="color:#827717 ;">'.$value->avg_rating.'</td> 
                  
                                     <td style="font-size: 120%;color:#827717 ;">
                                       <a id='.$value->id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/business/detailView/'.$value->id.'/'.$value->user_id.'"  style=""><i class="mdi-image-remove-red-eye"></i></a>
                                        <a class="loadPage" id='.$value->id.'  href="'.ADMIN_MAIN_URL.'/business/add/'.$value->id.'" style="color:#ff4081;"><i class="mdi-image-edit"></i></a>'
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
   <a href="<?php echo ADMIN_MAIN_URL; ?>business/add" class="loadPage btn-floating btn-large">
   <i class="mdi-content-add"></i>
   </a>               
</div>

