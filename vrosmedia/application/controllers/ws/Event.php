<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        parent::load_version_model('ws/Event_model_' . $this->data['version'], 'event_model');
    }
    
    public function lists(){
        $this->form_validation->set_rules('deLatitude','latitude','trim|required|xss_clean');  
        $this->form_validation->set_rules('deLongitude','latitude','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $postArray['user_id'] = (isset($postArray['user_id']) && $postArray['user_id'] > 0) ? $postArray['user_id'] : 0;
            $postArray['Limit'] = (isset($postArray['Limit']) && $postArray['Limit'] != '') ? $postArray['Limit'] : 10;
            $postArray['Offset'] = (isset($postArray['Offset']) && $postArray['Offset'] != '') ? $postArray['Offset'] : 0;
            
            $data['records'] = $this->event_model->getEventList($postArray);

            for($i=0;$i<=count($data['records'])-1;$i++){
                $data['records'][$i]['start_time'] = date('Y-m-d H:i',$data['records'][$i]['start_time']);
                $data['records'][$i]['end_time'] = date('Y-m-d H:i',$data['records'][$i]['end_time']);

                if($data['records'][$i]['cover_image'] != '' && $data['records'][$i]['event_type'] == 'custom')
                    $data['records'][$i]['cover_image'] = DOMAIN_URL.'/'.$data['records'][$i]['cover_image'];
                if($data['records'][$i]['owner_image'] != '')
                    $data['records'][$i]['owner_image'] = DOMAIN_URL.'/'.$data['records'][$i]['owner_image'];

                $data['records'][$i]['medias'] = $this->event_model->getAllMedia($data['records'][$i]['id']);
                $data['records'][$i]['attendee'] = $this->event_model->attendeeList($data['records'][$i]['id']);

                $data['records'][$i]['is_Like'] = $data['records'][$i]['is_rated'] = $data['records'][$i]['is_view'] = $data['records'][$i]['is_favourite'] = $data['records'][$i]['is_attend'] = 0;
                if($postArray['user_id'] > 0){
                    $checkUserLike = $this->event_model->checkUserLike($postArray['user_id'],$data['records'][$i]['id']);
                    if($checkUserLike)
                      $data['records'][$i]['is_Like'] = 1;

                    $checkUserRatting = $this->event_model->checkUserRatting($postArray['user_id'],$data['records'][$i]['id']);
                    if($checkUserRatting)
                      $data['records'][$i]['is_rated'] = 1;

                    $checkUserView = $this->event_model->checkUserView($postArray['user_id'],$data['records'][$i]['id']);
                    if($checkUserView)
                      $data['records'][$i]['is_view'] = 1;

                    $checkUserFavourite = $this->event_model->checkUserFavourite($postArray['user_id'],$data['records'][$i]['id']);
                    if($checkUserFavourite)
                      $data['records'][$i]['is_favourite'] = 1;

                    $checkUserAttend = $this->event_model->checkUserAttend($postArray['user_id'],$data['records'][$i]['id']);
                    if($checkUserAttend)
                      $data['records'][$i]['is_attend'] = 1;
                }
            }

            if(!empty($data['records'])){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] = $data;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= 'No data found';
            }
        }
        je_mobile($responseData);
    }

    public function detail(){
        $this->form_validation->set_rules('event_id','event id','trim|required|xss_clean');  
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $postArray['user_id'] = (isset($postArray['user_id']) && $postArray['user_id'] > 0) ? $postArray['user_id'] : 0;
            
            $data = $this->event_model->getEventDetail($postArray['event_id']);
           
            $responseData['code'] = 200;
            $responseData['status'] ='success';  
            if(!empty($data)){
                $data['start_time'] = date('Y-m-d H:i',$data['start_time']);
                $data['end_time'] = date('Y-m-d H:i',$data['end_time']);

                if($data['cover_image'] != '')
                    $data['cover_image'] = DOMAIN_URL.'/'.$data['cover_image'];
                if($data['owner_image'] != '')
                    $data['owner_image'] = DOMAIN_URL.'/'.$data['owner_image'];

                $data['is_Like'] = $data['is_rated'] = $data['is_view'] = $data['is_favourite'] = $data['is_attend'] = 0;  
                if($postArray['user_id'] > 0){
                    $checkUserLike = $this->event_model->checkUserLike($postArray['user_id'],$data['id']);
                    if($checkUserLike)
                      $data['is_Like'] = 1;

                    $checkUserRatting = $this->event_model->checkUserRatting($postArray['user_id'],$data['id']);
                    if($checkUserRatting)
                      $data['is_rated'] = 1;

                    $checkUserView = $this->event_model->checkUserView($postArray['user_id'],$data['id']);
                    if($checkUserView)
                      $data['is_view'] = 1;

                    $checkUserFavourite = $this->event_model->checkUserFavourite($postArray['user_id'],$data['id']);
                    if($checkUserFavourite)
                      $data['is_favourite'] = 1;

                    $checkUserAttend = $this->event_model->checkUserAttend($postArray['user_id'],$data['id']);
                    if($checkUserAttend)
                      $data['is_attend'] = 1;
                }
            }else{
                $responseData['message']= 'Event not found';
            }
            $responseData['data'] = $data;
        }
        je_mobile($responseData);  
    }

    public function create(){
        $responseData=array();
        $postArray = $this->input->post();
        $validationRules=$this->event_rules();

        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{
            $postArray['deleted']=0;
            $postArray['event_type'] = 'custom';
            $postArray['eventfull_id'] = 've'.time().rand(111,999);
            $postArray['start_time']=strtotime($postArray['start_time']);
            $postArray['end_time']=strtotime($postArray['end_time']);

            if(isset($postArray['deLatitude']) AND $postArray['deLongitude']!=''){
                $postArray['lat']=$postArray['deLatitude'];
                $postArray['lng']=$postArray['deLongitude'];
                unset($postArray['deLatitude']);
                unset($postArray['deLongitude']);
            }
            $event_id = $this->event_model->add_event($postArray);
            
            
            if($event_id > 0){
                //MOVE COVER IMAGE
                if($_FILES["cover_image"]["name"]!=''){
                    $postData = array();
                    $file_upload = parent::saveFile('cover_image', 'uploads/event/' . $event_id . '/');
                    if ($file_upload['file_name'] != "") {
                        $postData['cover_image'] = 'uploads/event/' . $event_id . '/' . $file_upload['file_name'];
                    } else{
                        $postData['cover_image'] = 'uploads/'.'download.png';
                    }
                    $this->event_model->update_event($postData,$event_id);
                }

                //MORE IMAGES
                if(isset($_FILES['images']['name']) && !empty($_FILES['images']['name'])){
                    $this->add_images($event_id);                    
                }
            }

            if ($event_id > 0) { 
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['data']['event_id'] = $event_id;
                $responseData['message'] ='Event created successfully';
            }else{
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["err_something_went_wrong"];
            }
        }
        je_mobile($responseData);
    } 

    public function edit(){
        $responseData=array();
        $postArray = $this->input->post();
        $validationRules=$this->event_rules('edit');
        $event_id = $postArray['event_id'];
        unset($postArray['event_id']);

        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{
            $postArray['start_time']=strtotime($postArray['start_time']);
            $postArray['end_time']=strtotime($postArray['end_time']);

            if(isset($postArray['deLatitude']) AND $postArray['deLongitude']!=''){
                $postArray['lat']=$postArray['deLatitude'];
                $postArray['lng']=$postArray['deLongitude'];
                unset($postArray['deLatitude']);
                unset($postArray['deLongitude']);
            }
            $event_id = $this->event_model->update_event($postArray,$event_id);
            
            if($event_id > 0){
                //MOVE COVER IMAGE
                if($_FILES["cover_image"]["name"]!=''){
                    $old_cover = $this->event_model->unlink_event_file('tbl_events',$event_id,'cover_image');
                    if($old_cover != '')
                      unlink(FCPATH . $old_cover);
                    $postData = array();
                    $file_upload = parent::saveFile('cover_image', 'uploads/event/' . $event_id . '/');
                    if ($file_upload['file_name'] != "") {
                        $postData['cover_image'] = 'uploads/event/' . $event_id . '/' . $file_upload['file_name'];
                    } else{
                        $postData['cover_image'] = 'uploads/'.'download.png';
                    }
                    $this->event_model->update_event($postData,$event_id);
                }

                //MORE IMAGES
                if(isset($_FILES['images']['name']) && !empty($_FILES['images']['name'])){
                    $this->add_images($event_id);                    
                }
            }

            if ($event_id > 0) { 
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['data']['event_id'] = $event_id;
                $responseData['message'] ='Event updated successfully';
            }else{
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["err_something_went_wrong"];
            }
        }
        je_mobile($responseData);
    }

    public function like(){
        $this->form_validation->set_rules('relation_id','article id','trim|required|xss_clean');
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');  
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserLike = $this->event_model->checkUserLike($postArray['user_id'],$postArray['relation_id']);
            
            $responseData['code'] = 200;
            $responseData['status'] ='success';
            if($checkUserLike){
                $this->event_model->delete_UserLike($postArray);
                $responseData['message']= 'Event disliked successfully';
                $responseData['data']['count'] = $this->event_model->getTotalLikes($postArray['relation_id']);
            }else{
                $postArray['type'] = 'event';
                $this->event_model->add_UserLike($postArray);
                $responseData['message']= 'Event liked successfully';
                $responseData['data']['count'] = $this->event_model->getTotalLikes($postArray['relation_id']);
            }
        }
        je_mobile($responseData); 
    }

    public function rattingList(){
        $this->form_validation->set_rules('relation_id','relation_id','trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();            
            $postArray['Limit'] = (isset($postArray['Limit']) && $postArray['Limit'] != '') ? $postArray['Limit'] : 10;
            $postArray['Offset'] = (isset($postArray['Offset']) && $postArray['Offset'] != '') ? $postArray['Offset'] : 0;

            $data['records'] = $this->event_model->getEventRattings($postArray);
            
            for($i=0;$i<=count($data['records'])-1;$i++){
                if($data['records'][$i]['image'] != '')
                    $data['records'][$i]['image'] = DOMAIN_URL.'/'.$data['records'][$i]['image'];
            }

            if(!empty($data['records'])){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] = $data;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= 'No data found';
            }
        }
        je_mobile($responseData); 
    }

    public function add_ratting(){
        $this->form_validation->set_rules('relation_id','article id','trim|required|xss_clean');  
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');  
        $this->form_validation->set_rules('star','star','trim|required|xss_clean');  
        $this->form_validation->set_rules('comment','comment','trim|required|xss_clean');  

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserRatting = $this->event_model->checkUserRatting($postArray['user_id'],$postArray['relation_id']);
            
            if($checkUserRatting){
                $responseData['code'] = 400;
                $responseData['status'] ='error';
                $responseData['message']= 'Already rated';
            }else{
                $postArray['type'] = 'event';
                $postArray['ratting_id'] = $this->event_model->add_UserRatting($postArray);
                $user = $this->db->get_where('users',array('id'=>$postArray['user_id']))->row_array();
                if($user['image'] != '')
                    $user['image'] = DOMAIN_URL.'/'.$user['image'];
                $postArray['image'] = $user['image'];
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Event rated successfully';
                $responseData['data']= $postArray;
            }
        }
        je_mobile($responseData); 
    }
    
    public function add_view(){
        $this->form_validation->set_rules('relation_id','article id','trim|required|xss_clean');  
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');  
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserView = $this->event_model->checkUserView($postArray['user_id'],$postArray['relation_id']);
            
            if($checkUserView){
                $responseData['code'] = 400;
                $responseData['status'] ='error';
                $responseData['message']= 'Already viewed';
            }else{
                $postArray['type'] = 'event';
                $this->event_model->add_UserView($postArray);
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Event viewed successfully';
            }
        }
        je_mobile($responseData); 
    }

    public function favourite(){
        $this->form_validation->set_rules('relation_id','article id','trim|required|xss_clean');
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserView = $this->event_model->checkUserFavourite($postArray['user_id'],$postArray['relation_id']);
            
            if($checkUserView){
                $this->event_model->delete_UserFavourite($postArray);
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Event un-favourited successfully';
            }else{
                $postArray['type'] = 'event';
                $this->event_model->add_UserFavourite($postArray);
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Event favourited successfully';
            }
        }
        je_mobile($responseData);
    }

    public function add_attendee(){
        $this->form_validation->set_rules('event_id','event id','trim|required|xss_clean');  
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');  
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserAttend = $this->event_model->checkUserAttend($postArray['user_id'],$postArray['event_id']);
            
            if($checkUserAttend){
                $this->event_model->delete_UserAttend($postArray);
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Remove from attendee successfully';
            }else{
                $id = $this->event_model->add_UserAttend($postArray);
                $postArray['id'] = $id;
                $user = $this->db->get_where('users',array('id'=>$postArray['user_id']))->row_array();
                if($user['image'] != '')
                    $user['image'] = DOMAIN_URL.'/'.$user['image'];
                $postArray['image'] = $user['image'];
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Attend successfully';
                $responseData['data'] = $postArray;
            }
        }
        je_mobile($responseData);
    }

    public function remove_media(){
        $this->form_validation->set_rules('media_id','media id','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $media = $this->db->get_where(TBL_APP_MEDIA,array('id'=>$postArray['media_id']))->row_array();
            if(!empty($media)){
                unlink(FCPATH.$media['media_path']);
                $this->db->delete(TBL_APP_MEDIA,array('id'=>$postArray['media_id']));
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Media removed successfully';
            }else{
                $responseData['code'] = 400;
                $responseData['status'] ='error';
                $responseData['message']= 'Media not found';
            }
        }
        je_mobile($responseData);
    }

    public function attendeeList(){
        $this->form_validation->set_rules('event_id','event id','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $attendees = $this->event_model->attendeeList($postArray['event_id']);
            if(!empty($attendees)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Attendees retrived successfully';
                $responseData['data'] = $attendees;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] ='error';
                $responseData['message']= 'Attendees not found';
            }
        }
        je_mobile($responseData);
    }

    public function add_images($event_id = 0){
        $aImageType = array('image/jpeg','image/jpg','image/png');
        if ($event_id > 0) {
            foreach($_FILES['images']['name'] as $key => $files){
                $_FILES['image']['name'] = $_FILES['images']['name'][$key];
                $_FILES['image']['type'] = $_FILES['images']['type'][$key];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
                $_FILES['image']['error'] = $_FILES['images']['error'][$key];
                $_FILES['image']['size'] = $_FILES['images']['size'][$key];

                if($_FILES['image']['size'] <= 2048000 && $_FILES['image']['name']!="" && in_array($_FILES['image']['type'],$aImageType)){ 
                    $default=0;
                    $response = $this->save_images('image', $event_id, $default);
                    if($response!=1){
                        $responseData['code'] = 400;
                        $responseData['status'] = 'error';
                        $responseData['message']= $response;
                        je_mobile($responseData); exit;
                    }
                }   
            }   
        }
    }

    protected function save_images($imageName,$event_id,$is_default){
        $file_upload = parent::saveFile($imageName, 'uploads/event/' . $event_id . '/');
        if ($file_upload['file_name'] != "") {
            $postData= array();
            $postData['media_path'] = 'uploads/event/' . $event_id . '/' . $file_upload['file_name'];
            $postData['event_id']=$event_id;
            $postData['is_default']=$is_default;
            $postData['type']='i';
            $this->event_model->add_event_medias($postData);
            return true;
        } else{
            return $file_upload['errors'];
        }
    }

    protected function event_rules($type = 'create') {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'category_id',
                'label' => 'category_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'cityID',
                'label' => 'cityID',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'title',
                'label' => 'title',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'description',
                'label' => 'description',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'deLatitude',
                'label' => 'latitude',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'deLongitude',
                'label' => 'longitude',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'venue',
                'label' => 'venue',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'location',
                'label' => 'location',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'start_time',
                'label' => 'start time',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'end_time',
                'label' => 'end time',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        if($type == 'edit'){
            $rules[] = array(
                'field' => 'event_id',
                'label' => 'Event id',
                'rules' => 'trim|required|xss_clean',
            );
        }
        return $rules;
    }
}

