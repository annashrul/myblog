<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function register(){
    $valid = $this->form_validation;
    $valid->set_rules('first_name','First Name','required',array(
      'required'  => '* Nama Depan Harus Diisi '
    ));
    $valid->set_rules('last_name','Last Name','required',array(
      'required'  => '* Nama Belakang Harus Diisi '
    ));
    $valid->set_rules('username','Username','required|is_unique[user.username]',array(
      'required'  => '* Username Harus Diisi ',
      'is_unique' => 'username <strong>'.$this->input->post('username').'</strong> sudah ada'
    ));
    $valid->set_rules('email', 'Email', 'trim|required|valid_email',array(
      'required'    => '* Email Harus Diisi ',
      'valid_email' => '* Masukan Karakter @ dan .com'
    ));
    $valid->set_rules('password','Password','required|min_length[6]|max_length[32]',array(
      'required'  => '* Password Harus Diisi *',
      'min_length'=> '* Password Minimal 6 Karakter',
      'max_length'=> '* Password Maksimal 32 Karakter'
    ));
    $valid->set_rules('passconf', 'Password Confirmation', 'trim|required|min_length[6]|max_length[32]|matches[password]',array(
      'required'  => '* Konfirmasi Password Harus Diisi ',
      'min_length'=> '* Password Minimal 6 Karakter',
      'max_length'=> '* Password Maksimal 32 Karakter',
      'matches'   => '* Password Tidak Sama '
    ));
    if($valid->run() == FALSE){
      $data = array('title' => 'Register Account');
      $this->load->view('auth/register',$data);
    }else{
      $input = $this->input->post();
      $data = array(
        'first_name'  => $input['first_name'],
        'last_name'   => $input['last_name'],
        'username'    => $input['username'],
        'email'       => $input['email'],
        'password'    => md5($input['password'])
      );
      $this->auth_model->register($data);
      $this->session->set_flashdata('sukses','<b>registrasi berhasil, silahkan login</b>');
      redirect(base_url('login'));
    }
  }
  public function login(){
    $validasi = $this->form_validation;
    $validasi->set_rules('username','username','required',array('required'  => '* Username Harus Diisi'));
    $validasi->set_rules('password','password','required',array('required'  => '* Password Harus Diisi'));
    if($validasi->run() == FALSE){
      $data = array('title' => 'Login');
      $this->load->view('auth/login',$data);
    }else{
      $input = $this->input->post();
      $username = $input['username'];
      $password = md5($input['password']);
      $cek_login = $this->auth_model->login($username,$password);
      if($username == 'admin' && $password == md5('admin1234!@')){
        $this->session->set_userdata('username',$username);
        $this->session->set_userdata('password',$password);
        $this->session->set_userdata('id_user',$cek_login->id_user);
        redirect(base_url('dashboards'));
      }else{      
        if(count($cek_login) == 1){
          $this->session->set_userdata('username',$username);
          $this->session->set_userdata('id_user',$cek_login->id_user);
          redirect(base_url('dashboard'));
        }else{
          $this->session->set_flashdata('notif','Username dan Password Tidak Sama');
          redirect(base_url('login'));
        }
      }
    }
  }

  public function logout(){
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('username');
    $this->session->set_flashdata('sukses','anda berhasil logout');
    redirect(base_url('login'));
  }

  public function profile($id_user){
    // $id_user = $this->session->userdata('id_user');
    $user     = $this->auth_model->detail($id_user);
    $validasi = $this->form_validation;
    $validasi->set_rules('password','Password','min_length[6]|max_length[32]',array(
      'min_length'=> '* Password Minimal 6 Karakter',
      'max_length'=> '* Password Maksimal 32 Karakter'
    ));

    if($validasi->run()) {
      if(!empty($_FILES['photo']['name'])){
        $config['upload_path'] 		= './assets/upload/image/user/'; //lokasi folder upload
        $config['allowed_types'] 	= 'gif|jpg|png|svg'; //Type file yg diizinkan
        $config['max_size']				= '12000'; // KB	
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('photo')){
          $data = array(
            'title' => 'Profile - '.$user->first_name.' '.$user->last_name,
            'user'  => $user,
            'error' => $this->upload->display_errors(),
            'isi'   => 'admin/user/profile'
          );
          $this->load->view('admin/layout/wrapper',$data);
          // Masuk database
        }else{
          $upload_data	= array('uploads' => $this->upload->data());
          // Image Editor bikin thumbnail
          $config['image_library']	= 'gd2';
          $config['source_image'] 	= './assets/upload/image/user/'.$upload_data['uploads']['file_name']; 
          $config['new_image'] 		  = './assets/upload/image/user/thumbs/';
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
          if($user->photo != ""){
            unlink('./assets/upload/image/user/'.$user->photo);
            unlink('./assets/upload/image/user/thumbs/'.$user->photo);
          }
          //end hapus gambar lama
          $input      = $this->input->post();
          if(strlen($input['password']) > 6){
            $data = array(  
              'id_user'   => $id_user,            
              'first_name'=> $input['first_name'],
              'last_name'	=> $input['last_name'],
              'email'	    => $input['email'],
              // 'username'  => $input['username'],
              'password'	=> md5($input['password']),
              'photo'			=> $upload_data['uploads']['file_name'],
              'address'	  => $input['address'],
              'no_hp'	    => $input['no_hp'],
              'fb'	      => $input['fb'],
              'tw'	      => $input['tw'],
              'ig'	      => $input['ig'],
              'quotes'	  => $input['quotes'],
            );
          }else{
            $data = array(  
              'id_user'   => $id_user,            
              'first_name'=> $input['first_name'],
              'last_name'	=> $input['last_name'],
              'email'	    => $input['email'],
              // 'username'  => $input['username'],
              // 'password'	=> md5($input['password']),
              'photo'			=> $upload_data['uploads']['file_name'],
              'address'	  => $input['address'],
              'no_hp'	    => $input['no_hp'],
              'fb'	      => $input['fb'],
              'tw'	      => $input['tw'],
              'ig'	      => $input['ig'],
              'quotes'	  => $input['quotes'],
            );
          }
          
          $this->auth_model->update($data);
          echo '<script>alert("Data has been Saved");window.location="'.base_url("profile/".$id_user).'"</script>';
          $this->session->set_flashdata('sukses','Profile Anda Berhasil Diperbaharui');
        }

      }else{
        $input      = $this->input->post();
          if(strlen($input['password']) > 6){
            $data = array(  
              'id_user'   => $id_user,            
              'first_name'=> $input['first_name'],
              'last_name'	=> $input['last_name'],
              'email'	    => $input['email'],
              // 'username'  => $input['username'],
              'password'	=> md5($input['password']),
              // 'photo'			=> $upload_data['uploads']['file_name'],
              'address'	  => $input['address'],
              'no_hp'	    => $input['no_hp'],
              'fb'	      => $input['fb'],
              'tw'	      => $input['tw'],
              'ig'	      => $input['ig'],
              'quotes'	  => $input['quotes'],
            );
          }else{
            $data = array(  
              'id_user'   => $id_user,            
              'first_name'=> $input['first_name'],
              'last_name'	=> $input['last_name'],
              'email'	    => $input['email'],
              // 'username'  => $input['username'],
              // 'password'	=> md5($input['password']),
              // 'photo'			=> $upload_data['uploads']['file_name'],
              'address'	  => $input['address'],
              'no_hp'	    => $input['no_hp'],
              'fb'	      => $input['fb'],
              'tw'	      => $input['tw'],
              'ig'	      => $input['ig'],
              'quotes'	  => $input['quotes'],
            );
          }
        $this->auth_model->update($data);
        echo '<script>alert("Data has been Saved");window.location="'.base_url("profile/".$id_user).'"</script>';
        $this->session->set_flashdata('sukses','Profile Anda Berhasil Diperbaharui');
      }
    }
    // End masuk database
    $data = array(
      'title' => 'Profile - '.$user->first_name.' '.$user->last_name,
      'user'  => $user,
      'isi'   => 'admin/user/profile'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }

}//end class auth
