<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Ws_Controller {
  private $model;
  public function __construct() {
    parent::__construct();
    //$this->lang->load('setting', $this->data['language']);
    parent::load_version_model('ws/Setting_model_' . $this->data['version'], 'setting_model');
  }
        
        public function get_pricing(){
         
             $priceData = $this->setting_model->get_prices(array("deleted"=>'0'));
           
             if(count($priceData)){
                        $responseData['code'] = 200;
                        $responseData['status'] ='success';
                        $responseData['data'] =$priceData;
             }else{
                        $responseData['code'] = 200;
                        $responseData['status'] = 'success';
                        $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
             }
              je_mobile($responseData);
        }
        public function get_city(){

            $cityData=$this->setting_model->get_city_data();

            if(count($cityData)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$cityData;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }
            je_mobile($responseData);
        }
        public function get_notification_data(){
            
             $responseData=array();
    $this->form_validation->set_rules($this->get_notification_data_rules());
    if ($this->form_validation->run() == FALSE) {
                    
      $responseData['code'] = 400;
      $responseData['status'] = 'error';
      $responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                                  $postArray = $this->input->post();  
                                  if(!$postArray['Limit']){
                                     $postArray['Limit']=5;
                                  }       

                                    if($postArray['Offset']==0 || !$postArray['Offset']){
                                        $postArray['Offset']=1;
                                    }
                                 $data['records']=$this->setting_model->get_notification_data($postArray); 
                                 $count=$this->setting_model->CountNotificationRecords($postArray['user_id']); 
                                 $data['notification_count']=$count[0]['notification_count'];
                            
                                 if(!empty($data)){
                                        $data['offset']= $postArray['Offset']+1; 
                                        $data['TotalRecords']=count($data['records']);
                                        $data['is_last']=0;

                                        if($data['offset']){

                                            $postArray['Offset']=$data['offset'];
                                            $nextRecords['data']=$this->setting_model->get_notification_data($postArray); 
                                            $TotalNextrecordcount=count($nextRecords['data']);
                                            if($TotalNextrecordcount<=0){

                                                 $data['is_last']=1;

                                            }
                                        }
                                }
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
        function update_notification_count(){
               $responseData=array();
    $this->form_validation->set_rules($this->update_notification_count_rules());
    if ($this->form_validation->run() == FALSE) {
                    
      $responseData['code'] = 400;
      $responseData['status'] = 'error';
      $responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                      
                     $postArray = $this->input->post();  
                     $data= $this->setting_model->update_notification_count($postArray['notification_id'],$postArray['user_id']); 
                      if(!empty($data)){                                    
                                     $responseData['code'] = 200;
                                     $responseData['status'] ='success';
                                     $responseData['message'] ='successfully';
                                     
                                 }else{
                                     $responseData['code'] = 400;
                                     $responseData['status'] = 'error';
                                     $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                 } 
                     
                }
                  je_mobile($responseData);
        }
         function update_all_notification_count(){
               $responseData=array();
    $this->form_validation->set_rules($this->update_all_notification_count_rules());
    if ($this->form_validation->run() == FALSE) {
                    
      $responseData['code'] = 400;
      $responseData['status'] = 'error';
      $responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                      
                     $postArray = $this->input->post();  
                     $data= $this->setting_model->update_all_notification_count($postArray['user_id']); 
                      if(!empty($data)){                                    
                                     $responseData['code'] = 200;
                                     $responseData['status'] ='success';
                                     $responseData['message'] ='successfully';
                                     
                                 }else{
                                     $responseData['code'] = 400;
                                     $responseData['status'] = 'error';
                                     $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                 } 
                     
                }
                  je_mobile($responseData);
        }
          function add_business_revenue_count(){
               $responseData=array();
    $this->form_validation->set_rules($this->add_business_revenue_count_rules());
    if ($this->form_validation->run() == FALSE) {
                    
      $responseData['code'] = 400;
      $responseData['status'] = 'error';
      $responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                    // echo date('Y-m-d'); exit;
                     $postArray = $this->input->post();
                     if($postArray['business_id']!=''){
	                 $dataID=$postArray['business_id'];
	                 $dataType="business_id";
	                 }elseif($postArray['offer_id']!=''){
	                 $dataID=$postArray['offer_id'];
	                 $dataType="offer_id";
	                 }elseif($postArray['ads_id']!=''){
	                 $dataID=$postArray['ads_id'];
	                 $dataType="ads_id";

	                }else{
	                 $dataID=$postArray['business_id'];
	                 $dataType="business_id";
	                }  
                     $data= $this->setting_model->add_ads_count($postArray['user_id'],$dataID,$postArray['type'],date('Y-m-d'),$dataType); 

                      if(!empty($data)){                                    
                                     $responseData['code'] = 200;
                                     $responseData['status'] ='success';
                                     $responseData['message'] ='successfully';
                                     
                                 }else{
                                     $responseData['code'] = 400;
                                     $responseData['status'] = 'error';
                                     $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                 } 
                     
                }
                  je_mobile($responseData);
        }
    function test_noti(){
        $postArray = $this->input->post();
        $getUserDetail=$this->setting_model->UserSingleUserDetail(array("id" => $postArray['user_id'],"user_type"=>'u',"is_notification"=>'ON',"deleted"=>'0'));

        $data = array('id'=>1,'body'=>'test otification','type'=>'testing','redirect_id'=>1,'post_title'=>'test server noti',"icon" => "http://imobcreator.com/android_apps/businessApp/assets/admin/images//login-logo.png");

        $data=parent::sendAndroidNotification($data,$getUserDetail->deviceid);
        $data['user_details']=$getUserDetail;
        $responseData['code'] = 200;
        $responseData['status'] ='success';
        $responseData['data'] =$data;
        je_mobile($responseData);

    }
        
          protected function get_notification_data_rules() {
               $rules = array(                   
                     array(
                               'field' => 'user_id',
                               'label' => 'is_default',
                               'rules' => 'trim|required|xss_clean',
                       ),
               );
               return $rules;
        
          }
           protected function update_notification_count_rules() {
               $rules = array(                   
                     array(
                               'field' => 'user_id',
                               'label' => 'is_default',
                               'rules' => 'trim|required|xss_clean',
                       ),
                    array(
                               'field' => 'notification_id',
                               'label' => 'is_default',
                               'rules' => 'trim|required|xss_clean',
                       ),
               );
               return $rules;
        
          }
          protected function update_all_notification_count_rules() {
               $rules = array(                   
                     array(
                               'field' => 'user_id',
                               'label' => 'is_default',
                               'rules' => 'trim|required|xss_clean',
                       ),
               );
               return $rules;
        
          }
            protected function add_business_revenue_count_rules() {
               $rules = array(                   
                     array(
                               'field' => 'user_id',
                               'label' => 'is_default',
                               'rules' => 'trim|required|xss_clean',
                       ),
                     array(
                               'field' => 'type',
                               'label' => 'type',
                               'rules' => 'trim|required|xss_clean',
                       ),
                     array(
                               'field' => 'business_id',
                               'label' => 'business_id',
                               'rules' => 'trim|xss_clean',
                       ),
               );
               return $rules;
        
          }
        
   
  
  

}
