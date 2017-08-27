<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Setting_model_v1 extends MY_Model {

	protected $_table_name = TBL_PRICELISTS_TB;
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "id";

	function __construct() {
		parent::__construct();

	}

	
	function get_prices($postData) {
           
		$this->db->select('id,type,duration_in_days,price,ads_type,time')
			->from($this->_table_name)
			->where('deleted', $postData['deleted']);


		return $this->db->get()->result();
	}

    function get_city_data() {

        $this->db->select('id,name')
            ->from(TBL_CITY)
            ->where('deleted', '0');


        return $this->db->get()->result();
    }
    function get_notification_data($postData){
            
               $Limit = $postData['Limit'];
               $Offset = $postData['Offset'];  
               
               
               $Offset = ($Offset - 1) * $Limit;
        
               $user_id = $postData['user_id'];
        
                
                  $result = $this->db->query(' SELECT id,title,message,type,redirect_id,is_status, case  when image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", image) else image end  as image
                 FROM '.TBL_NOTIFICATION_MASTER.' WHERE is_status=1 AND  deleted=0 AND eStatus=1 AND user_id='.$user_id.'   order by id DESC  LIMIT '.$Offset.','.$Limit.'  ');
// echo $this->db->last_query(); exit;
               return $result->result_array();
        }
        public function CountNotificationRecords($user_id) {
       
                 
                $result = $this->db->query(' SELECT COUNT(id) as notification_count  FROM '.TBL_NOTIFICATION_MASTER.' WHERE deleted=0 AND eStatus=1 AND user_id='.$user_id.' and is_status=1');
// echo $this->db->last_query(); exit;
               return $result->result_array();
        }
       
         function update_notification_count($notification_id,$user_id) {   
               $result=$this->db->query('UPDATE '.TBL_NOTIFICATION_MASTER.' SET is_status=0 WHERE id='.$notification_id.' AND user_id='.$user_id.'');             
	       return 1;
        }
         function add_ads_count($user_id,$business_id,$type,$date,$dataType='') {   

               $data=array(
                   "ads_id"=>0,
                   $dataType=>$business_id,
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
          function update_all_notification_count($user_id) {   
               $result=$this->db->query('UPDATE '.TBL_NOTIFICATION_MASTER.' SET is_status=0 WHERE  user_id='.$user_id.'');             
	       return 1;
        }
    function UserSingleUserDetail($array,$fields){
        $this->_table_name = TBL_USER;
        $fields = 'id as user_id,name,deviceid,is_notification';
        $query = parent::get_single($array, $fields);
        return $query;

    }
	

}
