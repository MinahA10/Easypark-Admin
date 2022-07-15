<?php
class PlaceModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    function ajoutPlace($data)
    {
        $this->db->insert('place',$data);       
        return true;
    }

    function liste()
    {
        $this->db->select('*');
        $this->db->from('place');
        $query = $this->db->get();
        $res= $query->result_array();
        return $res;
    }

    function statistique()
    {
        $this->db->select('*');
        $this->db->from('_utilisation');
        $query = $this->db->get();
        $res= $query->result_array();
        return $res;
    }

    function updateEtat($id){
        $data=array(
            'etat'=> 'En infraction' 
        ); 
        $this->db->where('id', $id);
        $this->db->update('place', $data);
    }

    function finirinfra($id)
    {
        $data=array(
            'etat'=> 'Libres' 
        ); 
        $this->db->where('id', $id);
        $this->db->update('place', $data);
    }
}
