<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('users', $this->data['language']);
        parent::load_version_model('ws/tablet/Event_model_' . $this->data['version'], 'event_model');
    }


    public function get(){

        $today=date('Y-m-d');
        $responseData = array();
        //$result = array();
        $this->form_validation->set_rules($this->get_event_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message'] = $this->lang->language["err_req_values"];


        } else {
                    $postArray = $this->input->post();
                    $start = 0;
                    $limit = 20;

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
                    
                    $EventsData = $this->event_model->getEvents($limit,$start,$cityID);
               //  pre($EventsData);
                        if(!empty($EventsData)){
                            for($i=0;$i<count($EventsData);$i++){    
                                    $eventID=$EventsData[$i]['id'];
                                    $userid=$postArray['userid'];
                                    $title=$EventsData[$i]['title'];
                                    
                                    
                                    
                                    $QrLink='https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl={"id":"'.$eventID.'","driver_id":"'.$userid.'","type":"event","title":"'.$title.'"}&choe=UTF-8&chld=L|2';
                                    
                                    $responseData['data']['events'][$i]['id']  = $EventsData[$i]['id'];
                                    $responseData['data']['events'][$i]['name']  = $EventsData[$i]['title'];
                                    $responseData['data']['events'][$i]['description']  = $EventsData[$i]['description'];
                                    $responseData['data']['events'][$i]['datetime']  = date('Y-m-d H:i:s',$EventsData[$i]['start_time']);
                                    $responseData['data']['events'][$i]['location']  = $EventsData[$i]['venue'].' '.$EventsData[$i]['location'];
                                    $responseData['data']['events'][$i]['phone']  = "";
                                    $responseData['data']['events'][$i]['email']  = 'admin@vros.com';
                                    $responseData['data']['events'][$i]['qrcode'] =$QrLink;
                                    $responseData['data']['events'][$i]['latitude']  = (double)$EventsData[$i]['Lattitude'];;
                                    $responseData['data']['events'][$i]['longitude']  = (double)$EventsData[$i]['Longitude'];
                                    $responseData['data']['events'][$i]['totallike'] = $EventsData[$i]['totallike'];
                                    $responseData['data']['events'][$i]['totalshare'] = $EventsData[$i]['totalshare'];
                                    $responseData['data']['events'][$i]['createdby'] ='VROS Admin';
                                    $responseData['data']['events'][$i]['islike'] ='n';
                                    $responseData['data']['events'][$i]['ticket_url'] =$EventsData[$i]['website'];

                                     if(preg_match("/uploads/i", $EventsData[$i]['url'])){
                                       $responseData['data']['events'][$i]['url']=DOMAIN_URL.'/'.$EventsData[$i]['url'];
                                     }else{
                                       $responseData['data']['events'][$i]['url']=$EventsData[$i]['url'];  
                                     } 
                                
                            }
                              if($i==$limit)
				{
					unset($responseData['data']['events'][$i]);
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
   
    protected function get_event_rules() {
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
