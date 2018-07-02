<?php 
	// if($this->session->userdata('username') == ""){
	// 	$this->session->set_flashdata('notif','Oooppss Anda Bermain Curang. Silahkan Login!!!!');
	// 	redirect(base_url('auth/login'));
	// }
	// $id_user = $this->session->userdata('id_user');
	// $user_aktif = $this->auth_model->detail($id_user);
	$kategori = $this->post_model->groupKategori();
	$id_user = $this->session->userdata('id_user');
	$user = $this->auth_model->detail($id_user);
	// $group = $this->kategori_model->groupKategori();
	// $postByKategori = $this->post_model->postByKategori($kategori->slug_kategori);
	include 'head.php';
	include 'nav.php';
	include 'content.php';
	include 'footer.php';
?>