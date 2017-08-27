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

    function getData($postData)
    {


        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];


        $Offset = (($Offset - 1) * $Limit);
        $Limit = $Limit;


        $DistanceType = $postData['DistanceType'];
        if ($DistanceType == 'Mile') {
            $iRadiant = 3959;
        } else {
            $iRadiant = 6371;
        }

      echo  $result = $this->db->query('SELECT id,user_id,title,description,location,address,venue,type,distance,url,totallike,totalshare,totalfavorite,category_id,start_time,end_time,datetime,working_hours,Lattitude,Longitude,since,mobile,email,website,fb_link,twitter_link,gplus_link,duration,payment_date,payment_status
                        FROM
                        (SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,"address" as address,evt.venue,"event" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) )
* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
                        AS distance,CONCAT("' . DOMAIN_URL . '/", evt.cover_image) AS url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,"email" as email,"" as website,"" as fb_link,"" as twitter_link,"" as gplus_link,"" as duration ,"" as payment_date,"" as payment_status'
            . '     FROM ' . TBL_EVENT . ' as evt WHERE evt.deleted="0"
                        UNION ALL
                        SELECT DISTINCT  bns.id,bns.user_id,bns.name AS title,bns.description,bns.location,bns.address,"venue" as venue,"business" as type,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(latitude) )
* cos( radians(longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(latitude)) ) )
                          AS distance,CONCAT("' . DOMAIN_URL . '/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.email,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link,"" as duration,"" as payment_date,"" as payment_status'
            . '     FROM ' . TBL_BUSINESS . '  bns WHERE bns.deleted="0"
                        UNION ALL
                        SELECT offers.id as id,offers.user_id,offers.name as title,offers.description,"","","","offer" as type,"",CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.totallike,offers.totalshare,offers.totalfavorite,"",offers.start_time,offers.end_time,offers.datetime,"","","","","","","","","","",payment.duration,payment.payment_date,payment.payment_status
                  FROM ' . TBL_OFFERS . ' as offers  LEFT JOIN  ' . TBL_PAYMENT_MASTER . ' as payment  ON offers.business_id=payment.business_id  WHERE offers.deleted="0"  AND payment.type="offer"  AND payment_status="approved" AND offers.eStatus="1"
                        ) t order by distance asc  LIMIT ' . $Offset . ',' . $Limit . '  ');
        // echo $this->db->last_query(); exit; 0,4,8$Offset
        //   echo $this->db->last_query(); exit;
        return $result->result_array();
    }

    function getDataByDate($postData)
    {

        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $start_date = $postData['start_date'];
        $end_date = $postData['end_date'];


        //$Offset = (($Offset - 1) * $Limit);
        $Offset = ($Offset - 1) * $Limit;


        $DistanceType = $postData['DistanceType'];
        if ($DistanceType == 'Mile') {
            $iRadiant = 3959;
        } else {
            $iRadiant = 6371;
        }

        $result = $this->db->query('SELECT id,user_id,title,description,location,address,venue,type,distance,url,totallike,totalshare,totalfavorite,category_id,start_time,end_time,datetime,working_hours,Lattitude,Longitude,since,mobile,email,website,fb_link,twitter_link,gplus_link,duration,payment_date,payment_status
                        FROM
                        (SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,"address" as address,evt.venue,"event" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) )
* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
                        AS distance,CONCAT("' . DOMAIN_URL . '/", evt.cover_image) AS url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,"email" as email,"" as website,"" as fb_link,"" as twitter_link,"" as gplus_link,"" as duration ,"" as payment_date,"" as payment_status'
            . '     FROM ' . TBL_EVENT . ' as evt WHERE FROM_UNIXTIME(evt.end_time,"%Y-%m-%d") BETWEEN "' . $start_date . '" AND "' . $end_date . '"  AND bns.deleted="0"
                        UNION ALL
                        SELECT DISTINCT  bns.id,bns.user_id,bns.name AS title,bns.description,bns.location,bns.address,"venue" as venue,"business" as type,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(latitude) )
