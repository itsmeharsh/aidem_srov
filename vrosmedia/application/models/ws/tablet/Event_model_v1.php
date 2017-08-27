<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Event_model_v1 extends MY_Model {

    protected $_table_name = TBL_EVENT;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }

    function check_user_event_like($array,$ColumnName) {
        $this->_table_name = TBL_APP_EVENT_LIKE;
        $fields = 'id,'.$ColumnName.'';
        $query = parent::get_single($array, $fields);
        return $query;
    }
   
    function getEvents($Limit,$Offset,$cityID){
        
if($cityID!=''){
         $where=' AND cityID="'.$cityID.'"';
        }else{
            $where='';
        }
        $where='';
        $result = $this->db->query('SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,evt.venue,"event" as type,evt.cover_image AS url,evt.website as ticket_url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,SQRT(
    POW(69.1 * (lat -42.2917), 2) +
    POW(69.1 * (85.5872- lng) * COS(lat / 57.3), 2)) AS distance,"email" as email '
            . '     FROM '.TBL_EVENT.' as evt  WHERE  deleted="0" '.$where.'  order by  id DESC  LIMIT '.$Offset.','.$Limit.'  ');
       //  echo $this->db->last_query(); exit;
        //   echo $this->db->last_query(); exit;
          
        return $result->result_array();
    }
    function CreatedUserData($user_id){
        $this->db->select('u.name')
            ->from(TBL_USER.' as u')
            ->where('u.id',$user_id)
            ->where('u.deleted','0');

        $result = $this->db->get();

        return $result->row_array();
    }
    


}
