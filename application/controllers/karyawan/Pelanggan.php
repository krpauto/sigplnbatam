<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_karyawan();
    $this->load->model('pelanggan_m');
  }
  public function index()
  {
    $data['pelanggan'] = $this->pelanggan_m->get()->result();
    $this->load->view('layout/header_karyawan');
    $this->load->view('karyawan/pelanggan/view',$data);
    $this->load->view('layout/footer');
  }

  public function detail($id){
    $data['pelanggan'] = $this->pelanggan_m->get($id)->row();
    $this->load->view('layout/header_karyawan');
    $this->load->view('karyawan/pelanggan/detail', $data);
    $this->load->view('layout/footer');
  }


}
