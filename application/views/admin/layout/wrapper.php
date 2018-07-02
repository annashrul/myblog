<?php 
  if($this->session->userdata('username') == ""){
    $this->session->set_flashdata('notif','Oooppss Anda Bermain Curang. Silahkan Login!!!!');
    redirect(base_url('login'));
  }
  $id_user = $this->session->userdata('id_user');
  $user_aktif = $this->auth_model->detail($id_user);
  include 'head.php';
  include 'header.php';
  include 'nav.php';
  include 'content.php';
  include 'footer.php';
?>