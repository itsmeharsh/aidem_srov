
<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Event_model_v1 extends MY_Model {

    protected $_table_name = 'tbl_events';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }

    function getEventList($postData,$count = false){
        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];
        $DistanceType = $postData['DistanceType'];
        if ($DistanceType == 'Mile')
            $iRadiant = 3959;
        else
            $iRadiant = 6371;

        $this->db->select('e.*,(' . $iRadiant . ' * acos( cos( radians("' . $lat . '") ) * cos( radians(e.lat) ) * cos( radians(e.lng) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(e.lat)) ) ) as distance, (SELECT COUNT(view_id) FROM tbl_views WHERE relation_id = e.id AND type = "event") as total_views,(SELECT AVG(star) FROM tbl_ratting WHERE relation_id = e.id AND type = "event") as avg_ratting,(SELECT COUNT(ratting_id) FROM tbl_ratting WHERE relation_id = e.id AND type = "event") as total_ratting,(SELECT COUNT(like_id) FROM tbl_likes WHERE relation_id = e.id AND type = "event") as total_likes,IFNULL(c.name,"") as category_name,IFNULL(ct.name,"") as city_name,u.name as owner,u.image as owner_image')
            ->from('tbl_events as e')
            ->join('category as c','e.category_id = c.id','left')
            ->join('city as ct','e.cityID = ct.id','left')
            ->join('users as u','e.user_id = u.id','inner')
            ->where(array('e.deleted' => 0))
            // ->where(array('c.active' => 1,'c.deleted' => 0))
            ->where(array('u.active' => 1,'u.deleted' => 0));
            
        if ($postData['searchKey'] != '')
            $this->db->like('e.title',$postData['searchKey']);

        if ($postData['category_id'] != '')
            $this->db->where('e.category_id',$postData['category_id']);  

        if ($postData['cityID'] != '')
            $this->db->where('e.cityID',$postData['cityID']);

        if ($postData['start_time'] != '')
            $this->db->where('e.start_time >=',strtotime($postData['start_time']));

        if ($postData['end_time'] != '')
            $this->db->where('e.end_time <=',strtotime($postData['end_time']));

        if ($postData['iRadius'] != '')
            $this->db->having('distance <=',$postData['iRadius']);


        $this->db->limit($postData['Limit'],$postData['Offset'])->order_by('distance','asc');

        if($count)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result_array();
    }

    function getEventDetail($id = 0){
        $event = $this->db->select('e.*,(SELECT COUNT(view_id) FROM tbl_views WHERE relation_id = e.id AND type = "event") as total_views,(SELECT AVG(star) FROM tbl_ratting WHERE relation_id = e.id AND type = "event") as avg_ratting,(SELECT COUNT(ratting_id) FROM tbl_ratting WHERE relation_id = e.id AND type = "event") as total_ratting,(SELECT COUNT(like_id) FROM tbl_likes WHERE relation_id = e.id AND type = "event") as total_likes,IFNULL(c.name,"") as category_name,IFNULL(ct.name,"") as city_name,u.name as owner,u.image as owner_image')
             ->from('tbl_events as e')
            ->join('category as c','e.category_id = c.id','left')
            ->join('city as ct','e.cityID = ct.id','left')
            ->join('users as u','e.user_id = u.id','inner')
            ->where(array('e.deleted' => 0))
            // ->where(array('c.active' => 1,'c.deleted' => 0))
            ->where(array('u.active' => 1,'u.deleted' => 0))
            ->where('e.id',$id)->get()->row_array();

        if(!empty($event)){
            $event['medias'] = $this->getAllMedia($event['id']);
            $event['attendee'] = $this->attendeeList($event['id']);
        }
        return $event;
    }

    function attendeeList($id = 0){
        $users = array();
        $users = $this->db->select('a.*,u.image')
                    ->from('tbl_event_attendee as a')
                    ->join('users as u','a.user_id = u.id','inner')
                    ->where(array('a.event_id'=>$id))
                    ->where(array('u.active' => 1,'u.deleted' => 0))
                    ->get()->result_array();

        foreach ($users as $key => $value) {
            if($value['image'] != '')
                $users[$key]['image'] = DOMAIN_URL.'/'.$value['image'];
        }
        return $users;
    }

    function add_event($array){
        $this->db->insert('tbl_events',$array);
        return $this->db->insert_id();
    }

    function update_event($array,$id){
        $this->db->update('tbl_events',$array,array('id'=>$id));
        return $id;
    }

    function unlink_event_file($table = '',$id = '',$return = ''){
        $data = $this->db->get_where($table,array('id'=>$id))->row_array();
        if(!empty($data))
            return $data[$return];
        else
            return '';
    }

    function getAllMedia($id){
        return $this->db->select('CONCAT("' . DOMAIN_URL . '/", m.media_path) AS image_path,type,id as media_id')
            ->from(TBL_APP_MEDIA . ' as m')
            ->where('m.event_id', $id)
            ->where('m.deleted', '0')->get()->result_array();
    }

    function checkUserLike($user_id = 0,$event_id = 0){
        $array = array('user_id'=>$user_id,'relation_id'=>$event_id,'type'=>'event');
        $row = $this->db->get_where('tbl_likes',$array)->num_rows();
        if($row > 0)
            return true;
        else
            return false;
    }

    function add_UserLike($array){
        $this->db->insert('tbl_likes',$array);
        return $this->db->insert_id();
    }

    function delete_UserLike($array){
        $this->db->delete('tbl_likes',$array);
    }

    function getTotalLikes($event_id){
        return $this->db->get_where('tbl_likes',array('relation_id'=>$event_id,'type'=>'event'))->num_rows();
    }

    function getEventRattings($array,$count = false){
        $this->db->select('r.user_id,r.star,r.comment,u.name,u.image')
                    ->from('tbl_ratting as r')
                    ->join('users as u','r.user_id = u.id','inner')
                    ->where(array('r.relation_id'=>$array['relation_id'],'r.type'=>'event','u.active' => 1,'u.deleted' => 0))
                    ->limit($array['Limit'],$array['Offset'])->order_by('ratting_id','desc');

        if($count)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result_array();
    }

    function checkUserRatting($user_id = 0,$event_id = 0){
        $array = array('user_id'=>$user_id,'relation_id'=>$event_id,'type'=>'event');
        $row = $this->db->get_where('tbl_ratting',$array)->num_rows();
        if($row > 0)
            return true;
        else
            return false;
    }

    function add_UserRatting($array){
        $this->db->insert('tbl_ratting',$array);
        return $this->db->insert_id();
    }

    function checkUserView($user_id = 0,$event_id = 0){
        $array = array('user_id'=>$user_id,'relation_id'=>$event_id,'type'=>'event');
        $row = $this->db->get_where('tbl_views',$array)->num_rows();
        if($row > 0)
            return true;
        else
            return false;
    }

    function add_UserView($array){
        $this->db->insert('tbl_views',$array);
        return $this->db->insert_id();
    }

    function checkUserFavourite($user_id = 0,$event_id = 0){
        $array = array('user_id'=>$user_id,'relation_id'=>$event_id,'type'=>'event');
        $row = $this->db->get_where('tbl_favourites',$array)->num_rows();
        if($row > 0)
            return true;
        else
            return false;
    }

    function add_UserFavourite($array){
        $this->db->insert('tbl_favourites',$array);
        return $this->db->insert_id();
    }

    function delete_UserFavourite($array){
        $this->db->delete('tbl_favourites',$array);
    }

    function checkUserAttend($user_id = 0,$event_id = 0){
        $array = array('user_id'=>$user_id,'event_id'=>$event_id);
        $row = $this->db->get_where('tbl_event_attendee',$array)->num_rows();
        if($row > 0)
            return true;
        else
            return false;
    }

    function add_UserAttend($array){
        $this->db->insert('tbl_event_attendee',$array);
        return $this->db->insert_id();
    }

    function delete_UserAttend($array){
        $this->db->delete('tbl_event_attendee',$array);
    }

    function add_event_medias($postData){
        $this->_table_name = TBL_APP_MEDIA;
        $postData['deleted'] = 0;
        $row_id = parent::insert($postData);
        return $row_id;
    }
}
