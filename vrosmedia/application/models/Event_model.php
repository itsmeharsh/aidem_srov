<?php

class Event_model extends Common_model
{

    public $_table = TBL_EVENT;
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
        $this->db->where('type',2);
        $this->db->order_by('name','asc');

        $query = $this->db->get();
       
        return $query->result_array();
      }

    function getData() {
        
        $this->db->select('e.id,e.title,e.venue,e.start_time,e.end_time,e.totallike,e.totalshare,e.totalfavorite,u.first_name', FALSE);
        $this->db->from('app_event as e');
        $this->db->join('users as u','u.id = e.user_id','inner');
        $this->db->where($this->_where);

        $query = $this->db->get();
       
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return '';
    }
    function getCity() {
        
        $this->db->select("id,name,country",FALSE);         
        $this->db->from('city');
        
        $this->db->order_by('name','asc');

        $query = $this->db->get();
       
        return $query->result_array();
    }



    function getRecordById() {
        $result = $this->db->select('e.*, media_path')
                        ->from('app_event as e')
                        ->join('app_media as i','i.event_id = e.id AND i.event_id IS NOT NULL','left')
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
            $postData = $this->general_model->getDatabseFields($postData, TBL_USER);
            $postData['user_id'] = $arrSessionDetails['ADMINID'];
            $id=parent::insert($postData);           
            
        } else {
            
            // Update here
            $postData = $this->general_model->getDatabseFields($postData, TBL_USER);
            parent::update($postData, $id);
            
        }
        return $id;
    }
    function update_image($postData = array()) { 
        $this->db->insert('app_media',$postData);

        // $check = $this->db->query('SELECT event_id FROM app_media WHERE event_id = '.$postData['event_id'].' LIMIT 1')->row_array();

        // $postData = $this->general_model->getDatabseFields($postData, 'app_media');
        // if(count($check))
        // {
        //     $this->db->set($postData);
        //     $this->db->where('id', $postData['event_id']);
        //     $this->db->update('app_media');
            
        // }  
        // else
        // {
        //     $this->db->insert('app_media',$postData); 
            
        // }
                     
		
        
	}
function insert_data_for_all_update($array) {
	    $this->db->insert('app_event',$array);
        return true;
	}
	function update_data_for_all_update($data, $id = NULL) {
		$this->db->where('id',$id);
        $this->db->update('app_event',$data);
	}
         function update_data_for_all_update1($data, $id = NULL) {
		$this->db->where('eventfull_id',$id);
        $this->db->update('app_event',$data);
	}

        function check_event_for_all_update($eventfull_id) {
		
        $result = $this->db->select('eventfull_id')
                        ->from('app_event')
                         ->where('eventfull_id',$eventfull_id)        
                        ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
    

}

?>