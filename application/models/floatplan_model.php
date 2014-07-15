<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Floatplan_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    
    function getFloatPlanId($strPlanId)
    {
		$limit = "1";
		$offset = "";
		$this->db->select('Floatplan_AccessID');
		$query = $this->db->get_where('floatplan', array('Floatplan_AccessID' => $strPlanId), $limit, $offset);
		if($query->num_rows > 0)
		{
			return true;
		} else {
			return false;
		}
    }

    function getFloatplanStats($userdetailsID)
    {
	    $this->load->library('table');
        
        $button_edit = "<button type='submit' class='btn btn-mini btn-success'>Edit this</button>";
        $button_delete = "<button type='submit' class='btn btn-mini btn-danger'>Remove</button>";
        $sql="SELECT 
					Floatplan_AccessID AS `ID`,
					Floatplan_Origination AS `From`,
					Floatplan_ETD AS `ETD`,
					Floatplan_Destination AS `To`,
					Floatplan_ETA AS `ETA`,
					Floatplan_Status AS `Status`,
                    \"". $button_edit . "\" AS `Edit`,
                    \"". $button_delete . "\" AS `Delete`
                FROM 
                    `floatplan`
                WHERE 
                    Floatplan_UserDetailsID=".$userdetailsID;

        $query = $this->db->query($sql,array());                    

        /*
        $this->db->select('Vessel_Name AS Name,Vessel_Type AS Type');
        $this->db->where(array('Vessel_UserDetailsID' => $userdetailsID));
        $this->db->order_by("Vessel_Name", "asc");      
        $query = $this->db->get('vessel');
        */
		$tmpl = array ( 'table_open'  => '<table class="table table-striped table-bordered table-hover">' );
		$this->table->set_template($tmpl);
		$floatplanData = $this->table->generate($query);
		

    	$returnResult = array(
    					'mode' => 'floatplan',
    					'floatplan' => $floatplanData,
    					);
        return $returnResult;
    }

    function getVesselNames($userdetailsID)
    {
        $arrVesselNames = array();
        $this->db->select('Vessel_VesselID as ID, Vessel_Name AS Name');
        $this->db->where(array('Vessel_UserDetailsID' => $userdetailsID));
        $this->db->order_by("Vessel_Name", "asc");      
        $query = $this->db->get('vessel');
        foreach($query->result() as $row)
        {
            $arrVesselNames[$row->ID] = $row->Name;
        }
        return $arrVesselNames;
    }

    function getFloatplanSelectableStatus()
    {
        $arrStatus = array('1'=>'Draft','2'=>'Pending','3'=>'Open');
        return $arrStatus;
    }

    function getPendingPastdueFloatplans()
    {
        $arrPendingPlans = array();
        $this->db->select('f.Floatplan_FloatplanID AS ID, f.Floatplan_AccessID AS PlanID,u.UserDetails_FirstName AS Firstname,u.UserDetails_LastName AS Lastname, u.UserDetails_Username AS Email');
        $this->db->from('floatplan AS f');
        $this->db->join('userdetails AS u', 'u.UserDetails_UserDetailsID = f.Floatplan_UserDetailsID');
        $this->db->where("Floatplan_Status = 'Pending' AND Floatplan_ETD < NOW()");
        $query = $this->db->get();
        foreach($query->result() as $row){
            $arrPendingPlans[$row->ID] = array('PlanID'=>$row->PlanID, 'Username'=>$row->Firstname." ".$row->Lastname,'Email'=>$row->Email);
        }
        return $arrPendingPlans;
    }

    function getOverdueFloatplans()
    {
        $arrPendingPlans = array();
        $this->db->select('f.Floatplan_FloatplanID AS ID, f.Floatplan_AccessID AS PlanID,u.UserDetails_FirstName AS Firstname,u.UserDetails_LastName AS Lastname, u.UserDetails_Username AS Email');
        $this->db->from('floatplan AS f');
        $this->db->join('userdetails AS u', 'u.UserDetails_UserDetailsID = f.Floatplan_UserDetailsID');
        $this->db->where("Floatplan_Status = 'Open' AND Floatplan_ETA < NOW()");
        $query = $this->db->get();
        foreach($query->result() as $row){
            $arrPendingPlans[$row->ID] = array('PlanID'=>$row->PlanID, 'Username'=>$row->Firstname." ".$row->Lastname,'Email'=>$row->Email);
        }
        return $arrPendingPlans;
    }

    function setFloatplanStatus($id,$status)
    {
        $data = array('Floatplan_Status' => $status);
        $this->db->where(array('Floatplan_FloatplanID' => $id));
        $this->db->update('floatplan',$data);
    }
}

/* End of file floatplan_model.php */
/* Location: ./application/models/floatplan_model.php */