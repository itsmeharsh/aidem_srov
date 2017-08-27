<?php

class Admin_Controller extends MY_Controller {

    public $data = array();
    function __construct() {
        
        parent::__construct();
        $this->load->library("admin_headerlib");
        $this->load->model('admin_model');
        $arrSessionDetails = $this->session->userdata;
        try {
            
            $file = APPPATH . 'language/english/admin';
            $di = new RecursiveDirectoryIterator($file, RecursiveDirectoryIterator::SKIP_DOTS);
            $it = new RecursiveIteratorIterator($di);

            foreach ($it as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) == "php") {
                    $this->lang->load("admin/" . str_replace('_lang', '', pathinfo($file, PATHINFO_FILENAME)));
                }
            }
        } catch (Exception $e) {
            echo $e;
        }

        // $this->chk_admin_cookie();
        $this->chk_admin_session();        
    }
    function getLoginSettings(){

        $this->load->database();;
        $this->data['boolHeader'] = false;
        $this->data['boolFooter'] = true;
        $this->data['boolSidebar'] = false;
        $this->data['strAction'] = $this->input->post('action')!="" ?$this->input->post('action') : $this->input->get('action');
        $this->data['strMethod'] = $this->router->fetch_method();
                
        $arrSessionDetails = $this->session->userdata;
        if(isset($arrSessionDetails['ADMINLOGIN']) && $arrSessionDetails['ADMINLOGIN']){
            redirect(base_url().ADMIN_URL."dashboard");           
        }
        return $this->data;

    }

    function getAdminSettings(){

        $this->load->database();;
        $this->data['boolHeader'] = true;
        $this->data['boolFooter'] = true;
        $this->data['boolSidebar'] = true;
        $this->data['strAction'] = $this->input->post('action')!="" ?$this->input->post('action') : $this->input->get('action');
        $this->data['strMethod'] = $this->router->fetch_method();
              
        $arrSessionDetails = $this->session->userdata;
        if(!$arrSessionDetails['ADMINLOGIN']){
            redirect(base_url().ADMIN_URL."login");           
        }
        else if($arrSessionDetails['ADMINLOGIN']  === TRUE){
             $this->data['arrSidebar']['arrMenus'] = $this->common_model->getSections();
        }
        return $this->data;

    }

    function chk_admin_session() {
       
        $arrSessionDetails = $this->session->userdata;        
        $session_login = isset($arrSessionDetails['ADMINLOGIN']) ? $arrSessionDetails['ADMINLOGIN'] : "";

        $arrAllowedWithoutLogin = array('login','forgotpassword');
        $arrNotAllowedAfterLogin = array('login','forgotpassword');
        if (!$session_login) {
            if (!in_array($this->uri->segment(2), $arrAllowedWithoutLogin)) {
                redirect('/admin/login/');
            }
        } else if ($session_login && $session_login == TRUE) {
            if (in_array($this->uri->segment(2), $arrNotAllowedAfterLogin)) {
                redirect('admin/dashboard');
            }
        }
    }

    function chk_admin_cookie() {
               

        if ($loggedin === TRUE) {
            $arrNotAllowedAfterLogin = array('login','forgotpassword');
            if (in_array($this->uri->segment(2), $notallowed)) {
                redirect('admin/dashboard');
            }
        }
    }

}
