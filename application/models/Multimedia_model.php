<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Multimedia_model extends CI_Model {
  /*******IMAGES*******/
  public function listImage($id_user){
    $this->db->select('image.*, user.first_name, user.last_name');
    $this->db->from('image');
    $this->db->where('user.id_user',$id_user);
    $this->db->join('user','user.id_user = image.id_user','LEFT');
    $this->db->order_by('id_image','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function listImagePublish(){
    $this->db->select('image.*, user.first_name, user.last_name');
    $this->db->from('image');
    $this->db->join('user','user.id_user = image.id_user','LEFT');
    $this->db->order_by('id_image','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function detailImage($id_image){
    $query = $this->db->get_where('image',array('id_image' => $id_image));
    return $query->row();
  }
  public function insertImage($data){
    $this->db->insert('image',$data);
  }
  public function updateImage($data){
    $this->db->where('id_image',$data['id_image']);
    $this->db->update('image',$data);
  }
  public function deleteImage($data){
    $this->db->where('id_image',$data['id_image']);
    $this->db->delete('image',$data);
  }
  /*******VIDEOS*******/
  public function listVideo($id_user){
    $this->db->select('video.*, user.first_name, user.last_name');
    $this->db->from('video');
    $this->db->join('user','user.id_user = video.id_user','LEFT');
    $this->db->where('user.id_user',$id_user);
    $this->db->order_by('id_video','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function listVideoPublish(){
    $this->db->select('video.*, user.first_name, user.last_name');
    $this->db->from('video');
    $this->db->join('user','user.id_user = video.id_user','LEFT');
    $this->db->order_by('id_video','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function detailVideo($id_video){
    $query = $this->db->get_where('video',array('id_video' => $id_video));
    return $query->row();
  }
  public function insertvideo($data){
    $this->db->insert('video',$data);
  }
  public function updatevideo($data){
    $this->db->where('id_video',$data['id_video']);
    $this->db->update('video',$data);
  }
  public function deletevideo($data){
    $this->db->where('id_video',$data['id_video']);
    $this->db->delete('video',$data);
  }
  /*******AUDIOS*******/
  public function listAudio($id_user){
    $this->db->select('audio.*, user.first_name, user.last_name');
    $this->db->from('audio');
    $this->db->join('user','user.id_user = audio.id_user','LEFT');
    $this->db->where('user.id_user',$id_user);
    $this->db->order_by('id_audio','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function listAudioPublish(){
    $this->db->select('audio.*, user.first_name, user.last_name');
    $this->db->from('audio');
    $this->db->join('user','user.id_user = audio.id_user','LEFT');
    $this->db->order_by('id_audio','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function detailAudio($id_audio){
    $query = $this->db->get_where('audio',array('id_audio' => $id_audio));
    return $query->row();
  }
  public function insertAudio($data){
    $this->db->insert('audio',$data);
  }
  public function updateAudio($data){
    $this->db->where('id_audio',$data['id_audio']);
    $this->db->update('audio',$data);
  }
  public function deleteAudio($data){
    $this->db->where('id_audio',$data['id_audio']);
    $this->db->delete('audio',$data);
  }
}