<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Odp_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->select("*");
    $this->db->from("odp");
    if ($id != null) {
      $this->db->where('id', $id);
    }
    $this->db->order_by('id', 'desc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'id' => null,
      'nama' => $post['nama'],
      'alamat' => $post['alamat'],
      'lat' => $post['lat'],
      'lng' => $post['lng'],
      'foto' => $post['foto'],
      'status'=> $post['status'],
      'id_user' => $post['id_user']
    ];
    $this->db->insert('odp', $params);
  }

  public function edit($post)
  {
    $params = [
      'nama' => $post['nama'],
      'alamat' => $post['alamat'],
      'lat' => $post['lat'],
      'lng' => $post['lng'],
      'status'=> $post['status']
    ];

    if($post['foto'] != null){
      $params['foto'] = $post['foto'];
    }

    $this->db->where('id', $post['id']);
    $this->db->update('odp', $params);
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('odp');
  }

  public function search($get){
    $this->db->select('*');
    $this->db->from('odp');
    $this->db->like('nama', $get['key']);
    $this->db->or_like('alamat', $get['key']);
    $this->db->or_like('status', $get['key']);
    $this->db->order_by('id', 'asc');
    $query = $this->db->get();
    return $query;
}
}