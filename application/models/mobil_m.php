<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mobil_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lihat() {
    return $this->db->order_by('ID_MOBIL', 'DESC')->get('mobil')->result();
  }

  public function upload($foto)
  {
    $data = array('ID_MOBIL' => NULL,
                  'NO_SERI' => $this->input->post('no_seri'),
                  'MERK_MOBIL' => $this->input->post('merk_mobil'),
                  'JENIS' => $this->input->post('jenis'),
                  'DESKRIPSI' => $this->input->post('deskripsi'),
                  'HARGA_SEWA' => $this->input->post('harga_sewa'),
                  'FOTO_MOBIL' => $foto['file_name']
                );
    $this->db->insert('mobil', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function edit($id)
  {
    $data = array('NO_SERI' => $this->input->post('no_seri'),
                  'MERK_MOBIL' => $this->input->post('merk_mobil'),
                  'JENIS' => $this->input->post('jenis'),
                  'DESKRIPSI' => $this->input->post('deskripsi'),
                  'HARGA_SEWA' => $this->input->post('harga_sewa')
                  );
    $this->db->where('ID_MOBIL',$id)->update('mobil', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function delete($id)
  {
    return $this->db->delete('mobil', array('ID_MOBIL'=>$id));
  }

}
