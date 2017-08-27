<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends Ws_Controller {
	private $model;
	public function __construct() {
		parent::__construct();
		$this->lang->load('category', $this->data['language']);
		parent::load_version_model('ws/Category_model_' . $this->data['version'], 'category_model');
	}

    public function get_categories(){
        $type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : 1;
        $CategoryData = $this->category_model->get_categories(array("active"=>"1","deleted"=>'0','type'=>$type));
        if(count($CategoryData)){
            $responseData['code'] = 200;
            $responseData['status'] ='success';
            $responseData['data']['categories'] =$CategoryData;
        }else{
            $responseData['code'] = 200;
            $responseData['status'] = 'success';
            $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
        }
        je_mobile($responseData);
    }
}

