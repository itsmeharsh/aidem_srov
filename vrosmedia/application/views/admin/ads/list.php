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
                  <th>Title</th>
                  <th>Cover</th>
                  <th>Ads Type</th>
                  <th>Owner</th>
                  <th>Business</th>
                  <th>Status</th>
                  <th>Remaining Days</th> 
                  <th><?php echo $this->lang->line("ACTION"); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach($adsData as $value){                                                               
                           
                           if($value->ads_type==1){
                               $type='Banner';
                           }
                           elseif($value->ads_type==2){
                                $type='Footer';
                           }
                           else {
                               $type='Banner & Footer';
                           }
                           echo '<tr id="removeTR"> 
                                    <td style="color:#827717 ;" ><b>'.$value->title.'</b></td>  
                                    <td style="color:#827717 ;"><img src="'.DOMAIN_URL.'/'.$value->image.'" height="100" width="100"></td>         
                                    <td style="color:#827717 ;" ><b>'.$type.'</b></td>      
                                    <td style="color:#039be5 ;"><a href="#"><a id='.$value->user_id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/user/detailView/u/'.$value->user_id.'"  style="">'.$value->UserName.'</a></td>     
                                    <td style="color:#039be5 ;"><a id='.$value->id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/business/detailView/'.$value->business_id.'/'.$value->user_id.'"  style="">'.$value->businessName.'</a></td>                                            
                                    <td style="color:'.$value->is_active_color.';"><b>'.$value->is_active.'</b></td>
                                    <td style="color:#827717 ;" ><b>'.$value->remaining_days.' Days</b></td>  
                                    <td style="font-size: 120%;color:#827717 ;">
                                       <a id='.$user->id.' class="jsgrid-button " href="'.ADMIN_MAIN_URL.'/ads/detailView/'.$value->id.'/'.$value->user_id.'"  style=""><i class="mdi-image-remove-red-eye"></i></a>
                                        <a class="loadPage" id='.$value->id.'  href="'.ADMIN_MAIN_URL.'/ads/add/'.$value->business_id.'" style="color:#ff4081;"><i class="mdi-image-edit"></i></a>'
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
   <a href="<?php echo ADMIN_MAIN_URL; ?>ads/add" class="loadPage btn-floating btn-large">
   <i class="mdi-content-add"></i>
   </a>               
</div>
<script type="text/javascript" src="<?php echo DOMAIN_URL; ?>/assets/admin/js/jquery-1.11.2.min.js"></script>
<script>
//    $(document).ready(function(){
//        //alert(33);
//        $(document).on("change", '#ads_type', function (e) {
//            var ads_type=$(this).val();
//            if(ads_type==1){
//                $('#banner').show();
//                $('#footer').hide();
//            }else if(ads_type==2){
//                $('#banner').hide();
//                $('#footer').show();
//            }else if(ads_type==3){
//                $('#banner').show();
//                $('#footer').show();
//            }
//        });
//    });
</script>