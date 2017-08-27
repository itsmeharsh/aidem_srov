<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Countads extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('users', $this->data['language']);
        parent::load_version_model('ws/tablet/Countads_model_' . $this->data['version'], 'countads_model');
    }


     function add(){

               $responseData=array();
		$this->form_validation->set_rules($this->add_business_revenue_count_rules());
		if ($this->form_validation->run() == FALSE) {
                    
			$responseData['code'] = 400;
			$responseData['status'] = 'error';
			$responseData['message']= $this->lang->language["err_req_values"];
                      
                        
                }else{
                    // echo date('Y-m-d'); exit;
                     $postArray = $this->input->post();  
                     $data= $this->countads_model->add_ads_count($postArray['userid'],$postArray['ad_id'],$postArray['offer_id'],$postArray['type'],date('Y-m-d'),$postArray['business_id']); 

                      if(!empty($data)){                                    
                                     $responseData['code'] = 200;
                                     $responseData['status'] ='success';
                                     //$responseData['message'] ='successfully';
                                     
                                 }else{
                                     $responseData['code'] = 400;
                                     $responseData['status'] = 'error';
                                     $responseData['message']= $this->lang->language["SOMETHINGS_WENT_WRONG"];
                                 } 
                     
                }
                  je_mobile($responseData);
        }
         protected function add_business_revenue_count_rules() {
               $rules = array(                   
                     array(
                               'field' => 'userid',
                               'label' => 'userid',
                               'rules' => 'trim|required|xss_clean',
                       ),
                     array(
                               'field' => 'type',
                               'label' => 'type',
                               'rules' => 'trim|required|xss_clean',
                       ),
                     array(
                               'field' => 'ad_id',
                               'label' => 'ad_id',
                               'rules' => 'trim|xss_clean',
                       ),
               );
               return $rules;
        
          }
        
}
