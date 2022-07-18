<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
		$this->load->model('DatyModel');
		$this->load->model('PlaceModel');
		$this->load->model('ParkingModel');
		$this->load->model('PorteFeuilleModel');
		$this->load->model('TarifModel');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper('security');
    }
}