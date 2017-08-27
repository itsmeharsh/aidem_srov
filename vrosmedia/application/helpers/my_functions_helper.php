<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('deleteFile')) {

	function deleteFile($path = "", $empty = false) {
		$CI = &get_instance();
		if ($path != "") {
			$CI->load->helper("file");
			delete_files($path, $empty);
			if ($empty) {
				@rmdir($path);
			}
		}
	}

}
if (!function_exists('dateDisplay')) {

	function dateDisplay($date = "", $timestamp = false, $format = "Y-m-d", $utc = "") {
		if ($date != "" && $date != "0000-00-00" && $date != "0000-00-00 00:00:00") {
			if (!$timestamp) {
				$date = strtotime($date);
			}
			if ($utc != "") {
				return date($format, ($date)) . $utc;
			} else {
				return date($format, ($date));
			}
		} else {
			return "";
		}

	}

}
if (!function_exists('get_date')) {

	function get_date() {
		return gmdate('Y-m-d H:i:s +0000');
	}

}
if (!function_exists('proper_link')) {

	function proper_link($link) {
		return rtrim($link, '/');
	}

}

function checkImage($id = 0, $filepath = "", $default = false, $zc = 1, $ql = 100, $timthumb = false) {

	$CI = &get_instance();
	$src = "";
	if ($default) {
		$src = SITE_UPD . "no_image_available.jpg";
	}

	$q = $CI->db->select()->from('mst_image_thumbs')->where(array('iThumbId' => $id))->get();
	if ($q->num_rows() > 0) {
		$r = $q->row_array();
		$src = SITE_UPD . $filepath;
		if (!is_file(FCPATH . SITE_UPD . $filepath)) {
			$src = $default ? $src = SITE_UPD . $r['vFolder'] . '/' . $r['vDefaultImage'] : "";
		}
	}
	if ($src != "") {
		if ($timthumb) {
			$src = base_url() . "image-thumb.php?w=" . $r['iWidth'] . "&h=" . $r['iHeight'] . "&zc=" . $zc . "&q=" . $ql . "&src=" . $src;
		}

	}
	return $src;
}
if (!function_exists('max_image_size')) {

	function max_image_size($folder = '') {
		$CI = &get_instance();
		$content = array('width' => 100, 'height' => 100);
		$q = $CI->db->query('SELECT MAX(height) as height ,MAX(width) as width FROM mst_imagethumb WHERE folder = ?', array($folder));
		if ($q->num_rows() > 0) {
			$r = $q->row();
			$content['width'] = $r->width;
			$content['height'] = $r->height;
		}
		return $content;
	}

}
if (!function_exists('empty_dir')) {

	function empty_dir($dir = "", $remove_dir = true, $exclude = array()) {
		$dir = rtrim($dir, '/') . '/';
		if (file_exists($dir)) {
			$files = array_diff(scandir($dir), array('.', '..'));
			foreach ($files as $value) {
				if (!in_array($value, $exclude)) {
					(is_dir($dir . $value) ? empty_dir($dir . $value) : (@unlink($dir . $value)));
				}

			}
			if ($remove_dir) {
				@rmdir($dir);
			}

		}
	}

}

if (!function_exists('unlink_file')) {

	function unlink_file($files = "") {
		if (is_array($files)) {
			foreach ($files as $file) {
				unlink_file($file);
			}
		} else {
			if (is_file($files)) {
				@unlink($files);
			}
		}
	}

}
if (!function_exists('mb_truncate')) {
	function mb_truncate($str, $limit) {
		return mb_substr(strip_tags($str), 0, $limit, 'UTF-8') . (mb_strlen($str) > $limit ? '...' : '');
	}
}
if (!function_exists('age')) {
	function age($dob = "") {
		$from = new DateTime($dob);
		$to = new DateTime('today');
		return $from->diff($to)->y;
	}
}

if (!function_exists('je_mobile')) {
    
         function je_mobile($data)
        {
            header('Content-Type: application/json');
            if (is_array($data)){           
                $data=json_encode($data);
                $data = str_replace("null",'""',$data);           
             }else{
                $data=json_encode($data);
                $data = str_replace("null",'""',$data);
             
             }
           
            echo $data;
            exit;
        }

	

}

if (!function_exists('pre')) {

	function pre($arg) {
		echo "<pre>";
		print_r($arg);
		echo "</pre>";
		die();
	}

}
if (!function_exists('get_date')) {
	function get_date() {
		return date('Y-m-d H:i:s');
	}
}

if (!function_exists('http_response_code')) {
	function http_response_code($code = NULL) {
		$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
		if ($code !== NULL) {
			switch ($code) {
			case 100:$text = 'Continue';
				break;
			case 101:$text = 'Switching Protocols';
				break;
			case 200:$text = 'OK';
				break;
			case 201:$text = 'Created';
				break;
			case 202:$text = 'Accepted';
				break;
			case 203:$text = 'Non-Authoritative Information';
				break;
			case 204:$text = 'No Content';
				break;
			case 205:$text = 'Reset Content';
				break;
			case 206:$text = 'Partial Content';
				break;
			case 300:$text = 'Multiple Choices';
				break;
			case 301:$text = 'Moved Permanently';
				break;
			case 302:$text = 'Moved Temporarily';
				break;
			case 303:$text = 'See Other';
				break;
			case 304:$text = 'Not Modified';
				break;
			case 305:$text = 'Use Proxy';
				break;
			case 400:$text = 'Bad Request';
				break;
			case 401:$text = 'Unauthorized';
				break;
			case 402:$text = 'Payment Required';
				break;
			case 403:$text = 'Forbidden';
				break;
			case 404:$text = 'Not Found';
				break;
			case 405:$text = 'Method Not Allowed';
				break;
			case 406:$text = 'Not Acceptable';
				break;
			case 407:$text = 'Proxy Authentication Required';
				break;
			case 408:$text = 'Request Time-out';
				break;
			case 409:$text = 'Conflict';
				break;
			case 410:$text = 'Gone';
				break;
			case 411:$text = 'Length Required';
				break;
			case 412:$text = 'Precondition Failed';
				break;
			case 413:$text = 'Request Entity Too Large';
				break;
			case 414:$text = 'Request-URI Too Large';
				break;
			case 415:$text = 'Unsupported Media Type';
				break;
			case 500:$text = 'Internal Server Error';
				break;
			case 501:$text = 'Not Implemented';
				break;
			case 502:$text = 'Bad Gateway';
				break;
			case 503:$text = 'Service Unavailable';
				break;
			case 504:$text = 'Gateway Time-out';
				break;
			case 505:$text = 'HTTP Version not supported';
				break;
			default:
				exit('Unknown http status code "' . htmlentities($code) . '"');
				break;
			}

			header($protocol . ' ' . $code . ' ' . $text);

		}

	}

}
if (!function_exists('null2empty')) {
	function null2empty($array = NULL) {
		if (is_array($array)) {
			foreach ($array as $k => $v) {
				$array['$k'] = is_null($v) ? "" : $v;
			}
		} else if (is_object($array)) {
			foreach ($array as $k => $v) {
				$array->$k = is_null($v) ? "" : $v;
			}
		}
		return $array;
	}
}
if (!function_exists('random_number')) {
	function random_number($length = 8) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$random = substr(str_shuffle($chars), 0, $length - 1);
		return $random;
	}
}
function get_column($table) {
	$r = new stdClass();
	$CI = &get_instance();
	$q = $CI->db->query('SHOW COLUMNS FROM ' . $table)->result();
	foreach ($q as $key => $value) {
		$r->{$value->Field} = "";
	}
	return $r;
}