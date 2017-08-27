<?php
class Event_live_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }
   
     function check_event($eventfull_id) {
        $result = $this->db->select('eventfull_id')
                        ->from('app_event')
                         ->where('eventfull_id',$eventfull_id)        
                        ->get()->row_array();
        if (!empty($result))
            return $result;
        else
            return array();
    }
        function insert_data($array) {

                $this->db->insert('app_event',$array);
                return true;
	}

	function update_data($data, $id = NULL) {                
		$this->db->where('eventfull_id',$id);
               $this->db->update('app_event',$data);
	}
 

}

?>