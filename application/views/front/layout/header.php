<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$title?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?=$seo?>">
    <meta name="description" content="<?=$seo?>">
    <meta name="author" content="anasrulysf, annashrul yusuf, acuy">
    <meta property="og:url" content="https://anasrulysf.com" />
    <meta property="og:type" content="blog" />
    <meta property="og:title" content="<?=$title?>" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="<?=base_url('assets/logo.jpg')?>" />
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/css/bootstrap3.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/blogku.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <link rel='shortcut icon' type='image/x-icon' href='<?=base_url('assets/logo.jpg')?>' />  
  </head>
  <style type="text/css">
    
@media screen and (min-width: 1170px) {
  .navbar-default {padding: 30px 0;transition: padding 0.3s;border:1px solid black;background:#222;}
  .navbar-default.navbar-shrink {padding: 10px 0;}
}
.navbar-default a{color: #4D4D4D;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;text-transform: uppercase;text-decoration: none;
  line-height: 42px;font-weight: 700;font-size: 16px;}
.navbar-default a.brand > img {max-width: 70px;max-height:50px;}
.navbar-default a.active{color:#2dbccb;}
ul.navbar-nav li.page-scroll a{transition: all 0.50s linear;}
ul.navbar-nav li.page-scroll a:hover{background-color:rgb(250,250,250);color:#222!important;}

  </style>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?=base_url()?>"><img src="<?=base_url('assets/logo.jpg')?>" class="img-responsive" title="trungk18" alt="trungk18" /></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-nav">
          <ul class="nav navbar-nav navbar-right">
            <?php foreach($kategori as $k):?>
            <li class="page-scroll">
              <a href="<?=base_url('home/kategori/'.$k->slug_kategori)?>"><?=$k->nama_kategori?></a>
            </li>
            <?php endforeach ?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    

    