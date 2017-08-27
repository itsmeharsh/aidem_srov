<?php
class Business extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Business_model','Business');
        $this->viewData['category'] = $this->Business->getBusCat();
    }

   function index()
    {
    
        $this->Business->_fields ="id,name,since,location,cover_image,email,totallike,totalshare,totalfavorite,avg_rating,user_id";
        $this->Business->_where = array("deleted" =>'0');
        $businessData = $this->Business->getBusinessData();
 
        $this->viewData['businessData'] = $businessData;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("BUSINESS_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'business/lists/' => "business");
        $this->viewData['module'] = "business/list";
        $this->load->view('admin/template', $this->viewData);
    }
    function add($id= NULL)
    {  
        if($id > 0){
            $this->viewData['action'] = lang('EDIT');
            $this->Business->_where = array("b.id" => $id);
            $this->viewData['record'] = $this->Business->getBusinessById();
        }
        else
        {
          $this->viewData['record'] = (array)get_column('business');
        }

        $this->viewData['title'] = $id > 0 ? 'Edit Business':'Add Business';     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'business' => "Business Category",'javascript:;'=>$this->viewData['title']);
        $this->load->view('admin/business/add', $this->viewData);       
    }

    public function lists($category = NULL){       
        
        $this->Business->_fields ="id,name,since,location,email,totallike,totalshare,totalfavorite,avg_rating,user_id";
        $this->Business->_where = array("deleted" =>'0',"category_id"=>$category);
        $businessData = $this->Business->getBusinessData(); 
       
        $this->viewData['businessData'] = $businessData; 
        $this->viewData['boolDataTables'] = true;
        $this->viewData['category'] = $category;
        $this->viewData['title'] = lang("BUSINESS_MNG");     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home",'business'=> "Business Category", 'business/lists/'.$category.'' => "business");
        $this->viewData['module'] = "business/list";
        $this->load->view('admin/template', $this->viewData);
    }
    public function save($id = null) {
     // pre($_FILES);
        $postData = $this->input->post();
        $ID = (int)$this->input->post('id');
		$this->form_validation->set_rules($this->business_rules());
		if ($this->form_validation->run() == FALSE) {                    
			
                    $err = array(
                    '0' => $this->lang->line('BLANK_VALUE'),
                    );            
                    $this->session->set_userdata('ERROR', $err);

		} else { 

                $postData['totallike']=0;
                $postData['totalshare']=0;
                $postData['totalfavorite']=0;
                $postData['working_hours']='[{"day":"Sun","start":"20:15 PM","end":"20:15 PM","is_working":1},{"day":"Mon","start":"08:06 AM","end":"20:06 PM","is_working":1},{"day":"Tue","start":"08:06 AM","end":"20:06 PM","is_working":1},{"day":"Wed","start":"-","end":"-","is_working":0},{"day":"Thu","start":"-","end":"-","is_working":0},{"day":"Fri","start":"-","end":"-","is_working":0},{"day":"Sat","start":"-","end":"-","is_working":0}]';
                $ID = $this->Business->insertRow($postData, 'id', $ID);
                
                if($ID){
                    $name=$postData['name']; 
                    $QrLink="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl={'business_id':$ID,'type':'business','title':$name]}&choe=UTF-8&chld=L|4";
                    $this->Business->insertRow(array('QRCode'=>$QrLink), 'id', $ID);
                }
                
                
           /*------------------------------------------------------Business Images -----------------------------------------------------*/    
                $aImageType = array('image/jpeg','image/jpg','image/png');
                //cover image
                 if($_FILES['cover_image']['size'] <= 2048000 && $_FILES['cover_image']['name']!="" && in_array($_FILES['cover_image']['type'],$aImageType))
                    {
                        $file_upload = parent::saveFile('cover_image', 'uploads/business/' . $ID . '/');
                                         
                        if ($file_upload['file_name'] != "") {
                                    $postArray = array();
                                    $cover_image = 'uploads/business/' . $ID . '/' . $file_upload['file_name'];
                                    $this->Business->insertRow(array('cover_image'=>$cover_image), 'id', $ID);                                 
                                   
                        } 
                    }

              
                //More Business images
                foreach($_FILES['media_path']['name'] as $key => $files)
                {

                    $_FILES['image']['name'] = $_FILES['media_path']['name'][$key];
                    $_FILES['image']['type'] = $_FILES['media_path']['type'][$key];
                    $_FILES['image']['tmp_name'] = $_FILES['media_path']['tmp_name'][$key];
                    $_FILES['image']['error'] = $_FILES['media_path']['error'][$key];
                    $_FILES['image']['size'] = $_FILES['media_path']['size'][$key];
                    
                    if($_FILES['image']['size'] <= 2048000 && $_FILES['image']['name']!="" && in_array($_FILES['image']['type'],$aImageType))
                    {
                        $file_upload = parent::saveFile('image', 'uploads/business/' . $ID . '/');
                                         
                        if ($file_upload['file_name'] != "") {
                                    $postArray = array();
                                    $postArray['media_path'] = 'business/' . $ID . '/' . $file_upload['file_name'];
                                    $postArray['business_id'] = $ID; 
                                    $postArray['type'] = 'i';                                               
                                    $this->Business->update_image($postArray);                                    
                                   
                        } 
                    }

                }
                
            /*------------------------------------------------------Business Video -----------------------------------------------------*/    
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

                        $file_upload_video = parent::saveFile('video_path', 'uploads/business/' . $ID . '/');
                                     
                        if ($file_upload_video['file_name'] != "") {
                                    $postArray_video = array();
                                    $postArray_video['media_path'] = 'business/' . $ID . '/' . $file_upload_video['file_name'];
                                    $postArray_video['business_id'] = $ID; 
                                    $postArray_video['type'] = 'v';     
                                
                                    $this->Business->update_image($postArray_video);                                    
                                   
                        } 
                    }

                }
                
                
                                                
                if ($this->input->post('id') > 0) {
                        $err = array(
                                   '0' => $this->lang->line('EDITED'),
                                 );

                         $this->session->set_userdata('SUCCESS', $err);

                  } else if($ID != '') {
                        $err = array(
                                   '0' => $this->lang->line('ADDED'),
                                 );

                         $this->session->set_userdata('SUCCESS', $err);


                  } else {
                         $err = array(
                                  '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                                 );

                         $this->session->set_userdata('ERROR', $err);
                  }
                    
        
	}
       
        redirect("admin/business/");
      }
    function status($id = '')
    {

        if ($id >0)
        {
            $changeStatus = $this->Business->changeStatus('id', $id);
            if ($changeStatus != '')
            {
                $data['result'] = 'success';
                $data['message'] = 'Status changed successfully.';
            } else
            {
                $data['result'] = 'error';
                $data['message'] = 'Error in updation.Please try again.';
            }
            echo json_encode($data);
            exit;
        }
    }
     function remove($id = '')
    {
        if (isset($id) && $id > 0)
        {

            $DELETE = $this->Business->changeDeleted('id', $id);

            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'Record deleted successfully.';
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
            $data['message'] = 'No such record found.';
            echo json_encode($data);
            exit;
        }
    }
     function detailView($business_id='',$iUserID='')
    {
      if($business_id!='' && $iUserID!=''){
       
                $businessData=$this->Business->getDetailBusinessData($business_id);

                $getBusinessImages=$this->Business->getAllImages($business_id,'business_id');
                $getBusinessuserLikes=$this->Business->getBusinesssLikedUsers($business_id);




                $CreatedUserData=$this->Business->CreatedUserData($iUserID);

                $getBusinessuserCommented=$this->Business->getBusinessCommentedUsers($business_id);

                //remove image thumb
                for($j=0;$j<=count($getBusinessImages)-1;$j++){
                    if($getBusinessImages[$j]['type']=='i'){
                        $getBusinessImages[$j]['thumb']='';
                    }
                }

                $businessData['datetime']=date('Y-m-d H:i',$businessData['datetime']);

                $businessData['CreatedUserData']=$CreatedUserData;
                $businessData['LikedusersLists']=$getBusinessuserLikes;
                $businessData['CommentedusersLists']=$getBusinessuserCommented;
                $businessData['medias']=$getBusinessImages;

              $businessData['working_hours']=json_decode($businessData['working_hours'],true);

           //pre($businessData);
            $this->viewData['title'] = lang("USER_MNG");
            $this->viewData['arrBradcrumb'] = array("dashboard"=>"business", 'user' => "business Detail View");
            $this->viewData['businessData'] = $businessData;
            $this->viewData['module'] = "business/detailView";
            $this->load->view('admin/template', $this->viewData);
      }else{
          $this->load->view('errors/html/error_404');
      }
    }
     public function graph($business_id='')
    {
         $postArray = $this->input->post();
         if($postArray['start_date']!='' && $postArray['end_date']){

              $startTimeStamp = strtotime($postArray['start_date']);
              $endTimeStamp = strtotime($postArray['end_date']);
              $timeDiff = abs($endTimeStamp - $startTimeStamp);
              $numberDays = $timeDiff/86400;  // 86400 seconds in one day
              $days = intval($numberDays);
              
           
         }else{
            $days=15; 
            $endTimeStamp=date('Y-m-d');
            
          //  pre($result);
//            $qrgraphData=$this->QRGraph(array('business_id'=>$business_id));
//            $ImpressionData=$this->ImpressionGraph(array('business_id'=>$business_id));
//            $ClickgraphData=$this->ClickGraph(array('business_id'=>$business_id));
         }
         
              for($i=0;$i<=$days;$i++){
                $day='-'.$i.' '.'days';  
                $date=date('Y-m-d', strtotime($day, strtotime($endTimeStamp))); 
                
                $Qr_date_array[]=intval($this->GraphData($business_id,$date,3));
                $Click_date_array[]=intval($this->GraphData($business_id,$date,1));
                $Impression_date_array[]=intval($this->GraphData($business_id,$date,2));
               // $cityGraph=$this->CityGraphData($business_id,$date,$cityID);
                $date_array[]=$date;
                
              }
              
        $Qrdate_array[]=array('name'=>'QR Scan','data'=>$Qr_date_array);
        $Clickdate_array[]=array('name'=>'Clicks','data'=>$Click_date_array);
        $Impressiondate_array[]=array('name'=>'Impression','data'=>$Impression_date_array);
        
         $QRResult=json_encode(array('categories'=>$date_array,'series'=>$Qrdate_array));
         $ClicksResult=json_encode(array('categories'=>$date_array,'series'=>$Clickdate_array));
         $ImpressionResult=json_encode(array('categories'=>$date_array,'series'=>$Impressiondate_array));
         
     // echo $ClicksResult; exit;
        $this->viewData['boolDataTables'] = true;
        $this->viewData['title'] = lang("BUSINESS_MNG");
        $this->viewData['qrgraphData'] = $QRResult;
        $this->viewData['ImpressionData'] = $ImpressionResult;
        $this->viewData['ClickgraphData'] = $ClicksResult;
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"business", 'lists' => "graph");
        $this->viewData['module'] = "business/graph";
       
        $this->load->view('admin/template', $this->viewData);
    }
    public function Citygraph($cityID='',$business_id='')
    {
        $postArray = $this->input->post();
        if ($postArray['start_date'] != '' && $postArray['end_date']) {

            $startTimeStamp = strtotime($postArray['start_date']);
            $endTimeStamp = strtotime($postArray['end_date']);
            $timeDiff = abs($endTimeStamp - $startTimeStamp);
            $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
            $days = intval($numberDays);


        } else {
            $days = 15;
            $endTimeStamp = date('Y-m-d');

            //  pre($result);
//            $qrgraphData=$this->QRGraph(array('business_id'=>$business_id));
//            $ImpressionData=$this->ImpressionGraph(array('business_id'=>$business_id));
//            $ClickgraphData=$this->ClickGraph(array('business_id'=>$business_id));
        }
    }
     public function GraphData($business_id,$date,$type)
    {
         $clicks=$this->Business->GraphData($business_id,$date,$type);
         if($clicks==''){
             $clicks=0;
         }
         return $clicks;

    }
    public function  ImpressionGraph($postArray)
   {
            $postArray = $this->input->post();

            $getData=$this->Business->Graph($postArray,2);
            for($i=0;$i<count($getData);$i++){
                if($getData[$i]['business_id']==$postArray['business_id'] && $getData[$i]['type']==2){
                    $getData[$i]['clicks']=$getData[$i]['clicks'];
                }else{
                    $getData[$i]['clicks']=0;
                    $getData[$i]['business_id']=$postArray['business_id'];
                }
                unset($getData[$i]['business_id']);
                unset($getData[$i]['type']);
            }   
             return $getData;
           

    }
    public function  ClickGraph($postArray)
   {

       
            $postArray = $this->input->post();

            $getData=$this->Business->Graph($postArray,1);
            for($i=0;$i<count($getData);$i++){
                if($getData[$i]['business_id']==$postArray['business_id'] && $getData[$i]['type']==1){
                    $getData[$i]['clicks']=$getData[$i]['clicks'];
                }else{
                    $getData[$i]['clicks']=0;
                    $getData[$i]['business_id']=$postArray['business_id'];
                }
                unset($getData[$i]['business_id']);
                unset($getData[$i]['type']);
            }
             return $getData;


    }
  
    protected function business_rules() {
		$rules = array(
			array(
				'field' => 'name',
				'label' => $this->lang->language["NAME"],
				'rules' => 'trim|required|xss_clean|max_length[100]',
			),			
		);
		return $rules;
	}

    
    



}
