<?php
class Offers extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Offer_model','Offer');
 
        $this->lang->load('event', $this->data['language']);
    }

    public function index()
    {
       
        $this->Offer->_fields ="id,user_id,name,image_path,location,start_time,end_time,business_id";
        $this->Offer->_where = array("deleted" =>'0');
        $offerData = $this->Offer->getOfferData();
         foreach($offerData as $value){                     
            $BusinessData=  $this->Offer->getBusinessById($value->business_id);
            $value->businessName=$BusinessData['name'];
            $value->is_active=$this->check_offer_status($value->id,$value->business_id,$value->end_time);
            if($value->is_active=='Active'){
                $value->is_active_color='green';
            }else{
                $value->is_active_color='red';
            }
          
         }
        
            
        $this->viewData['offerData'] = $offerData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("BUSINESS_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'offers/lists/' => "offer");
        $this->viewData['module'] = "offers/list";
        $this->load->view('admin/template', $this->viewData);
    }
     function add($id='')
    {
       
        if($id != ''){
            $this->viewData['action'] = lang('EDIT');
            $offerData = $this->Offer->getPaymentData($id);
            if($offerData){
                $days='+'.$offerData['duration'].' days';   
                $date = strtotime($offerData['payment_date']);
                $date = strtotime($days, $date);
                $date=date('Y-m-d', $date);
                $offerData['start_time']=$offerData['payment_date'];
                $offerData['end_time']=$date;
                $this->viewData['OfferData']=$offerData;
            }    
            
        }
    
        $this->viewData['business_id']=$id;
        $this->viewData['BusinessData']=$this->Offer->getBusinessData();
      
        $this->viewData['title'] ='Add Offer Subscription';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'News' => "add offer subscription");
        $this->load->view('admin/offers/add', $this->viewData);

    }
    private function check_offer_status($offer_id,$business_id,$offer_end_date){
            
            $paymentData=$this->Offer->getPaymentData($business_id);
         
            
            $today=date('Y-m-d');
            $startTimeStamp = strtotime($paymentData['payment_date']);
            $endTimeStamp = strtotime($today);
            $timeDiff = abs($endTimeStamp - $startTimeStamp);
            $numberDays = $timeDiff/86400;  // 86400 seconds in one day
            $numberDays = intval($numberDays);


            if($paymentData['duration']<$numberDays){
                $paymentData['is_active']='Inactive';
                
            }else{
                $paymentData['is_active']='Active';
            }

            //check end date
            if($paymentData['is_active']==1){
                if($offer_end_date<$today){
                    $paymentData['is_active']='Inactive';
                }else{
                     $paymentData['is_active']='Active';
                }
            }
            return $paymentData['is_active'];
    }
    public function detailView($offer_id='',$iUserID=''){
        
        $today=date('Y-m-d');
        if($offer_id!='' && $iUserID!=''){
            
            $offersData= $this->Offer->get_offers_details($offer_id);

            $CreatedUserData = $this->Offer->CreatedUserData($offersData['user_id']);
            $get_offer_comments = $this->Offer->get_offer_comments($offersData['offer_id']);

            $get_offer_userLikes = $this->Offer->getOfferLikedUsers($offersData['offer_id']);
            
            $businessData=$this->Offer->getDetailBusinessData($offersData['business_id']);
             
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
             $offersData['BusinessData'] = $businessData;
            //pre($offersData);
            $this->viewData['arrBradcrumb'] = array("dashboard"=>"offer", 'user' => "Detail View");
            $this->viewData['offersData'] = $offersData;
            $this->viewData['module'] = "offers/detailView";
            $this->load->view('admin/template', $this->viewData);
           
            
        }else{
            $this->load->view('errors/html/error_404');
        }
        
    }
    
     function save(){

        $postArray = $this->input->post();
        $ID = (int)$this->input->post('offer_id');
        $this->form_validation->set_rules($this->offer_rules());
        if ($this->form_validation->run() == FALSE) {

            $err = array(
                '0' => $this->lang->line('BLANK_VALUE'),
            );
            $this->session->set_userdata('ERROR', $err);

        } else {
           
               // pre($postArray);
                $trnID = 'trn-' . rand(1, 1000) . time();
                $userData = $this->Offer->getDetailBusinessData($postArray['business_id']);
                $createdUserData=$this->Offer->CreatedUserData($userData['user_id']);
               // pre($createdUserData);
                
                $start_time = date("Y-m-d", strtotime($postArray['start_time']));
                $end_time = date("Y-m-d", strtotime($postArray['end_time']));

              

                //duration
                $startTimeStamp = strtotime($start_time);
                $endTimeStamp = strtotime($end_time);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
                $numberDays = intval($numberDays);
//                $offerData=array(
//                        'name'=>'Offer title',
//                        'description'=>'Offer description',
//                        'user_id'=>$userData['user_id'],
//                        'business_id'=>$postArray['business_id'],
//                        'start_time'=>$postArray['start_time'],
//                        'end_time'=>$postArray['end_time'],
//                        'cityID'=>1,
//                        'transaction_id' => $trnID,
//                        'eStatus'=>1,
//                        'datetime'=>time()
//                       );
//                $offerData['image_path'] = 'uploads/'.'download.png';
//                $offerID=$this->Offer->create_business_offers($offerData,$ID);

                $paymentData = array(
                    'type'=>'offer',
                    'business_id' => $postArray['business_id'],
                    'user_id'=>$userData['user_id'],
                    'duration'=>$numberDays,
                    'payment_date' => $start_time,
                    'amount' =>'00',
                    'transaction_id' => $trnID,
                    'payment_status' => 'approved',
                    'ads_type'=> '0',
                    'intent' => 'sale',
                    'response_type' => 'payment',
                    'environment' => 'production'
                );
               

              $this->Offer->add_business_payment($paymentData,$postArray['offer_id']);
               // echo $ID; exit;
                //echo 1; exit;
                if ($ID > 0) {
                  //  echo 1; exit;
                    $err = array(
                        '0' => $this->lang->line('EDITED'),
                    );

                    $this->session->set_userdata('SUCCESS', $err);

                } else if ($ID==0) {
                    $err = array(
                        '0' => $this->lang->line('ADDED'),
                    );
                  //  echo 2; exit;
                     //Notification
                    $message='You get free Offer subscription for '.$numberDays.' days';
                    $title='Congratulations';
                    $notificationData=array(
                       'title'=>$title,
                       'message'=>$message,
                       'user_id'=>$userData['user_id'],
                       'image'=>DOMAIN_URL.'/'.'assets/admin/images//login-logo.png',
                       'type'=>'offer_sub',
                       'redirect_id'=>$postArray['business_id'],
                       'is_status'=>1,
                       'eStatus'=>1,
                       'deleted'=>0,
                    );


                    $notification_id=$this->Offer->add_notification_data($notificationData);
                    $data = array('id'=>$notification_id,'body'=>$message,'type'=>'offer_sub','redirect_id'=>$postArray['business_id'],'post_title'=>$title,"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");
//pre($createdUserData); exit;
                     
                    parent::sendAndroidNotification($data,$createdUserData[0]['deviceid']);

                
                    

                    $this->session->set_userdata('SUCCESS', $err);


                } else {
                    $err = array(
                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                    );

                    $this->session->set_userdata('ERROR', $err);
                }
           

        }
        redirect("admin/offers");
    }
     function remove($id = '')
    {
        if (isset($id) && $id > 0)
        {

            $DELETE = $this->Offer->changeDeleted('id', $id);

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
     protected function offer_rules() {
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
