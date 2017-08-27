<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/*
| -----------------------------------------------------
| PROJECT: 	            Basic code igniter structure
| -----------------------------------------------------
| DEVELOPER CODE:		1272
| -----------------------------------------------------
 */

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = '';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	public $rules = array();

	function __construct() {
		parent::__construct();
	}

	public function get($id = NULL, $single = FALSE, $fields = '*') {

		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		} elseif ($single == TRUE) {
			$method = 'row';
		} else {
			$method = 'result';
		}

		$this->db->order_by($this->_order_by);

		return $this->db->get($this->_table_name)->$method();
	}

	function get_order_by($array = NULL) {
		if ($array != NULL) {
			$this->db->select()->from($this->_table_name)->where($array)->order_by($this->_order_by);
			$query = $this->db->get();
			return $query->result();
		} else {
			$this->db->select()->from($this->_table_name)->order_by($this->_order_by);
			$query = $this->db->get();
			return $query->result();
		}
	}

	function get_single($array = NULL, $fields = '*') {

		if ($array != NULL) {
			$this->db->select($fields)->from($this->_table_name)->where($array);
			$query = $this->db->get();
			return $query->row();
		} else {
			$this->db->select($fields)->from($this->_table_name)->order_by($this->_order_by);
			$query = $this->db->get();
			return $query->result();
		}
	}

	function insert($array) {
                 
		$array = $this->getDatabseFields($array, $this->_table_name);

		$this->db->insert($this->_table_name, $array);
		$id = $this->db->insert_id();
		return $id;
	}
        function insert_log($array) {
                                 
                 $data= array(
                 'post_data'=>serialize($array), 
                 );

               $this->db->insert($this->_table_name, $data);
               //$id = $this->db->insert_id();
		//return $id;

	}


	function update($data, $id = NULL) {

		$filter = $this->_primary_filter;
		$id = $filter($id);
		$data = $this->getDatabseFields($data, $this->_table_name);
		$this->db->set($data);
		$this->db->where($this->_primary_key, $id);
		$this->db->update($this->_table_name);

	}
       

	public function getDatabseFields($postData, $tableName = '') {
		if (empty($tableName)) {
			$tableName = $this->_table;
		}

		$table_fields = $this->getFields($tableName);

		$final = array_intersect_key($postData, $table_fields);

		return $final;
	}

	public function getFields($tableName = '') {

		$query = $this->db->query("SHOW COLUMNS FROM " . $tableName);

		foreach ($query->result() as $row) {
			$table_fields[$row->Field] = $row->Field;
		}

		return $table_fields;
	}

	public function delete($id) {
		$filter = $this->_primary_filter;
		$id = $filter($id);

		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}

	public function delete_by_where($array) {
		$this->db->where($array);
		$this->db->delete($this->_table_name);
	}
	public function hash($string) {
		return hash("sha512", $string . config_item("encryption_key"));
	}
        public function get_paginate_data($array=NULL,$limit){
            
               if ($array != NULL) {
			$this->db->select()->from($this->_table_name)->where($array)->order_by($this->_order_by)->limit($limit);
			$query = $this->db->get();
			return $query->result();
		} else {
			$this->db->select()->from($this->_table_name)->order_by($this->_order_by)->limit($limit);
			$query = $this->db->get();
			return $query->result();
		}
        }
}
