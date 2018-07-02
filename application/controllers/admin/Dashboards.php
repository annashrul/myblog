<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboards extends CI_Controller {
  public function index(){
    $visitor = $this->pengunjung_model->statistik_pengujung();
    // var_dump($visitor);die();
    $data = array(
      'title'       => 'Dashboard',
      'visitor'     => $visitor,
      'isi'         => 'admin/dashboards/list'
    );
    $this->load->view('admin/layout/wrapper',$data);
  }
}