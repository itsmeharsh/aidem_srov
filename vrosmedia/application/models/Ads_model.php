<?php

class Ads_model extends Common_model
{

    public $_table = TBL_ADVERTISMENT;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

  

    function getAdsData() {
        
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
    function getAdsById($id) {
        $result = $this->db->select('*')
            ->from($this->_table)
            ->where('id',$id)
            ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
    function getBusinessData() {

        $this->db->select('id,name');
        $this->db->from(TBL_BUSINESS);
        $this->db->where(array("deleted" =>'0'));

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
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
     function getPaymentData($business_id) {
        $result = $this->db->select('*')
                        ->from('payment_master_tb')
                        ->where('business_id',$business_id)
                         ->where('type','ads')
                        ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
    
     /*------------------------------------------------------------ Ads Detail View   ----------------------------------------------------- */
      function get_ads_details($ads_id)
    {


        $result = $this->db->query('SELECT ads.id as ads_id,CONCAT("' . DOMAIN_URL . '/", ads.image) AS url,ads.title as name,ads.description,ads.deleted,ads.eStatus,ads.start_time,ads.end_time,ads.business_id,ads.totalclicks,ads.user_id,payment.duration,payment.payment_date,payment.payment_status
                  FROM ' . TBL_ADVERTISMENT . ' as ads  LEFT JOIN  ' . TBL_PAYMENT_MASTER . ' as payment  ON ads.business_id=payment.business_id  WHERE  ads.id="'.$ads_id.'" AND payment.type="ads"', FALSE);
        return $result->row_array();
    }
     
     function CreatedUserData($user_id)
    {
        $this->db->select('u.id as user_id,u.deviceid,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage')
            ->from(TBL_USER . ' as u')
            ->where('u.id', $user_id)
            ->where('u.deleted', '0');

        $result = $this->db->get();

        return $result->result_array();
    }
      function add_notification_data($postData) {
		 $this->_table_name = TBL_NOTIFICATION_MASTER;
		   return parent::insert($postData);
               
	     }
      function getDetailBusinessData($business_id)
    {

        $this->db->select('bns.id,bns.user_id,bns.address,bns.name AS title,CONCAT("' . DOMAIN_URL . '/", bns.cover_image) AS url', FALSE)
            ->from(TBL_BUSINESS . ' as bns');


        $this->db->where('bns.deleted', '0');
        $this->db->where('bns.id', $business_id);

        $result = $this->db->get();

        return $result->row_array();
    }
    function create_business_ads($postData, $row_id = '')
    {
        $this->_table_name = TBL_ADVERTISMENT;
        if ($row_id != '') {
            parent::update($postData, $row_id);
        } else {
            $postData['deleted'] = 0;
            $row_id = parent::insert($postData);
        }

        return $row_id;

    }
    function check_ads_exists($business_id)
    {

        $this->db->select('id')
            ->from(TBL_ADVERTISMENT );


        $this->db->where('deleted', '0');
        $this->db->where('eStatus', '0');
        $this->db->where('business_id', $business_id);

        $result = $this->db->get();

        return $result->row_array();
    }
    function add_business_payment($postData, $row_id = '')
    {
        $this->_table = TBL_PAYMENT_MASTER;
        if ($row_id == NULL) {  
            $postData['deleted'] = 0;          //  $row_id = parent::insert($postData);
            $row_id = $this->add($postData);
        } else {            
            $this->db->where('id',$row_id);
            $this->db->update(TBL_PAYMENT_MASTER,$postData);                  

        }
        
       
        return $row_id;
    }











}

?>