<p class="center login-form-text"> <?php $this->general_model->getAdminMessages(); ?></p>

<!--DataTables example Row grouping-->
<div id="row-grouping" class="section" >

    <div class="row">
        <div class="col s12 m4 l3">

        </div>
        <div class="col s12 m8 l9" style="width:100% !important;" id="taxi_class">
            <table id="data-table-simple" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th><?php echo $this->lang->line("ACTION"); ?></th>
                </tr>
                </thead>



                <tbody>

                <?php

                foreach($ClassData as $class){


                    /* user status */
                    if($class->active==1){
                        $class_status='Active';
                        $class_status_color='green';
                    }else{
                        $class_status='Inactive';
                        $class_status_color='red';
                    }
                    echo '<tr id="removeTR">
                                             <td style="color:#827717 ; font-size: 120%;">'.$class->name.'</td>

                                             <td style="font-size: 120%;color:#827717 ;">'.$class->description.'</td>

                                             <td style="font-size: 120%;color:#827717 ;"><a id='.$class->id.' class="statusValue changeStatus btn btn-large waves-effect waves-light '.$class_status_color.' darken-4">'.$class_status.'</a></td> 
                                             <td style="font-size: 120%;">

                                                 <a class="loadPage" id='.$class->id.'  href="'.ADMIN_MAIN_URL.'/taxi/add_class/'.$class->id.'" style=""><i class="mdi-image-edit"></i></a>
                                                 <a id='.$class->id.' class="deleteAction jsgrid-button jsgrid-delete-button" href="#"  style=""><i class="mdi-action-delete"></i></a>

                                             </td>
                                          </tr>';


                }


                ?>

                </tbody>

            </table>
        </div>
    </div>
</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
    <a href="<?php echo ADMIN_MAIN_URL; ?>/taxi/add_class/" class="loadPage btn-floating btn-large">
        <i class="mdi-content-add"></i>
    </a>

</div>