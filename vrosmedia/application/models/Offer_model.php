<?php

class Offer_model extends Common_model
{

    public $_table = TBL_OFFERS;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
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

    function getOfferData() {
        
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
     function getPaymentData($business_id) {
        $result = $this->db->select('*')
                        ->from('payment_master_tb')
                        ->where('business_id',$business_id)
                         ->where('type','offer')
                        ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }

     
       
     public function insertData($postData = array(), $key = '', $id = '') {

        if ($id == NULL) {            
            // Insert Here            
            $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);
            $id=parent::insert($postData);           
            
        } else {
            
            // Update here
            $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);
            parent::update($postData, $id);
            
        }
        return $id;
    }
    
     /*------------------------------------------------------------ Offer Detail View   ----------------------------------------------------- */
      function get_offers_details($offer_id)
    {


        $result = $this->db->query('SELECT offers.id as offer_id,CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.name,offers.description,offers.deleted,offers.eStatus,offers.start_time,offers.end_time,offers.business_id,offers.totallike,offers.totalshare,offers.user_id,offers.totalfavorite,payment.duration,payment.payment_date,payment.payment_status
                  FROM ' . TBL_OFFERS . ' as offers  LEFT JOIN  ' . TBL_PAYMENT_MASTER . ' as payment  ON offers.business_id=payment.business_id  WHERE  offers.id="'.$offer_id.'" AND payment.type="offer"', FALSE);
        return $result->row_array();
    }
      function get_offer_comments($offer_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_COMMENTS . ' as c', "c.user_id = u.id", 'LEFT', FALSE)
            ->join(TBL_APP_EVENT_LIKE . ' as lk', "(lk.offer_id = c.offer_id) AND (lk.user_id = c.user_id)", 'LEFT', FALSE)
            ->where('c.offer_id', $offer_id)
            ->where('c.deleted', '0')
            ->order_by("c.id", "DESC")
            ->Limit(3);

        $result = $this->db->get();
        //  echo $this->db->last_query(); exit;
        return $result->result_array();
    }
     function getOfferLikedUsers($offer_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_share,l.is_favourite')
            ->from(TBL_USER . ' as u')
            ->join(TBL_APP_EVENT_LIKE . ' as l', "l.user_id = u.id", 'LEFT', FALSE)
            ->where('l.offer_id', $offer_id)
            ->where('l.deleted', '0')
            ->LIMIT(10);

        $result = $this->db->get();

        return $result->result_array();
    }
     function CreatedUserData($user_id)
    {
        $this->db->select('u.id as user_id,u.name,u.deviceid,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage')
            ->from(TBL_USER . ' as u')
            ->where('u.id', $user_id)
            ->where('u.deleted', '0');

        $result = $this->db->get();

        return $result->result_array();
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
     function add_notification_data($postData) {
		 $this->_table_name = TBL_NOTIFICATION_MASTER;
		   return parent::insert($postData);
               
    }
    function create_business_offers($postData, $row_id = '')
    {
        $this->_table_name = TBL_OFFERS;
        if ($row_id != '') {
            parent::update($postData, $row_id);
        } else {
            $postData['deleted'] = 0;
            $row_id = parent::insert($postData);
        }

        return $row_id;

    }

   function changeDeleted($id='',$del_id='')
    {
        $value=array('deleted'=>'1');
        $this->db->where('id',$del_id);
        if( $this->db->update(TBL_ADVERTISMENT,$value))
        {
           return true;
        }
    }

  
    
    

}

?>