<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class City extends Ws_Controller {
	private $model;
	public function __construct() {
		parent::__construct();
		$this->lang->load('category', $this->data['language']);
		parent::load_version_model('ws/City_model_' . $this->data['version'], 'city_model');
	}

    public function get_cities(){
        $CityData = $this->city_model->get_cities();
        if(count($CityData)){
            $responseData['code'] = 200;
            $responseData['status'] ='success';
            $responseData['data']['cities'] =$CityData;
        }else{
            $responseData['code'] = 200;
            $responseData['status'] = 'success';
            $responseData['message']= 'No cities found';
        }
        je_mobile($responseData);
    }
}

