<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class MY_Controller extends CI_Controller {
/*
| -----------------------------------------------------
| PROJECT: 	            Basic code igniter structure
| -----------------------------------------------------
| DEVELOPER CODE:		1272
| -----------------------------------------------------
 */
	public $data = array();

	public function __construct() {

		parent::__construct();
		$this->data['errors'] = array();
		$this->data['language'] = 'english';
		$this->load->model("setting_module");
		$this->data["site_setting"] = $this->setting_module->set_setting();
		$this->lang->load('messages', $this->data['language']);

	}

	/*public function generateEmailTemplate($sys_flag, $key = array(), $val = array()) {
		$content = array();
		$content['vFromEmail'] = $this->data["site_setting"]['ADMIN_EMAIL'];
		$content['vFromName'] = $this->data["site_setting"]['SITENAME'];
		$content['vMessage'] = "";
		$content['vSubject'] = "";
		$content['vEmailType'] = 'from';
		$content['vCC'] = array();
		$content['vBCC'] = array();

		$query = $this->db->select()->where('vSysFlag', $sys_flag)->get('mst_email_templates');
		if ($query->num_rows() > 0) {
			$r = $query->row_array();
			$footertext = str_replace('{{YEAR}}', date('Y'), $this->data["site_setting"]['FOOTER_TEXT']);
			$sitelogo = base_url(SITE_IMG . $this->data["site_setting"]['SITE_LOGO']);
			$key = array_merge(array('{{SITENAME}}', '{{SITE_URL}}', '{{FOOTER_TEXT}}', '{{SITE_LOGO}}', '{{SITE_IMG}}'), $key);
			$val = array_merge(array($this->data["site_setting"]['SITENAME'], base_url(), $footertext, $sitelogo, base_url() . SITE_IMG), $val);

			$message = trim(stripslashes($r["vTemplate"]));
			$subject = trim(stripslashes($r["vSubject"]));
			$subject = str_replace('{{SITENAME}}', $this->data["site_setting"]['SITENAME'], $subject);
			$message = str_replace($key, $val, $message);
			$content['vMessage'] = $message;
			$content['vSubject'] = $subject;
			$content['vFromEmail'] = $r["vFromEmail"] != "" ? $r["vFromEmail"] : $this->data["site_setting"]['ADMIN_EMAIL'];
			$content['vFromName'] = $r["vFromName"] != "" ? $r["vFromName"] : $this->data["site_setting"]['SITENAME'];
			$content['eEmailType'] = $r["eEmailType"] != "" ? $r["eEmailType"] : 'from';
			$content['vCC'] = $r["vCC"] != "" ? explode(",", $r['vCC']) : array();
			$content['vBCC'] = $r["vBCC"] != "" ? explode(",", $r['vBCC']) : array();

		}
		return $content;
	}*/

/*	public function sendEmail($data = array()) {

		$to = isset($data['to']) ? (is_array($data['to']) ? $data['to'] : (array) $data['to']) : array();
		$cc = isset($data['cc']) ? (is_array($data['cc']) ? $data['cc'] : (array) $data['cc']) : array();
		$bcc = isset($data['bcc']) ? (is_array($data['bcc']) ? $data['bcc'] : (array) $data['bcc']) : array();

		$vFromEmail = isset($data['vFromEmail']) ? $data['vFromEmail'] : "";
		$vFromName = isset($data['vFromName']) ? $data['vFromName'] : "";
		$vSubject = isset($data['vSubject']) ? $data['vSubject'] : "";
		$vMessage = isset($data['vMessage']) ? $data['vMessage'] : "";

		$this->load->library('email');

		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "chetan.yadav@yudiz.com";
		$config['smtp_pass'] = "yudiz108";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";

		$this->email->initialize($config);

		$this->email->set_mailtype("html");
		$this->email->from($vFromEmail, $vFromName);
		$this->email->to($to);
		$this->email->cc($cc);
		$this->email->bcc($bcc);

		$this->email->reply_to($vFromEmail, $vFromName);
		$this->email->subject($vSubject);
		$this->email->message($vMessage);

		if ($this->email->send()) {
			return true;
		} else {
			return false;
			//show_error($CI->email->print_debugger());
		}

	}*/
	public function generateEmailTemplate($templateData,$vSubject) {
		$content = array();
		$content['vFromEmail'] = $this->data["site_setting"]['ADMIN_EMAIL'];
		$content['vFromName'] = $this->data["site_setting"]['SITENAME'];
		$content['vMessage'] = "";
		$content['vSubject'] = "";
		$content['vEmailType'] = 'from';
		$content['vCC'] = array();
		$content['vBCC'] = array();

		$message = trim(stripslashes($templateData));
		$subject = trim(stripslashes($vSubject));
		$content['vMessage'] = $message;
		$content['vSubject'] = $subject;

		return $content;
	}
	public function sendEmail($data = array()) {
		//	error_reporting(E_ALL ^ E_NOTICE);
		$to = isset($data['to']) ? (is_array($data['to']) ? $data['to'] : (array) $data['to']) : array();

		$vSubject = isset($data['vSubject']) ? $data['vSubject'] : "";
		$vMessage = isset($data['vMessage']) ? $data['vMessage'] : "";
//pre($to);
		$data=array(
			'to'=>$to[0],
			'subject'=>$vSubject,
			'message'=>$vMessage,
			'from'=>'VROSMedia'
		);
		$url='http://backlash.blue/app/backlash/mail/layouts/testing.php';
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );

		$result = curl_exec ( $ch );
		//echo $result; exit;
		curl_close ( $ch );
		return true;


	}


	public function saveFile($tag_name = 'userfile', $path = SITE_UPD, $config = array()) {
                
		$content = array('file_name' => "", 'errors' => "");
		if (isset($_FILES[$tag_name]['name']) && $_FILES[$tag_name]['name'] != "") {
			$this->load->library('upload');
			$this->load->library('image_lib');
			$path = FCPATH . $path;
			if (!file_exists($path)) {
				@mkdir($path);
			}
			$file_config = array();
			$file_config['upload_path'] = $path;
			$file_config['allowed_types'] = 'jpg|png|jpeg|gif';
			$file_config['overwrite'] = TRUE;
			$file_config['max_size'] = '2048';
			$file_config['file_name'] = md5(time() . rand());
			$file_config = array_replace($file_config, $config);

			$this->upload->initialize($file_config);

			if ($this->upload->do_upload($tag_name)) {
				$upload_data = $this->upload->data();
				$postArray = array();
				$content['file_name'] = $upload_data['file_name'];

			} else {
				$content['errors'] = strip_tags($this->upload->display_errors());
			}
		}
		return $content;

	}
	public function saveVideo($tag_name = 'userfile', $path = SITE_UPD, $config = array()) {
		$content = array('file_name' => "", 'errors' => "");
		if (isset($_FILES[$tag_name]['name']) && $_FILES[$tag_name]['name'] != "") {
			$this->load->library('upload');
			$this->load->library('image_lib');
			$path = FCPATH . $path;
			if (!file_exists($path)) {
				@mkdir($path);
			}
			$file_config = array();
			$file_config['upload_path'] = $path;
			$file_config['allowed_types'] = 'mp4|3gp|webm|ogv';
			$file_config['overwrite'] = TRUE;
			$file_config['max_size'] = '8048';
			$file_config['file_name'] = md5(time() . rand());
			$file_config = array_replace($file_config, $config);

			$this->upload->initialize($file_config);

			if ($this->upload->do_upload($tag_name)) {
				$upload_data = $this->upload->data();
				$postArray = array();
				$content['file_name'] = $upload_data['file_name'];

			} else {
				$content['errors'] = strip_tags($this->upload->display_errors());
			}
		}
		return $content;

	}

	function sendAndroidNotification($data, $id) {


		$url = 'https://fcm.googleapis.com/fcm/send';

                
		$fields = array (
			'to' =>$id,
			'data' =>$data
		);
                
		$fields = json_encode ( $fields );

		$headers = array (
			'Authorization: key=' . "AIzaSyDcK4jkpmsAmh--vzHkUCcCUYJ2r0R3LAs",
			'Content-Type: application/json'
		);

		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
                //curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, true ); 
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
                $result = curl_exec ( $ch );

                curl_close ( $ch );
                 
		return $result;
	}

}