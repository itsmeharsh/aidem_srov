<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ads_model_v1 extends MY_Model {

    protected $_table_name = TBL_ADVERTISMENT;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }
    function get_adsData($limit,$start,$cityID=''){
        if($cityID!=''){
         $where=' AND cityID="'.$cityID.'"';
        }else{
            $where='';
        }
        // LIMIT '.$limit.' OFFSET '.$start.'
        $result=$this->db->query('SELECT ads.id as id,ads.time,CONCAT("'.DOMAIN_URL.'/", ads.image) AS image,CONCAT("'.DOMAIN_URL.'/", ads.image_footer) AS image_footer,ads.title,ads.is_special as special,ads.description,ads.cityID,ads.start_time,ads.end_time as enddate,ads.business_id,ads.is_completed,ads.address,ads.phone,ads.email,ads.lat as latitude,ads.lng as longitude,ads.user_id,ads.ads_type,payment.duration,payment.payment_date,payment.transaction_id,payment.payment_status
                  FROM '.TBL_ADVERTISMENT.' as ads  LEFT JOIN  '.TBL_PAYMENT_MASTER.' as payment  ON ads.business_id=payment.business_id  WHERE ads.deleted="0" AND ads.is_completed="1" AND payment.type="ads"  AND payment_status="approved" '.$where.'  ',FALSE);
         
        return $result->result_array();
       
    }







}
