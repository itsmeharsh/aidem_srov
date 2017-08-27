<?php
class News_model extends Common_model
{

    public $_table = TBL_NEWS;
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

        $this->db->select($this->_fields, FALSE);
        $this->db->from(TBL_NEWS_CATEGORY);
        $this->db->where($this->_where);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
    function getNewsData() {

        $this->db->select($this->_fields, FALSE);
        $this->db->from(TBL_NEWS);
        $this->db->where($this->_where);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
    function getCategoryById($id) {
        $result = $this->db->select('*')
            ->from(TBL_NEWS_CATEGORY)
            ->where('id',$id)
            ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
    function getNewsById($id) {
        $result = $this->db->select('*')
            ->from(TBL_NEWS)
            ->where('id',$id)
            ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
  
    function getUserById($id) {
        $result = $this->db->select('name')
            ->from(TBL_USER)
            ->where('id',$id)
            ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
    function checkCategoryAvailable($company, $id = '')
    {
        if (isset($id) && $id != '')
            $ucheck = array('name' => $company, 'id <>' => $id,'deleted' => '0');
        else
            $check = array('name' => $company,'deleted' => '0');
        $result = $this->db->get_where(TBL_NEWS_CATEGORY, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);
        if ($result->num_rows() >= 1)
            return 0;
        else
            return 1;
    }

    function checkClassAvailable($class, $id = '')
    {
        if (isset($id) && $id != '')
            $ucheck = array('name' => $class, 'id <>' => $id,'deleted' => '0');
        else
            $check = array('name' => $class,'deleted' => '0');
        $result = $this->db->get_where(TBL_NEWS, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);
        if ($result->num_rows() >= 1)
            return 0;
        else
            return 1;
    }

    public function insertCategoryData($postData = array(), $key = '', $id = '') {

        if ($id == NULL) {
            // Insert Here
            // $postArray = $this->general_model->getDatabseFields($postData, TBL_News_COMPANY);
            $id = $this->add($postData);

        } else {
            // Update here

            //$postArray = $this->general_model->getDatabseFields($postData, TBL_News_COMPANY);
            $this->_where = array($key => $id);
            $id = $this->Edit($postData);

        }
        return $id;
    }
    public function insertNewsData($postData = array(), $key = '', $id = '') {
        if ($id == NULL) {
            // Insert Here
            //$postArray = $this->general_model->getDatabseFields($postData, TBL_News_CLASS);
            $id = $this->add($postData);

        } else {
            // Update here
            // $postArray = $this->general_model->getDatabseFields($postData, TBL_News_CLASS);
            $this->_where = array($key => $id);
           $this->Edit($postData);
        }
        return $id;
    }





}

?>