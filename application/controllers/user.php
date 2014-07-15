<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

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

		$this->load->model('plantofloat');
		$this->load->model('user_model');
    }

	public function index()
	{
		//$data = array('mode'=>'user');
		$data = $this->user_model->getUserStats($_SESSION['user_id']);
		$this->load->view('includes/header',$data);
		$this->load->view('user');
		$this->load->view('includes/footer');
	}

	public function login()
	{
		$email = $this->input->post('email');		
		$password = $this->input->post('password');		
		$rememberme = $this->input->post('rememberme');	
		$user_validated = $this->plantofloat->validateUser($email, $password);
		if($user_validated === true )
		{
			if($rememberme === 'on')
			{
				$this->setLoginCookie($email);
			}
			//$data = array('mode'=>'user');
			$data = $this->user_model->getUserStats($_SESSION['user_id']);

			$this->load->view('includes/header',$data);
			$this->load->view('user');
			$this->load->view('includes/footer');
		} else {
			$this->load->view('welcome_message');
		}
	}

	public function logout()
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_email']);
		unset($_SESSION['user_firstname']);
		unset($_SESSION['user_lastname']);
		unset($_SESSION['user_fullname']);
		unset($_SESSION['user_logintime']);
		unset($_SESSION['user_timezone']);
		if(isset($_SESSION['user_persist']))
		{
			unset($_SESSION['user_persist']);
		}
		if(isset($_SESSION['user_autologin']))
		{
			unset($_SESSION['user_autologin']);
		}

		$forgetme = $this->input->post('forgetme');
		if($forgetme === 'on')
		{
			$this->removeLoginCookie();
		}
		$data['floatplanstatus'] = $this->plantofloat->getFloatplanStats();
		$this->load->view('welcome_message',$data);
	}

	public function contactUs()
	{
		$this->load->view('contactUsForm');
	}
	
	public function getContactUs()
	{
		$creationDate = date('Y-m-d H:i:s');
		$name = $this->input->post('yourName');	
		$email = $this->input->post('yourEmail');
		$message = $this->input->post('yourMessage');
		$isHuman = $this->input->post('isHuman');
		
		if($isHuman == 8 || strtolower($isHuman) == 'eight')
		{
			$human = true;
		} else {
			$human = false;
		}
		
		$this->load->helper('email');

		if (valid_email($email) === true && strlen($name) > 0 && strlen($message) > 0 && $human === true)
		{
			$ip = $this->input->ip_address();

			$data = array('PreliminariesID' => null,
						   'Fullname' => $name,
						   'IPaddress' => $ip,
						   'EmailAddress' => $email,
						   'Comments' => $message,
						   'CreationDate' => $creationDate);

			$this->plantofloat->recordContactUs($data);
		}
		$this->load->view('welcome_message');
	}

	public function registerMe()
	{
		$data['security'] = $this->user_model->getSecurityQuestions();
		//var_dump($data);exit();
		$this->load->view('registerMeForm',$data);
	}
	
	public function processRegisterForm()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('UserDetails_Username', 'Email', 'trim|required|valid_email|callback_checkUsername');
		$this->form_validation->set_rules('UserDetails_FirstName', 'First name', 'trim|required|min_length[2]|alpha|xss_clean');
		$this->form_validation->set_rules('UserDetails_LastName', 'Last name', 'trim|required|min_length[2]|alpha|xss_clean');
		$this->form_validation->set_rules('UserDetails_Password', 'Password', 'required|min_length[6]|matches[Verify_Password]');
		$this->form_validation->set_rules('Verify_Password', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('UserDetails_SecurityAnswer', 'Security Question', 'trim|required|alpha-numeric|min_length[3]|xss_clean');
		$this->form_validation->set_rules('Verify_Human', 'Human answer', 'trim|required|callback_checkHuman|alpha-numeric|xss_clean');
		$this->form_validation->set_rules('termsAgreed', 'Terms and Conditions', 'required');
	
		if ($this->form_validation->run() == false)
		{
			$data['security'] = $this->user_model->getSecurityQuestions();
			$this->load->view('registerMeForm',$data);
		}
		else
		{
			$this->addUserDetails(); // call to model to write to DB
			$data['email'] = $this->input->post('UserDetails_Username');
			$this->load->view('registerSuccess',$data);
		}
	}

	public function checkUsername($email)
	{
		$bolExists = $this->user_model->userExists($email);
		if($bolExists === true)
		{
			$this->form_validation->set_message('checkUsername', 'This %s is already registered.');
			return false;
		} else {
			return true;
		}
	}

	public function checkHuman($answer)
	{
		$arrAnswers = array('7','seven');
		if(in_array(strtolower($answer), $arrAnswers) === false)
		{
			$this->form_validation->set_message('checkHuman', 'Incorrect answer to math question.');
			return false;
		} else {
			return true;
		}
	}

	public function addUserDetails(){
		//$bolExists = $this->user_model->userExists('john.smith@example.com');
		$UserDetails_Subscribed = ($this->input->post('UserDetails_Subscribed') === 'on') ? 1 : 0;
		$arrRecord = array(
							'UserDetails_Username' => strtolower($this->input->post('UserDetails_Username')),
							'UserDetails_FirstName' => ucwords(strtolower($this->input->post('UserDetails_FirstName'))),
							'UserDetails_LastName' => ucwords(strtolower($this->input->post('UserDetails_LastName'))),
							'UserDetails_Password' => md5($this->input->post('UserDetails_Password')),
							'UserDetails_SecurityQuestion' => $this->input->post('UserDetails_SecurityQuestion'),
							'UserDetails_SecurityAnswer' => strtolower($this->input->post('UserDetails_SecurityAnswer')),
							'UserDetails_DefaultTimezone' => $this->input->post('timezones'),
							'UserDetails_Email' => strtolower($this->input->post('UserDetails_Username')),
							'UserDetails_Subscribed' => $UserDetails_Subscribed,
							'UserDetails_Verified' => 0,
							'UserDetails_RecordModified' => date('Y-m-d H:i:s'),
							'UserDetails_RecordCreated' => date('Y-m-d H:i:s')
							);
		$this->user_model->addUserDetailsRecord($arrRecord);
	}

	public function changePassword(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');


		$this->form_validation->set_rules('UserDetails_Password', 'Password', 'required|callback_verifyCurrentPassword|xss_clean');
		$this->form_validation->set_rules('NewPassword', 'Password', 'required|min_length[6]|matches[VerifyPassword]|callback_verifyIfNotCurrentPassword|xss_clean');
		$this->form_validation->set_rules('VerifyPassword', 'Password Confirmation', 'required');


		$data = $this->user_model->getUserStats($_SESSION['user_id']);
		if ($this->form_validation->run() !== false)
		{
			$this->user_model->changeUserPassword($_SESSION['user_id'], md5($this->input->post('NewPassword')));
			$data['passwordchanged'] = 'OK';
		}
		$this->load->view('includes/header',$data);
		$this->load->view('user');
		$this->load->view('includes/footer');
	}

	public function verifyIfNotCurrentPassword( $password )
	{
		if(md5($password) === $this->user_model->getUserPassword($_SESSION['user_id']))
		{
			$this->form_validation->set_message('verifyIfNotCurrentPassword', 'New Password is same as Current Password.');
			return false;
		} else {
			return true;
		}
	}

	public function verifyCurrentPassword( $password )
	{
		if(md5($password) === $this->user_model->getUserPassword($_SESSION['user_id']))
		{
			return true;
		} else {
			$this->form_validation->set_message('verifyCurrentPassword', 'Incorrect Existing Password.');
			return false;
		}
	}

	public function verifyUser($email)
	{
		$email = urldecode($email);
		$this->user_model->verifyThisUser($email);
		$this->load->view('userVerified');
	}

	public function subscribeThisUser($email,$subscribe)
	{
		$email = urldecode($email);
		$subscribe = $this->input->get('subscribe');
		$this->user_model->subscribeUser($email,$subscribe);
	}

	public function getSMScarrierDropdownList()
	{
		$arrCarrierOptionList = $this->user_model->getPhoneCarriers();
		var_dump($arrCarrierOptionList);
	}
	
	public function sendSMSverificationCode($phonenumber,$smsGateway, $fromURL=false)
	{
		if($fromURL !== false)
		{
			$smsGateway = urldecode($smsGateway);
		}
		$placeholder = "%N";
		$smsAddress = str_replace($placeholder,$phonenumber,$smsGateway);
		$this->user_model->setSMSverificationCode($smsAddress);
	}

	private function setLoginCookie($email)
	{
		$cookie = array(
		    'name'   => 'login',
		    'value'  => $email,
		    'expire' => '15552000',
		    'domain' => '.plantofloat.com',
		    'path'   => '/',
		    'prefix' => '',
		    'secure' => FALSE
		);
		$this->input->set_cookie($cookie);
	}

	private function removeLoginCookie()
	{
		$cookie = array(
		    'name'   => 'login',
		    'value'  => '',
		    'expire' => '',
		    'domain' => '.plantofloat.com',
		    'path'   => '/',
		    'prefix' => '',
		    'secure' => FALSE
		);
		$this->input->set_cookie($cookie);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */