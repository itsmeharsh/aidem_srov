







<div class="row">
   <div class="col s12 m12 l12">
      <div class="card-panel">
         <h4 class="header2"><?php echo $FormData[0]->vHeading; ?>
         </h4>
          
         <div class="row">
             
                        <?php 

                        $frmAttr = array(
                            "name" => $FormData[0]->vFormName,
                            "id" =>$FormData[0]->vFormID,
                            "class" => $FormData[0]->vFormClass,
                            "method" => $FormData[0]->vMethod,
                            "enctype"=>$FormData[0]->vEncryptionType,
                        );
                         if(isset($Userdata) && $Userdata != ''){
                             echo form_open('admin/user/save/'.$Userdata['id'],$frmAttr);                   

                         }else{
                             echo form_open('admin/user/save',$frmAttr); 
                         }
                      ?>
        
                         <div class="row">
                         <?php if($user_type=='d'){ ?>
                                <div class="col s12">
                                       <label class="" for="Taxi Company">Taxi Company</label>
                                          <select class="browser-default" name="texi_company_id">
                                             <?php foreach($CompanyData as $company){ ?> 
                                                  <option value="<?php echo $company->id; ?>"><?php echo $company->name; ?></option>
                                             <?php } ?>    
                                          </select>
                                 </div>   
                                <div class="col s12">
                                       <label class="" for="Taxi Class">Taxi Class</label>
                                          <select class="browser-default" name="texi_class_id">
                                               <?php foreach($ClassData as $class){ ?> 
                                                  <option value="<?php echo $class->id; ?>"><?php echo $class->name; ?></option>
                                                <?php } ?>  
                                          </select>
                                 </div>   

                                 <div class="col s12">
                                       <label class="" for="City">City</label>
                                          <select class="browser-default" name="city">
                                               <?php foreach($CityData as $city){ ?> 
                                                  <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                                                <?php } ?>  
                                          </select>
                                 </div>  
                                <div class="col s12">
                                      <label for="text" class="active">Texi Number</label>
                                      <input type="text" name="texi_number" value="<?php echo $Userdata['texi_number']; ?>" class="" maxlength="20" tab-index="1">
                              </div> 
               
                        <?php } ?>                        
                         
                           </div>   
                         <div class="row">
                           
                           <div class="col s12">
                              <label for="text" class="">Name</label>
                              <input type="text" name="name" value="<?php echo $Userdata['name']; ?>" class="" maxlength="20" tab-index="1" required="true">
                           </div>
                          
                           <div class="col s12">
                              <label for="email" class="">Email</label>
                              <input type="email" name="email" value="<?php echo $Userdata['email']; ?>" class="" maxlength="20" tab-index="1" required="true">
                           </div>
                             <div class="col s6">
                              <label for="phone" class="">Phone</label>
                              <input type="text" name="phone" value="<?php echo $Userdata['phone']; ?>" class="" maxlength="20" tab-index="1" required="true">
                           </div>
                           <div class="col s6">
                              <label for="password" class="">Password</label>
                              <input type="password" name="password" value="" class="" maxlength="20" tab-index="1" >
                           </div>
                           
                           <div class="col s6">
                              <label for="hidden"></label><input type="hidden" name="user_type" value="<?php echo $user_type; ?>" class="" maxlength="20" tab-index="1" required="true">
                           </div>
                           <div class="col s6">
                              <label for="file">Image</label>
                              <input type="file" name="image" value="" class="file-path validate" maxlength="20" tab-index="1">
                           </div>
                        </div>
                        <div class="row">
                           <div class="row">
                              <div class="input-field col s12">
                                 <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                 <i class="mdi-content-send right">
                                 </i>
                                 </button>
                              </div>
                           </div>
                        </div>
                    </form>
         </div>
      </div>
   </div>
</div>