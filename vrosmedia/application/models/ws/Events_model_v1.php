<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Events_model_v1 extends MY_Model {

    protected $_table_name = event_log;
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
    function check_event_attendee($array){
        $this->_table_name=TBL_EVENT_ATTENDEE;
        $fields = 'id';
        $query = parent::get_single($array, $fields);
        return $query;

    }
    function AddEventAttendee($postData = array()){
        $this->_table_name=TBL_EVENT_ATTENDEE;
        $id=parent::insert($postData);
        return $id;

    }
    function DoEventLike($postData = array(), $id = '') {

        $this->_table_name = TBL_APP_EVENT_LIKE;
        if ($id == NULL) {
            // Insert Here                   
            $id=parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }
        return $id;
    }
    function UpdateCount($ColumnName,$count,$eventID=''){

        $this->db->set($ColumnName,$ColumnName.'+' .$count, FALSE);
        $this->db->where('id', $eventID);
        $this->db->update(TBL_EVENT);

        return true;
    }

    function check_event_comment($array,$ColumnName){
        $this->_table_name = TBL_EVENT_COMMENTS;
        $fields = 'id,'.$ColumnName.'';
        $query = parent::get_single($array, $fields);
        return $query;
    }
    function add_comments($postData,$id = ''){

        $this->_table_name =TBL_EVENT_COMMENTS;

        if ($id == NULL) {
            // Insert Here                   
            $postData['deleted']=0;
            $id=parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }

        return $id;
    }
    function insert_data_eventlog($array) {
                
                $this->db->insert('event_log',$array);
                return true;
	}
    function getEvents($postData){
         
        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];




        $Offset = (($Offset-1)*$Limit);
        //$Limit   =  $Limit;



        $DistanceType = $postData['DistanceType'];
        if($DistanceType=='Mile'){
            $iRadiant=3959;
        }else{
            $iRadiant=6371;
        }

        if ($postData['searchKey']!='') {
            $searchKey =$postData['searchKey'];
        } else {
            $searchKey='';
        }

//        $result = $this->db->query('SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,evt.venue,"event" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) ) 
//* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
//                        AS distance,evt.cover_image AS url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,"email" as email '
//            . '     FROM '.TBL_EVENT.' as evt WHERE  evt.title LIKE "%' . $searchKey .  '%"  order by  distance asc  LIMIT '.$Offset.','.$Limit.'  ');

        $result = $this->db->query('SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,evt.venue,"event" as type,evt.cover_image AS url,evt.website as ticket_url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,SQRT(
    POW(69.1 * (lat -42.2917), 2) +
    POW(69.1 * (85.5872- lng) * COS(lat / 57.3), 2)) AS distance,"email" as email '
            . '     FROM '.TBL_EVENT.' as evt WHERE  evt.title LIKE "%' . $searchKey .  '%"  and deleted="0"  order by  distance LIMIT '.$Offset.','.$Limit.'  ');
        //  echo $this->db->last_query(); exit;
        //   echo $this->db->last_query(); exit;
        return $result->result_array();
    }
    function getEventsByDate($postData){

        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $start_date=$postData['start_date'];
        $end_date=$postData['end_date'];


        $Offset = (($Offset-1)*$Limit)+1;
        $Limit   =  $Limit;



        $DistanceType = $postData['DistanceType'];
        if($DistanceType=='Mile'){
            $iRadiant=3959;
        }else{
            $iRadiant=6371;
        }

        if ($postData['searchKey']!='') {
            $searchKey =$postData['searchKey'];
        } else {
            $searchKey='';
        }

        $result = $this->db->query('SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,evt.venue,"event" as type,evt.cover_image AS url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) ) 
* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
                        AS distance,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,"email" as email '
            . '     FROM '.TBL_EVENT.' as evt WHERE  evt.title LIKE "%' . $searchKey .  '%"  AND  FROM_UNIXTIME(evt.end_time,"%Y-%m-%d") BETWEEN "'.$start_date.'" AND "'.$end_date.'"   order by  id DESC LIMIT '.$Offset.','.$Limit.'  ');
          
          
//        $result = $this->db->query('SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,evt.venue,"event" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) ) 
//* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
//                        AS distance,CONCAT("'.DOMAIN_URL.'/", m.media_path) AS url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,"email" as email '
//            . '     FROM '.TBL_EVENT.' as evt LEFT JOIN '.TBL_APP_MEDIA.' as m ON evt.id=m.event_id WHERE evt.title LIKE "%' . $searchKey .  '%" AND  FROM_UNIXTIME(evt.end_time,"%Y-%m-%d") BETWEEN "'.$start_date.'" AND "'.$end_date.'"  GROUP BY m.event_id order by distance asc  LIMIT '.$Offset.','.$Limit.'  ');
        // echo $this->db->last_query(); exit; 0,4,8$Offset
        //   echo $this->db->last_query(); exit;
        return $result->result_array();

    }
    function getEventsLikedUsers($event_id){
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_like,l.is_share,l.is_favourite')
            ->from(TBL_USER.' as u')
            ->join(TBL_APP_EVENT_LIKE.' as l',"l.user_id = u.id",'LEFT',FALSE)
            ->where('l.event_id',$event_id)
            ->where('l.deleted','0')
            ->LIMIT(10);

        $result = $this->db->get();

        return $result->result_array();
    }

    function getEventsCommentedUsers($event_id)
    {
        $this->db->select('c.id as comment_id,u.id as user_id,u.name,CONCAT("' . DOMAIN_URL . '/", u.image) AS userImage,c.comment,lk.rate,lk.is_rated')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_COMMENTS . ' as c', "c.user_id = u.id", 'LEFT', FALSE)
            ->join(TBL_APP_EVENT_LIKE . ' as lk', "(lk.event_id = c.event_id) AND (lk.user_id = c.user_id)", 'LEFT', FALSE)
            ->where('c.event_id', $event_id)
            ->where('c.deleted', '0')
            ->order_by("c.id", "DESC")
            ->Limit(3);

        $result = $this->db->get();

        return $result->result_array();
    }
    function myComment($id,$user_id,$type)
    {
        if($type=='business'){
            $columnName='c.business_id';
        }elseif($type=='event'){
            $columnName='c.event_id';
        }elseif($type=='offer'){
            $columnName='c.offer_id';
        }
        $this->db->select('c.id as comment_id,u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_COMMENTS . ' as c', "c.user_id = u.id", 'LEFT', FALSE)
            ->join(TBL_APP_EVENT_LIKE . ' as lk', "(lk.business_id = c.business_id) AND (lk.user_id = c.user_id)", 'LEFT', FALSE)
            ->where($columnName, $id)
            ->where('u.id',$user_id)
            ->where('c.deleted', '0')
            ->order_by("c.id", "DESC")
            ->Limit(1);

        $result = $this->db->get();

        return $result->result_array();
    }
    function getAllImages($id,$columnName){
        $this->db->select('CONCAT("'.DOMAIN_URL.'/", m.media_path) AS image_path,CONCAT("'.DOMAIN_URL.'/", m.video_thumb_path) AS thumb,type,id as media_id')
            ->from(TBL_APP_MEDIA.' as m')
            ->where('m.'.$columnName.'',$id)
            ->where('m.deleted','0');

        $result = $this->db->get();

        return $result->result_array();
    }

    function GetCategoryData($CategoryID,$type){
        $this->db->select('id as category_id,CONCAT("'.DOMAIN_URL.'/", image) AS CategoryImage,name as CategoryName')
            ->from(TBL_CATEGORY)
            ->where('id',$CategoryID)
            ->where('type',$type)
            ->where('deleted','0')
            ->where('active','1');

        $result = $this->db->get();

        return $result->result_array();
    }
    function checkUserEventLiked($user_id,$id,$ColumnName){

        $result= $this->db->query('select u.id as user_id,u.email as email,u.name,lk.is_like,lk.is_favourite,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,lk.is_share,lk.is_rated,lk.rate FROM users as u left join app_event_like as lk on u.id = lk.user_id AND lk.'.$ColumnName.' = '.$id.' WHERE u.id = '.$user_id.' ');


        return $result->result_array();
    }
    function CreatedUserData($user_id){
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage')
            ->from(TBL_USER.' as u')
            ->where('u.id',$user_id)
            ->where('u.deleted','0');

        $result = $this->db->get();

        return $result->result_array();
    }

    function getUserEventAttendanceStatus($event_id){

        $this->db->select('a.invitation_status as event_attendance_status')
            ->from(TBL_EVENT_ATTENDEE.' as a')
            ->where('a.event_id',$event_id)
            ->where('a.deleted','0');

        $result = $this->db->get();

        return $result->row()->event_attendance_status;


    }
    function event_ratting($postData = array(), $id = ''){

        $this->_table_name = TBL_APP_EVENT_LIKE;
        if ($id == NULL) {
            // Insert Here                   
            $id=parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }
        return $id;
    }

    //notification
    function add_notification_data($postData)
    {
        $this->_table_name = TBL_NOTIFICATION_MASTER;
        return parent::insert($postData);

    }
    function SingleEventDetail($array, $fields)
    {
        $this->_table_name = TBL_EVENT;
        $fields = 'id as event_id,title as name';
        $query = parent::get_single($array, $fields);
        return $query;

    }
    function UserSingleUserDetail($array, $fields)
    {
        $this->_table_name = TBL_USER;
        $fields = 'id as user_id,name,deviceid,image,is_notification';
        $query = parent::get_single($array, $fields);
        return $query;

    }


}
