<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_controller.php');

class PlaceController extends Base_controller{

	public function index()
	{
        $data['places']=$this->PlaceModel->liste();
        $data['titre']='Place | EasyPark';
        $data['page']='place.php';
        $this->load->view('template',$data);
	}

    public function ajouter(){
        
        $this->form_validation->set_rules('lieu', 'Lieu', 'required|max_length[50]');
        
        if($this->form_validation->run()== FALSE)
        {
            $this->session->set_flashdata('error', 'Lieu ou Reference invalide');
            $this->index();
        }
        else
        {
            $place['lieu']=$this->input->post('lieu');
            $this->PlaceModel->ajoutPlace($place);
            
            redirect('PlaceController','refresh');
        }
    }

    public function statistique(){
        $data['placeStat']=$this->PlaceModel->statistique();
        $data['titre']='Statistique | EasyPark';
        $data['page']='statistique.php';
        $this->load->view('template',$data);
    }

}