<section class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-left">
        <div class="row">
          <div class="col-md-12">        
            <ol class="breadcrumb">
							<li><a href="<?=base_url()?>">Home</a></li>
							<li>Image</li>
            </ol>
            <h1 class="page-title"></h1>
          </div>
        </div>
        <!-- <div class="line"></div> -->
				<div class="row">
					<div class="col-md-12 col-sm-6 col-xs-12">
						<div class="row">
							<?php $no=1; foreach($images as $i):?>
							<article class="article col-md-4">
								<div class="inner">
								<p class="text-center"><?=$i->judul_image?></p>
									<figure style="padding:0px 0px 0px 0px;">
									<a href="<?=base_url('assets/upload/image/multimedia/image/'.$i->image)?>" data-toggle="lightbox" data-title="<?=$i->judul_image?>" data-footer="<?=$i->deskripsi_image?>" data-gallery="mixedgallery">
										<img src="<?=base_url('assets/upload/image/multimedia/image/'.$i->image)?>" class="img-fluid" style="height:300px;">
									</a>
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