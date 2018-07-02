<?php
class Pengunjung_model extends CI_Model{

	function set_pengunjung($user_ip){
		$hsl=$this->db->query("INSERT INTO pengunjung (ip_pengunjung) VALUES ('$user_ip')");
		return $hsl;
        // var_dump($hsl);die();
	}

	function statistik_pengujung(){
        $query = $this->db->query("SELECT DATE_FORMAT(tanggal_pengunjung,'%d') AS tgl,COUNT(ip_pengunjung) AS jumlah FROM pengunjung WHERE MONTH(tanggal_pengunjung)=MONTH(CURDATE()) GROUP BY DATE(tanggal_pengunjung)");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function simpan_user_agent($user_ip,$agent){
    	$hsl=$this->db->query("INSERT INTO pengunjung (ip_pengunjung,perangkat_pengunjung) VALUES('$user_ip','$agent')");
    	return $hsl;
    }

    // function cek_ip($lokasi_pengunjung,$user_ip){
    // 	$hsl=$this->db->query("SELECT * FROM pengunjung WHERE ip_pengunjung='$user_ip' AND lokasi_pengunjung='$lokasi_pengunjung' AND DATE(tanggal_pengunjung)=CURDATE()");
    // 	return $hsl;
    // }
    function cek_ip($user_ip){
        $this->db->select('*');
        $this->db->from('pengunjung');
        $this->db->where('ip_pengunjung',$user_ip);
        // $this->db->where('lokasi_pengunjung',$user_lokasi);
        $this->db->where('DATE(tanggal_pengunjung)=CURDATE()');
        $query = $this->db->get();
        return $query;
    }
	
}