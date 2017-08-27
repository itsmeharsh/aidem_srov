<?php
class Payment_model extends Common_model
{

    public $_table = TBL_PAYMENT_MASTER;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

  

    function getPaymentData() {
        
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
     function getBusinessById($id) {
        $result = $this->db->select('name')
                        ->from('business as b')
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

   
    
    

}

?>