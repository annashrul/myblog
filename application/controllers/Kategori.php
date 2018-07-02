<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
  public function index($slug_kategori){
    $postByKategori = $this->post_model->postByKategori($slug_kategori);
    $data = array(
      'title'           => $postByKategori[0]->nama_kategori,
      'seo'             => $postByKategori[0]->nama_kategori,
      'postByKategori'  => $postByKategori,
      'isi'             => 'front/post_by_kategori'
    );
    $this->load->view('front/layout/wrapper',$data);
    var_dump(base_url());
  }
  // public function postByKategori($slug_kategori){
  //   $postByKategori = $this->post_model->postByKategori($slug_kategori);
  //   $data = array(
  //     'title'           => $postByKategori[0]->nama_kategori,
  //     'seo'             => $postByKategori[0]->nama_kategori,
  //     'postByKategori'  => $postByKategori,
  //     'isi'             => 'front/post_by_kategori'
  //   );
  //   $this->load->view('front/layout/wrapper',$data);
  // }
}