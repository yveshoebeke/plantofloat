<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plantofloat extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    
	function autoLogin($email)
	{
		$sql="SELECT * FROM userdetails WHERE UserDetails_Username=? LIMIT 1";
		$query = $this->db->query($sql,array($email));

		if($query->num_rows > 0)
		{
			foreach ($query->result() as $row)
			{
				$_SESSION['user_id'] = $row->UserDetails_UserDetailsID;
				$_SESSION['user_email'] = $email;
				$_SESSION['user_type'] = $row->UserDetails_UserType;
				$_SESSION['user_firstname'] = $row->UserDetails_FirstName;
				$_SESSION['user_lastname'] = $row->UserDetails_LastName;
				$_SESSION['user_fullname'] = $row->UserDetails_FirstName . " " . $row->UserDetails_LastName;
				$_SESSION['user_logintime'] = date('m/d/Y h:ia');
				$_SESSION['user_timezone'] = $row->UserDetails_DefaultTimezone;
				$_SESSION['user_autologin'] = true;
				$_SESSION['user_persist'] = true;

				$data = array(
				   'UserLog_UserLogID' => null,
				   'UserLog_UserDetailsID' => $row->UserDetails_UserDetailsID,
				   'UserLog_LogTime' => date('Y-m-d H:i:s')
				);
				$this->db->insert('userlog', $data);
			}
			return true;
		} else {
			return false;
		}
	}
	
	function validateUser($email,$password)
	{
		$password = md5($password);
		$limit = "1";
		$arrCredentials = array('UserDetails_Username' => $email,'UserDetails_Password' => $password);
		$this->db->where($arrCredentials);
		$query = $this->db->get_where('userdetails', $arrCredentials, 1);

		if($query->num_rows > 0)
		{
			foreach ($query->result() as $row)
			{
				$_SESSION['user_id'] = $row->UserDetails_UserDetailsID;
				$_SESSION['user_email'] = $email;
				$_SESSION['user_type'] = $row->UserDetails_UserType;
				$_SESSION['user_firstname'] = $row->UserDetails_FirstName;
				$_SESSION['user_lastname'] = $row->UserDetails_LastName;
				$_SESSION['user_fullname'] = $row->UserDetails_FirstName . " " . $row->UserDetails_LastName;
				$_SESSION['user_logintime'] = date('m/d/Y h:ia');
				$_SESSION['user_timezone'] = $row->UserDetails_DefaultTimezone;
				$_SESSION['user_persist'] = true;
				$data = array(
				   'UserLog_UserLogID' => null,
				   'UserLog_UserDetailsID' => $row->UserDetails_UserDetailsID,
				   'UserLog_LogTime' => date('Y-m-d H:i:s')
				);
				$this->db->insert('userlog', $data);
			}
			return true;
		} else {
			return false;
		}
	}

	function getFloatplanStats()
	{
		$jsonData = "[['Status','Count'],";
		$this->db->select('Floatplan_Status AS status,COUNT(Floatplan_Status) AS count');
		$this->db->group_by('Floatplan_Status');
		$query = $this->db->get('floatplan');

		foreach($query->result() as $row)
		{
			$jsonData .= "['".$row->status."',".$row->count."],";
		}
		$jsonData = substr($jsonData,0,-1);
		$jsonData .= ']';
		//$data = json_encode(array($arrData));
		return $jsonData;
	}
	
	function recordContactUs( $data )
	{
		$this->db->insert('preliminaries', $data);

		$myEmailMessage = 'From: '.$data['Fullname'].' ('.$data['EmailAddress'].')'."\r\n\r\n".$data['Comments']."\r\n\r\n".'On: '.$data['CreationDate'];
		$email_data = array('Originator' => 'noreply@plantofloat.com',
							'OriginatorName' => 'PlanToFloat',
							'Recipient' => 'yves.hoebeke@gmail.com',
							'Subject' => 'plantofloat contact',
							'Message' => $myEmailMessage,
							'Priority'=> 3);
		$this->sendEmail($email_data);

		$myEmailFooter = "\r\n\r\nNote: This is an auto-responder, do not reply to this email address.\r\n\r\n*** Be safe while boating and floating ***";
		$myEmailMessage = 'Dear '.$data['Fullname'] .",\r\n\r\nThank you for your interest and feedback to our product.\r\n\r\nYou will receive a response from us shortly.\r\n\r\nRegards,\n\nThe Plantofloat Team.";
		$email_data = array('Originator' => 'noreply@plantofloat.com',
							'OriginatorName' => 'PlanToFloat',
							'Recipient' => $data['EmailAddress'],
							'Subject' => 'PlanToFloat Contact Response',
							'Message' => $myEmailMessage . $myEmailFooter,
							'Priority'=> 3);
		$this->sendEmail($email_data);
	}
	
	function sendEmail( $data )
	{
		$this->load->library('email');
		
		$this->email->from($data['Originator'], $data['OriginatorName']);
		if($data['Priority'] !== 3)
		{
			$config['priority'] = $data['Priority'];
			$this->email->initialize();
		}

		$this->email->to($data['Recipient']);
		/*
		$this->email->cc('another@another-example.com');
		$this->email->bcc('them@their-example.com');
		*/
		$this->email->subject($data['Subject']);
		$this->email->message($data['Message']);

		$this->email->send();
	}

	function getAllFloatPlanStatus() {
		$sql="SELECT 
				`Floatplan_Status` AS STATUS , 
				COUNT( `Floatplan_FloatplanID` ) AS count 
			FROM 
				`floatplan` 
			GROUP BY 
				`Floatplan_Status`";
		$query = $this->db->query($sql,array());
		return $query;
	}
}


/* End of file plantofloat.php */
/* Location: ./application/models/plantofloat.php */