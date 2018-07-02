<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Magz is a HTML5 & CSS3 magazine template is based on Bootstrap 3.">
		<meta name="author" content="annashrul yusuf, anasrulysf, acuy, blogku, nenek mellow, aromanis simping">
		<meta property="og:url" content="https://anasrulysf.com" />
		<meta property="og:image" content="https://raw.githubusercontent.com/nauvalazhar/Magz/master/images/preview.png" />
		<title><?=$title?></title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/bootstrap/bootstrap.min.css')?>">
		<!-- IonIcons -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/ionicons/css/ionicons.min.css')?>">
		<!-- Toast -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/toast/jquery.toast.min.css')?>">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/owlcarousel/dist/assets/owl.carousel.min.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/owlcarousel/dist/assets/owl.theme.default.min.css')?>">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/magnific-popup/dist/magnific-popup.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/sweetalert/dist/sweetalert.css')?>">
		<!-- Custom style -->
		<link rel="stylesheet" href="<?=base_url('assets/front/css/style.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/css/skins/all.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/css/demo.css')?>">
		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5abbb7b71243c10013440c3f&product=inline-share-buttons' async='async'></script>
	</head>
	<style type="text/css">
		.box-border{border:1px solid #EEEEEE !important;margin-top:-140px;width:500px;}
		.akun{padding:0px 0px 0px 0px;}
		.auth{padding:0px 0px 0px 10px;}
		.form-group{height:80px;}
		/* .akun{margin-right:1px;} */
	</style>
	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4>Register</h4>
							<form method="post" action="<?=base_url('register')?>">
								<?php if($this->session->flashdata('notif')){
									echo "<div class='alert alert-warning'>";
									echo $this->session->flashdata('notif');
									echo "</div>";
								}?>
								<?php if($this->session->flashdata('sukses')){
									echo "<div class='alert alert-success'>";
									echo $this->session->flashdata('sukses');
									echo "</div>";
								}?>
								<div class="col-md-6 akun">
									<div class="form-group">
										<label>Nama Depan</label>
										<input type="text" name="first_name" class="form-control" value="<?=set_value('first_name')?>">
										<?=form_error('first_name','<p class="text-left" style="color:#FC624D!important;font-weight:bold;font-size:12px;">','</p>'); ?>	
									</div>
									<div class="form-group">
										<label>Nama Belakang</label>
										<input type="text" name="last_name" class="form-control" value="<?=set_value('last_name')?>">
										<?=form_error('last_name','<p class="text-left" style="color:#FC624D!important;font-weight:bold;font-size:12px;">','</p>'); ?>	
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" value="<?=set_value('email')?>">
										<?=form_error('email','<p class="text-left" style="color:#FC624D!important;font-weight:bold;font-size:12px;">','</p>'); ?>	
									</div>
								</div>
								<div class="col-md-6 auth">
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="username" class="form-control" value="<?=set_value('username')?>">
										<?=form_error('username','<p class="text-left" style="color:#FC624D!important;font-weight:bold;font-size:12px;">','</p>'); ?>	
									</div>
									<div class="form-group">
										<label class="fw">Password</label>
										<input type="password" name="password" class="form-control">
										<?=form_error('password','<p class="text-left" style="color:#FC624D!important;font-weight:bold;font-size:12px;">','</p>'); ?>	
									</div>
									<div class="form-group">
										<label class="fw">Konfirmasi Password</label>
										<input type="password" name="passconf" class="form-control">
										<?=form_error('passconf','<p class="text-left" style="color:#FC624D!important;font-weight:bold;font-size:12px;">','</p>'); ?>	
									</div>
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- JS -->
		<script src="<?=base_url('assets/front/js/jquery.js')?>"></script>
		<script src="<?=base_url('assets/front/js/jquery.migrate.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/bootstrap/bootstrap.min.js')?>"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="<?=base_url('assets/front/scripts/jquery-number/jquery.number.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/owlcarousel/dist/owl.carousel.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/magnific-popup/dist/jquery.magnific-popup.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/easescroll/jquery.easeScroll.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/sweetalert/dist/sweetalert.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/toast/jquery.toast.min.js')?>"></script>
		<!-- <script src="<?=base_url('assets/front/js/demo.js')?>"></script> -->
		<script src="<?=base_url('assets/front/js/e-magz.js')?>"></script>
	</body>
</html>