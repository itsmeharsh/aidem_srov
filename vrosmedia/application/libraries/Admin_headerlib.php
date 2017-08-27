<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//require_once(DOCROOT."classes/libraries/user_agent.class.php");
class Admin_headerlib {

    public $title;
    public $body_id;
    public $body_function;
    public $iphone_css;
    public $safari_css;
    public $opera_css;
    public $icon_path;
    public $css_path;
    public $javascripts;
    public $javascript_path;
    public $stylesheets;
    public $javascript_plugins;
    public $login_javascript_plugins;
    public $bottom_javascripts;
    public $login_javascripts;
    public $plugins;
    public $http_meta_tags;
    public $content_meta_tags;
    public $keywords;
    public $doctype;
//public $user_agent;

    public $config;

    public function __construct() {

        $this->doctype = 'XHTML1.1'; // Set the Doctype definition
        $this->title = ''; // Set the default page title
        $this->body_id = "mainbody"; // Set the default body id (leave blank for no id)
        $this->icon_path = LOGO_IMAGE_THUMB_URL; // Set default icon path for iPhone relative FRONT_URL.
        $this->css_path = ADMIN_CSS_URL; // Set default path to browser specific css files relative to FRONT_URL.
        $this->plugin_path = ADMIN_PLUGIN_URL; // Set default path to browser specific css files relative to FRONT_URL.
        $this->javascript_path = ADMIN_JS_URL; // Set path to javascripts
        $this->safari_css = TRUE; // Safari specific stylesheet
        $this->opera_css = FALSE; // Opera specific stylesheet
        $this->iphone_css = TRUE; // iPhone specific stylesheet

        $this->external_js = array();
        $this->external_css = array();
        $this->login_javascripts = array();
        $this->javascript_plugins = array();
        $this->bottom_javascripts = array();
        $this->login_javascript_plugins = array();
        $this->plugins = array();

        $this->external_css = array(
          'font_googleapi' => 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all'
          );


        $this->stylesheets = array(
            'materialize'            => 'materialize.css',
            'style'                  => 'style.css'
        );

        $this->plugins = array(
            'perfect-scrollbar'      => 'perfect-scrollbar/perfect-scrollbar.css',
            'jquery-jvectormap'      => 'jvectormap/jquery-jvectormap.css',
            'chartist.min'           => 'chartist-js/chartist.min.css',
        );
        
        $this->javascripts = array(
            'jquery-1.11.2.min'      => 'jquery-1.11.2.min.js',          
            'materialize.min'        => 'materialize.min.js',
            'plugins'                => 'plugins.js'
        );
        
        $this->javascript_plugins = array(
            'perfect-scrollbar.min'             => 'perfect-scrollbar/perfect-scrollbar.min.js',
            'chartist.min'         => 'chartist-js/chartist.min.js',
            'chart.min'              => 'chartjs/chart.min.js',       
            'chart-script'          => 'chartjs/chart-script.js',       
           'jquery.sparkline.min'=> 'sparkline/jquery.sparkline.min.js',       
            'sparkline-script'      => 'sparkline/sparkline-script.js',            
            'jquery-jvectormap-1.2.2.min'         => 'jvectormap/jquery-jvectormap-1.2.2.min.js',            
            'jquery-jvectormap-world-mill-en'           => 'jvectormap/jquery-jvectormap-world-mill-en.js',            
            'vectormap-script'         => 'jvectormap/vectormap-script.js'
            
        );



        //$this->user_agent       = new User_agent();
        $this->keywords = '';
        $this->http_meta_tags = array(
            'Content-Type' => 'text/html; charset=utf-8'
        );
        
        $this->content_meta_tags = array(
            'viewport' => 'width=device-width, initial-scale=1',
            'description' => ''
        );
        //$this->config = $GLOBALS['config'];
    }

// End __construct function

    public function set_page_info($title, $body_id) {
        $this->title = $title;
        $this->body_id = ' id="' . $body_id . '" ';
    }

// End set_page_info function