* cos( radians(longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(latitude)) ) )
                          AS distance,CONCAT("' . DOMAIN_URL . '/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.email,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link,"" as duration,"" as payment_date,"" as payment_status'
            . '     FROM ' . TBL_BUSINESS . '  bns WHERE FROM_UNIXTIME(bns.datetime,"%Y-%m-%d") BETWEEN "' . $start_date . '" AND "' . $end_date . '" AND bns.deleted="0"
                       UNION ALL
                        SELECT offers.id as id,offers.user_id,offers.name as title,offers.description,"","","","offer" as type,"",CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.totallike,offers.totalshare,offers.totalfavorite,"",offers.start_time,offers.end_time,offers.datetime,"","","","","","","","","","",payment.duration,payment.payment_date,payment.payment_status
                  FROM ' . TBL_OFFERS . ' as offers  LEFT JOIN  ' . TBL_PAYMENT_MASTER . ' as payment  ON offers.business_id=payment.business_id  WHERE offers.deleted="0"  AND payment.type="offer"  AND payment_status="approved" AND offers.eStatus="1" AND offers.end_time BETWEEN "' . $start_date . '" AND "' . $end_date . '"
                        ) t order by distance asc  LIMIT ' . $Offset . ',' . $Limit . '  ');
        // echo $this->db->last_query(); exit; 0,4,8$Offset
