<?php

class Business_model extends Common_model
{

    public $_table = TBL_BUSINESS;
    public $_fields = "*";
    public $_where = array();
    protected $_primary_key = 'id';
    public $_except_fields = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

      function getBusCat() {
        $this->db->select("id,name,image",FALSE);         
        $this->db->from('category');
        $this->db->where('type',1);
        $this->db->order_by('name','asc');

        $query = $this->db->get();
       
        return $query->result_array();
      }

    function getBusinessData() {
        
        $this->db->select($this->_fields, FALSE);
        $this->db->from($this->_table);
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }

    function getBusinessById() {
        $result = $this->db->select('b.*, media_path')
                        ->from('business as b')
                        ->join('app_media as i','i.business_id = b.id AND business_id IS NOT NULL','left')
                        ->where($this->_where)
                        ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }

     
       
     public function insertData($postData = array(), $key = '', $id = '') {

        if ($id == NULL) {            
            // Insert Here            
            $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);
            $id=parent::insert($postData);           
            
        } else {
            
            // Update here
            $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);
            parent::update($postData, $id);
            
        }
        return $id;
    }
    function update_image($postData = array()) { 

        $this->db->insert('app_media',$postData);

        // $check = $this->db->query('SELECT business_id FROM app_media WHERE business_id = '.$postData['business_id'].' LIMIT 1')->row_array();

        // $postArray = $this->general_model->getDatabseFields($postData, 'app_media');
        // if(count($check))
        // {
        //     $this->db->set($postData);
        //     $this->db->where('id', $postData['business_id']);
        //     $this->db->update('app_media');
            
        // }  
        // else
        // {
             
        //     $this->db->insert('app_media',$postData); 
            
        // }
                     
		
        
	}
  /*-------------------------------------------------------business Detail View ------------------------------    */  
       function getDetailBusinessData($business_id)
    {

        $this->db->select('bns.id,bns.user_id,bns.name AS title,bns.description,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link,bns.location,bns.latitude,bns.longitude,bns.address,"venue" as venue,"business" as type,CONCAT("' . DOMAIN_URL . '/", bns.cover_image) AS url,bns.totallike,bns.totalshare,bns.totalfavorite,bns.category_id,"start_time" as start_time,"end_time" as end_time,bns.datetime,bns.working_hours,bns.latitude as Lattitude,bns.longitude as Longitude,bns.since,bns.mobile,bns.email,"" as duration,"" as payment_date,"" as payment_status,bns.website,bns.fb_link,bns.twitter_link,bns.gplus_link', FALSE)
            ->from(TBL_BUSINESS . ' as bns');


        $this->db->where('bns.deleted', '0');
        $this->db->where('bns.id', $business_id);

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
        function getBusinesssLikedUsers($business_id)
    {
        $this->db->select('u.id as user_id,u.name,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,l.is_like,l.rate,l.is_share,l.is_favourite')
            ->from(TBL_USER . ' as u')
            ->join(TBL_APP_EVENT_LIKE . ' as l', "l.user_id = u.id", 'LEFT', FALSE)
            ->where('l.business_id', $business_id)
            ->where('l.deleted', '0')
            ->LIMIT(10);

        $result = $this->db->get();

        return $result->result_array();
    }
     function checkUserEventLiked($user_id, $id, $ColumnName)
    {

        $result = $this->db->query('select u.id as user_id,u.email as email,u.name,lk.is_like,lk.is_favourite,case when u.image regexp "uploads" then CONCAT("' . DOMAIN_URL . '/", u.image) else u.image end  as userImage,lk.is_share,lk.is_rated ,lk.rate FROM users as u left join app_event_like as lk on u.id = lk.user_id AND lk.' . $ColumnName . ' = ' . $id . ' WHERE u.id = ' . $user_id . ' ');


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
   /*------------------------------------------------------GRAPH ----------------------------------------------------------------------*/
    function Graph($postData,$type)
    {
        $business_id=$postData['business_id'];
        
        //get lable
        
        
        
        $date2=$postData['start_date'];
        $date1=$postData['end_date'];

        if($date1!='' && $date2!=''){
            $startTimeStamp = strtotime($date2);
            $endTimeStamp = strtotime($date1);

            $timeDiff = abs($endTimeStamp - $startTimeStamp);

            $numberDays = $timeDiff/86400;  // 86400 seconds in one day

            $days = intval($numberDays);
            
            

        }else{
            $date1=date('Y-m-d');
            $date2 =  date('Y-m-d', strtotime('-15 days', strtotime($date1)));
            $days=15;
        }
        
     

        $select_string='';
        $select_string.='select DATE("'.$date1.'") as day ';


        for($i=1;$i<=$days;$i++){
            $select_string.='union select DATE("'.$date1.'") - interval '.$i.' day ';
        }




        $result=$this->db->query('SELECT days.day, count(clicks) as clicks,business_id,type FROM
                    ('.$select_string.') days
                left join  advertise_revenue
                 on days.day =  advertise_revenue.date
                 WHERE (advertise_revenue.deleted="0"  OR advertise_revenue.business_id IS NULL)
              group by
                days.day');
   //echo $this->db->last_query(); exit;
        return $result->result_array();
    }
    function GraphData($business_id,$date,$type)
    {
        $result=$this->db->query('SELECT count(clicks) as clicks FROM
                    advertise_revenue
                 WHERE deleted="0" AND business_id="'.$business_id.'" AND date="'.$date.'" AND type="'.$type.'" group by date');
        //echo $this->db->last_query(); exit;
          return $result->row()->clicks;  
    }

}

?>