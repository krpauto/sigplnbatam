<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_admin();
    $this->load->model('pelanggan_m');
  }
  public function index()
  {
    $data['pelanggan'] = $this->pelanggan_m->get()->result();
    $this->load->view('layout/header_admin');
    $this->load->view('admin/pelanggan/view',$data);
    $this->load->view('layout/footer');
  }

  public function add()
  {
    $config['upload_path']    = "./uploads/pelanggan";
    $config['allowed_types']  = "jpg|jpeg|png";
    $config['max_size']      = 5024;
    $config['file_name']    = 'foto_pelanggan'  . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 6);
    $this->load->library('upload', $config);

    $post = $this->input->post(null, true);
    if (isset($post['submit'])) {
      $post['lat'] = str_replace(',','.',$post['lat']);
      $post['lng'] = str_replace(',','.',$post['lng']);
      if (@$_FILES['foto']['name'] != null) {
        if ($this->upload->do_upload('foto')) {
          $post['foto'] = $this->upload->data('file_name');
        } else {
          $this->session->set_flashdata('danger', 'Silahkan dipastikan Foto Berukuran Max 5mb dengan Format JPG, JPEG atau PNG');
          redirect('admin/pelanggan/add');
        }
      } else {
        $post['foto'] = null;
      }
      $post['id_user'] = $this->session->userdata('id_user');
      // masukkan ke db
      $this->pelanggan_m->add($post);
      $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
      redirect('admin/pelanggan');

    } // tampilan utama
    else {
      $this->load->view('layout/header_admin');
      $this->load->view('admin/pelanggan/add');
      $this->load->view('layout/footer');
    }
  }

  public function edit($id)
  {
    // mendapatkan data untuk dikirim ke view
    $query = $this->pelanggan_m->get($id)->row();
    $post = $this->input->post(null, true);
    $data['data'] = $query;
    $post['id'] = $id;

    $config['upload_path']    = "./uploads/pelanggan";
    $config['allowed_types']  = "jpg|jpeg|png";
    $config['max_size']      = 5024;
    $config['file_name']    = 'foto_pelanggan'  . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 6);
    $this->load->library('upload', $config);

    // PROSES EDIT DATA
    if (isset($post['submit'])) {
      $post['lat'] = str_replace(',','.',$post['lat']);
      $post['lng'] = str_replace(',','.',$post['lng']);
      if (@$_FILES['foto']['name'] != null) {
        if ($this->upload->do_upload('foto')) {
          $post['foto'] = $this->upload->data('file_name');
          if($query->foto != null){
            unlink("uploads/pelanggan/" . $query->foto);
          }
        } else {
          $this->session->set_flashdata('danger', 'Silahkan dipastikan Foto Berukuran Max 5mb dengan Format JPG, JPEG atau PNG');
          redirect('admin/pelanggan/edit/'. $id);
        }
      } else {
        $post['foto'] = null;
      }

      $this->pelanggan_m->edit($post);
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('admin/pelanggan');
    }
    // tampilan utama
    else {
      $this->load->view('layout/header_admin');
      $this->load->view('admin/pelanggan/edit', $data);
      $this->load->view('layout/footer');
    }
  }

  public function delete($id)
  {
    $data = $this->pelanggan_m->get($id)->row();
    $this->pelanggan_m->delete($id);
    
    if($data->foto != null){
      unlink("uploads/pelanggan/" . $data->foto);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil dihapus');
      redirect('admin/pelanggan');
    }
  }

  public function detail($id){
    $data['pelanggan'] = $this->pelanggan_m->get($id)->row();
    $this->load->view('layout/header_admin');
    $this->load->view('admin/pelanggan/detail', $data);
    $this->load->view('layout/footer');
  }


}
