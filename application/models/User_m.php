<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
  public function get($id = null)
  {
    $this->db->select("id,username,level");
    $this->db->from("user");
    if ($id != null) {
      $this->db->where('id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $post['username']);
    $this->db->where('password', $post['password']);
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'id' => null,
      'username' => $post['username'],
      'password' => $post['password'],
      'level' => $post['level']
    ];
    $this->db->insert('user', $params);
  }

  public function edit($post)
  {
    $params = [
      'username' => $post['username'],
      'level' => $post['level']
    ];
    if ($post['password'] != null) {

      $params = ['password' => $post['password']];
    }

    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user');
  }

  public function reset($post)
  {
    $params = [
      'username' => $post['userbaru'],      
      'password' => $post['passbaru']
    ];
    $this->db->where('id', $post['idtarget']);
    $this->db->update('user', $params);
  }
}
