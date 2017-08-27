<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Countads_model_v1 extends MY_Model {

    protected $_table_name = TBL_ADVERTISMENT_REVENUE;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }
     function add_ads_count($user_id,$ads_id,$offer_id,$type,$date,$business_id) {   
               $data=array(
                   "ads_id"=>$ads_id,
                   "offer_id"=>$offer_id,
                   "business_id"=>$business_id,
                   "user_id"=>$user_id,
                   "clicks"=>1,
                   "date"=>$date,
                   "eStatus"=>1,
                   "type"=>$type,
                   "deleted"=>0
               );
             
                 $this->_table_name = TBL_ADVERTISMENT_REVENUE;
                return parent::insert($data);
        }

 

}
