<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    user_already_login();
    $this->load->view('auth/login');
  }

  public function register()
  {
    $this->load->model(['user_m', 'masyarakat_m']);
    $post = $this->input->post(null, TRUE);
    if (isset($post['register'])) {

      $this->form_validation->set_rules(
        'username',
        'Username',
        'required|is_unique[user.username]',
        array(
          'is_unique' => 'Username telah dipakai User lain'
        )
      );

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('auth/register');
      } else {
        $post['level'] = 3;

        $this->user_m->add($post);
        $user = $this->user_m->login($post)->row();
        $post['id_user'] = $user->id;
        $this->masyarakat_m->add($post);

        $this->session->set_flashdata('success', 'Registrasi Berhasil, Silahkan Login');
        redirect('auth/login');
      }
    } else {
      $this->load->view('auth/register');
    }
  }

  public function process()
  {
    $this->load->model('user_m');
    // ambil data
    $post = $this->input->post(NULL, TRUE);
    if (isset($post['submit'])) {
      $query = $this->user_m->login($post);
      if ($query->num_rows() > 0) {
        $row = $query->row();
        $params = array(
          'id_user' => $row->id,
          'username' => $row->username,
          'level' => $row->level
        );
        $this->session->set_userdata($params);
        $this->session->set_flashdata('success', 'Hi,Selamat Datang');

        if ($row->level == 1) {
          redirect('admin/dashboard');
        } elseif ($row->level == 2) {
          redirect('karyawan/dashboard');
        }
      } else {
        $this->session->set_flashdata('danger', 'Masukkan Username / Password yang benar.');
        redirect('auth/login');
      }
    }
  }
  public function logout()
  {
    $params = array('id_user', 'username', 'level');
    $this->session->unset_userdata($params);

    $this->session->set_flashdata('success', 'Berhasil Logout');
    redirect('auth/login');
  }
}