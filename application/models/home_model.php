<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_car()
	{
		return $this->db->select('*')
						->from('mobil')
						->get()->result();
	}

}