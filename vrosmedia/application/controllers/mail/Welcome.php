<?php
class Welcome extends Ws_Controller {

    public $viewData = array();
    function __construct() {
        parent::__construct();

    }

    public function index()
    {
        $user_data=array(
                        'name'=>'renish',
                        'email'=>'renish@gmail.com',
                    );
        $this->viewData['userdata'] = $user_data;
       $this->load->view('mail/welcome',$this->viewData);
        
    }



}
