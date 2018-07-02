<style>
 #chart{
   z-index:-10;} 
</style>
 <div id="chart">
</div>

<?php 
	if($this->session->userdata('username') == 'admin' && $this->session->userdata('password') == md5('admin1234!@')){?>

	<div class="row">
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-users"></i></div>
				<div class="count"><?=$user?></div>
				<h3>Pengguna</h3>
				<p><a href="<?=base_url('user')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-newspaper-o"></i></div>
				<div class="count"><?=$post?></div>
				<h3>Artikel</h3>
				<p><a href="<?=base_url('artikel')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-tag"></i></div>
				<div class="count"><?=$kategori?></div>
				<h3>Kategori Artikel</h3>
				<p><a href="<?=base_url('admin/kategori')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-tags"></i></div>
				<div class="count"><?=$sub_kategori?></div>
				<h3>Sub Kategori Artikel</h3>
				<p><a href="<?=base_url('admin/sub_kategori')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-image"></i></div>
				<div class="count"><?=$image?></div>
				<h3>Image</h3>
				<p><a href="<?=base_url('m_image')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-video-camera"></i></div>
				<div class="count"><?=$video?></div>
				<h3>Video</h3>
				<p><a href="<?=base_url('m_video')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-music"></i></div>
				<div class="count"><?=$audio?></div>
				<h3>Audio</h3>
				<p><a href="<?=base_url('m_audio')?>">lihat</a></p>
			</div>
		</div>
	</div>
		<div class="clearfix"></div>
		<!-- top tiles -->
		<div class="row tile_count">
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<?php 
					$query=$this->db->query("SELECT * FROM pengunjung WHERE perangkat_pengunjung='Other' OR perangkat_pengunjung='Chrome'");
					$jml=$query->num_rows();
				?>
				<span class="count_top"><i class="fa fa-chrome"></i> CHROME</span>
				<div class="count"><?php echo $jml;?></div>
				<!-- <span class="count_bottom"><i class="green">4% </i> CHROME</span> -->
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<?php 
					$query=$this->db->query("SELECT * FROM pengunjung WHERE perangkat_pengunjung='Firefox' OR perangkat_pengunjung='Mozilla'");
					$jml=$query->num_rows();
				?>
				<span class="count_top"><i class="fa fa-firefox"></i> FIREFOX</span>
				<div class="count"><?php echo $jml;?></div>
				<!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<?php 
					$query=$this->db->query("SELECT * FROM pengunjung WHERE perangkat_pengunjung='Opera'");
					$jml=$query->num_rows();
				?>
				<span class="count_top"><i class="fa fa-opera"></i> OPERA</span>
				<div class="count"><?php echo $jml;?></div>
				<!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<?php 
					$query=$this->db->query("SELECT * FROM pengunjung WHERE perangkat_pengunjung='Other' OR perangkat_pengunjung='Internet Explorer'");
					$jml=$query->num_rows();
				?>
				<span class="count_top"><i class="fa fa-globe"></i> LAINNYA</span>
				<div class="count"><?php echo $jml;?></div>
				<!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<?php 
					$query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(tanggal_pengunjung,'%d%')=DATE_FORMAT(CURDATE(),'%d%')");
					$jml=$query->num_rows();
				?>
				<span class="count_top"><i class="fa fa-user"></i> Pengunjung Hari ini</span>
				<div class="count"><?php echo number_format($jml);?></div>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<?php 
					$query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(tanggal_pengunjung,'%y')=DATE_FORMAT(CURDATE(),'%y')");
					$jml=$query->num_rows();
				?>
				<span class="count_top"><i class="fa fa-user"></i> Pengunjung Bulan ini</span>
				<div class="count"><?php echo number_format($jml);?></div>
			</div>
		</div>


	<?php }else{?>
		<h3 class="text-center">Selamat Datang <?=$user_aktif->username?></h3>
		<?php 
			if($user_aktif->photo == '' && $user_aktif->address == '' && $user_aktif->quotes == '' && $user_aktif->fb == '' && $user_aktif->tw == '' && $user_aktif->ig == ''){
				echo "<div class='alert alert-info'>";
				echo "<b><h2 class='text-center'>Profile Anda Hanya 50%, Silahkan Lengkapi Profile Anda</h2></b>";
				echo "</div>";
			}elseif($user_aktif->address == '' && $user_aktif->quotes == '' && $user_aktif->fb == '' && $user_aktif->tw == '' && $user_aktif->ig == ''){
				echo "<div class='alert alert-info'>";
				echo "<b><h2 class='text-center'>Profile Anda Hanya 60%, Silahkan Lengkapi Profile Anda</h2></b>";
				echo "</div>";
			}elseif($user_aktif->quotes == '' && $user_aktif->fb == '' && $user_aktif->tw == '' && $user_aktif->ig == ''){
				echo "<div class='alert alert-info'>";
				echo "<b><h2 class='text-center'>Profile Anda Hanya 70%, Silahkan Lengkapi Profile Anda</h2></b>";
				echo "</div>";
			}elseif($user_aktif->fb == '' && $user_aktif->tw == '' && $user_aktif->ig == ''){
				echo "<div class='alert alert-info'>";
				echo "<b><h2 class='text-center'>Profile Anda Hanya 80%, Silahkan Lengkapi Profile Anda</h2></b>";
				echo "</div>";
			}elseif($user_aktif->fb == '' && $user_aktif->tw == '' && $user_aktif->ig == ''){
				echo "<div class='alert alert-info'>";
				echo "<b><h2 class='text-center'>Profile Anda Hanya 90%, Silahkan Lengkapi Profile Anda</h2></b>";
				echo "</div>";
			}
		?>

		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-newspaper-o"></i></div>
				<div class="count"><?=$post?></div>
				<h3>Artikel</h3>
				<p><a href="<?=base_url('artikel')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-image"></i></div>
				<div class="count"><?=$image?></div>
				<h3>Image</h3>
				<p><a href="<?=base_url('m_image')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-video-camera"></i></div>
				<div class="count"><?=$video?></div>
				<h3>Video</h3>
				<p><a href="<?=base_url('m_video')?>">lihat</a></p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-music"></i></div>
				<div class="count"><?=$audio?></div>
				<h3>Audio</h3>
				<p><a href="<?=base_url('m_audio')?>">lihat</a></p>
			</div>
		</div>
<?php } ?>

