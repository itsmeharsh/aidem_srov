<?php
class Event extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Event_model','Event');
        $this->viewData['category'] = $this->Event->getBusCat();
        $this->viewData['city'] = $this->Event->getCity();
        $this->lang->load('event', $this->data['language']);
    }

   function index()
    {
        // $this->viewData['title'] = lang("EVENT_MNG");
        // $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'event' => "Event Category");
        // $this->viewData['module'] = "event/eventCat";
        // $this->load->view('admin/template', $this->viewData);
        $this->viewData['title'] = lang("EVENT_MNG");          
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'event' => "event type selection");
        $this->viewData['module'] = "event/eventType";
        $this->load->view('admin/template', $this->viewData);
    }
    function add($id= NULL)
    {  
        if($id > 0){
            $this->viewData['action'] = lang('EDIT');
            $this->Event->_where = array("e.id" => $id);
            $this->viewData['record'] = $this->Event->getRecordById();
           
        }
        else
        {
          $this->viewData['record'] = (array)get_column('app_event');
        }
        

        $this->viewData['title'] = $id > 0 ? 'Edit Event':'Add Event';     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'event' => "Event Category",'javascript:;'=>$this->viewData['title']);
        
        $this->load->view('admin/event/add', $this->viewData);       
    }

    public function lists($eventType='')
    {       
        if($eventType == 'local')
            $eventType = 'custom';
        elseif($eventType == 'general')
            $eventType = 'live';

        $this->Event->_where = array("e.deleted" =>'0','e.event_type' => $eventType);
        $this->viewData['eventData'] = $this->Event->getData(); 
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("EVENT_MNG");     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home",'event'=> "Event type", 'event/lists/'.$category.'' => "Event");
        $this->viewData['module'] = "event/list";
        $this->load->view('admin/template', $this->viewData);
    }

    public function save($id = null) {
     $postData = $this->input->post();

    $ID = (int)$this->input->post('id');

		$this->form_validation->set_rules($this->event_rules());

        
		if ($this->form_validation->run() == FALSE) {                    
			
                    $err = array(
                    '0' => $this->lang->line('BLANK_VALUE'),
                    );            
                    $this->session->set_userdata('ERROR', $err);

		} else { 

                $postData['start_time'] = strtotime( $postData['start_time']);
                $postData['event_time'] = strtotime( $postData['event_time']);
                $postData['cityID'] =$postData['city_id'];
                $postData['website'] =$postData['website'];
                 
                $postData['user_id'] ='13';
                $city=$postData['city_id'];
                
 
                $url = "http://maps.googleapis.com/maps/api/geocode/json?address=city";
                $json_data = file_get_contents($url);
                $result = json_decode($json_data, TRUE);
                $latitude = $result['results'][0]['geometry']['location']['lat'];
                $longitude = $result['results'][0]['geometry']['location']['lng'];
                $postData['lat'] =$latitude ;
                $postData['lng'] =$latitude ;
                $digits =11;
                $eventfull_id=rand(pow(10, $digits-1), pow(10, $digits)-1);
                $postData['eventfull_id'] =$eventfull_id;
                $postData['email'] ='admin@vros.com'; 
                

 
                //$ID = $this->Event->insertRow($postData, 'id', $ID);


                $aImageType = array('image/jpeg','image/jpg','image/png');
                foreach($_FILES['media_path']['name'] as $key => $files)
                {

                    $_FILES['image']['name'] = $_FILES['media_path']['name'][$key];
                    $_FILES['image']['type'] = $_FILES['media_path']['type'][$key];
                    $_FILES['image']['tmp_name'] = $_FILES['media_path']['tmp_name'][$key];
                    $_FILES['image']['error'] = $_FILES['media_path']['error'][$key];
                    $_FILES['image']['size'] = $_FILES['media_path']['size'][$key];
                    
                    if($_FILES['image']['size'] <= 2048000 && $_FILES['image']['name']!="" && in_array($_FILES['image']['type'],$aImageType))
                    {
                        //$file_upload = parent::saveFile('image', 'uploads/events/' . $ID . '/');
                         $file_upload = parent::saveFile('image', 'uploads/events/'); 
                                         
                        if ($file_upload['file_name'] != "") {
                                    $postArray = array();
                                   // $postArray['media_path'] = 'event/' . $ID . '/' . $file_upload['file_name'];
                                    //$postArray['event_id'] = $ID; 
                                    //$postArray['type'] = 'image';                                               
                                   // $this->Event->update_image($postArray);
                                    $postData['cover_image'] ='uploads/events/'. $file_upload['file_name'];                                    
                                   
                        } 
                    }

                }
                $ID = $this->Event->insertRow($postData, 'id', $ID); 
                $aVideoType = array('video/3gpp','video/mp4');
                
                foreach($_FILES['video_path']['name'] as $key => $files)
                {
                    
                    $_FILES['video']['name'] = $_FILES['video_path']['name'][$key];
                    $_FILES['video']['type'] = $_FILES['video_path']['type'][$key];
                    $_FILES['video']['tmp_name'] = $_FILES['video_path']['tmp_name'][$key];
                    $_FILES['video']['error'] = $_FILES['video_path']['error'][$key];
                    $_FILES['video']['size'] = $_FILES['video_path']['size'][$key];
                    
                    if($_FILES['video']['size'] <= 50000000 && $_FILES['video']['name']!="" && in_array($_FILES['video']['type'],$aVideoType))
                    {

                        $file_upload = parent::saveFile('video', 'uploads/event/' . $ID . '/');
                                         
                        if ($file_upload['file_name'] != "") {
                                    $postArray = array();
                                    $postArray['media_path'] = 'event/' . $ID . '/' . $file_upload['file_name'];
                                    $postArray['event_id'] = $ID; 
                                    $postArray['type'] = 'video';                                               
                                    $this->Event->update_image($postArray);                                    
                                   
                        } 
                    }

                }              
                                          
                
                                                
                             if ($this->input->post('id') > 0) {
                                     $err = array(
                                                '0' => $userType.' '.$this->lang->line('EDITED'),
                                              );
            
                                      $this->session->set_userdata('SUCCESS', $err);

                               } else if($ID != '') {
                                     $err = array(
                                                '0' => $userType.' '.$this->lang->line('ADDED'),
                                              );
            
                                      $this->session->set_userdata('SUCCESS', $err);
                                     

                               } else {
                                      $err = array(
                                               '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                                              );
            
                                      $this->session->set_userdata('ERROR', $err);
                               }
                    
        
	}
       
        redirect("admin/event/lists/".$postData['category_id']);
      }
    function status($id = '')
    {

        if ($id >0)
        {
            $changeStatus = $this->Event->changeStatus('id', $id);
            if ($changeStatus != '')
            {
                $data['result'] = 'success';
                $data['message'] = 'Status changed successfully.';
            } else
            {
                $data['result'] = 'error';
                $data['message'] = 'Error in updation.Please try again.';
            }
            echo json_encode($data);
            exit;
        }
    }
     function remove($id = '')
    {
        if (isset($id) && $id > 0)
        {

            $DELETE = $this->Event->changeDeleted('id', $id);

            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'Record deleted successfully.';
            } else
            {
                $data['result'] = 'error';
                $data['message'] = 'Error in deletion.Please try again.';
            }
            echo json_encode($data);
            exit;
        } else
        {

            $data['result'] = 'error';
            $data['message'] = 'No such record found.';
            echo json_encode($data);
            exit;
        }
    }
    protected function event_rules() {
		$rules = array(
			array(
				'field' => 'title',
				'label' => $this->lang->language["ENAME"],
				'rules' => 'trim|required|xss_clean|max_length[100]',
			),			
		);
		return $rules;
	}
    public function updateall()
        {
         $event_search_data = $this->Event->getData(); 
        $current_date=date('m/d/Y h:i:s a', time());

        foreach ($event_search_data as  $evalue){
         
             

            $that_data = array();
            $that_data['deleted']='';
            $that_data['start_time'] = $evalue->start_time;
            $event_start_date= date("m/d/Y",$that_data['start_time']);
               if($event_start_date < $current_date)
               {
                $that_data['deleted'] ='1';
                $changeStatus = $this->Event->update_data_for_all_update($that_data,$evalue->id);
               }
            
        }

         $search_event_param = array(
            'page' => '1',
            'search_type'=>'promoted',
            'location.address'=>'Lansing'
         );
         $event_search_data =$this->search_event($search_event_param);
         
         
          
         for($page = 1; $page <=$event_search_data['pagination']['page_size']; $page++){
            echo $page;
             
            $event_list = array();
            if($page > 1){
                
             $search_event_param['page'] = $page;
             $event_search_data_loop = $this->search_event($search_event_param);
             $event_list = $event_search_data_loop['events'];
            }else{
               
             $event_list = $event_search_data['events'];    
            }

            $insert_data_list = array();
            $insert_query_list = array();
             foreach ($event_list as $ekey => $evalue){
                    $that_data_1['category_id'] = '0';
                    $that_data_1['cityID'] = '2';

                    $that_data_1['eventfull_id'] = $evalue['id'];
                    $that_data_1['user_id']='13';
                    $that_data_1['title'] = trim($evalue['name']['text']);
                    $that_data_1['description'] = trim($evalue['description']['text']);
                    $that_data_1['cover_image'] = $evalue['logo']['original']['url'];
                    $that_data_1['website'] = $evalue['url'];

                    $venue_details = array();
                    $venue_details =$this->get_event_venue($evalue['venue_id']);
                    $that_data_1['location'] = trim($venue_details['address']['localized_address_display']);
                    $that_data_1['venue'] = trim($venue_details['address']['localized_address_display']);
                    $that_data_1['lat'] = $venue_details['address']['latitude'];
                    $that_data_1['lng'] = $venue_details['address']['longitude'];


                    $start_time = implode(' ', explode('T', $evalue['start']['local']));
                    $that_data_1['start_time'] = strtotime($start_time);

                    $end_time = implode(' ', explode('T', $evalue['end']['local']));
                    $that_data_1['end_time'] = strtotime($end_time);
                    $changeStatus='';
                    $that_data_1['deleted']='';

       
                     $changeStatus = $this->Event->check_event_for_all_update($evalue['id']);
        
                    if ($that_data_1['description'] == '') {
                        $that_data_1['description'] = $that_data_1['title'];
                    }
                    $event_start_date_1= date("m/d/Y",$that_data_1['start_time']);
                    if($that_data_1['cover_image']!='') {
                    if (count($changeStatus) > 0 && $evalue['id']!='') {
                        if($event_start_date_1 < $current_date)
                           {
                            $that_data_1['deleted'] ='1';
                            }
                        $changeStatus_1 = $this->Event->update_data_for_all_update1($that_data_1,$evalue['id']);
                    }else{
                        if($event_start_date_1 < $current_date)
                            {
                             $that_data_1['deleted'] ='1';
                            }
                            if($evalue['id']!='')
                            {
                         $changeStatus_1 = $this->Event->insert_data_for_all_update($that_data_1);
                            }
                        }
                    }
                }

          }
          exit;
    
                return true;
                exit;  
        }
      function search_event($param = array()){

    if(!empty($param)){
        $param = http_build_query($param);
        $param = "&".$param;
    }else{
        $param = "";
    }
     $token = 'MEGKPC7VWCNLXVI6ICFW';
    //$token = 'NUUODXD2NVNCQYZOT7LJ';
   $api_url = "https://www.eventbriteapi.com/v3";

    $event_search_url = $api_url . "/events/search?token=".$token.$param;
  
   // die($event_search_url);
    $event_list_data = $this->curl_get_contents($event_search_url);

    return json_decode($event_list_data,true);

}
function curl_get_contents($url)
{
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}
function get_event_venue($venue_id){
    //$token = 'NUUODXD2NVNCQYZOT7LJ';
$token = 'MEGKPC7VWCNLXVI6ICFW';
   $api_url = "https://www.eventbriteapi.com/v3";

    $venue_get_url = $api_url. "/venues/".$venue_id."/?token=".$token;
    $venue_get_data = $this->curl_get_contents($venue_get_url);
    return json_decode($venue_get_data,true);

}

}
