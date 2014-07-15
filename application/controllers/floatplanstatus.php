<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Floatplanstatus extends CI_Controller {

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
	function __construct()
    {
        parent::__construct();

		$this->load->model('floatplan_model');
		$this->load->model('user_model');
    }

	public function checkPlans()
	{
		$data = $this->floatplan_model->getPendingPastdueFloatplans();
		foreach($data as $floatplanId=>$floatplanData)
		{
			echo "Activated [".$floatplanData['PlanID']."]\n";
			$this->floatplan_model->setFloatplanStatus($floatplanId, 'Open');
			$myEmailFooter = "\r\n\r\nNote: This is an auto-responder, do not reply to this email address.\r\n\r\n*** Be safe while boating and floating ***";
			$myEmailMessage = 'Floatplan ' . $floatplanData['PlanID'] . ' is activated on behalf of ' . $floatplanData['Username'].".\r\n\r\n";
			$myEmailMessage .= "Do not forget to close it upon arrival at your destination. Have a great trip!\r\n\r\n";
			$myEmailMessage .= "Thank you for using Plantofloat.com.\r\n\r\n";
			$myEmailMessage .= "Regards,\r\n\r\nThe Plantofloat Team.";

			$email_data = array('Originator' => 'noreply@plantofloat.com',
								'OriginatorName' => 'PlanToFloat',
								'Recipient' => $floatplanData['Email'],
								'Subject' => 'PlanToFloat - Floatplan Opened',
								'Message' => $myEmailMessage . $myEmailFooter,
								'Priority'=> 3);

			$this->user_model->sendEmail($email_data);
		}

		$data = $this->floatplan_model->getOverdueFloatplans();
		foreach($data as $floatplanId=>$floatplanData)
		{
			echo "Overdue [".$floatplanData['PlanID']."]\n";
			$this->floatplan_model->setFloatplanStatus($floatplanId, 'Overdue');
			$myEmailFooter = "\r\n\r\nNote: This is an auto-responder, do not reply to this email address.\r\n\r\n*** Be safe while boating and floating ***";
			$myEmailMessage = 'Floatplan [' . $floatplanData['PlanID'] . '], on behalf of ' . $floatplanData['Username']." is overdue!\r\n\r\n";
			$myEmailMessage .= "Please close it upon arrival at your destination.\r\n\r\n";
			$myEmailMessage .= "Your Trustees will be notified shortly.\r\n\r\n";
			$myEmailMessage .= "Thank you for using Plantofloat.com.\r\n\r\n";
			$myEmailMessage .= "Regards,\r\n\r\nThe Plantofloat Team.";

			$email_data = array('Originator' => 'noreply@plantofloat.com',
								'OriginatorName' => 'PlanToFloat',
								'Recipient' => $floatplanData['Email'],
								'Subject' => 'PlanToFloat - Floatplan Overdue!',
								'Message' => $myEmailMessage . $myEmailFooter,
								'Priority'=> 3);

			$this->user_model->sendEmail($email_data);
		}
	}
}

/* End of file floatplan_status.php */
/* Location: ./application/controllers/floatplan_status.php */