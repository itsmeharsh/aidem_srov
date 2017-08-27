<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_model_v1 extends MY_Model {

    protected $_table_name = TBL_USER;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }

    function get_single_user($array) {
        $this->_table_name = TBL_USER;
        $fields = 'id,name,email,image,active,categories,fb_link,twitter_link,gplus_link,description,fav_book,fav_music,fav_food,fav_drink,fav_place';
        $query = parent::get_single($array, $fields);
        return $query;
    }
    function get_social_user($array) {
        $this->_table_name = TBL_USER;
        $fields = 'id,name,image,active,fb_id,gplus_id,categories,fb_link,twitter_link,gplus_link,description,fav_book,fav_music,fav_food,fav_drink,fav_place';
        $query = parent::get_single($array, $fields);
        return $query;
    }
    function get_user_profile_data($array){
        $this->_table_name = TBL_USER;
        $fields = 'id,name,email,image,active,phone,work_email,work_phone,address,categories,deLatitude,deLongitude,is_notification,notification_sound,distance_type,deviceid,fb_link,twitter_link,gplus_link,description,fav_book,fav_music,fav_food,fav_drink,fav_place';
        $query = parent::get_single($array, $fields);
        return $query;
    }

    function insert_device($array) {
        $this->_table_name = 'tbl_user_devices';
        return parent::insert($array);
    }

    function insert_user($array) {

        $this->_table_name = TBL_USER;
        return parent::insert($array);
    }

    function update_user($data, $id = NULL) {
        $this->_table_name =TBL_USER;
        parent::update($data, $id);
        return $id;
    }
    function update_data($postData = array(), $key = '', $id = ''){
        $this->db->where($key, $id);
        $this->db->update(TBL_USER, $postData);

        return true;
    }
    function get_Usercategories($postData) {

        $this->db->select('id,name,case when image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", image) else image end  as image')
            ->from(TBL_CATEGORY)
            ->where('deleted', $postData['deleted'])
            ->where('id', $postData['CategoryID']);


        return $this->db->get()->row_array();
    }


    //for events and business
    function getMyEventsData($postData)
    {
        $this->db->order_by('id','desc');
        return $this->db->get_where('tbl_events',array('user_id'=>$postData['user_id']))->result_array(); 
    }
    
    function getMyBusinessData($postData)
    {
        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];


        $DistanceType = 'Mile';
        if($DistanceType=='Mile'){
            $iRadiant=3959;
        }else{
            $iRadiant=6371;
        }


        $result=$this->db->query('SELECT  bns.id,bns.name,bns.description,bns.cityID,bns.location,bns.address,"business" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(bns.latitude) ) 
* cos( radians(bns.longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(bns.latitude)) ) )
                          AS distance,CONCAT("'.DOMAIN_URL.'/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.user_id,bns.totalfavorite,bns.category_id,bns.since,bns.mobile,bns.email,bns.latitude as Lattitude,bns.longitude as Longitude,bns.datetime,bns.working_hours,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link
                  FROM '.TBL_BUSINESS.'  bns  WHERE bns.deleted="0" AND bns.user_id="'.$postData['user_id'].'"  GROUP BY bns.id ORDER BY distance ASC',FALSE);
        return $result->result_array();
    }

    function getEventsLikedUsers($event_id){
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_share,l.is_favourite')
            ->from(TBL_USER.' as u')
            ->join(TBL_APP_EVENT_LIKE.' as l',"l.user_id = u.id",'LEFT',FALSE)
            ->where('l.event_id',$event_id);

        $result = $this->db->get();

        return $result->result_array();
    }
    function getEventsCommentedUsers($event_id)
    {
        $this->db->select('c.id as comment_id,u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
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
    function getEventsAttendeeUsers($event_id){
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,a.invitation_status as status')
            ->from(TBL_USER.' as u')
            ->join(TBL_EVENT_ATTENDEE.' as a',"a.user_id = u.id",'LEFT',FALSE)
            ->where('a.event_id',$event_id)
            ->where('u.deleted',0)
            ->where('a.deleted',0);

        $result = $this->db->get();

        return $result->result_array();
    }
    function getAllImages($id,$columnName){
        $this->db->select('CONCAT("'.DOMAIN_URL.'/", m.media_path) AS image_path,type,is_default,id as media_id')
            ->from(TBL_APP_MEDIA.' as m')
            ->where('m.'.$columnName.'',$id)
            ->where('m.deleted',0);

        $result = $this->db->get();

        return $result->result_array();
    }
    function delete_comment($comment_id){
        $result= $this->db->query('delete from '.TBL_EVENT_COMMENTS.' WHERE id = '.$comment_id.' ');


        return true;
    }

    function GetCategoryData($CategoryID,$type){
        $this->db->select('CONCAT("'.DOMAIN_URL.'/", image) AS CategoryImage,name as CategoryName')
            ->from(TBL_CATEGORY)
            ->where('id',$CategoryID)
            ->where('type',$type)
            ->where('deleted',0)
            ->where('active',1);

        $result = $this->db->get();

        return $result->result_array();
    }
    function checkUserEventLiked($user_id,$id,$ColumnName){

        $result= $this->db->query('select u.id as user_id,u.email as email,u.name,lk.is_like,lk.is_favourite,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,lk.is_share,lk.is_rated,lk.rate FROM users as u left join app_event_like as lk on u.id = lk.user_id AND lk.'.$ColumnName.' = '.$id.' WHERE u.id = '.$user_id.' ');


        return $result->result_array();
    }
    function getBusinessCommentedUsers($business_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
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

    function getBusinesssLikedUsers($business_id){
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_share,l.is_favourite')
            ->from(TBL_USER.' as u')
            ->join(TBL_APP_EVENT_LIKE.' as l',"l.user_id = u.id",'LEFT',FALSE)
            ->where('l.business_id',$business_id)
            ->where('l.deleted','0')
            ->LIMIT(10);

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
    function CreatedUserData($user_id){
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage')
            ->from(TBL_USER.' as u')
            ->where('u.id',$user_id)
            ->where('u.deleted','0');

        $result = $this->db->get();

        return $result->result_array();
    }
   public function CountRecords($user_id,$tableName) {

        $this->db->where('user_id',$user_id);
        $this->db->where('deleted',0);
        $this->db->from($tableName);
        return $this->db->count_all_results();
    }
    function getMyWishListsData($postData){

        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];
        $user_id = $postData['user_id'];

        $Limit = $postData['Limit'];
        $Offset = $postData['Offset'];




        $Offset = (($Offset-1)*$Limit);




        $DistanceType = $postData['DistanceType'];
        if($DistanceType=='Mile'){
            $iRadiant=3959;
        }else{
            $iRadiant=6371;
        }


        $result = $this->db->query('SELECT id,user_id,title,description,location,address,venue,type,distance,url,totallike,totalshare,totalfavorite,category_id,start_time,end_time,datetime,working_hours,Lattitude,Longitude,since,mobile,email,cityID,website,fb_link,twitter_link,gplus_link,ticket_url
                        FROM 
                        (SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,"address" as address,evt.venue,"event" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) ) 
* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
                        AS distance,evt.cover_image AS url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,"email" as email ,evt.cityID,"website" as website,"fb_link" as fb_link,"twitter_link" as twitter_link,"gplus_link" as gplus_link,evt.website as ticket_url'
            . '     FROM '.TBL_APP_EVENT_LIKE.' as elk LEFT JOIN '.TBL_EVENT.' as evt ON elk.event_id=evt.id   WHERE elk.user_id='.$user_id.' AND elk.event_id!="" and elk.is_favourite=1
                        UNION ALL
                        SELECT DISTINCT  bns.id,bns.user_id,bns.name AS title,bns.description,bns.location,bns.address,"venue" as venue,"business" as type,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(latitude) ) 
* cos( radians(longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(latitude)) ) )
                          AS distance,CONCAT("'.DOMAIN_URL.'/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.email,bns.cityID,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link,"ticket_url" as ticket_url'
            . '     FROM '.TBL_APP_EVENT_LIKE.'  elk LEFT JOIN '.TBL_BUSINESS.' as bns ON elk.business_id=bns.id  WHERE elk.user_id='.$user_id.' AND elk.business_id!="" and elk.is_favourite=1
                        UNION ALL
                         SELECT offers.id as id,offers.user_id,offers.name as title,offers.description,"","","","offer" as type,"",CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.totallike,offers.totalshare,offers.totalfavorite,"",offers.start_time,offers.end_time,offers.datetime,"","","","","","",offers.cityID,"website" as website,"fb_link" as fb_link,"twitter_link" as twitter_link,"gplus_link" as gplus_link,"ticket_url" as ticket_url
                  FROM ' . TBL_APP_EVENT_LIKE . ' as elk LEFT JOIN '.TBL_OFFERS.' as offers ON elk.offer_id=offers.id  WHERE elk.user_id='.$user_id.' AND elk.offer_id!="" and elk.is_favourite=1
                        ) t order by distance asc  LIMIT '.$Offset.','.$Limit.'  ');
        return $result->result_array();
    }
    function getMyWishListsDataByDate($postData){

        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];
        $user_id = $postData['user_id'];

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
        $result = $this->db->query('SELECT id,user_id,title,description,location,address,venue,type,distance,url,totallike,totalshare,totalfavorite,category_id,start_time,end_time,datetime,working_hours,Lattitude,Longitude,since,mobile,email,cityID,website,fb_link,twitter_link,gplus_link,ticket_url
                     from (SELECT DISTINCT  evt.id,evt.user_id,evt.title,evt.description,evt.location,"address" as address,evt.venue,"event" as type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(lat) )
* cos( radians(lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(lat)) ) )
                        AS distance,CONCAT("'.DOMAIN_URL.'/", evt.cover_image) AS url,evt.totallike,evt.totalshare,evt.totalfavorite,evt.category_id,evt.start_time,evt.end_time,"datetime" as datetime,"working_hours" as working_hours,evt.lat as Lattitude,evt.lng as Longitude,"since" as since,"mobile" as mobile,"email" as email,evt.website as ticket_url FROM '.TBL_APP_EVENT_LIKE.' as elk LEFT JOIN '.TBL_EVENT.' as evt ON elk.event_id=evt.id   WHERE elk.user_id='.$user_id.' AND elk.event_id!="" and elk.is_favourite=1 AND FROM_UNIXTIME(evt.start_time,"%Y-%m-%d") BETWEEN "'.$start_date.'" AND "'.$end_date.'"
                        UNION ALL
                        SELECT  DISTINCT  bns.id,bns.user_id,bns.name AS title,bns.description,bns.location,bns.address,"venue" as venue,"business" as type,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(latitude) )
