<?php
class News extends Admin_Controller {

    public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();
        $this->load->model('News_model','News');
    }

    function index()
    {

        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("BUSINESS_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"News", 'news/lists/' => "selection");
        $this->viewData['module'] = "news/index";
        $this->load->view('admin/template', $this->viewData);
    }
    function categorylists()
    {

        $this->News->_fields ="id,name,description,active,i_date";
        $this->News->_where = array("deleted" =>'0');
        $CategoryData = $this->News->getCategoryData();
//pre($CategoryData);
        $this->viewData['CategoryData'] = $CategoryData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = 'Category Managment';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'news/categorylists/' => "category");
        $this->viewData['module'] = "news/lists_category";
        $this->load->view('admin/template', $this->viewData);
    }

    function newslists()
    {

        $this->News->_fields ="id,title,description,category_id,image,datetime,created_by,datetime";
        $this->News->_where = array("deleted" =>'0');
        $NewsData = $this->News->getNewsData();

        foreach($NewsData as $news){
             $CategoryData=$this->News->getCategoryByID($news->category_id);
            $news->CategoryName=$CategoryData['name'];
        }
       
        $this->viewData['NewsData'] = $NewsData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = 'News Managment';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'news/newslists/' => "news");
        $this->viewData['module'] = "news/lists_news";
        $this->load->view('admin/template', $this->viewData);
    }

    function add_category($id='')
    {
        if($id != ''){

            $this->viewData['action'] = lang('EDIT');
            $this->News->_table=TBL_NEWS_CATEGORY;
            $this->viewData['CategoryData'] = $this->News->getCategoryByID($id);
        }


        $this->viewData['title'] ='Add Category';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'News' => "News category");
        $this->load->view('admin/news/add_category', $this->viewData);

    }
    function add_news($id='')
    {
        if($id != ''){
            $this->viewData['action'] = lang('EDIT');
            $this->News->_table=TBL_NEWS;
            $this->viewData['NewsData'] = $this->News->getNewsByID($id);
        }
      
        $this->News->_fields ="id,name,description,active,i_date";
        $this->News->_where = array("deleted" =>'0');
        $this->viewData['CategoryData'] = $this->News->getCategoryData();
       
        
        $this->viewData['title'] ='Add News';
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'News' => "add news");
        $this->load->view('admin/news/add_news', $this->viewData);

    }
    public function save_category($id = null) {
        $postData = $this->input->post();

        $this->form_validation->set_rules($this->category_rules());
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

            $this->News->_table=TBL_NEWS_CATEGORY;
            $ID = $this->News->insertCategoryData($postData,'id',$id);


            if ($ID != '' && $id == '') {
                $err = array(
                    '0' => 'News Category'.$this->lang->line('ADDED'),
                );
                $this->session->set_userdata('SUCCESS', $err);
            } else if($ID != '' && $id != '') {
                $err = array(
                    '0' => 'News Category '.$this->lang->line('EDITED'),
                );
                $this->session->set_userdata('SUCCESS', $err);
            } else {
                $err = array(
                    '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                );
                $this->session->set_userdata('ERROR', $err);
            }

        }
        redirect("admin/news/categorylists/");
    }
    public function save_news($id = null) {
        $postData = $this->input->post();

        $this->form_validation->set_rules($this->news_rules());
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
            $postData['created_by']='Admin';
            $postData['active']=1;
            $postData['datetime']=time();


            $this->News->_table=TBL_NEWS;
            $ID = $this->News->insertNewsData($postData, 'id', $id);

            if($_FILES) {
  
                $file_upload = parent::saveFile('image', 'uploads/news/' . $ID . '/');

                if ($file_upload['file_name'] != "") {
                    $postArray = array();
                    $postArray['image'] = 'uploads/news/' . $ID . '/' . $file_upload['file_name'];
                    $this->News->insertNewsData($postArray,'id',$ID);
                   
                }
            }


            if ($ID != '' && $id == '') {
                $err = array(
                    '0' => 'News  '.$this->lang->line('ADDED'),
                );
                $this->session->set_userdata('SUCCESS', $err);
            } else if($ID != '' && $id != '') {
                $err = array(
                    '0' => 'News '.$this->lang->line('EDITED'),
                );
                $this->session->set_userdata('SUCCESS', $err);
            } else {
                $err = array(
                    '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                );
                $this->session->set_userdata('ERROR', $err);
            }

        }
        redirect("admin/news/newslists/");
    }
    function remove($id = '')
    {
       
        if (isset($id) && $id > 0)
        {
            $this->News->_table=TBL_NEWS_CATEGORY;
           
            $DELETE = $this->News->changeDeleted('id', $id);
            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'News Category deleted successfully.';
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
    function remove_news($id = '')
    {
        if (isset($id) && $id > 0)
        {
            $this->News->_table=TBL_NEWS;
            $DELETE = $this->News->changeNewsDeleted('id', $id);
            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'News deleted successfully.';
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

    protected function category_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' =>'name',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }

    protected function news_rules() {
        $rules = array(
            array(
                'field' => 'title',
                'label' =>'title',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }





}
