<section class="home">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="headline">
					<div class="nav" id="headline-nav">
						<a class="left carousel-control" role="button" data-slide="prev">
							<span class="ion-ios-arrow-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" role="button" data-slide="next">
							<span class="ion-ios-arrow-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="owl-carousel owl-theme" id="headline">
						<?php if(count($trending)>0){?>							
						<?php foreach($trending as $t):?>
						<div class="item">
							<a href="<?=base_url('home/read/'.$t->slug_artikel_post)?>"><div class="badge"><?=$t->nama_kategori?>!</div><?=$t->judul_post?></a>
						</div>
						<?php endforeach ?>
						<?php } ?>
					</div>
				</div>
				
				<div class="owl-carousel owl-theme" id="featured">
					<div class="item">
						<article class="featured">
							<div class="overlay"></div>
							<?php if(count($promo)>0){?>
							<figure>
								<img src="<?=base_url('assets/upload/image/posts/'.$promo->gambar_post)?>" alt="Sample Article">
							</figure>
							<div class="details">
								<div class="category"><a href="">makanan terfavorite</a></div>
								<h1><a href="<?=base_url($promo->slug_artikel_post)?>"><?=substr($promo->artikel_post,0,200)?> ...</a></h1>
								<!-- <div class="time"><?php $waktu_posting = $promo->tanggal; echo waktu_lalu($waktu_posting);?></div> -->
							</div>
							<?php }else{ ?>
							<figure>
								<img src="<?=base_url('assets/logo.jpg')?>" alt="Sample Article">
							</figure>
							<?php } ?>
						</article>
					</div>
				</div>
				<div class="line">
					<div>Berita Terkini</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-6 col-xs-12">
						<div class="row">
							<?php if(count($post)>0){?>
							<?php foreach($post as $p):?>
							<article class="article col-md-6">
								<div class="inner">
									<figure>
										<a href="<?=base_url($p->slug_artikel_post)?>">
											<img src="<?=base_url('assets/upload/image/posts/'.$p->gambar_post)?>" alt="Sample Article" style="height:100%;">
										</a>
									</figure>
									<div class="padding" style="height:180px;padding:0px 0px 0px 0px;">
										<div class="detail">
											<div class="time"><?php $waktu_posting = $p->tanggal; echo waktu_lalu($waktu_posting);?></div>
											<div class="category"><a href="<?=base_url('kategori/'.$p->slug_kategori)?>"><?=$p->nama_kategori?></a></div>
											<?php $jumlah = $this->post_model->listKomentar($p->slug_artikel_post);?>
											<div class="category"><a><?=count($jumlah)?> Komentar</a></div>
										</div>
										<div class="col-md-12" style="padding:0px 0px 0px 0px;">
											<h2 style="height:100px;"><a href="<?=base_url($p->slug_artikel_post)?>"><?=substr($p->artikel_post,0,200)?></p>
										</div>
										<footer>
											<!-- <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div></div></a> -->
											<a class="btn btn-primary more" href="<?=base_url($p->slug_artikel_post)?>">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
							<?php endforeach ?>
							<div class="col-md-12 text-center">
								<ul class="pagination">
									<?php foreach ($pagin as $pagin){
										echo  $pagin;
									} ?>
								</ul>
            	</div>
							<?php }else{ echo 'data tidak ada';} ?>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
				<div class="sidebar-title for-tablet">Sidebar</div>
				
				<aside>
					<style type="text/css">
						.inners ul.tags-lists{padding:0px 0px 0px 0px;list-style-type:none;}
						.inners ul.tags-lists li{float:left;margin:5px 0px 5px 5px;}
						.inners ul.tags-lists li a.sub-kategori{border:1px solid #FC624D;padding:3px 5px 5px 5px;color:white!important;text-decoration:none;background-color:#FC624D;transition: all 0.5s;-webkit-transition: all 0.5s;-o-transition: all 0.5s;-moz-transition: all 0.5s;text-transform:uppercase;}
						.inners ul.tags-lists li a.sub-kategori:hover{background:white;color:black!important;}
					</style>
					<h1 class="aside-title">Tranding Kategori</h1>
					<div class="aside-body">
						<article class="article-mini">
							<?php foreach($kategori as $k):?>
								<div class="col-md-10" style="border-bottom:1px solid rgb(224,224,224);height:30px;padding:3px 0px 5px 0px;">
									<p class="text-left"><a href="<?=base_url('kategori/'.$k->slug_kategori)?>"  style="color:black!important;font-weight:bold;text-decoration:none;"><?=$k->nama_kategori?></a></p>
								</div>
								<div class="col-md-2" style="border-bottom:1px solid rgb(224,224,224);height:30px;padding:3px 0px 5px 0px;">
									<p class="text-right" style="color:black!important;font-weight:bold;">( <?php $jumlah = $this->post_model->postByKategori($k->slug_kategori); echo count($jumlah)?> )</p>
								</div>
							<?php endforeach ?>
						</article>
					</div>
					<h1 class="aside-title">Berita Lainnya</h1>
					<div class="aside-body">
						<?php foreach($postAsc as $pa):?>
						<article class="article-mini">
							<div class="inners">
								<figure>
									<a href="<?=base_url($pa->slug_artikel_post)?>">
										<img src="<?=base_url('assets/upload/image/posts/'.$pa->gambar_post)?>" alt="Sample Article">
									</a>
								</figure>
								<div class="padding">
									<h1><a href="<?=base_url($pa->slug_artikel_post)?>"><?=$pa->judul_post?></a></h1>
								</div>
							</div>
						</article>
						<?php endforeach ?>
					</div>
					<h1 class="aside-title">Sub Kategori</h1>
					<div class="aside-body">
						<article class="article-mini">
							<div class="inners" style="">
								<ul class="tags-lists" style="">
									<?php foreach($subKategori->result() as $sk):?>
									<li><a href="<?=base_url('sub/'.$sk->slug_sub_kategori)?>" class="sub-kategori"><?=$sk->nama_sub_kategori?></a></li>	
									<?php endforeach ?>																
								</ul>
							</div>
						</article>
					</div>
					<h1 class="aside-title">Instagram</h1>
					<div class="aside-body">
						<article class="article-mini">
							<div class="inners" style="padding:0px 0px 0px 0px;">
								<script type='text/javascript'> 
									var feed=new ody({get:"user",
										limit:69,
										resolution:"standard_resolution",
										template:'<a href="{{link}}" target="_blank" style="background-image:url({{image}});background-size: cover;margin-left:2px;"><img src="https://lh3.googleusercontent.com/-P-gOTAfNfZ4/V2RPSYvECxI/AAAAAAAABng/Efqy2Oxjqm4lrmDhT07PBtlgYRb_MlJ7QCCo/s576/questyerror.png" style="width:100px; margin-left:0px 10px;"></img><div class="instagrid-z" style=""><div class="instagrids" style=""><span class="instagrid-outter">{{likes}} <i class="fa fa-heart"></i><br/>{{comments}} <i class="fa fa-comment"></i></span></div></div></a>',
										userId:2205699610,
										accessToken:"2205699610.2ad80c4.433cdabe1fe14d35af46cb52b9f08243"
									});feed.run();
								</script>
								<div id='ody'></div>
							</div>
						</article>
					</div>
					
				</aside>
				<aside>
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li class="active">
							<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
								<i class="ion-android-star-outline"></i> Recomended
							</a>
						</li>
						<li>
							<a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
								<i class="ion-ios-chatboxes-outline"></i> Comments
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="recomended">
							<?php foreach($komentar as $k):?>
							<article class="article-fw">
								<div class="inner">
									<figure>
										<a href="single.html">
											<img src="images/news/img16.jpg" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="time">December 31, 2016</div>
											<div class="category"><a href="category.html">Sport</a></div>
										</div>
										<h1><a href="single.html"><?=$k->judul_post?></a></h1>
										<p>
											Donec congue turpis vitae mauris condimentum luctus. Ut dictum neque at egestas convallis. 
										</p>
									</div>
								</div>
							</article>
							<?php endforeach ?>
							<div class="line"></div>
						</div>
						<div class="tab-pane comments" id="comments">
							<div class="comment-list sm">
								<?php foreach($orang_komentar as $ok):?>
								<div class="item">
									<div class="user">                                
										<figure>
											<img src="images/img01.jpg" alt="User Picture">
										</figure>
										<div class="details">
											<h5 class="name"><?=$ok->nama_komentar?></h5>
											<div class="time">24 Hours</div>
											<div class="description">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit.
											</div>
										</div>
									</div>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</aside>
				<aside>
					<div class="aside-body">
						<form class="newsletter">
							<div class="icon">
								<i class="ion-ios-email-outline"></i>
								<h1>Newsletter</h1>
							</div>
							
							<div class="input-group">
								<input type="email" class="form-control email" placeholder="Your mail">
								<div class="input-group-btn">
									<button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
								</div>
							</div>
							<p>By subscribing you will receive new articles in your email.</p>
						</form>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>
