<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends Ws_Controller {
	private $model;
	public function __construct() {
		parent::__construct();
		$this->lang->load('friends', $this->data['language']);
		parent::load_version_model('ws/Friends_model_' . $this->data['version'], 'friends_model');
	}

         public function get_UserLists(){             
              
                $responseData=array();
		$this->form_validation->set_rules($this->userLists_rules());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                            $postArray = $this->input->post();  

                            $userData=$this->friends_model->get_UserData($postArray);                           
                                                         



                            if(!empty($userData)){
                                   $responseData['code'] = 200;
                                   $responseData['status'] ='success';
                                   $responseData['data'] =$userData;
                               }else{
                                   $responseData['code'] = 400;
                                   $responseData['status'] = 'error';
                                   $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
                               }
                }
                je_mobile($responseData);
    
        }
        public function get_single_friend_detail(){             
              
                $responseData=array();
		$this->form_validation->set_rules($this->get_single_friend_detail_rules());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                            $postArray = $this->input->post(); 
                            if($postArray['user_id']!=''){
                                
                             $userData=$this->friends_model->get_UserData($postArray); 
                             
                            }else{
                                
                             $userData[] = $this->friends_model->get_single_user(array("id" =>$postArray['friend_user_id'], "user_type"=>'u',"active"=>'1',"deleted"=>'0'),array("deLatitude" =>$postArray['deLatitude'], "deLongitude"=>$postArray['deLongitude']));
                            }
                                                         
                             if(!empty($userData)){
                                   $responseData['code'] = 200;
                                   $responseData['status'] ='success';
                                   $responseData['data'] =$userData;
                               }else{
                                   $responseData['code'] = 400;
                                   $responseData['status'] = 'error';
                                   $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
                               }
                }
                je_mobile($responseData);
    
        } 
        public function send_friendsRequests(){
                $responseData=array();
		$this->form_validation->set_rules($this->sendRequest_rules());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                            $postArray = $this->input->post(); 
                            
                             if($postArray['is_friend']==''){
                                 
                                       $postArray['is_friend']=0; 
                             }


                            $exists = $this->friends_model->check_request_exits($postArray);
                          
                            if(!count($exists)){ 
                              //new request
                                   
                                    $userData=$this->friends_model->send_friendsRequests($postArray);  
                              
                                    if(!empty($userData)){

                                         //notification

                                         $getUserDetail=$this->friends_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                                         $getTouserDetail=$this->friends_model->UserSingleUserDetail(array("id" => $postArray['touser_id'],"user_type"=>'u',"deleted"=>'0'));

                                         $message=$getTouserDetail->name.' send new request';


                                        $notificationData=array(
                                                                   'title'=>$this->lang->language["sent_Request_title"],
                                                                   'message'=>$message,
                                                                   'user_id'=>$postArray['user_id'],
                                                                   'image'=>DOMAIN_URL.'/'.$getTouserDetail->image,
                                                                   'type'=>$this->lang->language["sent_Request"],
                                                                   'redirect_id'=>$postArray['touser_id'],
                                                                   'is_status'=>1,
                                                                   'eStatus'=>1,
                                                                   'deleted'=>0,
                                                                );

                                         $notification_id=$this->friends_model->add_notification_data($notificationData);

                                         $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["sent_Request"],'redirect_id'=>$getTouserDetail->user_id,'post_title'=>$this->lang->language["sent_Request_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                                        if($getUserDetail->is_notification=='ON')
                                         $dataa=parent::sendAndroidNotification($data,$getUserDetail->deviceid);


                                         $responseData['code'] = 200;
                                         $responseData['status'] ='success';
                                         $responseData['message'] =$this->lang->language["REUQEST_SENT_SUCCESSFULLY"];

                                     }else{
                                         $responseData['code'] = 400;
                                         $responseData['status'] = 'error';
                                         $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                     }
                                 
                            }else{
                                    // request is rejected than
                                    if($exists[0]['is_friend']==2){                                    
                                       $userData=$this->friends_model->send_friendsRequests(array('is_friend'=>0,'user_id'=>$postArray['user_id'],'touser_id'=>$postArray['touser_id']),$exists[0]['id']); 

                                       if(!empty($userData)){

                                           //notification

                                           $getUserDetail=$this->friends_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                                           $getTouserDetail=$this->friends_model->UserSingleUserDetail(array("id" => $postArray['touser_id'],"user_type"=>'u',"deleted"=>'0'));

                                           $message=$getTouserDetail->name.' send new request';
                                           $notificationData=array(
                                               'title'=>$this->lang->language["sent_Request_title"],
                                               'message'=>$message,
                                               'user_id'=>$postArray['user_id'],
                                               'image'=>DOMAIN_URL.'/'.$getTouserDetail->image,
                                               'type'=>$this->lang->language["sent_Request"],
                                               'redirect_id'=>$postArray['touser_id'],
                                               'is_status'=>1,
                                               'eStatus'=>1,
                                               'deleted'=>0,
                                           );

                                           $notification_id=$this->friends_model->add_notification_data($notificationData);

                                           $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["sent_Request"],'redirect_id'=>$getTouserDetail->user_id,'post_title'=>$this->lang->language["sent_Request_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                                           if($getUserDetail->is_notification=='ON')
                                           parent::sendAndroidNotification($data,$getUserDetail->deviceid);

                                             $responseData['code'] = 200;
                                             $responseData['status'] ='success';
                                             $responseData['message'] =$this->lang->language["REUQEST_SENT_SUCCESSFULLY"];

                                       }else{
                                         $responseData['code'] = 400;
                                         $responseData['status'] = 'error';
                                         $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                       }
                                   
                                }else{                                    
                                
                                $responseData['code'] = 400;
                                $responseData['status'] ='error';
                                $responseData['message'] =$this->lang->language["REUQEST_ALREADY_SENT"];
                                
                                }
                                
                            }
                                                         



                              
                }
                je_mobile($responseData);
        }
        public function friends_requestLists(){
               $responseData=array();
		$this->form_validation->set_rules($this->friends_requestLists_rules());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                            $postArray = $this->input->post();  
                            
                            $data['friends']=$this->friends_model->friends($postArray);
                            $data['friends_request']=$this->friends_model->received_friends_request($postArray);  
                             
                              
                                if(!empty($data)){                                    
                                     $responseData['code'] = 200;
                                     $responseData['status'] ='success';
                                     $responseData['data'] =$data;
                                     
                                 }else{
                                     $responseData['code'] = 400;
                                     $responseData['status'] = 'error';
                                     $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                 }
                                 
                            
                              
                }
                je_mobile($responseData);
            
        }
        public function search_friends(){
               $responseData=array();
		$this->form_validation->set_rules($this->search_friends_rules());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                            $postArray = $this->input->post();  
                            
                            $data=$this->friends_model->search_friends($postArray);
                             
                              
                                if(!empty($data)){                                    
                                     $responseData['code'] = 200;
                                     $responseData['status'] ='success';
                                     $responseData['data'] =$data;
                                     
                                 }else{
                                     $responseData['code'] = 400;
                                     $responseData['status'] = 'error';
                                     $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                 }
                                 
                            
                              
                }
                je_mobile($responseData);
            
        }
        public function friendRequest_action(){
           $responseData=array();
		$this->form_validation->set_rules($this->friends_request_action());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                            $postArray = $this->input->post();  
                            if($postArray['is_request_action']==1){
                                
                                $messages='REQUEST_ACCEPTED';
                                $type=1;
                                
                            } elseif($postArray['is_request_action']==2){
                                
                                $messages='REJECTED';
                                $type=2;
                                
                            }else{
                                $messages='SUCCESSFULLY';
                            }
                            $exists = $this->friends_model->check_FriendrequestByID($postArray);
                          
                            if(count($exists)){ 
                                //pre($exists);
                                $userData=$this->friends_model->send_friendsRequests(array('is_friend'=>$postArray['is_request_action']),$postArray['request_id']); 
                                if($type==1){

                                    $getUserDetail=$this->friends_model->UserSingleUserDetail(array("id" => $exists[0]['user_id'],"user_type"=>'u',"deleted"=>'0'));
                                    $getTouserDetail=$this->friends_model->UserSingleUserDetail(array("id" => $exists[0]['touser_id'],"user_type"=>'u',"deleted"=>'0'));
                                    $message=$getUserDetail->name.' accept your request';

                                    $notificationData=array(
                                        'title'=>$this->lang->language["Accept_Request_title"],
                                        'message'=>$message,
                                        'user_id'=>$exists[0]['touser_id'],
                                        'image'=>DOMAIN_URL.'/'.$getUserDetail->image,
                                        'type'=>$this->lang->language["sent_Request"],
                                        'redirect_id'=>$exists[0]['user_id'],
                                        'is_status'=>1,
                                        'eStatus'=>1,
                                        'deleted'=>0,
                                    );

                                    $notification_id=$this->friends_model->add_notification_data($notificationData);

                                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["accept_Request"],'redirect_id'=>$exists[0]['user_id'],'post_title'=>$this->lang->language["sent_Request_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                                    if($getTouserDetail->is_notification=='ON')
                                    parent::sendAndroidNotification($data,$getTouserDetail->deviceid);

                                }
                                if(!empty($userData)){                                    
                                     $responseData['code'] = 200;
                                     $responseData['status'] ='success';
                                     $responseData['message'] =$this->lang->language[$messages];
                                     
                                 }else{
                                     $responseData['code'] = 400;
                                     $responseData['status'] = 'error';
                                     $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                 }
                                 
                            }else{
                                
                                    $responseData['code'] = 400;
                                    $responseData['status'] ='error';
                                    $responseData['message'] =$this->lang->language["INVALID_REQUEST"];
                            }
                              
                                
                                 
                            
                              
                }
                je_mobile($responseData);
       }
        protected function userLists_rules() {
		$rules = array(
			array(
				'field' => 'deLatitude',
				'label' => 'Lattitude',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'deLongitude',
				'label' => 'Longitude',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
        protected function sendRequest_rules() {
		$rules = array(
			array(
				'field' => 'touser_id',
				'label' => 'touser_id',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
        protected function friends_requestLists_rules() {
		$rules = array(
			array(
				'field' => 'deLatitude',
				'label' => 'Lattitude',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'deLongitude',
				'label' => 'Longitude',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
         protected function search_friends_rules() {
		$rules = array(
			array(
				'field' => 'deLatitude',
				'label' => 'Lattitude',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'deLongitude',
				'label' => 'Longitude',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
                         array(
				'field' => 'searchKey',
				'label' => 'searchKey',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
        protected function friends_request_action() {
		$rules = array(
			array(
				'field' => 'request_id',
				'label' => 'request_id',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'is_request_action',
				'label' => 'is_request_action',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
        protected function get_single_friend_detail_rules() {
		$rules = array(			
			array(
				'field' => 'friend_user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
                        array(
				'field' => 'deLatitude',
				'label' => 'Lattitude',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'deLongitude',
				'label' => 'Longitude',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
	
	

}
