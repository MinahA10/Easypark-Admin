<?php
class PorteFeuilleModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function listeNonValide(){
        $this->db->select('*');
        $this->db->from('_portefeuille');
        $this->db->where('etat','non valider');
        $query = $this->db->get();
        $res= $query->result_array();
        return $res;
    }

    function updateEtat($id){
        $data=array(
            'etat'=>'valider'
        ); 
        $this->db->where('id', $id);
        $this->db->update('detailportefeuille', $data);
    }

    function updateSolde($id,$montant){     
        $data=array(
            'montant'=>$montant
        );  
        $this->db->where('id', $id);
        $this->db->update('portefeuille',$data);  
    }
}