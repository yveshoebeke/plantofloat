<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporting extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('reporting');
		$this->load->view('includes/footer');
	}

	private function scanReportInput()
	{
		$email    = "report@pavelife.com";
		$password = "xxxxxxxxx";

		$imap_host = "{imap.gmail.com:993/imap/ssl}";
		$imap_folder = "INBOX";
		$mailbox = imap_open($imap_host . $imap_folder,$email,$password) or die('Failed to open connection with Gmail: ' . imap_last_error());
		$emails = imap_search( $mailbox, 'UNSEEN');

		if($emails)
		{
		   foreach($emails as $email_id)
		   {
		       $email_info = imap_fetch_overview($mailbox,$email_id,0);
		       $message = imap_fetchbody($mailbox,$email_id,2);
		       $intFloatPlanID = $email_info[0]->subject;
		       $strReport = $message;
		   }
		}
	}

	private function processReportMessage( $strReport )
	{
		$arrPosition = array("datetime","longitude","latitude","heading","speed","eta");
		$arrObservation = array("datetime","wind_direction","wind_speed","visibility","baro","temp_air","temp_water","wave_crest","wave_period");
		$arrPlanChange = array("datetime","eta","destination");
		$arrMessage = array("datetime","message");
		$arrKeys = array();

		$bolValidMessage = true;
		$chrMessageType = strtoupper($strReport[0]);
		$arrInput = explode(",",$strReport);

		switch( $chrMessageType ){
		    default:
		        $bolValidMessage = false;
		        break;

		    case 'P':
		        $arrKeys = $arrPosition;
		        break;
		        
		    case 'O':
		        $arrKeys = $arrObservation;
		        break;
		        
		    case 'C':
		        $arrKeys = $arrPlanChange;
		        break;
		        
		    case 'M':
		        $arrKeys = $arrMessage;
		        break;
		}

		if($bolValidMessage === true)
		{
		    while(count($arrInput) > count($arrKeys))
		    {
		        $strVoid = array_pop($arrInput);    
		    }
		    
		    while(count($arrKeys) > count($arrInput))
		    {
		        array_push($arrInput,"");
		    }

		    $arrCombined = array_combine($arrKeys, $arrInput);
		    echo "<pre>";var_dump($arrCombined);echo "</pre>";
		}
	}
}

/* End of file reporting.php */
/* Location: ./application/controllers/reporting.php */