<!-- 	// foreach($this->pengunjung_model->statistik_pengunjung()->result_array() as $row){
 //      $data['grafik'][]=(float)$row['Januari'];
 //      $data['grafik'][]=(float)$row['Februari'];
 //      $data['grafik'][]=(float)$row['Maret'];
 //      $data['grafik'][]=(float)$row['April'];
 //      $data['grafik'][]=(float)$row['Mei'];
 //      $data['grafik'][]=(float)$row['Juni'];
 //      $data['grafik'][]=(float)$row['Juli'];
 //      $data['grafik'][]=(float)$row['Agustus'];
 //      $data['grafik'][]=(float)$row['September'];
 //      $data['grafik'][]=(float)$row['Oktober'];
 //      $data['grafik'][]=(float)$row['November'];
 //      $data['grafik'][]=(float)$row['Desember']; -->

 <!-- //    } -->
<?php
  /* Mengambil query report*/
  foreach($visitor as $result){
      $bulan[] = $result->tgl; //ambil bulan
      $value[] = (float) $result->jumlah; //ambil nilai
  }
  // var_dump($result);

  /* end mengambil query*/
         
?>
<script src="<?php echo base_url().'assets/tambahan/highcharts.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/tambahan/exporting.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/tambahan/offline-exporting.js'?>" type="text/javascript"></script>
<script type="text/javascript">

	// var lineChartData = {
 //    labels : 
 //    datasets : [
 //      {
 //        fillColor: "rgba(60,141,188,0.9)",
 //        strokeColor: "rgba(60,141,188,0.8)",
 //        pointColor: "#3b8bba",
 //        pointStrokeColor: "#fff",
 //        pointHighlightFill: "#fff",
 //        pointHighlightStroke: "rgba(152,235,239,1)",
 //        data : 
 //      }
 //    ]
 //  }
 //  var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
 //  var canvas = new Chart(myLine).Line(lineChartData, {
 //    scaleShowGridLines : true,
 //    scaleGridLineColor : "rgba(0,0,0,.005)",
 //    scaleGridLineWidth : 0,
 //    scaleShowHorizontalLines: true,
 //    scaleShowVerticalLines: true,
 //    bezierCurve : true,
 //    bezierCurveTension : 0.4,
 //    pointDot : true,
 //    pointDotRadius : 4,
 //    pointDotStrokeWidth : 1,
 //    pointHitDetectionRadius : 2,
 //    datasetStroke : true,
 //    tooltipCornerRadius: 2,
 //    datasetStrokeWidth : 2,
 //    datasetFill : true,
 //    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
 //    responsive: true
 //  });

	 new Highcharts.Chart({
	  chart: {
	   renderTo: 'chart',
	   type: 'line',
	  },
	  title: {
	   text: 'Grafik Statistik pengunjung',
	   x: -20
	  },
	  subtitle: {
	   text: 'Count visitor',
	   x: -20
	  },
	  xAxis: {
	   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
	  },
	  yAxis: {
	   title: {
	    text: 'Total pengunjung'
	   }
	  },
	  series: [{
	   name: 'Data dalam Bulan',
	   data: <?php echo json_encode($value);?>
	  }]
	 });
</script>
