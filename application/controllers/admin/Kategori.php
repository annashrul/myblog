<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
  public function index(){
    $post = count($this->kategori_model->listKategori());
    $data = array(
      'title' => 'Kategori Artikel',
      'post'  => $post,
      'isi'   => 'admin/kategori/list'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }
  public function ambil(){
    $kategori = $this->kategori_model->listKategori()->result();
    echo json_encode($kategori);
  }
  public function ambilId(){
    $id_kategori = $this->input->post('id_kategori');
    $data = array('id_kategori' => $id_kategori);
    $kategori = $this->kategori_model->detailKategori($data);
    echo json_encode($kategori);
  }
  public function tambah(){
    $nama_kategori = $this->input->post('nama_kategori');
    if($nama_kategori == ""){
      $result['pesan'] = 'nama_kategori tidak boleh kosong';
    }else{
      $result['pesan'] = '';
      $slug_akhir			= slug($this->input->post('nama_kategori'));
      $slug = $slug_akhir;
      $data = array(
        'id_user'       => $this->session->userdata('id_user'),
        'slug_kategori' => $slug,
        'nama_kategori' => $nama_kategori
      );
      $this->kategori_model->insertKategori($data);
    }
    echo json_encode($result);
  }
  public function edit(){
    $slug_akhir			= slug($this->input->post('nama_kategori'));
    $slug = $slug_akhir;
    $id_kategori = $this->input->post('id_kategori');
    $nama_kategori = $this->input->post('nama_kategori');
    if($nama_kategori == ""){
      $result['pesan'] = 'nama kategori tidak boleh kosong';
    }else{
      $result['pesan'] = '';
      $slug_akhir			= slug($this->input->post('nama_kategori'));
      $slug = $slug_akhir;
      $data = array(
        'id_user'       => $this->session->userdata('id_user'),
        'id_kategori'   => $id_kategori,
        'slug_kategori' => $slug,
        'nama_kategori' => $nama_kategori
      );
      $this->kategori_model->updateKategori($data);
    }
    echo json_encode($result);
  }
  public function delete(){
    $id_kategori = $this->input->post('id_kategori');
    $data = array('id_kategori' => $id_kategori);
    $kategori = $this->kategori_model->deleteKategori($data);
    echo json_encode($kategori);

  }

  //SUB KATEGORI//
  public function sub_kategori(){
    $sub  = count($this->kategori_model->listSubKategori());
    $data = array(
      'title' => 'Sub Kategori Artikel',
      'sub'  => $sub,
      'isi'   => 'admin/kategori/sub_kategori'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }
  public function ambil_sub(){
    $sub = $this->kategori_model->listSubKategori()->result();
    echo json_encode($sub);
  }
  public function tambah_sub(){
    $nama_sub_kategori = $this->input->post('nama_sub_kategori');
    $id_kategori = $this->input->post('id_kategori');
    if($nama_sub_kategori == ""){
      $result['pesan'] = "nama sub kategori tidak boleh kosong";
    }else{
      $result['pesan'] = "";
      $slug_akhir = slug($this->input->post('nama_sub_kategori'));
      $slug = $slug_akhir;
      $data = array(
        'id_user' => $this->session->userdata('id_user'),
        'slug_sub_kategori' => $slug,
        'id_kategori' => $id_kategori,
        'nama_sub_kategori' => $nama_sub_kategori
      );
      $this->kategori_model->insertSubKategori($data);
    }
    echo json_encode($result);
  }
  public function ambilIdSub(){
    $id_sub_kategori = $this->input->post('id_sub_kategori');
    $data = array('id_sub_kategori' => $id_sub_kategori);
    $sub = $this->kategori_model->detailSubKategori($data);
    echo json_encode($sub);
  }
  public function edit_sub(){
    $id_sub_kategori = $this->input->post('id_sub_kategori');
    $id_kategori = $this->input->post('id_kategori');
    $nama_sub_kategori = $this->input->post('nama_sub_kategori');
    if($nama_sub_kategori == ""){
      $result['pesan'] = "nama sub kategori tidak boleh kosong";
    }else{
      $result['pesan'] = "";
      $slug_akhir = slug($this->input->post('nama_sub_kategori'));
      $slug = $slug_akhir;
      $data = array(
        'id_user' => $this->session->userdata('id_user'),
        'slug_sub_kategori' => $slug,
        'id_sub_kategori'   => $id_sub_kategori,
        'id_kategori'   => $id_kategori,
        'nama_sub_kategori' => $nama_sub_kategori
      );
      $this->kategori_model->updateSubKategori($data);
    }
    echo json_encode($result);
  }
  public function delete_sub(){
    $id_sub_kategori = $this->input->post('id_sub_kategori');
    $data = array('id_sub_kategori' => $id_sub_kategori);
    $sub = $this->kategori_model->deleteSubKategori($data);
    echo json_encode($sub);
  }
 
  public function kategori_artikel(){
		$kategori = $this->kategori_model->listSubKategori()->result();
		echo json_encode($kategori);
	}
	public function kategori_by_artikel(){
		$kategori = $this->kategori_model->listKategori()->result();
		echo json_encode($kategori);
	}
}