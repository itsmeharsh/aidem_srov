<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        parent::load_version_model('ws/Graph_model_' . $this->data['version'], 'graph_model');
    }
    public function QRGraph()
    {
          $responseData = array();
//        $this->form_validation->set_rules($this->Graph_rules());
//        if ($this->form_validation->run() == FALSE) {
//
//            $responseData['code'] = 400;
//            $responseData['status'] = 'error';
//            $responseData['message'] = $this->lang->language["err_req_values"];
//
//
//        } else {
             $postArray = $this->input->post();
             if($postArray['business_id']!=''){
                 $dataID=$postArray['business_id'];
                 $dataType='business';
             }elseif($postArray['offer_id']!=''){
                 $dataID=$postArray['offer_id'];
                 $dataType='offer';
             }elseif($postArray['ads_id']!=''){
                 $dataID=$postArray['ads_id'];
                 $dataType='ads';
             }else{
                 $dataID=$postArray['business_id'];
                 $dataType='business';
             }
             
            
            if($postArray['start_date']!='' && $postArray['end_date']!=''){
                $startTimeStamp = strtotime($postArray['start_date']);
                $endTimeStamp = strtotime($postArray['end_date']);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                $days = intval($numberDays);
            }else{
                  $postArray['start_date']=date('Y-m-d');
                  $postArray['end_date'] =  date('Y-m-d', strtotime('-15 days', strtotime($postArray['start_date'])));
                  $days=15;
            }
            
            
            
            $lable=$this->getDateLable($postArray['end_date'],$postArray['start_date']);
            for($i=0;$i<=$days;$i++){
                $day='-'.$i.' '.'days';  
                $date=date('Y-m-d', strtotime($day, strtotime($postArray['start_date']))); 
                
                $clicks=intval($this->GraphData($dataID,$date,3,$dataType));
                $data=array('day'=>$date,'clicks'=>$clicks,'lable'=>$lable);
                $results[]=$data;
                
            } 
          
            if(!empty($results)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$results;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

//        }
        je_mobile($responseData);
    }
    public function  ImpressionGraph(){

          $responseData = array();
//        $this->form_validation->set_rules($this->Graph_rules());
//        if ($this->form_validation->run() == FALSE) {
//
//            $responseData['code'] = 400;
//            $responseData['status'] = 'error';
//            $responseData['message'] = $this->lang->language["err_req_values"];
//
//
//        } else {
             $postArray = $this->input->post();
             if($postArray['business_id']!=''){
                 $dataID=$postArray['business_id'];
                 $dataType='business';
             }elseif($postArray['offer_id']!=''){
                 $dataID=$postArray['offer_id'];
                 $dataType='offer';
             }elseif($postArray['ads_id']!=''){
                 $dataID=$postArray['ads_id'];
                 $dataType='ads';
             }else{
                 $dataID=$postArray['business_id'];
                 $dataType='business';
             }
            
            if($postArray['start_date']!='' && $postArray['end_date']!=''){
                $startTimeStamp = strtotime($postArray['start_date']);
                $endTimeStamp = strtotime($postArray['end_date']);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                $days = intval($numberDays);
            }else{
                  $postArray['start_date']=date('Y-m-d');
                  $postArray['end_date'] =  date('Y-m-d', strtotime('-15 days', strtotime($postArray['start_date'])));
                  $days=15;
            }
            
            
            
            $lable=$this->getDateLable($postArray['end_date'],$postArray['start_date']);
            for($i=0;$i<=$days;$i++){
                $day='-'.$i.' '.'days';  
                $date=date('Y-m-d', strtotime($day, strtotime($postArray['start_date']))); 
                
                $clicks=intval($this->GraphData($dataID,$date,2,$dataType));
                $data=array('day'=>$date,'clicks'=>$clicks,'lable'=>$lable);
                $results[]=$data;
                
            } 
           // pre($results);

//            $getData=$this->graph_model->Graph($postArray,2);
//            for($i=0;$i<count($getData);$i++){
//                if($getData[$i]['business_id']==$postArray['business_id'] && $getData[$i]['type']==2){
//                    $getData[$i]['clicks']=$getData[$i]['clicks'];
//                }else{
//                    $getData[$i]['clicks']=0;
//                    $getData[$i]['business_id']=$postArray['business_id'];
//                }
//                unset($getData[$i]['business_id']);
//                unset($getData[$i]['type']);
//            }    
            if(!empty($results)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$results;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

//        }
        je_mobile($responseData);

    }
    public function  ClickGraph(){

        $responseData = array();
//        $this->form_validation->set_rules($this->Graph_rules());
//        if ($this->form_validation->run() == FALSE) {
//
//            $responseData['code'] = 400;
//            $responseData['status'] = 'error';
//            $responseData['message'] = $this->lang->language["err_req_values"];
//
//
//        } else {
             $postArray = $this->input->post();
             if($postArray['business_id']!=''){
                 $dataID=$postArray['business_id'];
                 $dataType='business';
             }elseif($postArray['offer_id']!=''){
                 $dataID=$postArray['offer_id'];
                 $dataType='offer';
             }elseif($postArray['ads_id']!=''){
                 $dataID=$postArray['ads_id'];
                 $dataType='ads';
             }else{
                 $dataID=$postArray['business_id'];
                 $dataType='business';
             }
            
            if($postArray['start_date']!='' && $postArray['end_date']!=''){
                $startTimeStamp = strtotime($postArray['start_date']);
                $endTimeStamp = strtotime($postArray['end_date']);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                $days = intval($numberDays);
            }else{
                  $postArray['start_date']=date('Y-m-d');
                  $postArray['end_date'] =  date('Y-m-d', strtotime('-15 days', strtotime($postArray['start_date'])));
                  $days=15;
            }
            
            
            
            $lable=$this->getDateLable($postArray['end_date'],$postArray['start_date']);
            for($i=0;$i<=$days;$i++){
                $day='-'.$i.' '.'days';  
                $date=date('Y-m-d', strtotime($day, strtotime($postArray['start_date']))); 
                
                $clicks=intval($this->GraphData($dataID,$date,1,$dataType));
                $data=array('day'=>$date,'clicks'=>$clicks,'lable'=>$lable);
                $results[]=$data;
                
            } 
          
            if(!empty($results)){
                $responseData['code'] = 200;
                $responseData['status'] ='success';
                $responseData['data'] =$results;
            }else{
                $responseData['code'] = 200;
                $responseData['status'] = 'success';
                $responseData['message']= $this->lang->language["NO_DATA_FOUND"];
            }

//        }
        je_mobile($responseData);

    }
    public function getDateLable($date1,$date2){
            $start_date_month= date('M', strtotime($date2));
            $end_date_month= date('M', strtotime($date1));                   
            $year=date('Y', strtotime($date1));
            if($start_date_month==$end_date_month){
                $lable=$start_date_month.','.$year;
            }else{
                $lable=$start_date_month.'-'.$end_date_month.','.$year;
            }
            return $lable;
    }
     public function GraphData($dataID,$date,$type,$dataType)
    {
         $clicks=$this->graph_model->GraphData($dataID,$date,$type,$dataType);
         if($clicks==''){
             $clicks=0;
         }
         return $clicks;

    }

    protected function Graph_rules() {
        $rules = array(
            array(
                'field' => 'business_id',
                'label' => 'business_id',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }





}
