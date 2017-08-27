
<div class="section" id="QRGraph">
    <h2>QR Graph
        <a class="headerlink" href="index.php#QRGraph" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'QRGraph.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>QR Graph</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'graph/QRGraph';?></pre>
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
                <td>business_id</td>
                <td>Optional</td>
                <td></td>
            </tr>
           <tr class="row-even">
                <td>offer_id</td>
                <td>Optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>ads_id</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>start_date</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>end_date</td>
                <td>Optional</td>
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
        <div id="jfContent"><div id="formattedJson"><span class="kvov arrElem rootKvov"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">code</span>":&nbsp;<span class="n">200</span>,</span><span class="kvov objProp">"<span class="k">status</span>":&nbsp;<span class="s">"<span>success</span>"</span>,</span><span class="kvov objProp"><span class="e"></span>"<span class="k">data</span>":&nbsp;<span class="b">[</span><span class="ell"></span><span class="blockInner"><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-11-28</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-11-29</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-01</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-02</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-03</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-04</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-05</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-06</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-07</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-08</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-09</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-10</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-11</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-12</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-13</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-14</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-15</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-16</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-17</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-18</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-19</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-20</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-21</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-22</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-23</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-24</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-25</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>1</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-27</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span>,</span><span class="kvov arrElem"><span class="e"></span><span class="b">{</span><span class="ell"></span><span class="blockInner"><span class="kvov objProp">"<span class="k">day</span>":&nbsp;<span class="s">"<span>2016-12-28</span>"</span>,</span><span class="kvov objProp">"<span class="k">clicks</span>":&nbsp;<span class="s">"<span>0</span>"</span></span></span><span class="b">}</span></span></span><span class="b">]</span></span></span><span class="b">}</span></span></div></div>
    </div>

    <h6>
        <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
    </h6>
    <div class="highlight-js json">
        <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
    </div>
</div>