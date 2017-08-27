<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Feedback_model_v1 extends MY_Model {

    protected $_table_name = TBL_FEEDBACK;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }
    function get_FeedbackData($limit,$start,$cityID='',$userid=''){
        if($cityID!=''){
         $where=' AND u.city="'.$cityID.'"';
        }else{
            $where='';
        }
        $result=$this->db->query('SELECT *
                  FROM '.TBL_FEEDBACK.' as fd  LEFT JOIN  '.TBL_USER.' as u  ON fd.driver_id=u.id  WHERE fd.deleted="0" AND fd.driver_id='.$userid.'   '.$where.'  LIMIT '.$limit.' OFFSET '.$start.' ',FALSE);
        return $result->result_array();
    }
     function CreatedUserData($user_id){
        $this->db->select('*')
            ->from(TBL_USER.' as u')
            ->where('u.id',$user_id)
            ->where('u.deleted','0');

        $result = $this->db->get();

        return $result->row_array();
    }







}
