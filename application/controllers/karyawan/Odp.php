<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Odp extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_karyawan();
    $this->load->model('odp_m');
  }
  public function index()
  {
    $data['odp'] = $this->odp_m->get()->result();
    $this->load->view('layout/header_karyawan');
    $this->load->view('karyawan/odp/view',$data);
    $this->load->view('layout/footer');
  }

  public function detail($id){
    $data['odp'] = $this->odp_m->get($id)->row();
    $this->load->view('layout/header_karyawan');
    $this->load->view('karyawan/odp/detail', $data);
    $this->load->view('layout/footer');
  }


}