    public function set_title($title) {
        $this->title = $title;
    }

// End set_title function

    public function set_body_id($body_id) {
        $this->body_id = ' id="' . $body_id . '"';
    }

// End set_body_id function

    public function add_stylesheet($name, $file) {
        $this->stylesheets[$name] = $file;
    }

// End add_stylesheet function

    public function add_plugin($name, $file) {
        $this->plugins[$name] = $file;
    }

// End add_plugins function

    public function add_javascript($name, $file) {
        $this->javascripts[$name] = $file;
    }

// End add_javascript function

    public function add_login_javascripts($name, $file) {
        $this->login_javascripts[$name] = $file;
    }

// End add_javascript function

    public function add_javascript_plugins($name, $file) {
        $this->javascript_plugins[$name] = $file;
    }

// End add_javascript_plugins function

    public function add_login_javascript_plugins($name, $file) {
        $this->login_javascript_plugins[$name] = $file;
    }

// End add_login_javascript_plugins function

    public function add_bottom_javascripts($name, $file) {
        $this->bottom_javascripts[$name] = $file;
    }

// End add_bottom_javascript_plugins function

    public function add_meta_tag($name, $content) {
        $this->meta_tags[$name] = $content;
    }

// End add_meta_tag function

    public function data() {
        $data['doctype'] = $this->_doctype();
        $data['meta_tags'] = $this->_meta_tags();
        $data['title'] = $this->title;
        $data['body_id'] = $this->body_id;
        //$data['browser'] = $this->_browser();
        //$data['os'] = $this->user_agent->platform();
        //$data['iphone_headers'] = $this->_iPhone_headers();
        $data['stylesheets'] = $this->_stylesheets();
        $data['plugins'] = $this->_plugins();
        $data['javascript'] = $this->_javascript();
        $data['javascript_plugins'] = $this->_javascript_plugins();
        $data['login_javascripts'] = $this->_login_javascripts();
        $data['iejavascript'] = $this->_iejavascript();
//        $data['gmap'] = $this->_gmap();
    //    $data['favicon'] = $this->_favicon();
        $data['login_javascript_plugins'] = $this->_login_javascript_plugins();
        $data['bottom_javascripts'] = $this->_bottom_javascripts();

        return $data;
    }

// End data function

    private function _doctype() {
        switch ($this->doctype) {
            case 'Strict':
                return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"' . "\n" . '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">' . "\n";
                break;
            case 'Transitional':
                return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"' . "\n" . '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">' . "\n";
                break;
            case 'Frameset':
                return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"' . "\n" . '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">' . "\n";
            case 'XHTML':
                return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"' . "\n" . '"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">' . "\n";
            case 'XHTML1.0':
                return '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">' . "\n";
            case 'XHTML1.1':
                return '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">' . "\n";
        }
    }

// End _doctype function

    private function _meta_tags() {
        $meta_tags = "<meta charset='utf-8'/>\n";
        foreach ($this->http_meta_tags as $http => $content) {
            $meta_tags .= '<meta http-equiv="' . $http . '" content="' . $content . '"/>' . "\n";
        }
        foreach ($this->content_meta_tags as $name => $content) {
            $meta_tags .= '<meta name="' . $name . '" content="' . $content . '"/>' . "\n";
        }
        return $meta_tags;
    }

// End _meta_tags function

    private function _stylesheets() {
        $stylesheets = "";
        $id = "";

        if (count($this->external_css) > 0) {
            foreach ($this->external_css as $name => $url) {
              $stylesheets .= '<link rel="stylesheet" href="' . $url . '" type="text/css" ' . $name . ' />' . "\n";
            }
        }

        //$this->_browser_specific_stylesheet();
        foreach ($this->stylesheets as $name => $file) {
            if ($name == "style-default")
                $id = 'id="style_color"';
            $stylesheets .= '<link rel="stylesheet" href="' . $this->css_path . $file . '" type="text/css" ' . $id . ' />' . "\n";
        }
        return $stylesheets;
    }

/// End _stylesheets function

