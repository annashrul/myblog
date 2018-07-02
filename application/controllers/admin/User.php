<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
  public function index(){
    $user = $this->auth_model->listUser();
    $data = array(
      'title' => 'data user',
      'user'  => $user,
      'isi'   => 'admin/user/list'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }
  public function delete($id_user){
    $detail = $this->auth_model->detail($id_user);
    if($detail != ""){
      unlink('./assets/upload/image/user/'.$detail->photo);
      unlink('./assets/upload/image/user/thumbs/'.$detail->photo);
    }
    $data = array('id_user' => $id_user);
    $this->auth_model->delete($data);
    $this->session->set_flashdata('sukses','Data User Berhasil Didelete');
    redirect('user');
  }
}