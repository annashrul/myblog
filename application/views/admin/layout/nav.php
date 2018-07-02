  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php if($this->session->userdata('username') == 'admin' && $this->session->userdata('password') == md5('admin1234!@')){?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><img src="<?=base_url('assets/admin/build/images/logo.svg')?>" alt="..." class="img-circle profile_img" style="height:30;width:30px;margin-top:-7px;"></i> <span>Blogs-Ku</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url('assets/upload/image/user/'.$user_aktif->photo)?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$user_aktif->username?></h2>
              </div>
            </div>
            <br/>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?=base_url()?>" target="_blank"><i class="fa fa-home"></i> Blogku</a></li>
                  <li><a href="<?=base_url('dashboards')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="<?=base_url('profile/'.$user_aktif->id_user)?>"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="<?=base_url('user')?>"><i class="fa fa-users"></i> User</a></li>
                  <li><a><i class="fa fa-newspaper-o"></i> Artikel <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('artikel')?>">List Artikel</a></li>
                      <li><a href="<?=base_url('admin/kategori')?>">List Kategori</a></li>
                      <li><a href="<?=base_url('admin/kategori/sub_kategori')?>">List Sub Kategori</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Multimedia <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('m_image')?>">Image</a></li>
                      <li><a href="<?=base_url('m_video')?>">Video</a></li>
                      <li><a href="<?=base_url('m_audio')?>">Audio</a></li>
                    </ul>
                  </li>
                  <li><a href="<?=base_url('logout')?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <?php }else{?>

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><img src="<?=base_url('assets/admin/build/images/logo.svg')?>" alt="..." class="img-circle profile_img" style="height:30;width:30px;margin-top:-7px;"></i> <span>Blogs-Ku</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url('assets/upload/image/user/'.$user_aktif->photo)?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$user_aktif->first_name?> <?=$user_aktif->last_name?></h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?=base_url()?>" target="_blank"><i class="fa fa-home"></i> Blogku</a></li>
                  <li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="<?=base_url('profile/'.$user_aktif->id_user)?>"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="<?=base_url('artikel')?>"><i class="fa fa-newspaper-o"></i> Artikel</a></li>
                  <li><a><i class="fa fa-home"></i> Multimedia <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('m_image')?>">Image</a></li>
                      <li><a href="<?=base_url('m_video')?>">Video</a></li>
                      <li><a href="<?=base_url('m_audio')?>">Audio</a></li>
                    </ul>
                  </li>
                  <li><a href="<?=base_url('logout')?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <?php } ?>
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$title?></h2>
                  <div class="clearfix"></div>
                </div>
      
    
  