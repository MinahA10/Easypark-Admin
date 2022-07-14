<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_controller.php');

class TarifController extends Base_Controller {

	public function index()
	{
        $data['tarifs']=$this->TarifModel->liste();
        $data['titre']='Gestion Tarif| EasyPark';
        $data['page']='tarif.php';
        $this->load->view('template',$data);
	}

    public function ajout(){
        $tarif['tarif']=$this->input->post('tarif');
        $tarif['temp']=$this->input->post('duree');
        $tarif['prix']=$this->input->post('prix');
        $this->TarifModel->ajoutTarif($tarif);
        $this->index();
    }

    public function supprimer(){
        $id=$_GET['id'];
        $this->TarifModel->supprimerTarif($id);
        $this->index();
    }
}