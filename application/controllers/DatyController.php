<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_controller.php');

class DatyController extends Base_Controller {

	public function index()
	{
        $data['dates']=$this->DatyModel->getNow();  
        $data['titre']='DateSysteme Parking | EasyPark';
        $data['page']='dateSys.php';
        $this->load->view('template',$data);
	}

   public function update()
   {
        $heure=$this->input->post('heure');
        $this->DatyModel->update($heure);
        $this->index();
   }

    public function supprimer(){
        $id=$_GET['id'];
        $this->DateSysModel->supprimer($id);
        redirect('DateSysController');
    }
}