<?php
class ParkingModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function liste(){
        $this->db->select('*');
        $this->db->from('_placeparking');
        $this->db->where('etat',1);
        $query = $this->db->get();
        $res= $query->result_array();
        return $res;
    }
}