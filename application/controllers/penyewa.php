<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyewa extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('penyewa_m');
  }

	public function index()
	{
		if ($this->session->userdata('role') == 'SuperAdmin') {
			$data['panggilview']='penyewa_view';
			$data['penyewa'] = $this->penyewa_m->lihat();
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['panggilview']='penyewa_tambah_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah_penyewa() {
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('no_identitas', 'No Identitas', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
				$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required|numeric');
				$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
				$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './uploads/profil/';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('foto'))
					{
						if($this->penyewa_m->upload($this->upload->data()) == true){
							$this->session->set_flashdata('notif', 'Pendaftaran Berhasil');
							redirect('penyewa');
						} else {
							$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
							redirect('penyewa/tambah');
						}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('penyewa/tambah');
				}
				}
			 else {
				redirect('penyewa');
			}
		} else {
			redirect('login');
		}
	}}

	public function edit($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('no_identitas', 'No Identitas', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
				$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required|numeric');
				$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
				$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->penyewa_m->edit($id) == TRUE) {
						$this->session->set_flashdata('notif', 'Edit data Berhasil');
						redirect('penyewa');
					} else {
						$this->session->set_flashdata('notif', 'Edit data Gagal');
						redirect('penyewa');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('penyewa');
				}
			} else {
				redirect('penyewa');
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file penyewa.php */
/* Location: ./application/controllers/penyewa.php */
