<?php
class Setting_model extends Common_model
{


    public $_table = TBL_PRICELISTS_TB;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }



    function getPriceData() {

        $this->db->select($this->_fields, FALSE);
        $this->db->from(TBL_PRICELISTS_TB);
        $this->db->where($this->_where);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }

    function getPriceById($id) {
        $result = $this->db->select('*')
            ->from(TBL_PRICELISTS_TB)
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
    function checkPriceAvailable($name, $id = '',$type)
    {
        if (isset($id) && $id != '')
            $ucheck = array('type' => $name, 'id <>' => $id,'deleted' => '0','ads_type'=>$type);
        else
            $check = array('type' => $name,'deleted' => '0');
        $result = $this->db->get_where(TBL_PRICELISTS_TB, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);
        if ($result->num_rows() >= 1)
            return 0;
        else
            return 1;
    }



    public function insertPriceData($postData = array(), $key = '', $id = '') {
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
    
    /*-----------------city----------------------------- */
     function getCityData() {

        $this->db->select($this->_fields, FALSE);
        $this->db->from(TBL_CITY);
        $this->db->where($this->_where);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }

    function getCityById($id) {
        $result = $this->db->select('*')
            ->from(TBL_CITY)
            ->where('id',$id)
            ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }

   



    public function insertCityData($postData = array(), $key = '', $id = '') {
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