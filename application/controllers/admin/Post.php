<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
  // public $input = $this->input->post();
  public function index(){
    if($this->session->userdata('username') == 'admin' && $this->session->userdata('password') == md5('admin1234!@')){
      $post = $this->post_model->listPosts();
      $kategori = $this->kategori_model->listKategori();
      $subKategori = $this->kategori_model->listSubKategori();
      $data = array(
        'title' => 'Daftar Artikel Admin',
        'post'  => $post,
        'kategori'  => $kategori,
        'subKategori'  => $subKategori,
        'isi'   => 'admin/artikel/list'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }else{
      $id_user = $this->session->userdata('id_user');
      $post = $this->post_model->listPost($id_user);
      $kategori = $this->kategori_model->listKategori();
      $subKategori = $this->kategori_model->listSubKategori();
      $data = array(
        'title' => 'Daftar Artikel Admin',
        'post'  => $post,
        'kategori'  => $kategori,
        'subKategori'  => $subKategori,
        'isi'   => 'admin/artikel/list'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }
  }
  public function insert(){
  
    if($this->input->post('submit',TRUE) == 'Submit'){
    
      $config = array(
        'upload_path'   => './assets/upload/image/posts',
        'allowed_types' => 'jpg|png|jpeg',
        'max_size'      => '2048',
        'file_name'     => 'gambar '.time()
      );
      $this->load->library('upload',$config);
      if($this->upload->do_upload('gambar_post')){
        $img = $this->upload->data();
        $input = $this->input->post();
        $slug_akhir = slug($input['judul_post']);
        $slug       = $slug_akhir.'.html';
        $data = array(
          'id_user'           => $this->session->userdata('id_user'),
          'slug_artikel_post' => $slug,
          'id_kategori'       => $input['id_kategori'],
          'id_sub_kategori'   => $input['id_sub_kategori'],
          'judul_post'        => $input['judul_post'],
          'gambar_post'       => $img['file_name'],
          'status_post'       => $input['status_post'],
          'artikel_post'      => $input['artikel_post']
        );
        $this->post_model->insertPost($data);
        redirect('artikel');
      }else{
        $this->session->set_flashdata('pesan','anda belum memilih gambar');
      }
    }
    
  }

  public function update(){
    if($this->input->post('submit') == 'Submit'){
      $config = array(
        'upload_path'   => './assets/upload/image/posts/',
        'allowed_types' => 'jpg|png|jpeg',
        'max_size'      => '2048',
        'file_name'     => 'gambar '.time()
      );
      $this->load->library('upload',$config);
      if($this->upload->do_upload('gambar_post')){
        $img = $this->upload->data();
        unlink('./assets/upload/image/posts/'.$this->input->post('old_pic',TRUE));
        $input = $this->input->post();
        $slug_akhir = slug($input['judul_post']);
        $slug       = $slug_akhir.'.html';
        $data = array(
          'id_user'           => $this->session->userdata('id_user'),
          'slug_artikel_post' => $slug,
          'id_kategori'       => $input['id_kategori'],
          'id_sub_kategori'   => $input['id_sub_kategori'],
          'id_post'        => $input['id_post'],
          'judul_post'        => $input['judul_post'],
          'gambar_post'       => $img['file_name'],
          'status_post'       => $input['status_post'],
          'artikel_post'      => $input['artikel_post']
        );
       $this->post_model->updatePost($data);
        redirect('artikel');
        // echo '<script>alert("Data Berhasil Disimpan");window.location="'.base_url("item").'"</script>';
      }else{
        $input = $this->input->post();
        $slug_akhir = slug($input['judul_post']);
        $slug       = $slug_akhir.'.html';
        $data = array(
          'id_user'           => $this->session->userdata('id_user'),
          'slug_artikel_post' => $slug,
          'id_kategori'       => $input['id_kategori'],
          'id_sub_kategori'   => $input['id_sub_kategori'],
          'judul_post'        => $input['judul_post'],
          'id_post'        => $input['id_post'],
          'status_post'       => $input['status_post'],
          'artikel_post'      => $input['artikel_post']
        );
        // $where = array('id_item' => $this->input->post('id_item'));
        $this->post_model->updatePost($data);
        redirect('artikel');
      }
    }
  }

  public function delete(){
    $id_post = $this->input->post('id_post');
    $post = $this->post_model->detailPost($id_post);
    if($post != ""){
      unlink('./assets/upload/image/posts/'.$post->gambar_post);
    }
    $data = array('id_post' => $id_post);
    $this->post_model->deletePost($data);
    redirect('artikel');
  }
 
}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */