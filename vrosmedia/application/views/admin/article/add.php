<div class="row">
   <div class="col s12 m12 l12">
      <div class="card-panel">
         <h4 class="header2"> <?php echo $title;?>
         </h4>
         <div class="row">
            <form name="form_article" id="form_article" method="post" action="<?php echo base_url();?>admin/article/save" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $record['article_id'];?>" id="id" />
               <div class="row">
                  
                  <div class="col s12">
                     <label for="text" class="" for="name">Title</label>
                     <input type="text" id="title" name="title" value="<?php echo $record['title'];?>" class="" maxlength="150" tab-index="2" required="true">
                  </div>

                  <div class="col s12">
                     <label for="text" class="" for="description">Description</label>
                     <textarea class="materialize-textarea" id="description" name="description" rows="5" tab-index="3" required="true"><?php echo $record['description'];?></textarea>                    
                  </div>

                  <div class="col s6">
                     <label for="text" class="" for="category_id">Category</label>
                     <select class="browser-default" name="category_id" id="category_id" tab-index="3" style="display: block">
                        <?php foreach($category as $value){ ?>
                              <option value="<?php echo $value['id']?>" <?php echo $record['category_id'] == $value['id'] ?'selected':'' ?>><?php echo $value['name']?></option>
                        <?php }?>                        
                     </select>
                  </div>

                  <div class="col s6">
                     <label for="text" class="" for="cityID">City</label>
                     <select class="browser-default" name="cityID" id="cityID" tab-index="4" style="display: block">
                        <?php foreach($city as $value){ ?>
                              <option value="<?php echo $value['id']?>" <?php echo $record['cityID'] == $value['id'] ?'selected':'' ?>><?php echo $value['name']?></option>
                        <?php }?>                        
                     </select>
                  </div>

                  <div class="col s12">
                     <label for="text" class="" for="media_path">Cover Image</label>
                     <input type="file" name="cover_image" id="cover_image"  value="" class="file-path">  
                     <br>
                     <small>Max 2 Mb Image file allowed</small>                  
                  </div>

                  <div class="col s6">
                     <label for="text" class="" for="latitude">Latitude</label>
                     <input type="text" id="latitude" name="latitude" value="<?php echo $record['latitude'];?>" class="" maxlength="15" tab-index="5" required>
                  </div>

                  <div class="col s6">
                     <label for="text" class="" for="longitude">Longitude</label>
                     <input type="text" id="longitude" name="longitude" value="<?php echo $record['longitude'];?>" class=""  tab-index="6" required>
                  </div>
                                    
                  <div class="col s6">
                     <label for="text" class="" for="media_path">Article Another Images (can select multiple)</label>
                     <input type="file" name="media_path[]" id="media_path" multiple value="" class="file-path"> 
                     <br>
                     <small>Max 2 Mb image file allowed</small>                   
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="media_path">Article Video(can select multiple)</label>
                     <input type="file" name="video_path[]" id="video_path" multiple value="" class="file-path">  
                     <br>
                     <small>Max 2 Mb video file allowed</small>                  
                  </div>  
               </div>
              
                <div class="divider"></div>
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