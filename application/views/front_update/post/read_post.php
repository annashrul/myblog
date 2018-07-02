<style type="text/css">
	/* .sub-lainnya{border:1px solid black;} */
	.sub-lainnya ul.wrap-sub-lainnya{padding:0px 0px 0px 0px;}
	.sub-lainnya ul.wrap-sub-lainnya li.content-sub-lainnya{list-style-type:none;float:left;margin:5px 0px 5px 5px;}
	.sub-lainnya ul.wrap-sub-lainnya li.content-sub-lainnya a.nama-sub{border:1px solid #FC624D;padding:5px 5px 5px 5px;color:white!important;text-decoration:none;background-color:#FC624D;transition: all 0.5s;-webkit-transition: all 0.5s;-o-transition: all 0.5s;-moz-transition: all 0.5s;text-transform:uppercase;font-weight:bold;}
	.sub-lainnya ul.wrap-sub-lainnya li.content-sub-lainnya a.nama-sub:hover{background:white;color:black!important;font-weight:bold;}
</style>    
<section class="single"><!--SINGLE SECTION-->
	<div class="container"><!--CONTAINER-->
		<div class="row"><!--ROW-->
			<div class="col-md-4 sidebar" id="sidebar"><!--COL-MD-4 SIDEBAR-->
				<aside><!--ASIDE TRANDING KATEGORI && ARTIKEL LAINNYA-->
					<!--TRANDING KATEGORI-->
					<h1 class="aside-title">Tranding Kategori</h1>
					<div class="aside-body"><!--ASIDE-BODY-->
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
					</div><!--END ASIDE-BODY-->
					<!--END TRANDING KATEGORI-->
					<!--ARTIKEL LAINNYA-->
					<h1 class="aside-title">Artikel Lainnya</h1>
					<div class="aside-body"><!--ASIDE-BODY-->
						<?php foreach($artikelTerkaitByPost as $k):?> 
							<article class="article-mini">
								<div class="inner">
									<figure>
										<a href="<?=base_url($k->slug_artikel_post)?>">
											<img src="<?=base_url('assets/upload/image/posts/'.$k->gambar_post)?>" style="height:100%;">
										</a>
									</figure>
									<div class="padding">
										<h1><a href="<?=base_url($k->slug_artikel_post)?>"><?=substr($k->judul_post,0,50)?></a></h1>
										<div class="detail">
											<div class="category"><a href="<?=base_url('kategori/'.$k->slug_kategori)?>"><?=$k->nama_kategori?></a></div>
											<div class="time"><?php $waktu_posting = $k->tanggal; echo waktu_lalu($waktu_posting);?></div>
										</div>
									</div>
								</div>
							</article>
						<?php endforeach ?>
					</div><!--AND ASIDE-BODY-->
					<!--END ARTIKEL LAINNYA-->
				</aside><!--END ASIDE TRANDING KATEGORI && ARTIKEL LAINNYA-->
				<aside>
					<h1 class="aside-title">Sub Kategori Lainnya</h1>
					<div class="aside-body sub-lainnya">
						<ul class="wrap-sub-lainnya">
							<?php foreach($subKategoriLainnya as $skl):?>
							<li class="content-sub-lainnya">
								<a href="<?=base_url('sub/'.$skl->slug_sub_kategori)?>" class="nama-sub"><?=$skl->nama_sub_kategori?></a>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
				</aside><!--END ASIDE-->
				<style>
					p#error{background:#ef543b;color:#FFFFFF;padding:10px 10px 10px 10px;display: none;}
					p#sukses{background:#3f51b5;color:#FFFFFF;padding:10px 10px 10px 10px;display: none;}
					.loading{display:none;}
				</style>
				
			</div><!--END COL-MD-4 SIDEBAR-->
			<div class="col-md-8"><!--COL-MD-8-->
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active"><?=$readPost->nama_kategori?></li>
				</ol>
				<article class="article main-article">
					<header>
						<h1><?=$readPost->judul_post?></h1>
						<ul class="details">
							<li><?php $waktu_posting = $readPost->tanggal; echo waktu_lalu($waktu_posting);?></li>
							<li><a href="<?=base_url('sub/'.$readPost->slug_sub_kategori)?>"><?=$readPost->nama_sub_kategori?></a></li>
							<li>By <a href="#"><?=$readPost->first_name?> <?=$readPost->last_name?></a></li>
							<li><a href="#list_komentar"><?=count($komen)?> Komentar</a></li>
						</ul>
					</header>
					<div class="main">
						<div class="featured">
							<figure>
								<img src="<?=base_url('assets/upload/image/posts/'.$readPost->gambar_post)?>" style="height:100%;">
								<figcaption></figcaption>
							</figure>
						</div>
						<p><?=$readPost->artikel_post?></p>
					</div>
				</article>
				<div class="sharing">
					<div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
					<div class="sharethis-inline-share-buttons"></div>
				</div>
				<div class="line">
					<div>Author</div>
				</div>
				<div class="author">
					<figure><img src="<?=base_url('assets/upload/image/user/'.$author->photo)?>"></figure>
					<div class="details">
						<h3 class="name"><?=$author->first_name?> <?=$author->last_name?></h3>
						<p class="text-left" style="text-align:justify"><?=strtoupper($author->quotes)?>.</p>
						<ul class="social trp sm">
							<li>
								<a href="<?=$author->fb?>" class="facebook">
									<svg><rect/></svg>
									<i class="ion-social-facebook"></i>
								</a>
							</li>
							<li>
								<a href="<?=$author->tw?>" class="twitter">
									<svg><rect/></svg>
									<i class="ion-social-twitter"></i>
								</a>
							</li>
							<li>
								<a href="<?=$author->tw?>" class="instagram">
									<svg><rect/></svg>
									<i class="ion-social-instagram"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="line">
					<div>Komentar</div>
				</div>
				<?php 
          $id_user = $this->session->userdata('id_user');
          $user_aktif = $this->auth_model->detail($id_user);
        ?>
				<div class="comments"><!--COMMENTS-->
					<h3 class="text-left title" style="margin-left:20px;"><?=count($komen)?> Komentar</h3>
					<div class="comment-list" style="">
						<div class="item" id="list_komentar" style="border:1px solid #EEEEEE;padding:5px 5px 5px 5px;overflow:auto;"></div>
					</div>
					<!-- <div class="comment-list" style=""></div> -->
					<div class="col-md-12" class="error">
						<p class="text-center"  id="error"></p>
						<p class="text-center"  id="sukses"></p>
					</div>
					<div class="form-group col-md-6">
						<label for="name">Nama <span class="required"></span></label>
						<input type="text" id="nama_komentar" name="nama_komentar" class="form-control">
						<input type="hidden" id="id_post" name="id_post" value="<?=$readPost->id_post?>" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email <span class="required"></span></label>
						<input type="email" id="email_komentar" name="email_komentar" class="form-control">
					</div>
					<div class="form-group col-md-12">
						<label for="message">Komentar <span class="required"></span></label>
						<textarea class="form-control" name="isi_komentar" id="isi_komentar" placeholder="Tuliskan Komentarmu Disini..."></textarea>
					</div>
					<div class="form-group col-md-12">
						<button class="btn btn-primary" id="submit" name="submit" type="submit" >Kirim</button>
						<button class="btn btn-default loading" style="padding:0px 0px 0px 0px;">
							<img src="<?=base_url('assets/loading.gif')?>" width="40">
						</button>
					</div>
				</div><!--END COMMENTS-->
			</div><!--END COL-MD-8-->
		</div><!--END ROW-->
	</div><!--END CONTAINER-->
</section><!--END SINGLE SECTION-->



<script type="text/javascript">
	$(document).ready(function() {
    tampil();
    moment.locale('id');
    var height = 0;
    $('.item').each(function(i, value){
        height += parseInt($(this).height());
    });
    height += '';
    $('.item').animate({scrollTop: height});
		function tampil(){
      var slug_artikel_post = '<?=$readPost->slug_artikel_post?>';
      $.ajax({
        type : 'POST',
        url 	: '<?=base_url("komentar")?>',
        dataType : 'JSON',
        data : {'slug_artikel_post':slug_artikel_post},
        success  : function(data){
        console.log(data);
          var isi = "";
          for(var i=0; i<data.length; i++){
						isi +=
							'<div class="user" style=""> '+                               
								'<figure>'+
									'<img src="<?=base_url('assets/front/images/img01.jpg')?>">'+
								'</figure>'+
								'<div class="details">'+
									'<h5 class="name" style="padding:0px 0px 0px 0px;margin-top:-3px;">'+data[i].nama_komentar+'</h5>'+
									'<div class="time">'+moment(data[i].tanggal_komentar).fromNow()+'</div>'+
									'<div class="description" style="padding:0px 0px 0px 0px;margin-top:-3px;">'+data[i].isi_komentar+'</div>'+
								'</div>'+
							'</div>'+
						'<div class="reply-list">'+
							'<div class="item">'+
								'<div class="user">'+                              
									'<figure>'+
										'<img src="<?=base_url('assets/front/images/img01.jpg')?>">'+
									'</figure>'+
									'<div class="details">'+
										'<h5 class="name">'+data[i].username+'</h5>'+
										'<div class="time">24 Hours</div>'+
										'<div class="description">'+data[i].isi_balas_komentar+'</div>'+
										'<footer>'+
											'<a href="#">Reply</a>'+
										'</footer>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
          }
          $('#list_komentar').html(isi);
        }
      });
    }
    $("#submit").click(function(){
      if($("#nama_komentar").val() == "" && $("#isi_komentar").val() == ""){
        $("#error").html('<h5 style="color:#FFFFFF;">maaf, form tidak boleh kosong</h5>').slideDown('slow/400/fast');
        $("#nama_komentar").focus();
      }else if($("#nama_komentar").val() == ""){
        $("#error").html('<h5 style="color:#FFFFFF;">silahkan isi nama anda</h5>').slideDown('slow/400/fast');
        $("#nama_komentar").focus();
      }else if($("#email_komentar").val() == ""){
        $("#error").html('<h5 style="color:#FFFFFF;">silahkan isi email anda</h5>').slideDown('slow/400/fast');
        $("#email_komentar").focus();
      }else if($("#isi_komentar").val() == ""){
        $("#error").html('<h5 style="color:#FFFFFF;">silahkan isi komentar anda</h5>').slideDown('slow/400/fast');
        $("#isi_komentar").focus();
      }else{
        var komentar = {
          "id_komentar" : $("#id_komentar").val(),
          "id_post"	  : $("#id_post").val(),
          "nama_komentar" : $("#nama_komentar").val(),
          "email_komentar" : $("#email_komentar").val(),
          "isi_komentar" : $("#isi_komentar").val()
        }
        // console.log(komentar);
        $.ajax({
          url:"<?=base_url('simpan_komentar')?>",
          data:komentar,
          dataType:"JSON",
          type:"POST",
          success:function(hasil){
            $("#error").hide();
            $("#submit").hide();
            $(".loading").fadeIn('2000');
            $("#nama_komentar").val("");
            $("#email_komentar").val("");
            $("#isi_komentar").val("");
            location.reload();
            // $("#sukses").html('<i class="fa fa-check"></i> Terimakasih telah berkomentar').slideDown('slow/400/fast');
            
          }
        });
      }
    });
	
	});


	function reply(param){
			$.ajax({
				url : "<?=base_url('ambil_id_komentar')?>",
				type : "POST",
				dataType: "JSON",
				data: "id_komentar="+param,
				success:function(balas){
					console.log(balas);
					if(param){
						// $("#id_balas").val(balas[0].id_balas);
						$("#id_komentar").val(balas[0].id_komentar);
						$("#nama_balas").val(balas[0].nama_balas);
						$("#harga_balas").val(balas[0].harga_balas);
						$("#stok_balas").val(balas[0].stok_balas);
						$("#satuan_balas").val(balas[0].satuan_balas);
					}
				}
			});
		}
</script>