<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori_model extends CI_Model {
  public function listKategori(){
    $this->db->select('kategori.*, user.first_name, user.last_name');
    $this->db->from('kategori');
    $this->db->join('user','user.id_user = kategori.id_user','LEFT');
    $this->db->order_by('id_kategori','DESC');
    $query = $this->db->get();
    return $query;
  }
 
  public function detailKategori($id_kategori){
    $query = $this->db->get_where('kategori',$id_kategori);
    return $query->result();
  }
  public function insertKategori($data){
    $this->db->insert('kategori',$data);
  }
  public function updateKategori($data){
    $this->db->where('id_kategori',$data['id_kategori']);
    $this->db->update('kategori',$data);
  }
  public function deleteKategori($data){
    $this->db->where('id_kategori',$data['id_kategori']);
    $this->db->delete('kategori',$data);
  }

  //SUB KATEGORI//
  public function listSubKategori(){
    $this->db->select('sub_kategori.*, kategori.nama_kategori, user.first_name, user.last_name');
    $this->db->from('sub_kategori');
    $this->db->join('user','user.id_user = sub_kategori.id_user','LEFT');
    $this->db->join('kategori','kategori.id_kategori = sub_kategori.id_kategori','LEFT');
    $this->db->order_by('id_sub_kategori','DESC');
    $query = $this->db->get();
    return $query;
  }
  public function detailSubKategori($id_sub_kategori){
    $query = $this->db->get_where('sub_kategori',$id_sub_kategori);
    return $query->result();
  }
  public function insertSubKategori($data){
    $this->db->insert('sub_kategori',$data);
  }
  public function updateSubKategori($data){
    $this->db->where('id_sub_kategori',$data['id_sub_kategori']);
    $this->db->update('sub_kategori',$data);
  }
  public function deleteSubKategori($data){
    $this->db->where('id_sub_kategori',$data['id_sub_kategori']);
    $this->db->delete('sub_kategori',$data);
  }
  public function groupKategori(){
    $query = $this->db->query("SELECT sub_kategori.*, COUNT(nama_sub_kategori), kategori.nama_kategori, kategori.slug_kategori FROM sub_kategori LEFT JOIN kategori ON kategori.id_kategori = sub_kategori.id_kategori GROUP BY nama_sub_kategori DESC");
    return $query->result();
  }
  
}