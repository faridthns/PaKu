<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('beranda');
    }

    $data['hero'] = $this->Produk_model->getMaxJual(2);
    
    $data['produk'] = $this->Produk_model->getProduk();
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['judul'] = "PAKU | Tamu";
    $this->load->view('tamu/index', $data);
  }
}
