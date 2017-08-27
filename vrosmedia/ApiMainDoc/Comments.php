<div class="section" id="comments">
    <h2>Get comments
        <a class="headerlink" href="index.php#comments" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'comments.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Get comments</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/get_comments';?></pre>
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
                <td>Limit</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>Offset</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>event_id</td>
                <td>optional</td>
                <td></td>
            </tr>
              <tr class="row-even">
                <td>business_id</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                 <td>offer_id</td>
                 <td>optional</td>
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
  <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">records</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"9"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691720377171.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691720377171.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is nice event"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Kalpesh"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/user/10/835cc694663546877cf2d2832b254e44.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/user/10/835cc694663546877cf2d2832b254e44.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is nice event"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">offset</span>: <span class="type-number">1</span>,</div></li><li><div class="hoverable"><span class="property">TotalRecords</span>: <span class="type-number">2</span>,</div></li><li><div class="hoverable"><span class="property">is_last</span>: <span class="type-number">1</span></div></li></ul>}</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div> 