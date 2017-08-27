<?php
class Logout extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
       
        $this->session->unset_userdata("ADMIN");
        $this->session->sess_destroy();
        delete_cookie(md5('loggedin'));
        redirect('admin/login', 'refresh');

    }
}
