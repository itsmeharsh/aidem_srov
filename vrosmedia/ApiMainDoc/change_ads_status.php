<div class="section" id="change_ads_status">
    <h2>Activate or Deactivate Advertisment
        <a class="headerlink" href="index.php#change_ads_status" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'change_ads_status.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Activate or Deactivate Advertisment</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/change_ads_status';?></pre>
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
                <td>ads_id</td>
                <td>required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>eStatus</td>
                <td>required</td>
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
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">records</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"9"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691720377171.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691720377171.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"1"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"11"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691724451127.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691724451127.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"1"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"45"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"1"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">offset</span>: <span class="type-number">1</span>,</div></li><li><div class="hoverable"><span class="property">TotalRecords</span>: <span class="type-number">3</span>,</div></li><li><div class="hoverable"><span class="property">is_last</span>: <span class="type-number">1</span></div></li></ul>}</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div> 