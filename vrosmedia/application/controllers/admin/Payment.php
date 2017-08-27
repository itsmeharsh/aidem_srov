<?php
class Payment extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Payment_model','Payment');
 
        $this->lang->load('event', $this->data['language']);
    }

    public function index()
    {
       
        $this->Payment->_fields ="id,user_id,type,business_id,duration,payment_date,amount,transaction_id,payment_status";
        $this->Payment->_where = array("deleted" =>'0');
        $paymentData = $this->Payment->getPaymentData();
         foreach($paymentData as $value){                     
            $BusinessData=  $this->Payment->getBusinessById($value->business_id);
            $value->businessName=$BusinessData['name'];
            $userData=  $this->Payment->getUserById($value->user_id);
            $value->UserName=$userData['name'];
       
         }
       // pre($paymentData);
            
        $this->viewData['paymentData'] = $paymentData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("BUSINESS_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'lists' => "payment");
        $this->viewData['module'] = "payment/list";
        $this->load->view('admin/template', $this->viewData);
    }
    public function detailView($payment_id=''){
       
        $today=date('Y-m-d');
        if($payment_id!=''){
            
            $this->Payment->_fields ="id,user_id,type,business_id,duration,payment_date,amount,transaction_id,payment_status";
            $this->Payment->_where = array("deleted" =>'0','id'=>$payment_id);
            $paymentData = $this->Payment->getPaymentData();
            
            $BusinessData=  $this->Payment->getBusinessById($paymentData[0]->business_id);
            $paymentData[0]->businessName=$BusinessData['name'];
            $userData=  $this->Payment->getUserById($paymentData[0]->user_id);
            $paymentData[0]->UserName=$userData['name'];
                       
          //pre($paymentData);
       
            $this->viewData['paymentData'] = $paymentData;
            $this->viewData['arrBradcrumb'] = array("dashboard"=>"payment", 'payment' => "Detail View");
            $this->viewData['module'] = "payment/detailView";
            $this->load->view('admin/template', $this->viewData);
           
            
        }else{
            $this->load->view('errors/html/error_404');
        }
        
    }
  

   



}
