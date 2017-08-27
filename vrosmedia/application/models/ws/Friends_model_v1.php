<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Friends_model_v1 extends MY_Model {

	protected $_table_name = TBL_FRIENDS;
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "id DESC";

	function __construct() {
		parent::__construct();

	}
        
       function get_UserData($postData) {
           
            $lat = $postData['deLatitude'];
            $lon = $postData['deLongitude'];
            $user_id = $postData['user_id'];
            
            
            if(isset($postData['friend_user_id'])==''){
                $friend_user_id='';
            }else{
                $friend_user_id=$postData['friend_user_id'];
            }
        
            $DistanceType = 'Mile';
            if($DistanceType=='Mile'){
                $iRadiant=3959;
            }else{
                $iRadiant=6371;
            }
         
          if(isset($postData['searchKey'])=='' &&  $friend_user_id==''){
          
            $result=$this->db->query('SELECT  u.id as user_id,b.id as request_id, u.fb_link,u.twitter_link,u.gplus_link,u.description,u.fav_book,u.fav_music,u.fav_food,u.fav_drink,u.fav_place, u.name, u.work_email, u.work_phone,CASE WHEN b.touser_id = "'.$user_id.'" THEN "sender" WHEN b.user_id="'.$user_id.'" THEN "receiver" END as is_sender,u.address, u.email,"'.$DistanceType.'" as distance_type, b.is_friend AS is_friend_status,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) ) 
          * cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as image
                                          FROM
                                              users u
                                          LEFT JOIN
                                              app_friends b ON 
                                                  u.id IN (b.touser_id, b.user_id) AND
                                                   "'.$user_id.'" IN (b.touser_id, b.user_id)
                                          WHERE
                                              u.id <> "'.$user_id.'" AND u.active=1 AND u.deleted=0 AND u.user_type="u"  ORDER BY distance ASC ');
          }elseif($friend_user_id!=''){
      
               $result=$this->db->query('SELECT DISTINCT u.id as user_id, u.fb_link,u.twitter_link,u.gplus_link,u.description,u.fav_book,u.fav_music,u.fav_food,u.fav_drink,u.fav_place,b.id as request_id,CASE WHEN b.user_id = "'.$friend_user_id.'" THEN "sender" WHEN b.touser_id="'.$friend_user_id.'" THEN "receiver" END as is_sender, u.work_email, u.work_phone,u.address, u.name,u.phone,u.work_email,u.work_phone,u.address,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage, u.email,"'.$DistanceType.'" as distance_type, b.is_friend AS is_friend_status,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) )
          * cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance
                                          FROM
                                              users u
                                          LEFT JOIN
                                              app_friends b ON 
                                                  ("'.$user_id.'" = b.user_id OR
                                                   "'.$user_id.'"= b.touser_id) AND
                                                   "'.$friend_user_id.'" IN (b.touser_id, b.user_id)    
                                          WHERE
                                              u.id ="'.$friend_user_id.'" AND  ( b.is_friend = 0 OR b.is_friend = 1 OR b.is_friend IS NULL)  AND u.active=1 AND u.deleted=0 AND u.user_type="u"  ORDER BY distance ASC ');

          }else{
        
              $result=$this->db->query('SELECT  u.id as user_id,b.id as request_id, u.fb_link,u.twitter_link,u.gplus_link,u.description,u.fav_book,u.fav_music,u.fav_food,u.fav_drink,u.fav_place, u.name,  u.work_email, u.work_phone,CASE WHEN b.touser_id = "'.$user_id.'" THEN "sender" WHEN b.user_id="'.$user_id.'" THEN "receiver" END as is_sender,u.address,u.email,"'.$DistanceType.'" as distance_type, b.is_friend AS is_friend_status,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) ) 
          * cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as image
                                          FROM
                                              users u
                                          LEFT JOIN
                                              app_friends b ON 
                                                  u.id IN (b.touser_id, b.user_id) AND
                                                   "'.$user_id.'" IN (b.touser_id, b.user_id)
                                          WHERE
                                              u.id <> "'.$user_id.'" AND u.active=1 AND u.deleted=0 AND u.user_type="u" AND u.name LIKE "%' . $postData['searchKey'] .  '%"  ORDER BY distance ASC ');
              
          }

        return $result->result_array();

	
	}
        function get_single_user($array,$postData) {
           
                $lat = $postData['deLatitude'];
                $lon = $postData['deLongitude'];
                $DistanceType = 'Mile';
                if($DistanceType=='Mile'){
                    $iRadiant=3959;
                }else{
                    $iRadiant=6371;
                }
            
		$this->_table_name = TBL_USER;
		$fields = 'id as user_id,work_email,"" as is_sender,work_phone,address,name,email,phone,work_phone,address,CONCAT("'.DOMAIN_URL.'/", image) AS userImage,"'.$DistanceType.'" as distance_type, "" AS is_friend_status,("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(deLatitude) ) 
          * cos( radians(deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(deLatitude)) ) ) AS distance';
		$query = parent::get_single($array, $fields);
		return $query;
	    }
        function UserSingleUserDetail($array,$fields){
            $this->_table_name = TBL_USER;
            $fields = 'id as user_id,name,deviceid,image,is_notification';
            $query = parent::get_single($array, $fields);
            return $query;

        }
        function add_notification_data($postData) {
		 $this->_table_name = TBL_NOTIFICATION_MASTER;
		   return parent::insert($postData);
               
	     }
        function check_request_exits($postData){
                $user_id = $postData['user_id'];
                $touser_id = $postData['touser_id'];
                
                $result=$this->db->query('SELECT  id,is_friend from app_friends WHERE ((touser_id="'.$touser_id.'" and user_id="'.$user_id.'") OR (user_id="'.$touser_id.'" and touser_id="'.$user_id.'"))  AND  deleted="0" ');
                
                return $result->result_array();
        }
        function check_FriendrequestByID($postData){
                $id = $postData['request_id'];
               
                
                $result=$this->db->query('SELECT  id,user_id,touser_id from app_friends WHERE id="'.$id.'" AND  deleted="0" ');
                
                return $result->result_array();
        }
        
        function send_friendsRequests($postData,$id='') {
		$postData['deleted'] ="0";
                if($id!=''){   
                    
                    parent::update($postData, $id);
                    return $id;
                    
                }else{
                    
		    return parent::insert($postData);
                }
	}
        function received_friends_request($postData){
            
            $lat = $postData['deLatitude'];
            $lon = $postData['deLongitude'];
            $user_id = $postData['user_id'];
            
            $DistanceType = 'Mile';
            if($DistanceType=='Mile'){
                $iRadiant=3959;
            }else{
                $iRadiant=6371;
            }
            $result=$this->db->query('SELECT b.id as request_id, u.id as user_id, u.name, u.email,"'.$DistanceType.'" as distance_type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) ) 
* cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as image
                                FROM
                                    users u
                                LEFT JOIN
                                    app_friends b ON b.touser_id=u.id
                                    
                                WHERE
                                    b.user_id= "'.$user_id.'" AND u.active="1" AND u.deleted="0" AND u.user_type="u" AND b.deleted="0" AND b.is_friend="0"  ORDER BY distance ASC ');
           //echo $this->db->last_query(); exit;
            return $result->result_array();
        
        }
        function friends($postData){
            
            $lat = $postData['deLatitude'];
            $lon = $postData['deLongitude'];
            $user_id = $postData['user_id'];
            
            $DistanceType = 'Mile';
            if($DistanceType=='Mile'){
                $iRadiant=3959;
            }else{
                $iRadiant=6371;
            }
         
           $result = $this->db->query('SELECT request_id,user_id,name,email,distance_type,distance,image
                        FROM 
                        (SELECT b.id as request_id, u.id as user_id, u.name, u.email,"'.$DistanceType.'" as distance_type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) ) 
* cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as image
                                FROM
                                    app_friends b
                                LEFT JOIN
                                    users u ON b.touser_id=u.id                                    
                                WHERE
                                    b.user_id= "'.$user_id.'" AND  b.is_friend="1"
                        UNION ALL
                        SELECT b.id as request_id, u.id as user_id,u.name, u.email,"'.$DistanceType.'" as distance_type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) ) 
* cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as image
                                FROM
                                    app_friends b
                                LEFT JOIN
                                    users u ON b.user_id=u.id  
                                WHERE
                                b.touser_id= "'.$user_id.'" AND  u.deleted="0" AND u.user_type="u" AND b.deleted="0" AND b.is_friend="1"
                        ) t order by distance asc');
           
            return $result->result_array();
        
        }
        
        function search_friends($postData){
            
            $lat = $postData['deLatitude'];
            $lon = $postData['deLongitude'];
            $user_id = $postData['user_id'];
            
            $DistanceType = 'Mile';
            if($DistanceType=='Mile'){
                $iRadiant=3959;
            }else{
                $iRadiant=6371;
            }
         
           $result = $this->db->query('SELECT request_id,user_id,name,email,distance_type,distance,image
                        FROM 
                        (SELECT b.id as request_id, u.id as user_id, u.name, u.email,"'.$DistanceType.'" as distance_type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) ) 
* cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as image
                                FROM
                                    app_friends b
                                LEFT JOIN
                                    users u ON b.touser_id=u.id                                    
                                WHERE
                                    b.user_id= "'.$user_id.'" AND  b.is_friend="1" AND u.name LIKE "%' . $postData['searchKey'] .  '%"
                        UNION ALL
                        SELECT b.id as request_id, u.id as user_id,u.name, u.email,"'.$DistanceType.'" as distance_type, ("' . $iRadiant . '" * acos( cos( radians("' . $lat . '") ) * cos( radians(u.deLatitude) ) 
* cos( radians(u.deLongitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(u.deLatitude)) ) ) AS distance,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as image
                                FROM
                                    app_friends b
                                LEFT JOIN
                                    users u ON b.user_id=u.id  
                                WHERE
                                b.touser_id= "'.$user_id.'" AND  u.deleted="0" AND u.user_type="u" AND u.name LIKE "%' . $postData['searchKey'] .  '%" AND b.deleted="0" AND b.is_friend="1"
                        ) t order by distance asc');
           
            return $result->result_array();
        
        }


       
      
	

}
