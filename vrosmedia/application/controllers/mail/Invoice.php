<?php
class Invoice extends Ws_Controller {

    public $viewData = array();
    function __construct() {
        parent::__construct();

    }

    public function index()
    {
        $this->load->view('mail/invoice');
    }



}
