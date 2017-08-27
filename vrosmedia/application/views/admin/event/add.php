<div class="row">
   <div class="col s12 m12 l12">
      <div class="card-panel">
         <h4 class="header2"> <?php echo $title;?>
         </h4>
         <div class="row">
            <form name="form_business" id="form_business" method="post" action="<?php echo base_url();?>admin/event/save" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $record['id'];?>" id="id" />
               <div class="row">
                  <div class="col s6">
                     <label for="text" class="" for="category_id">Category</label>
                     <select class="browser-default" name="category_id" id="category_id" tab-index="1" style="display: block">
                        <?php foreach($category as $value){ ?>
                              <option value="<?php echo $value['id']?>" <?php echo $record['category_id'] == $value['id'] ?'selected':'' ?>><?php echo $value['name']?></option>
                        <?php }?>                        
                     </select>
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="category_id">City</label>
                     <select class="browser-default" name="city_id" id="city_id" tab-index="1" style="display: block">
                        <?php foreach($city as $value){ ?>
                              <option value="<?php echo $value['id']?>" <?php echo $record['city_id'] == $value['id'] ?'selected':'' ?>><?php echo $value['name']?></option>
                        <?php }?>                        
                     </select>
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="title">Title</label>
                     <input type="text" id="title" name="title" value="<?php echo $record['title'];?>" class="" maxlength="50" tab-index="2" required="true">
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="title">Website</label>
                     <input type="text" id="website" name="website" value="<?php echo $record['website'];?>" class="" maxlength="50" tab-index="2" required="true">
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="venue">Venue</label>
                     <input type="text" id="venue" name="venue" value="<?php echo $record['venue'];?>" class="" maxlength="150" tab-index="3" required="true">
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="location">Location</label>
                     <input type="text" id="location" name="location" value="<?php echo $record['location'];?>" class="" maxlength="150" tab-index="4">
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="location">Mobile</label>
                     <input type="text" id="mobile" name="mobile" value="<?php echo $record['mobile'];?>" class="" maxlength="150" tab-index="4">
                  </div>  

                  <div class="col s6">
                     <label for="text" class="" for="start_time">Starts At</label>
                     <input type="text" id="start_time" name="start_time" value="<?php echo date('d-m-Y H:i:s',$record['start_time']);?>" class="" maxlength="150" tab-index="5">
                  </div>

                  <div class="col s6">
                     <label for="text" class="" for="end_time">Ends At</label>
                     <input type="text" id="end_time" name="end_time" value="<?php echo date('d-m-Y H:i:s',$record['end_time']);?>" class="" maxlength="150" tab-index="6">
                  </div>
                                   
                  <div class="col s6">
                     <label for="text" class="" for="description">Description</label>
                     <textarea class="materialize-textarea" id="description" name="description" rows="5" tab-index="7"><?php echo $record['description'];?></textarea>                    
                  </div>                  
                  <div class="col s6">

                     <label for="text" class="" for="media_path">Event Image</label>
                     <input type="file" name="media_path[]"  id="media_path" multiple value="" class="file-path"> 
                     <?php if($record['cover_image']!='') { 
                     echo  '<img src="'.DOMAIN_URL.'/'.$record['cover_image'].'" height="100" width="100">';
                      } ?>
                     <small>Max 2 Mb image file allowed</small>                   
                  </div>
                   <div class="col s6">
                     <label for="text" class="" for="media_path">Event Video</label>
                     <input type="file" name="video_path[]" id="video_path" multiple value="" class="file-path">  
                     <br>
                     <small>Max 2 Mb video file allowed</small>                  
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                     <i class="mdi-content-send right">
                     </i>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

