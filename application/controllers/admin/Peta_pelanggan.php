<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta_pelanggan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_admin();
    $this->load->model('pelanggan_m');
  }
  public function index()
  {
    if (isset($_GET['key'])) {
      $get = $this->input->get(null, true);
      // cari kolom pelanggan kecuali lat lng
      $search_result = $this->pelanggan_m->search($get);

      if ($search_result->num_rows() == 0) {
        $this->session->set_flashdata('danger', 'Pencarian tidak ditemukan');
        redirect('admin/peta_pelanggan');

      } else { 
        $data['pelanggan'] = $search_result->result();
        $this->load->view('layout/header_admin');
        $this->load->view('admin/peta_pelanggan/view',$data);
        $this->load->view('layout/footer');
      }
    } else {
    $data['pelanggan'] = $this->pelanggan_m->get()->result();
    $this->load->view('layout/header_admin');
    $this->load->view('admin/peta_pelanggan/view',$data);
    $this->load->view('layout/footer');
    }
  }
}