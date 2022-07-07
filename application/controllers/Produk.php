<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
  }

  public function index()
  {
    cek_admin();
    $data['judul'] = "PAKU | Daftar Produk";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());

    // all about data produk
    $data['produk'] = $this->Produk_model->getProdukJoin()->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('produk/index');
    $this->load->view('templates/footer', $data);
  }

  public function dProduk($id)
  {
    $data['judul'] = "PAKU | Detail Produk";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());


    // all about data produk
    $data['produk'] = $this->Produk_model->getProdukId($id);


    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('produk/d-produk');
    $this->load->view('templates/footer', $data);
  }

  public function daftarProduk()
  {

    $data['judul'] = "PAKU | Daftar Produk";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());

    if (empty($id)) {
      $id = 5;
    } else {
      $id = $this->input->post('id', true);
    }
    $data['produk'] = $this->Produk_model->getProduk($id)->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('produk/daftar-produk');
    $this->load->view('templates/footer', $data);
  }

  public function getProduk()
  {

    $id = $this->input->post('id', true);
    $data['produk'] = $this->Produk_model->getProduk($id)->result_array();
    echo json_encode($data['produk']);
  }

  public function tambahProduk()
  {
    cek_admin();
    $data['judul'] = "PAKU | Tambah Produk";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();

    $this->Produk_model->rulesProduk();

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('produk/tambah-produk', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->Produk_model->tambahProduk($this->input->post(), $_FILES);
      die;
    }
  }

  public function editProduk($id)
  {
    cek_admin();
    $data['judul'] = "PAKU | Edit Produk";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->db->get('kontak')->row_array();
    $data['produk'] = $this->Produk_model->getProdukId($id);
    $data['jml_pesanan'] = count($this->db->get_where('pesanan', ['status_pengiriman' => 0])->result_array());

    $this->Produk_model->rulesProduk();

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('produk/edit-produk', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->Produk_model->editProduk($this->input->post(), $_FILES, $data['produk']['foto_produk'], $id);
      die;
    }
  }

  public function hapusProduk($id)
  {
    cek_admin();
    $data['produk'] = $this->Produk_model->getProdukId($id);
    $this->db->delete('produk', ['id_produk' => $id]);
    unlink(FCPATH . 'assets/img/produk/' . $data['produk']['foto_produk']);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Produk berhasil hapus!!</div>');
    redirect('produk');
  }

  public function cetak_produk()
  {
    $data['produk'] = $this->db->query(
      "SELECT * FROM produk"
    )->result_array();

    $this->load->view('produk/laporan-print-produk', $data);
  }

  public function laporan_produk_pdf()
  {
    $this->load->library('Dompdf_gen');

    $data['produk'] = $this->db->query(
      "SELECT * FROM produk"
    )->result_array();

    $this->load->view('produk/laporan-pdf-produk', $data);

    $paper = 'A4';
    $orien = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper, $orien);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporan data Kuli.pdf");
  }

  public function export_excel_produk()
  {
    $produk = array(
      'title' => 'Laporan Data Kuli',
      'laporan' => $this->db->query("SELECT * FROM produk")->result_array()
    );
    $this->load->view('produk/export-excel-produk', $produk);
  }
}
