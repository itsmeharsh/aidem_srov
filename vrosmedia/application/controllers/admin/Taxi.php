<?php
class Taxi extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();
        $this->load->model('Taxi_model','Taxi');
    }

   function index()
    {
    
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("BUSINESS_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"Taxi", 'business/lists/' => "selection");
        $this->viewData['module'] = "taxi/index";
        $this->load->view('admin/template', $this->viewData);
    }
   function companylists()
    {
    
        $this->Taxi->_fields ="id,name,description,active";
        $this->Taxi->_where = array("deleted" =>'0');
        $CompanyData = $this->Taxi->getTaxiCompanyData();
 
        $this->viewData['CompanyData'] = $CompanyData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = 'Company Managment';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'taxi/company_lists/' => "company");
        $this->viewData['module'] = "taxi/lists_company";
        $this->load->view('admin/template', $this->viewData);
    }

    function classlists()
    {

        $this->Taxi->_fields ="id,name,description,active";
        $this->Taxi->_where = array("deleted" =>'0');
        $ClassData = $this->Taxi->getTaxiClassData();

        $this->viewData['ClassData'] = $ClassData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("BUSINESS_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'taxi/class_lists/' => "class");
        $this->viewData['module'] = "taxi/lists_class";
        $this->load->view('admin/template', $this->viewData);
    }

    function add_company($id='')
    {
        if($id != ''){

            $this->viewData['action'] = lang('EDIT');
            $this->Taxi->_table=TBL_TAXI_COMPANY;
            $this->viewData['CompanyData'] = $this->Taxi->getCompanyByID($id);
        }


        $this->viewData['title'] ='Add Company';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'Taxi' => "Taxi type selection");
        $this->load->view('admin/taxi/add_company', $this->viewData);

    }
    function add_class($id='')
    {
        if($id != ''){
            $this->viewData['action'] = lang('EDIT');
            $this->Taxi->_table=TBL_TAXI_CLASS;
            $this->viewData['ClassData'] = $this->Taxi->getCompanyByID($id);
        }



        $this->viewData['title'] = lang("USER_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'Taxi' => "Taxi type selection");
        $this->load->view('admin/taxi/add_class', $this->viewData);

    }
    public function save_company($id = null) {
        $postData = $this->input->post();

        $this->form_validation->set_rules($this->company_rules());
        if ($this->form_validation->run() == FALSE) {
            $err = array(
                '0' => $this->lang->line('BLANK_VALUE'),
            );
            $this->session->set_userdata('ERROR', $err);
        } else {

                if($postData['id']!=''){
                    $id=$postData['id'];
                    unset($postData['id']);
                }

                $this->Taxi->_table=TBL_TAXI_COMPANY;
                $ID = $this->Taxi->insertCompanyData($postData,'id',$id);


                if ($ID != '' && $id == '') {
                    $err = array(
                        '0' => 'Taxi Company '.$this->lang->line('ADDED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else if($ID != '' && $id != '') {
                    $err = array(
                        '0' => 'Taxi Company '.$this->lang->line('EDITED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else {
                    $err = array(
                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                    );
                    $this->session->set_userdata('ERROR', $err);
                }

        }
        redirect("admin/taxi/companylists/");
    }
    public function save_class($id = null) {
        $postData = $this->input->post();

        $this->form_validation->set_rules($this->class_rules());
        if ($this->form_validation->run() == FALSE) {
            $err = array(
                '0' => $this->lang->line('BLANK_VALUE'),
            );
            $this->session->set_userdata('ERROR', $err);
        } else {

                if($postData['id']!=''){
                    $id=$postData['id'];
                    unset($postData['id']);
                }
                $this->Taxi->_table=TBL_TAXI_CLASS;
                $ID = $this->Taxi->insertClassData($postData, 'id', $id);


                if ($ID != '' && $id == '') {
                    $err = array(
                        '0' => 'Taxi Class '.$this->lang->line('ADDED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else if($ID != '' && $id != '') {
                    $err = array(
                        '0' => 'Taxi Class'.$this->lang->line('EDITED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else {
                    $err = array(
                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                    );
                    $this->session->set_userdata('ERROR', $err);
                }

        }
        redirect("admin/taxi/companylists/");
    }
    function remove_company($id = '')
    {
        if (isset($id) && $id > 0)
        {
            $this->Taxi->_table=TBL_TAXI_COMPANY;
            $DELETE = $this->Taxi->changeCompanyDeleted('id', $id);
            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'Company deleted successfully.';
            } else
            {
                $data['result'] = 'error';
                $data['message'] = 'Error in deletion.Please try again.';
            }
            echo json_encode($data);
            exit;
        } else
        {
            $data['result'] = 'error';
            $data['message'] = 'No such record found or Company is deleted.';
            echo json_encode($data);
            exit;
        }
    }
    function remove_class($id = '')
    {
        if (isset($id) && $id > 0)
        {
            $this->Taxi->_table=TBL_TAXI_CLASS;
            $DELETE = $this->Taxi->changeClassDeleted('id', $id);
            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'Class deleted successfully.';
            } else
            {
                $data['result'] = 'error';
                $data['message'] = 'Error in deletion.Please try again.';
            }
            echo json_encode($data);
            exit;
        } else
        {
            $data['result'] = 'error';
            $data['message'] = 'No such record found or Class is deleted.';
            echo json_encode($data);
            exit;
        }
    }

    protected function company_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' =>'name',
                'rules' => 'trim|required|xss_clean|max_length[20]',
            ),
        );
        return $rules;
    }

    protected function class_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' =>'name',
                'rules' => 'trim|required|xss_clean|max_length[20]',
            ),
        );
        return $rules;
    }





}
