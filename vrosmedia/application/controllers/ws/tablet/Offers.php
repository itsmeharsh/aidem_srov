<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Offers extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('users', $this->data['language']);
        parent::load_version_model('ws/tablet/Offers_model_' . $this->data['version'], 'offer_model');
    }


    public function get(){
        $today=date('Y-m-d');
        $responseData = array();
        $result = array();
        $this->form_validation->set_rules($this->offer_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message'] = $this->lang->language["err_req_values"];


        } else {
            $postArray = $this->input->post();
            $start = 0;
            $limit = 5;
             $j=0;
            if(isset($postArray['start']) && $postArray['start'] != null)
                $start = $postArray['start'];
            if(isset($postArray['limit']) && $postArray['limit'] != null)
                $limit = $postArray['limit'];
             if(isset($postArray['cityID']) && $postArray['cityID'] != null)
                $cityID = $postArray['cityID'];

            $responseData['code'] = 200;
            $responseData['status']= "success";
            $responseData['data'] = array();
            $responseData['data']['islast']='y'; 
            
            $offerData = $this->offer_model->get_offersData($limit,$start,$cityID);
              //pre($offerData);
            if(!empty($offerData)){
              for($i=0;$i<count($offerData);$i++){
                //calculate payment mode
                    $startTimeStamp = strtotime($offerData[$i]['payment_date']);
                    $endTimeStamp = strtotime($today);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                    $numberDays = intval($numberDays);
                    
                    
                   if($offerData[$i]['duration']>$numberDays){                      
                        if($offerData[$i]['end_time']>$today){  

                                        $offerID=$offerData[$i]['id']; 
                                        
                                        $userid=$postArray['userid'];
                                        $business_id=$offerData[$i]['business_id'];
                                        $title=$offerData[$i]['name'];
                                    
                                        $QrLink='https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl={"id":"'.$offerID.'","business_id":"'.$business_id.'","driver_id":"'.$userid.'","type":"offer","title":"'.$title.'"}&choe=UTF-8&chld=L|2';
                                       
                                        $responseData['data']['offers'][$j]['id']  = $offerData[$i]['id'];
                                        $responseData['data']['offers'][$j]['business_id']  = $offerData[$i]['business_id'];
					$responseData['data']['offers'][$j]['name']  = $offerData[$i]['name'];
					$responseData['data']['offers'][$j]['description']  = $offerData[$i]['description'];
					$responseData['data']['offers'][$j]['datetime']  = date('Y-m-d H:i:s',$offerData[$i]['datetime']);
					$responseData['data']['offers'][$j]['location']  = $offerData[$i]['location'];
					$responseData['data']['offers'][$j]['phone']  = $offerData[$i]['mobile'];
					$responseData['data']['offers'][$j]['email']  = $offerData[$i]['email'];
					$responseData['data']['offers'][$j]['qrcode'] = $QrLink;
					$responseData['data']['offers'][$j]['latitude']  = (double)$offerData[$i]['latitude'];
					$responseData['data']['offers'][$j]['longitude']  =(double) $offerData[$i]['longitude'];
					$responseData['data']['offers'][$j]['totallike'] =(double) $offerData[$i]['totallike'];
					$responseData['data']['offers'][$j]['totalshare'] = (double)$offerData[$i]['totalshare'];
					$responseData['data']['offers'][$j]['createdby'] = $offerData[$i]['created_by'];

					$responseData['data']['offers'][$j]['startdate']  = date('M Y',strtotime($offerData[$i]['start_time']));
					$responseData['data']['offers'][$j]['enddate']  = date('M Y',strtotime($offerData[$i]['end_time']));

					$responseData['data']['offers'][$j]['category'] = "all";
                                        $responseData['data']['offers'][$j]['url'] = DOMAIN_URL.'/'.$offerData[$i]['image_path'];
                                        $j++;

					
					
                         }
                           
                   }  
            }
                
            }else{
                $responseData['code'] = 400;
                $responseData['status'] = 'error';
                $responseData['message'] = 'no data found!!';
            }
        }
        je_mobile($responseData);
    }
   
    protected function offer_rules() {
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
