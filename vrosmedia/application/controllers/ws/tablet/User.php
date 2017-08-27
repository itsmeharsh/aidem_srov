<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends Ws_Controller {
    private $model;
    public function __construct() {
        parent::__construct();
        $this->lang->load('users', $this->data['language']);
        parent::load_version_model('ws/tablet/User_model_' . $this->data['version'], 'user_model');
    }


    public function login() {
//pre($_POST);
        $user_info = NULL;
        $responseData=array();
        $this->form_validation->set_rules($this->driver_login_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        } else {
              $postArray = $this->input->post();
              if(isset($postArray['cityID']) && $postArray['cityID'] != ''){     
                 
                $exists = $this->user_model->get_single_user(array("texi_number" => $this->input->post('texi_no'),"city"=>$postArray['cityID'], "user_type"=>'d',"active"=>'1',"deleted"=>'0'));
              }else{
                 $exists = $this->user_model->get_single_user(array("texi_number" => $this->input->post('texi_no'), "user_type"=>'d',"active"=>'1',"deleted"=>'0')); 
              } 
              if (count($exists)) {
                if ($exists->active == 1) {
                    
                    $this->user_model->update_user(array('name'=>$postArray['name'],'deviceid'=>$postArray['deviceid'],'is_active_status'=>'Online'), $user_info->id);


                    $user_info= $this->getUserInfo($exists->id);

                    $responseData['code'] = 200;
                    $responseData['status'] = 'success';
                    $responseData['data']['userid']=$user_info->id;
                    $responseData['data']['texi_no']= $user_info->texi_number;
                    $responseData['data']['name']= $postArray['name'];
                    $responseData['data']['email']= $user_info->email;
                    $responseData['data']['phone']= $user_info->phone;
                    $responseData['data']['address']= $user_info->address;
                    $responseData['data']['texiphone']= $user_info->texi_phone;
                    $responseData['data']['texiclass']= $this->user_model->GetTaxiClassName(array('id'=>$user_info->texi_class_id,'active'=>1,'deleted'=>0))->name;
                    $responseData['data']['texicompany']= $this->user_model->GetTaxiCompanyName(array('id'=>$user_info->texi_company_id,'active'=>1,'deleted'=>0))->name;
                    $responseData['data']['companyphone']= $user_info->texi_phone;
                    $responseData['data']['selected_category']= $user_info->categories;
                    $responseData['data']['image'] = $user_info->image;



                } else {
                    $responseData['code'] = 401;
                    $responseData['status'] = 'error';
                    $responseData['message'] ='Driver is Inactive';
                }
            } else {
                $responseData['code'] = 401;
                $responseData['status'] = 'error';
                $responseData['message'] = 'Invalid credential!!';
            }
        }

        je_mobile($responseData);

    }
    public function get_profile_data() {

        $user_info = NULL;
        $responseData=array();
        $this->form_validation->set_rules($this->get_profile_data_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message']= $this->lang->language["err_req_values"];


        } else {
                    $postArray = $this->input->post();

                    $user_info= $this->getUserInfo($postArray['userid']);

                    $responseData['code'] = 200;
                    $responseData['status'] = 'success';
                    $responseData['data']['userid']=$user_info->id;
                    $responseData['data']['texi_no']= $user_info->texi_number;
                    $responseData['data']['name']= $user_info->name;
                    $responseData['data']['email']= $user_info->email;
                    $responseData['data']['phone']= $user_info->phone;
                    $responseData['data']['address']= $user_info->address;
                    $responseData['data']['texiphone']= $user_info->texi_phone;
                    $responseData['data']['texiclass']= $this->user_model->GetTaxiClassName(array('id'=>$user_info->texi_class_id,'active'=>1,'deleted'=>0))->name;
                    $responseData['data']['texicompany']= $this->user_model->GetTaxiCompanyName(array('id'=>$user_info->texi_company_id,'active'=>1,'deleted'=>0))->name;
                    $responseData['data']['companyphone']= $user_info->texi_phone;
                    $responseData['data']['selected_category']= $user_info->categories;
                    $responseData['data']['image'] = $user_info->image;



        }

        je_mobile($responseData);

    }
    public function update_profile_data()
    {
        $user_info = NULL;
        $responseData = array();
        $this->form_validation->set_rules($this->update_profile_data_rules());
        if ($this->form_validation->run() == FALSE) {

            $responseData['code'] = 400;
            $responseData['status'] = 'error';
            $responseData['message'] = $this->lang->language["err_req_values"];


        } else {
            $postArray = $this->input->post();
            if($postArray['userid']!=''){
                $id=$postArray['userid'];
                unset($postArray['userid']);
            }
            $postArray['texi_phone']=$postArray['texiphone'];
            unset($postArray['texiphone']);
            $this->user_model->update_user($postArray, $id);
            $user_info = $this->user_model->get_single_user(array("id" =>$id,"deleted"=>'0',"user_type"=>'d'));
            if($_FILES){

                $file_upload = parent::saveFile('image', 'uploads/user/' . $id . '/');

                if ($file_upload['file_name'] != "") {

                    $postArray = array();
                    $postArray['image'] = 'uploads/user/' .$id. '/' . $file_upload['file_name'];
                    $this->user_model->update_user($postArray, $id);

                    $user_info->image=USER_IMG.$id . '/' . $file_upload['file_name'];

                }else{
                    $user_info->image=DOMAIN_URL.$user_info->image;
                }
            }else{
                $user_info->image=DOMAIN_URL.$user_info->image;
            }

            $responseData['code'] = 200;
            $responseData['status'] = 'success';
            $responseData['data']['userid']=$user_info->id;
            $responseData['data']['texi_no']= $user_info->texi_number;
            $responseData['data']['name']= $user_info->name;
            $responseData['data']['email']= $user_info->email;
            $responseData['data']['phone']= $user_info->phone;
            $responseData['data']['address']= $user_info->address;
            $responseData['data']['texiphone']= $user_info->texi_phone;
            $responseData['data']['texiclass']= $this->user_model->GetTaxiClassName(array('id'=>$user_info->texi_class_id,'active'=>1,'deleted'=>0))->name;
            $responseData['data']['texicompany']= $this->user_model->GetTaxiCompanyName(array('id'=>$user_info->texi_company_id,'active'=>1,'deleted'=>0))->name;
            $responseData['data']['companyphone']= $user_info->texi_phone;
            $responseData['data']['image'] = $user_info->image;

        }
        je_mobile($responseData);
    }
     private function getUserInfo($iUserId = 0) {
        $user_info = $this->user_model->get_single_user(array('id' => $iUserId, 'active' => '1',"deleted"=>'0'));

        if (!is_null($user_info->image)) {

            if(preg_match("/uploads/i", $user_info->image)){
                $user_info->image=DOMAIN_URL.'/'.$user_info->image;
            }
        }else{
            unset($user_info->image);
        }
        return $user_info;
    }

    protected function driver_login_rules() {
        $rules = array(
            array(
                'field' => 'texi_no',
                'label' => 'texi_no',
                'rules' => 'trim|required|max_length[255]xss_clean',
            ),
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'trim|required|max_length[40]|xss_clean',
            ),
            array(
                'field' => 'deviceid',
                'label' => 'deviceid',
                'rules' => 'trim|required|xss_clean',
            ),
        );
        return $rules;
    }
    protected function get_profile_data_rules() {
        $rules = array(
            array(
                'field' => 'userid',
                'label' => 'userid',
                'rules' => 'trim|required|max_length[255]xss_clean',
            )
        );
        return $rules;
    }
    protected function update_profile_data_rules() {
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
