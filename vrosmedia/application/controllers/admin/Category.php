<?php
class Category extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Category_model','Category');
    }

   function index()
    {
        $this->viewData['title'] = lang("CAT_MNG");          
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'category' => "category type selection");
        $this->viewData['module'] = "category/categoryType";
        $this->load->view('admin/template', $this->viewData);
    }
    function Adminlists($categoryType=''){       
        $this->Category->_fields ="id,name,type,u_date,active";
        $this->Category->_where = array("deleted" =>'0','type'=>$categoryType);
        $CategoryData = $this->Category->getCategoryData(); 
        $this->viewData['categoryData'] = $CategoryData; 
        $this->viewData['boolDataTables'] = true;
        $this->viewData['CategoryType'] = $categoryType;
        $this->viewData['title'] = lang("CAT_MNG");     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home",'category'=> "category type selection", 'category/Adminlists/'.$categoryType.'' => "category");
        $this->viewData['module'] = "category/list";
        $this->load->view('admin/template', $this->viewData);
    }
    function add($Type='',$iCategoryID='')
    {   
       if($iCategoryID != ''){
            $this->viewData['action'] = lang('EDIT');
            $this->Category->_table=TBL_CATEGORY;            
            $this->Category->_where = array("id" => $iCategoryID);
            $this->viewData['categoryData'] = $this->Category->getRecordsByID();
        }
        
        $FormData=$this->Category->getFormData($Type);      
        
        $this->viewData['title'] = lang("USER_MNG");     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'category' => "category type selection");
        $this->viewData['FormData'] = $FormData;
        $this->load->view('admin/category/add', $this->viewData);
       
    }
     public function save($iCatID = null) {
        $postData = $this->input->post(); 
        if($postData['type']=='1'){
            $Type="1";
        }else if($postData['type']=='2'){
            $Type="2";
        }
        $this->form_validation->set_rules($this->category_rules($this->input->post('category')));
        if ($this->form_validation->run() == FALSE) {                    
            $err = array(
                '0' => $this->lang->line('BLANK_VALUE'),
            );
            $this->session->set_userdata('ERROR', $err);
        } else {
                     
            if ($this->Category->checkCategoryAvailable($this->input->post('category'),$iCatID,$this->input->post('type'))) {                               
                $postData['name'] = $this->input->post('category');
                unset($postData['category']);
                $ID = $this->Category->insertRow($postData, 'id', $iCatID);
                $file_upload = parent::saveFile('image', 'uploads/category/' . $ID . '/');
                if ($file_upload['file_name'] != "") {
                    $postArray = array();
                    $postArray['image'] = 'category/' . $ID . '/' . $file_upload['file_name'];                                                
                    $this->Category->update_category($postArray, $ID);                                                         
                } 
                                                
                if ($ID != '' && $iCatID == '') {
                    $err = array(
                        '0' => 'Category '.$this->lang->line('ADDED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else if($ID != '' && $iCatID != '') {
                    $err = array(
                        '0' => 'Category '.$this->lang->line('EDITED'),
                    );
                    $this->session->set_userdata('SUCCESS', $err);
                } else {
                    $err = array(
                        '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                    );
                    $this->session->set_userdata('ERROR', $err);
                }
            } else {
                $err = array(
                    '0' => 'Category '.$this->lang->line('EXITS'),
                );
                $this->session->set_userdata('ERROR', $err);      
            }
        }
       redirect("admin/category/Adminlists/".$postData['type']);
    }

   function status($iCatID = '')
    {

        if ($iCatID != '')
        {
            $changeStatus = $this->Category->changeStatus('id', $iCatID);
            echo $this->db->last_query();exit;
            if ($changeStatus != '')
            {
                $data['result'] = 'success';
                $data['message'] = 'Status changed successfully.';
            } else
            {
                $data['result'] = 'error';
                $data['message'] = 'Error in updation.Please try again.';
            }
            echo json_encode($data);
            exit;
        }
    }
 
    function remove($iCatID = '')
    {   
        if (isset($iCatID) && $iCatID > 0)
        {

            $DELETE = $this->Category->changeDeleted('id', $iCatID);
            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'Category deleted successfully.';
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
            $data['message'] = 'No such record found or category is deleted.';
            echo json_encode($data);
            exit;
        }
    }
    protected function category_rules($name, $iCatId = 0) {
        $rules = array(
            array(
                'field' => 'category',
                'label' => $this->lang->language["user_first_name"],
                'rules' => 'trim|required|xss_clean|max_length[20]',
            ),
        );
        return $rules;
    }
}