* cos( radians(longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(latitude)) ) )
                          AS distance,CONCAT("'.DOMAIN_URL.'/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.cityID,bns.email,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link,"ticket_url" as ticket_url FROM '.TBL_APP_EVENT_LIKE.' as  elk LEFT JOIN '.TBL_BUSINESS.' as bns ON elk.business_id=bns.id  WHERE elk.user_id='.$user_id.' AND elk.business_id!="" and elk.is_favourite=1 AND FROM_UNIXTIME(bns.datetime,"%Y-%m-%d") BETWEEN "'.$start_date.'" AND "'.$end_date.'"
                           UNION ALL
                         SELECT offers.id as id,offers.user_id,offers.name as title,offers.description,"","","","offer" as type,"",CONCAT("' . DOMAIN_URL . '/", offers.image_path) AS url,offers.totallike,offers.totalshare,offers.totalfavorite,"",offers.start_time,offers.end_time,offers.datetime,"","","","","","",""
                  FROM ' . TBL_APP_EVENT_LIKE . ' as elk LEFT JOIN '.TBL_OFFERS.' as offers ON elk.offer_id=offers.id WHERE elk.user_id='.$user_id.' AND elk.offer_id!="" and elk.is_favourite=1 AND offers.end_time BETWEEN "'.$start_date.'" AND "'.$end_date.'"
                        ) t ');
        //    echo $this->db->last_query(); exit;
        return $result->result_array();

    }

    // offers
    function get_offer_comments($offer_id)
    {
        $this->db->select('c.id as comment_id,u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,c.comment,lk.rate,lk.is_rated')
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
    function getMyOffersData($postData)
    {


        $result=$this->db->query('SELECT offers.id as offer_id,CONCAT("'.DOMAIN_URL.'/", offers.image_path) AS url,offers.name,offers.description,offers.start_time,offers.end_time,offers.business_id,offers.totallike,offers.totalshare,offers.user_id,offers.totalfavorite,payment.duration,payment.payment_date,payment.payment_status
                  FROM '.TBL_OFFERS.' as offers  LEFT JOIN  '.TBL_PAYMENT_MASTER.' as payment  ON offers.business_id=payment.business_id  WHERE offers.deleted="0" AND offers.business_id="'.$postData['business_id'].'" AND payment.transaction_id="'.$postData['transaction_id'].'" AND payment.type="offer"  AND payment_status="approved" AND offers.eStatus="1"  ',FALSE);
        return $result->result_array();
    }
    function update_offer($data, $id = NULL) {
        $this->_table_name =TBL_OFFERS;
        parent::update($data, $id);
        return $id;
    }
    function update_ads($data, $id = NULL) {
        $this->_table_name =TBL_ADVERTISMENT;
        parent::update($data, $id);
        return $id;
    }
    function delete_business($data, $id = NULL) {
        $this->_table_name =TBL_BUSINESS;
        parent::update($data, $id);
        return $id;
    }
     function delete_ads($postData = array(),  $id = ''){
        $this->db->where('business_id', $id);
        $this->db->update(TBL_ADVERTISMENT, $postData);

        return true;
    }
     function delete_offer($postData = array(),  $id = ''){
        $this->db->where('business_id', $id);
        $this->db->update(TBL_OFFERS, $postData);

        return true;
    }
    
    
    function get_business_ads_subscription_data($business_id)
    {


        $result=$this->db->query('SELECT ads.id as ads_id,payment.ads_type,ads.cityID,ads.time,CONCAT("'.DOMAIN_URL.'/", ads.image) AS url,CONCAT("'.DOMAIN_URL.'/", ads.image_footer) AS image_footer,ads.title,ads.description,ads.start_time,ads.end_time,ads.business_id,ads.totalclicks,ads.is_completed,ads.user_id,ads.ads_type,payment.duration,payment.payment_date,payment.transaction_id,payment.amount,payment.payment_status
                  FROM '.TBL_ADVERTISMENT.' as ads  LEFT JOIN  '.TBL_PAYMENT_MASTER.' as payment  ON ads.business_id=payment.business_id  WHERE ads.deleted="0" AND ads.business_id="'.$business_id.'" AND payment.type="ads"  AND payment_status="approved"  ',FALSE);
        return $result->result_array();


    }

    function get_business_offer_subscription_data($business_id)
    {


        $result=$this->db->query('SELECT payment.duration,payment.payment_date,payment.transaction_id,payment.amount,payment.payment_status
                  FROM  '.TBL_PAYMENT_MASTER.' as payment   WHERE payment.deleted="0" AND payment.business_id="'.$business_id.'" AND payment.type="offer"  AND payment_status="approved"  ',FALSE);
        return $result->result_array();


    }
    function count_business_offers($business_id)
    {


        $result=$this->db->query('SELECT count(id) as offer_count
                  FROM  '.TBL_OFFERS.' as offer   WHERE  offer.business_id="'.$business_id.'" AND offer.deleted="0"  ',FALSE);
        return $result->result_array();


    }
    function get_ads_revenue($ads_id)
    {
        $result=$this->db->query('SELECT SUM(clicks) AS total_click,date
                  FROM  '.TBL_ADVERTISMENT_REVENUE.' as revenue   WHERE  revenue.ads_id="'.$ads_id.'" AND revenue.deleted="0" AND revenue.eStatus="1" GROUP BY revenue.date ORDER BY revenue.date DESC ',FALSE);
        return $result->result_array();
    }

    function getOfferLikedUsers($offer_id){
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.rate,l.is_share,l.is_favourite')
            ->from(TBL_USER.' as u')
            ->join(TBL_APP_EVENT_LIKE.' as l',"l.user_id = u.id",'LEFT',FALSE)
            ->where('l.offer_id',$offer_id)
            ->where('l.deleted','0')
            ->LIMIT(10);

        $result = $this->db->get();

        return $result->result_array();
    }
    function checkUserOfferLiked($user_id,$id,$ColumnName){

        $result= $this->db->query('select u.id as user_id,u.email as email,u.name,lk.is_like,lk.is_favourite,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,lk.is_share,lk.is_rated ,lk.rate FROM users as u left join app_event_like as lk on u.id = lk.user_id AND lk.'.$ColumnName.' = '.$id.' WHERE u.id = '.$user_id.' ');


        return $result->result_array();
    }

    public function CountNotificationRecords($user_id) {


        $result = $this->db->query(' SELECT COUNT(id) as notification_count  FROM '.TBL_NOTIFICATION_MASTER.' WHERE deleted=0 AND eStatus=1 AND user_id='.$user_id.' and is_status=1');
// echo $this->db->last_query(); exit;
        return $result->result_array();
    }

	function get_single_event($array) {
        $this->_table_name = 'tbl_events';
        $fields = '*';
        $query = parent::get_single($array, $fields);
        return $query;
    }

    function get_event_media($array){
        return $this->db->get_where(TBL_APP_MEDIA,$array)->result_array();
    }
}
