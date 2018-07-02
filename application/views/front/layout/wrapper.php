<?php 
	// if($this->session->userdata('username') == ""){
	// 	$this->session->set_flashdata('notif','Oooppss Anda Bermain Curang. Silahkan Login!!!!');
	// 	redirect(base_url('auth/login'));
	// }
	// $id_user = $this->session->userdata('id_user');
	// $user_aktif = $this->auth_model->detail($id_user);
	$kategori = $this->post_model->jumka();
	include 'header.php';
	include 'content.php';
	include 'footer.php';
?>