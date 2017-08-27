<div class="row">
   <div class="col s12 m12 l12">
      <div class="card-panel">
         <h4 class="header2"> <?php echo $title;?>
         </h4>
         <div class="row">
            <form name="form_business" id="form_business" method="post" action="<?php echo base_url();?>admin/business/save" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $record['id'];?>" id="id" />
               <div class="row">
                  <!--<div class="col s6">
                     <label for="text" class="" for="category_id">Category</label>
                     <select class="browser-default" name="category_id" id="category_id" tab-index="1" style="display: block">
                        <?php /*foreach($category as $value){ */?>
                              <option value="<?php /*echo $value['id']*/?>" <?php /*echo $record['category_id'] == $value['id'] ?'selected':'' */?>><?php /*echo $value['name']*/?></option>
                        <?php /*}*/?>
                     </select>
                  </div>-->
                  <div class="col s6">
                     <label for="text" class="" for="name">Title</label>
                     <input type="text" id="name" name="name" value="<?php echo $record['name'];?>" class="" maxlength="50" tab-index="2" required="true">
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="since">Since (Year)</label>
                     <input type="text" id="since" name="since" value="<?php echo $record['since'];?>" class="" number="true" maxlength="4" tab-index="3" required="true">
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="since">Mobile</label>
                     <input type="text" id="mobile" name="mobile" value="<?php echo $record['mobile'];?>" class="" maxlength="15" tab-index="4" required>
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="email">Email</label>
                     <input type="text" id="email" name="email" value="<?php echo $record['email'];?>" class=""  tab-index="5" required>
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="location">Location</label>
                     <input type="text" id="location" name="location" value="<?php echo $record['location'];?>" class="" maxlength="150" tab-index="6" required="true" required>
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="media_path">Cover Image</label>
                     <input type="file" name="cover_image" id="cover_image"  value="" class="file-path" required>  
                     <br>
                     <small>Max 2 Mb Image file allowed</small>                  
                  </div>
                  <div class="col s12">
                     <label for="text" class="" for="description">Description</label>
                     <textarea class="materialize-textarea" id="description" name="description" rows="5" tab-index="7" required="true"><?php echo $record['description'];?></textarea>                    
                  </div>
                  <div class="col s12">
                     <label for="text" class="" for="address">Address</label>
                     <textarea class="materialize-textarea" id="address" name="address" rows="5" tab-index="8" required="true"><?php echo $record['address'];?></textarea>                    
                  </div>
                 
                    <div class="col s6">
                     <label for="text" class="" for="since">Lattitude</label>
                     <input type="text" id="mobile" name="latitude" value="<?php echo $record['latitude'];?>" class="" maxlength="15" tab-index="4" required>
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="email">Longitude</label>
                     <input type="text" id="email" name="longitude" value="<?php echo $record['longitude'];?>" class=""  tab-index="5" required>
                  </div>
                   <div class="col s12">
                     <label for="text" class="" for="website">website</label>
                     <textarea class="materialize-textarea" id="website" name="website" rows="5" tab-index="8"><?php echo $record['website'];?></textarea>                    
                  </div>
                  
                  <div class="col s12">
                     <label for="text" class="" for="address">Facebook page link</label>
                     <textarea class="materialize-textarea" id="fb_link" name="fb_link" rows="5" tab-index="8"><?php echo $record['fb_link'];?></textarea>                    
                  </div>
                   <div class="col s12">
                     <label for="text" class="" for="address">Twitter page link</label>
                     <textarea class="materialize-textarea" id="twitter_link" name="twitter_link" rows="5" tab-index="8"><?php echo $record['twitter_link'];?></textarea>                    
                  </div>
                   <div class="col s12">
                     <label for="text" class="" for="address">Google Plus link</label>
                     <textarea class="materialize-textarea" id="gplus_link" name="gplus_link" rows="5" tab-index="8"><?php echo $record['gplus_link'];?></textarea>                    
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="media_path">Business Another Images (can select multiple)</label>
                     <input type="file" name="media_path[]" id="media_path" multiple value="" class="file-path"> 
                     <br>
                     <small>Max 2 Mb image file allowed</small>                   
                  </div>
                  <div class="col s6">
                     <label for="text" class="" for="media_path">Business Video(can select multiple)</label>
                     <input type="file" name="video_path[]" id="video_path" multiple value="" class="file-path">  
                     <br>
                     <small>Max 2 Mb video file allowed</small>                  
                  </div>
                  
                    
               </div>
              
               <div class="divider" style="margin-top: 3% !important; border: 1px solid #9e9e9e;"></div>
             <div class="row">
                  <div class="col s12">
                       <label >Working Hours</label>
                  </div>   
                   <div class="col s6">                   
                       
                   
                        <p>
                           <input type="checkbox" id="test6" >
                           <label for="test6">Sunday</label>
                       </p>
                        <div class="row">
                            <div class="input-field col s4">
                               <input id="icon_prefix" type="text" class="validate">
                               <label for="icon_prefix">Start Time</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="icon_password" type="password" class="validate">
                                <label for="icon_password">End Time</label>
                            </div> 
                        </div>
                   </div>
                   
                   <div class="col s6">                   
                        
                        <p>
                           <input type="checkbox" id="test7" >
                           <label for="test7">Monday</label>
                       </p>
                        <div class="row">
                            <div class="input-field col s4">
                               <input id="sun_start_icon_prefix" type="text" class="validate">
                               <label for="sun_start_icon_prefix">Start Time</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="sun_end_icon_password" type="password" class="validate">
                                <label for="sun_end_icon_password">End Time</label>
                            </div> 
                        </div>
                   </div>
                 
                    <div class="col s6">                   
                       
                   
                        <p>
                           <input type="checkbox" id="test4" >
                           <label for="test4">Tuesday</label>
                       </p>
                        <div class="row">
                            <div class="input-field col s4">
                               <input id="Tue-start_icon_prefix" type="text" class="validate">
                               <label for="start_icon_prefix">Start Time</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="tue_end_icon_password" type="password" class="validate">
                                <label for="tue_end_icon_password">End Time</label>
                            </div> 
                        </div>
                   </div>
                   
                   <div class="col s6">                   
                        
                        <p>
                           <input type="checkbox" id="test5" >
                           <label for="test5">Wednesday</label>
                       </p>
                        <div class="row">
                            <div class="input-field col s4">
                               <input id="wed_start_icon_prefix" type="text" class="validate">
                               <label for="wed_start_icon_prefix">Start Time</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="wed_end_icon_password" type="password" class="validate">
                                <label for="wed_end_icon_password">End Time</label>
                            </div> 
                        </div>
                   </div>
                 
                   <div class="col s6">                   
                       
                   
                        <p>
                           <input type="checkbox" id="test2" >
                           <label for="test2">Thursday</label>
                       </p>
                        <div class="row">
                            <div class="input-field col s4">
                               <input id="Thu-start_icon_prefix" type="text" class="validate">
                               <label for="Thu-start_icon_prefix">Start Time</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="thu_end_icon_password" type="password" class="validate">
                                <label for="thu_end_icon_password">End Time</label>
                            </div> 
                        </div>
                   </div>
                   
                   <div class="col s6">                   
                        
                        <p>
                           <input type="checkbox" id="test8" >
                           <label for="test8">Friday</label>
                       </p>
                        <div class="row">
                            <div class="input-field col s4">
                               <input id="fri_start_icon_prefix" type="text" class="validate">
                               <label for="fri_start_icon_prefix">Start Time</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="fri_end_icon_password" type="text" class="validate">
                                <label for="fri_end_icon_password">End Time</label>
                            </div> 
                        </div>
                   </div>
                 
                  <div class="col s6">                   
                        
                        <p>
                           <input type="checkbox" id="test9" >
                           <label for="test9">Saturday</label>
                       </p>
                        <div class="row">
                            <div class="input-field col s4">
                               <input id="sat_start_icon_prefix" type="text" class="validate">
                               <label for="sat_start_icon_prefix">Start Time</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="sat_end_icon_password" type="text" class="validate" >
                                
                                <label for="sat_end_icon_password">End Time</label>
                            </div> 
                        </div>
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

