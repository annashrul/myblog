<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
  public function index(){
    
    $id_user    = $this->session->userdata('id_user');
    $user_aktif = $this->auth_model->detail($id_user);
    $post       = count($this->post_model->listPost($id_user));
    $image      = count($this->multimedia_model->listImage($id_user));
    $video      = count($this->multimedia_model->listVideo($id_user));
    $audio      = count($this->multimedia_model->listAudio($id_user));
    $visitor    = $this->pengunjung_model->statistik_pengujung();
    $data = array(
      'title'       => 'Dashboard',
      'user_aktif'  => $user_aktif,
      'post'        => $post,
      'image'       => $image,
      'video'       => $video,
      'audio'       => $audio,
      'visitor'     => $visitor,
      'isi'         => 'admin/dashboard/list'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }
  public function admin(){
    $visitor = $this->pengunjung_model->statistik_pengujung();
    $id_user    = $this->session->userdata('id_user');
    $user_aktif = $this->auth_model->detail($id_user);
    $user           = count($this->auth_model->listUser());
    $post           = count($this->post_model->listPosts());
    $kategori       = count($this->kategori_model->listKategori());
    $sub_kategori   = count($this->kategori_model->listSubKategori());
    $image          = count($this->multimedia_model->listImagePublish());
    $video          = count($this->multimedia_model->listVideoPublish());
    $audio          = count($this->multimedia_model->listAudioPublish());
    $data = array(
      'title'       => 'Dashboard admin',
      'visitor'     => $visitor,
      'user_aktif'  => $user_aktif,
      'user'        => $user,
      'post'        => $post,
      'kategori'    => $kategori,
      'sub_kategori'=> $sub_kategori,
      'image'       => $image,
      'video'       => $video,
      'audio'       => $audio,
      'isi'         => 'admin/dashboard/list'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }

  public function statistik(){

    
     $data = array(
      'title' => 'statistik',
      'isi'   => 'admin/dashboard/list'
     );
     $this->load->view('admin/layout/wrapper',$data);
   }

}