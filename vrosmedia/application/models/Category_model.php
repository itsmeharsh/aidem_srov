<?php

class Category_model extends Common_model
{
    public $_table = TBL_CATEGORY;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

     function getCategoryData() {
        $this->db->select("IF(type = '1' , 1 , 2),'type'",false);
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
   function checkCategoryAvailable($category, $iCatID = '',$type)
    {
        if (isset($iCatID) && $iCatID != '')
            $ucheck = array('name' => $category, 'id <>' => $iCatID,'deleted' => '0','type'=>$type);
        else
            $check = array('name' => $category,'deleted' => '0');
        $result = $this->db->get_where(TBL_CATEGORY, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);
        if ($result->num_rows() >= 1)
            return 0;
        else
            return 1;
    }
    function getFormData($Type){
         if($Type=='1'){
             $moduleName='Business category';
         }elseif($Type=='2'){
             $moduleName='Event category';
         }
         $where=array('vTitle'=>$moduleName,'eDelete'=>'0','eStatus'=>'Active');
         $this->db->from(TBL_FORMS);
         $this->db->where('vTitle', $moduleName);
         $this->db ->join(TBL_FORM_FIELDS,TBL_FORMS.'.iFormID='.TBL_FORM_FIELDS.'.iFromID');        
         $query = $this->db->get(); 
         if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
    public function insertData($postData = array(), $key = '', $id = '') {
        if ($id == NULL) {            
            // Insert Here            
            $postArray = $this->general_model->getDatabseFields($postData, TBL_CATEGORY);
            $id=parent::insert($postData);           
            
        } else {
            // Update here
            $postArray = $this->general_model->getDatabseFields($postData, TBL_CATEGORY);
            parent::update($postData, $id);
        }
        return $id;
    }
    function update_category($data, $id = NULL) {                
        $this->_table_name =TBL_CATEGORY;
        parent::update($data, $id);
        return $id;
    }
}

?>