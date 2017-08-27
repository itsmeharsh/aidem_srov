  <div class="container">        

          <!--toasts-->
          <div id="toasts" class="section">
            <h4 class="header">Event Management</h4>
            <div class="row">
              <div class="col s12 m12 l12">
                <p>Select event category to view listing belongs to category.</p>
              </div>
              <div class="col s12 m12 l12">
                <div class="row">
                  <?php foreach($category as $key=>$value){ ?>
                  <div class="col s4 l2" style="margin-bottom: 10px">
                        <a href="<?php echo ADMIN_MAIN_URL; ?>event/lists/<?php echo $value['id']?>" class="btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?php echo $value['name']?>"><?php echo $value['name']?> </a>
                  </div>   
                   <?php }?>      
                          
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col s12 m4 l3">
                <p class="header"></p>
              </div>
              <div class="col s12 m8 l9">
                  <p>Manage event by Performing <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="Add new event">Add</a>, <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit event">Edit</a>, <a class="tooltipped" data-position="left" data-delay="50" data-tooltip="Delete event permanantly">Delete</a> Operations.</p>
              </div>
            </div>

            <div class="row">
                <h4 class="header">Operations</h4>
             <p class="caption">
               
 You can add,edit and delete events ,it will be instantly updated into system.If having a long data for update than you can directly import excel sheet,it will automatically ignore repeated data and will update instantly from system
     
              </p>
              </div>
            </div>

        </div>