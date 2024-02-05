<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_admin();
    $this->load->model(['user_m','pelanggan_m','odp_m']);
  }
  public function index()
  {
    $data['user'] = $this->user_m->get()->num_rows();
    $data['pelanggan'] = $this->pelanggan_m->get()->num_rows();
    $data['odp'] = $this->odp_m->get()->num_rows();
    $this->load->view('layout/header_admin');
    $this->load->view('admin/dashboard/view',$data);
    $this->load->view('layout/footer');
  }
}
