<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Post_model extends CI_Model {
  
  public function listPosts(){
   $this->db->select('posts.*, user.username,kategori.nama_kategori,sub_kategori.nama_sub_kategori');
   $this->db->from('posts');
   $this->db->join('user','user.id_user = posts.id_user','LEFT');
   $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
   $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
   $this->db->join('komentar','komentar.id_komentar = posts.id_post','LEFT');
   $this->db->order_by('id_post','DESC');
   $query = $this->db->get();
   return $query;
  }
  public function listPost($id_user){
    $this->db->select('posts.*, user.username,kategori.nama_kategori,sub_kategori.nama_sub_kategori');
    $this->db->from('posts');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->where('user.id_user',$id_user);
    $this->db->order_by('id_post','DESC');
    $query = $this->db->get();
    return $query;
  }
  
  public function seo(){
    return $this->db->get('posts');
  }
  public function insertPost($data){
    $this->db->insert('posts',$data);
  }
  public function detailPost($id_post){
    $query = $this->db->get_where('posts',array('id_post' => $id_post));
    return $query->row();
  }
  public function updatePost($data){
    $this->db->where('id_post',$data['id_post']);
    $this->db->update('posts',$data);
    $this->db->order_by('id_post','DESC');
  }
  public function deletePost($data){
    $this->db->where('id_post',$data['id_post']);
    $this->db->delete('posts',$data);
  }
  //PUBLISH
  public function promo(){
    $this->db->select('posts.*, user.first_name, user.last_name,kategori.nama_kategori,sub_kategori.nama_sub_kategori');
    $this->db->from('posts');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->where(array('sub_kategori.nama_sub_kategori' => 'makanan'));
    $this->db->order_by('id_post','DESC');
    $query = $this->db->get();
    return $query->row();
   }
  public function groupKategori(){
    $query = $this->db->query('SELECT posts.*, nama_sub_kategori, slug_kategori, nama_kategori, COUNT(*) FROM posts LEFT JOIN kategori ON kategori.id_kategori = posts.id_kategori LEFT JOIN sub_kategori ON sub_kategori.id_sub_kategori = posts.id_sub_kategori GROUP BY nama_kategori ORDER BY COUNT(*) DESC');
    return $query->result();
  }
  public function jumka(){
    $query = $this->db->query('SELECT posts.*, nama_sub_kategori, slug_kategori, nama_kategori, COUNT(*) FROM posts LEFT JOIN kategori ON kategori.id_kategori = posts.id_kategori LEFT JOIN sub_kategori ON sub_kategori.id_sub_kategori = posts.id_sub_kategori GROUP BY nama_kategori ORDER BY COUNT(*) DESC');
    return $query->result();
  }

  public function jumsubka(){
    $query = $this->db->query('SELECT posts.*, nama_sub_kategori, slug_kategori,slug_sub_kategori, nama_kategori, COUNT(*) FROM posts LEFT JOIN kategori ON kategori.id_kategori = posts.id_kategori LEFT JOIN sub_kategori ON sub_kategori.id_sub_kategori = posts.id_sub_kategori GROUP BY nama_sub_kategori ORDER BY COUNT(*) DESC');
    return $query->result();
  }
 
  public function listPostPublish(){
    $this->db->select('posts.*, user.first_name, user.last_name,kategori.nama_kategori,kategori.slug_kategori');
    $this->db->from('posts');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    // $this->db->limit(6);
    $this->db->order_by('tanggal','DESC');
    $query = $this->db->get();
    return $query->result();
   }
   public function perPageArtikel($limit,$start){
    $this->db->select('posts.*, user.first_name, user.last_name,kategori.nama_kategori,kategori.slug_kategori');
    $this->db->from('posts');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    $this->db->limit($limit,$start);
    $this->db->order_by('tanggal','DESC');
    $query = $this->db->get();
    return $query->result();
   }
   public function listPostPublishAsc(){
    $this->db->select('posts.*, user.first_name, user.last_name,kategori.nama_kategori');
    $this->db->from('posts');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    // $this->db->where('tanggal >= DATE(NOW())');
    $this->db->limit(6);
    $this->db->order_by('tanggal','ASC');
    $query = $this->db->get();
    return $query->result();
   }
   
   public function postByKategori($slug_kategori){
    $this->db->select(
      ' posts.id_post,
        posts.slug_artikel_post,
        posts.gambar_post,
        posts.judul_post,
        posts.artikel_post,
        posts.tanggal,
        kategori.id_kategori,
        kategori.nama_kategori,
        kategori.slug_kategori,
        sub_kategori.nama_sub_kategori,
        user.first_name,
        user.last_name,
      '
    );
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    $this->db->where('kategori.slug_kategori',$slug_kategori);
    $this->db->order_by('tanggal','ASC');
    $query = $this->db->get('posts');
    return $query->result();
  }
  public function paginByKategori($slug_artikel_post,$limit,$start){
    $this->db->select(
      ' posts.id_post,
        posts.slug_artikel_post,
        posts.gambar_post,
        posts.judul_post,
        posts.artikel_post,
        posts.tanggal,
        kategori.id_kategori,
        kategori.nama_kategori,
        kategori.slug_kategori,
        sub_kategori.nama_sub_kategori,
        sub_kategori.slug_sub_kategori,
        user.first_name,
        user.last_name,
      '
    );
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    $this->db->where('kategori.slug_kategori',$slug_artikel_post);
    $this->db->limit($limit,$start);
    $this->db->order_by('tanggal','DESC');
    $query = $this->db->get('posts');
    return $query->result();
  }
  public function postByKategoriNav($slug_artikel_post){
    $this->db->select(
      ' posts.id_post,
        posts.slug_artikel_post,
        posts.gambar_post,
        posts.judul_post,
        posts.artikel_post,
        posts.tanggal,
        kategori.id_kategori,
        kategori.nama_kategori,
        kategori.slug_kategori,
        sub_kategori.nama_sub_kategori,
        sub_kategori.slug_sub_kategori,
        user.first_name,
        user.last_name,
      '
    );
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    $this->db->where('kategori.slug_kategori',$slug_artikel_post);
    $this->db->group_by('sub_kategori.nama_sub_kategori','DESC');
    $this->db->order_by('id_post','DESC');
    $this->db->limit(4);
    $query = $this->db->get('posts');
    return $query->result();
  }

  public function readPost($slug_artikel_post){
    $this->db->select('posts.*, user.first_name, user.last_name,kategori.nama_kategori,kategori.slug_kategori, sub_kategori.nama_sub_kategori, sub_kategori.slug_sub_kategori');
    $this->db->from('posts');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    $this->db->where('slug_artikel_post',$slug_artikel_post);
    $this->db->order_by('id_post','DESC');
    $query = $this->db->get();
    return $query->row();
   }
  public function artikel_terkait($judul_post){
    $this->db->select('judul_post,slug_artikel_post,artikel_post,tanggal,id_post,gambar_post,kategori.nama_kategori, kategori.slug_kategori, kategori.nama_kategori,COUNT(judul_post)');
    $this->db->from('posts');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->where('posts.judul_post !=',$judul_post);
    // $this->db->where('id_kategori == ',$id_kategori);
    $this->db->group_by('judul_post');
    $this->db->limit(2);
    $this->db->order_by('tanggal','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  // public function artikel_terkait_kategori($slug_artikel_post){
  //   $query = $this->db->query("SELECT posts.*, kategori.nama_kategori FROM posts LEFT JOIN kategori ON kategori.id_kategori = posts.id_kategori WHERE slug_artikel_post != $slug_artikel_post");
  //   return $query->result();
  // }
  // SELECT posts.judul_post, kategori.nama_kategori, COUNT(judul_post) FROM posts LEFT JOIN kategori ON kategori.id_kategori = posts.id_kategori WHERE nama_kategori = 'sport' GROUP BY nama_kategori
  public function postBySubKategori($slug_sub_kategori){
    $this->db->select(
      ' posts.id_post,
        posts.slug_artikel_post,
        posts.gambar_post,
        posts.judul_post,
        posts.artikel_post,
        posts.tanggal,
        kategori.id_kategori,
        kategori.nama_kategori,
        kategori.slug_kategori,
        sub_kategori.slug_sub_kategori,
        sub_kategori.nama_sub_kategori,
        user.first_name,
        user.last_name,
      '
    );
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->where('sub_kategori.slug_sub_kategori',$slug_sub_kategori);
    $this->db->order_by('tanggal','DESC');
    $query = $this->db->get('posts');
    return $query->result();
  }
  public function paginBySubKategori($slug_artikel_post,$limit,$start){
    $this->db->select(
      ' posts.id_post,
        posts.slug_artikel_post,
        posts.gambar_post,
        posts.judul_post,
        posts.artikel_post,
        posts.tanggal,
        kategori.id_kategori,
        kategori.nama_kategori,
        kategori.slug_kategori,
        sub_kategori.nama_sub_kategori,
        sub_kategori.slug_sub_kategori,
        user.first_name,
        user.last_name,
      '
    );
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');
    $this->db->where(array('status_post' => 'Publish'));
    $this->db->where('sub_kategori.slug_sub_kategori',$slug_artikel_post);
    $this->db->limit($limit,$start);
    $this->db->order_by('tanggal','DESC');
    $query = $this->db->get('posts');
    return $query->result();
  }
  public function artikelTerkaitByPost($id_post){
    $this->db->select('posts.*,nama_kategori,slug_kategori,nama_sub_kategori,slug_sub_kategori');
    $this->db->from('posts');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->where('id_post !=',$id_post);
    $this->db->group_by('nama_kategori');
    $this->db->order_by('id_post','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function artikelTerkaitBykategori($slug_kategori){
    $this->db->select('posts.*,nama_kategori,slug_kategori,nama_sub_kategori,slug_sub_kategori');
    $this->db->from('posts');
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');
    $this->db->where('slug_kategori !=',$slug_kategori);
    $this->db->group_by('nama_kategori');
    $this->db->order_by('tanggal','DESC');
    $query = $this->db->get();
    return $query->result();
  }
 
  public function subKategoriLainnya($slug_sub_kategori){
    $this->db->select('nama_sub_kategori, slug_sub_kategori');
    $this->db->from('sub_kategori');
    $this->db->where('sub_kategori.nama_sub_kategori !=',$slug_sub_kategori);
    $this->db->group_by('sub_kategori.nama_sub_kategori');
    $query = $this->db->get();
    return $query->result();
  }
  public function perPost() {
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->where(array('status_post' => 'publish'));            
    $this->db->order_by('id_post','ASC');
    $query = $this->db->get();
    return $query->result();
  }
  public function cariPost($ringkasan){
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->join('user','user.id_user = posts.id_user','LEFT');                          
    $this->db->join('kategori','kategori.id_kategori = posts.id_kategori','LEFT');                          
    $this->db->join('sub_kategori','sub_kategori.id_sub_kategori = posts.id_sub_kategori','LEFT');                          
    if (!empty($ringkasan)) {
      $this->db->like('judul_post', $ringkasan);
      $this->db->or_like('nama_kategori',$ringkasan);
      $this->db->or_like('nama_sub_kategori', $ringkasan);
    }
    $this->db->order_by('tanggal','DESC');
    $getData = $this->db->get('');
    if ($getData->num_rows() > 0)
      return $getData->result();
    else
      return null;
  }
  // $this->db->insert('transaksi_header',$data);
  // $insert_id=  $this->db->query("select id_transaksi_header from transaksi_header order by id_transaksi_header desc")->row_array();
  // $this->db->query("update transaksi_details set id_transaksi_header='".$insert_id['id_transaksi_header']."'");
  public function listKomentar(){
    $this->db->select('
      detail_komentar.*,
      komentar.nama_komentar,
      komentar.email_komentar,
      komentar.isi_komentar,
      komentar.tanggal_komentar,
      user.id_user,
      user.username,
      posts.judul_post,
      posts.slug_artikel_post,
      posts.gambar_post,
    ');
    $this->db->from('detail_komentar');
    $this->db->join('posts','posts.id_post = detail_komentar.id_post','LEFT');
    $this->db->join('komentar','komentar.id_komentar = detail_komentar.id_komentar','LEFT');
    $this->db->join('user','user.id_user = detail_komentar.id_user','LEFT');
    $this->db->order_by('id_detail_komentar','ASC');
    $query = $this->db->get();
    return $query->result();
  }
  public function listKomentarPublish($slug_artikel_post){
    $this->db->select('
      detail_komentar.*,
      komentar.nama_komentar,
      komentar.email_komentar,
      komentar.isi_komentar,
      komentar.tanggal_komentar,
      user.id_user,
      user.username,
      posts.judul_post,
      posts.slug_artikel_post,
      posts.gambar_post,
    ');
    $this->db->from('detail_komentar');
    $this->db->join('posts','posts.id_post = detail_komentar.id_post','LEFT');
    $this->db->join('komentar','komentar.id_komentar = detail_komentar.id_komentar','LEFT');
    $this->db->join('user','user.id_user = detail_komentar.id_user','LEFT');
    $this->db->where('posts.slug_artikel_post',$slug_artikel_post);
    $this->db->order_by('id_detail_komentar','ASC');
    $query = $this->db->get();
    return $query->result();
  }
  public function insertKomentar($data){
	  $this->db->insert('komentar', $data);
	  $id = $this->db->insert_id();
	  if (isset($id)) {
	  	return $id;
	  }else{
	  	return FALSE;
	  }
 	}
 	public function insertDetailKomentar($data){
   	$this->db->insert('detail_komentar', $data);
 	}
  public function ambil_id_komentar($where){
		$query = $this->db->get_where('komentar',$where);
		return $query->result();
	}
  public function insertBalasKomentar($data){
    $query = $this->db->insert('balas_komentar',$data);
    if($query){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  public function trandingKomentar(){
    $query = $this->db->query('SELECT COUNT(*) AS jumlah,komentar.nama_komentar, posts.judul_post FROM komentar LEFT JOIN posts ON posts.id_post = komentar.id_post GROUP BY judul_post ORDER BY COUNT(*) DESC  LIMIT 1');
    return $query->result();
  }
  
  public function orangKomentar($id_post){
    $this->db->select('komentar.*,posts.judul_post,komentar.nama_komentar');
    $this->db->from('komentar');
    $this->db->join('posts','posts.id_post = komentar.id_post','LEFT');
    $this->db->where('posts.id_post',$id_post);
    $this->db->group_by('posts.judul_post');
    $this->db->order_by('COUNT(*)','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  // public function update_counter($slug_artikel_post){
  //   $count = $this->db->get_where('posts',array('slug_artikel_post' => $slug_artikel_post))->row();
  //   // var_dump($count);
  //   $this->db->update('posts',array(
  //       'id_post'           => $count[0]->id_post,
  //       'visit_per_artikel' => $count[0]->visit_per_artikel+1
  //     )
  //   );
  // }
  function update_counter($slug_artikel_post) {
    // return current article views 
    $this->db->where('slug_artikel_post', urldecode($slug_artikel_post));
    $this->db->select('visit_per_artikel');
    $count = $this->db->get('posts')->row();
    // then increase by one 
    $this->db->where('slug_artikel_post', urldecode($slug_artikel_post));
    $this->db->set('visit_per_artikel', ($count->visit_per_artikel + 1));
    $this->db->update('posts');
  }

  public function sum_visitor($slug_artikel_post){
    $this->db->select('visit_per_artikel');
    $this->db->from('posts');
    $this->db->where('slug_artikel_post',$slug_artikel_post);
    return $this->db->get()->row();
  }
}