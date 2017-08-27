<?php
class General_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->db->query("SET time_zone = '+0:00'");
    }

    public function safe_b64encode($string) {

        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    function getFrontMessages() {
        if ($this->session->userdata('ERROR') && count($this->session->userdata('ERROR')) > 0)
            return $this->load->view('messages/error_view');
        else if ($this->session->userdata('SUCCESS') && count($this->session->userdata('SUCCESS')) > 0)
            return $this->load->view('messages/success_view');
    }

    function getAdminMessages() {
        
        if ($this->session->userdata('ERROR') && count($this->session->userdata('ERROR')) > 0)
            return $this->load->view('admin/messages/error_view');
        else if ($this->session->userdata('SUCCESS') && count($this->session->userdata('SUCCESS')) > 0)            
            return $this->load->view('admin/messages/success_view');
    }
    //changes
    
    //end changes
    function getCountries() {
        $this->db->from(TBL_COUNTRY);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return "";
    }

    function getLanguageList() {
        $this->db->select('iLanguageID,vLanguageName');
        $this->db->from(TBL_LANGUAGE);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $list = $query->result();
            $newArray = array("" => $this->lang->line("SELECT_LANGUAGE"));
            foreach ($list as $key => $value) {
                $newArray[$value->iLanguageID] = $value->vLanguageName;
            }
            return $newArray;
        }
        return 0;
    }

    function getCountryList() {
        $this->db->select('iCountryID', 'vCountryName');
        $this->db->from(TBL_COUNTRY);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return "";
    }

    function searchKeyWord($postData) {

        $this->db->select(TBL_USER . '.iUSerID,vFirstname,vLastname,vCompany,tLinkedinurl,' . TBL_USER . '.vImage,' . TBL_USER . '.vImageBase64,vEmail,vJobtitle ,' . TBL_LANGUAGE . '.vLanguageName,' . TBL_LANGUAGE . '.vLanguageCode,' . TBL_COUNTRY . '.vCountryName,' . TBL_COUNTRY . '.cCountryCode');
        $this->db->from(TBL_USER);
        $this->db->join(TBL_LANGUAGE, TBL_USER . '.iLanguageID = ' . TBL_LANGUAGE . '.iLanguageID', 'LEFT');
        $this->db->join(TBL_COUNTRY, TBL_USER . '.iCountryID = ' . TBL_COUNTRY . '.iCountryID', 'LEFT');
        $this->db->where(TBL_USER . '.eStatus', "Active");
        $this->db->where(TBL_USER . '.eUserType', "User");
//        $this->db->where(TBL_USE.'.'.$postData['search_terms'],$postData['contact_key_word']);
        $this->db->like(TBL_USER . '.' . $postData['search_terms'], strtolower($postData['contact_key_word']), 'both');
        //LOWER(vField)
        $query = $this->db->get();

        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    function isSuperAdmin() {
        $user_session_data = $this->session->userdata('ADMIN');
        if (isset($user_session_data['ADMINUSERTYPE']) && $user_session_data['ADMINUSERTYPE'] == 'Super')
            return 1;
        return 0;
    }

    function noRecordsHere() {
        return '<div class="alert no-records">[MESSAGE]</div>';
    }

    function getDatabseFields($postData, $tableName) {
        $table_fields = $this->getFields($tableName);

        $final = array_intersect_key($postData, $table_fields);

        return $final;
    }

    public function getFields($tableName) {

        $query = $this->db->query("SHOW COLUMNS FROM " . $tableName);

        foreach ($query->result() as $row)
            $table_fields[$row->Field] = $row->Field;

        return $table_fields;
    }

     public function getEmailTemplate($iTemplateID) {

        $query = $this->db->get_where(TBL_EMAIL_TEMPLATE, array("iTemplateID" => $iTemplateID));

        if ($query->num_rows() > 0)
            return $query->row();
        else
            return '';
    }

    function getDBDateTime() {

        $result = $this->db->query("SELECT now() as dt");

        if ($result->num_rows() > 0) {
            $row = $result->row_array();
            return $row['dt'];
        } else
            return '';
    }

    function sanitize($input_array, $messages, $rule = '') {
        $message = array();
        foreach ($input_array as $key => $value) {

            $input_array[$key] = $value;
            if (empty($input_array[$key])) {
                if (isset($messages[$key])) {
                    $message[$key] = $messages[$key];
                    unset($input_array[$key]);
                }
            }
            if (!empty($input_array[$key])) {
                if (isset($rule[$key])) {
                    if (!preg_match($rule[$key], $input_array[$key])) {
                        $message[$key] = $messages[$key];
                        unset($input_array[$key]);
                    }
                }
            }
        }

        return array('message' => $message);
    }

    function checkbox_sanitize($input_array, $messages, $rule = '') {
        $message = array();
        foreach ($messages as $key => $value) {
            if (!in_array($key, array_keys($input_array))) {
                $message[$key] = $messages[$key];
            }
        }
        return array('message' => $message);
    }

    /* TO FETCH ALL BUSINESS TYPE FROM DATABASE TO FILL OPTIONS TO DROP DOWN */

    public function getAllProContactTypeOptions() {
        $possibleValues = enum_possible_values(TBL_PROFESSIONAL_CONTACT, 'eMembership');

        if (count($possibleValues))
            return $possibleValues;
        else
            return array();
    }

    /* TO TRUNCATE LONG STRING */

    function TruncateStr($string, $length = 80, $etc = '...', $breakWords = false) {
        if ($length == 0)
            return '';

        if (strlen($string) > $length) {
            $length -= strlen($etc);
            $fragment = substr($string, 0, $length + 1);
            if ($breakWords)
                $fragment = substr($fragment, 0, -1);
            else
                $fragment = preg_replace('/\s+(\S+)?$/', '', $fragment);
            return $fragment . " " . $etc;
        } else
            return $string;
    }

    public function getAllNewsCategoryOptions() {
        $this->db->select('iNewsCategoryID, vCategory');
        $this->db->from(TBL_NEWS_CATEGORY);
        $this->db->where('eDelete', '0');
        $this->db->where('eStatus', 'Active');


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();

            foreach ($result as $row)
                $arr[$row->iNewsCategoryID] = $row->vCategory;

            return $arr;
        } else
            return '';
    }

    public function getAllMagazineCategoryOptions() {
        $this->db->select('iNewsCategoryID, vCategory');
        $this->db->from(TBL_NEWS_CATEGORY);
        $this->db->where('eDelete', '0');
        $this->db->where('eStatus', 'Active');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();

            foreach ($result as $row)
                $arr[$row->vCategory] = $row->vCategory;

            return $arr;
        } else
            return array();
    }

    function getLatLong($Address) {

        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . str_replace(' ', '+', $Address) . '&sensor=false');

        $output = json_decode($geocode);

        if (strtolower($output->status) == strtolower("OK"))
            return $output;
        else
            return FALSE;
    }

    function time_difference($time_1, $time_2) {

        $val_1 = new DateTime($time_1);
        $val_2 = new DateTime($time_2);

        $interval = $val_1->diff($val_2);
        $year = $interval->y;
        $month = $interval->m;
        $day = $interval->d;
        $hour = $interval->h;
        $minute = $interval->i;
        $second = $interval->s;

        $output = '';

        if ($year > 0) {
            if ($year > 1) {
                $output .= $year . " years ";
            } else {
                $output .= $year . " year ";
            }
        }

        if ($month > 0) {
            if ($month > 1) {
                $output .= $month . " months ";
            } else {
                $output .= $month . " month ";
            }
        }

        if ($day > 0) {
            if ($day > 1) {
                $output .= $day . " days ";
            } else {
                $output .= $day . " day ";
            }
        }

        if ($hour > 0) {
            if ($hour > 1) {
                $output .= $hour . " hours ";
            } else {
                $output .= $hour . " hour ";
            }
        }

        if ($minute > 0) {
            if ($minute > 1) {
                $output .= $minute . " minutes ";
            } else {
                $output .= $minute . " minute ";
            }
        }

        if ($second > 0) {
            if ($second > 1) {
                $output .= $second . " seconds";
            } else {
                $output .= $second . " second";
            }
        }

        return $output;
    }

    function format_size($size) {
        $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        if ($size == 0) {
            return('n/a');
        } else {
            return (round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
        }
    }

    function uk_date_to_mysql_date($date) {
        $date_year = substr($date, 6, 4);
        $date_month = substr($date, 3, 2);
        $date_day = substr($date, 0, 2);
        $date = date("Y-m-d", mktime(0, 0, 0, $date_month, $date_day, $date_year));
        return $date;
    }

    function uk_date_to_mysql_date_search($date) {
        $date_year = substr($date, 3, 4);
        $date_month = substr($date, 0, 2);
        $date = date("Y-m", mktime(0, 0, 0, $date_month, "01", $date_year));
        return $date;
    }

    function datediffInWeeks($date1, $date2) {
        $diff = strtotime($date2, 0) - strtotime($date1, 0);
        return floor($diff / 604800);
    }

    function monthDiff($date1, $date2) {
        $date1 = date(strtotime($date1));
        $date2 = date(strtotime($date2));

        $difference = $date2 - $date1;
        $months = floor($difference / 86400 / 30);

        return $months;
    }

    /**
      Note: form provide these parameters:
      $start_date
      $new_interval
      $new_frequency
      $end_date  //if no end_date use start date
      $time_block //each time block is 10 or 15 min, this indicates the number of blocks 1 to 10


      Note: determine settings manually or use database stored configuration
      $double_book == "Y"; //event double booking
      $repeat == "no";//if no end_date use start date and repeat is no else repeat is yes
     * */
    /*     * *****Note:
      - array repeatEvent(int $startTime, str $interval, int $frequency, int $endTime)
      returns array of UNIX times
      - $startTime and $endTime must be valid UNIX time integer values
      - $interval must be (case-insensitive): 'day', 'week', 'month', or 'year'
      - $frequency must be positive integer (1 = every, 2, = every other, 3 = every 3rd, 4 = every 4th. 5 = every 5th, 6 = every 6th)
     * ******* */

    function repeatEvent($startTime, $interval, $frequency, $endTime) {
        //make sure all paramters are valid
        $startTime = (int) $startTime;
        $endTime = (int) $endTime;

        if ($startTime == 0) {
            user_error("repeatEvent(): invalid start time");
            return(FALSE);
        }

        if ($endTime < $startTime) {
            user_error("repeatEvent(): invalid end time");
        }

        $interval = strtolower(trim($interval));
        if (!in_array($interval, array('day', 'week', 'month', 'year'))) {
            user_error("repeatEvent(): Invalid interval '$interval'");
            return(FALSE);
        }

        $frequency = (int) $frequency;
        if ($frequency < 1) {
            user_error("repeatEvent(): Invalid frequency '$frequency'");
            return(FALSE);
        }

        $schedule = array();
        for ($time = $startTime; $time <= $endTime; $time = strtotime("+$frequency $interval", $time)) {
            $schedule[] = date("Y-m-d", $time);
        }
        return(end($schedule));
    }

    /**
      Note: form provide these parameters:
      $start_date
      $new_interval
      $new_frequency
      $end_date  //if no end_date use start date
      $time_block //each time block is 10 or 15 min, this indicates the number of blocks 1 to 10


      Note: determine settings manually or use database stored configuration
      $double_book == "Y"; //event double booking
      $repeat == "no";//if no end_date use start date and repeat is no else repeat is yes
     * */
    /*     * *****Note:
      - array repeatEvent(int $startTime, str $interval, int $frequency, int $endTime)
      returns array of UNIX times
      - $startTime and $endTime must be valid UNIX time integer values
      - $interval must be (case-insensitive): 'day', 'week', 'month', or 'year'
      - $frequency must be positive integer (1 = every, 2, = every other, 3 = every 3rd, 4 = every 4th. 5 = every 5th, 6 = every 6th)
     * ******* */

    function recursiveEvent($startTime, $interval, $frequency, $endTime) {
        //make sure all paramters are valid
        $startTime = (int) $startTime;
        $endTime = (int) $endTime;

        if ($startTime == 0) {
            user_error("repeatEvent(): invalid start time");
            return(FALSE);
        }

        if ($endTime < $startTime) {
            user_error("repeatEvent(): invalid end time");
        }

        $interval = strtolower(trim($interval));
        if (!in_array($interval, array('day', 'week', 'month', 'year'))) {
            user_error("repeatEvent(): Invalid interval '$interval'");
            return(FALSE);
        }

        $frequency = (int) $frequency;
        if ($frequency < 1) {
            user_error("repeatEvent(): Invalid frequency '$frequency'");
            return(FALSE);
        }

        $schedule = array();
        for ($time = $startTime; $time <= $endTime; $time = strtotime("+$frequency $interval", $time)) {
            $schedule[] = date("Y-m-d", $time);
        }
        return($schedule);
    }

    function getDBDateTimeByTimeZone($DateTime, $TimeZone) {

        $result = $this->db->query("SELECT CONVERT_TZ('" . $DateTime . "','" . $TimeZone . "',@@session.time_zone) as dt");

        if ($result->num_rows() > 0) {
            $row = $result->row_array();
            return $row['dt'];
        } else
            return '';
    }

    /* TO FETCH ALL USER TYPE FROM DATABASE TO FILL OPTIONS TO DROP DOWN */

    public function getAllUserTypeOptions() {
        $possibleValues = enum_possible_values(TBL_USER, 'eUserType');

        if (count($possibleValues))
            return $possibleValues;
        else
            return array();
    }

    function access_features($iFeatureListID) {
        if (!empty($this->session->userdata['FRONT']['USERID'])) {
            $this->load->model("app_exchange_model");
            $access = $this->app_exchange_model->CheckFeatureByID($this->session->userdata['FRONT']['USERID'], $iFeatureListID);
            return $access;
        }
    }

    function checkPaymentExists() {
        if (!empty($this->session->userdata['FRONT']['USERID'])) {
            $this->load->model("payment_model");
            $CheckExists = $this->payment_model->getAllPaymentLogByID($this->session->userdata['FRONT']['USERID']);
            return $CheckExists;
        }
    }

    public function getAllRegTypeOptions() {
        $possibleValues = enum_possible_values(TBL_USER, 'eRegistrationType');

        if (count($possibleValues))
            return $possibleValues;
        else
            return array();
    }

    function getInviteLanguageList() {
        $this->db->select('iLanguageID,vLanguageName,vLanguageLabel');
        $this->db->from(TBL_LANGUAGE);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $list = $query->result();
            $newArray = array("" => $this->lang->line("SELECT_LANGUAGE"));
            foreach ($list as $key => $value) {
                $newArray[$value->iLanguageID] = $this->lang->line($value->vLanguageLabel);
            }
            return $newArray;
        }
        return 0;
    }

}

?>