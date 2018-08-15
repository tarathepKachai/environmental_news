<?php
class Manage_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ListAct()
    {
        $data = $this->db->query("SELECT * FROM env_activity")->result_array(); 
        return $data;
    }
    
    public function Get_slide(){
        
        $query = $this->db->get("env_slide");
        
        return $query->result_array();
    }
}
?>