//        /  echo $this->db->last_query(); exit;
        return $result->result_array();
    }

    function getBusiness($postData)
    {

        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];


        $Offset = (($Offset - 1) * $Limit);
        //  $Limit = $Limit;


        $DistanceType = $postData['DistanceType'];
        if ($DistanceType == 'Mile') {
            $iRadiant = 3959;
        } else {
            $iRadiant = 6371;
        }
        
         if ($postData['searchKey']!='') {
            $searchKey =$postData['searchKey'];
        } else {
            $searchKey='';
        }

        $result = $this->db->query(' SELECT  bns.id,bns.user_id,bns.name AS title,bns.description,bns.cityID,bns.location,bns.address,"venue" as venue,"business" as type,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(latitude) )
* cos( radians(longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(latitude)) ) )
                          AS distance,CONCAT("' . DOMAIN_URL . '/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.email,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link'
            . '     FROM ' . TBL_BUSINESS . '  bns  WHERE bns.deleted="0" AND bns.name LIKE "%' . $searchKey .  '%"   order by distance asc  LIMIT ' . $Offset . ',' . $Limit . '  ');
        // echo $this->db->last_query(); exit; 0,4,8$Offset
        //   echo $this->db->last_query(); exit;
        return $result->result_array();
    }

    function getBusinessByDate($postData)
    {

        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $start_date = $postData['start_date'];
        $end_date = $postData['end_date'];


        $Offset = (($Offset - 1) * $Limit);
        //  $Limit = $Limit;


        $DistanceType = $postData['DistanceType'];
        if ($DistanceType == 'Mile') {
            $iRadiant = 3959;
        } else {
            $iRadiant = 6371;
        }
        
          if ($postData['searchKey']!='') {
            $searchKey =$postData['searchKey'];
        } else {
            $searchKey='';
        }

        $result = $this->db->query(' SELECT  bns.id,bns.user_id,bns.name AS title,bns.cityID,bns.description,bns.location,bns.address,"venue" as venue,"business" as type,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(latitude) )
* cos( radians(longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(latitude)) ) )
                          AS distance,CONCAT("' . DOMAIN_URL . '/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.email,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link'
            . '     FROM ' . TBL_BUSINESS . '  bns  WHERE FROM_UNIXTIME(bns.datetime,"%Y-%m-%d") BETWEEN "' . $start_date . '" AND "' . $end_date . '" AND  bns.deleted="0" AND bns.name LIKE "%' . $searchKey .  '%" GROUP BY bns.id  order by distance asc  LIMIT ' . $Offset . ',' . $Limit . '  ');
        // echo $this->db->last_query(); exit;
        //   echo $this->db->last_query(); exit;
        return $result->result_array();
    }


    function getEventsDetailsData($postData)
    {


        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];


        $DistanceType = 'Mile';
        if ($DistanceType == 'Mile') {
            $iRadiant = 3959;
        } else {
            $iRadiant = 6371;
        }


        $result = $this->db->query('SELECT  evt.id,evt.user_id,evt.title,evt.description,evt.location,evt.venue,"event" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) )
* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
                        AS distance,CONCAT("' . DOMAIN_URL . '/", evt.cover_image) AS url,evt.website as ticket_url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,evt.lat as Lattitude,evt.lng as Longitude  FROM ' . TBL_EVENT . ' as evt  WHERE evt.deleted="0" AND evt.id="' . $postData['event_id'] . '"', FALSE);


        return $result->row_array();
    }

    function getDetailBusinessData($postData)
    {
        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];

        $iRadiant = 3959;


        $this->db->select('bns.id,bns.user_id,bns.name AS title,bns.description,bns.cityID,bns.location,bns.address,"venue" as venue,"business" as type,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(latitude) )
            * cos( radians(longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(latitude)) ) )
                          AS distance,CONCAT("' . DOMAIN_URL . '/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.email,"" as duration,"" as payment_date,"" as payment_status,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link', FALSE)
            ->from(TBL_BUSINESS . ' as bns');


        $this->db->where('bns.deleted', '0');
        $this->db->where('bns.id', $postData['business_id']);

        $result = $this->db->get();

        return $result->row_array();
    }

    //get event Likes
    function getEventsLikedUsers($event_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_like,l.is_share,l.is_favourite')
            ->from(TBL_USER . ' as u')
            ->join(TBL_APP_EVENT_LIKE . ' as l', "l.user_id = u.id", 'LEFT', FALSE)
            ->where('l.event_id', $event_id)
            ->where('l.deleted', '0')
            ->LIMIT(10);

        $result = $this->db->get();

        return $result->result_array();
    }

    function getAllEventsLikedUsers($postData)
    {
        $event_id = $postData['event_id'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $Offset = (($Offset) * $Limit);
        $Limit = $Limit;

        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_like,l.is_share,l.is_favourite')
            ->from(TBL_USER . ' as u')
            ->join(TBL_APP_EVENT_LIKE . ' as l', "l.user_id = u.id", 'LEFT', FALSE)
            ->where('l.event_id', $event_id)
            ->where('l.deleted', '0')
            ->limit($Limit, $Offset);

        $result = $this->db->get();

        return $result->result_array();
    }

    function checkUserEventLiked($user_id, $id, $ColumnName)
    {

        $result = $this->db->query('select u.id as user_id,u.email as email,u.name,lk.is_like,lk.is_favourite,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,lk.is_share,lk.is_rated ,lk.rate FROM users as u left join app_event_like as lk on u.id = lk.user_id AND lk.' . $ColumnName . ' = ' . $id . ' WHERE u.id = ' . $user_id . ' ');


        return $result->result_array();
    }

    //get business Likes

    function getBusinesssLikedUsers($business_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_share,l.is_favourite')
            ->from(TBL_USER . ' as u')
            ->join(TBL_APP_EVENT_LIKE . ' as l', "l.user_id = u.id", 'LEFT', FALSE)
            ->where('l.business_id', $business_id)
            ->where('l.deleted', '0')
            ->LIMIT(10);

        $result = $this->db->get();

        return $result->result_array();
    }

    function getAllBusinessLikedUsers($postData)
    {

        $business_id = $postData['business_id'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $Offset = (($Offset) * $Limit);
        $Limit = $Limit;

        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_like,l.is_share,l.is_favourite')
            ->from(TBL_USER . ' as u')
            ->join(TBL_APP_EVENT_LIKE . ' as l', "l.user_id = u.id", 'LEFT', FALSE)
            ->where('l.business_id', $business_id)
            ->where('l.deleted', '0')
            ->limit($Limit, $Offset);

        $result = $this->db->get();

        return $result->result_array();
    }

    //event comments
    function getEventsCommentedUsers($event_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
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

    function getAllEventsCommentedUsers($postData)
    {

        $event_id = $postData['event_id'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $Offset = ($Offset - 1) * $Limit;

        $this->db->select('c.id as comment_id,u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_COMMENTS . ' as c', "c.user_id = u.id", 'LEFT', FALSE)
            ->join(TBL_APP_EVENT_LIKE . ' as lk', "(lk.event_id = c.event_id) AND (lk.user_id = c.user_id)", 'LEFT', FALSE)
            ->where('c.event_id', $event_id)
            ->where('c.deleted', '0')
            ->order_by("c.id", "DESC")
            ->limit($Limit, $Offset);


        $result = $this->db->get();

        return $result->result_array();
    }

    // business comments

    function getBusinessCommentedUsers($business_id)
    {
        $this->db->select('c.id as comment_id,u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_COMMENTS . ' as c', "c.user_id = u.id", 'LEFT', FALSE)
            ->join(TBL_APP_EVENT_LIKE . ' as lk', "(lk.business_id = c.business_id) AND (lk.user_id = c.user_id)", 'LEFT', FALSE)
            ->where('c.business_id', $business_id)
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

    function getAllBusinessCommentedUsers($postData)
    {

        $business_id = $postData['business_id'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $Offset = ($Offset - 1) * $Limit;

        $this->db->select('c.id as comment_id,u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_COMMENTS . ' as c', "c.user_id = u.id", 'LEFT', FALSE)
            ->join(TBL_APP_EVENT_LIKE . ' as lk', "(lk.business_id = c.business_id) AND (lk.user_id = c.user_id)", 'LEFT', FALSE)
            ->where('c.business_id', $business_id)
            ->where('c.deleted', '0')
            ->order_by("c.id", "DESC")
            ->limit($Limit, $Offset);


        $result = $this->db->get();

        return $result->result_array();
    }

    // event attendee
    function getEventsAttendeeUsers($postData)
    {


        $event_id = $postData['event_id'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $Offset = (($Offset) * $Limit);
        $Limit = $Limit;

        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,a.invitation_status as status')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_ATTENDEE . ' as a', "a.touser_id = u.id", 'LEFT', FALSE)
            ->where('a.event_id', $event_id)
            ->where('u.deleted', '0')
            ->where('a.deleted', '0')
            ->limit($Limit, $Offset);

        $result = $this->db->get();

        return $result->result_array();
    }

    function getUserEventAttendanceStatus($event_id)
    {

        $this->db->select('a.invitation_status as event_attendance_status')
            ->from(TBL_EVENT_ATTENDEE . ' as a')
            ->where('a.event_id', $event_id)
            ->where('a.deleted', '0');

        $result = $this->db->get();

        return $result->row()->event_attendance_status;


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

    function GetCategoryData($CategoryID, $type)
    {
        $this->db->select('id as category_id,CONCAT("' . DOMAIN_URL . '/", image) AS CategoryImage,name as CategoryName')
            ->from(TBL_CATEGORY)
            ->where('id', $CategoryID)
            ->where('type', $type)
            ->where('deleted', '0')
            ->where('active', '1');

        $result = $this->db->get();

        return $result->result_array();
    }

    function CreatedUserData($user_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage')
            ->from(TBL_USER . ' as u')
            ->where('u.id', $user_id)
            ->where('u.deleted', '0');

        $result = $this->db->get();

        return $result->result_array();
    }

    //create Business and events
    function create_business($postData, $row_id = '')
    {  
        
        $this->_table_name = TBL_BUSINESS;
        if ($row_id != '') {
            parent::update($postData, $row_id);
        } else {
            $postData['deleted'] = 0;
            $row_id = parent::insert($postData);
        }

        return $row_id;
    }

    function add_business_medias($postData, $row_id = '')
    {
        $this->_table_name = TBL_APP_MEDIA;

        if ($row_id != '') {
            $row_id = parent::update($postData, $row_id);
        } else {

            $postData['deleted'] = 0;
            $row_id = parent::insert($postData);
        }


        return $row_id;

    }

    function add_video_thumb($postData, $row_id = '')
    {
        $this->_table_name = TBL_APP_MEDIA;

        $row_id = parent::update($postData, $row_id);


        return $row_id;

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

    function create_business_ads($postData, $row_id = '')
    {
        $this->_table_name = TBL_ADVERTISMENT;
        if ($row_id != '') {
            parent::update($postData, $row_id);
        } else {
            $postData['deleted'] = 0;
            $row_id = parent::insert($postData);
        }

        return $row_id;

    }

    function check_business_payment($array, $ColumnName)
    {
        $this->_table_name = TBL_PAYMENT_MASTER;
        $fields = 'id,' . $ColumnName . '';
        $query = parent::get_single($array, $fields);
        return $query;

    }

    function add_business_payment($postData, $row_id = '')
    {
        $this->_table_name = TBL_PAYMENT_MASTER;


        if ($row_id == NULL) {
            // Insert Here
            $postData['deleted'] = 0;
            $row_id = parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $row_id);

        }
        return $row_id;
    }

    function delete_medias($postData)
    {
        $this->_table_name = TBL_APP_MEDIA;
        parent::delete_by_where($postData);
        return true;
    }

    function check_user_business_like($array, $ColumnName)
    {
        $this->_table_name = TBL_APP_EVENT_LIKE;
        $fields = 'id,' . $ColumnName . '';
        $query = parent::get_single($array, $fields);
        return $query;

    }

    function check_business_comment($array, $ColumnName)
    {
        $this->_table_name = TBL_EVENT_COMMENTS;
        $fields = 'id,' . $ColumnName . '';
        $query = parent::get_single($array, $fields);
        return $query;
    }

    function DoBusinessLike($postData = array(), $id = '')
    {

        $this->_table_name = TBL_APP_EVENT_LIKE;
        if ($id == NULL) {
            // Insert Here
            $id = parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }
        return $id;
    }

    function UpdateCount($ColumnName, $count, $BusinessID = '')
    {

        $this->db->set($ColumnName, $ColumnName . '+' . $count, FALSE);
        $this->db->where('id', $BusinessID);
        $this->db->update(TBL_BUSINESS);

        return true;
    }

    function add_comments($postData, $id = '')
    {

        $this->_table_name = TBL_EVENT_COMMENTS;

        if ($id == NULL) {
            // Insert Here
            $postData['deleted'] = 0;
            $id = parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }

        return $id;
    }

    function business_ratting($postData = array(), $id = '')
    {

        $this->_table_name = TBL_APP_EVENT_LIKE;
        if ($id == NULL) {
            // Insert Here
            $id = parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }
        return $id;
    }

    //offers

    function check_user_offer_like($array, $ColumnName)
    {
        $this->_table_name = TBL_APP_EVENT_LIKE;
        $fields = 'id,' . $ColumnName . '';
        $query = parent::get_single($array, $fields);
        return $query;

    }

    function check_offer_comment($array, $ColumnName)
    {
        $this->_table_name = TBL_EVENT_COMMENTS;
        $fields = 'id,' . $ColumnName . '';
        $query = parent::get_single($array, $fields);
        return $query;
    }

    function DoOfferLike($postData = array(), $id = '')
    {

        $this->_table_name = TBL_APP_EVENT_LIKE;
        if ($id == NULL) {
            // Insert Here
            $id = parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }
        return $id;
    }

    function offer_ratting($postData = array(), $id = '')
    {

        $this->_table_name = TBL_APP_EVENT_LIKE;
        if ($id == NULL) {
            // Insert Here
            $id = parent::insert($postData);

        } else {
            // Update here
            parent::update($postData, $id);

        }
        return $id;
    }

    function UpdateOfferCount($ColumnName, $count, $offer_id = '')
    {

        $this->db->set($ColumnName, $ColumnName . '+' . $count, FALSE);
        $this->db->where('id', $offer_id);
        $this->db->update(TBL_OFFERS);

        return true;
    }

    //offers
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

    function checkUserOfferLiked($user_id, $id, $ColumnName)
    {

        $result = $this->db->query('select u.id as user_id,u.email as email,u.name,lk.is_like,lk.is_favourite,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,lk.is_share,lk.is_rated ,lk.rate FROM users as u left join app_event_like as lk on u.id = lk.user_id AND lk.' . $ColumnName . ' = ' . $id . ' WHERE u.id = ' . $user_id . ' ');


        return $result->result_array();
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

    function getAllOffersData($postData)
    {

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];


        $Offset = (($Offset - 1) * $Limit);
        $Limit = $Limit;

      if ($postData['searchKey']!='') {
            $searchKey =$postData['searchKey'];
        } else {
            $searchKey='';
        }

        $result = $this->db->query('SELECT offers.id as offer_id,CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.name,offers.description,offers.start_time,offers.end_time,offers.business_id,offers.totallike,offers.totalshare,offers.user_id,offers.totalfavorite,payment.duration,payment.payment_date,payment.payment_status
                  FROM ' . TBL_OFFERS . ' as offers  LEFT JOIN  ' . TBL_PAYMENT_MASTER . ' as payment  ON offers.business_id=payment.business_id  WHERE offers.deleted="0"  AND payment.type="offer"  AND payment_status="approved" AND offers.eStatus="1" AND offers.name LIKE "%' . $searchKey .  '%" order by offers.id DESC  LIMIT ' . $Offset . ',' . $Limit . '', FALSE);
        return $result->result_array();
    }
    function getAllOffersDataByDate($postData)
    {

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];


        $Offset = (($Offset - 1) * $Limit);
        $Limit = $Limit;


        $start_date = $postData['start_date'];
        $end_date = $postData['end_date'];

         if ($postData['searchKey']!='') {
            $searchKey =$postData['searchKey'];
        } else {
            $searchKey='';
        }

        $result = $this->db->query('SELECT offers.id as offer_id,CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.name,offers.description,offers.start_time,offers.end_time,offers.business_id,offers.totallike,offers.totalshare,offers.user_id,offers.totalfavorite,payment.duration,payment.payment_date,payment.payment_status
                  FROM ' . TBL_OFFERS . ' as offers  LEFT JOIN  ' . TBL_PAYMENT_MASTER . ' as payment  ON offers.user_id=payment.user_id  WHERE offers.deleted="0"  AND payment.type="offer"  AND payment_status="approved" AND offers.eStatus="1" AND offers.name LIKE "%' . $searchKey .  '%" AND  offers.end_time BETWEEN "' . $start_date . '" AND "' . $end_date . '" order by offers.id DESC LIMIT ' . $Offset . ',' . $Limit . '', FALSE);
        return $result->result_array();
    }
    function get_offers_details($postData)
    {


        $result = $this->db->query('SELECT offers.id as offer_id,CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.name,offers.description,offers.start_time,offers.end_time,offers.business_id,offers.totallike,offers.totalshare,offers.user_id,offers.totalfavorite,payment.duration,payment.payment_date,payment.payment_status
                  FROM ' . TBL_OFFERS . ' as offers  LEFT JOIN  ' . TBL_PAYMENT_MASTER . ' as payment  ON offers.business_id=payment.business_id  WHERE offers.deleted="0" AND offers.id="'.$postData['offer_id'].'" AND payment.type="offer"  AND payment_status="approved" AND offers.eStatus="1"  ', FALSE);
        return $result->row_array();
    }
    function getAllOffersCommentedUsers($postData)
    {

        $offer_id = $postData['offer_id'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];

        $Offset = ($Offset - 1) * $Limit;



        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
            ->from(TBL_USER . ' as u')
            ->join(TBL_EVENT_COMMENTS . ' as c', "c.user_id = u.id", 'LEFT', FALSE)
            ->join(TBL_APP_EVENT_LIKE . ' as lk', "(lk.offer_id = c.offer_id) AND (lk.user_id = c.user_id)", 'LEFT',FALSE)
            ->where('c.offer_id', $offer_id)
            ->where('c.deleted', '0')
            ->order_by("c.id", "DESC")
            ->limit($Limit, $Offset);


        $result = $this->db->get();
//echo $this->db->last_query(); exit;
        return $result->result_array();
    }

    function UserSingleUserDetail($array, $fields)
    {
        $this->_table_name = TBL_USER;
        $fields = 'id as user_id,name,deviceid,image,is_notification';
        
        $query = parent::get_single($array, $fields);
        return $query;

    }
    function SingleBusinessDetail($array, $fields)
    {
        $this->_table_name = TBL_BUSINESS;
        $fields = 'id as business_id,name';
        $query = parent::get_single($array, $fields);
        return $query;

    }

    function UserBusinessUserDetailByBusinessID($business_id)
    {

        $this->db->select('u.id as user_id,u.name,u.deviceid,u.image,bns.name,u.is_notification')
            ->from(TBL_USER . ' as u')
            ->join(TBL_BUSINESS . ' as bns', "bns.user_id = u.id", 'LEFT', FALSE)
            ->where('bns.id', $business_id)
            ->where('u.user_type', 'u')
            ->where('u.deleted', '0');

        $result = $this->db->get();
        //  echo $this->db->last_query(); exit;
        return $result->result_array();

    }

    function add_notification_data($postData)
    {
       $this->_table_name = TBL_NOTIFICATION_MASTER;
       return parent::insert($postData);

    }

    function UserOfferUserDetailByOfferID($offer_id)
    {

        $this->db->select('u.id as user_id,u.name,u.deviceid,u.image,offer.name,u.is_notification')
            ->from(TBL_USER . ' as u')
            ->join(TBL_OFFERS . ' as offer', "offer.user_id = u.id", 'LEFT', FALSE)
            ->where('offer.id', $offer_id)
            ->where('u.user_type', 'u')
            ->where('u.deleted', '0');

        $result = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $result->result_array();


    }
    function SingleOfferDetail($array, $fields)
    {
        $this->_table_name = TBL_OFFERS;
        $fields = 'id as offer_id,name';
        $query = parent::get_single($array, $fields);
        return $query;

    }

    function UserData($user_id)
    {
        $this->db->select('u.name,u.email')
            ->from(TBL_USER . ' as u')
            ->where('u.id', $user_id)
            ->where('u.deleted', '0');

        $result = $this->db->get();

        return $result->row_array();
    }
    function BusinessData($business_id)
    {
        $this->db->select('bns.name')
            ->from(TBL_BUSINESS . ' as bns')
            ->where('bns.id', $business_id)
            ->where('bns.deleted', '0');

        $result = $this->db->get();

        return $result->row_array();
    }
    
     function get_business_ads_subscription_data($business_id)
    {


        $result=$this->db->query('SELECT ads.id as ads_id,payment.ads_type,ads.cityID,ads.time,CONCAT("'.DOMAIN_URL.'/", ads.image) AS url,CONCAT("'.DOMAIN_URL.'/", ads.image_footer) AS image_footer,ads.title,ads.description,ads.start_time,ads.end_time,ads.business_id,ads.totalclicks,ads.user_id,ads.ads_type,payment.duration,payment.payment_date,payment.transaction_id,payment.amount,payment.payment_status
                  FROM '.TBL_ADVERTISMENT.' as ads  LEFT JOIN  '.TBL_PAYMENT_MASTER.' as payment  ON ads.business_id=payment.business_id  WHERE ads.deleted="0" AND ads.business_id="'.$business_id.'" AND payment.type="ads"  AND payment_status="approved"  ',FALSE);
        return $result->result_array();


    }

    function get_business_offer_subscription_data($business_id)
    {


        $result=$this->db->query('SELECT payment.duration,payment.payment_date,payment.transaction_id,payment.amount,payment.payment_status
                  FROM  '.TBL_PAYMENT_MASTER.' as payment   WHERE payment.deleted="0" AND payment.business_id="'.$business_id.'" AND payment.type="offer"  AND payment_status="approved"  ',FALSE);
        return $result->result_array();


    }
    function get_ads_revenue($ads_id)
    {
        $result=$this->db->query('SELECT SUM(clicks) AS total_click,date
                  FROM  '.TBL_ADVERTISMENT_REVENUE.' as revenue   WHERE  revenue.ads_id="'.$ads_id.'" AND revenue.deleted="0" AND revenue.eStatus="1" GROUP BY revenue.date ORDER BY revenue.date DESC ',FALSE);
        return $result->result_array();
    }
      function count_business_offers($business_id)
    {


        $result=$this->db->query('SELECT count(id) as offer_count
                  FROM  '.TBL_OFFERS.' as offer   WHERE  offer.business_id="'.$business_id.'" AND offer.deleted="0"  ',FALSE);
        return $result->result_array();


    }
}
