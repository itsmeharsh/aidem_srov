<div class="section" id="offer_share">
    <h2>Share Offer
        <a class="headerlink" href="index.php#offer_share" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'offer_share.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Share Offer Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/offer_share';?></pre>
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
                <td>is_share</td>
                <td>Required</td>
                <td>(1=shared)</td>
            </tr>
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Thank you for sharing !"</span></div></li></ul>}</div>
</div>
