<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -----------------------------------------------------
| PROJECT: 	            Basic code igniter structure
| -----------------------------------------------------
| DEVELOPER CODE:		1272
| -----------------------------------------------------
 */
function __autoload($classname) {
	if (strpos($classname, 'CI_') !== 0) {
		$file = APPPATH . 'libraries/' . $classname . '.php';
		if (file_exists($file) && is_file($file)) {
			@include_once $file;
		}
	}
}



$route['404_override'] = 'my404';
$route['under_maintenance'] = "my404/under_maintenance";
$route['noscript'] = "my404/noscript";
$route['admin'] = "admin/dashboard";

$route["default_controller"] = "home";
$route['ws/v(:num)/(:any)'] = 'ws/$2';
$route['ws/v(:num)/(:any)/(:any)'] = 'ws/$2/$3';
$route['ws/v(:num)/(:any)/(:any)/(:any)'] = 'ws/$2/$3/$4';

$route['translate_uri_dashes'] = FALSE;
