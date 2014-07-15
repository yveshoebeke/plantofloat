<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vessel extends MY_Controller {

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

		$this->load->model('vessel_model');
    }

	public function index()
	{
		$data = $this->vessel_model->getVesselStats($_SESSION['user_id']);

		$this->load->view('includes/header',$data);
		$this->load->view('vessel');
		$this->load->view('includes/footer');
	}

	public function vesselForm()
	{
		$data = array('mode'=>'vessel');
		$this->load->view('includes/header',$data);
		$this->load->view('vesselForm');
		$this->load->view('includes/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */