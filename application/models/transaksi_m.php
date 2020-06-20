<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lihat() {
    $this->db->select('*');
    $this->db->from('pinjam');
    $this->db->join('mobil', 'mobil.ID_MOBIL=pinjam.ID_MOBIL');
    $this->db->join('petugas', 'pinjam.ID_PETUGAS=petugas.ID_PETUGAS');
    $this->db->join('penyewa', 'penyewa.ID_USER=pinjam.ID_USER');
    $this->db->order_by('pinjam.TANGGAL_PINJAM','desc');

    return $this->db->get()->result();
  }

  public function search($sc)
  {
    $this->db->select('*');
    $this->db->from('pinjam');
    $this->db->join('mobil', 'mobil.ID_MOBIL=detail_pinjam.ID_MOBIL');
    $this->db->join('petugas', 'pinjam.ID_PETUGAS=petugas.ID_PETUGAS');
    $this->db->join('penyewa', 'penyewa.ID_USER=pinjam.ID_USER');
    $this->db->where('pinjam.TANGGAL',$sc)->or_like('penyewa.NAMA',$sc)->or_like('mobil.NO_SERI',$sc)->or_like('mobil.MERK_MOBIL',$sc);
    $this->db->order_by('pinjam.TANGGAL','desc');

    return $this->db->get()->result();
  }

  public function mobil()
  {
    return $this->db->where('STATUS', 'Tersedia')->get('mobil')->result();
  }

  public function penyewa()
  {
    return $this->db->get('penyewa')->result();
  }

  public function get_struk($id)
  {
    $this->db->join('mobil', 'mobil.ID_MOBIL=pinjam.ID_MOBIL');
    $this->db->join('penyewa', 'penyewa.ID_USER=pinjam.ID_USER');    
    return $this->db->where('ID_PINJAM',$id)->get('pinjam')->result();
  }


  public function lihat_harga_mobil($id){
    return $this->db->limit(1)->where('ID_MOBIL',$id)->get('mobil')->result()[0]->HARGA_SEWA;
  }


  public function tambah()
  {
    $t_pinjam = date_create(date('Y-m-d'));
    $t_kembali = date_create($this->input->post('tanggal_kembali'));
    $interval_hari = date_diff($t_pinjam,$t_kembali)->days;
    $total = ($this->lihat_harga_mobil($this->input->post('mobil')))*$interval_hari;
    $pinjam = array('ID_PETUGAS' => $this->session->userdata('id'),
                  'ID_USER' => $this->input->post('peminjam'),
                  'ID_MOBIL' => $this->input->post('mobil'),
                  'TANGGAL_PINJAM' => date('Y-m-d'),
                  'TANGGAL_KEMBALI' => $this->input->post('tanggal_kembali'),
                  'STATUS_PINJAM' => 'Belum Kembali',
                  'TOTAL' => $total
                );
    $this->db->insert('pinjam', $pinjam);
    $data = array('STATUS' => 'Disewa');
    $this->db->where('ID_MOBIL',$this->input->post('mobil'))->update('mobil',$data);

    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function kembali($id, $denda)
  {
    if ($denda == 0) {
      $status = 'Tepat waktu';
    } else {
      $status = 'Terlambat';
    }

    $data = array(
                  'ID_PETUGAS' => $this->session->userdata('id'),
                  'DENDA' => $denda,
                  'STATUS_PINJAM' => $status
                );
    $this->db->where('ID_PINJAM',$id)->update('pinjam',$data);

    $ID_MOBIL = $this->db->select('ID_MOBIL')->where('ID_PINJAM', $id)->get('pinjam')->result_array();
    $ID_MOBIL = array_shift($ID_MOBIL)['ID_MOBIL'];

    $data = array('STATUS' => 'Tersedia');
    $this->db->where('ID_MOBIL',$ID_MOBIL)->update('mobil',$data);

    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

}
