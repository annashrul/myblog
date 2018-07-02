<section class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-left">
        <div class="row">
          <div class="col-md-12">        
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li>Audio</li>
            </ol>
            <h1 class="page-title"></h1>
          </div>
        </div>
        <!-- <div class="line"></div> -->
				<div class="row">
					<div class="col-md-12 col-sm-6 col-xs-12">
						<div class="row">
							<?php foreach($audios as $a):?>
							<article class="article col-md-4" style="height:100px;">
								<div class="inner" style="height:50px;">
									<p class="text-center"><?=$a->judul_audio?></p>
									<figure style="padding:0px 0px 0px 0px;">
										<audio controls style="border:1px solid #ccc;width:100%;height:34px;">
											<source src="<?=base_url('assets/upload/image/multimedia/audio/'.$a->audio)?>" type="audio/ogg">
											<source src="<?=base_url('assets/upload/image/multimedia/audio/'.$a->audio)?>" type="audio/mpeg">
										</audio>
									</figure>
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