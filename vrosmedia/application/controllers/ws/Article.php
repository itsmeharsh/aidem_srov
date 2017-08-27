<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        parent::load_version_model('ws/Article_model_' . $this->data['version'], 'article_model');
    }
    
    public function lists(){
        $this->form_validation->set_rules('deLatitude','latitude','trim|required|xss_clean');  
        $this->form_validation->set_rules('deLongitude','latitude','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $postArray['user_id'] = (isset($postArray['user_id']) && $postArray['user_id'] > 0) ? $postArray['user_id'] : 0;
            $postArray['Limit'] = (isset($postArray['Limit']) && $postArray['Limit'] != '') ? $postArray['Limit'] : 10;
            $postArray['Offset'] = (isset($postArray['Offset']) && $postArray['Offset'] != '') ? $postArray['Offset'] : 0;
            
            $data['records'] = $this->article_model->getArticleList($postArray);

            for($i=0;$i<=count($data['records'])-1;$i++){
                if($data['records'][$i]['cover_image'] != '')
                    $data['records'][$i]['cover_image'] = DOMAIN_URL.'/'.$data['records'][$i]['cover_image'];
                if($data['records'][$i]['owner_image'] != '')
                    $data['records'][$i]['owner_image'] = DOMAIN_URL.'/'.$data['records'][$i]['owner_image'];

                $data['records'][$i]['medias'] = $this->article_model->getAllMedia($data['records'][$i]['article_id']);

                $data['records'][$i]['is_Like'] = $data['records'][$i]['is_rated'] = $data['records'][$i]['is_view'] = 0;
                if($postArray['user_id'] > 0){
                    $checkUserLike = $this->article_model->checkUserLike($postArray['user_id'],$data['records'][$i]['article_id']);
                    if($checkUserLike)
                      $data['records'][$i]['is_Like'] = 1;

                    $checkUserRatting = $this->article_model->checkUserRatting($postArray['user_id'],$data['records'][$i]['article_id']);
                    if($checkUserRatting)
                      $data['records'][$i]['is_rated'] = 1;

                    $checkUserView = $this->article_model->checkUserView($postArray['user_id'],$data['records'][$i]['article_id']);
                    if($checkUserView)
                      $data['records'][$i]['is_view'] = 1;
                }
            }

            if(!empty($data['records'])){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] = $data;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= 'No data found';
            }
        }
        je_mobile($responseData);
    }

    public function detail(){
        $this->form_validation->set_rules('article_id','article id','trim|required|xss_clean');  
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $postArray['user_id'] = (isset($postArray['user_id']) && $postArray['user_id'] > 0) ? $postArray['user_id'] : 0;
            
            $data = $this->article_model->getArticleDetail($postArray['article_id']);
           
            $responseData['code'] = 200;
            $responseData['status'] ='success';  
            if(!empty($data)){
                if($data['cover_image'] != '')
                    $data['cover_image'] = DOMAIN_URL.'/'.$data['cover_image'];
                if($data['owner_image'] != '')
                    $data['owner_image'] = DOMAIN_URL.'/'.$data['owner_image'];

                $data['is_Like'] = $data['is_rated'] = 0;  
                if($postArray['user_id'] > 0){
                    $checkUserLike = $this->article_model->checkUserLike($postArray['user_id'],$data['article_id']);
                    if($checkUserLike)
                      $data['is_Like'] = 1;

                    $checkUserRatting = $this->article_model->checkUserRatting($postArray['user_id'],$data['article_id']);
                    if($checkUserRatting)
                      $data['is_rated'] = 1;
                }
            }else{
                $responseData['message']= 'Article not found';
            }
            $responseData['data'] = $data;
        }
        je_mobile($responseData);  
    }

    public function like(){
        $this->form_validation->set_rules('relation_id','article id','trim|required|xss_clean');
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');  
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserLike = $this->article_model->checkUserLike($postArray['user_id'],$postArray['relation_id']);
            
            $responseData['code'] = 200;
            $responseData['status'] ='success';
            if($checkUserLike){
                $this->article_model->delete_UserLike($postArray);
                $responseData['message']= 'Article disliked successfully';
                $responseData['data']['count'] = $this->article_model->getTotalLikes($postArray['relation_id']);
            }else{
                $postArray['type'] = 'article';
                $this->article_model->add_UserLike($postArray);
                $responseData['message']= 'Article liked successfully';
                $responseData['data']['count'] = $this->article_model->getTotalLikes($postArray['relation_id']);
            }
        }
        je_mobile($responseData); 
    }

    public function rattingList(){
        $this->form_validation->set_rules('relation_id','relation_id','trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();            
            $postArray['Limit'] = (isset($postArray['Limit']) && $postArray['Limit'] != '') ? $postArray['Limit'] : 10;
            $postArray['Offset'] = (isset($postArray['Offset']) && $postArray['Offset'] != '') ? $postArray['Offset'] : 0;

            $data['records'] = $this->article_model->getArticleRattings($postArray);
            
            for($i=0;$i<=count($data['records'])-1;$i++){
                if($data['records'][$i]['image'] != '')
                    $data['records'][$i]['image'] = DOMAIN_URL.'/'.$data['records'][$i]['image'];
            }

            if(!empty($data['records'])){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] = $data;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= 'No data found';
            }
        }
        je_mobile($responseData); 
    }

    public function add_ratting(){
        $this->form_validation->set_rules('relation_id','article id','trim|required|xss_clean');  
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');  
        $this->form_validation->set_rules('star','star','trim|required|xss_clean');  
        $this->form_validation->set_rules('comment','comment','trim|required|xss_clean');  

        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserRatting = $this->article_model->checkUserRatting($postArray['user_id'],$postArray['relation_id']);
            
            if($checkUserRatting){
                $responseData['code'] = 400;
                $responseData['status'] ='error';
                $responseData['message']= 'Already rated';
            }else{
                $postArray['type'] = 'article';
                $postArray['ratting_id'] = $this->article_model->add_UserRatting($postArray);
                $user = $this->db->get_where('users',array('id'=>$postArray['user_id']))->row_array();
                if($user['image'] != '')
                    $user['image'] = DOMAIN_URL.'/'.$user['image'];
                $postArray['image'] = $user['image'];
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Article rated successfully';
                $responseData['data']= $postArray;
            }
        }
        je_mobile($responseData); 
    }
    
    public function add_view(){
        $this->form_validation->set_rules('relation_id','article id','trim|required|xss_clean');  
        $this->form_validation->set_rules('user_id','user id','trim|required|xss_clean');  
        
        if ($this->form_validation->run() == FALSE) {
            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];
        }else{  
            $postArray = $this->input->post();
            $checkUserView = $this->article_model->checkUserView($postArray['user_id'],$postArray['relation_id']);
            
            if($checkUserView){
                $responseData['code'] = 400;
                $responseData['status'] ='error';
                $responseData['message']= 'Already viewed';
            }else{
                $postArray['type'] = 'article';
                $this->article_model->add_UserView($postArray);
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['message']= 'Article viewed successfully';
            }
        }
        je_mobile($responseData); 
    }
}

