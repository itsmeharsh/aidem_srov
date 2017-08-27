<section id="content">
        

        <!--start container-->
        <div class="container">
          <div class="section">
              
              <div class="divider"></div>
              
                <!--shadow demo-->
                <div id="shadow-demo" class="section">
                  <h4 class="header">Payment Detail</h4>
                  <div class="row">
                    <div class="col s12 m4 l3">
                     
                    </div>
                    <div class="col s12 m8 l9">
                      <div class="card-panel">
                          <ul id="projects-collection" class="collection">
                                   
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Transaction ID</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                 <p class="collections-title"><blockquote><?php echo $paymentData[0]->transaction_id; ?></blockquote></p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Amount</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                <p class="collections-title">$ <?php echo $paymentData[0]->amount; ?></p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Payment Date</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                <p class="collections-title"><?php echo $paymentData[0]->payment_date; ?></p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Payment Status</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                <p class="collections-title"><?php echo $paymentData[0]->payment_status; ?></p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Duration</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                <p class="collections-title"><?php echo $paymentData[0]->duration; ?> Days</p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Type</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                <p class="collections-title"><?php echo $paymentData[0]->type; ?></p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Owner</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                 <p class="collections-title"><a  class="jsgrid-button " href="<?php echo ADMIN_MAIN_URL.'/user/detailView/u/'.$paymentData[0]->user_id; ?>"  style=""><?php echo $paymentData[0]->UserName; ?></a></p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title lable_line">Business</p>
                                              
                                            </div>
                                          
                                             <div class="col s6">
                                                <p class="collections-title"><a  class="jsgrid-button " href="<?php echo ADMIN_MAIN_URL.'/business/detailView/'.$paymentData[0]->business_id.'/'.$paymentData[0]->user_id; ?>"  style=""><?php echo $paymentData[0]->businessName; ?></a></p>
                                              
                                            </div>
                                        </div>
                                    </li>
                                    
                                    
                                    
                                </ul>
                          <div align="center"> <a class="btn">Edit</a>&nbsp<a class="btn">Contact to owner</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Floating Action Button -->
           
            <!-- Floating Action Button -->
        </div>
        <!--end container-->

      </section>

<style>
.lable_line {
    font-weight: 900;
    color: #ff4081;
    font-weight: bold;
}
</style>