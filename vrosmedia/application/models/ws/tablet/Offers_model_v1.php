<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Offers_model_v1 extends MY_Model {

    protected $_table_name = TBL_OFFERS;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }
    function get_offersData($limit,$start,$cityID=''){
        if($cityID!=''){
         $where=' AND cityID="'.$cityID.'"';
        }else{
            $where='';
        }
        $result=$this->db->query('SELECT offer.*,payment.duration,payment.payment_date,payment.amount,payment.transaction_id,payment.payment_status,payment.timestamp
                  FROM '.TBL_OFFERS.' as offer  LEFT JOIN  '.TBL_PAYMENT_MASTER.' as payment  ON offer.business_id=payment.business_id  WHERE offer.deleted="0" AND payment.type="offer"  AND payment_status="approved" '.$where.' ORDER BY offer.id DESC   LIMIT '.$limit.' OFFSET '.$start.' ',FALSE);
        return $result->result_array();
    }







}