    private function _plugins() {
        $plugins = "";
        //$this->_browser_specific_stylesheet();
        foreach ($this->plugins as $name => $file) {
            $plugins .= '<link rel="stylesheet" href="' . $this->plugin_path . $file . '" type="text/css" media="screen" />' . "\n";
        }
        return $plugins;
    }

/// End PLUGINS function

    private function _javascript_plugins() {
        $javascript_plugins = "";
        //$this->_browser_specific_stylesheet();
        foreach ($this->javascript_plugins as $name => $file) {
            $javascript_plugins .= '<script src="' . $this->plugin_path . $file . '" type="text/javascript" charset="utf-8"></script>' . "\n";
        }

        return $javascript_plugins;
    }

/// End JAVASCRIPT PLUGINS function

    private function _login_javascript_plugins() {
        $javascript_plugins = "";
        //$this->_browser_specific_stylesheet();
        foreach ($this->login_javascript_plugins as $name => $file) {
            $javascript_plugins .= '<script src="' . $this->plugin_path . $file . '" type="text/javascript" charset="utf-8"></script>' . "\n";
        }

        return $javascript_plugins;
    }

/// End JAVASCRIPT PLUGINS function

    private function _bottom_javascripts() {
        $javascript_plugins = "";
        //$this->_browser_specific_stylesheet();
        foreach ($this->bottom_javascripts as $name => $file) {
            $javascript_plugins .= '<script src="' . $this->javascript_path . $file . '" type="text/javascript" charset="utf-8"></script>' . "\n";
        }

        return $javascript_plugins;
    }

/// End JAVASCRIPT PLUGINS function

    private function _login_javascripts() {
        $login_javascripts = "\n";
        //$this->_browser_specific_stylesheet();
        if (count($this->external_js) > 0) {
            foreach ($this->external_js as $name => $url) {
                $login_javascripts .= '<script type="text/javascript" id="' . $name . '" src="' . $url . '"></script>' . "\n";
            }
        }
        $login_javascripts .= '<script type="text/javascript">var ADMIN_URL = "' . ADMIN_URL . '"; </script>' . "\n";
        foreach ($this->login_javascripts as $name => $file) {
            $login_javascripts .= '<script src="' . $this->javascript_path . $file . '" type="text/javascript" charset="utf-8"></script>' . "\n";
        }
        return $login_javascripts;
    }

/// End BOTTOM JAVASCRIPT function

    private function _iejavascript() {
        $javascript_content = "\n";
        $javascript_content .= '<!--[if lte IE 7]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript">
        </script>
        <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7-squish.js"  type="text/javascript">
        </script>
        <![endif]-->';
        return $javascript_content;
    }

    private function _gmap() {
        $javascript_content = "\n";

        $javascript_content .= '<script id="gmapscript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=' . gmapkey . '" type="text/javascript"></script>';
        return $javascript_content;
    }

    private function _javascript() {
        $javascript_content = "\n";

        if (count($this->external_js) > 0) {
            foreach ($this->external_js as $name => $url) {
                $javascript_content .= '<script type="text/javascript" id="' . $name . '" src="' . $url . '"></script>' . "\n";
            }
        }
        $javascript_content .= '<script type="text/javascript">var ADMIN_URL = "' . ADMIN_URL . '"; </script>' . "\n";
        foreach ($this->javascripts as $library => $file) {
            $javascript_content .= '<script src="' . $this->javascript_path . $file . '" type="text/javascript" charset="utf-8"></script>' . "\n";
        }
        return $javascript_content;
    }



    private function _favicon() {
        $favicon = '<link rel="shortcut icon" type="image/x-icon"  href="' . $this->icon_path .'/'.FAVICON .'" />';
        return $favicon;
    }

// End _favicon function

    public function debug() {
        $data = $this->data();
        $info = "";
        foreach ($data as $key => $value) {
            $info .= $key . ' - ' . htmlentities($value) . "<br />";
        }
        return $info;
    }

// End debug function
}

// End Header class.
?>
