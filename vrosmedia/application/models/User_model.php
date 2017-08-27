<?php

class User_model extends Common_model
{

   public $_table = TBL_USER;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

     function getUserData() {
        $this->db->select("IF(user_type = 'a' , 'Admin' , 'Driver'),'user_type'",false);         
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
     function getData() {      
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
   function checkUserEmailAvailable($email, $iUserID = '')
    {
        if (isset($iUserID) && $iUserID != '')
            $ucheck = array('email' => $email, 'id <>' => $iUserID,'deleted' => '0');
        else
            $check = array('email' => $email,'deleted' => '0');

        $result = $this->db->get_where(TBL_USER, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);
        
        if ($result->num_rows() >= 1)
            return 0;
        else
            return 1;
    }
    function getFormData($userType){
         if($userType=='u'){
             $moduleName='Applications User';
         }elseif($userType=='d'){
             $moduleName='Drivers';
         }else{
             $moduleName='Admin';
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
            $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);
            $id=parent::insert($postData);           
            
        } else {
            
            // Update here
            $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);
            parent::update($postData, $id);
            
        }
        return $id;
    }
    public function CountRecords($user_id,$tableName) {

        $this->db->where('user_id',$user_id);
        $this->db->where('deleted',0);
        $this->db->from($tableName);
        return $this->db->count_all_results();
    }
    function update_user($data, $id = NULL) {                
		$this->_table_name =TBL_USER;
		parent::update($data, $id);
		return $id;
     }
     
     function getMyBusinessData($postData)
    {     
       
        $result=$this->db->query('SELECT  bns.id,bns.name,bns.location,"business" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(bns.latitude) ) 
* cos( radians(bns.longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(bns.latitude)) ) )
                          AS distance,CONCAT("'.DOMAIN_URL.'/", bns.cover_image) AS url,bns.user_id
                  FROM '.TBL_BUSINESS.'  bns  WHERE bns.deleted="0" AND bns.user_id="'.$postData['user_id'].'"  GROUP BY bns.id ORDER BY distance ASC LIMIT '.$postData['Limit'].'',FALSE);
        
        return $result->result_array();
    }
     function getMyOffersData($postData)
    {


        $result=$this->db->query('SELECT DISTINCT offers.id as offer_id,CONCAT("'.DOMAIN_URL.'/", offers.image_path) AS url,offers.name,offers.location,offers.end_time,offers.business_id,offers.user_id,payment.duration,payment.payment_date,payment.payment_status
                  FROM '.TBL_OFFERS.' as offers  LEFT OUTER JOIN  '.TBL_PAYMENT_MASTER.' as payment  ON offers.business_id=payment.business_id  WHERE offers.deleted="0" AND offers.user_id="'.$postData['user_id'].'"   AND offers.eStatus="1" AND payment.type="offer"  LIMIT '.$postData['Limit'].'',FALSE);
     // echo $this->db->last_query(); exit;
       return $result->result_array();
    }
    

}

?>