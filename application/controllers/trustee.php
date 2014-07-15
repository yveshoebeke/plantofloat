<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trustee extends MY_Controller {

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

		$this->load->model('trustee_model');
    }

	public function index()
	{
		$data = $this->trustee_model->getTrusteeStats($_SESSION['user_id']);
		$this->load->view('includes/header',$data);
		$this->load->view('trustee');
		$this->load->view('includes/footer');
	}

	public function trusteeForm()
	{
		$data = array('mode'=>'trustee');
		$this->load->view('includes/header',$data);
		$this->load->view('trusteeForm');
		$this->load->view('includes/footer');
	}

	public function addTrustee()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('Contact_FirstName', 'First name', 'trim|required|min_length[2]|alpha|xss_clean');
		$this->form_validation->set_rules('Contact_LastName', 'Last name', 'trim|required|min_length[2]|alpha|xss_clean');
		$this->form_validation->set_rules('Contact_Email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('Contact_MobilePhone1', 'Mobile Phone', 'trim|required|numeric|min_length[10]|xss_clean');
		$this->form_validation->set_rules('Contact_MobilePhoneCarrier1', 'Carrier', 'trim|required|alpha-numeric|xss_clean');
		$this->form_validation->set_rules('Contact_TwitterID', 'Twitter Id', 'trim|alpha-numeric|xss_clean');
	
		if ($this->form_validation->run() == false)
		{
			$data = $this->trustee_model->getTrusteeStats($_SESSION['user_id']);
			$this->load->view('includes/header',$data);
			$this->load->view('trustee');
			$this->load->view('includes/footer');
		}
		else
		{
			$this->addContactDetails(); // call to model to write to DB
			$data = $this->trustee_model->getTrusteeStats($_SESSION['user_id']);
			$this->load->view('includes/header',$data);
			$this->load->view('trustee');
			$this->load->view('includes/footer');
		}
	}

	public function addContactDetails()
	{
		$arrRecord = array(
							'Contact_UserDetailsID' => $_SESSION['user_id'],
							'Contact_FirstName' => ucwords(strtolower($this->input->post('Contact_FirstName'))),
							'Contact_LastName' => ucwords(strtolower($this->input->post('Contact_LastName'))),
							'Contact_Email' => strtolower($this->input->post('Contact_Email')),
							'Contact_MobilePhone1' => $this->input->post('Contact_MobilePhone1'),
							'Contact_MobilePhoneCarrier1' => $this->input->post('Contact_MobilePhoneCarrier1'),
							'Contact_TwitterID' => strtolower($this->input->post('Contact_TwitterID')),
							'Contact_RecordModified' => date('Y-m-d H:i:s'),
							'Contact_RecordCreated' => date('Y-m-d H:i:s')
							);
		$this->trustee_model->addContactDetailsRecord($arrRecord);
		unset($this->input->post);
	}
}

/* End of file trustee.php */
/* Location: ./application/controllers/trustee.php */