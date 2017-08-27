<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Ws_Controller {
	private $model;
	public function __construct() {
		parent::__construct();
		//$this->lang->load('setting', $this->data['language']);
		parent::load_version_model('ws/tablet/Setting_model_' . $this->data['version'], 'setting_model');
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
   
	
	

}
