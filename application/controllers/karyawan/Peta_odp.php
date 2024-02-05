<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta_odp extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_karyawan();
    $this->load->model('odp_m');
  }
  public function index()
  {
    if (isset($_GET['key'])) {
      $get = $this->input->get(null, true);
      // cari kolom pelanggan kecuali lat lng
      $search_result = $this->odp_m->search($get);

      if ($search_result->num_rows() == 0) {
        $this->session->set_flashdata('danger', 'Pencarian tidak ditemukan');
        redirect('karyawan/peta_odp');

      } else { 
        $data['odp'] = $search_result->result();
        $this->load->view('layout/header_karyawan');
        $this->load->view('karyawan/peta_odp/view',$data);
        $this->load->view('layout/footer');
      }
    } else {
    $data['odp'] = $this->odp_m->get()->result();
    $this->load->view('layout/header_karyawan');
    $this->load->view('karyawan/peta_odp/view',$data);
    $this->load->view('layout/footer');
    }
  }
}