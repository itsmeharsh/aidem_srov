<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Setting_model_v1 extends MY_Model {

	protected $_table_name = TBL_CITY;
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "id";

	function __construct() {
		parent::__construct();

	}

	
	function get_city_data() {
           
		$this->db->select('id,name')
			->from($this->_table_name)
			->where('deleted', '0');


		return $this->db->get()->result();
	}

	

}
