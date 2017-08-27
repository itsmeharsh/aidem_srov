
<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Article_model_v1 extends MY_Model {

    protected $_table_name = TBL_ARTICLE;
    protected $_primary_key = 'article_id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "article_id DESC";

    function __construct() {
        parent::__construct();

    }

    function getArticleList($postData,$count = false){
        $lat = $postData['deLatitude'];
        $lon = $postData['deLongitude'];
        $DistanceType = $postData['DistanceType'];
        if ($DistanceType == 'Mile')
            $iRadiant = 3959;
        else
            $iRadiant = 6371;

        $this->db->select('a.*,(' . $iRadiant . ' * acos( cos( radians("' . $lat . '") ) * cos( radians(a.latitude) ) * cos( radians(a.longitude) - radians("' . $lon . '") ) + sin( radians("' . $lat . '") ) * sin(radians(a.latitude)) ) ) as distance, (SELECT COUNT(view_id) FROM tbl_views WHERE relation_id = a.article_id AND type = "article") as total_views,(SELECT AVG(star) FROM tbl_ratting WHERE relation_id = a.article_id AND type = "article") as avg_ratting,(SELECT COUNT(ratting_id) FROM tbl_ratting WHERE relation_id = a.article_id AND type = "article") as total_ratting,(SELECT COUNT(like_id) FROM tbl_likes WHERE relation_id = a.article_id AND type = "article") as total_likes,c.name as category_name,ct.name as city_name,u.name as owner,u.image as owner_image')
            ->from('tbl_articles as a')
            ->join('category as c','a.category_id = c.id','inner')
            ->join('city as ct','a.cityID = ct.id','inner')
            ->join('users as u','a.user_id = u.id','inner')
            ->where(array('a.eStatus' => 'Active','a.eDelete' => '0'))
            ->where(array('c.active' => 1,'c.deleted' => 0))
            ->where(array('u.active' => 1,'u.deleted' => 0));
            
        if ($postData['searchKey'] != '')
            $this->db->like('a.title',$postData['searchKey']);

        if ($postData['category_id'] != '')
            $this->db->where('a.category_id',$postData['category_id']);  

        if ($postData['cityID'] != '')
            $this->db->where('a.cityID',$postData['cityID']);

        if ($postData['iRadius'] != '')
            $this->db->having('distance <=',$postData['iRadius']);

        $this->db->limit($postData['Limit'],$postData['Offset'])->order_by('distance','asc');

        if($count)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result_array();
    }

    function getArticleDetail($article_id = 0){
        $article = $this->db->select('a.*,(SELECT COUNT(view_id) FROM tbl_views WHERE relation_id = a.article_id AND type = "article") as total_views,(SELECT AVG(star) FROM tbl_ratting WHERE relation_id = a.article_id AND type = "article") as avg_ratting,(SELECT COUNT(ratting_id) FROM tbl_ratting WHERE relation_id = a.article_id AND type = "article") as total_ratting,(SELECT COUNT(like_id) FROM tbl_likes WHERE relation_id = a.article_id AND type = "article") as total_likes,c.name as category_name,ct.name as city_name,u.name as owner,u.image as owner_image')
            ->from('tbl_articles as a')
            ->join('category as c','a.category_id = c.id','inner')
            ->join('city as ct','a.cityID = ct.id','inner')
            ->join('users as u','a.user_id = u.id','inner')
            ->where(array('a.eStatus' => 'Active','a.eDelete' => '0'))
            ->where(array('c.active' => 1,'c.deleted' => 0))
            ->where(array('u.active' => 1,'u.deleted' => 0))
            ->where('a.article_id',$article_id)->get()->row_array();

        if(!empty($article)){
            $article['medias'] = $this->getAllMedia($article['article_id']);
        }
        return $article;
    }

    function getAllMedia($id){
        return $this->db->select('CONCAT("' . DOMAIN_URL . '/", m.media_path) AS image_path,type,id as media_id')
            ->from(TBL_APP_MEDIA . ' as m')
            ->where('m.article_id', $id)
            ->where('m.deleted', '0')->get()->result_array();
    }

    function checkUserLike($user_id = 0,$article_id = 0){
        $array = array('user_id'=>$user_id,'relation_id'=>$article_id,'type'=>'article');
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

    function getTotalLikes($article_id){
        return $this->db->get_where('tbl_likes',array('relation_id'=>$article_id,'type'=>'article'))->num_rows();
    }

    function getArticleRattings($array,$count = false){
        $this->db->select('r.user_id,r.star,r.comment,u.name,u.image')
                    ->from('tbl_ratting as r')
                    ->join('users as u','r.user_id = u.id','inner')
                    ->where(array('r.relation_id'=>$array['relation_id'],'r.type'=>'article','u.active' => 1,'u.deleted' => 0))
                    ->limit($array['Limit'],$array['Offset'])->order_by('ratting_id','desc');

        if($count)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result_array();
    }

    function checkUserRatting($user_id = 0,$article_id = 0){
        $array = array('user_id'=>$user_id,'relation_id'=>$article_id,'type'=>'article');
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

    function checkUserView($user_id = 0,$article_id = 0){
        $array = array('user_id'=>$user_id,'relation_id'=>$article_id,'type'=>'article');
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
}
