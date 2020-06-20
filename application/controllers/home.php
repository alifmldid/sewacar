<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');		
	}

	public function index() {
		$data['car'] = $this->home_model->get_car();
		$this->load->view('home_view',$data);
	}

	public function car($id)
	{
		# code...
		$data['car'] = $this->home_model->get_car();
		$data['main_view'] = 'home_view';
		$this->load->view('template', $data);
	}

}
?>