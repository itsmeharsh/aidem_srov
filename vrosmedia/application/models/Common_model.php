<?php
  
/**
 * Description of common_model
 *
 * @author Femina Agravat : yudizsolution
 */
class Common_model extends CI_Model {

    //put your code here

    protected $_table;
    protected $_fields;
    protected $_where;
    protected $_table_name = '';
	protected $_primary_key = '';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	public $rules = array();
  
    protected $_except_fields = array();

    function __construct() {
        parent::__construct();
      
    
      
    }

    
    function insertRow($postData = array(), $key = '', $id = '') {
        
        if ($id == '') {
            $id = $this->add($postData);            
        } else {
            $this->_where = array($key => $id);
         $this->Edit($postData);            
        }
       
        return $id;
    }

    function add($PostData) {
         $postArray = $this->getDatabseFields($PostData);

        $query = $this->db->insert($this->_table, $postArray);

   
        if ($this->db->affected_rows() > 0)
            return $this->db->insert_id();
        else
            return '';
    }

    function Edit($PostData) {

        $postArray = $this->getDatabseFields($PostData, $this->_table);

        $query = $this->db->update($this->_table, $postArray, $this->_where);
        //echo $this->db->last_query(); exit;
        if ($query)
            return true;
        else
            return $this->db->_error_message();
    }

    function DeleteRecord($FieldName, $FieldValue, $UpdateData) {

        $this->db->where($FieldName, $FieldValue);
        $this->db->delete($this->_table);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function changeDeleted($FieldName, $FieldValue, $UpdateData = array()) {

        $query = $this->db->query("UPDATE " . $this->_table . " SET deleted = '1' WHERE  " . $FieldName . "=" . $FieldValue);
       
        if ($this->db->affected_rows() > 0)
            return $query;
        else
            return '';
    }

    function changeStatus($FieldName, $FieldValue, $UpdateData = array()) {

        $query = $this->db->query("UPDATE " . $this->_table . " SET active = IF (active = '1', '0','1') WHERE  " . $FieldName . "=" . $FieldValue);
        if ($this->db->affected_rows() > 0)
            return $query;
        else
            return '';
    }

    

    function getFields() {

        $query = $this->db->query("SHOW COLUMNS FROM " . $this->_table);

        foreach ($query->result() as $row)
            $table_fields[$row->Field] = $row->Field;

        return $table_fields;
    }

    function getExceptFields() {
        $query = $this->db->query("SHOW COLUMNS FROM " . $this->_table);
        $this->_fields = array();
        foreach ($query->result() as $row) {
            if (!in_array($row->Field, $this->_except_fields))
                $this->_fields[$row->Field] = $row->Field;
        }

        return implode(",", $this->_fields);
    }

    function getDBDateTime() {

        $result = $this->db->query("SELECT now() as dt");

        if ($result->num_rows() > 0) {
            $row = $result->row_array();
            return $row['dt'];
        } else
            return '';
    }

    public function GetEmailTemplateByID($iTemplateID) {

        $query = $this->db->get_where(TBL_EMAIL_TEMPLATE, array("iTemplateID" => $iTemplateID));

        if ($query->num_rows() > 0)
            return $query->row();
        else
            return '';
    }

    public function CountRecords() {
         $this->db->where($this->_where);
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }

    function get_all() {
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return '';
    }

    function get_many_by() {
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }

    function sendMail($tempId, $toEmail = NULL, $mailBodyArr = array(), $subjectArr = array()) {
        $this->load->library('email');
        $getTemplate = $this->GetEmailTemplateByID($tempId);

        $subjectTxt = $getTemplate->subject;

        if (is_array($subjectArr) && !empty($subjectArr)) {
            foreach ($subjectArr as $key => $val) {
                $subjectTxt = str_replace($key, $val, $subjectTxt);
            }
        }

        /* REPLACE MAIL BODY KEY AND VALUES */
        $strEmail1 = str_replace('\"', '"', $getTemplate->email_body);
        $strEmail1 = str_replace('\r\n', '', $strEmail1);
        $strEmail1 = str_replace('&nbsp;', '', $strEmail1);

        if (is_array($mailBodyArr) && !empty($mailBodyArr)) {
            foreach ($mailBodyArr as $key => $val) {
                $strEmail1 = str_replace($key, $val, $strEmail1);
            }
        }

        $this->email->initialize(unserialize(EMAIL_CONFIG));
        $this->email->set_newline("\r\n");
        $this->email->from($getTemplate->sender_email, $getTemplate->sender_name);
        $this->email->reply_to($getTemplate->reply_email);
        $this->email->to($toEmail);
        $this->email->subject($subjectTxt);
        $this->email->message($strEmail1);
        $this->email->send();
    }

    function getRecordsByID() {
        $result = $this->db->select($this->_fields)
                        ->from($this->_table)
                        ->where($this->_where)
                        ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
    function getDropDown(){
        
         $query = $this->db->select($this->_fields)
                        ->from($this->_table)
                        ->where($this->_where)
                        ->get();      

         
         $column_fileds=explode(',',$this->_fields);

        if ($query->num_rows() > 0){
           
            
             foreach($query->result_array() as $row){
                 
                   $return[$row[$column_fileds[0]]] = $row[$column_fileds[1]];              

             }
             return $return;
        }else{
            return '';
        }
    }
    function getFieldsName()
    {
           $ColumnName=$this->_fields; 

           $this->db->select($ColumnName);
           $this->db->where($this->_where);
           $query=$this->db->get($this->_table);
           return $query->row()->$ColumnName;    

    }
    function getColumnSum(){
      
       $ColumnName=$this->_fields; 
       $this->db->select_sum($ColumnName);
       $this->db->where($this->_where);
       $this->db->from($this->_table);
      
       $query = $this->db->get();
      
   return  $query->row()->$ColumnName;
       
//         /
    }
     public function GetSingleLastRecord(){
        $limit=1;
        $this->db->select($this->_fields, FALSE);
        $this->db->limit($limit);
         $this->db->order_by("iGameTranID","desc");
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return '';
        
      
   }

  
    

    public function getSections()
    {

        $data = array();
        $qry = $this->db->query("SELECT s.id,s.section_name,s.image,s.icon,
            GROUP_CONCAT( r.pagename ORDER BY r.sequence ASC separator ',') as pagename, 
            GROUP_CONCAT( r.title ORDER BY r.sequence ASC separator ',') as title 
            FROM mst_adminsection as s 
            LEFT JOIN (SELECT eUsertype,pagename,title,sectionid,sequence FROM mst_adminrole WHERE isactive = ? ORDER BY sectionid,sequence) as r 
                ON (s.id = r.sectionid) WHERE 
            s.isactive = ? 
            GROUP BY s.id ORDER BY s.`sequence` ASC",array('y','y'));
     
     //   echo $this->db->last_query(); exit;
      
        
        $data['sec_rows'] = $qry->num_rows(); 
        $data['sec_results'] = $qry->result();
        return $data;
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

	public function delete_by_where($array, $limit = 1) {
		$this->db->where($array);
		$this->db->limit($limit);
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
