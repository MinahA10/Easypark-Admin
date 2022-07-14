<?php
class TarifModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    function ajoutTarif($data)
    {
        $this->db->insert('tarif',$data);       
        return true;
    }

    public function liste(){
        $this->db->select('*');
        $this->db->from('tarif');
        $query = $this->db->get();
        $res= $query->result_array();
        return $res;
    }

    public function supprimerTarif($id){
        $this->db->where("id", $id);
        $this->db->delete("tarif");
    }
}