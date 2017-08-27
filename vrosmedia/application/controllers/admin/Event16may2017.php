<?php
class Event extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Event_model','Event');
        $this->viewData['category'] = $this->Event->getBusCat();
        $this->lang->load('event', $this->data['language']);
    }

   function index()
    {
       /* $this->viewData['title'] = lang("EVENT_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'event' => "Event Category");
        $this->viewData['module'] = "event/eventCat";
        $this->load->view('admin/template', $this->viewData);*/

        $this->Event->_where = array("e.deleted" =>'0');

        $this->viewData['eventData'] = $this->Event->getData();
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("EVENT_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home",'event'=> "Event Category", 'event/lists/'.$category.'' => "Event");
        $this->viewData['module'] = "event/list";
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

    public function lists()
    {       
        
        $this->Event->_where = array("e.deleted" =>'0');
               
        $this->viewData['eventData'] = $this->Event->getData(); 
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("EVENT_MNG");     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home",'event'=> "Event Category", 'event/lists/'.$category.'' => "Event");
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
                $ID = $this->Event->insertRow($postData, 'id', $ID);


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
                        $file_upload = parent::saveFile('image', 'uploads/event/' . $ID . '/');
                                         
                        if ($file_upload['file_name'] != "") {
                                    $postArray = array();
                                    $postArray['media_path'] = 'event/' . $ID . '/' . $file_upload['file_name'];
                                    $postArray['event_id'] = $ID; 
                                    $postArray['type'] = 'image';                                               
                                    $this->Event->update_image($postArray);                                    
                                   
                        } 
                    }

                }
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

    
    



}
