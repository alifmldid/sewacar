<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyewa_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lihat() {
    return $this->db->order_by('ID_USER', 'ASC')->get('penyewa')->result();
  }

  public function upload($foto)
  {
    $data = array('ID_USER' => NULL,
    'NO_IDENTITAS' => $this->input->post('no_identitas'),
                  'NAMA' => $this->input->post('nama'),
                  'ALAMAT' => $this->input->post('alamat'),
                  'JK' => $this->input->post('jk'),
                  'AGAMA' => $this->input->post('agama'),
                  'NO_HP' => $this->input->post('no_hp'),
                  'TMP_LAHIR' => $this->input->post('tmp_lahir'),
                  'TGL_LAHIR' => $this->input->post('tgl_lahir'),
                  'EMAIL' => $this->input->post('email'),
                  'FOTO' => $foto['file_name']
                );
    $this->db->insert('penyewa', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function edit($id)
  {
    $data = array('NO_IDENTITAS' => $this->input->post('no_identitas'),
                  'NAMA' => $this->input->post('nama'),
                  'ALAMAT' => $this->input->post('alamat'),
                  'JK' => $this->input->post('jk'),
                  'AGAMA' => $this->input->post('agama'),
                  'NO_HP' => $this->input->post('no_hp'),
                  'TMP_LAHIR' => $this->input->post('tmp_lahir'),
                  'TGL_LAHIR' => $this->input->post('tgl_lahir'),
                  'EMAIL' => $this->input->post('email')
                );
    $this->db->where('ID_USER',$id)->update('penyewa', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function detil($id) {
		return $this->db->get_where('penyewa',array('ID_USER'=>$id));
	}

}
