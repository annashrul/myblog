<style type="text/css">
  .home-section-1{border:0px;height:700px;margin-top:115px;}
  /* .home-section-1 .breaking-news{height:50px;} */
  .home-section-1 .landing-page{padding:0px 0px 0px 0px;margin-top:10px;margin-bottom:10px;height:530px;}
  .home-section-1 .landing-page .panel{border-radius:0px;margin:0px 1px 0px 1px;border:1px solid #EEEEEE;}
  .home-section-1 .landing-page .panel .panel-body{height:480px;}
  .home-section-1 .landing-page .panel .panel-body img.img-artikel{height:300px;width:100%;filter: grayscale(100%);-webkit-filter: grayscale(100%);-webkit-transition: all 1s ease;-webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
       -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
          transition: all 1s ease;}
  .home-section-1 .landing-page .panel .panel-body img.img-artikel:hover{filter: grayscale(0%);filter: gray;-webkit-filter: grayscale(0%);
    filter: none;transition: 1s ease;}
  .home-section-1 .landing-page .panel .panel-body h4.text-left a{text-decoration: none;color: #434a54;font-size: 18px;font-weight: 700;}
  .home-section-1 .landing-page .panel .footer-artikel{background-color:#d43f3a!important;border-radius:0px;height:60px;}
  .home-section-1 .wrap-search{margin-top:10px;padding:0px 0px 0px 0px;}
  .home-section-1 .wrap-search .panel{background-color:#FFFFFF;padding:0px 13px 15px 13px;border-radius:0px;}
  .home-section-1 .wrap-search .panel h4.text-left{color: #434a54;font-size: 14px;font-weight: 700;}
  .home-section-1 .wrap-search .panel input.search-query{border-radius:0px;}
  .home-section-1 .wrap-search .panel input.search-query:focus{box-shadow:none;}
  span.input-group-btn button.btn-danger{border-radius:0px;outline:none;}
  span.input-group-btn button.btn-danger:focus{box-shadow:none;}
  .home-section-1 .wrap-search .sosial-media{height:60px;}
  ul.social-network{list-style: none;display: inline;margin-left: 0 !important;padding: 0;}
  ul.social-network li {display: inline;margin: 0 5px;}
  /* footer social icons */
  .social-network a.icoRss:hover {
    background-color: #F56505;
  }

  .social-network a.icoFacebook:hover {
    background-color: #3B5998;
  }

  .social-network a.icoTwitter:hover {
    background-color: #33ccff;
  }

  .social-network a.icoGoogle:hover {
    background-color: #BD3518;
  }

  .social-network a.icoVimeo:hover {
    background-color: #0590B8;
  }

  .social-network a.icoLinkedin:hover {
    background: #f09433; 
background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );
  }

  .social-network a.icoRss:hover i,
  .social-network a.icoFacebook:hover i,
  .social-network a.icoTwitter:hover i,
  .social-network a.icoGoogle:hover i,
  .social-network a.icoVimeo:hover i,
  .social-network a.icoLinkedin:hover i {
    color: #fff;
  }

  a.socialIcon:hover,
  .socialHoverClass {
    color: #44BCDD;
  }

  .social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    text-align: center;
    width: 40px;
    height: 40px;
    font-size: 20px;
  }

  .social-circle li i {
    margin: 0;
    line-height: 40px;
    text-align: center;
  }

  .social-circle li a:hover i,
  .triggeredHover {
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -ms--transform: rotate(360deg);
    transform: rotate(360deg);
    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    -ms-transition: all 0.2s;
    transition: all 0.2s;
  }

  .social-circle i {
    color: #fff;
    -webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;
    -o-transition: all 0.8s;
    -ms-transition: all 0.8s;
    transition: all 0.8s;
  }
 ul.social-network li a{ background-color: #D3D3D3;}
 .home-section-1 .wrap-search img.img-berita-terkini{height:50px;width:100%;}
</style>
<div class="container home-section-1">
  <div class="row">
    <div class="col-md-8">
      <?php 
        foreach($post as $p):
        $hari = date('l',strtotime($p->tanggal));
				$hari2= date('d',strtotime($p->tanggal));
				$bln  = date('m',strtotime($p->tanggal));
				$thn  = date('Y',strtotime($p->tanggal));  
      ?>
      <div class="col-md-6 landing-page">
        <div class="panel panel-default">
          <div class="panel-body">
            <center><img src="<?=base_url('assets/upload/image/posts/'.$p->gambar_post)?>" class="img img-responsive img-artikel"></center>
            <h4 class="text-left"><a href="<?=base_url('home/read/'.$p->slug_artikel_post)?>"><?=$p->judul_post?></a></h4>
            <p class="text-left"><?=substr($p->artikel_post,0,200)?></p>
          </div>
          <div class="panel-footer footer-artikel">
            <p class="text-left" style="color:#FFFFFF;">
              <i class="fa fa-pencil"></i> <?=$p->first_name?> <?=$p->last_name?> | <i class="fa fa-tags"></i> <?=$p->nama_kategori?><br/>
              <i class="fa fa-clock-o"></i> <?php $waktu_posting = $p->tanggal; echo waktu_lalu($waktu_posting);  ?> | <i class="fa fa-comment"></i> 
              <!-- $waktu_posting = $data['timestamp'];
//echo waktu_lalu($waktu_posting); -->
            </p>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <div class="col-md-4">
        <div class="col-md-12 wrap-search">
          <div class="panel panel-default">
            <h4 class="text-left">SEARCH</h4>
            <div class="input-group col-md-12">
              <form id="form_search" action="<?php echo base_url('home/search');?>" method="post">
                <div class="input-group">
                  <input type="text" name="judul_post" class="search-query form-control" id="judul_post" placeholder="Title">
                  <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
                  </span>
                </div>
                <!-- <div class="form-group">
                  <label>Kategori</label>
                  <input name="nama_kategori" class="form-control" placeholder="Description">
                </div> -->
              </form>
              <!-- <input type="text" class="search-query form-control" name="judul_post" id="judul_post" placeholder="Search" />
              <span class="input-group-btn">
                <button class="btn btn-danger" type="button" style="">
                  <i class="fa fa-search"></i>
                </button>
              </span> -->
            </div>
          </div>
          <div class="panel panel-default">
            <h4 class="text-left">SOSIAL MEDIA</h4>
            <ul class="social-network social-circle">
              <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="icoLinkedin" title="Instagram"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
            </ul>
          </div>
          <div class="panel panel-default" style="height:280px;;padding:15px 13px 10px 15px;">
            <h4 class="text-left">BERITA TERKNI</h4>
            <div class="col-md-2" style="padding:0px 0px 0px 0px;margin-bottom:5px;">
              <img src="<?=base_url('assets/logo.jpg')?>" class="img img-responsive img-berita-terkini">
            </div>
            <div class="col-md-10">
              <h4 class="text-left"><a href="">Inilah Alasan Larangan Mengejek Jomblo</a></h4>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2" style="padding:0px 0px 0px 0px;margin-bottom:5px;">
              <img src="<?=base_url('assets/logo.jpg')?>" class="img img-responsive img-berita-terkini">
            </div>
            <div class="col-md-10">
              <h4 class="text-left"><a href="">Inilah Alasan Larangan Mengejek Jomblo</a></h4>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2" style="padding:0px 0px 0px 0px;margin-bottom:5px;">
              <img src="<?=base_url('assets/logo.jpg')?>" class="img img-responsive img-berita-terkini">
            </div>
            <div class="col-md-10">
              <h4 class="text-left"><a href="">Inilah Alasan Larangan Mengejek Jomblo</a></h4>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2" style="padding:0px 0px 0px 0px;margin-bottom:5px;">
              <img src="<?=base_url('assets/logo.jpg')?>" class="img img-responsive img-berita-terkini">
            </div>
            <div class="col-md-10">
              <h4 class="text-left"><a href="">Inilah Alasan Larangan Mengejek Jomblo</a></h4>
            </div>
          </div>
          <div class="panel panel-default" style="height:300px;">
            <h4 class="text-left">KATEGORI</h4>
            <?php foreach($kategori as $k):?>
            <div class="col-md-10" style="padding:0px 0px 0px 0px;">
              <p class="text-left"><a href="<?=base_url('home/kategori/'.$k->slug_kategori)?>"><?=$k->nama_kategori?></a></p>
            </div>
            <div class="col-md-2">
              <p class="text-right"><?php $jumlah = $this->post_model->postByKategori($k->slug_kategori); echo count($jumlah)?></p>
            </div>
            <hr style="border:1px solid #EEEEEE">
            <?php endforeach ?>
          </div>
        </div>
      </div>
  </div>
</div>