<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Ws_Controller extends MY_Controller {
/*
| -----------------------------------------------------
| PROJECT: 	            Basic code igniter structure
| -----------------------------------------------------
| DEVELOPER CODE:		1272
| -----------------------------------------------------
 */

	function __construct() {
		parent::__construct();
		$this->data['version'] = $this->uri->segment(2);
		$this->data['content']['status'] = 412;
                
		$this->data['content']['message'] = $this->lang->language['err_something_went_wrong'];
		$this->load->library('user_agent');
		$this->user_agent = new UserAgent();

		if (CHECK_USER_AGENT) {
			if ($this->user_agent->is_mobile()) {
				$this->data['eDeviceType'] = $this->user_agent->mobile;
				//$this->db->insert('tbl_log', array($this->data['eDeviceType']));
			} else {
				$this->data['content']['status'] = 405;
				$this->data['content']['message'] = $this->lang->language['err_invalid_device'];
				je_mobile($this->data['content']['status'], $this->data['content']['message']);
			}
		}
		if (!in_array($this->input->method(), config_item('http_allowed_method'))) {
			$this->data['content']['status'] = 405;
			$this->data['content']['message'] = $this->lang->language['err_method_not_allowed'];
			je_mobile($this->data['content']['status'], $this->data['content']['message']);
		}

	}

	public function getAuthToken() {
		$vAuthToken = "";
		$headers = getallheaders();
		$token = isset($headers['Vauthtoken']) ? urldecode($headers['Vauthtoken']) : "";

		if (substr($token, 0, 7) === 'Bearer ') {
			$vAuthToken = substr($token, 7);
		}
		return $vAuthToken;
	}

	public function load_version_model($path, $model) {

		if (file_exists(APPPATH . "models/" . $path . EXT)) {
			$this->load->model($path, $model);
		} else {
			$this->data['error'] = $model . ' Model could not load';
		}
	}
}
