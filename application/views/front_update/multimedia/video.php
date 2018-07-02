<section class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-left">
        <div class="row">
          <div class="col-md-12">        
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li>Video</li>
            </ol>
            <h1 class="page-title"></h1>
          </div>
        </div>
        <!-- <div class="line"></div> -->
				<div class="row">
					<div class="col-md-12 col-sm-6 col-xs-12">
						<div class="row">
							<?php foreach($videos as $v):?>
							<article class="article col-md-4">
								<div class="inner">
								  <p class="text-center"><?=$v->judul_video?></p>
									<video controls style="height:400px;width:360px;">
                    <source src="<?=base_url('assets/upload/image/multimedia/video/'.$v->video)?>" type="video/mp4">
                    <source src="<?=base_url('assets/upload/image/multimedia/video/'.$v->video)?>" type="video/ogg">
                    Your browser does not support the video tag.
                  </video>
								</div>
							</article>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>