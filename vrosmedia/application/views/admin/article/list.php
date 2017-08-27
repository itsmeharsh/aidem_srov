    <p class="center login-form-text"> <?php $this->general_model->getAdminMessages(); ?></p>  
        
            <!--DataTables example Row grouping-->
            <div id="row-grouping" class="section" >
             
              <div class="row">
                <div class="col s12 m4 l3">
                  
                </div>
                  <div class="col s12 m8 l9" style="width:100% !important;" id="admin_article_results">
                  <table id="data-table-simple" class="display" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th><?php echo $this->lang->line("ART_TITLE"); ?></th>
                              <th><?php echo $this->lang->line("STATUS"); ?></th>
                               <th><?php echo $this->lang->line("ACTION"); ?></th>
                          </tr>
                      </thead>
                   
                     
                   
                      <tbody>
                          
                          <?php
                         
                           foreach($articleData as $article){ 
                                                                   
                                    /* category status */
                                    if($article->eStatus=='Active'){
                                        $article_status='Active';
                                        $article_status_color='green';
                                    }else{
                                        $article_status='Inactive';
                                        $article_status_color='red';
                                    }
                                    echo '<tr id="removeTR"> 
                                             <td style="color:#827717 ; font-size: 120%;">'.$article->title.'</td>
                                             <td style="font-size: 120%;color:#827717 ;"><a id='.$article->article_id.' class="statusValue changeStatus btn btn-large waves-effect waves-light '.$article_status_color.' darken-4">'.$article_status.'</a></td> 
                                             <td style="font-size: 120%;color:#827717 ;">
                                                 <a class="loadPage" id='.$article->article_id.'  href="'.ADMIN_MAIN_URL.'/article/add/'.$article->article_id.'" style="color:#ff4081;"><i class="mdi-image-edit"></i></a><a id='.$article->article_id.' class="deleteAction jsgrid-button jsgrid-delete-button" href="#"  style="color:#ff4081;"><i class="mdi-action-delete"></i></a></td> 
                                          </tr>';                                    
                            }
                          
                           
                          ?>
                          
                      </tbody>
                   
                  </table>
                </div>
              </div>
            </div>
           <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
               <a href="<?php echo ADMIN_MAIN_URL; ?>article/add" class="loadPage btn-floating btn-large">
                  <i class="mdi-content-add"></i>
                </a>
               
            </div>
