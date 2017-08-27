<?php
class Setting extends Admin_Controller {

    public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();
        $this->load->model('Setting_model','Setting');
    }


    function priceLists()
    {

        $this->Setting->_fields ="id,type,duration_in_days,ads_type,price,time";
        $this->Setting->_where = array("deleted" =>'0');
        $PriceData = $this->Setting->getPriceData();

        $this->viewData['PriceData'] = $PriceData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = 'Price Managment';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'price/lists/' => "price");
        $this->viewData['module'] = "price/lists";
        $this->load->view('admin/template', $this->viewData);
    }

    function addPrice($id='')
    {
        if($id != ''){
            $this->viewData['action'] = lang('EDIT');
            $this->Setting->_table=TBL_PRICELISTS_TB;
            $this->viewData['PriceData'] = $this->Setting->getPriceById($id);
        }



        $this->viewData['title'] ='Add Price';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'add' => "add price");
        $this->load->view('admin/price/add', $this->viewData);

    }

    public function save_price($id = null) {
        $postData = $this->input->post();

        $this->form_validation->set_rules($this->price_rules());
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
            $this->Setting->_table=TBL_PRICELISTS_TB;
                $ID = $this->Setting->insertPriceData($postData, 'id', $id);


                if ($ID != '' && $id == '') {
                    $err = array(
                        '0' => 'Prices '.$this->lang->line('ADDED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else if($ID != '' && $id != '') {
                    $err = array(
                        '0' => 'Prices '.$this->lang->line('EDITED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else {
                    $err = array(
                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                    );
                    $this->session->set_userdata('ERROR', $err);
                }

        }
        redirect("admin/setting/priceLists/");
    }
     function cityLists()
    {

        $this->Setting->_fields ="id,name";
        $this->Setting->_where = array("deleted" =>'0');
        $CityData = $this->Setting->getCityData();

        $this->viewData['CityData'] = $CityData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = 'City Managment';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'city/lists/' => "city");
        $this->viewData['module'] = "city/lists";
        $this->load->view('admin/template', $this->viewData);
    }
     function addcity($id='')
    {
        if($id != ''){
            $this->viewData['action'] = lang('EDIT');
            $this->Setting->_table=TBL_CITY;
            $this->viewData['CityData'] = $this->Setting->getCityById($id);
        }



        $this->viewData['title'] ='Add City';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'add' => "add City");
        $this->load->view('admin/city/add', $this->viewData);

    }
    public function save_city($id = null) {
        $postData = $this->input->post();

        $this->form_validation->set_rules($this->city_rules());
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
            $this->Setting->_table=TBL_CITY;
                $ID = $this->Setting->insertCityData($postData, 'id', $id);


                if ($ID != '' && $id == '') {
                    $err = array(
                        '0' => 'City '.$this->lang->line('ADDED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else if($ID != '' && $id != '') {
                    $err = array(
                        '0' => 'City '.$this->lang->line('EDITED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else {
                    $err = array(
                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                    );
                    $this->session->set_userdata('ERROR', $err);
                }

        }
        redirect("admin/setting/cityLists/");
    }

    function remove($id = '')
    {
        if (isset($id) && $id > 0)
        {
            $this->Setting->_table=TBL_PRICELISTS_TB;
            $DELETE = $this->Setting->changeDeleted('id', $id);
            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'Price deleted successfully.';
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
            $data['message'] = 'No such record found or Price is deleted.';
            echo json_encode($data);
            exit;
        }
    }


    protected function price_rules() {
        $rules = array(
            array(
                'field' => 'type',
                'label' =>'type',
                'rules' => 'trim|required|xss_clean|max_length[20]',
            ),
            array(
                'field' => 'ads_type',
                'label' =>'ads_type',
                'rules' => 'trim|required|xss_clean|max_length[20]',
            ),
            array(
                'field' => 'price',
                'label' =>'price',
                'rules' => 'trim|required|xss_clean|max_length[20]',
            ),
            array(
                'field' => 'duration_in_days',
                'label' =>'duration_in_days',
                'rules' => 'trim|required|xss_clean|max_length[20]',
            ),
        );
        return $rules;
    }
    protected function city_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' =>'name',
                'rules' => 'trim|required|xss_clean|max_length[30]',
            ),
         
        );
        return $rules;
    }





}
