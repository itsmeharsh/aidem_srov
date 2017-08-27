<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('users', $this->data['language']);
        parent::load_version_model('ws/tablet/News_model_' . $this->data['version'], 'news_model');
    }


    public function get(){
       
        $today=date('Y-m-d');
        $responseData = array();
        //$result = array();
        $this->form_validation->set_rules($this->get_news_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message'] = $this->lang->language["err_req_values"];


        } else {
                    $postArray = $this->input->post();
                    $start = 0;
                    $limit = 5;

                    if(isset($postArray['start']) && $postArray['start'] != null)
                        $start = $postArray['start'];
                    if(isset($postArray['limit']) && $postArray['limit'] != null)
                        $limit = $postArray['limit'];
                    if(isset($postArray['cityID']) && $postArray['cityID'] != null)
                        $cityID = $postArray['cityID'];
                    if(isset($postArray['categoryid']) && $postArray['categoryid'] != null)
                        $categoryid = $postArray['categoryid'];
                    //$limit +=1;
                     $responseData['code'] = 200;
                     $responseData['status']= "success";
                     $responseData['data'] = array();
                     $responseData['data']['islast']='y';
                    
                    $NewsData = $this->news_model->get_newsData($limit,$start,$cityID,$categoryid);
               //  pre($NewsData);
                        if(!empty($NewsData)){
                            for($i=0;$i<count($NewsData);$i++){   
                                                                     
                                    
                                        $responseData['data']['news'][$i]['id']  = $NewsData[$i]['id'];
					$responseData['data']['news'][$i]['title']  = $NewsData[$i]['title'];
					$responseData['data']['news'][$i]['description']  = $NewsData[$i]['description'];
					$responseData['data']['news'][$i]['date']  = date('l d M',$NewsData[$i]['datetime']);
					$responseData['data']['news'][$i]['time']  = date('a g:i',$NewsData[$i]['datetime']);
                                        
                                        $responseData['data']['news'][$i]['category'] = "n";
					$cat = $this->news_model->CategoryData($NewsData[$i]['category_id']);
                                        //pre($cat);
					if($cat)
						 $responseData['data']['news'][$i]['category'] = $cat['name'];
                                        if($NewsData[$i]['image']!=''){
                                            $responseData['data']['news'][$i]['image']=DOMAIN_URL.'/'.$NewsData[$i]['image'];
                                        }else{
                                            $responseData['data']['news'][$i]['image']=$NewsData[$i]['image'];
                                        }
                                
                            }
                              if($i==$limit)
				{
					unset($responseData['data']['news'][$i]);
					$responseData['data']['islast'] = "n";
				} 
                               
                        }else{
                            $responseData['code'] = 400;
                            $responseData['status'] = 'error';
                            $responseData['message'] = 'no data found!!';
                        }
        }
        je_mobile($responseData);
    }
   
    protected function get_news_rules() {
        $rules = array(
            array(
                'field' => 'userid',
                'label' => 'userid',
                'rules' => 'trim|required|max_length[255]xss_clean',
            )
        );
        return $rules;
    }



}
