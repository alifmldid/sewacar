<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lihat() {
    return $this->db->order_by('ID_PETUGAS', 'ASC')->get('petugas')->result();
  }

  public function upload()
  {
    $data = array('ID_PETUGAS' => NULL,
                  'USERNAME' => $this->input->post('username'),
                  'PASSWORD' => $this->input->post('password'),
                  'NAMA' => $this->input->post('nama'),
                  'ROLE' => $this->input->post('role')
                );
    $this->db->insert('petugas', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function edit($id)
  {
    $data = array('USERNAME' => $this->input->post('username'),
                  'PASSWORD' => $this->input->post('password'),
                  'NAMA' => $this->input->post('nama'),
                  'role' => $this->input->post('role')
                );
    $this->db->where('ID_PETUGAS',$id)->update('petugas', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function detil($id) {
		return $this->db->get_where('petugas',array('ID_PETUGAS'=>$id));
	}

  public function delete($id)
  {
    return $this->db->delete('petugas', array('ID_PETUGAS'=>$id));
  }

}
