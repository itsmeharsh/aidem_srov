<?php
class Ads extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Ads_model','Ads');
        $this->load->model('Setting_model','Setting');
 
        $this->lang->load('event', $this->data['language']);
    }

    public function index()
    {
       
        $this->Ads->_fields ="id,user_id,ads_type,business_id,transaction_id,title,image,start_time,end_time,ads_type";
        $this->Ads->_where = array("deleted" =>'0');
        $adsData = $this->Ads->getAdsData();
         foreach($adsData as $value){                     
            $BusinessData=  $this->Ads->getBusinessById($value->business_id);
            $value->businessName=$BusinessData['name'];
            
            $userData=  $this->Ads->getUserById($value->user_id);
            $value->UserName=$userData['name'];
            
             $AdsSubscriptionData=$this->check_ads_status($value->id,$value->business_id,$value->end_time);
             if($AdsSubscriptionData['is_active']==1){
                $value->is_active='Active'; 
                $value->is_active_color='green';
             }else{
                 $value->is_active='InActive';   
                $value->is_active_color='red';
             }
             $value->remaining_days=$AdsSubscriptionData['remaining_days'];
       
         }
      //  pre($adsData);
            
        $this->viewData['adsData'] = $adsData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] ='Advertisment Managment';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'lists' => "ads");
        $this->viewData['module'] = "ads/list";
        $this->load->view('admin/template', $this->viewData);
    }
   public function detailView($ads_id='',$iUserID=''){
        
        $today=date('Y-m-d');
        if($ads_id!='' && $iUserID!=''){
            
            $adsData= $this->Ads->get_ads_details($ads_id);

            $CreatedUserData = $this->Ads->CreatedUserData($adsData['user_id']);        
          
            $businessData=$this->Ads->getDetailBusinessData($adsData['business_id']);
             
            // check payment validation
            $startTimeStamp = strtotime($adsData['payment_date']);
            $endTimeStamp = strtotime($today);
            $timeDiff = abs($endTimeStamp - $startTimeStamp);
            $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
            $numberDays = intval($numberDays);


            if ($adsData['duration'] < $numberDays) {
                $adsData['is_active'] = 0;
                 $adsData['remaining_days'] = 0;
            } else {
                $adsData['is_active'] = 1;
                $adsData['remaining_days'] = $adsData['duration']-$numberDays;
            }

            //check end date
            if ($adsData['is_active'] == 1) {
                if ($adsData['end_time'] < $today) {
                    $adsData['is_active'] = 0;
                   
                } else {
                    $adsData['is_active'] = 1;
                   
                }
            }
            $adsData['type'] = 'ads';
            $adsData['CreatedUserData'] = $CreatedUserData;
            $adsData['BusinessData'] = $businessData;
         //  pre($adsData);
            $this->viewData['arrBradcrumb'] = array("dashboard"=>"ads", 'user' => "Detail View");
            $this->viewData['adsData'] = $adsData;
            $this->viewData['module'] = "ads/detailView";
            $this->load->view('admin/template', $this->viewData);
           
            
        }else{
            $this->load->view('errors/html/error_404');
        }
        
    }
    
     private function check_ads_status($ads_id,$business_id,$ads_end_date){
            
            $paymentData=$this->Ads->getPaymentData($business_id);
            $today=date('Y-m-d');
            $startTimeStamp = strtotime($paymentData['payment_date']);
            $endTimeStamp = strtotime($today);
            $timeDiff = abs($endTimeStamp - $startTimeStamp);
            $numberDays = $timeDiff/86400;  // 86400 seconds in one day
            $numberDays = intval($numberDays);


            if($paymentData['duration']<$numberDays){
               $is_active=0;
               $remaining_days=0;
            }else{
                $remaining_days=$paymentData['duration']-$numberDays;
               $is_active=1; 
            } 

           //check end date
           if($is_active==1){ 
                if($ads_end_date<$today){
                  $is_active=0;
                }else{
                   $is_active=1; 
                }
           }
            return array('is_active'=>$is_active,'remaining_days'=>$remaining_days);                                
           
    }
    function add($id='')
    {
       
        if($id != ''){
            $this->viewData['action'] = lang('EDIT');
            $adsData = $this->Ads->getPaymentData($id);
            if($adsData){
                $days='+'.$adsData['duration'].' days';   
                $date = strtotime($adsData['payment_date']);
                $date = strtotime($days, $date);
                $date=date('Y-m-d', $date);
                $adsData['start_time']=$adsData['payment_date'];
                $adsData['end_time']=$date;
                $this->viewData['AdsData']=$adsData;
            }    
            
        }
       
        $this->viewData['business_id']=$id;
        $this->viewData['BusinessData']=$this->Ads->getBusinessData();
      
        $this->viewData['title'] ='Add Advertisment Subscription';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'News' => "add Advertisment Subscription");
        $this->load->view('admin/ads/add', $this->viewData);

    }
