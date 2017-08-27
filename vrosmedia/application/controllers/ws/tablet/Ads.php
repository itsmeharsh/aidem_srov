<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Ads extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('users', $this->data['language']);
        parent::load_version_model('ws/tablet/Ads_model_' . $this->data['version'], 'ads_model');
    }


    public function home(){
        $today=date('Y-m-d');
        $responseData = array();
        $result = array();
        $this->form_validation->set_rules($this->home_rules());
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

            $adsData = $this->ads_model->get_adsData($limit,$start,$cityID);
             //pre($adsData);
            if(!empty($adsData)){
              for($i=0;$i<count($adsData);$i++){
                //calculate payment mode
                    $startTimeStamp = strtotime($adsData[$i]['payment_date']);
                    $endTimeStamp = strtotime($today);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                    $numberDays = intval($numberDays);
                    
                 
                   if($adsData[$i]['duration']>$numberDays){   
               
                         if($adsData[$i]['enddate']>=$today){
 // pre($adsData);
                              $ads_type=$adsData[$i]['ads_type'];
                              $title=$adsData[$i]['title'];
                              unset($adsData[$i]['payment_status']);
                              unset($adsData[$i]['transaction_id']);
                              unset($adsData[$i]['payment_date']);
                              unset($adsData[$i]['duration']);
                             // unset($adsData[$i]['ads_type']);
                              unset($adsData[$i]['user_id']);
                              unset($adsData[$i]['start_time']);
                            //  unset($adsData[$i]['cityID']);
                              $adsData[$i]['latitude']=(double)$adsData[$i]['latitude'];
                              $adsData[$i]['longitude']=(double)$adsData[$i]['longitude'];


                              
                              $adsID=$adsData[$i]['id'];
                              $userid=$postArray['userid'];
                              
                                $adsData[$i]['qrcode']='https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl={"id":"'.$adsID.'","driver_id":"'.$userid.'","type":"business","title":"'.$title.'"}&choe=UTF-8&chld=L|2';
                             // $adsData[$i]['qrcode']="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl='AD-$adsID'&choe=UTF-8&chld=L|4";
                              
                              if($ads_type==1){

                                $adsData[$i]['banner_image']=$adsData[$i]['image'];
                                $adsData[$i]['footer_image']='';                               
                                unset($adsData[$i]['image']);
                                unset($adsData[$i]['image_footer']);

                                  $result['fullads'][]=$adsData[$i];
                              }
                              if($ads_type==2){
//echo $ads_type;
                                $adsData[$i]['banner_image']='';
                                $adsData[$i]['footer_image']=$adsData[$i]['image_footer'];
                                 
                                unset($adsData[$i]['image']);
                                unset($adsData[$i]['image_footer']);
                                  $result['halfads'][]=$adsData[$i]; 
                              }  
                              if($ads_type==3){
                                   $footer_image=$adsData[$i]['image_footer'];
                                   $banner_image=$adsData[$i]['image'];
                                   unset($adsData[$i]['image']);
                                   unset($adsData[$i]['image_footer']);
                                   
                                    $adsData[$i]['footer_image']='';
                                    $adsData[$i]['banner_image']=$banner_image;
                                    $result['fullads'][]=$adsData[$i];
                                    
                                    $adsData[$i]['footer_image']=$footer_image;
                                    $adsData[$i]['banner_image']='';
                                    $result['halfads'][]=$adsData[$i]; 
                                  
                              }
                              
                              
                              
                              
                              
                              
                              
                         }
                           
                   }  
            }
                $responseData['code'] = 200;
                $responseData['status']= "success";
                $responseData['data'] = $result;
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message'] = 'no data found!!';
            }
        }
        je_mobile($responseData);
    }
   
    protected function home_rules() {
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
