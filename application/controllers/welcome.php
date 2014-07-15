<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
		$this->load->model('plantofloat');
		$data['floatplanstatus'] = $this->plantofloat->getFloatplanStats();
		
		$cookie = $this->input->cookie('_p2F_login');
		if($cookie === false || isset($_SESSION['user_persist']))
		{
			$this->load->view('welcome_message',$data);
		} else {
			$user_validated = $this->plantofloat->autoLogin($cookie);
			if($user_validated === true )
			{
				$data = array('mode'=>'user');
				$this->load->view('includes/header',$data);
				$this->load->view('user');
				$this->load->view('includes/footer');
			} else {
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
				$this->load->view('welcome_message',$data);
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */