<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vessel_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    
    function getVesselStats($userdetailsID)
    {
	    $this->load->library('table');

        /*	
        $this->db->select('UserDetails_UserDetailsID AS UserID');
        $this->db->where(array('UserDetails_Username' => $userEmail));
        $query = $this->db->get('userdetails');
        foreach($query->result() as $row)
        {
            $userdetailsID = $row->UserID;
        }
        */
        
        $button_edit = "<button type='submit' class='btn btn-mini btn-success'>Edit Vessel</button>";
        $button_delete = "<button type='submit' class='btn btn-mini btn-danger'>Remove Vessel</button>";
        $sql="SELECT 
                    Vessel_Name AS Name,Vessel_Type AS Type,
                    \"". $button_edit . "\" AS `Edit Trustee`,
                    \"". $button_delete . "\" AS `Delete Trustee`
                FROM 
                    `vessel`
                WHERE 
                    Vessel_UserDetailsID=".$userdetailsID;

        $query = $this->db->query($sql,array());                    

        /*
        $this->db->select('Vessel_Name AS Name,Vessel_Type AS Type');
        $this->db->where(array('Vessel_UserDetailsID' => $userdetailsID));
        $this->db->order_by("Vessel_Name", "asc");      
        $query = $this->db->get('vessel');
        */
		$tmpl = array ( 'table_open'  => '<table class="table table-striped table-bordered table-hover">' );
		$this->table->set_template($tmpl);
		$vesselData = $this->table->generate($query);
		

    	$returnResult = array(
    					'mode' => 'vessel',
    					'vessel' => $vesselData,
    					);
        return $returnResult;
    }
}


/* End of file vessel_model.php */
/* Location: ./application/models/vessel_model.php */