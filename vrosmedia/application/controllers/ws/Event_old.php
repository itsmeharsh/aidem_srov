<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends Ws_Controller {
	private $model;
	public function __construct() {
		parent::__construct();
		$this->lang->load('event', $this->data['language']);
		parent::load_version_model('ws/Event_model_' . $this->data['version'], 'event_model');
               	}
        
    public function index(){
   
            $responseData=array();
            $data=array();
            $this->form_validation->set_rules($this->get_all_events_rules());
            if ($this->form_validation->run() == FALSE) {

                    $responseData['code'] = 400;
                    $responseData['status'] = 'error';
                    $responseData['message']= $this->lang->language["err_req_values"];


            }else{
                          
                      $postArray = $this->input->post();
                        
                       $last_inserted_log_id=$this->event_model->insert_event_log($postArray);
                       

                    // Set Valid Limit and Offset  
                       if(!$postArray['Limit']){
                            $postArray['Limit']=10;
                        }       

                        if($postArray['Offset']==0 || !$postArray['Offset']){
                            $postArray['Offset']=1;
                        }
                  //valid lat long
                       
                        $ValidLatLong=$this->isValidLatitude($postArray['deLatitude'],$postArray['deLongitude']);
                        $postArray['deLatitude']=$ValidLatLong['deLatitude'];
                        $postArray['deLongitude']=$ValidLatLong['deLongitude'];
                   
                    //date filters   
                        
                       if($postArray['start_date']!='' && $postArray['end_date']!=''){  
                                              
                           $data['records']=$this->event_model->getEventsByDate($postArray);
                       }else{
                           $data['records']=$this->event_model->getEvents($postArray);
                       }
                        
 
                        $data['offset']= $postArray['Offset']+1;                      

                        $data['TotalRecords']=count($data['records']);
                        $data['is_last']=0;

                       if($data['offset']){

                            $postArray['Offset']=$data['offset'];
                            if($postArray['start_date']!='' && $postArray['end_date']!=''){
                               $nextRecords['data']=$this->event_model->getEventsByDate($postArray);
                             }else{

                               $nextRecords['data']=$this->event_model->getEvents($postArray);
                              }
                           
                           $TotalNextrecordcount=count($nextRecords['data']);
                           if($TotalNextrecordcount<=0){

                                $data['is_last']=1;

                           }
                       }
                       
                       for($i=0;$i<=count($data['records'])-1;$i++){
                                $data['records'][$i]['description']=trim($data['records'][$i]['description']);
                                $getEventsuserLikes=$this->event_model->getEventsLikedUsers($data['records'][$i]['id']);
                                $getEventsuserCommented=$this->event_model->getEventsCommentedUsers($data['records'][$i]['id']);
                              //  $getEventsAttendeeUsers=$this->event_model->getEventsAttendeeUsers($data['records'][$i]['id']);
                                $getEventsImages=$this->event_model->getAllImages($data['records'][$i]['id'],'event_id');
                                $getEventsCategoryData=$this->event_model->GetCategoryData($data['records'][$i]['category_id'],'2');  
                                
                                $checkLoggedUserEventLiked=$this->event_model->checkUserEventLiked($postArray['user_id'],$data['records'][$i]['id'],'event_id');
                                $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']=$this->event_model->getUserEventAttendanceStatus($data['records'][$i]['id']);
                                
                                $CreatedUserData=$this->event_model->CreatedUserData($data['records'][$i]['user_id']);

                                   $myComments=$this->event_model->myComment($data['records'][$i]['id'],$postArray['user_id'],'event');
                                
                                 //remove image thumb
                                 
                                 for($j=0;$j<=count($getEventsImages)-1;$j++){
                                        if($getEventsImages[$j]['type']=='i'){
                                          $getEventsImages[$j]['thumb']=''; 
                                        }  
                                 }
                               
                                 
                                if(count($checkLoggedUserEventLiked)){                                       
                                    $data['records'][$i]['is_user_exits']=true;
                                    $data['records'][$i]['LoggedinUserDetail']=$checkLoggedUserEventLiked;
                                }else{
                                    $data['records'][$i]['is_user_exits']=false;
                                    $data['records'][$i]['LoggedinUserDetail']=array();
                                }
                                $data['records'][$i]['start_time']=date('Y-m-d H:i',$data['records'][$i]['start_time']); 
                                $data['records'][$i]['end_time']=date('Y-m-d H:i',$data['records'][$i]['end_time']); 

                                unset($data['records'][$i]['datetime']);
                                unset($data['records'][$i]['working_hours']);
                                unset($data['records'][$i]['since']);
                                unset($data['records'][$i]['mobile']);
                                unset($data['records'][$i]['email']);
                                unset($data['records'][$i]['category_id']);
                                 if(preg_match("/uploads/i", $data['records'][$i]['url'])){
                                     $data['records'][$i]['url']=DOMAIN_URL.'/'.$data['records'][$i]['url'];
                                 } 

                                $data['records'][$i]['LikedusersLists']=$getEventsuserLikes;  
                                $data['records'][$i]['CommentedusersLists']=$getEventsuserCommented; 
                              //  $data['records'][$i]['attendee']=$getEventsAttendeeUsers; 
                                $data['records'][$i]['medias']=$getEventsImages; 
                                $data['records'][$i]['CategoryData']=$getEventsCategoryData; 
                                $data['records'][$i]['CreatedUserData']=$CreatedUserData;
                                $data['records'][$i]['MyComment']=$myComments;

                                $getEventsuserLikes=NULL;
                                $getEventsuserCommented=NULL;
                               // $getEventsAttendeeUsers=NULL;
                                $getEventsImages=NULL;
                                $checkLoggedUserEventLiked=NULL;
                                $getEventsCategoryData=NULL;
                                $CreatedUserData=NULL;
                                 $myComments=NULL;
                       }
                      // pre($data);
                       if(!empty($data)){
                            $responseData['code'] = 200;
                            $responseData['status'] ='success';
                            $responseData['data'] =$data;
                        }else{
                            $responseData['code'] = 200;
                            $responseData['status'] = 'success';
                            $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
                        }
                       
                
            }
             je_mobile($responseData);
    }
        
    public function event_like(){           
      $responseData=array();
      $postArray = $this->input->post();
      if($postArray['is_like']==0){
        $count=-1;
        $Message='EVENT_DISLIKE_SUCCESS';
      }else{
        $Message='EVENT_LIKE_SUCCESS';
        $count=1;
      }     
      $this->form_validation->set_rules($this->event_like_rule());
      if ($this->form_validation->run() == FALSE) {    
        $responseData['code'] = 400;
        $responseData['status'] = 'error';
        $responseData['message']= $this->lang->language["err_req_values"];
      }else{     
        $exists = $this->event_model->check_user_event_like(array("event_id" => $postArray['event_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_like');
        if (count($exists)) {
          //update event Like                                  
          $LikedID=$this->event_model->DoEventLike($postArray,$exists->id);  
          if($postArray['is_like']==$exists->is_like){
            $count=0; 
          }       
        }else{
          //add event like                              
          $LikedID=$this->event_model->DoEventLike($postArray);  
        }
        if($LikedID>0){   
          //Update event Total Count
          $this->event_model->UpdateCount('totallike',$count,$postArray['event_id']);                      
          $responseData['code'] = 200;
          $responseData['status'] = 'success';
          $responseData['message'] =$this->lang->language[$Message];
        }else{
          $responseData['code'] = 400;
          $responseData['status'] = 'error';
          $responseData['message']= $this->lang->language["somethings_went_wrong"];
        }
      }
      je_mobile($responseData);
    }
     public function event_share(){
               
                $responseData=array();
                $postArray = $this->input->post();
                if($postArray['is_share']==0){
                     $count=-1;
                     $Message='EVENT_REMOVESHARE_SUCCESS';
                  }else{
                       $Message='EVENT_SHARE_SUCCESS';
                    
                      $count=1;
                  }     
                  
		$this->form_validation->set_rules($this->event_share_rule());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                          
                           $exists = $this->event_model->check_user_event_like(array("event_id" => $postArray['event_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_share');
                           if (count($exists)) {
                               //update event Like                                  
                                 $LikedID=$this->event_model->DoEventLike($postArray,$exists->id);  
                                 if($postArray['is_share']==$exists->is_share){
                                        $count=0; 
                                   }      
                                 
                               
                                
                           }else{
                               //add event like
                                $LikedID=$this->event_model->DoEventLike($postArray);  
                           }
                          
                            if($LikedID>0){   
                                //Update event Total Share Count
                                                            
                               
                               
                                $this->event_model->UpdateCount('totalshare',$count,$postArray['event_id']);  
                              
                                $responseData['code'] = 200;
                                $responseData['status'] = 'success';
                                $responseData['message'] =$this->lang->language[$Message];
                            }else{
                                $responseData['code'] = 400;
                                $responseData['status'] = 'error';
                                $responseData['message']= $this->lang->language["somethings_went_wrong"];
                            }
                    
                }
               je_mobile($responseData);
     }
     
     public function event_favorite(){
               
                $responseData=array();
                $postArray = $this->input->post();
                if($postArray['is_favourite']==0){
                     $count=-1;
                     $Message='EVENT_UNFAVORITE_SUCCESS';
                     
                  }else{
                     $Message='EVENT_FAVORITE_SUCCESS';
                     $count=1;
                  }     
                  
		$this->form_validation->set_rules($this->event_favorite_rule());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                           
                           $exists = $this->event_model->check_user_event_like(array("event_id" => $postArray['event_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_favourite');
                           if (count($exists)) {
                               //update event Like                                  
                                 $LikedID=$this->event_model->DoEventLike($postArray,$exists->id);  
                                 if($postArray['is_favourite']==$exists->is_favourite){
                                        $count=0; 
                                   }  
                               
                                
                           }else{
                               //add event like
                                $LikedID=$this->event_model->DoEventLike($postArray);  
                           }
                          
                            if($LikedID>0){   
                                //Update event Total Favorite Count                        
                               
                               
                                $this->event_model->UpdateCount('totalfavorite',$count,$postArray['event_id']);  
                              
                                $responseData['code'] = 200;
                                $responseData['status'] = 'success';
                                $responseData['message'] =$this->lang->language[$Message];
                            }else{
                                $responseData['code'] = 400;
                                $responseData['status'] = 'error';
                                $responseData['message']= $this->lang->language["somethings_went_wrong"];
                            }
                    
                }
               je_mobile($responseData);
     }
      public function add_event_attendee(){
               
                $responseData=array();
                $postArray = $this->input->post();
                
                  
		$this->form_validation->set_rules($this->add_event_attandee_rule());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                           
                           $exists = $this->event_model->check_event_attendee(array("event_id" => $postArray['event_id'],"user_id" => $postArray['user_id'],"touser_id" => $postArray['touser_id'],"deleted"=>'0'));
                           if (count($exists)) {                               
                                    $responseData['code'] = 200;
                                    $responseData['status'] = 'success';
                                    $responseData['message'] =$this->lang->language["ATTENDEE_ALREADY_EXITS"];                               
                                
                           }else{
                               //add event attendee
                                $AttendeeID=$this->event_model->AddEventAttendee($postArray);  
                           
                          
                                if($AttendeeID>0){                                
                                    $responseData['code'] = 200;
                                    $responseData['status'] = 'success';
                                    $responseData['message'] =$this->lang->language["SUCESSFULLY_ADDED_ATTENDEE"];
                                }else{
                                    $responseData['code'] = 400;
                                    $responseData['status'] = 'error';
                                    $responseData['message']= $this->lang->language["somethings_went_wrong"];
                                }
                            }
                    
                }
               je_mobile($responseData);
     }
     
     public function post_comments(){
        
               $responseData=array();
               $this->form_validation->set_rules($this->post_comments_rules());
               if ($this->form_validation->run() == FALSE) {

                       $responseData['code'] = 400;
                       $responseData['status'] = 'error';
                       $responseData['message']= $this->lang->language["err_req_values"];


               }else{ 
                       $postArray = $this->input->post();
                       $postArray['i_date'] = time();
                       
                    //event ratting 
                       $exists_ratting = $this->event_model->check_user_event_like(array("event_id" => $postArray['event_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'rate');
                       if (count($exists_ratting)) { 
                           //Update event ratting  
                            $SharedID=$this->event_model->event_ratting($postArray,$exists_ratting->id); 
                           
                       }else{
                           //add event ratting                              
                            $SharedID=$this->event_model->event_ratting($postArray);  
                       }
                       unset($postArray['rate']);
                       
                    //event comment
                        $exists_comments = $this->event_model->check_event_comment(array("event_id" => $postArray['event_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'id');
                       
                        if (count($exists_comments)) { 
                           //Update business ratting  
                            $CommentID=$this->event_model->add_comments($postArray,$exists_comments->id); 
                           
                       }else{
                           //add business ratting                              
                           $CommentID=$this->event_model->add_comments($postArray);
                       }
                       
                       
                       if($CommentID>0){   
                           
                            $responseData['code'] = 200;
                            $responseData['status'] = 'success';
                            $responseData['data'] =array('comment_id'=>$CommentID);
                        }else{
                            $responseData['code'] = 400;
                            $responseData['status'] = 'error';
                            $responseData['message']= $this->lang->language["somethings_went_wrong"];
                        }
               }
               je_mobile($responseData); 
    }
    protected function isValidLatitude($lattitude,$longitude){

                  if(strpos($lattitude,'.'))
                     $lattitude;    
                       else
                    $lattitude.= '.00';   

                     if(strpos($longitude,'.'))
                     $longitude;    
                       else
                    $longitude.= '.00';   


                  if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $lattitude)) {
                      $lat=$lattitude;
                   } else {
                      $lat=41.87;
                  }  

                  if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $longitude)) {
                      $long=$longitude;
                  } else {
                      $long= 87.62;
                  }  

               return array('deLatitude'=>$lat,'deLongitude'=>$long);
      }  
        public function share_event_with_friends(){
         $responseData=array();
               $this->form_validation->set_rules($this->share_event_with_friends_rules());
               if ($this->form_validation->run() == FALSE) {


                       $responseData['code'] = 400;
                       $responseData['status'] = 'error';
                       $responseData['message']= $this->lang->language["err_req_values"];


               }else{
                   $postArray = $this->input->post();

                   $friends_ids=explode(',',$postArray['friends_ids']);

                   $sender_user_details=$this->event_model->UserSingleUserDetail(array("id" =>$postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                   $eventDetail=$this->event_model->SingleEventDetail(array("id" =>$postArray['event_id'],"deleted"=>'0'));

                   for($i=0;$i<=count($friends_ids)-1;$i++){



                       $getUserDetail=$this->event_model->UserSingleUserDetail(array("id" =>$friends_ids[$i],"user_type"=>'u',"deleted"=>'0'));


                       $message=$sender_user_details->name.' shared '.$eventDetail->name.' with you!';

                       $notificationData=array(
                           'title'=>$this->lang->language["share_event_with_friends_title"],
                           'message'=>$message,
                           'user_id'=>$friends_ids[$i],
                           'image'=>$sender_user_details->image,
                           'type'=>$this->lang->language["share_event_with_friends_type"],
                           'redirect_id'=>$eventDetail->event_id,
                           'is_status'=>1,
                           'eStatus'=>1,
                           'deleted'=>0,
                       );

                       $notification_id=$this->event_model->add_notification_data($notificationData);

                       $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["share_event_with_friends_type"],'redirect_id'=>$eventDetail->event_id,'post_title'=>$this->lang->language["share_event_with_friends_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                        if($getUserDetail->is_notification=='ON')
                       parent::sendAndroidNotification($data,$getUserDetail->deviceid);

                   }

                        $responseData['code'] = 200;
                        $responseData['status'] = 'success';
                        $responseData['message'] =$this->lang->language["SUCCESSFULLY_SHARE_EVENT"];
                   
               }
                je_mobile($responseData); 
    }
   
     

     protected function event_like_rule() {
		$rules = array(
			array(
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'event_id',
				'label' =>'event_id',
				'rules' => 'trim|required|xss_clean',
			),
                       array(
				'field' => 'is_like',
				'label' => 'is_like',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
     protected function event_share_rule() {
		$rules = array(
			array(
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'event_id',
				'label' =>'event_id',
				'rules' => 'trim|required|xss_clean',
			),
                       array(
				'field' => 'is_share',
				'label' => 'is_like',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
     protected function event_favorite_rule() {
		$rules = array(
			array(
				'field' => 'user_id',
				'label' => 'user_id',
				'rules' => 'trim|required|xss_clean',
			),
			array(
				'field' => 'event_id',
				'label' =>'event_id',
				'rules' => 'trim|required|xss_clean',
			),
                       array(
				'field' => 'is_favourite',
				'label' => 'is_like',
				'rules' => 'trim|required|xss_clean',
			),
		);
		return $rules;
	}
        
     protected function post_comments_rules() {
               $rules = array(
                       array(
                               'field' => 'event_id',
                               'label' => 'event_id',
                               'rules' => 'trim|required|xss_clean',
                       ),
                       array(
                               'field' => 'comment',
                               'label' => 'image_id',
                               'rules' => 'trim|required|xss_clean',
                       ),
                     array(
                               'field' => 'user_id',
                               'label' => 'is_default',
                               'rules' => 'trim|required|xss_clean',
                       ),
               );
               return $rules;
       }    
     
      protected function add_event_attandee_rule() {
               $rules = array(
                       array(
                               'field' => 'event_id',
                               'label' => 'event_id',
                               'rules' => 'trim|required|xss_clean',
                       ),
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
                   array(
                               'field' => 'invitation_status',
                               'label' => 'invitation_status',
                               'rules' => 'trim|required|xss_clean',
                       ),
               );
               return $rules;
       }      
      protected function get_all_events_rules() {
               $rules = array(
                       array(
                               'field' => 'deLatitude',
                               'label' => $this->lang->language["LATTITUDE"],
                               'rules' => 'trim|required|xss_clean',
                       ),
                       array(
                               'field' => 'deLongitude',
                               'label' => $this->lang->language["LONGITUDE"],
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
           protected function share_event_with_friends_rules() {
               $rules = array(
                       array(
                               'field' => 'friends_ids',
                               'label' => 'friends_ids',
                               'rules' => 'trim|required|xss_clean',
                       ),
                       array(
                               'field' => 'event_id',
                               'label' => 'event_id',
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
	
	 public function create_event(){
        
        $responseData=array();
        $postArray = $this->input->post();

        if($postArray['event_id']!=''){
            $validationRules=$this->edit_event_rules();
        }else{
            $validationRules=$this->create_event_rules();
        }
         
        $this->form_validation->set_rules($validationRules);
         

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
			//$responseData['message']= $this->form_validation->error_array();
        }else{
            if(isset($postArray['event_id'])!=''){
                $message='EDITED';
                $imageCount=$postArray['is_iCount'];
            }else{
                $message='CREATED';
                $imageCount=$postArray['is_iCount'];
                $postArray['deleted']=0;
                $postArray['event_type'] = 'custom';
                $postArray['eventfull_id'] = 've'.time().rand(111,999);
            }
            $postArray['start_time']=strtotime($postArray['start_time']);
            $postArray['end_time']=strtotime($postArray['end_time']);

            //Check and Set Latitude and Longitude
            if(isset($postArray['deLatitude']) AND $postArray['deLongitude']!=''){
                $ValidLatLong=$this->isValidLatitude($postArray['deLatitude'],$postArray['deLongitude']);
                $postArray['lat']=$ValidLatLong['deLatitude'];
                $postArray['lng']=$ValidLatLong['deLongitude'];
                unset($postArray['deLatitude']);
                unset($postArray['deLongitude']);
            }

            //Save Event Data
            $event_id = $this->event_model->create_event($postArray,$postArray['event_id']);
             
            //move cover image
            if($event_id!=''){
                if($_FILES["cover_image"]["name"]!=''){
                    $old_cover = $this->event_model->unlink_event_file(TBL_EVENT,$event_id,'cover_image');
                    if($old_cover != '')
                      unlink(FCPATH . $old_cover);
                    $file_upload = parent::saveFile('cover_image', 'uploads/event/' . $event_id . '/');
                    if ($file_upload['file_name'] != "") {
                        $postData['cover_image'] = 'uploads/event/' . $event_id . '/' . $file_upload['file_name'];
                    } else{
                        $postData['cover_image'] = 'uploads/'.'download.png';
                    }
                    $this->event_model->create_event($postData,$event_id);
                }
            }

            if ($event_id > 0) {
                    if($postArray['is_images_deleted_ids']!=''){
                        $imagesID_explode=explode(',',$postArray['is_images_deleted_ids']);
                        for($i=0;$i<=count($imagesID_explode)-1;$i++){
                            $old_media = $this->event_model->unlink_event_file(TBL_APP_MEDIA,$imagesID_explode[$i],'media_path');
                            if($old_media != '')
                              unlink(FCPATH . $old_media);
                            $this->event_model->delete_medias(array('id'=>$imagesID_explode[$i],'type'=>'i'));
                        }
                    }
                    for($i=1;$i<=$imageCount;$i++){
                        $default=0;
                        $imagename='image'.$i;
                        $response = $this->save_images($imagename, $event_id, $default);
                        if($response!=1){
                            $responseData['code'] = 400;
                            $responseData['status'] = 'error';
                            $responseData['message']= $response;
                            je_mobile($responseData); exit;
                        }
                    }
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message'] =$this->lang->language[$message];
            }else{
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["err_something_went_wrong"];
            }
        }
        je_mobile($responseData);
    } 

    protected function create_event_rules() {
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
                'label' => $this->lang->language["DESCRIPTION"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'deLatitude',
                'label' => $this->lang->language["LATTITUDE"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'deLongitude',
                'label' => $this->lang->language["LONGITUDE"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'email',
                'label' => $this->lang->language["EMAIL"],
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
			/*array(
                'field' => 'cover_image',
                'label' => 'cover image',
                'rules' => 'required',
            ),*/
        );
        return $rules;
    }

    protected function edit_event_rules() {
        $rules = array(
            array(
                'field' => 'event_id',
                'label' => 'event_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
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

}
