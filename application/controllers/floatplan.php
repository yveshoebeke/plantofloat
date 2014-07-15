<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Floatplan extends MY_Controller {

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
    }

	public function index()
	{
		$data = $this->floatplan_model->getFloatplanStats($_SESSION['user_id']);
		$this->load->view('includes/header',$data);
		$this->load->view('floatplan');
		$this->load->view('includes/footer');
	}

	private function generateFloatplanId(){
		$arrP2Fid = range('1','9');
		$arrP2Fid = array_merge($arrP2Fid,range('A','Z'));
		$arrOmit = array('O','L','Q','I','J');
		$bolInvalidId = true;

		while($bolInvalidId === true)
		{
			foreach($arrOmit as $chrOmit)
			{
			    unset($arrP2Fid[array_search($chrOmit,$arrP2Fid)]);
			}
			shuffle($arrP2Fid);
			$arrRandomKeys = array_rand($arrP2Fid,5);
			$strPlanId = "";
			foreach($arrRandomKeys as $intKey)
			{
			    $strPlanId .= $arrP2Fid[$intKey];
			}
			$bolInvalidId = $this->floatplan_model->getFloatPlanId($strPlanId);
		}
		return $strPlanId;
	}

	public function floatplanForm()
	{
		$vessels = $this->floatplan_model->getVesselNames($_SESSION['user_id']);
		$status = $this->floatplan_model->getFloatplanSelectableStatus();
		$floatplanstatus = "";
		$data = array(
					'mode'=>'floatplan',
					'vessels'=>$vessels,
					'status'=>$status
					);
		$this->load->view('includes/header',$data);
		$this->load->view('floatplanForm');
		$this->load->view('includes/footer');
	}
}

/* End of file floatplan.php */
/* Location: ./application/controllers/floatplan.php */