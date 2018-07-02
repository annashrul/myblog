<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model{
  public function listUser(){
    $query = $this->db->get('user');
    return $query->result();
  }
  public function register($data){
    $this->db->insert('user',$data);
  }
  public function detail($id_user){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where(array('id_user'  => $id_user));
    $query = $this->db->get();
    return $query->row();
  }
  public function login($username,$password){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where(array(
      'username'  => $username,
      'password'  => $password
    ));
    $query = $this->db->get();
    return $query->row();
  }
  public function update($data){
    $this->db->where('id_user',$data['id_user']);
    $this->db->update('user',$data);
  }
  public function delete($data){
    $this->db->where('id_user',$data['id_user']);
    $this->db->delete('user',$data);
  }
}