<?php
class Admin_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

    /*     * ***********************************************************************
     * *                    Check User Login
     * *********************************************************************** */

    function checkLogin($postData)
    {
      

        $this->db->from(TBL_USER);
        $this->db->where('email', $postData['email']);
        $this->db->where('password', $postData['password']);
        $this->db->where('active','1'); 
        $this->db->where('deleted','0'); 
        $this->db->where('user_type','a'); 
        $this->db->where_in('user_type', unserialize(ADMIN_USER_TYPE));
 
        // Query
        $query = $this->db->get();
        // Let's check if there are any results
        if ($query->num_rows()==1)
        {
           
            // If there is a user, then create session data

            $row = $query->row();

            // USER NOT EXISTS IN DATABASE
            if ($row != '')
            {
               
                $userdata = array(
                    'ADMINLOGIN' => TRUE,
                    'ADMINID' => $row->id,
                    'ADMINEMAIL' => $row->email,
                    'ADMINBALANCE' => $row->image     
                );


                // STORE SESSION
                $this->session->set_userdata($userdata);

                // LOGGEDIN COOKIE ARGUMENTS

                if ($this->input->post('chkRemember'))
                {
                    $cookie = array(
                        'name' => md5('loggedin'),
                        'value' => md5($row->email),
                        'expire' => '86500',
                        'secure' => TRUE
                    );
                    // SET LOOGEDIN COOKIE
                    set_cookie($cookie);
                }
                return true;
            }
        } else
        {
            return false;
        }
    }
    
    /*------- check Username ------- */
    
   
    /*     * ***********************************************************************
     * *					Check Cookie For Loggedin User
     * *********************************************************************** */
    
    
    
    
     function chk_cookie($postData)
    {

        $cookie = md5('loggedin');
        $test = get_cookie($cookie);

        if ($cookie_value = get_cookie($cookie))
        {
            $this->db->from(TBL_USER);
            $this->db->where('email', $postData['email']);
            $this->db->where('password', $postData['password']);
            $this->db->where('active','1'); 
            $this->db->where('deleted','0'); 
            $this->db->where_in('user_type', unserialize(ADMIN_USER_TYPE));
            $query = $this->db->get();

            // Let's check if there are any results

            if ($query->num_rows == 1)
            {
                // If there is a user, then create session data

                $row = $query->row();
              
                    $userdata = array(
                       'ADMINLOGIN' => TRUE,
                        'ADMINID' => $row->id,
                        'ADMINEMAIL' => $row->email,
                        'ADMINBALANCE' => $row->image     
                    );

                    // STORE SESSION
                    $this->session->set_userdata($userdata);
                    return true;
               
            }
            return false;
        }
    }

    /*     * ***********************************************
     *   
     *   GET ALL USER DATA
     * 
     * ********************************************** */

    function getAdminDataAll()
    {
        $this->db->from(TBL_USER);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return '';
    }

    /*     * ***********************************************
     *
     *   CHANGE USER STATUS
     *
     * ********************************************** */

    function changeAdminStatus($iAdminID)
    {

        $query = $this->db->query("UPDATE " . TBL_USER . " SET eStatus = IF (eStatus = 'Active', 'Inactive','Active') WHERE iUserID = $iAdminID");

        if ($this->db->affected_rows() > 0)
            return $query;
        else
            return '';
    }

    /*     * ***********************************************
     *
     *   DELETE USER ACCOUNT
     *
     * ********************************************** */

    function deleteAdminByID($iAdminID)
    {

        $query = $this->db->query("DELETE  FROM " . TBL_USER . " WHERE iUserID = $iAdminID");

        if ($this->db->affected_rows() > 0)
            return $query;
        else
            return '';
    }

    /*     * ***********************************************
     *
     *   GET USER DETAILS BY ID
     *
     * ********************************************** */

    function getAdminDataById($iAdminID)
    {
        $this->db->from(TBL_USER);
        $this->db->where("iUserID", $iAdminID);
        $result = $this->db->get();

        if ($result->num_rows() > 0)
            return $result->row_array();
        else
            return '';
    }

    /*     * ***********************************************
     *
     *   EDIT USER DATA
     *
     * ********************************************** */

    function editAdminByID($postData)
    {

        $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);

        $query = $this->db->update(TBL_USER, $postArray, array('iUserID ' => $postData['iUserID ']));

        if ($query)
            return true;
        else
            return $this->db->_error_message();
    }

    /*     * ***********************************************
     *
     *   CHECK EMAIL ADDRESS EXISTS OR NOT
     *
     * ********************************************** */

    function checkAdminEmailAvailable($vEmail, $iAdminID = '')
    {
        if (isset($iAdminID) && $iAdminID != '')
            $ucheck = array('vEmail' => $vEmail, 'iUserID  <>' => $iAdminID);
        else
            $check = array('vEmail' => $vEmail);

        $result = $this->db->get_where(TBL_USER, (isset($ucheck) && $ucheck != '') ? $ucheck : $check);

        if ($result->num_rows() >= 1)
            return 0;
        else
            return 1;
    }

    /*     * ***********************************************
     *
     *   GET SETTING DATA BY ID 
     *   SETTING ID MUST BE ALWAYS : 1
     *
     * ********************************************** */

    function getSettingDetailByID()
    {

        $query = $this->db->get_where(TBL_SETTING, array('iSettingId ' => '1'));

        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return '';
    }

    /*     * ***********************************************
     *
     *   EDIT SETTING
     *
     * ********************************************** */

    function editAdminSetting($postData)
    {

        $postArray = $this->general_model->getDatabseFields($postData, TBL_SETTING);
        //pre($postArray);
        $query = $this->db->update(TBL_SETTING, $postArray, array('iSettingID ' => $postData['iSettingID']));

        if ($this->db->affected_rows() >= 0)
            return true;
        else
            return $this->db->_error_message();
    }

    /*     * ***********************************************
     *
     *   GET ALL EMAIL TEMPLATES
     *
     * ********************************************** */

    function getEmailTemplateDataAll()
    {

        $result = $this->db->get(TBL_EMAIL_TEMPLATE);

        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return '';
    }

    /*     * ***********************************************
     *
     *   GET ALL EMAIL TEMPLATES BY ID
     *
     * ********************************************** */

    function getEmailTemplateDataById($iTemplateID)
    {

        $result = $this->db->get_where(TBL_EMAIL_TEMPLATE, array("iTemplateID" => $iTemplateID));

        if ($result->num_rows() > 0)
            return $result->row_array();
        else
            return '';
    }

    /*     * ***********************************************
     *
     *   CHANGE SESSION DATA/VALUE FUNCTION 
     *
     * ********************************************** */

    function changeSession($postData)
    {

        $query = $this->db->get_where(TBL_USER, $postData);

        if ($query->num_rows == 1)
        {

            // If there is a user, then create session data

            $row = $query->row();

            // USER NOT EXISTS IN DATABASE

            if ($row != '')
            {


                $userdata = array(
                    'ADMINLOGIN' => TRUE,
                    'ADMINID' => $row->iUserID,
                    'ADMINEMAIL' => $row->vEmail,
                      'ADMINUSERNAME' => $row->vLogin,
                    'ADMINUSERTYPE' => $row->eUserType
                );
                // STORE SESSION

                $this->session->set_userdata($userdata);

                // LOGGEDIN COOKIE ARGUMENTS

                return true;
            }
        }
    }

    /**
     * Function to check email template exists with template and language id
     * @param type $data array(iTemplateID, iLanguageID)
     * @return boolean
     * @author Doli
     */
    function chcekEmailTemplateByID($data)
    {
        $query = $this->db->get_where(TBL_EMAIL_TEMPLATE, array('iTemplateID' => $data['iTemplateID']));
        if ($query->num_rows > 0)
            return TRUE;
        else
            return FALSE;
    }

    /**
     * Function to update email template
     * @param type $data array to update data
     * @return boolean if update successfully or not
     * @author Doli
     */
    function editEmailTemplateByID($data)
    {
        $postArray = $this->general_model->getDatabseFields($data, TBL_EMAIL_TEMPLATE);
        $this->db->update(TBL_EMAIL_TEMPLATE, $postArray, array('iTemplateID ' => $data['iTemplateID']));

        if ($this->db->affected_rows() >= 0)
            return TRUE;
        else
            return FALSE;
    }

    /**
     * Function to delete email template
     * @param type $data array to delete data
     * @return boolean if delete successfully or not
     * @author Doli
     */
    function deleteEmailTemplateByID($data)
    {
        $this->db->delete(TBL_EMAIL_TEMPLATE, array('iTemplateID ' => $data['iTemplateID']));

        if ($this->db->affected_rows() >= 0)
            return TRUE;
        else
            return FALSE;
    }

    /**
     * Function to insert email template
     * @param type $data array to update data
     * @return boolean if inserted successfully or not
     * @author Doli
     */
    function addEmailTemplateByID($data)
    {
        $postArray = $this->general_model->getDatabseFields($data, TBL_EMAIL_TEMPLATE);
        $this->db->insert(TBL_EMAIL_TEMPLATE, $postArray);

        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function checkOldPassword($postData)
    {
        //$user_session_data = $this->session->userdata('ADMIN');
        $this->db->from(TBL_USER);
        $this->db->where('vEmail', $postData['vEmail']);
        $this->db->where('vPassword', $postData['vPassword']);
        $this->db->where('eStatus', 'Active');
        $this->db->where_in('eUserType', $this->session->userdata('ADMINUSERTYPE'));

        $query = $this->db->get();

        if ($query->num_rows() >= 1)
            return 1;

        return 0;
    }

    function changePassword($postData)
    {

        $postArray = $this->general_model->getDatabseFields($postData, TBL_USER);
        $query = $this->db->update(TBL_USER, $postArray, array('vEmail ' => $postData['vEmail']));

        if ($this->db->affected_rows() >= 0)
            return true;
        else
            return $this->db->_error_message();
    }

}

?>