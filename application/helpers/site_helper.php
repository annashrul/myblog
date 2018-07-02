<?php defined('BASEPATH') OR exit('No direct script access allowed');

  // function add_count($slug_artikel_post){
  //   $ini =& get_instance();
  //   $cek_visitor = $ini->input->cookie($slug_artikel_post, FALSE);
  //   $ip = $ini->input->ip_address();
  //   // var_dump($ip);die();
  //   if($cek_visitor == FALSE){
  //     $cookie = array('name'=>urldecode($slug_artikel_post), "value" => $ip, "expire" => time() + 7200, "secure" => false);
  //     $ini->input->set_cookie($cookie);
  //     $ini->post_model->update_counter($slug_artikel_post);
  //   }
  // }

  function add_count($slug_artikel_post){
    $ini =& get_instance();
    // load cookie helper
    $ini->load->helper('cookie');
    // this line will return the cookie which has slug$slug_artikel_post name
    $check_visitor = $ini->input->cookie(urldecode($slug_artikel_post), FALSE);
    // this line will return the visitor ip address
    $ip = $ini->input->ip_address();
    // if the visitor visit this article for first time then //
    //set new cookie and update article_views column  ..
    //you might be notice we used slug$slug_artikel_post for cookie name and ip 
    //address for value to distinguish between articles  views
    if ($check_visitor == false) {
      $cookie = array(
        "name"   => urldecode($slug_artikel_post),
        "value"  => "$ip",
        "expire" =>  time() + 7200,
        "secure" => false
      );
      $ini->input->set_cookie($cookie);
      $ini->post_model->update_counter(urldecode($slug_artikel_post));
    }
  }
