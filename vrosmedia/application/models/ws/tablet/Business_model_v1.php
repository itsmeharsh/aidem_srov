<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Business_model_v1 extends MY_Model
{

    protected $_table_name = TBL_EVENT;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct()
    {
        parent::__construct();

    }

    function getData($Limit,$Offset,$cityID)
    {
       
        if($cityID!=''){
         $where=' AND cityID="'.$cityID.'"';
        }else{
            $where='';
        }

        $result = $this->db->query('SELECT * FROM ' . TBL_BUSINESS . '   WHERE deleted="0" '.$where.'  order by  id DESC  LIMIT '.$Offset.','.$Limit.' ');
        // echo $this->db->last_query(); exit; 0,4,8$Offset
        //   echo $this->db->last_query(); exit;

        return $result->result_array();
    }

   function getBusinessCommentData($business_id)
    {
       

        $result = $this->db->query('SELECT * FROM ' . TBL_EVENT_COMMENTS . '   WHERE deleted="0" AND business_id='.$business_id.'  order by  id DESC  ');
        // echo $this->db->last_query(); exit; 0,4,8$Offset
        //   echo $this->db->last_query(); exit;
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
     function getAllImages($id, $columnName)
    {

        $this->db->select('CONCAT("' . DOMAIN_URL . '/", m.media_path) AS image_path,CONCAT("' . DOMAIN_URL . '/", m.video_thumb_path) AS thumb,type,id as media_id')
            ->from(TBL_APP_MEDIA . ' as m')
            ->where('m.' . $columnName . '', $id)
            ->where('m.deleted', '0');

        $result = $this->db->get();

        return $result->result_array();
    }
}
