<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mobil extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('mobil_m');
  }

	public function index()
	{
		if ($this->session->userdata('role') == 'SuperAdmin') {
			$data['panggilview']='mobil_view';
			$data['mobil'] = $this->mobil_m->lihat();
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['panggilview']='mobil_tambah_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah_mobil() {
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('no_seri', 'Nomor Seri', 'trim|required');
				$this->form_validation->set_rules('merk_mobil', 'Merk', 'trim|required');
				$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('harga_sewa', 'Harga Sewa', 'trim|required');


				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './uploads/mobil/';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('foto'))
					{
						if($this->mobil_m->upload($this->upload->data()) == true){
							$this->session->set_flashdata('notif', 'Pendaftaran Berhasil');
							redirect('mobil');
						} else {
							$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
							redirect('mobil/tambah');
						}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('mobil/tambah');
				}
				}
			 else {
				redirect('mobil');
			}
		} else {
			redirect('login');
		}
	}}

	public function hapus($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->mobil_m->delete($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('mobil');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('mobil');
			}
		} else {
			redirect('login');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('no_seri', 'Nomor Seri', 'trim|required');
				$this->form_validation->set_rules('merk_mobil', 'Merk', 'trim|required');
				$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('harga_sewa', 'Harga Sewa', 'trim|required');


				if ($this->form_validation->run() == TRUE) {
					if ($this->mobil_m->edit($id) == TRUE) {
						$this->session->set_flashdata('notif', 'Edit data Berhasil');
						redirect('mobil');
					} else {
						$this->session->set_flashdata('notif', 'Edit data Gagal');
						redirect('mobil');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('mobil');
				}
			} else {
				redirect('mobil');
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file mobil.php */
/* Location: ./application/controllers/mobil.php */
