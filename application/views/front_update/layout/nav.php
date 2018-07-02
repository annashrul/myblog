<style type="text/css">
  /* SAMPLE CSS STYLES FOR JQUERY CLOCK PLUGIN */
  .jqclock {background:#FC624D; float:left; text-align:center;padding:0px 0px 0px 0px;margin-top:-5px;}
  /* .clockdate { color:red; font-size: 18px; display: block;} */
  .clocktime { padding: 5px; font-size: 14px;font-weight:bold; font-family: "Courier"; color:white!important; margin: 4px; display: block; }
</style>
<body class="skin-orange">
  <header class="primary">
    <div class="firstbar">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <div class="brand">
              <a href="<?=base_url()?>">
                <img src="<?=base_url('assets/logo.jpg')?>" alt="Magz Logo" style="height:50px;width:100px;">
              </a>
            </div>						
          </div>
          <div class="col-md-6 col-sm-12">
            <form class="search" autocomplete="on" action="<?php echo base_url('search');?>" method="get">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="s" class="form-control form-cari" placeholder="Type something here" required>									
                  <div class="input-group-btn">
                    <input id="search_submit" name="q" value="cari" class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                  </div>
                </div>
              </div>
            </form>								
          </div>
          <div class="col-md-3 col-sm-12 text-right">
            <ul class="nav-icons">
              <li><div id="jam"></div></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Start nav -->
    <nav class="menu" style="padding:0px 0px 0px 0px;height:auto;">
      <div class="container">
        <div class="mobile-toggle">
          <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
        </div>
        <div class="mobile-toggle">
          <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
        </div>
        <div id="menu-list" style="height:auto;">
          <ul class="nav-list"  style="padding:0px 0px 0px 0px;height:auto;">
            <li class="<?php if($this->uri->segment(1)==""){echo "active";}?>"><a href="<?=base_url()?>" style="font-size:12px;">Home</a></li>
            <?php if(count($kategori)<0){?>
            <?php }else{?>
            <?php foreach($kategori as $k):?>
            <li class="dropdown magz-dropdown" style="padding:0px 0px 0px 0px;height:auto;">
              <a href="" style="font-size:12px;"><?=$k->nama_kategori?><i class="ion-ios-arrow-right"></i></a>
              <ul class="dropdown-menu">
                <?php $jumlah = $this->post_model->postByKategoriNav($k->slug_kategori);?>
                <?php foreach($jumlah as $j):?>
                  <li><a href="<?=base_url('sub/'.$j->slug_sub_kategori)?>"><?=$j->nama_sub_kategori?></a></li>
                <?php endforeach ?>
              </ul>
            </li>
            <?php endforeach ?>
            <?php } ?>
            <li class="dropdown magz-dropdown" style="padding:0px 0px 0px 0px;height:auto;">
              <a href="" style="font-size:12px;">Multimedia<i class="ion-ios-arrow-right"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url('image')?>">Image</a></li>
                <li><a href="<?=base_url('video')?>">Video</a></li>
                <li><a href="<?=base_url('audio')?>">Audio</a></li>
              </ul>
            </li>
            <li class="<?php if($this->uri->segment(1)=="login"){echo "active";}?>"><a href="<?=base_url('login')?>" style="font-size:12px;"><i class="ion-person"></i> Login</a></li>
            <li class="<?php if($this->uri->segment(1)=="about"){echo "active";}?>"><a href="<?=base_url('about')?>" style="font-size:12px;"><i class="ion-person"></i> About</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End nav -->
  </header>