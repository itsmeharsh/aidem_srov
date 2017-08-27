<?php
class User extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('User_model','User');

    }

   function index()
    {
        $this->viewData['title'] = lang("USER_MNG");          
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'user' => "user type selection");
        $this->viewData['module'] = "users/userType";
        $this->load->view('admin/template', $this->viewData);
    }
    function add($userType='',$iUserID='')
    {  
       if($iUserID != ''){
            $this->viewData['action'] = lang('EDIT');
            $this->User->_table=TBL_USER;            
            $this->User->_where = array("id" => $iUserID);
            $this->viewData['Userdata'] = $this->User->getRecordsByID();
        }
          // pre($this->viewData['Userdata']); 
   
       
         $this->User->_where="";
         $this->User->_fields ="";
         $this->User->_table="";
         $this->User->_fields ="*";
         $this->User->_table=TBL_CITY;    
         $this->User->_where = array("deleted" =>'0');
         $this->viewData['CityData'] = $this->User->getData();
       
     
        if($userType=='d'){
            $this->viewData['action'] = lang('EDIT');
            $this->User->_table=TBL_TAXI_COMPANY;            
            $this->User->_where = array('deleted'=>0,'active'=>1);
            $this->viewData['CompanyData'] = $this->User->get_many_by();
            
            $this->viewData['action'] = lang('EDIT');
            $this->User->_table=TBL_TAXI_CLASS;            
            $this->User->_where = array('deleted'=>0,'active'=>1);
            $this->viewData['ClassData'] = $this->User->get_many_by();
        }
    
        $FormData=$this->User->getFormData($userType);      
        
        $this->viewData['title'] = lang("USER_MNG");     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'user' => "user type selection");
        $this->viewData['FormData'] = $FormData;
        $this->viewData['user_type'] = $userType;
        $this->load->view('admin/users/add', $this->viewData);
       
    }
    function Adminlists($userType=''){       
        
        $this->User->_fields ="id,name,email,image,phone,work_email,work_phone,address,u_date,active,is_active_status";
        $this->User->_where = array("deleted" =>'0','email!='=>NULL,'user_type'=>$userType);
        $UserData = $this->User->getUserData();

        $this->viewData['userData'] = $UserData; 
        $this->viewData['boolDataTables'] = true;
        $this->viewData['UserType'] = $userType;
        $this->viewData['title'] = lang("USER_MNG");     
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home",'user'=> "user type selection", 'user/Adminlists/'.$userType.'' => "user");
        $this->viewData['module'] = "users/list";
        $this->load->view('admin/template', $this->viewData);
    }
    function detailView($userType='',$iUserID='')
    {
     
        $today=date('Y-m-d');
        if($iUserID != ''){
            $this->viewData['action'] ='Detail';
            $this->User->_table=TBL_USER;
            $this->User->_where = array("id" => $iUserID);
            $this->viewData['Userdata'] = $this->User->getRecordsByID();
        }
       
         
        if($this->viewData['Userdata']['image']!=''){
            if(preg_match("/uploads/i", $this->viewData['Userdata']['image'])){
                $this->viewData['Userdata']['image']=DOMAIN_URL.'/'.$this->viewData['Userdata']['image'];
            }
        }
        if($userType=='d'){
           $this->viewData['module'] = "users/detailViewDriver";        
          //get taxi class
            $this->viewData['action'] ='Detail';
            $this->User->_table=TBL_TAXI_CLASS;
            $this->User->_where = array("id" => $this->viewData['Userdata']['texi_class_id']);
            $this->viewData['Userdata']['taxi_class'] = $this->User->getRecordsByID();
            
          //get taxi company
            $this->viewData['action'] ='Detail';
            $this->User->_table=TBL_TAXI_COMPANY;
            $this->User->_where = array("id" => $this->viewData['Userdata']['texi_company_id']);
            $this->viewData['Userdata']['taxi_company'] = $this->User->getRecordsByID();  
            
            //get city
             $this->User->_table=TBL_CITY;
            $this->User->_where = array("id" => $this->viewData['Userdata']['city']);
            $this->viewData['Userdata']['CityName'] = $this->User->getRecordsByID();
            
        
        }else{  
                //My business Count
                $this->viewData['Userdata']['my_business_count']= $this->User->CountRecords($iUserID,TBL_BUSINESS);
                //My event Count
                $this->viewData['Userdata']['my_event_count']= $this->User->CountRecords($iUserID,TBL_EVENT);

                 //My offer Count
                $this->viewData['Userdata']['my_offer_count']= $this->User->CountRecords($iUserID,TBL_OFFERS);

                 //My Advertisment Count
                $this->viewData['Userdata']['my_ads_count']= $this->User->CountRecords($iUserID,TBL_ADVERTISMENT);

                $this->viewData['BusinessData']=$this->User->getMyBusinessData(array('user_id'=>$iUserID,'Limit'=>6));

                $offersData=$this->User->getMyOffersData(array('user_id'=>$iUserID,'Limit'=>6));
                for($i=0;$i<=count($offersData)-1;$i++){

                  // check payment validation
                    $startTimeStamp = strtotime($offersData[$i]['payment_date']);
                    $endTimeStamp = strtotime($today);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                    $numberDays = intval($numberDays);


                    if($offersData[$i]['duration']<$numberDays){
                       $offersData[$i]['is_active']=0;
                    }else{
                       $offersData[$i]['is_active']=1; 
                    } 

                   //check end date
                    if( $offersData[$i]['is_active']==1){
                        if($offersData[$i]['end_time']<$today){
                          $offersData[$i]['is_active']=0;
                       }else{
                          $offersData[$i]['is_active']=1; 
                       }
                    }


                }   
                 $this->viewData['offersData']=$offersData;
                 
        $this->viewData['module'] = "users/detailView";
       }
       
     //   pre($this->viewData['Userdata']);

        $FormData=$this->User->getFormData($userType);

        $this->viewData['title'] = lang("USER_MNG");
        $this->viewData['arrBradcrumb'] = array("dashboard"=>"home", 'user' => "user Detail View");
        $this->viewData['FormData'] = $FormData;
        $this->load->view('admin/template', $this->viewData);


    }
      public function save($iUserID = null) {
            
                $postData = $this->input->post(); 
                if($postData['user_type']=='u'){
                    $userType="Application User";
                }else if($postData['user_type']=='d'){
                    $userType="Driver";
                }else if($postData['user_type']=='a'){
                    $userType="Administrator";
                }
		$this->form_validation->set_rules($this->user_rules($this->input->post('email')));
		if ($this->form_validation->run() == FALSE) {                    
			
                    $err = array(
                    '0' => $this->lang->line('BLANK_VALUE'),
                    );
            
                    $this->session->set_userdata('ERROR', $err);

		} else {
                     
                     if ($this->User->checkUserEmailAvailable($this->input->post('vEmail'),$iUserID)) {
                                                
                                     //print_r($postData);exit;
                                 
                                if (!empty($postData['password'])){
                                    $postData['password'] = md5($postData['password']);
                                }else{
                                    unset($postData['password']);
                                }
                                if(isset($iUserID)==''){
                                    $postData['is_active_status']='Offline';
                                }    
                                
                               // pre($postData);
                               $ID = $this->User->insertRow($postData, 'id', $iUserID);
                               $file_upload = parent::saveFile('image', 'uploads/user/' . $ID . '/');
                                          
                                           if ($file_upload['file_name'] != "") {
                                                            $postArray = array();
                                                            $postArray['image'] = 'uploads/user/' . $ID . '/' . $file_upload['file_name'];                                                
                                                            $this->User->update_user($postArray, $ID);                                                         
                                                            
                                                           
                                                } 
                                                
                             if ($ID != '' && $iUserID == '') {
                                     $err = array(
                                                '0' => $userType.' '.$this->lang->line('ADDED'),
                                              );
            
                                      $this->session->set_userdata('SUCCESS', $err);

                               } else if($ID != '' && $iUserID != '') {
                                     $err = array(
                                                '0' => $userType.' '.$this->lang->line('EDITED'),
                                              );
            
                                      $this->session->set_userdata('SUCCESS', $err);

                               } else {
                                      $err = array(
                                               '0' => $this->lang->line('SOMETHINGS_WENT_WRONG'),
                                              );
            
                                      $this->session->set_userdata('ERROR', $err);
                               }
                    } else {
                         $err = array(
                                                '0' => $userType.' '.$this->lang->line('EXITS'),
                                     );
            
                                      $this->session->set_userdata('ERROR', $err);      
                    }
        
	}
       
        redirect("admin/user/Adminlists/".$postData['user_type']);
      }
    function status($iUserID = '')
    {

        if ($iUserID != '')
        {
            $changeStatus = $this->User->changeStatus('id', $iUserID);
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
     function remove($iUserID = '')
    {
        if (isset($iUserID) && $iUserID > 0)
        {

            $DELETE = $this->User->changeDeleted('id', $iUserID, '');
            if ($DELETE)
            {
                $data['result'] = 'success';
                $data['message'] = 'User deleted successfully.';
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
            $data['message'] = 'No such record found or User is deleted.';
            echo json_encode($data);
            exit;
        }
    }
    protected function user_rules($email, $iUserId = 0) {
		$rules = array(
			
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required|xss_clean|max_length[100]',
			),
			array(
				'field' => 'email',
				'label' => $this->lang->language["user_email"],
				'rules' => 'trim|required|max_length[255]|valid_email|xss_clean',
			),
			array(
				'field' => 'phone',
				'label' => 'phone',
				'rules' => 'trim|required|min_length[9]|max_length[14]|xss_clean',
			),
		);
		return $rules;
	}

    
    



}
