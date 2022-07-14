<?php
class UserModel extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function loginAdmin($email,$password){

        $this->db->select('id,nom,prenom,mail,mdp');
        $this->db->from('admin');
        $this->db->where('mail', $email);
        $this->db->where('mdp', sha1($password));
        $query = $this->db->get();
        
        $user = $query->row();
        
        if(!empty($user)){
            return $user;
        } else {
            return array();
        }
    }
    
    public function login($email,$password){
        $this->db->select('id,nom,prenom,mail,mdp');
        $this->db->from('client');
        $this->db->where('mail', $email);
        $this->db->where('mdp', sha1($password));
        $query = $this->db->get();
        
        $user = $query->row();
        
        if(!empty($user)){
            return $user;
        } else {
            return array();
        }
    }

    function insertUser($data)
    {
        $this->db->insert('user',$data);
        
        return true;
    }

    public function finddetailusers($id){

        $sql = "select * from client where id=%d";
		$sql = sprintf($sql,$id);
		$query = $this->db->query($sql);
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		return $data ;
    }    
}