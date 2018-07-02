<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Multimedia extends CI_Controller {
  public function index(){}
  //************IMAGE**************/
  public function image(){
    if($this->session->userdata('username') == 'admin' && $this->session->userdata('password') == md5('admin1234!@')){
      $images = $this->multimedia_model->listImagePublish();
      $data = array(
        'title'   => 'Images',
        'images'  => $images,
        'isi'     => 'admin/multimedia/list_image'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }else{
      $id_user = $this->session->userdata('id_user');
      $images = $this->multimedia_model->listImage($id_user);
      $data = array(
        'title'   => 'Images',
        'images'  => $images,
        'isi'     => 'admin/multimedia/list_image'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }
  }
  public function tambah_image(){
    $validasi     = $this->form_validation;
    $validasi->set_rules('deskripsi_image','Deskripsi','required');
    if($validasi->run()){
      $config['upload_path'] 	= './assets/upload/image/multimedia/image/'; //lokasi folder upload
      $config['allowed_types'] 	= 'gif|jpg|png|svg'; //Type file yg diizinkan
      // $config['max_size']		= 1024 * 8; // KB	
      $config['encrypt_name']	= TRUE;
      $this->load->library('upload', $config);
      if(! $this->upload->do_upload('image')){
        $data = array(  
          'title'         => 'Halaman Tambah Image',
          'error'         => $this->upload->display_errors(),
          'isi'           => 'admin/multimedia/tambah_image'
        );
        $this->load->view('admin/layout/wrapper',$data);
      }else{
        $upload_data	= array('uploads' =>$this->upload->data());
        // Image Editor bikin thumbnail
        $config['max_size'] = 10000*8;
        $config['image_library']	= 'gd2';
        $config['source_image'] 	= './assets/upload/image/multimedia/image/'.$upload_data['uploads']['file_name']; 
        $config['new_image'] 		  = './assets/upload/image/multimedia/image/thumbs/';
        $config['create_thumb'] 	= TRUE;
        $config['quality'] 			  = "100%";
        $config['maintain_ratio'] = TRUE;
        $config['width'] 		  	  = 360; // Pixel
        $config['height'] 			  = 360; // Pixel
        $config['x_axis'] 			  = 0;
        $config['y_axis'] 			  = 0;
        $config['thumb_marker'] 	= '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $data = array(
          'id_user'         => $this->session->userdata('id_user'),
          'image'			      => $upload_data['uploads']['file_name'],
          'judul_image'     => $this->input->post('judul_image'),
          'deskripsi_image' => $this->input->post('deskripsi_image')
        );
        $this->multimedia_model->insertImage($data);
        $this->session->set_flashdata('sukses','Data Image Berhasil Ditambahkan');
        echo '<script>alert("Data has been Saved");window.location="'.redirect(base_url("m_image")).'"</script>';
      }
    }else{
      $data = array(  
        'title'         => 'Halaman Tambah Image',
        'isi'           => 'admin/multimedia/tambah_image'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }
  }

  public function edit_image($id_image){
    $image         = $this->multimedia_model->detailImage($id_image);
    $validasi     = $this->form_validation;
    $validasi->set_rules('deskripsi_image','Deskripsi','required'); 
    if($validasi->run()) {
      if(!empty($_FILES['image']['name'])){
        $config['upload_path'] 		= './assets/upload/image/multimedia/image/'; //lokasi folder upload
        $config['allowed_types'] 	= 'gif|jpg|png|svg'; //Type file yg diizinkan
        $config['max_size']				= '12000'; // KB
        $config['encrypt_name']	= TRUE;	
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('image')){
          $data =	array(  
            'title'         => 'Halaman Edit Image',
            'image'	        => $image,
            'error'	        => $this->upload->display_errors(),
            'isi'		        => 'admin/multimedia/edit_image'
          );
          $this->load->view('admin/layout/wrapper',$data);
          // Masuk database
        }else{
          $upload_data	= array('uploads' => $this->upload->data());
          // Image Editor bikin thumbnail
          $config['image_library']	= 'gd2';
          $config['source_image'] 	= './assets/upload/image/multimedia/image/'.$upload_data['uploads']['file_name']; 
          $config['new_image'] 		  = './assets/upload/image/multimedia/image/thumbs/';
          $config['create_thumb'] 	= TRUE;
          $config['quality'] 			  = "100%";
          $config['maintain_ratio'] = TRUE;
          $config['width'] 			    = 360; // Pixel
          $config['height'] 			  = 360; // Pixel
          $config['x_axis'] 			  = 0;
          $config['y_axis'] 			  = 0;
          $config['thumb_marker'] 	= '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          //hapus gambar lama
          if($image->image != ""){
            unlink('./assets/upload/image/multimedia/image/'.$image->image);
            unlink('./assets/upload/image/multimedia/image/thumbs/'.$image->image);
          }
          //end hapus gambar lama
          $data = array(  
            'id_user'					=> $this->session->userdata('id_user'),
            'id_image'				=> $id_image,	
            'image'				    => $upload_data['uploads']['file_name'], 
            'judul_image'		  => $this->input->post('judul_image'),
            'deskripsi_image'	=> $this->input->post('deskripsi_image')
          );
          $this->multimedia_model->updateImage($data);
          $this->session->set_flashdata('sukses','Data Image Berhasil Diupdate');
          echo '<script>alert("Data has been Saved");window.location="'.redirect(base_url("m_image")).'"</script>';
        }

      }else{
        $data = array(  
          'id_user'						=> $this->session->userdata('id_user'),
          'id_image'					=> $id_image,	
          'judul_image'		    => $this->input->post('judul_image'),
          'deskripsi_image'		=> $this->input->post('deskripsi_image')
        );
        $this->multimedia_model->updateImage($data);
        $this->session->set_flashdata('sukses','Data Image Berhasil Diupdate');
        echo '<script>alert("Data has been Saved");window.location="'.redirect(base_url("m_image")).'"</script>';
      }
    }
    // End masuk database
    $data =	array(  
      'title'         => 'Halaman Edit Image',
      'image'	        => $image,
      'isi'		        => 'admin/multimedia/edit_image'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }

  public function delete_image($id_image){
    $detail = $this->multimedia_model->detailImage($id_image);
    if($detail != ""){
      unlink('./assets/upload/image/multimedia/image/'.$detail->image);
      unlink('./assets/upload/image/multimedia/image/thumbs/'.$detail->image);
    }
    $data = array('id_image' => $id_image);
    $this->multimedia_model->deleteImage($data);
    $this->session->set_flashdata('sukses','Data Image Berhasil Dihapus');
    redirect(base_url('m_image'));
  }
  //************VIDEO**************/
  public function video(){
    if($this->session->userdata('username') == 'admin' && $this->session->userdata('password') == md5('admin1234!@')){
      $videos = $this->multimedia_model->listVideoPublish();
      $data = array(
        'title'   => 'Videos',
        'videos'  => $videos,
        'isi'     => 'admin/multimedia/list_video'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }else{
      $id_user = $this->session->userdata('id_user');
      $videos = $this->multimedia_model->listVideo($id_user);
      $data = array(
        'title'   => 'Videos',
        'videos'  => $videos,
        'isi'     => 'admin/multimedia/list_video'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }
  }
  public function tambah_video(){
    $validasi     = $this->form_validation;
    $validasi->set_rules('deskripsi_video','Deskripsi','required');
    if($validasi->run()){
      $config['upload_path'] 	  = './assets/upload/image/multimedia/video/'; //lokasi folder upload
      $config['allowed_types'] 	= 'avi|flv|wmv|mp3|mp4'; //Type file yg diizinkan
      // $config['max_size']		    = '60000'; // KB	
      $this->load->library('upload', $config);
      if(! $this->upload->do_upload('video')){
        $data = array(  
          'title'         => 'Halaman Tambah Video',
          'error'         => $this->upload->display_errors(),
          'isi'           => 'admin/multimedia/tambah_video'
        );
        $this->load->view('admin/layout/wrapper',$data);
      }else{
        $upload_data	= array('uploads' =>$this->upload->data());
        // Image Editor bikin thumbnail
        $config['image_library']	= 'gd2';
        $config['source_image'] 	= './assets/upload/image/multimedia/video/'.$upload_data['uploads']['file_name']; 
        $config['new_image'] 		  = './assets/upload/image/multimedia/video/thumbs/';
        $config['create_thumb'] 	= TRUE;
        $config['quality'] 			  = "100%";
        $config['maintain_ratio'] = TRUE;
        $config['width'] 			    = 360; // Pixel
        $config['height'] 			  = 360; // Pixel
        $config['x_axis'] 			  = 0;
        $config['y_axis'] 			  = 0;
        $config['thumb_marker'] 	= '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $data = array(
          'id_user'         => $this->session->userdata('id_user'),
          'video'			      => $upload_data['uploads']['file_name'],
          'judul_video'     => $this->input->post('judul_video'),
          'deskripsi_video' => $this->input->post('deskripsi_video')
        );
        $this->multimedia_model->insertVideo($data);
        echo '<script>alert("Data has been Saved");window.location="'.base_url("m_video").'"</script>';
        $this->session->set_flashdata('sukses','Data Video Berhasil Ditambahkan');
      }
    }else{
      $data = array(  
        'title'         => 'Halaman Tambah Video',
        'isi'           => 'admin/multimedia/tambah_video'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }
  }
  public function edit_video($id_video){
    $video        = $this->multimedia_model->detailVideo($id_video);
    $validasi     = $this->form_validation;
    $validasi->set_rules('deskripsi_video','Deskripsi','required'); 
    if($validasi->run()) {
      if(!empty($_FILES['video']['name'])){
        $config['upload_path'] 		= './assets/upload/image/multimedia/video/'; //lokasi folder upload
        $config['allowed_types'] 	= 'avi|flv|wmv|mp4'; //Type file yg diizinkan
        $config['max_size']				= '60000'; // KB
        // $config['encrypt_name']	= TRUE;	
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('video')){
          $data =	array(  
            'title'         => 'Halaman Edit Video',
            'video'	        => $video,
            'error'	        => $this->upload->display_errors(),
            'isi'		        => 'admin/multimedia/edit_video'
          );
          $this->load->view('admin/layout/wrapper',$data);
          // Masuk database
        }else{
          $upload_data	= array('uploads' => $this->upload->data());
          // Image Editor bikin thumbnail
          $config['image_library']	= 'gd2';
          $config['source_image'] 	= './assets/upload/image/multimedia/video/'.$upload_data['uploads']['file_name']; 
          $config['new_image'] 		  = './assets/upload/image/multimedia/video/thumbs/';
          $config['create_thumb'] 	= TRUE;
          $config['quality'] 			  = "100%";
          $config['maintain_ratio'] = TRUE;
          $config['width'] 			    = 360; // Pixel
          $config['height'] 			  = 360; // Pixel
          $config['x_axis'] 			  = 0;
          $config['y_axis'] 			  = 0;
          $config['thumb_marker'] 	= '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          //hapus gambar lama
          if($video->video != ""){
            unlink('./assets/upload/image/multimedia/video/'.$video->video);
            unlink('./assets/upload/image/multimedia/video/thumbs/'.$video->video);
          }
          //end hapus gambar lama
          $data = array(  
            'id_user'						=> $this->session->userdata('id_user'),
            'id_video'					=> $id_video,	
            'video'				      => $upload_data['uploads']['file_name'], 
            'judul_video'       => $this->input->post('judul_video'),
            'deskripsi_video'		=> $this->input->post('deskripsi_video')
          );
          $this->multimedia_model->updateVideo($data);
          echo '<script>alert("Data has been Saved");window.location="'.base_url("m_video").'"</script>';
          $this->session->set_flashdata('sukses','Data Video Berhasil Diupdate');
        }

      }else{
        $data = array(  
          'id_user'						=> $this->session->userdata('id_user'),
          'id_video'					=> $id_video,	
          'judul_video'       => $this->input->post('judul_video'),
          'deskripsi_video'		=> $this->input->post('deskripsi_video')
        );
        $this->multimedia_model->updateVideo($data);
        $this->session->set_flashdata('sukses','Data Video Berhasil Diupdate');
        echo '<script>alert("Data has been Saved");window.location="'.base_url("m_video").'"</script>';
      }
    }
    // End masuk database
    $data =	array(  
      'title'         => 'Halaman Edit Video',
      'video'	        => $video,
      'isi'		        => 'admin/multimedia/edit_video'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }
  public function delete_video($id_video){
    $detail = $this->multimedia_model->detailVideo($id_video);
    if($detail != ""){
      unlink('./assets/upload/image/multimedia/video/'.$detail->video);
      unlink('./assets/upload/image/multimedia/video/thumbs/'.$detail->video);
    }
    $data = array('id_video' => $id_video);
    $this->multimedia_model->deleteVideo($data);
    $this->session->set_flashdata('sukses','Data Video Berhasil Dihapus');
    redirect(base_url('m_video'));
  }

  //************AUDIO**************/
  public function audio(){
    if($this->session->userdata('username') == 'admin' && $this->session->userdata('password') == md5('admin1234!@')){
      $audios = $this->multimedia_model->listAudioPublish();
      $data = array(
        'title'   => 'Audios',
        'audios'  => $audios,
        'isi'     => 'admin/multimedia/list_audio'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }else{
      $id_user = $this->session->userdata('id_user');
      $audios = $this->multimedia_model->listAudio($id_user);
      $data = array(
        'title'   => 'Audios',
        'audios'  => $audios,
        'isi'     => 'admin/multimedia/list_audio'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }
  }
  public function tambah_audio(){
    $validasi     = $this->form_validation;
    $validasi->set_rules('deskripsi_audio','Deskripsi','required');
    if($validasi->run()){
      $config['upload_path'] 	    = './assets/upload/image/multimedia/audio/'; //lokasi folder upload
      $config['allowed_types'] 	  = 'mp3'; //Type file yg diizinkan
      $config['max_size']		      = '120000'; // KB	
      $config['max_width']		    = '120000'; // KB	
      $config['max_height']		    = '120000'; // KB	
      $this->load->library('upload', $config);
      if(! $this->upload->do_upload('audio')){
        $data = array(  
          'title'         => 'Halaman Tambah audio',
          'error'         => $this->upload->display_errors(),
          'isi'           => 'admin/multimedia/tambah_audio'
        );
        $this->load->view('admin/layout/wrapper',$data);
      }else{
        $upload_data	= array('uploads' =>$this->upload->data());
        // Image Editor bikin thumbnail
        // $config['max_size']		    = '120000';
        $config['image_library']	= 'gd2';
        $config['source_image'] 	= './assets/upload/image/multimedia/audio/'.$upload_data['uploads']['file_name']; 
        $config['new_image'] 		  = './assets/upload/image/multimedia/audio/thumbs/';
        $config['create_thumb'] 	= TRUE;
        $config['quality'] 			  = "100%";
        $config['maintain_ratio'] = TRUE;
        $config['width'] 			    = 360; // Pixel
        $config['height'] 			  = 360; // Pixel
        $config['x_axis'] 			  = 0;
        $config['y_axis'] 			  = 0;
        $config['thumb_marker'] 	= '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $data = array(
          'id_user'           => $this->session->userdata('id_user'),
          'audio'			        => $upload_data['uploads']['file_name'],
          'judul_audio'       => $this->input->post('judul_audio'),
          'deskripsi_audio'   => $this->input->post('deskripsi_audio')
        );
        $this->multimedia_model->insertAudio($data);
        echo '<script>alert("Data has been Saved");window.location="'.base_url("m_audio").'"</script>';
        $this->session->set_flashdata('sukses','Data Audio Berhasil Ditambahkan');
      }
    }else{
      $data = array(  
        'title'         => 'Halaman Tambah Audio',
        'isi'           => 'admin/multimedia/tambah_audio'
      );
      $this->load->view('admin/layout/wrapper',$data);
    }
  }
  public function edit_audio($id_audio){
    $audio        = $this->multimedia_model->detailAudio($id_audio);
    $validasi     = $this->form_validation;
    $validasi->set_rules('deskripsi_audio','Deskripsi','required'); 
    if($validasi->run()) {
      if(!empty($_FILES['audio']['name'])){
        $config['upload_path'] 		= './assets/upload/image/multimedia/audio/'; //lokasi folder upload
        $config['allowed_types'] 	= 'mp3'; //Type file yg diizinkan
        $config['max_size']				= '60000'; // KB
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('audio')){
          $data =	array(  
            'title'         => 'Halaman Edit Audio',
            'audio'	        => $audio,
            'error'	        => $this->upload->display_errors(),
            'isi'		        => 'admin/multimedia/edit_audio'
          );
          $this->load->view('admin/layout/wrapper',$data);
          // Masuk database
        }else{
          $upload_data	= array('uploads' => $this->upload->data());
          // Image Editor bikin thumbnail
          $config['image_library']	= 'gd2';
          $config['source_image'] 	= './assets/upload/image/multimedia/audio/'.$upload_data['uploads']['file_name']; 
          $config['new_image'] 		  = './assets/upload/image/multimedia/audio/thumbs/';
          $config['create_thumb'] 	= TRUE;
          $config['quality'] 			  = "100%";
          $config['maintain_ratio'] = TRUE;
          $config['width'] 			    = 360; // Pixel
          $config['height'] 			  = 360; // Pixel
          $config['x_axis'] 			  = 0;
          $config['y_axis'] 			  = 0;
          $config['thumb_marker'] 	= '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          //hapus gambar lama
          if($audio->audio != ""){
            unlink('./assets/upload/image/multimedia/audio/'.$audio->audio);
            unlink('./assets/upload/image/multimedia/audio/thumbs/'.$audio->audio);
          }
          //end hapus gambar lama
          $data = array(  
            'id_user'						=> $this->session->userdata('id_user'),
            'id_audio'					=> $id_audio,	
            'audio'				      => $upload_data['uploads']['file_name'], 
            'judul_audio'       => $this->input->post('judul_audio'),
            'deskripsi_audio'		=> $this->input->post('deskripsi_audio')
          );
          $this->multimedia_model->updateAudio($data);
          $this->session->set_flashdata('sukses','Data Audio Berhasil Diupdate');
          echo '<script>alert("Data has been Saved");window.location="'.base_url("m_audio").'"</script>';
        }

      }else{
        $data = array(  
          'id_user'						=> $this->session->userdata('id_user'),
          'id_audio'					=> $id_audio,	
          'judul_audio'		    => $this->input->post('judul_audio'),
          'deskripsi_audio'		=> $this->input->post('deskripsi_audio')
        );
        $this->multimedia_model->updateAudio($data);
        $this->session->set_flashdata('sukses','Data Audio Berhasil Diupdate');
        echo '<script>alert("Data has been Saved");window.location="'.base_url("m_audio").'"</script>';
      }
    }
    // End masuk database
    $data =	array(  
      'title'         => 'Halaman Edit Audio',
      'audio'	        => $audio,
      'isi'		        => 'admin/multimedia/edit_audio'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }
  public function delete_audio($id_audio){
    $detail = $this->multimedia_model->detailAudio($id_audio);
    if($detail != ""){
      unlink('./assets/upload/image/multimedia/audio/'.$detail->audio);
      unlink('./assets/upload/image/multimedia/audio/thumbs/'.$detail->audio);
    }
    $data = array('id_audio' => $id_audio);
    $this->multimedia_model->deleteAudio($data);
    $this->session->set_flashdata('sukses','Data Audio Berhasil Dihapus');
    redirect(base_url('m_audio'));
  }
}