//    function add($id='')
//    {
//        //pre($_SESSION);
//        if($id != ''){
//            $this->viewData['action'] = lang('EDIT');
//            $this->viewData['AdsData'] = $this->Ads->getAdsById($id);
//        }
//
//        $this->viewData['BusinessData']=$this->Ads->getBusinessData();
//        $CityData = $this->Setting->getCityData();
//
//        $this->viewData['CityData'] = $CityData;
//        $this->viewData['title'] ='Add Advertisment';
//        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'News' => "add news");
//        $this->load->view('admin/ads/add', $this->viewData);
//
//    }
     function save(){
        
        $postArray = $this->input->post();
        $ID = (int)$this->input->post('ads_id');
        $this->form_validation->set_rules($this->ads_rules());
        if ($this->form_validation->run() == FALSE) {

            $err = array(
                '0' => $this->lang->line('BLANK_VALUE'),
            );
            $this->session->set_userdata('ERROR', $err);

        } else {
           
                //pre($postArray);
                $trnID = 'trn-' . rand(1, 1000) . time();
                $userData = $this->Ads->getDetailBusinessData($postArray['business_id']);
                $createdUserData=$this->Ads->CreatedUserData($userData['user_id']);
               // pre($createdUserData);

                // pre($userData);
                $start_time = date("Y-m-d", strtotime($postArray['start_time']));
                $end_time = date("Y-m-d", strtotime($postArray['end_time']));

              

                //duration
                $startTimeStamp = strtotime($start_time);
                $endTimeStamp = strtotime($end_time);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
                $numberDays = intval($numberDays);
                
                 $adsData = array(
                    'title' => '',
                    'description' =>'',
                    'image' =>'',
                    'image_footer' =>'',
                    'is_completed' =>0,
                    'user_id' => $userData['user_id'],
                    'address' => $userData['address'],
                    'transaction_id' => $trnID,
                    'business_id' => $postArray['business_id'],
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'time' => $postArray['time'],
                    'cityID' =>'1',
                    'ads_type' => $postArray['ads_type'],
                    'totalclicks' => 0,
                    'i_date' => time()
                );
                  //$adsData['image'] = 'uploads/' . 'download.png';
                 // $adsData['image_footer'] = 'uploads/' . 'download.png';
                  $this->Ads->create_business_ads($adsData, $postArray['ads_id']);

                $paymentData = array(
                    'type'=>'ads',
                    'business_id' => $postArray['business_id'],
                    'user_id'=>$userData['user_id'],
                    'duration'=>$numberDays,
                    'payment_date' => $start_time,
                    'amount' => 00,
                    'transaction_id' => $trnID,
                    'payment_status' => 'approved',
                    'ads_type'=> $postArray['ads_type'],
                    'intent' => 'sale',
                    'response_type' => 'payment',
                    'environment' => 'production'
                );
               

              $this->Ads->add_business_payment($paymentData,$postArray['ads_id']);

               // echo $ID; exit;
                //echo 1; exit;
                if ($ID > 0) {
                    $err = array(
                        '0' => $this->lang->line('EDITED'),
                    );

                    $this->session->set_userdata('SUCCESS', $err);

                } else if ($ID==0) {
               $err = array(
                        '0' => $this->lang->line('ADDED'),
                    );
                    
                     //Notification
                    $message='You get free Ads subscription for '.$numberDays.' days';
                    $title='Congratulations';
                    $notificationData=array(
                       'title'=>$title,
                       'message'=>$message,
                       'user_id'=>$userData['user_id'],
                       'image'=>DOMAIN_URL.'/'.'assets/admin/images//login-logo.png',
                       'type'=>'ads_sub',
                       'redirect_id'=>$postArray['business_id'],
                       'is_status'=>1,
                       'eStatus'=>1,
                       'deleted'=>0,
                    );


                    $notification_id=$this->Ads->add_notification_data($notificationData);
                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>'ads_sub','redirect_id'=>$postArray['business_id'],'post_title'=>$title,"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
                       
                    parent::sendAndroidNotification($data,$createdUserData[0]['deviceid']);

                
                    

                    $this->session->set_userdata('SUCCESS', $err);


                } else {
                    $err = array(
                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                    );

                    $this->session->set_userdata('ERROR', $err);
                }
           

        }
        redirect("admin/ads");
    }
