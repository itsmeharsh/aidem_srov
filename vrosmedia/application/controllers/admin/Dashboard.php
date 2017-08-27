<?php

class Dashboard extends Admin_Controller {

    public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();     
        //$this->load->model('distributor_model', 'Distributor');
    }

    function index() {

                $this->viewData['arrBradcrumb'] = array($this->viewData['title'] => "dashboard");
                $this->viewData['title'] = $this->lang->line("DASHBOARD");
		$this->viewData['module']="dashboard";
		$this->load->view('admin/template',$this->viewData);
    }
    
    

}
