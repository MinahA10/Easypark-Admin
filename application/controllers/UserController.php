<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_controller.php');

class UserController extends Base_Controller {

	public function index()
	{
        $this->load->view('login');
	}

	public function inscription(){
		$this->load->view('inscription');
	}

    public function log(){
       
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run()== FALSE)
        {
            $this->session->set_flashdata('error', 'Email ou Mot de passe invalide');
            $this->index();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');
            
            $result = array();
            //$super = $this->input->post('admin');

           
            $result=$this->UserModel->loginAdmin($email, $password);    

          

            if(!empty($result))
            {    
                           
                $sessionArray = array('userId'=>$result->id,                    
                                    'nom'=>$result->nom,
                                    'prenom'=>$result->prenom,
                                    'email'=>$result->mail,
                                    'isSuperAdmin'=>TRUE,
                                    'isLoggedIn' => TRUE
                            );

                $this->session->set_userdata($sessionArray);
                redirect('PlaceController','refresh');         
                
            }
            else
            {
                $this->session->set_flashdata('error', 'Verifier votre Email ou Mot de passe');    
                $this->index();
            }
        }

    }
    
    
    /*public function inscris(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|max_length[32]');
        $this->form_validation->set_rules('pass2', 'Password', 'required|max_length[32]');
     
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Email ou Mot de passe invalide');
            $this->inscription();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('pass');
            $password1 = $this->input->post('pass2');
            $nom= $this->input->post('nom');
            $prenom = $this->input->post('prenom');

            $data['nom']=$nom;
            $data['prenom']=$prenom;
            $data['mail']=$email;
            $data['mdp']=sha1($password);
            
            $donnee['data']=$data;
            if($password!=$password1){
                $this->session->set_flashdata('error', 'Mot de passe different');  
                $this->load->view('inscription',$donnee);
                
            }else{
                          
                $this->UserModel->insertUser($data);
                $this->session->set_flashdata('success', 'Veuillez verifier votre email pour validation de l inscription');
                $this->load->view('inscription',$donnee);
            }
        }
    }*/

    public function logout()  
    {    
            $this->session->sess_destroy();
            $this->index();
        
    }  
}

       

