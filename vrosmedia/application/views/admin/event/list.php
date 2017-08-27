<p class="center login-form-text"> <?php $this->general_model->getAdminMessages(); ?></p>
<!--DataTables example Row grouping-->
<div id="row-grouping" class="section" >
   <div class="row">
      <div class="col s12 m4 l3">
      </div>
        <div class="row">
        <a href="" class="btn tooltipped col s4 l2 right-event" 
        id="getallevent" data-position="bottom" data-delay="50" data-tooltip="Update All Events">Update All Events</a>
    </div>
    <div class="loader img-center" style="display:none;">
       <img src="<?php echo ADMIN_URL; ?>/images/loading_spinner.gif" alt="" class="circle responsive-img activator card-profile-image ">  </div>

      <div class="col s12 m8 l9" style="width:100% !important;" id="admin_event_results">
         <table id="data-table-simple" class="display" cellspacing="0" width="100%">
            <thead>
               <tr>
                  <th><?php echo $this->lang->line("ENAME"); ?></th>
                  <th><?php echo $this->lang->line("UNAME"); ?></th>
                  <th><?php echo $this->lang->line("VENUE"); ?></th>
                  <th><?php echo $this->lang->line("START_TIME"); ?></th>
                  <th><?php echo $this->lang->line("END_TIME"); ?></th>
                  <th><?php echo $this->lang->line("TOTALLIKE"); ?></th>
                  <th><?php echo $this->lang->line("TOTALSHARE"); ?></th>
                  <th><?php echo $this->lang->line("TOTALFAV"); ?></th>
                  <th><?php echo $this->lang->line("ACTION"); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach($eventData as $value){                                                   
                           
                           
                           echo '<tr id="removeTR"> 
                                    <td style="color:#827717 ;">'.$value->title.'</td> 
                                    <td style="color:#827717 ;">'.$value->first_name.'</td>
                                    <td style="color:#827717 ;">'.$value->venue.'</td> 
                                    <td style="color:#827717 ;">'.date('d-m-Y H:i:s',$value->start_time).'</td>                                            
                                    <td style="color:#827717 ;">'.date('d-m-Y H:i:s',$value->end_time).'</td>
                                    <td style="color:#827717 ;">'.$value->totallike.'</td>
                                    <td style="color:#827717 ;">'.$value->totalshare.'</td>
                                    <td style="color:#827717 ;">'.$value->totalfavorite.'</td>
                                    
                  
                                     <td style="font-size: 120%;color:#827717 ;">
                                        <a class="loadPage" id='.$value->id.'  href="'.ADMIN_MAIN_URL.'event/add/'.$value->id.'" style="color:#ff4081;"><i class="mdi-image-edit"></i></a><a id='.$value->id.' class="deleteAction jsgrid-button jsgrid-delete-button" href="#"  style="color:#ff4081;"><i class="mdi-action-delete"></i></a></td>
                                 </tr>';                                        
                           
                   }
                  
                  
                  ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
   <a href="<?php echo ADMIN_MAIN_URL; ?>event/add" class="loadPage btn-floating btn-large">
   <i class="mdi-content-add"></i>
   </a>               
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
   $(document).ready(function () {
   $("#getallevent").click(function(e){
      e.preventDefault();
      var url1="<?php echo ADMIN_MAIN_URL; ?>event/updateall";
      $('.loader').show(); 
      $.ajax({
                type:'POST',
                url:url1,
                data:{'type':'event'},
                success:function(data){
                  location.reload();
                  
                  //$('.loader ').hide(); 
                }
            });
      });
   });
</script>



