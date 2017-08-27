<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class News_model_v1 extends MY_Model {

    protected $_table_name = TBL_NEWS;
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id DESC";

    function __construct() {
        parent::__construct();

    }
    function get_newsData($limit,$start,$cityID='',$categoryid=''){
        
        if($cityID!=''){
         $where.=' AND cityID="'.$cityID.'"';
        }else{
            $where.='';
        }
        if($categoryid!=''){
         $where.=' AND id="'.$categoryid.'"';
        }else{
            $where.='';
        }
        $result=$this->db->query('SELECT *
                  FROM '.TBL_NEWS.'   WHERE deleted="0"  '.$where.'  LIMIT '.$limit.' OFFSET '.$start.' ',FALSE);
        return $result->result_array();
    }
    function CategoryData($categoryid){
        $this->db->select('ct.name')
            ->from(TBL_NEWS_CATEGORY.' as ct')
            ->where('ct.id',$categoryid)
            ->where('ct.deleted','0');

        $result = $this->db->get();

        return $result->row_array();
    }







}
