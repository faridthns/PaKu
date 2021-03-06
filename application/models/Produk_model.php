<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
  public function getProduk()
  {
    return $this->db->get('produk')->result_array();
  }

  public function getOneData($table)
  {
    return $this->db->get($table)->row_array();
  }

  public function getData($table)
  {
    return $this->db->get($table)->result_array();
  }

  public function getDataId($table, $where, $id)
  {
    return $this->db->get_where($table, [$where => $id])->row_array();
  }

  public function getDataJoin($table, $join, $onjoin)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->join($join, $onjoin);
    $query = $this->db->get();
    return $query;
  }

  public function getProdukJoin()
  {
    $this->db->select('*');
    $this->db->from('produk');
    $query = $this->db->get();
    return $query;
  }

  public function getProdukId($id)
  {
    $this->db->where('id_produk', $id);
    return $this->db->get_where('produk')->row_array();
  }

  public function getMaxJual($limit)
  {
    $query = "SELECT * 
                FROM produk
              WHERE stok > 0  
              ORDER BY riwayat_kerja DESC LIMIT $limit
    ";
    return $this->db->query($query)->result_array();
  }

  public function rulesProduk()
  {
    $config = [
      [
        'field' => 'nama_produk',
        'label' => 'Nama Produk',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'deskripsi',
        'label' => 'Deskripsi',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'harga',
        'label' => 'Harga',
        'rules' => 'required|trim|numeric'
      ]
    ];
    $this->form_validation->set_rules($config);
  }

  public function tambahProduk($data, $file)
  {
    $data = [
      'id_produk' => uniqid(),
      'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
      'deskripsi_produk' => $this->input->post('deskripsi', true),
      'harga' => $this->input->post('harga', true),
      'foto_produk' => $this->_upload()
    ];
    $this->db->insert('produk', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Produk baru berhasil di tambahkan!</div>');
    redirect('produk');
  }

  private function _upload()
  {
    $image = $_FILES['foto']['name'];
    $type = explode(".", $image);
    $type = strtolower(end($type));
    $image_valid = ['jpg', 'jpeg', 'png'];

    if (!in_array($type, $image_valid)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan">File yang di upload harus jpg / png / jpeg!!</div>');
      redirect('produk/tambahproduk');
    }


    $config['upload_path']          = './assets/img/produk';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 2048;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
      return $this->upload->data('file_name');
    } else {
      $this->upload->display_errors();
    }
  }

  public function editProduk($data, $file, $old_image, $where)
  {
    $data = [
      'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
      'deskripsi_produk' => $this->input->post('deskripsi', true),
      'harga' => $this->input->post('harga', true),
      'foto_produk' => $this->_editUpload($old_image)
    ];

    $this->db->where('id_produk', $where);
    $this->db->update('produk', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Produk berhasil di ubah!</div>');
    redirect('produk');
  }

  private function _editUpload($old_image)
  {
    $image = $_FILES['foto']['name'];
    if (!$image) {
      return $old_image;
    }
    $type = explode(".", $image);
    $type = strtolower(end($type));
    $image_valid = ['jpg', 'jpeg', 'png'];

    if (!in_array($type, $image_valid)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-pesan">File yang di upload harus jpg / png / jpeg!!</div>');
      redirect('produk/tambahproduk');
    }


    $config['upload_path']          = './assets/img/produk';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 2048;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
      $old_image = $old_image;
      if ($old_image) {
        unlink(FCPATH . 'assets/img/produk/' . $old_image);
      }
      return $this->upload->data('file_name');
    } else {
      $this->upload->display_errors();
    }
  }
}
