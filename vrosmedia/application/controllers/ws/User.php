<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('users', $this->data['language']);
        parent::load_version_model('ws/User_model_' . $this->data['version'], 'user_model');
    }


    public function login() {

        $user_info = NULL;
        $responseData=array();
        $this->form_validation->set_rules($this->user_login_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        } else {

            $exists = $this->user_model->get_single_user(array("email" => $this->input->post('email'), "password" => md5($this->input->post('password')),"user_type"=>'u',"active"=>'1',"deleted"=>'0'));
            if (count($exists)) {
                if ($exists->active == 1) {
                    $postArray = $this->input->post();
                    $user_info= $this->getUserInfo($exists->id);
                    $user_info->user_id=$user_info->id;
                    unset($user_info->active);
                    unset($user_info->id);

                    if($user_info->categories!=''){
                        $user_info->categorylists= $this->getCategoryLists($user_info->categories);
                    }else{
                        $user_info->categorylists=array();
                    }
                    //My business Count
                    $user_info->my_business_count= $this->user_model->CountRecords($user_info->user_id,TBL_BUSINESS);
                    //My event Count
                    $user_info->my_event_count= $this->user_model->CountRecords($user_info->user_id,TBL_EVENT);


                    unset($postArray['email']);
                    unset($postArray['password']);
                    $postArray['is_active_status']='Online';
                    $this->user_model->update_user($postArray, $user_info->user_id);
                    $responseData['code'] = 200;
                    $responseData['status'] = 'success';
                    $responseData['data'] =$user_info;



                } else {
                    $responseData['code'] = 401;
                    $responseData['status'] = 'error';
                    $responseData['message'] =$this->lang->language['err_user_not_active'];
                }
            } else {
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language['err_user_not_exists'];
            }
        }

        je_mobile($responseData);

    }
    public function register() {
        $responseData=array();

        $this->form_validation->set_rules($this->user_rules($this->input->post('email')));
        if ($this->form_validation->run() == FALSE) {


            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];

        } else {

            $exists = $this->user_model->get_single_user(array("email" => $this->input->post('email'),"active"=>'1',"deleted"=>'0'));
            if (!count($exists)) {
                $postArray = $this->input->post();
                $postArray['password'] = md5($this->input->post('password'));
                $postArray['i_date'] = time();
                $postArray['user_type'] ='u';
                $postArray['u_date']  = time();
                $postArray['active']  = 1;
                $postArray['deleted']  = 0;
                 $postArray['is_active_status']='Online';
                $postArray['image']='uploads/user/dummy.png';
                $ins_id = $this->user_model->insert_user($postArray);

                if ($ins_id > 0) {

                    //sent welcome mail

                    $user_data=array(
                        'name'=>$postArray['name'],
                        'email'=>$postArray['email'],
                    );
                    $this->sent_welcome_mail($user_data);

                    //end

                    $user_info= $this->getUserInfo($ins_id);
                    $user_info->user_id=$user_info->id;
                    unset($user_info->active);
                    unset($user_info->id);

                    if($user_info->categories!=''){
                        $user_info->categorylists= $this->getCategoryLists($user_info->categories);
                    }else{
                        $user_info->categorylists=array();
                    }


                    //My business Count
                    $user_info->my_business_count= $this->user_model->CountRecords($user_info->user_id,TBL_BUSINESS);
                    //My event Count
                    $user_info->my_event_count= $this->user_model->CountRecords($user_info->user_id,TBL_EVENT);


                    $file_upload = parent::saveFile('image', 'uploads/user/' . $ins_id . '/');

                    if ($file_upload['file_name'] != "") {
                        $postArray = array();
                        $postArray['image'] = 'uploads/user/' . $ins_id . '/' . $file_upload['file_name'];
                        $this->user_model->update_user($postArray, $ins_id);

                        $user_info->image=USER_IMG.$ins_id . '/' . $file_upload['file_name'];

                        $responseData['code'] = 200;
                        $responseData['status'] = 'success';
                        $responseData['data'] =$user_info;
                    } else if ($file_upload['errors'] != "") {

                        $responseData['code'] = 401;
                        $responseData['status'] = 'error';
                        $responseData['message']= $file_upload['errors'];

                    }else{

                        $responseData['code'] = 200;
                        $responseData['status'] = 'success';
                        $responseData['data'] =$user_info;
                    }
                }else{

                    $responseData['code'] = 401;
                    $responseData['status'] = 'error';
                    $responseData['message']= $this->lang->language["somethings_went_wrong"];

                }
            }else{

                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["email_exits"];
            }
        }
        je_mobile($responseData);
    }

    public function social_login(){


        $responseData=array();
        $this->form_validation->set_rules($this->social_login_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        } else {
            $postArray = $this->input->post();

            if($postArray['social_type']=='f'){
                $exists = $this->user_model->get_single_user(array("fb_id" => $this->input->post('social_id'),"user_type"=>'u',"deleted"=>'0'));
                $postArray['fb_id']=$postArray['social_id'];
                /*----Below column name and value use while user already register and for update data----- */
                $ColumnName='fb_id';
                $ColumnValue=$postArray['social_id'];
                unset($postArray['social_id']);
            }else{
                $exists = $this->user_model->get_single_user(array("gplus_id" => $this->input->post('social_id'),"user_type"=>'u',"deleted"=>'0'));
                $postArray['gplus_id']=$postArray['social_id'];

                /*----Below column name and value use while user already register and for update data----- */
                $ColumnName='gplus_id';
                $ColumnValue=$postArray['social_id'];
                unset($postArray['social_id']);
            }

            if(!$exists){

                $postArray['i_date'] = time();
                $postArray['user_type'] ='u';
                $postArray['u_date']  = time();
                $postArray['active']  = 1;
                $postArray['deleted']  = 0;
                $postArray['image']='uploads/user/dummy.png';
                 $postArray['is_active_status']='Online';
                $ins_id = $this->user_model->insert_user($postArray);

                if ($ins_id > 0) {
                    $user_info= $this->getSocialUserInfo($ins_id);
                    $user_info->user_id=$user_info->id;
                    unset($user_info->active);
                    unset($user_info->id);

                    if($user_info->categories!=''){
                        $user_info->categorylists= $this->getCategoryLists($user_info->categories);
                    }else{
                        $user_info->categorylists=array();
                    }
                    //My business Count
                    $user_info->my_business_count= $this->user_model->CountRecords($user_info->user_id,TBL_BUSINESS);
                    //My event Count
                    $user_info->my_event_count= $this->user_model->CountRecords($user_info->user_id,TBL_EVENT);


                    $file_upload = parent::saveFile('image', 'uploads/user/' . $ins_id . '/');

                    if ($file_upload['file_name'] != "") {
                        $postArray = array();
                        $postArray['image'] = 'uploads/user/' . $ins_id . '/' . $file_upload['file_name'];

                        $this->user_model->update_user($postArray, $ins_id);

                        $user_info->image=USER_IMG.$ins_id . '/' . $file_upload['file_name'];

                        $responseData['code'] = 200;
                        $responseData['status'] =$this->lang->language["Registered_successfully"];
                        $responseData['data'] =$user_info;
                    } else if ($file_upload['errors'] != "") {

                        $responseData['code'] = 401;
                        $responseData['status'] = 'error';
                        $responseData['message']= $this->lang->language["somethings_went_wrong"];

                    }else{
                        $responseData['code'] = 200;
                        $responseData['status'] =$this->lang->language["Registered_successfully"];
                        $responseData['data'] =$user_info;
                    }
                }else{


                    $responseData['code'] = 401;
                    $responseData['status'] = 'error';
                    $responseData['message']= $this->lang->language["somethings_went_wrong"];

                }

            }else{
     
                unset($postArray['social_type']);
               /* $postArray['u_date']  = time(); */
                $postArray['is_active_status']='Online';
                $postArray['image']=$exists->image;
                $this->user_model->update_data($postArray,$ColumnName,$ColumnValue);

                $exists = $this->user_model->get_social_user(array($ColumnName =>$ColumnValue,"deleted"=>'0'));
                
                $exists->user_id=$exists->id;
                unset($exists->active);
                unset($exists->id);

                if($exists->categories!=''){
                    $exists->categorylists= $this->getCategoryLists($exists->categories);
                }else{
                    $exists->categorylists=array();
                }

                //My business Count
                $exists->my_business_count= $this->user_model->CountRecords($exists->user_id,TBL_BUSINESS);
                //My event Count
                $exists->my_event_count= $this->user_model->CountRecords($exists->user_id,TBL_EVENT);
 


                /*$file_upload = parent::saveFile('image', 'uploads/user/' . $exists->user_id . '/');

                if ($file_upload['file_name'] != "") {


                    $postArray = array();
                    $postArray['image'] = 'user/' . $exists->user_id . '/' . $file_upload['file_name'];
                    $this->user_model->update_user($postArray, $exists->user_id);

                    $exists->image=USER_IMG.$exists->user_id . '/' . $file_upload['file_name'];

                    $responseData['code'] = 200;
                    $responseData['status'] =$this->lang->language["Login_successfully"];
                    $responseData['data'] =$exists;
                } else if ($file_upload['errors'] != "") {

                    $responseData['code'] = 401;
                    $responseData['status'] = 'error';
                    $responseData['message']= $this->lang->language["somethings_went_wrong"];

                }else{
              unset($exists->image);
                    $responseData['code'] = 200;
                    $responseData['status'] =$this->lang->language["Login_successfully"];
                    $responseData['data'] =$exists;
                }*/
                if($exists->image!=''){
                    if(preg_match("/uploads/i", $exists->image)){
                        $exists->image=DOMAIN_URL.'/'.$exists->image;
                    }

                }
               // unset($exists->image);
                $responseData['code'] = 200;
                $responseData['status'] =$this->lang->language["Login_successfully"];
                $responseData['data'] =$exists;


            }
        }
        je_mobile($responseData);
    }
    public function get_user_profile_data(){
        $responseData=array();
        $this->form_validation->set_rules($this->user_profile_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];

        } else {

            $exists = $this->user_model->get_user_profile_data(array("id" => $this->input->post('user_id'),"deleted"=>'0',"user_type"=>'u'));
            if (count($exists)) {
                $exists->user_id=$exists->id;
                unset($exists->active);
                unset($exists->id);

                if($exists->categories!=''){
                    $exists->categorylists= $this->getCategoryLists($exists->categories);
                }else{
                    $exists->categorylists=array();
                }

                //My business Count
                $exists->my_business_count= $this->user_model->CountRecords($exists->user_id,TBL_BUSINESS);
                //My event Count
                $exists->my_event_count= $this->user_model->CountRecords($exists->user_id,TBL_EVENT);
                //notification count
                $count=$this->user_model->CountNotificationRecords($exists->user_id);
                $exists->notification_count=(int)$count[0]['notification_count'];

                if($exists->image!=''){
                    if(preg_match("/uploads/i", $exists->image)){
                        $exists->image=DOMAIN_URL.'/'.$exists->image;
                    }

                }

                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['data'] =$exists;

            }else{

                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language['err_user_not_exists'];
            }
        }
        je_mobile($responseData);
    }

    function update_profile_data(){
        $responseData=array();
        $this->form_validation->set_rules($this->user_profile_rules());
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{
            $exists = $this->user_model->get_user_profile_data(array("id" => $this->input->post('user_id'),"deleted"=>'0',"user_type"=>'u'));
            if (count($exists)) {
                $postArray = $this->input->post();
                unset($postArray['user_id']);


                if(!empty($postArray)){
                    $this->user_model->update_data($postArray,'id',$this->input->post('user_id'));
                }
                $user_info = $this->user_model->get_user_profile_data(array("id" => $this->input->post('user_id'),"deleted"=>'0',"user_type"=>'u'));

                $user_info->user_id=$user_info->id;
                unset($user_info->active);
                unset($user_info->id);

                if($user_info->categories!=''){
                    $user_info->categorylists= $this->getCategoryLists($user_info->categories);
                }else{
                    $user_info->categorylists=array();
                }

                //My business Count
                $user_info->my_business_count= $this->user_model->CountRecords($user_info->user_id,TBL_BUSINESS);
                //My event Count
                $user_info->my_event_count= $this->user_model->CountRecords($user_info->user_id,TBL_EVENT);

                $file_upload = parent::saveFile('image', 'uploads/user/' . $user_info->user_id . '/');

                if ($file_upload['file_name'] != "") {

                    $postArray = array();
                    $postArray['image'] = 'uploads/user/' . $user_info->user_id . '/' . $file_upload['file_name'];
                    $this->user_model->update_user($postArray, $user_info->user_id);

                    $user_info->image=USER_IMG.$user_info->user_id . '/' . $file_upload['file_name'];

                    $responseData['code'] = 200;
                    $responseData['status'] ='success';
                    $responseData['data'] =$user_info;
                } else if ($file_upload['errors'] != "") {

                    $responseData['code'] = 401;
                    $responseData['status'] = 'error';
                    $responseData['message']= $this->lang->language["somethings_went_wrong"];

                }else{
                    // pre($user_info);

                    if($user_info->image!=''){
                        if(preg_match("/uploads/i", $user_info->image)){
                            $user_info->image=DOMAIN_URL.$user_info->image;
                        }

                    }

                    $responseData['code'] = 200;
                    $responseData['status'] ='success';
                    $responseData['data'] =$user_info;
                }

            }else{
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language['err_user_not_exists'];
            }
        }
        je_mobile($responseData);
    }
    function sign_out(){
        $responseData=array();
        $this->form_validation->set_rules($this->signOut_rules());
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{
            $exists = $this->user_model->get_user_profile_data(array("id" => $this->input->post('user_id'),"deleted"=>'0'));
            if (count($exists)) {
                $postArray = $this->input->post();
                unset($postArray['user_id']);
                $postArray['deviceid']='';
                $postArray['is_active_status']='Offline';

                $this->user_model->update_data($postArray,'id',$this->input->post('user_id'));



                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message'] = $this->lang->language['Logout_successfully'];


            }else{
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language['err_user_not_exists'];
            }
        }
        je_mobile($responseData);
    }
    function forgot_password(){
        $responseData=array();
        $this->form_validation->set_rules($this->forgot_password_rules());
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{
            $exists = $this->user_model->get_user_profile_data(array("email" => $this->input->post('email'),"deleted"=>'0'));
            if (count($exists)) {


                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message'] ='Check Mail for reset password details';


            }else{
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language['err_user_not_exists'];
            }
        }
        je_mobile($responseData);
    }
    public function change_password() {

        $user_info = NULL;
        $responseData=array();
        $this->form_validation->set_rules($this->user_chngePSW_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        } else {

            $exists = $this->user_model->get_single_user(array("password" => md5($this->input->post('old_password')),"id"=>$this->input->post('user_id'),"user_type"=>'u',"active"=>'1',"deleted"=>'0'));
            if (count($exists)) {

                $postArray = $this->input->post();

                $postData=array('password'=> md5($postArray['new_password']),'u_date'=>time());

                $this->user_model->update_user($postData, $exists->id);

                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message'] =$this->lang->language['succ_password_change'];




            } else {
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language['err_user_not_exists'];
            }
        }

        je_mobile($responseData);
    }
    
    public function my_events(){
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{
            $events = array();
            $postArray = $this->input->post();
            $user_events=$this->user_model->getMyEventsData($postArray);
			
            for($i=0;$i<=count($user_events)-1;$i++){
                parent::load_version_model('ws/Event_model_' . $this->data['version'], 'event_model');
                $data = $this->event_model->getEventDetail($user_events[$i]['id']);

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

                    if(!empty($data)){
                        $events[] = $data;
                    } 
                }
            }
            if(!empty($events)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] = $events;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }
        }
        je_mobile($responseData);
    }

    public function my_business(){
        $today=date('Y-m-d');
        $responseData=array();
        $this->form_validation->set_rules($this->my_creation_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();

            $businessData=$this->user_model->getMyBusinessData($postArray);

            for($i=0;$i<=count($businessData)-1;$i++){

                $getBusinessImages=$this->user_model->getAllImages($businessData[$i]['id'],'business_id');

                $checkLoggedUserEventLiked=$this->user_model->checkUserEventLiked($postArray['user_id'],$businessData[$i]['id'],'business_id');
                $getBusinessCategoryData=$this->user_model->GetCategoryData($businessData[$i]['category_id'],'1');

                $myComments=$this->user_model->myComment($businessData[$i]['id'],$postArray['user_id'],'business');

                for($j=0;$j<=count($getBusinessImages)-1;$j++){
                    if($getBusinessImages[$j]['type']=='i'){
                        $getBusinessImages[$j]['thumb']='';
                    }
                }

                // ads scubscriptions
                $AdsSubscriptionData=$this->user_model->get_business_ads_subscription_data($businessData[$i]['id']);

                // check payment validation

                if(!empty($AdsSubscriptionData)){

                    $startTimeStamp = strtotime($AdsSubscriptionData[0]['payment_date']);
                    $endTimeStamp = strtotime($today);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                    $numberDays = intval($numberDays);


                    if($AdsSubscriptionData[0]['duration']<$numberDays){
                        $AdsSubscriptionData[0]['is_active']=0;
                        $AdsSubscriptionData[0]['remaining_days']=0;
                    }else{
                        $AdsSubscriptionData[0]['remaining_days']=$AdsSubscriptionData[0]['duration']-$numberDays;
                        $AdsSubscriptionData[0]['is_active']=1;
                    }

                    //check end date
                    if($AdsSubscriptionData[0]['is_active']==1){
                        if($AdsSubscriptionData[0]['end_time']<$today){
                            $AdsSubscriptionData[0]['is_active']=0;
                        }else{
                            $AdsSubscriptionData[0]['is_active']=1;
                        }
                    }

                    //total clciks and date graph
                    $AdsSubscriptionData[0]['revenue_data']=$this->user_model->get_ads_revenue($AdsSubscriptionData[0]['ads_id']);
                }
                // offer Subscription
                $OfferSubscriptionData=$this->user_model->get_business_offer_subscription_data($businessData[$i]['id']);

                $Offers_count=$this->user_model->count_business_offers($businessData[$i]['id']);


                if(!empty($OfferSubscriptionData)){

                    $startTimeStamp = strtotime($OfferSubscriptionData[0]['payment_date']);
                    $endTimeStamp = strtotime($today);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                    $numberDays = intval($numberDays);


                    if($OfferSubscriptionData[0]['duration']<$numberDays){
                        $OfferSubscriptionData[0]['is_active']=0;
                        $OfferSubscriptionData[0]['remaining_days']=0;
                    }else{
                        $OfferSubscriptionData[0]['remaining_days']=$OfferSubscriptionData[0]['duration']-$numberDays;
                        $OfferSubscriptionData[0]['is_active']=1;
                    }

                    $OfferSubscriptionData[0]['total_offers']=$Offers_count[0]['offer_count'];
                }
                //pre($OfferSubscriptionData);



                if(count($checkLoggedUserEventLiked)){
                    $businessData[$i]['is_user_exits']=true;
                    $businessData[$i]['CreatedUserData']=$checkLoggedUserEventLiked;
                }else{
                    $businessData[$i]['is_user_exits']=false;
                    $businessData[$i]['CreatedUserData']=array();
                }
                $businessData[$i]['datetime']=date('Y-m-d H:i',$businessData[$i]['datetime']);


                $businessData[$i]['LikedusersLists']=array();
                $businessData[$i]['CommentedusersLists']=array();
                $businessData[$i]['medias']=$getBusinessImages;
                $businessData[$i]['CategoryData']=$getBusinessCategoryData;
                $businessData[$i]['Ads_subscription_data']=$AdsSubscriptionData;
                $businessData[$i]['Offer_subscription_data']=$OfferSubscriptionData;
                $businessData[$i]['MyComment']=$myComments;
                $getBusinessImages=NULL;
                $getBusinessCategoryData=NULL;
                $CreatedUserData=NULL;
                $checkLoggedUserEventLiked=NULL;
                $AdsSubscriptionData=NULL;
                $OfferSubscriptionData=NULL;
                $Offers_count=NULL;
                $myComments=NULL;


            }



            if(!empty($businessData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$businessData;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }
        }
        je_mobile($responseData);

    }
    function my_wishlists(){

        $responseData=array();
        $this->form_validation->set_rules($this->my_wishlists_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $postArray = $this->input->post();


            //  $MyWishlistsData=$this->user_model->getMyWishListsData($postArray);

            $postArray = $this->input->post();

            // Set Valid Limit and Offset
            if(!$postArray['Limit']){
                $postArray['Limit']=5;
            }

            if($postArray['Offset']==0 || !$postArray['Offset']){
                $postArray['Offset']=1;
            }
            //valid lat long
            $ValidLatLong=$this->isValidLatitude($postArray['deLatitude'],$postArray['deLongitude']);
            $postArray['deLatitude']=$ValidLatLong['deLatitude'];
            $postArray['deLongitude']=$ValidLatLong['deLongitude'];

            // date filters
            
            if($postArray['start_date']!='' && $postArray['end_date']!=''){
                $data['records']=$this->user_model->getMyWishListsDataByDate($postArray);
            }else{

                $data['records']=$this->user_model->getMyWishListsData($postArray);
            }

//echo $this->db->last_query(); exit;
            if($postArray['Offset']==0){
                $data['offset']= $postArray['Offset']+2;
            }else{
                $data['offset']= $postArray['Offset']+1;
            }


            $data['TotalRecords']=count($data['records']);
            $data['is_last']=0;
           

            if($data['offset']){

                $postArray['Offset']=$data['offset'];
                if($postArray['start_date']!='' && $postArray['end_date']!=''){
                    $nextRecords['data']=$this->user_model->getMyWishListsDataByDate($postArray);
                }else{

                    $nextRecords['data']=$this->user_model->getMyWishListsData($postArray);
                }

                // pre($nextRecords['data']);
                $TotalNextrecordcount=count($nextRecords['data']);
                if($TotalNextrecordcount<=0){

                    $data['is_last']=1;

                }
            }
            for($i=0;$i<=count($data['records'])-1;$i++){
                if($data['records'][$i]['type']=='event' && !empty($data['records'][$i]['id'])){
             
                    $getEventsuserLikes=$this->user_model->getEventsLikedUsers($data['records'][$i]['id']);
                    
                    $getEventsuserCommented=$this->user_model->getEventsCommentedUsers($data['records'][$i]['id']);
                    $getEventsImages=$this->user_model->getAllImages($data['records'][$i]['id'],'event_id');
                    $getEventsCategoryData=$this->user_model->GetCategoryData($data['records'][$i]['category_id'],'2');
                   
                      

                    $checkLoggedUserEventLiked=$this->user_model->checkUserEventLiked($postArray['user_id'],$data['records'][$i]['id'],'event_id');

                    $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']=$this->user_model->getUserEventAttendanceStatus($data['records'][$i]['id']);

                    $CreatedUserData=$this->user_model->CreatedUserData($data['records'][$i]['user_id']);
                    $myComments=$this->user_model->myComment($data['records'][$i]['id'],$postArray['user_id'],'event');

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
                    unset($data['records'][$i]['website']);
                    unset($data['records'][$i]['fb_link']);
                    unset($data['records'][$i]['twitter_link']);
                    unset($data['records'][$i]['gplus_link']);

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

                }elseif ($data['records'][$i]['type']=='business' && $data['records'][$i]['id']!='') {
               
                    $getBusinessImages=$this->user_model->getAllImages($data['records'][$i]['id'],'business_id');
                    $getBusinessuserLikes=$this->user_model->getBusinesssLikedUsers($data['records'][$i]['id']);

                    $checkLoggedUserEventLiked=$this->user_model->checkUserEventLiked($postArray['user_id'],$data['records'][$i]['id'],'business_id');
                    $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']='';

                    $getBusinessCategoryData=$this->user_model->GetCategoryData($data['records'][$i]['category_id'],'1');
                    $CreatedUserData=$this->user_model->CreatedUserData($data['records'][$i]['user_id']);
                    $getBusinessuserCommented=$this->user_model->getBusinessCommentedUsers($data['records'][$i]['id']);

                    $myComments=$this->user_model->myComment($data['records'][$i]['id'],$postArray['user_id'],'business');

                    if(count($checkLoggedUserEventLiked)){
                        $data['records'][$i]['is_user_exits']=true;
                        $data['records'][$i]['LoggedinUserDetail']=$checkLoggedUserEventLiked;
                    }else{
                        $data['records'][$i]['is_user_exits']=false;
                        $data['records'][$i]['LoggedinUserDetail']=array();
                    }
                    $data['records'][$i]['datetime']=date('Y-m-d H:i',$data['records'][$i]['datetime']);
                    unset($data['records'][$i]['start_time']);
                    unset($data['records'][$i]['end_time']);
                    unset($data['records'][$i]['venue']);
                    unset($data['records'][$i]['category_id']);

                    $data['records'][$i]['CreatedUserData']=$CreatedUserData;
                    $data['records'][$i]['LikedusersLists']=$getBusinessuserLikes;
                    $data['records'][$i]['CommentedusersLists']=$getBusinessuserCommented;
                    $data['records'][$i]['medias']=$getBusinessImages;
                    $data['records'][$i]['CategoryData']=$getBusinessCategoryData;
                    $data['records'][$i]['MyComment']=$myComments;
                    $getBusinessImages=NULL;
                    $getBusinessCategoryData=NULL;
                    $CreatedUserData=NULL;
                    $checkLoggedUserEventLiked=NULL;
                    $getBusinessuserCommented=NULL;
                    $getBusinessuserLikes=NULL;
                    $myComments=NULL;
                }


            }



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

    public function my_offers(){
        $today=date('Y-m-d');
        $responseData=array();
        $this->form_validation->set_rules($this->my_offers_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();

            $offersData=$this->user_model->getMyOffersData($postArray);


            for($i=0;$i<=count($offersData)-1;$i++){

                $CreatedUserData=$this->user_model->CreatedUserData($offersData[$i]['user_id']);
                $get_offer_comments=$this->user_model->get_offer_comments($offersData[$i]['offer_id']);

                $get_offer_userLikes=$this->user_model->getOfferLikedUsers($offersData[$i]['offer_id']);
                $checkLoggedUserOfferLiked=$this->user_model->checkUserOfferLiked($postArray['user_id'],$offersData[$i]['offer_id'],'offer_id');
                $myComments=$this->user_model->myComment($offersData[$i]['offer_id'],$postArray['user_id'],'offer');

                if(count($checkLoggedUserOfferLiked)){
                    $offersData[$i]['is_user_exits']=true;
                    $offersData[$i]['LoggedinUserDetail']=$checkLoggedUserOfferLiked;
                }else{
                    $offersData[$i]['is_user_exits']=false;
                    $offersData[$i]['LoggedinUserDetail']=array();
                }
                // check payment validation
                $startTimeStamp = strtotime($offersData[$i]['payment_date']);
                $endTimeStamp = strtotime($today);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                $numberDays = intval($numberDays);


                if($offersData[$i]['duration']<$numberDays){
                    $offersData[$i]['is_active']=0;
                }else{
                    $offersData[$i]['is_active']=1;
                }

                //check end date
                if( $offersData[$i]['is_active']==1){
                    if($offersData[$i]['end_time']<$today){
                        $offersData[$i]['is_active']=0;
                    }else{
                        $offersData[$i]['is_active']=1;
                    }
                }
                $offersData[$i]['CreatedUserData']=$CreatedUserData;
                $offersData[$i]['LikedusersLists']=$get_offer_userLikes;
                $offersData[$i]['CommentedusersLists']=$get_offer_comments;
                $offersData[$i]['MyComment']=$myComments;

                $CreatedUserData=NULL;
                $get_offer_comments=NULL;
                $get_offer_userLikes=NULL;
                $checkLoggedUserOfferLiked=NULL;
                $myComments=NULL;

            }
            if(!empty($offersData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$offersData;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }
        }
        je_mobile($responseData);

    }
    function change_offer_status(){
        $this->form_validation->set_rules($this->change_offer_status_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();
            $offer_id=$postArray['offer_id'];
            unset($postArray['offer_id']);
            $offersData=$this->user_model->update_offer($postArray,$offer_id);

            if($postArray['eStatus']==1){
                $message='Offer activated!';
            }else{
                $message='Offer deactivated!';
            }

            if(!empty($offersData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message'] =$message;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

        }
        je_mobile($responseData);
    }
    function delete_comment(){
        $this->form_validation->set_rules($this->delete_comment_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();
            $comment_id=$postArray['comment_id'];

            $offersData=$this->user_model->delete_comment($comment_id);



            if(!empty($offersData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message'] ='Comment Deleted';
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

        }
        je_mobile($responseData);
    }

    function change_ads_status(){
        $this->form_validation->set_rules($this->change_ads_status_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();
            $ads_id=$postArray['ads_id'];
            unset($postArray['ads_id']);
            $adsData=$this->user_model->update_ads($postArray,$ads_id);

            if($postArray['eStatus']==1){
                $message='Advertisment  activated!';
            }else{
                $message='Advertisment  deactivated!';
            }

            if(!empty($adsData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message'] =$message;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

        }
        je_mobile($responseData);
    }
    function delete_business(){
        $this->form_validation->set_rules($this->delete_business_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();
            $business_id=$postArray['business_id'];
            unset($postArray['business_id']);
            $businessData=$this->user_model->delete_business($postArray,$business_id);
            $this->user_model->delete_ads($postArray,$business_id);
            $this->user_model->delete_offer($postArray,$business_id);

            if($postArray['deleted']==1){
                $message='Business deleted!';
            }else{
                $message='Business Activated!';
            }

            if(!empty($businessData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message'] =$message;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
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
    private function getUserInfo($iUserId = 0) {
        $user_info = $this->user_model->get_single_user(array('id' => $iUserId, 'active' => '1',"deleted"=>'0',"user_type"=>'u'));

        if (!is_null($user_info->image)) {

            if(preg_match("/uploads/i", $user_info->image)){
                $user_info->image=DOMAIN_URL.'/'.$user_info->image;
            }
        }else{
            unset($user_info->image);
        }
        return $user_info;
    }
    private function getSocialUserInfo($iUserId = 0) {
        $user_info = $this->user_model->get_social_user(array('id' => $iUserId, 'active' => '1',"deleted"=>'0',"user_type"=>'u'));

        if (!is_null($user_info->image)) {
            $user_info->image = USER_IMG.$user_info->image;
        }else{
            unset($user_info->image);
        }
        return $user_info;
    }
    protected function getCategoryLists($Categories){
        $explode=explode(',',$Categories);

        for($i=0;$i<=count($explode)-1;$i++){

            $CategoryData = $this->user_model->get_Usercategories(array("deleted"=>'0','CategoryID'=>$explode[$i]));
            $result[]=$CategoryData;

        }
        return $result;
    }
    function sent_welcome_mail($userdata){

        $this->viewData['userdata'] = $userdata;
        $invoice_email_template=$this->load->view('mail/welcome',$this->viewData);
        $subject='Welcome to VROS Media';

        $emaildata = $this->generateEmailTemplate($invoice_email_template->output->final_output,$subject);
        $this->sendEmail(array('to' =>$userdata['email'], 'cc' => $emaildata['vCC'], 'bcc' => $emaildata['vBCC'], 'vSubject' => $emaildata['vSubject'], 'vMessage' => $emaildata['vMessage'], 'vFromName' => $emaildata['vFromName'], 'vFromEmail' => $emaildata['vFromEmail']));
        return true;
    }
	
	public function delete_event(){
        $this->form_validation->set_rules($this->delete_event_rules());
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{
            $postArray = $this->input->post();
            $eventData = $this->user_model->get_single_event(array('id'=>$postArray['event_id'],'user_id'=>$postArray['user_id']));
            if(!empty($eventData)){
                $event_media = $this->user_model->get_event_media(array('event_id'=>$postArray['event_id']));
                foreach ($event_media as $key => $value) {
                    unlink(FCPATH.$value['media_path']);
                }
                $this->db->delete(TBL_APP_MEDIA,array('event_id'=>$postArray['event_id']));
                unlink(FCPATH.$eventData->cover_image);
                $this->db->delete('tbl_events',array('id'=>$postArray['event_id']));    
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message'] ='Deleted successfully';
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

        }
        je_mobile($responseData);
    }
	
    protected function user_rules($email, $iUserId = 0) {
        $rules = array(
            array(
                'field' => 'name',
                'label' => $this->lang->language["user_first_name"],
                'rules' => 'trim|required|xss_clean|max_length[100]',
            ),
            array(
                'field' => 'email',
                'label' => $this->lang->language["user_email"],
                'rules' => 'trim|required|max_length[255]|valid_email|xss_clean',
            ),
            array(
                'field' => 'password',
                'label' => $this->lang->language["user_password"],
                'rules' => 'trim|required|min_length[6]|max_length[40]|xss_clean',
            ),
            array(
                'field' => 'deviceid',
                'label' => $this->lang->language["user_deviceToken"],
                'rules' => 'trim|required',
            ),
        );
        return $rules;
    }
    protected function social_login_rules() {
        $rules = array(
            array(
                'field' => 'social_type',
                'label' => $this->lang->language["social_type"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'social_id',
                'label' => $this->lang->language["social_id"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'deviceid',
                'label' => $this->lang->language["user_deviceToken"],
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function user_login_rules() {
        $rules = array(
            array(
                'field' => 'email',
                'label' => $this->lang->language["user_email"],
                'rules' => 'trim|required|max_length[255]|valid_email|xss_clean',
            ),
            array(
                'field' => 'password',
                'label' => $this->lang->language["user_password"],
                'rules' => 'trim|required|min_length[6]|max_length[40]|xss_clean',
            ),
            array(
                'field' => 'deviceid',
                'label' => $this->lang->language["user_deviceToken"],
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }


    protected function user_profile_rules() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => $this->lang->language["userid"],
                'rules' => 'trim|required|xss_clean',
            ),

        );
        return $rules;
    }
    protected function my_wishlists_rules() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => $this->lang->language["userid"],
                'rules' => 'trim|required|xss_clean',
            ),

        );
        return $rules;
    }
    protected function signOut_rules() {
        $rules = array(

            array(
                'field' => 'user_id',
                'label' => $this->lang->language["userid"],
                'rules' => 'trim|required|xss_clean',
            ),

        );
        return $rules;
    }

    protected function forgot_password_rules() {
        $rules = array(

            array(
                'field' => 'email',
                'label' => $this->lang->language["user_email"],
                'rules' => 'trim|required|xss_clean',
            ),

        );
        return $rules;
    }
    protected function user_chngePSW_rules() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'old_password',
                'label' => $this->lang->language["user_old_password"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'new_password',
                'label' => $this->lang->language["user_new_password"],
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }

    protected function user_password_rules() {
        $rules = array(
            array(
                'field' => 'vOldPassword',
                'label' => $this->lang->language["user_old_password"],
                'rules' => 'trim|required|xss_clean|callback_old_password',
            ),
            array(
                'field' => 'vNewPassword',
                'label' => $this->lang->language["user_new_password"],
                'rules' => 'trim|required|min_length[6]|max_length[40]|xss_clean',
            ),
        );
        return $rules;
    }
    protected function my_creation_rules() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' =>'id',
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
        );
        return $rules;
    }
    protected function my_offers_rules() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' =>'id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' => $this->lang->language["LATTITUDE"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'transaction_id',
                'label' => $this->lang->language["LATTITUDE"],
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function change_offer_status_rules() {
        $rules = array(
            array(
                'field' => 'offer_id',
                'label' =>'id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'eStatus',
                'label' => 'status',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function change_ads_status_rules() {
        $rules = array(
            array(
                'field' => 'ads_id',
                'label' =>'id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'eStatus',
                'label' => 'status',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function delete_business_rules(){
        $rules = array(
            array(
                'field' => 'business_id',
                'label' =>'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'deleted',
                'label' => 'deleted',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }

    protected function delete_comment_rules(){
        $rules = array(
            array(
                'field' => 'comment_id',
                'label' =>'comment_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
	
	protected function delete_event_rules(){
        $rules = array(
            array(
                'field' => 'event_id',
                'label' =>'event_id',
                'rules' => 'trim|required|xss_clean',
            ),
			array(
                'field' => 'user_id',
                'label' =>'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
}
