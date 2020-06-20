<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
		$this->load->model('transaksi_m');
		$this->load->library('Pdf');
  }

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['peminjaman'] = $this->transaksi_m->lihat();
			$data['panggilview']='transaksi_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function search()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('search','Search','trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->session->set_flashdata('search', $this->input->post('search'));
				redirect('transaksi');
			} else {
				redirect('transaksi');
			}
		} else {
			redirect('transaksi');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['mobil'] = $this->transaksi_m->mobil();
			$data['penyewa'] = $this->transaksi_m->penyewa();
			$data['panggilview']='transaksi_tambah_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah_transaksi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('peminjam', 'Peminjam', 'trim|required');
				$this->form_validation->set_rules('mobil', 'Mobil', 'trim|required');
				$this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->transaksi_m->tambah() == TRUE) {
						$this->session->set_flashdata('notif', 'Peminjaman Berhasil');
						redirect('transaksi');
					} else {
						$this->session->set_flashdata('notif', 'Peminjaman Gagal');
						redirect('transaksi/tambah');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('transaksi/tambah');
				}
			} else {
				redirect('transaksi');
			}
		} else {
			redirect('login');
		}
	}
	
	public function struk($id)
	{
		$data['struk'] = $this->transaksi_m->get_struk($id);
		$this->load->library('Pdf');
		$this->load->view('makepdf', $data);
	}

	public function kembali()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(3);
			// if ($this->uri->segment(4) == '') {
			// 	$denda = $this->uri->segment(4);
			// } else {
			// 	echo "ha";
			// }
			$denda = $this->uri->segment(4);

			if ($this->transaksi_m->kembali($id, $denda) == TRUE) {
				$this->session->set_flashdata('notif', 'Pengembalian Berhasil');
				redirect('transaksi');
			} else {
				$this->session->set_flashdata('notif', 'Pengembalian Gagal');
				redirect('transaksi');
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */
