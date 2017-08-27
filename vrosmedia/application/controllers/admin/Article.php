<?php
class Article extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Article_model','Article');
        $this->viewData['category'] = $this->Article->getBusCat();
        $this->load->model('Event_model','Event');
        $this->viewData['city'] = $this->Event->getCity();
    }

    function index()
    {
        $this->Article->_fields ="*";
        $this->Article->_where = array("eDelete" =>'0');
        $articleData = $this->Article->getArticleData();
 
        $this->viewData['articleData'] = $articleData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("ARTICLE_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'article' => "article");
        $this->viewData['module'] = "article/list";
        $this->load->view('admin/template', $this->viewData);
    }

    function status($id = '')
    {
        if ($id >0){
            $changeStatus = $this->Article->changeStatus('article_id', $id);
            if ($changeStatus != ''){
                $data['result'] = 'success';
                $data['message'] = 'Status changed successfully.';
            } else{
                $data['result'] = 'error';
                $data['message'] = 'Error in updation.Please try again.';
            }
            echo json_encode($data);
            exit;
        }
    }

    function remove($id = '')
    {
        if (isset($id) && $id > 0){
            $DELETE = $this->Article->changeDeleted('article_id', $id);
            if ($DELETE){
                $data['result'] = 'success';
                $data['message'] = 'Record deleted successfully.';
            } else{
                $data['result'] = 'error';
                $data['message'] = 'Error in deletion.Please try again.';
            }
            echo json_encode($data);
            exit;
        } else{
            $data['result'] = 'error';
            $data['message'] = 'No such record found.';
            echo json_encode($data);
            exit;
        }
    }

    function add($id= NULL)
    {  
        if($id > 0){
            $this->viewData['action'] = lang('EDIT');
            $this->Article->_where = array("a.article_id" => $id);
            $this->viewData['record'] = $this->Article->getArticleById();
        }else{
          $this->viewData['record'] = (array)get_column('tbl_articles');
        }
        $this->viewData['title'] = $id > 0 ? 'Edit Article':'Add Article';     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'article' => "Article",'javascript:;'=>$this->viewData['title']);
        $this->load->view('admin/article/add', $this->viewData);       
    }

    public function save($id = null) {
        $postData = $this->input->post();
        $ID = (int)$this->input->post('id');
        $this->form_validation->set_rules($this->article_rules());
        if ($this->form_validation->run() == FALSE) {                    
            $err = array('0' => $this->lang->line('BLANK_VALUE'));            
            $this->session->set_userdata('ERROR', $err);
        } else {
            $postData['user_id'] = $this->session->userdata('ADMINID');
            $postData['eDelete'] = '0';
            $ID = $this->Article->insertRow($postData, 'article_id', $ID);     
            
            /*----------------Article Cover Image -------------------*/    
            $aImageType = array('image/jpeg','image/jpg','image/png');
            if($_FILES['cover_image']['size'] <= 2048000 && $_FILES['cover_image']['name']!="" && in_array($_FILES['cover_image']['type'],$aImageType)){
                $this->Article->_where = array("a.article_id" => $ID);
                $old_record = $this->Article->getArticleById();
                if($old_record['cover_image'] != '')
                    unlink(FCPATH . $old_record['cover_image']);
                $file_upload = parent::saveFile('cover_image', 'uploads/article/' . $ID . '/');
                if ($file_upload['file_name'] != "") {
                    $postArray = array();
                    $cover_image = 'uploads/article/' . $ID . '/' . $file_upload['file_name'];
                    $this->Article->insertRow(array('cover_image'=>$cover_image), 'article_id', $ID);                                                
                } 
            }
            
            //More Article images
            foreach($_FILES['media_path']['name'] as $key => $files)
            {
                $_FILES['image']['name'] = $_FILES['media_path']['name'][$key];
                $_FILES['image']['type'] = $_FILES['media_path']['type'][$key];
                $_FILES['image']['tmp_name'] = $_FILES['media_path']['tmp_name'][$key];
                $_FILES['image']['error'] = $_FILES['media_path']['error'][$key];
                $_FILES['image']['size'] = $_FILES['media_path']['size'][$key];
                
                if($_FILES['image']['size'] <= 2048000 && $_FILES['image']['name']!="" && in_array($_FILES['image']['type'],$aImageType))
                {
                    $file_upload = parent::saveFile('image', 'uploads/article/' . $ID . '/');
                                     
                    if ($file_upload['file_name'] != "") {
                            $postArray = array();
                            $postArray['media_path'] = 'uploads/article/' . $ID . '/' . $file_upload['file_name'];
                            $postArray['article_id'] = $ID; 
                            $postArray['type'] = 'i';                                               
                            $this->Article->update_image($postArray);                                           
                    } 
                }
            }

            //More Article Video    
            $aVideoType = array('video/3gpp','video/mp4');
            foreach($_FILES['video_path']['name'] as $key => $files)
            {
                $_FILES['video_path']['name'] = $_FILES['video_path']['name'][$key];
                $_FILES['video_path']['type'] = $_FILES['video_path']['type'][$key];
                $_FILES['video_path']['tmp_name'] = $_FILES['video_path']['tmp_name'][$key];
                $_FILES['video_path']['error'] = $_FILES['video_path']['error'][$key];
                $_FILES['video_path']['size'] = $_FILES['video_path']['size'][$key];
                
                if($_FILES['video_path']['size'] <= 50000000 && $_FILES['video_path']['name']!="" && in_array($_FILES['video_path']['type'],$aVideoType))
                {
                    $file_upload_video = parent::saveVideo('video_path', 'uploads/article/' . $ID . '/');
                    if ($file_upload_video['file_name'] != "") {
                        $postArray_video = array();
                        $postArray_video['media_path'] = 'uploads/article/' . $ID . '/' . $file_upload_video['file_name'];
                        $postArray_video['article_id'] = $ID; 
                        $postArray_video['type'] = 'v';     
                        $this->Article->update_image($postArray_video);                                                  
                    } 
                }
            }


            if ($this->input->post('id') > 0) {
                $err = array('0' => $this->lang->line('EDITED'));
                $this->session->set_userdata('SUCCESS', $err);
            } else if($ID != '') {
                $err = array('0' => $this->lang->line('ADDED'));
                $this->session->set_userdata('SUCCESS', $err);
            } else {
                $err = array('0' => $this->lang->line('SOMETHINGS_WENT_WRONG'));
                $this->session->set_userdata('ERROR', $err);
            }        
        }
        redirect("admin/article/");
    }

    protected function article_rules() {
        $rules = array(
            array(
                'field' => 'title',
                'label' => $this->lang->language["ART_TITLE"],
                'rules' => 'trim|required|xss_clean|max_length[150]',
            ),
            array(
                'field' => 'cityID',
                'label' => $this->lang->language["CITY"],
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
}
