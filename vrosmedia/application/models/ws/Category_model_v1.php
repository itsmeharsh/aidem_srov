<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Category_model_v1 extends MY_Model {
	protected $_table_name = TBL_CATEGORY;
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "id";
	function __construct() {
		parent::__construct();
	}

	function get_categories($postData) {
		$this->db->select('id,name,CONCAT("'.DOMAIN_URL.'/", image) AS image')
			->from($this->_table_name)
			->where($postData)
			->order_by('name','asc');
		return $this->db->get()->result();
	}

	function insert_category($array) {
		$array['dUpdatedDate'] = date('Y-m-d H:i:s');
		return parent::insert($array);
	}

	function update_category($data, $id = NULL) {
		$array['dUpdatedDate'] = date('Y-m-d H:i:s');
		parent::update($data, $id);
		return $id;
	}
}