//    function save(){
//
//        $postArray = $this->input->post();
//        $ID = (int)$this->input->post('ads_id');
//        $this->form_validation->set_rules($this->ads_rules());
//        if ($this->form_validation->run() == FALSE) {
//
//            $err = array(
//                '0' => $this->lang->line('BLANK_VALUE'),
//            );
//            $this->session->set_userdata('ERROR', $err);
//
//        } else {
//            $checkads=$this->Ads->check_ads_exists($postArray['business_id']);
//            if(empty($checkads)) {
//                //pre($postArray);
//                $trnID = 'trn-' . rand(1, 1000) . time();
//                $userData = $this->Ads->getDetailBusinessData($postArray['business_id']);
//                $start_time = date("Y-m-d", strtotime($postArray['start_time']));
//                $end_time = date("Y-m-d", strtotime($postArray['end_time']));
//
//                $adsData = array(
//                    'title' => $postArray['title'],
//                    'description' => $postArray['description'],
//                    'user_id' => $userData['user_id'],
//                    'address' => $userData['address'],
//                    'transaction_id' => $trnID,
//                    'business_id' => $postArray['business_id'],
//                    'start_time' => $start_time,
//                    'end_time' => $end_time,
//                    'time' => $postArray['time'],
//                    'cityID' => $postArray['cityID'],
//                    'ads_type' => $postArray['ads_type'],
//                    'totalclicks' => 0,
//                    'i_date' => time()
//                );
//
//                //duration
//                $startTimeStamp = strtotime($start_time);
//                $endTimeStamp = strtotime($end_time);
//                $timeDiff = abs($endTimeStamp - $startTimeStamp);
//                $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
//                $numberDays = intval($numberDays);
//
//                $paymentData = array(
//                    'type'=>'ads',
//                    'business_id' => $postArray['business_id'],
//                    'user_id'=>$userData['user_id'],
//                    'duration'=>$numberDays,
//                    'payment_date' => $start_time,
//                    'amount' => 00,
//                    'transaction_id' => $trnID,
//                    'payment_status' => 'approved',
//                    'intent' => 'sale',
//                    'response_type' => 'payment',
//                    'environment' => 'production'
//                );
//
//                //save banner image
//
//                if (isset($_FILES["image"]["name"]) != '') {
//
//                    $file_upload = parent::saveFile('image', 'uploads/business/' . $postArray['business_id'] . '/');
//                    //pre($file_upload);
//                    if ($file_upload['file_name'] != "") {
//                        $postData = array();
//                        $adsData['image'] = 'uploads/business/' . $postArray['business_id'] . '/' . $file_upload['file_name'];
//
//                    } else {
//                        $adsData['image'] = 'uploads/' . 'download.png';
//
//                    }
//
//                }
//                //save footer image
//                if (isset($_FILES["image_footer"]["name"]) != '') {
//
//                    $file_upload_footer = parent::saveFile('image', 'uploads/business/' . $postArray['business_id'] . '/');
//                    if ($file_upload_footer['file_name'] != "") {
//                        $postData = array();
//                        $adsData['image_footer'] = 'uploads/business/' . $postArray['business_id'] . '/' . $file_upload_footer['file_name'];
//
//                    } else {
//                        $adsData['image_footer'] = 'uploads/' . 'download.png';
//
//                    }
//
//                }
//
//                $this->Ads->create_business_ads($adsData, $postArray['ads_id']);
//                $this->Ads->add_business_payment($paymentData);
//               // echo $ID; exit;
//                //echo 1; exit;
//                if ($ID > 0) {
//                    $err = array(
//                        '0' => $this->lang->line('EDITED'),
//                    );
//
//                    $this->session->set_userdata('SUCCESS', $err);
//
//                } else if ($ID==0) {
//                    $err = array(
//                        '0' => $this->lang->line('ADDED'),
//                    );
//
//                    $this->session->set_userdata('SUCCESS', $err);
//
//
//                } else {
//                    $err = array(
//                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
//                    );
//
//                    $this->session->set_userdata('ERROR', $err);
//                }
//            }else{
//                $err = array(
//                    '0' => 'Advertisment is already created for this business,Please find it into list!',
//                );
//
//                $this->session->set_userdata('ERROR', $err);
//            }
//
//        }
//        redirect("admin/ads");
//    }
    
    protected function ads_rules() {
        $rules = array(
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean|max_length[100]',
            ),
        );
        return $rules;
    }







}
