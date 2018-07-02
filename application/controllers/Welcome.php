<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
			// var_dump($_POST['submit']);die();
			$readPost = $this->post_model->jumsubka();
			// $readPost                 = $this->post_model->readPost($post[0]->$slug_artikel_post);
			// var_dump($readPost);die();
			// $author                   = $this->auth_model->detail($readPost->id_user);
			// $artikel_terkait          = $this->post_model->artikel_terkait($readPost->id_kategori);
			// $artikelTerkait           = $this->post_model->artikel_terkait($readPost->judul_post);
			// $subKategoriLainnya       = $this->post_model->subKategoriLainnya($readPost->slug_sub_kategori);
			// $kategori                 = $this->post_model->groupKategori();
			// $artikelTerkaitByPost     = $this->post_model->artikelTerkaitByPost($readPost->id_post);
			// $validasi = $this->form_validation;
			// $validasi->set_rules('nama_komentar','nama','required');
			// $validasi->set_rules('email_komentar','email','required');
			// $validasi->set_rules('isi_komentar','komentar','required');
			// if($validasi->run() == FALSE){
			// 	redirect(base_url('artikel/'.$readPost->slug_artikel_post));
			// }else{
				$input = $this->input->post();
				$data = array(
					// 'slug_artikel_post' => $input['slug_artikel_post'],
					'nama_komentar'      => $input['nama_komentar'],
					'email_komentar'     => $input['email_komentar'],
					'isi_komentar'  => $input['isi_komentar']
				);
				$this->post_model->simpanKomentar($data);
				// redirect();
				// echo '<script>alert("Data has been Saved");window.location="'.redirect(base_url('artikel/'.$post->slug_artikel_post)).'"</script>';
				// redirect(base_url('artikel'.$readPost->slug_artikel_post));
				echo '<script>alert("Data has been Saved");window.location="'.redirect(base_url("artikel/".$readPost->$slug_artikel_post)).'"</script>';
				// redirect('artikel/'.$post->slug_artikel_post);
			// }
		
	}
}
