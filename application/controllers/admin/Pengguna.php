<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_admin();
    $this->load->model('user_m');
  }
  public function index()
  {
    $data['pengguna'] = $this->user_m->get()->result();
    $this->load->view('layout/header_admin');
    $this->load->view('admin/pengguna/view',$data);
    $this->load->view('layout/footer');
  }

  public function add()
  {
    $post = $this->input->post(null, true);
    if (isset($post['submit'])) {

      // cek apakah ada username lain tapi bukan id yang sama
      $check_duplicate = $this->db->query("SELECT id,username FROM user WHERE username='$post[username]'")->row();

      if ($check_duplicate->username != null) {
        $this->session->set_flashdata('danger', 'Username telah digunakan, gunakan username lain');
        redirect('admin/pengguna');
      } else {
        $this->user_m->add($post);
        $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
        redirect('admin/pengguna');
      }
    }
  }

  public function delete($id)
  {
    $data = $this->user_m->get($id)->row();
    $this->user_m->delete($id);
    
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil dihapus');
      redirect('admin/pengguna');
    }
  }

  public function reset()
  {
    $this->load->model('user_m');
    $post = $this->input->post(null, true);
    if (isset($post['reset_pass'])) {
      $post['idtarget'] = $post['id_user'];
      $post['userbaru'] = $post['username'];
      $post['passbaru'] = $post['password'];
      // cek apakah ada username lain tapi bukan id yang sama
      $check_duplicate = $this->db->query("SELECT id,username FROM user WHERE username='$post[userbaru]' AND id != '$post[idtarget]'")->row();

      if ($check_duplicate->username != null) {
        $this->session->set_flashdata('danger', 'Username telah digunakan, gunakan username lain');
        redirect('admin/pengguna');
      } else {
        $this->user_m->reset($post);
        $this->session->set_flashdata('success', 'Username dan Password berhasil diubah');
        redirect('admin/pengguna');
      }
    }
  }
}