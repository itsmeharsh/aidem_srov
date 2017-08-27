<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('business', $this->data['language']);
        parent::load_version_model('ws/tablet/Citymap_model_' . $this->data['version'], 'map_model');
    }

     public function get(){
       
        $today=date('Y-m-d');
        $responseData = array();
        //$result = array();
        $this->form_validation->set_rules($this->map_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message'] = $this->lang->language["err_req_values"];


        } else {
                    $postArray = $this->input->post();
                    $start = 0;
                    $limit = 20;

                    if(isset($postArray['lat']) && $postArray['lat'] != null)
                        $lat = $postArray['lat'];
                    if(isset($postArray['lng']) && $postArray['lng'] != null)
                        $long = $postArray['lng'];
                    if(isset($postArray['cityID']) && $postArray['cityID'] != null)
                        $cityID = $postArray['cityID'];
                    //$limit +=1;
                     $responseData['code'] = 200;
                     $responseData['status']= "success";
                     $responseData['data'] = array();
                   
                   
                     
                    $BusinessData = $this->map_model->getData($lat,$long,$cityID);
                
                        if(!empty($BusinessData)){
                            for($i=0;$i<count($BusinessData);$i++){    
                                    if($BusinessData[$i]['QRCode']){
				           $a =  urldecode($BusinessData[$i]['QRCode']);
                                           $a = str_replace("'business_id':".$BusinessData[$i]['id'],"'business_id':".$BusinessData[$i]['id'].",'driver_id':".$BusinessData[$i]['user_id'],$a);
                                           $BusinessData[$i]['QRCode'] = $a;
                                    }
                                    
                                    $responseData['data']['business'][$i]['id']  = $BusinessData[$i]['id'];
                                    $responseData['data']['business'][$i]['name']  = $BusinessData[$i]['name'];
                                    $responseData['data']['business'][$i]['description']  = $BusinessData[$i]['description'];
                                    $responseData['data']['business'][$i]['since']  = $BusinessData[$i]['since'];
                                    $responseData['data']['business'][$i]['datetime']  = date('Y-m-d H:i:s',$BusinessData[$i]['datetime']);
                                    $responseData['data']['business'][$i]['location']  = $BusinessData[$i]['location'];
                                    $responseData['data']['business'][$i]['phone']  = $BusinessData[$i]['mobile'];
                                    $responseData['data']['business'][$i]['email']  = $BusinessData[$i]['email'];
                                    $responseData['data']['business'][$i]['qrcode'] = $BusinessData[$i]['QRCode'];
                                    $responseData['data']['business'][$i]['latitude']  =(double) $BusinessData[$i]['latitude'];
                                    $responseData['data']['business'][$i]['longitude']  = (double)$BusinessData[$i]['longitude'];
                                    $responseData['data']['business'][$i]['totallike'] = $BusinessData[$i]['totallike'];
                                    $responseData['data']['business'][$i]['ratingavg'] = $BusinessData[$i]['avg_rating'];
                                    $responseData['data']['business'][$i]['createdby'] = $BusinessData[$i]['created_by'];
                                    $responseData['data']['business'][$i]['working_hours'] = $BusinessData[$i]['working_hours'];
                                    $responseData['data']['business'][$i]['category'] ='all';
                                    
                                    
                                    $CommentsData=$this->map_model->getBusinessCommentData($BusinessData[$i]['id']);
                                   if(!empty($CommentsData)){
                                   
                                        for($k=0;$k<count($CommentsData);$k++){
                                                     $user = $this->map_model->CreatedUserData($CommentsData[$k]['user_id']);

                                                    $responseData['data']['business'][$i]['feedbacks'][$k]['id']  = $CommentsData[$k]['id'];
                                                    $responseData['data']['business'][$i]['feedbacks'][$k]['name']  = $user['name'];
                                                     if(preg_match("/uploads/i", $user['image'])){
                                                        $responseData['data']['business'][$i]['feedbacks'][$k]['image'] = DOMAIN_URL.'/'.$user['image'];
                                                     }else{
                                                        $responseData['data']['business'][$i]['feedbacks'][$k]['image'] =$user['image']; 
                                                     }

                                                    $responseData['data']['business'][$i]['feedbacks'][$k]['comment']  = $CommentsData[$k]['comment'];
                                                    $responseData['data']['business'][$i]['feedbacks'][$k]['rating']  = $CommentsData[$k]['rating'];
                                                    $responseData['data']['business'][$i]['feedbacks'][$k]['datetime']  = date('Y-m-d H:i:s',$CommentsData[$k]['i_date']);
                                        }
                                   }else{
                                       $responseData['data']['business'][$i]['feedbacks']=[];
                                   }
                                   
                                   $getBusinessImages=$this->map_model->getAllImages($BusinessData[$i]['id'],'business_id');
                                    for($j=0;$j<=count($getBusinessImages)-1;$j++){
                                        if($getBusinessImages[$j]['type']=='i'){
                                            $getBusinessImages[$j]['thumb']='';
                                        }
                                    }
                                   $responseData['data']['business'][$i]['medias']=$getBusinessImages; 
                                    
                                    
                                
                            }
                              
                               
                        }else{
                            $responseData['code'] = 400;
                            $responseData['status'] = 'error';
                            $responseData['message'] = 'no data found!!';
                        }
        }
        je_mobile($responseData);
    }
   
    protected function map_rules() {
        $rules = array(
            array(
                'field' => 'userid',
                'label' => 'userid',
                'rules' => 'trim|required|max_length[255]xss_clean',
            ),
             array(
                'field' => 'lat',
                'label' => 'userid',
                'rules' => 'trim|required',
            ),
             array(
                'field' => 'lng',
                'label' => 'userid',
                'rules' => 'trim|required',
            )
        );
        return $rules;
    }




}
