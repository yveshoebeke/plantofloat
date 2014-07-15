<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trustee_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    
    function getTrusteeStats($userdetailsID)
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

        $button_edit = "<button type='submit' class='btn btn-mini btn-success'>Edit Trustee</button>";
        $button_delete = "<button type='submit' class='btn btn-mini btn-danger'>Remove Trustee</button>";
        $sql="SELECT 
                    CONCAT(Contact_FirstName,' ',Contact_LastName) AS `Contact`,
                    \"". $button_edit . "\" AS `Edit Trustee`,
                    \"". $button_delete . "\" AS `Delete Trustee`
                FROM 
                    `contact`
                WHERE 
                    Contact_UserDetailsID=".$userdetailsID;

//echo $sql;exit();
        
        $query = $this->db->query($sql,array());
        /*
        $this->db->select('CONCAT(Contact_FirstName," ",Contact_LastName) AS `Contact`,' . ,false);
        $this->db->where(array('Contact_UserDetailsID' => $userdetailsID));
        $this->db->order_by("Contact_LastName", "asc");     
        $query = $this->db->get('contact');
        */
        $tmpl = array ( 'table_open'  => '<table class="table table-striped table-bordered table-hover">' );
        $this->table->set_template($tmpl);
        $contactData = $this->table->generate($query);

    	$returnResult = array(
    					'mode' => 'trustee',
    					'contact' => $contactData,
    					);
        return $returnResult;
    }

    function addContactDetailsRecord($arrRecord)
    {
        $this->db->insert('contact', $arrRecord); 
    }
}


/* End of file trustee_model.php */
/* Location: ./application/models/trustee_model.php */