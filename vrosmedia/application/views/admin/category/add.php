
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
                if(isset($categoryData) && $categoryData != ''){
                    echo form_open('admin/category/save/'.$categoryData['id'],$frmAttr);                   
                                        
                }else{
                    echo form_open('admin/category/save',$frmAttr); 
                }
               if($categoryData['type']==''){
                   $categoryData['type']=$FormData[0]->user_type;
               }
               ?>
          
           
             
            <?php
               $data.='<div class="row">';
               foreach($FormData as $forms){
                   
                       $fileds = array(
                           "name" => $forms->vName,
                           "class" => $forms->vClassName,
                           "maxlength" => $forms->maxlength,
                           "value" =>$categoryData[$forms->vColumnName],                                                     
                           "type"=>$forms->vType,
                           "tab-index" => 1
                       );
                       if($forms->vRequired=='true' && $categoryData['id']=='' ){
                            $fileds["required"] = $forms->vRequired;
                       }
                     
                        $data.='<div class="'.$forms->vDivClass.'">
                                    <label for="'.$forms->vType.'">'.$this->lang->line($forms->vLable).'</label>';
                        if($forms->vType=='textarea'){
                            $data.=form_textarea($fileds);
                            $data.='</div>';
                        }else{
                             $data.=form_input($fileds);
                             $data.='</div>'; 
                        }
                        if($forms->vDivClass=='input-field col s12'){
                           $data.='</div>';
                           $data.='<div class="row">';
                        }   
                      
               } 
               $data.='</div>';
               echo $data;
               ?>
               
            <div class="row">
               <div class="row">
                  <div class="input-field col s12">
                     <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
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