<?php
class Taxi_model extends Common_model
{

    public $_table = TBL_EVENT;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }



    function getTaxiCompanyData() {

        $this->db->select($this->_fields, FALSE);
        $this->db->from(TBL_TAXI_COMPANY);
        $this->db->where($this->_where);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
    function getTaxiClassData() {

        $this->db->select($this->_fields, FALSE);
        $this->db->from(TBL_TAXI_CLASS);
        $this->db->where($this->_where);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
    function getCompanyById($id) {
        $result = $this->db->select('*')
            ->from(TBL_TAXI_COMPANY)
            ->where('id',$id)
            ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
    function getClassById($id) {
        $result = $this->db->select('*')
            ->from(TBL_TAXI_CLASS)
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
    function checkCompanyAvailable($company, $id = '')
    {
        if (isset($id) && $id != '')
            $ucheck = array('name' => $company, 'id <>' => $id,'deleted' => '0');
        else
            $check = array('name' => $company,'deleted' => '0');
        $result = $this->db->get_where(TBL_TAXI_COMPANY, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);
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
        $result = $this->db->get_where(TBL_TAXI_CLASS, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);
        if ($result->num_rows() >= 1)
            return 0;
        else
            return 1;
    }

    public function insertCompanyData($postData = array(), $key = '', $id = '') {

        if ($id == NULL) {
            // Insert Here
           // $postArray = $this->general_model->getDatabseFields($postData, TBL_TAXI_COMPANY);
            $id = $this->add($postData);

        } else {
            // Update here

            //$postArray = $this->general_model->getDatabseFields($postData, TBL_TAXI_COMPANY);
            $this->_where = array($key => $id);
            $id = $this->Edit($postData);

        }
        return $id;
    }
    public function insertClassData($postData = array(), $key = '', $id = '') {
        if ($id == NULL) {
            // Insert Here
            //$postArray = $this->general_model->getDatabseFields($postData, TBL_TAXI_CLASS);
            $id = $this->add($postData);

        } else {
            // Update here
           // $postArray = $this->general_model->getDatabseFields($postData, TBL_TAXI_CLASS);
            $this->_where = array($key => $id);
            $id = $this->Edit($postData);
        }
        return $id;
    }





}

?>