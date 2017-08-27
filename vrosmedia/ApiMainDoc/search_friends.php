

<div class="section" id="search_friends">
    <h2>Search friends 
        <a class="headerlink" href="index.php#search_friends" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'search_friends.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Search friends </p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'friends/search_friends';?></pre>
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
                <td>user_id</td>
                <td>Required</td>
                <td></td>
            </tr>
              <tr class="row-even">
                <td>deLatitude</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>deLongitude</td>
                <td>Required</td>
                <td></td>
            </tr>
              <tr class="row-even">
                <td>searchKey</td>
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
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">friends</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">request_id</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja1@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"69.24439142729223"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">request_id</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"7"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Test"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"test@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"132.22478539486022"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">request_id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"8"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja2@gmail.com"</span>,</div></li><li><div class="hoverable hovered"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"220.16422967783186"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">request_id</span>: <span class="type-string">"8"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"47"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros5.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">request_id</span>: <span class="type-string">"6"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"21"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Jason Vrane"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"4vrane@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">friends_request</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">request_id</span>: <span class="type-string">"7"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"45"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros3.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>