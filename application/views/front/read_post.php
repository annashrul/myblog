
<style type="text/css">
  .background-read{border:1px solid black;background-image:url(<?=base_url('assets/upload/image/posts/'.$readPost->gambar_post)?>);background-position:center;background-repeat: no-repeat;background-size: cover;min-height: 450px;margin-top:110px;}


		.content{
      margin-top:-55px;
			border: 2px dotted green;
			padding: 3px 10px 5px 10px;
			margin-left: 300px;
			min-height: 2000px;
			/* color: darkgrey; */
		}
    .content img.img-content{width:100%;}

		#sidebar{
			float: left;
			width: 300px;
			color: #ffbdbd;
			will-change: min-height;
		}

		#sidebar .sidebar__inner{
			border: 2px dotted red;
			padding: 10px 20px 10px 10px;
			position: relative;
			transform: translate(0, 0);
			transform: translate3d(0, 0, 0);
			will-change: position, transform;
		}
		.clearfix:after{
			display: block;
			content: "";
			clear: both;
		}

</style>
<div class="container-fluid background-read">
  <div class="row">
    <div class="col-md-12">

    </div>
  </div>
</div>

<div class="container-fluid clearfix" style="border:1px solid black;padding:0px 10px 0px 10px;">
		<div id="sidebar">
			<div class="sidebar__inner">
        <?php foreach($artikel_terkait as $at):?>
				<p><?=$at->judul_post?></p>
        <?php endforeach ?>
			</div>
		</div>
		<div class="col-md-8 content" style="border:1px solid black;width:1030px;">
			<h2 class="text-left"><?=$readPost->judul_post?></h2>
      <center><img src="<?=base_url('assets/upload/image/posts/'.$readPost->gambar_post)?>" alt="" class="img img-responsive img-content"></center>
      <p><?=$readPost->artikel_post?></p>
		</div>		
	</div>