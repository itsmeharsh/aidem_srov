<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('business', $this->data['language']);
        parent::load_version_model('ws/tablet/Feedback_model_' . $this->data['version'], 'feedback_model');
    }

     public function get(){
       
        $today=date('Y-m-d');
        $responseData = array();
        //$result = array();
        $this->form_validation->set_rules($this->feedback_rules());
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
                    //$limit +=1;
                     $responseData['code'] = 200;
                     $responseData['status']= "success";
                     $responseData['data'] = array();
                     $responseData['data']['islast']='y';
                   
                   
                     
                    $FeedbackData = $this->feedback_model->get_FeedbackData($limit,$start,$cityID,$postArray['userid']);
                   // pre($FeedbackData);
                        if(!empty($FeedbackData)){
                            for($i=0;$i<count($FeedbackData);$i++){    
                                    $user = $this->feedback_model->CreatedUserData($FeedbackData[$i]['user_id']);
                                    
                                    $responseData['data']['feedbacks'][$i]['id']  = $FeedbackData[$i]['id'];
                                    $responseData['data']['feedbacks'][$i]['name']  = $user['first_name'].' '.$user['last_name'];
                                    if(preg_match("/uploads/i", $user['image'])){
                                        $responseData['data']['feedbacks'][$i]['image']  = DOMAIN_URL.'/'.$user['image'];
                                     }else{
                                        $responseData['data']['feedbacks'][$i]['image']  =$user['image']; 
                                     }
                                    //$responseData['data']['feedbacks'][$i]['image']  = DOMAIN_URL.'/'.$user['image'];
                                    $responseData['data']['feedbacks'][$i]['comment']  = $FeedbackData[$i]['comment'];
                                    $responseData['data']['feedbacks'][$i]['rating']  = $FeedbackData[$i]['rating'];
                                    $responseData['data']['feedbacks'][$i]['datetime']  = date('Y-m-d H:i:s',$FeedbackData[$i]['i_date']);
                                    
                            }
                              if($i==$limit)
				{
					unset($responseData['data']['feedbacks'][$i]);
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
   
    protected function feedback_rules() {
        $rules = array(
            array(
                'field' => 'userid',
                'label' => 'userid',
                'rules' => 'trim|required|max_length[255]xss_clean',
            ),
        );
        return $rules;
    }




}
