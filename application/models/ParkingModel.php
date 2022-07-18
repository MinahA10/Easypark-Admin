<?php
class ParkingModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function liste(){
        $this->db->select('*');
        $this->db->from('_place');
        $this->db->where('etat','Occupe','En infraction');
        $this->db->where('idclient',null);
        $query = $this->db->get();
        $res= $query->result_array();
        return $res;
    }
}