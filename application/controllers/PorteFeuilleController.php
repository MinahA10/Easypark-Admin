<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_controller.php');

class PorteFeuilleController extends Base_Controller {

	public function index()
	{
        $data['portefeuille']=$this->PorteFeuilleModel->listeNonValide();
        $data['titre']='Porte Feuille | EasyPark';
        $data['page']='portefeuille.php';
        $this->load->view('template',$data);
	}

    public function validation(){
        $montantdemander=$_GET['demander'];
        $iddetail=$_GET['iddetail'];
        $solde=$_GET['solde'];
        $idportefeuille=$_GET['id'];

        $montant=$solde+$montantdemander;
        
        $this->PorteFeuilleModel->updateEtat($iddetail); 
        $this->PorteFeuilleModel->updateSolde($idportefeuille,$montant);
       
        redirect('PorteFeuilleController','refresh');
    }
}