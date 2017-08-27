<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Setting_module extends MY_Model {

	protected $_table_name = 'mst_site_settings';
	protected $_primary_key = 'iFieldId';
	protected $_primary_filter = 'intval';
	protected $_order_by = "";

	function __construct() {
		parent::__construct();
	}

	function set_setting($array = NULL, $signal = FALSE) {
		$query = parent::get($array, $signal);
		foreach ($query as $k => $v) {
			$result[$v->vConstant] = $v->vValue;
		}
		return $result;
	}

	function get_setting($array = NULL, $signal = FALSE) {
		$query = parent::get($array, $signal);

		return $query;
	}

	function get_order_by_setting($array = NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_setting($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_setting($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_setting($id) {
		parent::delete_data($id);
	}

}
