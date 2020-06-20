<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('petugas_m');
  }

	public function index()
	{
		if ($this->session->userdata('role') == 'SuperAdmin') {
			$data['panggilview']='petugas_view';
			$data['petugas'] = $this->petugas_m->lihat();
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['panggilview']='petugas_tambah_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah_petugas() {
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('role', 'Role', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->petugas_m->upload() == TRUE) {
						$this->session->set_flashdata('notif', 'Pendaftaran Berhasil');
						redirect('petugas');
					} else {
						$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
						redirect('petugas/tambah');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('petugas/tambah');
				}
		} else {
			redirect('login');
		}
	}}

	public function hapus($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->petugas_m->delete($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('petugas');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('petugas');
			}
		} else {
			redirect('login');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('role', 'Role', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->petugas_m->edit($id) == TRUE) {
						$this->session->set_flashdata('notif', 'Edit data Berhasil');
						redirect('petugas');
					} else {
						$this->session->set_flashdata('notif', 'Edit data Gagal');
						redirect('petugas');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('petugas');
				}
			} else {
				redirect('petugas');
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file petugas.php */
/* Location: ./application/controllers/petugas.php */
