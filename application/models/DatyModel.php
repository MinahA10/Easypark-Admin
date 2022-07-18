<?php
class DatyModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function update($heure){
        $data=array(
            'daty'=>$heure,
        );
        $this->db->update('daty', $data);
    }

    public function getNow(){

        $this->db->select('IFNULL(daty,CURRENT_TIME()) as daty');
        $this->db->from('daty'); 
        $query = $this->db->get();
        $res= $query->result();
        return $res[0]->daty;
            
    }

}