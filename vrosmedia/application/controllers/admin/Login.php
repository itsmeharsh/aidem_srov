<?php

class Login extends Admin_Controller {


    public $viewData = array();
    function __construct() {
        parent::__construct();
         $this->viewData = $this->getLoginSettings();
         $this->load->model('admin_model', 'Admin');
    }

    function index() {
        $this->viewData['title'] = $this->lang->line("LOGIN");
        $this->viewData['module']="login";

     
       if ($this->input->post("loginbtn")!='' && $this->input->post("email")!=''  && $this->input->post("password")!='') {          
          
          
           
                    $postData['email'] = $this->input->post('email', TRUE);
                    $postData['password'] = md5($this->input->post('password', TRUE));

                    $res = $this->Admin->checkLogin($postData);

                    if ($res == true) {                                       
                        redirect('admin/dashboard');
                    } else {                       
                              $err = array(
                                    '0' => $this->lang->line('LOGIN_ERROR'),
                                );
                                $this->session->set_userdata('ERROR', $err);
                                
                    }
            
          
            
          
        }else  if ($this->input->post("loginbtn")!='' && $this->input->post("email")==''  && $this->input->post("password")=='') {
            
             $err = array(
                    '0' => $this->lang->line('BLANK_VALUE'),
                );
            
                $this->session->set_userdata('ERROR', $err);
        }
        $this->load->view('admin/template_login',$this->viewData);
    }

}
