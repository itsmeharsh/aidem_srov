<div class="section" id="notification_master">
    <h2>Notification</h2>
   
    
    <h5>Payload</h5>
 
<div class="highlight-js json">
  <div id="json">
      <div class="collapser"></div>
      {
      <span class="ellipsis"></span>
        <ul class="obj collapsible">
            <li>
                <div class="hoverable">
                    <span class="property">id</span>:
                    <span class="type-string">Autoincremental id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">body</span>: 
                    <span class="type-string">message</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">type</span>: 
                    <span class="type-string">"notification type"</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">post_title</span>: 
                    <span class="type-string">"notification title"</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">icon</span>: 
                    <span class="type-string">"notification icon"</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">redirect_id</span>: 
                    <span class="type-string">"rediraction id"</span>,
                </div>
            </li>
            </ul>
            <span class="ellipsis"></span>
            }
            
            
</div>

</div> 
     <h5>Type</h5>
     
     <div class="highlight-js json">
         <ul>
             <li>
                <div class="hoverable">
                    <span class="property">send friend request</span>: 
                    <span class="type-number">sent_req</span>,
                </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">Accept friend request</span>: 
                    <span class="type-number">act_req</span>,
                </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">share business</span>: 
                    <span class="type-number">share_bns</span>,
                </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">Like business</span>: 
                    <span class="type-number">lk_bns</span>,
                </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">Comment business</span>: 
                    <span class="type-number">cmt_bns</span>,
                </div>
             </li>

             <li>
                <div class="hoverable">
                    <span class="property">Favorite business</span>: 
                    <span class="type-number">fv_bns</span>,
                </div>
             </li>
             
              <li>
                <div class="hoverable">
                    <span class="property">Before and After offer expire</span>: 
                    <span class="type-number">offer_exp</span>,
                </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">Before and After Advertisment expire</span>: 
                    <span class="type-number">ads_exp</span>,
                </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">Admin announcements</span>: 
                    <span class="type-number">admin_msg</span>,
                </div>
             </li>
              <li>
              <div class="hoverable">
                    <span class="property">Like offer</span>: 
                    <span class="type-number">lk_offer</span>,
                </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">Comment offer</span>: 
                    <span class="type-number">cmt_offer</span>,
                </div>
             </li>
            
             <li>
                <div class="hoverable">
                    <span class="property">Favorite offer</span>: 
                    <span class="type-number">fv_offer</span>,
                </div>
             </li>
             <li>
                 <div class="hoverable">
                     <span class="property">Share Offer</span>:
                     <span class="type-number">share_offer</span>,
                 </div>
             </li>
              <li>
                <div class="hoverable">
                    <span class="property">Share Event with friends</span>:
                    <span class="type-number">evt_share</span>,
                </div>
             </li>
             <li>
                 <div class="hoverable">
                     <span class="property">Share business with friends</span>:
                     <span class="type-number">bns_share</span>,
                 </div>
             </li>
             <li>
                 <div class="hoverable">
                     <span class="property">Share offer with friends</span>:
                     <span class="type-number">offer_share</span>,
                 </div>
             </li>

             

         </ul>
     </div>

    <h5>redirection after click on notification</h5>
    <p>you will received redirect_id in notification payload,redirect id will be page id where you need to redirect,it will be.. </p>
    <div class="highlight-js json">
        <ul>
            <li>
                <div class="hoverable">
                    <span class="property">send friend request</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Accept friend request</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">share business</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Like business</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Comment business</span>:
                    <span class="type-number">business_id</span>,
                </div>
            </li>

            <li>
                <div class="hoverable">
                    <span class="property">Favorite business</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>

            <li>
                <div class="hoverable">
                    <span class="property">Before and After offer expire</span>:
                    <span class="type-number">offer_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Before and After Advertisment expire</span>:
                    <span class="type-number">ads_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Admin announcements</span>:
                    <span class="type-number">general page (next phase)</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Like offer</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Comment offer</span>:
                    <span class="type-number">offer_id</span>,
                </div>
            </li>

            <li>
                <div class="hoverable">
                    <span class="property">Favorite offer</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Share Offer</span>:
                    <span class="type-number">user_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Share Event with friends</span>:
                    <span class="type-number">event_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Share business with friends</span>:
                    <span class="type-number">business_id</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">Share offer with friends</span>:
                    <span class="type-number">offer_id</span>,
                </div>
            </li>



        </ul>
    </div>