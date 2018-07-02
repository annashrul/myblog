<?php defined('BASEPATH') OR exit('No direct script access allowed');

  function Hari($apa,$input){
    $hari = array(
      'Monday'    => 'Senin',
      'Tuesday'   => 'Selasa',
      'Wednesday' => 'Rabu',
      'Thursday'  => 'Kamis',
      'Friday'    => 'Jumat',
      'Saturday'  => 'Sabtu',
      'Sunday'    => 'Minggu'
    );

    $bulan = array(
      '01'  => 'Januari',
      '02'  => 'Februari',
      '03'  => 'Maret',
      '04'  => 'April',
      '05'  => 'Mei',
      '06'  => 'Juni',
      '07'  => 'Juli',
      '08'  => 'Agustus',
      '09'  => 'September',
      '10'  => 'Oktober',
      '11'  => 'November',
      '12'  => 'Desember'
    );

    if($apa == 'bulan'){
      $result = $bulan[$input];
    }else{
      $result = $hari[$input];
    }
    return $result;
  }
  function waktu_lalu($timestamp){
    date_default_timezone_set('Asia/Jakarta');
    $selisih = time() - strtotime($timestamp) ;
 
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
 
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    
    return $waktu;
}