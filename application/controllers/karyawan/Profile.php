<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_karyawan();
    $this->load->model('user_m');
  }
  public function index()
  {
    $data['pengguna'] = $this->user_m->get($this->session->userdata('id_user'))->row();
    $this->load->view('layout/header_karyawan');
    $this->load->view('karyawan/profile/view',$data);
    $this->load->view('layout/footer');
  }

  public function reset()
  {
    $post = $this->input->post(null, true);
    if (isset($post['submit'])) {
      $post['idtarget'] = $this->session->userdata('id_user');
      $post['userbaru'] = $post['username'];
      $post['passbaru'] = $post['password'];
      // cek apakah ada username lain tapi bukan id yang sama
      $check_duplicate = $this->db->query("SELECT id,username FROM user WHERE username='$post[userbaru]' AND id != '$post[idtarget]'")->row();

      if ($check_duplicate->username != null) {
        $this->session->set_flashdata('danger', 'Username telah digunakan, gunakan username lain');
        redirect('karyawan/profile');
      } else {
        $this->user_m->reset($post);
        $this->session->set_flashdata('success', 'Username dan Password berhasil diubah');
        redirect('karyawan/profile');
      }
    }
  }
}