<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  function __construct(){
    parent::__construct();
    // date_default_timezone_set('Asia/Jakarta');
    // echo date('Y m d',74123);die();
  }
  public function index(){
      $user_ip=$_SERVER['REMOTE_ADDR'];
      if ($this->agent->is_browser()){
          $agent = $this->agent->browser();
      }elseif ($this->agent->is_robot()){
          $agent = $this->agent->robot(); 
      }elseif ($this->agent->is_mobile()){
          $agent = $this->agent->mobile();
      }else{
        $agent='Other';
      }
      
      $cek_ip=$this->pengunjung_model->cek_ip($user_ip);
      $cek=$cek_ip->num_rows();
    if($cek > 0 ){
   
      $promo                      = $this->post_model->promo();
      // $komen                      = $this->post_model->listKomentar($promo->$slug_artikel_post);
      $config['base_url'] 				= base_url().'home/';
      $config['total_rows']	 			= count($this->post_model->listPostPublish());
      $config['per_page'] 				= 6;
      $config['uri_segment'] 			= 2;
      $config['first_url'] 				= base_url();
      $config['num_links'] 				= 5;
      $config['use_page_numbers']	= TRUE;
      $config['full_tag_open']		= '<ul class="pagination pagination-sm">';
      $config['first_tag_open'] 	= '<li>'; 
      $config['first_link']       = '&laquo;'; 
      $config['first_tag_close']  = '</li>';
      $config['prev_tag_open'] 		= '<li>'; 
      $config['prev_link']        = '<i class="ion-ios-arrow-left"></i>'; 
      $config['prev_tag_close']   = '</li>';
      $config['cur_tag_open'] 		= '<li class="active"><a href="#"/>'; 
      $config['cur_tag_close']    = '</li>';
      $config['num_tag_open'] 		= '<li>'; 
      $config['num_tag_close']    = '</li>';
      $config['next_tag_open'] 		= '<li>'; 
      $config['next_link']        = '<i class="ion-ios-arrow-right"></i>';  
      $config['next_tag_close']   = '</li>';
      $config['last_tag_open'] 		= '<li>'; 
      $config['last_link']        = '&raquo;';
      $config['last_tag_close']   = '</li>';
      $config['full_tag_close'] 	= '</ul>';

      $this->pagination->initialize($config); 
      $page 		        = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;
      $post 	          = $this->post_model->perPageArtikel($config['per_page'], $page);
      $str_links        = $this->pagination->create_links();
      $trending         = $this->post_model->listPostPublish();
      $komentar         = $this->post_model->trandingKomentar();
      // $orang_komentar   = $this->post_model->orangKomentar($trending[0]->id_post);
      // var_dump($orang_komentar);die();
      $kategori     = $this->post_model->groupKategori();
      $subKategori  = $this->kategori_model->listSubKategori();
      $postAsc      = $this->post_model->listPostPublishAsc();
      $data = array(
        'title'       => 'anasrulysf - Berita Terkini',
        'seo'         => 'blog,berita,anasrulysf',
        'pagin'				=> explode('&nbsp;',$str_links ),
        'promo'       => $promo,
        'post'        => $post,
        'trending'    => $trending,
        'kategori'    => $kategori,
        'subKategori' => $subKategori,
        'postAsc'     => $postAsc,
        'komentar'       => $komentar,
        // 'orang_komentar'  => $orang_komentar,
        'isi'         => 'front_update/home/list'
      );
      $this->load->view('front_update/layout/wrapper',$data);
    }else{
      $this->pengunjung_model->simpan_user_agent($user_ip,$agent);
     
      $promo                      = $this->post_model->promo();
      // $komen                      = $this->post_model->listKomentar($promo->$slug_artikel_post);
      $config['base_url'] 				= base_url().'home/';
      $config['total_rows']	 			= count($this->post_model->listPostPublish());
      $config['per_page'] 				= 6;
      $config['uri_segment'] 			= 2;
      $config['first_url'] 				= base_url();
      $config['num_links'] 				= 5;
      $config['use_page_numbers']	= TRUE;
      $config['full_tag_open']		= '<ul class="pagination pagination-sm">';
      $config['first_tag_open'] 	= '<li>'; 
      $config['first_link']       = '&laquo;'; 
      $config['first_tag_close']  = '</li>';
      $config['prev_tag_open'] 		= '<li>'; 
      $config['prev_link']        = '<i class="ion-ios-arrow-left"></i>'; 
      $config['prev_tag_close']   = '</li>';
      $config['cur_tag_open'] 		= '<li class="active"><a href="#"/>'; 
      $config['cur_tag_close']    = '</li>';
      $config['num_tag_open'] 		= '<li>'; 
      $config['num_tag_close']    = '</li>';
      $config['next_tag_open'] 		= '<li>'; 
      $config['next_link']        = '<i class="ion-ios-arrow-right"></i>';  
      $config['next_tag_close']   = '</li>';
      $config['last_tag_open'] 		= '<li>'; 
      $config['last_link']        = '&raquo;';
      $config['last_tag_close']   = '</li>';
      $config['full_tag_close'] 	= '</ul>';

      $this->pagination->initialize($config); 
      $page 		        = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;
      $post 	          = $this->post_model->perPageArtikel($config['per_page'], $page);
      $str_links        = $this->pagination->create_links();
      $trending         = $this->post_model->listPostPublish();
      $komentar         = $this->post_model->trandingKomentar();
      // $orang_komentar   = $this->post_model->orangKomentar($trending[0]->id_post);
      // var_dump($orang_komentar);die();
      $kategori     = $this->post_model->groupKategori();
      $subKategori  = $this->kategori_model->listSubKategori();
      $postAsc      = $this->post_model->listPostPublishAsc();
      $data = array(
        'title'       => 'anasrulysf - Berita Terkini',
        'seo'         => 'blog,berita,anasrulysf',
        'pagin'				=> explode('&nbsp;',$str_links ),
        'promo'       => $promo,
        'post'        => $post,
        'trending'    => $trending,
        'kategori'    => $kategori,
        'subKategori' => $subKategori,
        'postAsc'     => $postAsc,
        'komentar'       => $komentar,
        // 'orang_komentar'  => $orang_komentar,
        'isi'         => 'front_update/home/list'
      );
      $this->load->view('front_update/layout/wrapper',$data);
    }
    
  }
  public function search(){
		$ringkasan  			= $this->input->get('s');			
		$sess_ringkasan 	= $this->session->set_userdata('sess_ringkasan',$ringkasan);
		if (isset($_GET['q'])){
			$data = array(
				'ringkasan'				=> $ringkasan,
				'sess_ringkasan'	=> $sess_ringkasan
			);
		}else{
			$data = array('sess_ringkasan'	=> $sess_ringkasan);
		}
    $post 		= $this->post_model->cariPost($ringkasan);
		$data = array(
      'title'			=> 'pencarian - '.$ringkasan,
      'seo'       => 'pencarian',
			'post' 			=> $post,
			'ringkasan'	=> $ringkasan,
			'isi'				=> 'front_update/home/cari'
		);
		$this->load->view('front_update/layout/wrapper',$data);
  }
  public function kategori($slug_kategori){
    $postByKategoriSlug         = $this->post_model->postByKategori($slug_kategori);
    $config['base_url'] 				= base_url().'home/kategori/'.$postByKategoriSlug[0]->slug_kategori.'/page';
		$config['total_rows']	 			= count($postByKategoriSlug);
		$config['per_page'] 				= 2;
		$config['uri_segment'] 			= 5;
		$config['first_url'] 				= base_url().'kategori/'.$postByKategoriSlug[0]->slug_kategori;
		$config['num_links'] 				= 5;
    $config['use_page_numbers']	= TRUE;
		$config['full_tag_open']		= '<ul class="pagination pagination-sm">';
    $config['first_tag_open'] 	= '<li>'; 
    $config['first_link']       = '&laquo;'; 
    $config['first_tag_close']  = '</li>';
    $config['prev_tag_open'] 		= '<li>'; 
    $config['prev_link']        = '<i class="ion-ios-arrow-left"></i>'; 
    $config['prev_tag_close']   = '</li>';
    $config['cur_tag_open'] 		= '<li class="active"><a href="#"/>'; 
    $config['cur_tag_close']    = '</li>';
    $config['num_tag_open'] 		= '<li>'; 
    $config['num_tag_close']    = '</li>';
    $config['next_tag_open'] 		= '<li>'; 
    $config['next_link']        = '<i class="ion-ios-arrow-right"></i>';  
    $config['next_tag_close']   = '</li>';
    $config['last_tag_open'] 		= '<li>'; 
    $config['last_link']        = '&raquo;';
    $config['last_tag_close']   = '</li>';
		$config['full_tag_close'] 	= '</ul>';
    $this->pagination->initialize($config);

    $page 		                = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
		$postByKategori 	        = $this->post_model->paginByKategori($slug_kategori,$config['per_page'], $page);
    $artikelTerkaitByKategori = $this->post_model->artikelTerkaitByKategori($postByKategori[0]->slug_kategori);
    $pagination               = $this->pagination->create_links();
    $data = array(
      'title'                     => 'anasrulysf - '.$postByKategori[0]->nama_kategori,
      'seo'                       => $postByKategori[0]->nama_kategori,
      'pagination'                => $pagination,
      'postByKategori'            => $postByKategori,
      'artikelTerkaitByKategori'  => $artikelTerkaitByKategori,
      'isi'                       => 'front_update/kategori/post_by_kategori'
    );
    $this->load->view('front_update/layout/wrapper',$data);
  }
  public function sub_kategori($slug_sub_kategori){

    $postBySubKategoriSlug      = $this->post_model->postBySubKategori($slug_sub_kategori);
		$config['first_url'] 				= base_url().'sub/'.$postBySubKategoriSlug[0]->slug_sub_kategori;
    $config['base_url'] 				= base_url().'home/sub/'.$postBySubKategoriSlug[0]->slug_sub_kategori.'/hal';
		$config['total_rows']	 			= count($postBySubKategoriSlug);
		$config['per_page'] 				= 3;
		$config['uri_segment'] 			= 5;
		$config['num_links'] 				= 5;
    $config['use_page_numbers']	= TRUE;
		$config['full_tag_open']		= '<ul class="pagination pagination-sm">';
    $config['first_tag_open'] 	= '<li>'; 
    $config['first_link']       = '&laquo;'; 
    $config['first_tag_close']  = '</li>';
    $config['prev_tag_open'] 		= '<li>'; 
    $config['prev_link']        = '<i class="ion-ios-arrow-left"></i>'; 
    $config['prev_tag_close']   = '</li>';
    $config['cur_tag_open'] 		= '<li class="active"><a href="#"/>'; 
    $config['cur_tag_close']    = '</li>';
    $config['num_tag_open'] 		= '<li>'; 
    $config['num_tag_close']    = '</li>';
    $config['next_tag_open'] 		= '<li>'; 
    $config['next_link']        = '<i class="ion-ios-arrow-right"></i>';  
    $config['next_tag_close']   = '</li>';
    $config['last_tag_open'] 		= '<li>'; 
    $config['last_link']        = '&raquo;';
    $config['last_tag_close']   = '</li>';
		$config['full_tag_close'] 	= '</ul>';
    $this->pagination->initialize($config);

    $page 		                = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
    $postBySubKategori 	      = $this->post_model->paginBySubKategori($slug_sub_kategori,$config['per_page'], $page);
    // echo "<pre>";
    // var_dump($postBySubKategori);die();
    $pagination               = $this->pagination->create_links();
    // $postBySubKategori = $this->post_model->postBySubKategori($slug_sub_kategori);
    $artikelTerkaitByKategori = $this->post_model->artikelTerkaitByKategori($postBySubKategori[0]->slug_kategori);
    $data = array(
      'title'                     => 'anasrulysf - '.$postBySubKategori[0]->nama_sub_kategori,
      'seo'                       => $postBySubKategori[0]->nama_sub_kategori,
      'postBySubKategori'         => $postBySubKategori,
      'artikelTerkaitByKategori'  => $artikelTerkaitByKategori,
      'pagination'                => $pagination,
      'isi'                       => 'front_update/kategori/post_by_sub_kategori'
    );
    $this->load->view('front_update/layout/wrapper',$data);
  }
  
  public function read($slug_artikel_post){
    
    // $this->db->query("UPDATE posts SET visit_per_artikel=visit_per_artikel+1 WHERE slug_artikel_post='$slug_artikel_post'");
    $visitor                 = $this->post_model->sum_visitor($slug_artikel_post);
    // var_dump($visitor);die();
    $readPost                 = $this->post_model->readPost($slug_artikel_post);
    $komen                    = $this->post_model->listKomentarPublish($slug_artikel_post);
    $author                   = $this->auth_model->detail($readPost->id_user);
    $artikel_terkait          = $this->post_model->artikel_terkait($readPost->id_kategori);
    $artikelTerkait           = $this->post_model->artikel_terkait($readPost->judul_post);
    $subKategoriLainnya       = $this->post_model->subKategoriLainnya($readPost->slug_sub_kategori);
    $kategori                 = $this->post_model->groupKategori();
    $artikelTerkaitByPost     = $this->post_model->artikelTerkaitByPost($readPost->id_post);
    // $artikel_terkait_kategori = $this->post_model->groupKategori();

    $data = array(
      'title'                   => 'anasrulysf - '.$readPost->judul_post,
      'seo'                     => $readPost->judul_post,
      'readPost'                => $readPost,
      'artikel_terkait'         => $artikel_terkait,
      'artikelTerkait'          => $artikelTerkait,
      'kategori'                => $kategori,
      'subKategoriLainnya'      => $subKategoriLainnya,
      'artikelTerkaitByPost'    => $artikelTerkaitByPost,
      'author'                  => $author,
      'komen'                  => $komen,
      'visitor'                  => $visitor,
      'isi'                     => 'front_update/post/read_post'
    );
    $this->load->view('front_update/layout/wrapper',$data);
    // add_count($slug_artikel_post);
  }

  public function image(){
    $images = $this->multimedia_model->listImagePublish();
    $data = array(
      'title' => 'multimedia - image',
      'seo'   => 'multimedia,image,photo',
      'images'=> $images,
      'isi'   => 'front_update/multimedia/image'
    );
    $this->load->view('front_update/layout/wrapper',$data);
  }
  public function video(){
    $videos = $this->multimedia_model->listVideoPublish();
    $data = array(
      'title' => 'multimedia - video',
      'seo'   => 'multimedia,mp4,video',
      'videos'=> $videos,
      'isi'   => 'front_update/multimedia/video'
    );
    $this->load->view('front_update/layout/wrapper',$data);
  }
  public function audio(){
    $audios = $this->multimedia_model->listAudioPublish();
    $data = array(
      'title' => 'multimedia - audio',
      'seo'   => 'multimedia,mp3,lagu',
      'audios'=> $audios,
      'isi'   => 'front_update/multimedia/audio'
    );
    $this->load->view('front_update/layout/wrapper',$data);
  }
  public function komentar(){
		$slug_artikel_post= $this->input->post('slug_artikel_post');
		$komen 			= $this->post_model->listKomentarPublish($slug_artikel_post);
		echo json_encode($komen);
  }
  
  public function simpan_komentar(){
    $data = array(
	    'nama_komentar' => $this->input->post('nama_komentar'),
	    'email_komentar' => $this->input->post('email_komentar'),
	    'isi_komentar' => $this->input->post('isi_komentar'),
	    'id_post' => $this->input->post('id_post'),
    );
	  $id_detail = $this->post_model->insertKomentar($data);
	  $data = array(
	    'id_komentar' => $id_detail,
      'id_post' => $this->input->post('id_post'),
      // 'tanggal_komentar'  => 'd m Y',
    ); 
    $proses = $this->post_model->insertDetailKomentar($data);
    echo json_encode($proses);  
 	}

  public function simpan_balas_komentar(){
		$data = array(
	    'id_user'             => $this->session->userdata('id_user'),
	    'isi_balas_komentar'  => $this->input->post('email_komentar'),
    );
		$value 	= $this->post_model->insertBalasKomentar($data);
		echo json_encode($value);  
  }
  public function ambil_id_komentar(){
		$id_komentar = $this->input->post('id_komentar');
		$where = array('id_komentar' => $id_komentar);
		$komentar = $this->post_model->ambil_id_komentar($where);
		echo json_encode($komentar);
	}

}