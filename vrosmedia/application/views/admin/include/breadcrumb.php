
  
<div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title"><?php echo $title; ?></h5>
                    <ol class="breadcrumb">    
                         <?php
                            if(isset($arrBradcrumb) && count($arrBradcrumb)>0){ 
                              
                             foreach($arrBradcrumb as $strIndex => $strValue){ 
                                
                         ?>
                                 <li> 
                                        <?php
                                           
                                            echo anchor(($strValue != '') ? ADMIN_MAIN_URL.$strIndex : 'javascript:void(0)',
                                                ucfirst($strValue), 
                                                array('class' => ($strValue != '') ? '' : 'active')); 
                                        ?>      
                                                               
                                 </li>    
                         <?php } } ?>
                        
                    </ol>
</div>