<?php

function check_admin()
{
  $ci = &get_instance();
  $user_level = $ci->session->userdata('level');
  if ($user_level != 1) {
    $ci->session->set_flashdata('danger', 'Akses Gagal');
    redirect('auth/login');
  }
}

function check_karyawan()
{
  $ci = &get_instance();
  $user_level = $ci->session->userdata('level');
  if ($user_level != 2) {
    $ci->session->set_flashdata('danger', 'Akses Gagal');
    redirect('auth/login');
  }
}


function check_allogin()
{
  $ci = &get_instance();
  $user_level = $ci->session->userdata('level');
  if ($user_level == 1) {
    // admin
    $ci->session->set_flashdata('danger', 'Akses Gagal');
    redirect('admin/dashboard');
  } elseif ($user_level == 2) {
    // karyawan
    $ci->session->set_flashdata('danger', 'Akses Gagal');
    redirect('karyawan/dashboard');
  }
}
function user_already_login()
{
  $ci = &get_instance();
  $user_session = $ci->session->userdata('id_user');
  $user_level = $ci->session->userdata('level');
  if ($user_session) {
    if ($user_level == 1) {
      redirect('admin/dashboard');
    } elseif ($user_level == 2) {
      redirect('karyawan/dashboard');
    }
  }
}


