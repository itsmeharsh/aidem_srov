

<div class="section" id="offer_like">
    <h2>Like Offer
        <a class="headerlink" href="index.php#offer_like" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'offer_like.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Like Offer Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/offer_like';?></pre>
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
                <td>offer_id</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>is_like</td>
                <td>Required</td>
                <td>(1=like and 0=dislike)</td>
            </tr>
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Thank you for Liked!"</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>