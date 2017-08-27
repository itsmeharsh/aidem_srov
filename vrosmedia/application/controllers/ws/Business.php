<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('business', $this->data['language']);
        parent::load_version_model('ws/Business_model_' . $this->data['version'], 'business_model');
    }

    public function index(){

        $responseData=array();
        $data=array();
        $this->form_validation->set_rules($this->home_screen_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
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

            //date filters
            if($postArray['start_date']!='' && $postArray['end_date']!=''){
                $data['records']=$this->business_model->getBusinessByDate($postArray);
            }else{
                $data['records']=$this->business_model->getBusiness($postArray);
            }

            $data['offset']= $postArray['Offset']+1;

            $data['TotalRecords']=count($data['records']);
            $data['is_last']=0;

            if($data['offset']){

                $postArray['Offset']=$data['offset'];
                if($postArray['start_date']!='' && $postArray['end_date']!=''){
                    $nextRecords['data']=$this->business_model->getBusinessByDate($postArray);
                }else{
                    $nextRecords['data']=$this->business_model->getBusiness($postArray);
                }

                $TotalNextrecordcount=count($nextRecords['data']);
                if($TotalNextrecordcount<=0){

                    $data['is_last']=1;

                }
            }
            
            for($i=0;$i<=count($data['records'])-1;$i++){

                $getBusinessImages=$this->business_model->getAllImages($data['records'][$i]['id'],'business_id');
                 

                $getBusinessuserLikes=$this->business_model->getBusinesssLikedUsers($data['records'][$i]['id']);

                $checkLoggedUserEventLiked=$this->business_model->checkUserEventLiked($postArray['user_id'],$data['records'][$i]['id'],'business_id');
                $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']='';

                $getBusinessCategoryData=$this->business_model->GetCategoryData($data['records'][$i]['category_id'],'1');
                $CreatedUserData=$this->business_model->CreatedUserData($data['records'][$i]['user_id']);
                $getBusinessuserCommented=$this->business_model->getBusinessCommentedUsers($data['records'][$i]['id']);

                $myComments=$this->business_model->myComment($data['records'][$i]['id'],$postArray['user_id'],'business');

                //remove image thumb
                for($j=0;$j<=count($getBusinessImages)-1;$j++){
                    if($getBusinessImages[$j]['type']=='i'){
                        $getBusinessImages[$j]['thumb']='';
                    }
                }
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
                $getBusinessuserLikes=NULL;
                $getBusinessuserCommented=NULL;
                $myComments=NULL;
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
    public function home(){
        $today=date('Y-m-d');
        $responseData=array();
        $data=array();
        $this->form_validation->set_rules($this->home_screen_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
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
                $data['records']=$this->business_model->getDataByDate($postArray);
            }else{

                $data['records']=$this->business_model->getData($postArray);
            }

            $data['offset']= $postArray['Offset']+1;

            $data['TotalRecords']=count($data['records']);
            $data['is_last']=0;

            if($data['offset']){

                $postArray['Offset']=$data['offset'];
                if($postArray['start_date']!='' && $postArray['end_date']!=''){
                    $nextRecords['data']=$this->business_model->getDataByDate($postArray);
                }else{

                    $nextRecords['data']=$this->business_model->getData($postArray);
                }

                $TotalNextrecordcount=count($nextRecords['data']);
                if($TotalNextrecordcount<=0){

                    $data['is_last']=1;

                }
            }
            //  pre($data['records']);
            for($i=0;$i<=count($data['records'])-1;$i++){
                if($data['records'][$i]['type']=='event'){

                    $getEventsuserLikes=$this->business_model->getEventsLikedUsers($data['records'][$i]['id']);
                    $getEventsuserCommented=$this->business_model->getEventsCommentedUsers($data['records'][$i]['id']);
                    $getEventsImages=$this->business_model->getAllImages($data['records'][$i]['id'],'event_id');
                    $getEventsCategoryData=$this->business_model->GetCategoryData($data['records'][$i]['category_id'],'2');

                    $checkLoggedUserEventLiked=$this->business_model->checkUserEventLiked($postArray['user_id'],$data['records'][$i]['id'],'event_id');
                    $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']=$this->business_model->getUserEventAttendanceStatus($data['records'][$i]['id']);

                    $CreatedUserData=$this->business_model->CreatedUserData($data['records'][$i]['user_id']);

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
                    unset($data['records'][$i]['duration']);
                    unset($data['records'][$i]['payment_date']);
                    unset($data['records'][$i]['payment_status']);

                    $data['records'][$i]['LikedusersLists']=$getEventsuserLikes;
                    $data['records'][$i]['CommentedusersLists']=$getEventsuserCommented;
                    //  $data['records'][$i]['attendee']=$getEventsAttendeeUsers;
                    $data['records'][$i]['medias']=$getEventsImages;
                    $data['records'][$i]['CategoryData']=$getEventsCategoryData;
                    $data['records'][$i]['CreatedUserData']=$CreatedUserData;

                    $getEventsuserLikes=NULL;
                    $getEventsuserCommented=NULL;
                    // $getEventsAttendeeUsers=NULL;
                    $getEventsImages=NULL;
                    $checkLoggedUserEventLiked=NULL;
                    $getEventsCategoryData=NULL;
                    $CreatedUserData=NULL;

                }elseif ($data['records'][$i]['type']=='business') {

                    $getBusinessImages=$this->business_model->getAllImages($data['records'][$i]['id'],'business_id');
                    $getBusinessuserLikes=$this->business_model->getBusinesssLikedUsers($data['records'][$i]['id']);

                    $checkLoggedUserEventLiked=$this->business_model->checkUserEventLiked($postArray['user_id'],$data['records'][$i]['id'],'business_id');
                    $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']='';

                    $getBusinessCategoryData=$this->business_model->GetCategoryData($data['records'][$i]['category_id'],'1');
                    $CreatedUserData=$this->business_model->CreatedUserData($data['records'][$i]['user_id']);
                    $getBusinessuserCommented=$this->business_model->getBusinessCommentedUsers($data['records'][$i]['id']);

                    //remove image thumb
                    for($j=0;$j<=count($getBusinessImages)-1;$j++){
                        if($getBusinessImages[$j]['type']=='i'){
                            $getBusinessImages[$j]['thumb']='';
                        }
                    }
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
                    unset($data['records'][$i]['duration']);
                    unset($data['records'][$i]['payment_date']);
                    unset($data['records'][$i]['payment_status']);

                    $data['records'][$i]['CreatedUserData']=$CreatedUserData;
                    $data['records'][$i]['LikedusersLists']=$getBusinessuserLikes;
                    $data['records'][$i]['CommentedusersLists']=$getBusinessuserCommented;
                    $data['records'][$i]['medias']=$getBusinessImages;
                    $data['records'][$i]['CategoryData']=$getBusinessCategoryData;
                    $getBusinessImages=NULL;
                    $getBusinessCategoryData=NULL;
                    $CreatedUserData=NULL;
                    $checkLoggedUserEventLiked=NULL;
                    $getBusinessuserCommented=NULL;
                    $getBusinessuserLikes=NULL;

                }elseif($data['records'][$i]['type']=='offer') {

                    $CreatedUserData=$this->business_model->CreatedUserData($data['records'][$i]['user_id']);
                    $get_offer_comments=$this->business_model->get_offer_comments($data['records'][$i]['id']);

                    $get_offer_userLikes=$this->business_model->getOfferLikedUsers($data['records'][$i]['id']);
                    $checkLoggedUserOfferLiked=$this->business_model->checkUserOfferLiked($postArray['user_id'],$data['records'][$i]['id'],'offer_id');

                    if(count($checkLoggedUserOfferLiked)){
                        $data['records'][$i]['is_user_exits']=true;
                        $data['records'][$i]['LoggedinUserDetail']=$checkLoggedUserOfferLiked;
                    }else{
                        $data['records'][$i]['is_user_exits']=false;
                        $data['records'][$i]['LoggedinUserDetail']=array();
                    }
                    // check payment validation
                    $startTimeStamp = strtotime($data['records'][$i]['payment_date']);
                    $endTimeStamp = strtotime($today);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                    $numberDays = intval($numberDays);


                    if($data['records'][$i]['duration']<$numberDays){
                        $data['records'][$i]['is_active']=0;
                    }else{
                        $data['records'][$i]['is_active']=1;
                    }

                    //check end date
                    if($data['records'][$i]['is_active']==1){
                        if($data['records'][$i]['end_time']<$today){
                            $data['records'][$i]['is_active']=0;
                        }else{
                            $data['records'][$i]['is_active']=1;
                        }
                    }
                    $data['records'][$i]['CreatedUserData']=$CreatedUserData;
                    $data['records'][$i]['LikedusersLists']=$get_offer_userLikes;
                    $data['records'][$i]['CommentedusersLists']=$get_offer_comments;


                    unset($data['records'][$i]['category_id']);
                    unset($data['records'][$i]['duration']);
                    unset($data['records'][$i]['location']);
                    unset($data['records'][$i]['address']);
                    unset($data['records'][$i]['venue']);
                    unset($data['records'][$i]['distance']);
                    unset($data['records'][$i]['working_hours']);
                    unset($data['records'][$i]['Lattitude']);
                    unset($data['records'][$i]['Longitude']);
                    unset($data['records'][$i]['since']);
                    unset($data['records'][$i]['mobile']);
                    unset($data['records'][$i]['email']);

                    $CreatedUserData=NULL;
                    $get_offer_comments=NULL;
                    $get_offer_userLikes=NULL;
                    $checkLoggedUserOfferLiked=NULL;


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
    public function get_event_attendee(){
        $responseData=array();
        $data=array();
        $this->form_validation->set_rules($this->event_attendee_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $postArray = $this->input->post();
            // Set Valid Limit and Offset
            if(!$postArray['Limit']){
                $postArray['Limit']=5;
            }

            if($postArray['Offset']==0 || !$postArray['Offset']){
                $postArray['Offset']=0;
            }
            $getEventsAttendeeUsers['records']=$this->business_model->getEventsAttendeeUsers($postArray);

            if(!empty($getEventsAttendeeUsers)){

                $getEventsAttendeeUsers['offset']= $postArray['Offset']+1;
                $getEventsAttendeeUsers['TotalRecords']=count($getEventsAttendeeUsers['records']);
                $getEventsAttendeeUsers['is_last']=0;

                if($getEventsAttendeeUsers['offset']){

                    $postArray['Offset']=$getEventsAttendeeUsers['offset'];
                    $nextRecords['data']=$this->business_model->getEventsAttendeeUsers($postArray);
                    $TotalNextrecordcount=count($nextRecords['data']);
                    if($TotalNextrecordcount<=0){

                        $getEventsAttendeeUsers['is_last']=1;

                    }
                }

                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$getEventsAttendeeUsers;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

        }
        je_mobile($responseData);
    }
    public function get_comments(){
        $responseData=array();
        $data=array();


        $postArray = $this->input->post();
        // Set Valid Limit and Offset
        if(!$postArray['Limit']){
            $postArray['Limit']=5;
        }

        if($postArray['Offset']==0 || !$postArray['Offset']){
            $postArray['Offset']=1;
        }

        if($postArray['event_id']){

            $model_function='getAllEventsCommentedUsers';

        }elseif($postArray['business_id']){

            $model_function='getAllBusinessCommentedUsers';

        }elseif($postArray['offer_id']){
            $model_function='getAllOffersCommentedUsers';
        }

        $Comments['records']=$this->business_model->$model_function($postArray);

        if(!empty($Comments)){

            $Comments['offset']= $postArray['Offset']+1;
            $Comments['TotalRecords']=count($Comments['records']);
            $Comments['is_last']=0;

            if($Comments['offset']){

                $postArray['Offset']=$Comments['offset'];
                $nextRecords['data']=$this->business_model->$model_function($postArray);
                $TotalNextrecordcount=count($nextRecords['data']);
                if($TotalNextrecordcount<=0){

                    $Comments['is_last']=1;

                }
            }

            $responseData['code'] = 200;
            $responseData['status'] ='success';
            $responseData['data'] =$Comments;
        }else{
            $responseData['code'] = 200;
            $responseData['status'] = 'success';
            $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
        }


        je_mobile($responseData);
    }
    public function get_likes(){
        $responseData=array();
        $data=array();


        $postArray = $this->input->post();
        // Set Valid Limit and Offset
        if(!$postArray['Limit']){
            $postArray['Limit']=5;
        }

        if($postArray['Offset']==0 || !$postArray['Offset']){
            $postArray['Offset']=0;
        }

        if($postArray['event_id']){

            $model_function='getAllEventsLikedUsers';

        }elseif($postArray['business_id']){

            $model_function='getAllBusinessLikedUsers';

        }

        $Comments['records']=$this->business_model->$model_function($postArray);

        if(!empty($Comments)){

            $Comments['offset']= $postArray['Offset']+1;
            $Comments['TotalRecords']=count($Comments['records']);
            $Comments['is_last']=0;

            if($Comments['offset']){

                $postArray['Offset']=$Comments['offset'];
                $nextRecords['data']=$this->business_model->$model_function($postArray);
                $TotalNextrecordcount=count($nextRecords['data']);
                if($TotalNextrecordcount<=0){

                    $Comments['is_last']=1;

                }
            }

            $responseData['code'] = 200;
            $responseData['status'] ='success';
            $responseData['data'] =$Comments;
        }else{
            $responseData['code'] = 200;
            $responseData['status'] = 'success';
            $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
        }


        je_mobile($responseData);
    }

    public function event_detail(){
        $responseData=array();
        $this->form_validation->set_rules($this->event_detailView_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();
            $eventData=$this->business_model->getEventsDetailsData($postArray);

            if(count($eventData)){


                $getEventsuserLikes=$this->business_model->getEventsLikedUsers($eventData['id']);
                $getEventsuserCommented=$this->business_model->getEventsCommentedUsers($eventData['id']);
                $getEventsImages=$this->business_model->getAllImages($eventData['id'],'event_id');
                $getEventsCategoryData=$this->business_model->GetCategoryData($eventData['category_id'],'2');

                $checkLoggedUserEventLiked=$this->business_model->checkUserEventLiked($postArray['user_id'],$eventData['id'],'event_id');
                $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']=$this->business_model->getUserEventAttendanceStatus($eventData['id']);

                $CreatedUserData=$this->business_model->CreatedUserData($eventData['user_id']);

                $myComments=$this->business_model->myComment($eventData['id'],$postArray['user_id'],'event');

//remove image thumb

                for($j=0;$j<=count($getEventsImages)-1;$j++){
                    if($getEventsImages[$j]['type']=='i'){
                        $getEventsImages[$j]['thumb']='';
                    }
                }


                if(count($checkLoggedUserEventLiked)){
                    $eventData['is_user_exits']=true;
                    $eventData['LoggedinUserDetail']=$checkLoggedUserEventLiked;
                }else{
                    $eventData['is_user_exits']=false;
                    $eventData['LoggedinUserDetail']=array();
                }
                $eventData['start_time']=date('Y-m-d H:i',$eventData['start_time']);
                $eventData['end_time']=date('Y-m-d H:i',$eventData['end_time']);



                $eventData['LikedusersLists']=$getEventsuserLikes;
                $eventData['CommentedusersLists']=$getEventsuserCommented;
//  $eventData['attendee']=$getEventsAttendeeUsers;
                $eventData['medias']=$getEventsImages;
                $eventData['CategoryData']=$getEventsCategoryData;
                $eventData['CreatedUserData']=$CreatedUserData;
                $eventData['MyComment']=$myComments;

            }else{
                $eventData=array();
            }





            if(!empty($eventData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$eventData;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }
        }
        je_mobile($responseData);
    }
    public function business_detail(){
        $responseData=array();
        $this->form_validation->set_rules($this->business_detailView_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();                      

            $businessData=$this->business_model->getDetailBusinessData($postArray); 
            if(!empty($businessData)){
                $getBusinessImages=$this->business_model->getAllImages($businessData['id'],'business_id');
                $getBusinessuserLikes=$this->business_model->getBusinesssLikedUsers($businessData['id']);
                $checkLoggedUserEventLiked=$this->business_model->checkUserEventLiked($postArray['user_id'],$businessData['id'],'business_id');
                $checkLoggedUserEventLiked[0]['userEventAttendanceStatus']='';
                $getBusinessCategoryData=$this->business_model->GetCategoryData($businessData['category_id'],'1');
                $CreatedUserData=$this->business_model->CreatedUserData($businessData['user_id']);
                $getBusinessuserCommented=$this->business_model->getBusinessCommentedUsers($businessData['id']);
                $getBusinessuserCommented=$this->business_model->getBusinessCommentedUsers($businessData['id']);
                $myComments=$this->business_model->myComment($businessData['id'],$postArray['user_id'],'business');

                if($postArray['user_id']==$businessData['user_id']){
                     // ads scubscriptions
                    $AdsSubscriptionData=$this->business_model->get_business_ads_subscription_data($businessData['id']);
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
                        $AdsSubscriptionData[0]['revenue_data']=$this->business_model->get_ads_revenue($AdsSubscriptionData[0]['ads_id']);
                    }
                    // offer Subscription
                    $OfferSubscriptionData=$this->business_model->get_business_offer_subscription_data($businessData['id']);
                    $Offers_count=$this->business_model->count_business_offers($businessData['id']);
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
                     $businessData['Ads_subscription_data']=$AdsSubscriptionData;
                     $businessData['Offer_subscription_data']=$OfferSubscriptionData;
                }     

                //remove image thumb
                for($j=0;$j<=count($getBusinessImages)-1;$j++){
                    if($getBusinessImages[$j]['type']=='i'){
                        $getBusinessImages[$j]['thumb']='';
                    }
                }
                if(count($checkLoggedUserEventLiked)){
                    $businessData['is_user_exits']=true;
                    $businessData['LoggedinUserDetail']=$checkLoggedUserEventLiked;
                }else{
                    $businessData['is_user_exits']=false;
                    $businessData['LoggedinUserDetail']=array();
                }
                $businessData['datetime']=date('Y-m-d H:i',$businessData['datetime']);
                unset($businessData['start_time']);
                unset($businessData['end_time']);
                unset($businessData['venue']);
                unset($businessData['category_id']);
                unset($businessData['duration']);
                unset($businessData['payment_date']);
                unset($businessData['payment_status']);

                $businessData['CreatedUserData']=$CreatedUserData;
                $businessData['LikedusersLists']=$getBusinessuserLikes;
                $businessData['CommentedusersLists']=$getBusinessuserCommented;
                $businessData['medias']=$getBusinessImages;
                $businessData['CategoryData']=$getBusinessCategoryData;
                $businessData['MyComment']=$myComments;


            
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
    public function business_like(){

        $responseData=array();
        $postArray = $this->input->post();
        if($postArray['is_like']==0){
            $count=-1;
            $Message='BUSINESS_DISLIKE_SUCCESS';
        }else{
            $Message='BUSINESS_LIKE_SUCCESS';
            $count=1;
        }


        $this->form_validation->set_rules($this->business_like_rule());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $exists = $this->business_model->check_user_business_like(array("business_id" => $postArray['business_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_like');

            if (count($exists)) {
                //update business Like

                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserBusinessUserDetailByBusinessID($postArray['business_id']);


                    $message=$getUserDetail->name.' like '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["like_business_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["like_business_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["like_business_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["like_business_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }

                $LikedID=$this->business_model->DoBusinessLike($postArray,$exists->id);

                if($postArray['is_like']==$exists->is_like){
                    $count=0;
                }



            }else{
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserBusinessUserDetailByBusinessID($postArray['business_id']);


                    $message=$getUserDetail->name.' like '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["like_business_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["like_business_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["like_business_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["like_business_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }
                //add business like
                $LikedID=$this->business_model->DoBusinessLike($postArray);
            }

            if($LikedID>0){
                //Update business Total Count
                $this->business_model->UpdateCount('totallike',$count,$postArray['business_id']);

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
    public function business_share(){

        $responseData=array();
        $postArray = $this->input->post();

        if($postArray['is_share']==1){
            $count=1;
            $Message='BUSINESS_SHARE_SUCCESS';
        }else{
            $Message='BUSINESS_REMOVESHARE_SUCCESS';
            $count=-1;
        }

        $this->form_validation->set_rules($this->business_share_rule());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $exists = $this->business_model->check_user_business_like(array("business_id" => $postArray['business_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_share');
            if (count($exists)) {
                //update business Share

                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserBusinessUserDetailByBusinessID($postArray['business_id']);


                    $message=$getUserDetail->name.' share '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["share_business_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["share_business_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["share_business_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["share_business_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }


                $LikedID=$this->business_model->DoBusinessLike($postArray,$exists->id);
                if($postArray['is_share']==$exists->is_share){
                    $count=0;
                }



            }else{
                //add business Share
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserBusinessUserDetailByBusinessID($postArray['business_id']);


                    $message=$getUserDetail->name.' share '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["share_business_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["share_business_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["share_business_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["share_business_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }


                $LikedID=$this->business_model->DoBusinessLike($postArray);
            }

            if($LikedID>0){
                //Update business Total Share Count



                $this->business_model->UpdateCount('totalshare',$count,$postArray['business_id']);

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
    public function business_favorite(){

        $responseData=array();
        $postArray = $this->input->post();
        if($postArray['is_favourite']==1){
            $count=1;
            $Message='BUSINESS_FAVORITE_SUCCESS';
        }else{
            $Message='BUSINESS_UNFAVORITE_SUCCESS';
            $count=-1;
        }

        $this->form_validation->set_rules($this->business_favorite_rule());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $exists = $this->business_model->check_user_business_like(array("business_id" => $postArray['business_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_favourite');

            if (count($exists)) {


                //update business favorite

                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserBusinessUserDetailByBusinessID($postArray['business_id']);




                    $message=$getUserDetail->name.' favorite '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["favorite_business_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["favorite_business_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["favorite_business_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["favorite_business_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }

                $FavoriteID=$this->business_model->DoBusinessLike($postArray,$exists->id);
                if($postArray['is_favourite']==$exists->is_favourite){
                    $count=0;
                }


            }else{

                //add business favorite
                if($count==1){


                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserBusinessUserDetailByBusinessID($postArray['business_id']);


                    $message=$getUserDetail->name.' favorite '.$getBusinessUserDetail[0]['name'];


                    $notificationData=array(
                        'title'=>$this->lang->language["favorite_business_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["favorite_business_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);


                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["favorite_business_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["favorite_business_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }
                $FavoriteID=$this->business_model->DoBusinessLike($postArray);
            }

            if($FavoriteID>0){
                //Update business Total Favorite Count

                $this->business_model->UpdateCount('totalfavorite',$count,$postArray['business_id']);

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
    public function create_business(){

           
        $responseData=array();
        $postArray = $this->input->post();

        if($postArray['business_id']!=''){
            $validationRules=$this->edit_business_rules();
        }else{
            $validationRules=$this->create_business_rules();
        }

        $this->form_validation->set_rules($validationRules);
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';


            $responseData['message']= $this->lang->language["err_req_values"];


        }else{


            if(isset($postArray['business_id'])!=''){
                $message='EDITED';
                $imageCount=$postArray['is_iCount'];
                $videoCount=$postArray['is_vCount'];
                $postArray['datetime']=time();
            }else{
                $message='CREATED';
                $imageCount=$postArray['is_iCount'];
                $videoCount=$postArray['is_vCount'];
                $postArray['datetime']=time();
                $postArray['deleted']=0;
            }

            if(isset($postArray['deLatitude']) AND $postArray['deLongitude']!=''){

                $ValidLatLong=$this->isValidLatitude($postArray['deLatitude'],$postArray['deLongitude']);

                $postArray['latitude']=$ValidLatLong['deLatitude'];
                $postArray['longitude']=$ValidLatLong['deLongitude'];

                unset($postArray['deLatitude']);
                unset($postArray['deLongitude']);

            }



            $business_id = $this->business_model->create_business($postArray,$postArray['business_id']);
            //save QR code
            $businessTitle=$postArray['name'];
            $QrLink='https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl={"id":"'.$business_id.'","type":"business","title":"'.$businessTitle.'"}&choe=UTF-8&chld=L|2';
            $this->business_model->create_business(array('QRCode'=>$QrLink),$business_id);

             
            //move cover image
            if($business_id!=''){
                if($_FILES["cover_image"]["name"]!=''){
                    $file_upload = parent::saveFile('cover_image', 'uploads/business/' . $business_id . '/');
                    if ($file_upload['file_name'] != "") {
                        $postData['cover_image'] = 'uploads/business/' . $business_id . '/' . $file_upload['file_name'];


                    } else{
                        $postData['cover_image'] = 'uploads/'.'download.png';
                    }
                    $this->business_model->create_business($postData,$business_id);

                }
            }

            if ($business_id > 0) {

                //move images
                //  echo $imageCount;
                //if($imageCount>0){


                    if($postArray['is_images_deleted_ids']!=''){
                        $imagesID_explode=explode(',',$postArray['is_images_deleted_ids']);
                        
                        for($i=0;$i<=count($imagesID_explode)-1;$i++){

                            $this->business_model->delete_medias(array('id'=>$imagesID_explode[$i],'type'=>'i'));

                        }

                    }
                    for($i=1;$i<=$imageCount;$i++){

                        $default=0;
                        $imagename='image'.$i;

                        $response = $this->save_images($imagename, $business_id, $default);


                        if($response!=1){
                            $responseData['code'] = 400;
                            $responseData['status'] = 'error';
                            $responseData['message']= $response;
                            je_mobile($responseData); exit;
                        }
                    }

                //}
                //move videos
                //if($videoCount>0){
                    if($postArray['is_video_deleted_ids']!=''){
                        $videoID_explode=explode(',',$postArray['is_video_deleted_ids']);

                            for($i=0;$i<=count($videoID_explode)-1;$i++){

                            $this->business_model->delete_medias(array('id'=>$videoID_explode[$i],'type'=>'v'));

                        }

                    }
                    for($j=1;$j<=$videoCount;$j++){

                        $videoname='video'.$j;

                        $video_id= $this->save_videos($videoname,$business_id,0);

                        $this->save_video_thumb('thumb'.$j,$business_id,$video_id);

                        if($video_id<0){
                            $responseData['code'] = 400;
                            $responseData['status'] = 'error';
                            $responseData['message']= 'somethings went wrong';
                            je_mobile($responseData); exit;
                        }

                    }
                //}

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

            //business ratting
            $exists_ratting = $this->business_model->check_user_business_like(array("business_id" => $postArray['business_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'rate');

            if (count($exists_ratting)) {
                //Update business ratting
                $SharedID=$this->business_model->business_ratting($postArray,$exists_ratting->id);

            }else{
                //add business ratting
                $SharedID=$this->business_model->business_ratting($postArray);
            }
            unset($postArray['rate']);

            //business comments

            $exists_comments = $this->business_model->check_business_comment(array("business_id" => $postArray['business_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'id');

            if (count($exists_comments)) {
                //Update business comment
                $CommentID=$this->business_model->add_comments($postArray,$exists_comments->id);

            }else{
                //add business comments

                $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                $getBusinessUserDetail=$this->business_model->UserBusinessUserDetailByBusinessID($postArray['business_id']);


                $message=$getUserDetail->name.' rated '.$getBusinessUserDetail[0]['name'];

                $notificationData=array(
                    'title'=>$this->lang->language["comment_business_title"],
                    'message'=>$message,
                    'user_id'=>$getBusinessUserDetail[0]['user_id'],
                    'image'=>$getUserDetail->image,
                    'type'=>$this->lang->language["comment_business_type"],
                    'redirect_id'=>$postArray['business_id'],
                    'is_status'=>1,
                    'eStatus'=>1,
                    'deleted'=>0,
                );

                $notification_id=$this->business_model->add_notification_data($notificationData);

                $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["comment_business_type"],'redirect_id'=>$postArray['business_id'],'post_title'=>$this->lang->language["comment_business_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                if($getBusinessUserDetail[0]['is_notification']=='ON')
                    parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);

                $CommentID=$this->business_model->add_comments($postArray);
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
    public function share_business_with_friends(){
        $responseData=array();
        $this->form_validation->set_rules($this->share_business_with_friends_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();

            $friends_ids=explode(',',$postArray['friends_ids']);

            $sender_user_details=$this->business_model->UserSingleUserDetail(array("id" =>$postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
            $businessDetail=$this->business_model->SingleBusinessDetail(array("id" =>$postArray['business_id'],"deleted"=>'0'));

            for($i=0;$i<=count($friends_ids)-1;$i++){



                $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" =>$friends_ids[$i],"user_type"=>'u',"deleted"=>'0'));



                $message=$sender_user_details->name.' shared '.$businessDetail->name.' with you!';

                $notificationData=array(
                    'title'=>$this->lang->language["share_business_with_friends_title"],
                    'message'=>$message,
                    'user_id'=>$friends_ids[$i],
                    'image'=>$sender_user_details->image,
                    'type'=>$this->lang->language["share_business_with_friends_type"],
                    'redirect_id'=>$businessDetail->business_id,
                    'is_status'=>1,
                    'eStatus'=>1,
                    'deleted'=>0,
                );

                $notification_id=$this->business_model->add_notification_data($notificationData);

                $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["share_business_with_friends_type"],'redirect_id'=>$businessDetail->business_id,'post_title'=>$this->lang->language["share_business_with_friends_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                if($getUserDetail->is_notification=='ON')
                    parent::sendAndroidNotification($data,$getUserDetail->deviceid);

            }

            $responseData['code'] = 200;
            $responseData['status'] = 'success';
            $responseData['message'] =$this->lang->language["SUCCESSFULLY_SHARE_BUSINESS"];

        }
        je_mobile($responseData);
    }
    public function share_offer_with_friends(){
        $responseData=array();
        $this->form_validation->set_rules($this->share_offer_with_friends_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();

            $friends_ids=explode(',',$postArray['friends_ids']);

            $sender_user_details=$this->business_model->UserSingleUserDetail(array("id" =>$postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
            $offerDetail=$this->business_model->SingleOfferDetail(array("id" =>$postArray['offer_id'],"deleted"=>'0'));

            for($i=0;$i<=count($friends_ids)-1;$i++){



                $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" =>$friends_ids[$i],"user_type"=>'u',"deleted"=>'0'));



                $message=$sender_user_details->name.' shared '.$offerDetail->name.' with you!';

                $notificationData=array(
                    'title'=>$this->lang->language["share_offer_with_friends_title"],
                    'message'=>$message,
                    'user_id'=>$friends_ids[$i],
                    'image'=>$sender_user_details->image,
                    'type'=>$this->lang->language["share_offer_with_friends_type"],
                    'redirect_id'=>$offerDetail->offer_id,
                    'is_status'=>1,
                    'eStatus'=>1,
                    'deleted'=>0,
                );

                $notification_id=$this->business_model->add_notification_data($notificationData);

                $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["share_offer_with_friends_type"],'redirect_id'=>$offerDetail->offer_id,'post_title'=>$this->lang->language["share_offer_with_friends_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                if($getUserDetail->is_notification=='ON')
                    parent::sendAndroidNotification($data,$getUserDetail->deviceid);

                   }

            $responseData['code'] = 200;
            $responseData['status'] = 'success';
            $responseData['message'] =$this->lang->language["SUCCESSFULLY_SHARE_BUSINESS"];

        }
        je_mobile($responseData);
    }

    public function get_all_offers(){
        $today=date('Y-m-d');
        $responseData=array();
        $this->form_validation->set_rules($this->get_all_offers_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else {
            $postArray = $this->input->post();
            if(!$postArray['Limit']){
                $postArray['Limit']=5;
            }

            if($postArray['Offset']==0 || !$postArray['Offset']){
                $postArray['Offset']=1;
            }


            // date filters
            if($postArray['start_date']!='' && $postArray['end_date']!=''){
                $offersData['records']=$this->business_model->getAllOffersDataByDate($postArray);
            }else{

                $offersData['records']=$this->business_model->getAllOffersData($postArray);
            }

            $offersData['offset']= $postArray['Offset']+1;

            $offersData['TotalRecords']=count($offersData['records']);
            $offersData['is_last']=0;

            if($offersData['offset']){

                $postArray['Offset']=$offersData['offset'];
                if($postArray['start_date']!='' && $postArray['end_date']!=''){
                    $nextRecords['data']=$this->business_model->getAllOffersDataByDate($postArray);
                }else{

                    $nextRecords['data']=$this->business_model->getAllOffersData($postArray);
                }

                $TotalNextrecordcount=count($nextRecords['data']);
                if($TotalNextrecordcount<=0){

                    $offersData['is_last']=1;

                }
            }

            // echo $this->db->last_query(); exit;
            for ($i = 0; $i <= count($offersData['records']) - 1; $i++) {

                $CreatedUserData = $this->business_model->CreatedUserData($offersData['records'][$i]['user_id']);
                $get_offer_comments = $this->business_model->get_offer_comments($offersData['records'][$i]['offer_id']);

                $get_offer_userLikes = $this->business_model->getOfferLikedUsers($offersData['records'][$i]['offer_id']);
                $checkLoggedUserOfferLiked = $this->business_model->checkUserOfferLiked($postArray['user_id'], $offersData['records'][$i]['offer_id'], 'offer_id');

                $myComments=$this->business_model->myComment($offersData['records'][$i]['offer_id'],$postArray['user_id'],'offer');

                if (count($checkLoggedUserOfferLiked)) {
                    $offersData['records'][$i]['is_user_exits'] = true;
                    $offersData['records'][$i]['LoggedinUserDetail'] = $checkLoggedUserOfferLiked;
                } else {
                    $offersData['records'][$i]['is_user_exits'] = false;
                    $offersData['records'][$i]['LoggedinUserDetail'] = array();
                }
                // check payment validation
                $startTimeStamp = strtotime($offersData['records'][$i]['payment_date']);
                $endTimeStamp = strtotime($today);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
                $numberDays = intval($numberDays);


                if ($offersData['records'][$i]['duration'] < $numberDays) {
                    $offersData['records'][$i]['is_active'] = 0;
                } else {
                    $offersData['records'][$i]['is_active'] = 1;
                }
                   // echo $offersData['records'][$i]['is_active'] ; exit;
                //check end date
                if ($offersData['records'][$i]['is_active'] == 1) {
                    if ($offersData['records'][$i]['end_time'] < $today) {
                        $offersData['records'][$i]['is_active'] = 0;
                    } else {
                        $offersData['records'][$i]['is_active'] = 1;
                    }
                }
                $offersData['records'][$i]['type'] = 'offer';
                $offersData['records'][$i]['CreatedUserData'] = $CreatedUserData;
                $offersData['records'][$i]['LikedusersLists'] = $get_offer_userLikes;
                $offersData['records'][$i]['CommentedusersLists'] = $get_offer_comments;
                $offersData['records'][$i]['MyComment']=$myComments;
                $CreatedUserData = NULL;
                $get_offer_comments = NULL;
                $get_offer_userLikes = NULL;
                $checkLoggedUserOfferLiked = NULL;
                $myComments = NULL;

            }
            if (!empty($offersData)) {
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['data'] = $offersData;
            } else {
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language["NO_DATA_FOUND"];
            }
        }

        je_mobile($responseData);

    }
    public function offer_detail(){

        $today=date('Y-m-d');
        $responseData=array();
        $this->form_validation->set_rules($this->offer_details_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else {
            $postArray = $this->input->post();

            $offersData= $this->business_model->get_offers_details($postArray);

            $CreatedUserData = $this->business_model->CreatedUserData($offersData['user_id']);
            $get_offer_comments = $this->business_model->get_offer_comments($offersData['offer_id']);

            $get_offer_userLikes = $this->business_model->getOfferLikedUsers($offersData['offer_id']);
            $checkLoggedUserOfferLiked = $this->business_model->checkUserOfferLiked($postArray['user_id'], $offersData['offer_id'], 'offer_id');

            $myComments=$this->business_model->myComment($offersData['offer_id'],$postArray['user_id'],'offer');

            if (count($checkLoggedUserOfferLiked)) {
                $offersData['is_user_exits'] = true;
                $offersData['LoggedinUserDetail'] = $checkLoggedUserOfferLiked;
            } else {
                $offersData['is_user_exits'] = false;
                $offersData['LoggedinUserDetail'] = array();
            }
            // check payment validation
            $startTimeStamp = strtotime($offersData['payment_date']);
            $endTimeStamp = strtotime($today);
            $timeDiff = abs($endTimeStamp - $startTimeStamp);
            $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
            $numberDays = intval($numberDays);


            if ($offersData['duration'] < $numberDays) {
                $offersData['is_active'] = 0;
            } else {
                $offersData['is_active'] = 1;
            }

            //check end date
            if ($offersData['is_active'] == 1) {
                if ($offersData['end_time'] < $today) {
                    $offersData['is_active'] = 0;
                } else {
                    $offersData['is_active'] = 1;
                }
            }
            $offersData['type'] = 'offer';
            $offersData['CreatedUserData'] = $CreatedUserData;
            $offersData['LikedusersLists'] = $get_offer_userLikes;
            $offersData['CommentedusersLists'] = $get_offer_comments;
            $offersData['MyComment']=$myComments;



            if (!empty($offersData)) {
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['data'] = $offersData;
            } else {
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message'] = $this->lang->language["NO_DATA_FOUND"];
            }
        }

        je_mobile($responseData);
    }
    public function create_business_offers(){
        $today=date('Y-m-d');
        $responseData=array();
        $postArray = $this->input->post();

        if($postArray['offer_id']==''){
            $this->form_validation->set_rules($this->create_business_offers_rules());
        }else{
            $this->form_validation->set_rules($this->edit_business_offers_rules());
        }
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $existing=$this->business_model->check_business_payment(array("transaction_id" => $postArray['transaction_id'],"type"=>'offer',"deleted"=>'0'),'payment_date,duration,payment_status');
            //days between two dates

            if($existing->payment_status!='' && $existing->payment_status=='approved'){


                $startTimeStamp = strtotime($existing->payment_date);
                $endTimeStamp = strtotime($today);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                $numberDays = intval($numberDays);

                if($existing->duration<$numberDays){

                    $responseData['code'] = 200;
                    $responseData['status'] = 'error';
                    $responseData['message'] =$this->lang->language["MAKE_PAYMENT_NOW"];
                    je_mobile($responseData); exit;

                }else{
                    $offerData=array(
                        'name'=>$postArray['name'],
                        'description'=>$postArray['description'],
                        'user_id'=>$postArray['user_id'],
                        'business_id'=>$postArray['business_id'],
                        'start_time'=>$postArray['start_time'],
                        'end_time'=>$postArray['end_time'],
                        'cityID'=>$postArray['cityID'],
                        'transaction_id' => $postArray['transaction_id'],
                        'eStatus'=>1,
                        'datetime'=>time()
                    );
                    //save image
                    if($_FILES["image"]["name"]!=''){

                        $file_upload = parent::saveFile('image', 'uploads/business/' . $postArray['business_id'] . '/');
                        if ($file_upload['file_name'] != "") {
                            $postData= array();
                            $offerData['image_path'] ='uploads/business/' . $postArray['business_id'] . '/' . $file_upload['file_name'];

                        } else{
                            $offerData['image_path'] = 'uploads/'.'download.png';

                        }

                    }

                    $offerID=$this->business_model->create_business_offers($offerData,$postArray['offer_id']);
                    if($offerID>0){

                        if($postArray['offer_id']==''){
                            $message='OFFER_CREATED_SUCCESSFULLY';
                        }else{
                            $message='OFFER_EDITED_SUCCESSFULLY';
                        }


                        $responseData['code'] = 200;
                        $responseData['status'] = 'success';
                        $responseData['message'] =$this->lang->language[$message];

                    }else{
                        $responseData['code'] = 400;
                        $responseData['status'] = 'error';
                        $responseData['message']= $this->lang->language["somethings_went_wrong"];
                    }


                }


            }else{

                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["PAYMENT_IS_NOT_APPROVED"];

            }


        }
        je_mobile($responseData);
    }
    public function business_payment(){
        $today=date('Y-m-d');
        $responseData=array();

        $this->form_validation->set_rules($this->business_payment_rules());

        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();
            $existing=$this->business_model->check_business_payment(array("transaction_id" => $postArray['transaction_id'],"deleted"=>'0'),'payment_status,business_id');

            if($existing->payment_status=='approved'){

                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message'] =$this->lang->language["PAYMENT_ALREADY_EXISTS"];

            }else{
                if($postArray['payment_status']=='approved'){
                    $message='PAYMENT_SUCCESSFULLY';

                }else{
                    $message='PAYMENT_IS_NOT_APPROVED';
                }
                $paymentData = array(
                    'type' => $postArray['type'],
                    'business_id' => $postArray['business_id'],
                    'user_id' => $postArray['user_id'],
                    'duration' => $postArray['duration'],
                    'payment_date' => $postArray['payment_date'],
                    'amount' => $postArray['amount'],
                    'transaction_id' => $postArray['transaction_id'],
                    'payment_status' => $postArray['payment_status'],
                    'ads_type' => $postArray['ads_type'],
                    'intent' => !empty($postArray['intent']) ? $postArray['intent'] : '',
                    'response_type' => !empty($postArray['response_type']) ? $postArray['response_type'] : '',
                    'environment' => !empty($postArray['environment']) ? $postArray['environment'] : ''
                );

                if($postArray['type']=='ads'){
                    $paymentID=$this->business_model->add_business_payment($paymentData);
                }else{
                    if($existing->business_id!=''){
                        $paymentID=$this->business_model->add_business_payment($paymentData,$existing->business_id);
                    }else{
                        $paymentID=$this->business_model->add_business_payment($paymentData);
                    }
                }


                if($paymentID>0){

                    $userData=$this->business_model->UserData($postArray['user_id']);
                    $businessData=$this->business_model->BusinessData($postArray['business_id']);


                    $invoiceData=array(
                        'username'=>$userData['name'],
                        'ordering'=>$postArray['type'],
                        'businessname'=>$businessData['name'],
                        'amount'=>$postArray['amount'],
                    );


                    $this->viewData['invoiceData'] = $invoiceData;
                    $invoice_email_template=$this->load->view('mail/invoice',$this->viewData);
                    $subject=INVOICE_SUBJECT;

                    $emaildata = $this->generateEmailTemplate($invoice_email_template->output->final_output,$subject);

                    $this->sendEmail(array('to' =>$userData['email'], 'cc' => $emaildata['vCC'], 'bcc' => $emaildata['vBCC'], 'vSubject' => $emaildata['vSubject'], 'vMessage' => $emaildata['vMessage'], 'vFromName' => $emaildata['vFromName'], 'vFromEmail' => $emaildata['vFromEmail']));




                    $responseData['code'] = 200;
                    $responseData['status'] = 'success';
                    $responseData['message'] =$this->lang->language["PAYMENT_SUCCESSFULLY"];

                }else{
                    $responseData['code'] = 400;
                    $responseData['status'] = 'error';
                    $responseData['message']= $this->lang->language["somethings_went_wrong"];
                }

            }
        }
        je_mobile($responseData);

    }
    public function create_business_advertisement(){
        $today=date('Y-m-d');
        $responseData=array();
        $postArray = $this->input->post();
        if($postArray['ads_id']==''){
            $message='ADVERTISMENT_CREATED_SUCCESSFULLY';
            $this->form_validation->set_rules($this->create_business_ads_rules());
        }else{
            $message='ADVERTISMENT_EDITED_SUCCESSFULLY';
            $this->form_validation->set_rules($this->edit_business_ads_rules());
        }

        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $existing=$this->business_model->check_business_payment(array("transaction_id" => $postArray['transaction_id'],"type"=>'ads',"deleted"=>'0'),'payment_date,duration,payment_status');

//pre($existing);
           
          
            if($existing->payment_status!='' && $existing->payment_status=='approved'){
                if(isset($postArray['time'])!=''){
                    $time=$postArray['time'];
                }else{
                    $time='00';
                }
                 $days='+'.$existing->duration.' days';
                 $end_date=date('Y-m-d', strtotime($days));

                 $adsData=array(
                    'title'=>$postArray['name'],
                    'description'=>$postArray['description'],
                    'user_id'=>$postArray['user_id'],
                    'transaction_id'=>$postArray['transaction_id'],
                    'business_id'=>$postArray['business_id'],
                    'start_time'=>$postArray['start_time'],
                    'end_time'=>$end_date,
                    'time'=>$time,
                    'cityID'=>$postArray['cityID'],
                    'ads_type'=>$postArray['ads_type'],
                    'totalclicks'=>0,
                    'is_completed' =>1,
                    'i_date'=>time()
                );

                //save banner image
                if(isset($_FILES["image"]["name"])!=''){

                    $file_upload = parent::saveFile('image', 'uploads/business/' . $postArray['business_id'] . '/');
                    if ($file_upload['file_name'] != "") {
                        $postData= array();
                        $adsData['image'] = 'uploads/business/' . $postArray['business_id'] . '/' . $file_upload['file_name'];

                    } else{
                        $adsData['image'] = 'uploads/'.'download.png';

                    }
                     $bannerimage=DOMAIN_URL.'/'.$adsData['image'];

                }else{
                     $bannerimage='';
                }
                //save footer image
                if(isset($_FILES["image_footer"]["name"])!=''){

                    $file_upload_footer = parent::saveFile('image_footer', 'uploads/business/' . $postArray['business_id'] . '/');
                    if ($file_upload_footer['file_name'] != "") {
                        $postData= array();
                        $adsData['image_footer'] = 'uploads/business/' . $postArray['business_id'] . '/' . $file_upload_footer['file_name'];

                    } else{
                        $adsData['image_footer'] = 'uploads/'.'download.png';

                    }
                    $footerimage=DOMAIN_URL.'/'.$adsData['image_footer'];

                }else{
                    $footerimage='';
                }

                $ads_id=$this->business_model->create_business_ads($adsData,$postArray['ads_id']);

                if($ads_id>0){
                     
                    $responseData['code'] = 200;
                    $responseData['status'] = 'success';
                    $responseData['data'] =array('ads_id'=>$ads_id,'image'=>$bannerimage,'image_footer'=>$footerimage);

                }else{
                    $responseData['code'] = 400;
                    $responseData['status'] = 'error';
                    $responseData['message']= $this->lang->language["somethings_went_wrong"];
                }

            }else{

                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message']= $this->lang->language["PAYMENT_IS_NOT_APPROVED"];

            }

        }
        je_mobile($responseData);
    }
    public function offer_like(){

        $responseData=array();
        $postArray = $this->input->post();
        if($postArray['is_like']==0){
            $count=-1;
            $Message='OFFER_DISLIKE_SUCCESS';
        }else{
            $Message='OFFER_LIKE_SUCCESS';
            $count=1;
        }


        $this->form_validation->set_rules($this->offer_like_rule());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $exists = $this->business_model->check_user_offer_like(array("offer_id" => $postArray['offer_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_like');

            if (count($exists)) {
                //update offer Like
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserOfferUserDetailByOfferID($postArray['offer_id']);


                    $message=$getUserDetail->name.' like '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["like_offer_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["like_offer_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["like_offer_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["like_offer_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }


                $LikedID=$this->business_model->DoOfferLike($postArray,$exists->id);

                if($postArray['is_like']==$exists->is_like){
                    $count=0;
                }



            }else{
                //add offer like
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"is_notification"=>'ON',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserOfferUserDetailByOfferID($postArray['offer_id']);


                    $message=$getUserDetail->name.' like '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["like_offer_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["like_offer_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["like_offer_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["like_offer_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }



                $LikedID=$this->business_model->DoOfferLike($postArray);
            }

            if($LikedID>0){
                //Update offer Total Count
                $this->business_model->UpdateOfferCount('totallike',$count,$postArray['offer_id']);

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
    public function offer_share(){

        $responseData=array();
        $postArray = $this->input->post();

        if($postArray['is_share']==1){
            $count=-1;
            $Message='OFFER_SHARE_SUCCESS';
        }else{
            $Message='OFFER_REMOVESHARE_SUCCESS';
            $count=1;
        }

        $this->form_validation->set_rules($this->offer_share_rule());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $exists = $this->business_model->check_user_offer_like(array("offer_id" => $postArray['offer_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_share');
            if (count($exists)) {
                //update offer Share
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserOfferUserDetailByOfferID($postArray['offer_id']);


                    $message=$getUserDetail->name.' share '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["share_offer_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["share_offer_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["share_offer_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["share_offer_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }


                $LikedID=$this->business_model->DoOfferLike($postArray,$exists->id);
                if($postArray['is_share']==$exists->is_share){
                    $count=0;
                }



            }else{
                //add offer Share
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserOfferUserDetailByOfferID($postArray['offer_id']);


                    $message=$getUserDetail->name.' share '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["share_offer_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["share_offer_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["share_offer_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["share_offer_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }
                $LikedID=$this->business_model->DoOfferLike($postArray);
            }

            if($LikedID>0){
                //Update offer Total Share Count



                $this->business_model->UpdateOfferCount('totalshare',$count,$postArray['offer_id']);

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
    public function offer_favorite(){

        $responseData=array();
        $postArray = $this->input->post();
        if($postArray['is_favourite']==1){
            $count=-1;
            $Message='OFFER_FAVORITE_SUCCESS';
        }else{
            $Message='OFFER_UNFAVORITE_SUCCESS';
            $count=1;
        }

        $this->form_validation->set_rules($this->offer_favorite_rule());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{

            $exists = $this->business_model->check_user_offer_like(array("offer_id" => $postArray['offer_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'is_favourite');
            if (count($exists)) {
                //update offer favorite
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserOfferUserDetailByOfferID($postArray['offer_id']);


                    $message=$getUserDetail->name.' favorite your '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["favorite_offer_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["favorite_offer_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["favorite_offer_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["favorite_offer_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }
                $LikedID=$this->business_model->DoOfferLike($postArray,$exists->id);
                if($postArray['is_favourite']==$exists->is_favourite){
                    $count=0;
                }


            }else{
                //add offer favorite
                if($count==1){

                    $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                    $getBusinessUserDetail=$this->business_model->UserOfferUserDetailByOfferID($postArray['offer_id']);


                    $message=$getUserDetail->name.' favorite your '.$getBusinessUserDetail[0]['name'];

                    $notificationData=array(
                        'title'=>$this->lang->language["favorite_offer_title"],
                        'message'=>$message,
                        'user_id'=>$getBusinessUserDetail[0]['user_id'],
                        'image'=>$getUserDetail->image,
                        'type'=>$this->lang->language["favorite_offer_type"],
                        'redirect_id'=>$getUserDetail->user_id,
                        'is_status'=>1,
                        'eStatus'=>1,
                        'deleted'=>0,
                    );

                    $notification_id=$this->business_model->add_notification_data($notificationData);

                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["favorite_offer_type"],'redirect_id'=>$getUserDetail->user_id,'post_title'=>$this->lang->language["favorite_offer_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                    if($getBusinessUserDetail[0]['is_notification']=='ON')
                        parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);
                }
                $LikedID=$this->business_model->DoOfferLike($postArray);
            }

            if($LikedID>0){
                //Update business Total Favorite Count

                $this->business_model->UpdateCount('totalfavorite',$count,$postArray['offer_id']);

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
    public function post_offer_comments(){

        $responseData=array();
        $this->form_validation->set_rules($this->post_offer_comments_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        }else{
            $postArray = $this->input->post();
            $postArray['i_date'] = time();

            //offer ratting
            $exists_ratting = $this->business_model->check_user_offer_like(array("offer_id" => $postArray['offer_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'rate');

            if (count($exists_ratting)) {
                //Update offer ratting
                $SharedID=$this->business_model->business_ratting($postArray,$exists_ratting->id);

            }else{
                //add offer ratting
                $SharedID=$this->business_model->business_ratting($postArray);
            }
            unset($postArray['rate']);

            //offer comments

            $exists_comments = $this->business_model->check_offer_comment(array("offer_id" => $postArray['offer_id'],"user_id" => $postArray['user_id'],"deleted"=>'0'),'id');

            if (count($exists_comments)) {
                //Update offer comment
                $CommentID=$this->business_model->add_comments($postArray,$exists_comments->id);

            }else{
                //add offer comment

                $getUserDetail=$this->business_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"deleted"=>'0'));
                $getBusinessUserDetail=$this->business_model->UserOfferUserDetailByOfferID($postArray['offer_id']);


                $message=$getUserDetail->name.' commented on '.$getBusinessUserDetail[0]['name'];

                $notificationData=array(
                    'title'=>$this->lang->language["comment_offer_title"],
                    'message'=>$message,
                    'user_id'=>$getBusinessUserDetail[0]['user_id'],
                    'image'=>$getUserDetail->image,
                    'type'=>$this->lang->language["comment_offer_type"],
                    'redirect_id'=>$postArray['offer_id'],
                    'is_status'=>1,
                    'eStatus'=>1,
                    'deleted'=>0,
                );

                $notification_id=$this->business_model->add_notification_data($notificationData);

                $data = array('id'=>$notification_id,'body'=>$message,'type'=>$this->lang->language["comment_offer_type"],'redirect_id'=>$postArray['offer_id'],'post_title'=>$this->lang->language["comment_offer_title"],"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                if($getBusinessUserDetail[0]['is_notification']=='ON')
                    parent::sendAndroidNotification($data,$getBusinessUserDetail[0]['deviceid']);

                $CommentID=$this->business_model->add_comments($postArray);
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
    protected function save_images($imageName,$business_id,$is_default){

        $file_upload = parent::saveFile($imageName, 'uploads/business/' . $business_id . '/');

        if ($file_upload['file_name'] != "") {
            $postData= array();

            $postData['media_path'] = 'uploads/business/' . $business_id . '/' . $file_upload['file_name'];
            $postData['business_id']=$business_id;
            $postData['is_default']=$is_default;
            $postData['type']='i';

            $this->business_model->add_business_medias($postData);


            return true;
        } else{
            return $file_upload['errors'];
        }

    }
    protected function save_videos($Videoname,$business_id,$is_default,$row_id){

        $file_upload = parent::saveVideo($Videoname, 'uploads/business/' . $business_id . '/');
        if ($file_upload['file_name'] != "") {
            $postData= array();

            $postData['media_path'] = 'uploads/business/' . $business_id . '/' . $file_upload['file_name'];
            $postData['business_id']=$business_id;
            $postData['is_default']=$is_default;
            $postData['type']='v';

            $video_id=$this->business_model->add_business_medias($postData,$row_id);
              
            return $video_id;
        } else{
            return $file_upload['errors'];
        }

    }
    protected function save_video_thumb($imageName,$business_id,$video_id){

        $file_upload = parent::saveFile($imageName, 'uploads/business/' . $business_id . '/');
        if ($file_upload['file_name'] != "") {
            $postData= array();
            $postData['video_thumb_path'] = 'uploads/business/' . $business_id . '/' . $file_upload['file_name'];

            $this->business_model->add_video_thumb($postData,$video_id);

            return true;
        } else{
            return $file_upload['errors'];
        }

    }
    protected function save_offer_image($imageName,$business_id,$is_default){

        $file_upload = parent::saveFile($imageName, 'uploads/business/' . $business_id . '/offers/');
        if ($file_upload['file_name'] != "") {
            $postData= array();

            $image_path = 'uploads/business/' . $business_id . '/offers/' . $file_upload['file_name'];


            return $image_path;
        } else{
            return $file_upload['errors'];
        }

    }
//      public function edit_business_medias(){
//               $responseData=array();
//               $this->form_validation->set_rules($this->edit_business_media_rules());
//               if ($this->form_validation->run() == FALSE) {
//
//                       $responseData['code'] = 400;
//                       $responseData['status'] = 'error';
//                       $responseData['message']= $this->lang->language["err_req_values"];
//
//
//               }else{
//
//                     $postArray = $this->input->post();
//
//                    $response= $this->save_edited_business_medias('image',$postArray['business_id'],$postArray['is_default'],$postArray['type'],$postArray['row_id']);
//
//                    if($response!=1){
//
//                            $responseData['code'] = 400;
//                            $responseData['status'] = 'error';
//                            $responseData['message']= $response;
//
//                    }else{
//
//                            $responseData['code'] = 200;
//                            $responseData['status'] = 'success';
//                            $responseData['message'] =$this->lang->language['EDITED'];
//                    }
//               }
//             je_mobile($responseData);
//    }
//    protected function save_edited_business_medias($fileName,$business_id,$is_default,$type,$row_id){
//
//             if($type=='i'){
//              $file_upload = parent::saveFile($fileName, 'uploads/business/' . $business_id . '/');
//             }else{
//               $file_upload = parent::saveVideo($fileName, 'uploads/business/' . $business_id . '/');
//             }
//             if ($file_upload['file_name'] != "") {
//                         $postData= array();
//
//                         $postData['media_path'] = 'uploads/business/' . $business_id . '/' . $file_upload['file_name'];
//                         $postData['is_default']=$is_default;
//                         $postData['type']=$type;
//
//                         $this->business_model->add_business_medias($postData,$row_id);
//
//                         return true;
//             } else{
//                         return $file_upload['errors'];
//             }
//    }


    protected function isValidLatitude($lattitude,$longitude){

        if(strpos($lattitude,'.'))
           $lat=$lattitude;
        else
            $lat.= '.00';

        if(strpos($longitude,'.'))
            $long=$longitude;
        else
            $long.= '.00';


//        if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $lattitude)) {
//            $lat=$lattitude;
//        } else {
//            $lat=41.87;
//        }
//
//        if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $longitude)) {
//            $long=$longitude;
//        } else {
//            $long= 87.62;
//        }

        return array('deLatitude'=>$lat,'deLongitude'=>$long);
    }

    protected function home_screen_rules() {
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
    protected function event_attendee_rules() {
        $rules = array(
            array(
                'field' => 'event_id',
                'label' => 'event_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function event_detailView_rules() {
        $rules = array(
            array(
                'field' => 'event_id',
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
    protected function business_detailView_rules() {
        $rules = array(
            array(
                'field' => 'business_id',
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

    protected function business_like_rule() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' =>'business_id',
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
    protected function business_share_rule() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' =>'business_id',
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
    protected function business_favorite_rule() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' =>'business_id',
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
                'field' => 'business_id',
                'label' => 'business_id',
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

    protected function create_business_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => $this->lang->language["NAME"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'email',
                'label' => $this->lang->language["EMAIL"],
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'address',
                'label' => $this->lang->language["ADDRESS"],
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
                'field' => 'location',
                'label' => 'location',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }

    protected function edit_business_rules() {
        $rules = array(
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }

    protected function edit_business_media_rules() {
        $rules = array(
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'row_id',
                'label' => 'image_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'is_default',
                'label' => 'is_default',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'type',
                'label' => 'type',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }

    protected function share_business_with_friends_rules() {
        $rules = array(
            array(
                'field' => 'friends_ids',
                'label' => 'friends_ids',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' => 'business_id',
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
    protected function share_offer_with_friends_rules() {
        $rules = array(
            array(
                'field' => 'friends_ids',
                'label' => 'friends_ids',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'offer_id',
                'label' => 'offer_id',
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


    protected function business_payment_rules() {
        $rules = array(

            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),

            array(
                'field' => 'duration',
                'label' => 'duration',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'amount',
                'label' => 'amount',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'type',
                'label' => 'type',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'transaction_id',
                'label' => 'transaction_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'payment_status',
                'label' => 'payment_status',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function create_business_offers_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'description',
                'label' => 'description',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'start_time',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'end_time',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'transaction_id',
                'label' => 'transaction_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function edit_business_offers_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'description',
                'label' => 'description',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'start_time',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'end_time',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),

            array(
                'field' => 'transaction_id',
                'label' => 'transaction_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'offer_id',
                'label' => 'offer_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function create_business_ads_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'description',
                'label' => 'description',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'start_time',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'ads_type',
                'label' => 'ads_type',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'transaction_id',
                'label' => 'transaction_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function edit_business_ads_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'description',
                'label' => 'description',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'start_time',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'ads_type',
                'label' => 'ads_type',
                'rules' => 'trim|required|xss_clean',
            ),


            array(
                'field' => 'transaction_id',
                'label' => 'transaction_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'ads_id',
                'label' => 'transaction_id',
                'rules' => 'trim|required|xss_clean',
            ),

        );
        return $rules;
    }
    protected function offer_like_rule() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'offer_id',
                'label' =>'business_id',
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
    protected function offer_share_rule() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'offer_id',
                'label' =>'business_id',
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
    protected function offer_favorite_rule() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'offer_id',
                'label' =>'business_id',
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
    protected function post_offer_comments_rules() {
        $rules = array(
            array(
                'field' => 'offer_id',
                'label' => 'business_id',
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
    protected function offer_details_rules() {
        $rules = array(
            array(
                'field' => 'offer_id',
                'label' => 'business_id',
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
    protected function get_all_offers_rules() {
        $rules = array(
            array(
                'field' => 'user_id',
                'label' => 'user_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }





}
