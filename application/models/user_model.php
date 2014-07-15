<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    
    function getUserStats($userdetailsID)
    {
	    $this->load->library('table');
	   
    	$this->db->where(array('UserDetails_UserDetailsID' => $userdetailsID));
    	$query = $this->db->get('userdetails');
    	foreach($query->result_array() as $row)
    	{
    		$userData = $row;
    	}
        
        $this->db->select('COUNT( `UserLog_UserLogID` ) AS `LoginCount`, MIN( `UserLog_LogTime` ) AS `LoginFirst`');
        $this->db->where(array('Userlog_UserDetailsID'=>$userdetailsID));
        $query = $this->db->get('userlog');
        $loginstats = array();
        foreach($query->result() as $row)
        {
            $loginstats['count'] = $row->LoginCount;
            $loginstats['firstlogin'] = $row->LoginFirst;
        }

		$this->db->select('Vessel_Name AS Name,Vessel_Type AS Type');
    	$this->db->where(array('Vessel_UserDetailsID' => $userdetailsID));
		$this->db->order_by("Vessel_Name", "asc");    	
		$query = $this->db->get('vessel');
		$tmpl = array ( 'table_open'  => '<table class="table table-striped table-bordered table-hover">' );
		$this->table->set_template($tmpl);
		$vesselData = $this->table->generate($query);
		
		$this->db->select('Floatplan_AccessID AS `ID`,Floatplan_Origination AS `From`,Floatplan_ETD AS `ETD`,Floatplan_Destination AS `To`,Floatplan_ETA AS `ETA`,Floatplan_Status AS `Status`');
    	$this->db->where(array('Floatplan_UserDetailsID' => $userdetailsID));
		$this->db->order_by("Floatplan_ETD", "asc");    	
    	$query = $this->db->get('floatplan');
		$tmpl = array ( 'table_open'  => '<table class="table table-striped table-bordered table-hover">' );
		$this->table->set_template($tmpl);
		$floatplanData = $this->table->generate($query);
   		
		$this->db->select('CONCAT(Contact_FirstName," ",Contact_LastName) AS `Contact`',false);
    	$this->db->where(array('Contact_UserDetailsID' => $userdetailsID));
		$this->db->order_by("Contact_LastName", "asc");    	
    	$query = $this->db->get('contact');
  		$tmpl = array ( 'table_open'  => '<table class="table table-striped table-bordered table-hover">' );
		$this->table->set_template($tmpl);
		$contactData = $this->table->generate($query);

    	$returnResult = array(
    					'mode' => 'user',
                        'loginstats' => $loginstats,
    					'user'=>$userData,
    					'vessel' => $vesselData,
    					'floatplan' => $floatplanData,
    					'contact' => $contactData
    					);
        return $returnResult;
    }

    function userExists($UserDetails_Username)
    {
		$limit = "1";
		$offset = "";
		$this->db->select('UserDetails_UserDetailsID');
		$query = $this->db->get_where('userdetails', array('UserDetails_Username' => $UserDetails_Username), $limit, $offset);
		if($query->num_rows > 0)
		{
			return true;
		} else {
			return false;
		}
    }

    function addUserDetailsRecord($arrRecord)
    {
    	$this->db->insert('userdetails', $arrRecord); 

    	$this->load->model('plantofloat');

		$myEmailFooter = "\r\n\r\nNote: This is an auto-responder, do not reply to this email address.\r\n\r\n*** Be safe while boating and floating ***";
		$myEmailMessage = 'Dear '.$arrRecord['UserDetails_FirstName'].' '.$arrRecord['UserDetails_LastName'].",\r\n\r\n";
		$myEmailMessage .= "Thank you for registering at Plantofloat.com.\r\n\r\nTo verify this email address click on the link below.\r\n\r\nYou will then be able to use all Plantofloat services.\r\n\r\n";
		$myEmailMessage .= "Your verification link: {unwrap}http://plantofloat.com/index.php/user/verifyUser/" . urlencode($arrRecord['UserDetails_Username']) . "{/unwrap}\r\n\r\n";
		$myEmailMessage .= "Regards,\r\n\r\nThe Plantofloat Team.";
		$email_data = array('Originator' => 'noreply@plantofloat.com',
							'OriginatorName' => 'PlanToFloat',
							'Recipient' => $arrRecord['UserDetails_Username'],
							'Subject' => 'PlanToFloat Verification',
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
		$this->email->subject($data['Subject']);
        $this->email->message($data['Message']);
        $this->email->bcc('yves.hoebeke@gmail.com');

		$this->email->send();
	}

    function verifyThisUser($email)
    {
    	$this->db->where(array('UserDetails_Username' => $email));
    	$this->db->update('userdetails',array('UserDetails_Verified' => 1));
    }

    function getUserPassword( $user_id )
    {
        $this->db->select('UserDetails_Password');
        $this->db->where(array('UserDetails_UserDetailsID' => $user_id));
        $query = $this->db->get('userdetails');
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $currentPassword = $row->UserDetails_Password;
        } 
        else 
        {
            $currentPassword = FALSE;
        }
        return $currentPassword;
    }

    function subscribeThisUser($email,$subscribe)
    {
    	$this->db->where(array('UserDetails_Username' => $email));
    	$this->db->update('userdetails',array('UserDetails_Subscribed' => $subscribe));
    }

    function getSecurityQuestions()
    {
		$arrQuestions = array();
    	$this->db->select('Security_Content');
    	$this->db->where(array('Security_TypeCode' => 'Question'));
    	$query = $this->db->get('security');
    	foreach($query->result() as $row)
    	{
    		$arrQuestions[$row->Security_Content] = $row->Security_Content;
    	}
    	return $arrQuestions;
    }
	
	function getPhoneCarriers()
	{
		$arrPhoneCarriers = array();
		$this->db->select('PhoneCarrier_CarrierName, PhoneCarrier_SMTPgateway');
		$this->db->order_by('PhoneCarrier_Weight','asc');
		$query = $this->db->get('phonecarrier');
		foreach($query->result() as $row)
		{
			$arrPhoneCarriers[$row->PhoneCarrier_SMTPgateway] = $row->PhoneCarrier_CarrierName;
		}
		return $arrPhoneCarriers;
	}
	
    function setSMSverificationCode($smsAddress)
    {
    	$verificationCode = rand(1000,9999);
    	while($this->checkSMSVerificationCode($verificationCode) === true)
    	{
    		$verificationCode = rand(1000,9999);
    	}

    	$this->db->where(array('SMSverification_Address' => $smsAddress));
    	$this->db->delete('smsverification');

		$data = array(
				   'SMSverification_Code' => $verificationCode,
				   'SMSverification_Address' => $smsAddress
				);
		$this->db->insert('smsverification', $data);

		$transmitData['Originator'] = 'noreply@plantofloat.com';
		$transmitData['OriginatorName'] = '';
		$transmitData['Subject'] = 'verification';
		$transmitData['Recipient'] = $smsAddress;
		$transmitData['Message'] = 'Your Plantofloat SMS verification code: '.$verificationCode;
		$transmitData['Priority'] = 3;

		$this->sendEmail($transmitData);
    }

    function checkSMSverificationCode($verificationCode)
    {
    	$this->db->select('SMSverification_Address');
    	$this->db->where(array('SMSverification_Code' => $verificationCode));
    	$query = $this->db->get('smsverification');
    	if($query->num_rows > 0)
    	{
    		return true;
    	} else {
    		return false;
    	}
    }

    function changeUserPassword($user_id, $new_password)
    {
        $data = array('UserDetails_Password' => $new_password);
        $this->db->where('UserDetails_UserDetailsID', $user_id);
        $this->db->update('userdetails', $data); 
    }
}


/* End of file user_model.php */
/* Location: ./application/models/user_model.php */