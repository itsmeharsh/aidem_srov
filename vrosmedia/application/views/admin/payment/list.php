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
                  <th>Transaction ID</th>
                  <th>For</th>
                  <th>Owner</th>
                  <th>Business</th>
                  <th>Amount</th>
                  <th>Payment Status</th> 
                  <th><?php echo $this->lang->line("ACTION"); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach($paymentData as $value){                                                               
                           
                           if($value->payment_status=='approved'){
                               $color='#33691e';
                           }
                           else{
                                $color='#B71C1C';
                           }
                           echo '<tr id="removeTR"> 
                                    <td style="color:#827717 ;"><a class="btn btn-large waves-effect waves-light lime darken-4">'.$value->transaction_id.'</a></td> 
                                    <td style="color:#827717 ;" ><b>'.$value->type.'</b></td>     
                                    <td style="color:#039be5 ;"><a href="#"><a id='.$value->user_id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/user/detailView/u/'.$value->user_id.'"  style="">'.$value->UserName.'</a></td> 
                                    <td style="color:#039be5 ;"><a id='.$value->id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/business/detailView/'.$value->business_id.'/'.$value->user_id.'"  style="">'.$value->businessName.'</a></td>                                            
                                    <td style="color:#33691e    ;"><b>$'.$value->amount.'</b></td>
                                    <td style="color:'.$color.';"><b>'.$value->payment_status.'</b></td>
                                    
                  
                                     <td style="font-size: 120%;color:#827717 ;">
                                       <a id='.$user->id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/payment/detailView/'.$value->id.'/'.$value->user_id.'"  style=""><i class="mdi-image-remove-red-eye"></i></a>
                                        <a class="loadPage" id='.$value->id.'  href="'.ADMIN_MAIN_URL.'/offer/add/'.$value->id.'" style="color:#ff4081;"><i class="mdi-image-edit"></i></a>'
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

