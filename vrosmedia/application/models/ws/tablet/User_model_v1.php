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
        $fields = '*';
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

    function GetTaxiClassName($array) {
        $this->_table_name = 'texi_class';
        $fields = 'id,name';
        $query = parent::get_single($array, $fields);
        return $query;
    }
    function GetTaxiCompanyName($array) {
        $this->_table_name = 'texi_company';
        $fields = 'id,name';
        $query = parent::get_single($array, $fields);
        return $query;
    }





}
