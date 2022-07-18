<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_controller.php');

class ParkingController extends Base_Controller {

	public function index()
	{
                $data['parkings']=$this->ParkingModel->liste();
                $data['titre']='Etat Parking | EasyPark';
                $data['page']='parking.php';
                $this->load->view('template',$data);
	}
}