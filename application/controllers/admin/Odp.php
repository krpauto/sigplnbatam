<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Odp extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_admin();
    $this->load->model('odp_m');
  }
  public function index()
  {
    $data['odp'] = $this->odp_m->get()->result();
    $this->load->view('layout/header_admin');
    $this->load->view('admin/odp/view',$data);
    $this->load->view('layout/footer');
  }

  public function add()
  {
    $config['upload_path']    = "./uploads/odp";
    $config['allowed_types']  = "jpg|jpeg|png";
    $config['max_size']      = 5024;
    $config['file_name']    = 'foto_odp'  . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 6);
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
          redirect('admin/odp/add');
        }
      } else {
        $post['foto'] = null;
      }
      $post['id_user'] = $this->session->userdata('id_user');
      // masukkan ke db
      $this->odp_m->add($post);
      $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
      redirect('admin/odp');

    } // tampilan utama
    else {
      $this->load->view('layout/header_admin');
      $this->load->view('admin/odp/add');
      $this->load->view('layout/footer');
    }
  }

  public function edit($id)
  {
    // mendapatkan data untuk dikirim ke view
    $query = $this->odp_m->get($id)->row();
    $post = $this->input->post(null, true);
    $data['data'] = $query;
    $post['id'] = $id;

    $config['upload_path']    = "./uploads/odp";
    $config['allowed_types']  = "jpg|jpeg|png";
    $config['max_size']      = 5024;
    $config['file_name']    = 'foto_odp'  . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 6);
    $this->load->library('upload', $config);

    // PROSES EDIT DATA
    if (isset($post['submit'])) {
      $post['lat'] = str_replace(',','.',$post['lat']);
      $post['lng'] = str_replace(',','.',$post['lng']);
      if (@$_FILES['foto']['name'] != null) {
        if ($this->upload->do_upload('foto')) {
          $post['foto'] = $this->upload->data('file_name');
          if($query->foto != null){
            unlink("uploads/odp/" . $query->foto);
          }
        } else {
          $this->session->set_flashdata('danger', 'Silahkan dipastikan Foto Berukuran Max 5mb dengan Format JPG, JPEG atau PNG');
          redirect('admin/odp/edit/'. $id);
        }
      } else {
        $post['foto'] = null;
      }

      $this->odp_m->edit($post);
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('admin/odp');
    }
    // tampilan utama
    else {
      $this->load->view('layout/header_admin');
      $this->load->view('admin/odp/edit', $data);
      $this->load->view('layout/footer');
    }
  }

  public function delete($id)
  {
    $data = $this->odp_m->get($id)->row();
    $this->odp_m->delete($id);
    
    if($data->foto != null){
      unlink("uploads/odp/" . $data->foto);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil dihapus');
      redirect('admin/odp');
    }
  }

  public function detail($id){
    $data['odp'] = $this->odp_m->get($id)->row();
    $this->load->view('layout/header_admin');
    $this->load->view('admin/odp/detail', $data);
    $this->load->view('layout/footer');
  }


}
