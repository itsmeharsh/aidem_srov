
<div class="section" id="offer_detail">
    <h2>Offer Details
        <a class="headerlink" href="index.php#offer_detail" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'offer_detail.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Offer Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/offer_detail';?></pre>
        </div>
    </div>
    <h5>Request Parameters</h5>
    <div class="wy-table-responsive">
        <table border="1" class="docutils">
            <colgroup>
                <col width="35%">
                <col width="30%">
                <col width="">
            </colgroup>
            <thead valign="bottom">
            <tr class="row-odd">
                <th class="head">Param</th>
                <th class="head">Required/Optional</th>
                <th class="head">Description</th>
            </tr>
            </thead>
            <tbody valign="top">
            <tr class="row-even">
                <td>offer_id</td>
                <td>Required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>user_id</td>
                <td>Required</td>
                <td></td>
            </tr>


            </tbody>
        </table>
    </div>
    <h5>Response</h5>
    <h6>
        <i class="fa fa-hand-o-right"></i> Success (Profile)
    </h6>
    <div class="highlight-js json">
        <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"Stark Expo3"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"rajkot"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1673.9067740899545"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/event/3.jpg">http://localhost/businessApp/uploads/event/3.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"9"</span>,</div></li><li><div class="hoverable"><span class="property">venue</span>: <span class="type-string">"Ahmedabad GMDC"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"22.3039"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"70.8022"</span>,</div></li><li><div class="hoverable"><span class="property">start_time</span>: <span class="type-string">"2016-08-25 08:53"</span>,</div></li><li><div class="hoverable"><span class="property">end_time</span>: <span class="type-string">"2016-09-25 08:53"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">false</span>,</div></li><li><div class="hoverable"><span class="property">LoggedinUserDetail</span>: [ ],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable hovered"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/user/14691723208605.png">http://localhost/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"0"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">attendee</span>: [ ],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/event/3.jpg">http://localhost/businessApp/uploads/event/3.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">CategoryImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/business.png">http://localhost/businessApp/uploads/category/business.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">CategoryName</span>: <span class="type-string">"Business"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"9"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/user/14691720377171.png">http://localhost/businessApp/uploads/user/14691720377171.png</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div></li></ul>}</div>
    </div>

    <h6>
        <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
    </h6>
    <div class="highlight-js json">
        <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
    </div>
</div>
