<?php

class Article_model extends Common_model
{

    public $_table = TBL_ARTICLE;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'article_id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

    function getBusCat() {
        $this->db->select("id,name,image",FALSE);         
        $this->db->from('category');
        $this->db->where(array('active'=> 1,'deleted' => 0));
        $this->db->where('type',1);
        $this->db->order_by('name','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getArticleData() {
        
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }

    function changeStatus($FieldName, $FieldValue, $UpdateData = array()) {
        $query = $this->db->query("UPDATE " . $this->_table . " SET eStatus = IF (eStatus = 'Active', 'Inactive','Active') WHERE  " . $FieldName . "=" . $FieldValue);
        if ($this->db->affected_rows() > 0)
            return $query;
        else
            return '';
    }

    function changeDeleted($FieldName, $FieldValue, $UpdateData = array()) {
        $query = $this->db->query("UPDATE " . $this->_table . " SET eDelete = '1' WHERE  " . $FieldName . "=" . $FieldValue);
        if ($this->db->affected_rows() > 0)
            return $query;
        else
            return '';
    }

    function getArticleById() {
        $result = $this->db->select('a.*')
                        ->from('tbl_articles as a')
                        ->where($this->_where)
                        ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }

    function update_image($postData = array()) { 
        $this->db->insert('app_media',$postData);  
    }
}
?>