<style type="text/css">
  body{background-color:rgb(238,238,238);}
  .section-by-kategori{margin-top:115px;}
  .section-by-kategori .rules{margin-top:20px;}
  .section-by-kategori .rules p.text-left{line-height:32px;}
  .section-by-kategori .rules p.text-left a{text-decoration:none;}
  /* .section-by-kategori .background-by-kategori img{background-position:center;width:100%;background-repeat: no-repeat, repeat;background-attachment: fixed;height:600px;} */
  .section-by-kategori .wrap-pbk{padding:0px 0px 0px 0px;margin-top:10px;margin-bottom:10px;}
  .section-by-kategori .wrap-pbk .panel{border-radius:0px;}
  .section-by-kategori .wrap-pbk .panel .panel-pbk{height:400px;}
  .section-by-kategori .wrap-pbk .panel .footer-artikel{background-color:#d43f3a!important;border-radius:0px;height:60px;}
</style>
<div class="container section-by-kategori">
  <div class="row">
    <!-- <div class="col-md-12 background-by-kategori">
      <img src="<?=base_url('assets/background.jpg')?>" alt="" class="img img-responsive">
    </div> -->
    <div class="col-md-12 rules">
      <p class="text-left">
        <a href="<?=base_url()?>">Home</a> <i class="fa fa-arrow-right"></i> <?=$postByKategori[0]->nama_kategori?>
      </p>
      <hr style="border:1px solid #FFFFFF;">
    </div>
    <div class="col-md-8">
      <?php foreach($postByKategori as $pbk):?>
      <div class="col-md-6 wrap-pbk">
        <div class="panel panel-default">
          <div class="panel-body panel-pbk">
            <center><img src="<?=base_url('assets/upload/image/posts/'.$pbk->gambar_post)?>" class="img img-responsive img-artikel"></center>
            <h4 class="text-left"><a href="<?=base_url('home/detail/'.$pbk->slug_artikel_post)?>"><?=$pbk->judul_post?></a></h4>
            <p class="text-left"><?=substr($pbk->artikel_post,0,200)?></p>
          </div>
          <div class="panel-footer footer-artikel">
            <p class="text-left" style="color:#FFFFFF;">
              <i class="fa fa-pencil"></i> <?=$pbk->first_name?> <?=$pbk->last_name?> | <i class="fa fa-tags"></i> <?=$pbk->nama_kategori?><br/>
              <i class="fa fa-clock-o"></i> <?php $waktu_posting = $pbk->tanggal; echo waktu_lalu($waktu_posting);  ?> | <i class="fa fa-comment"></i> 
            </p>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      <div class="navigation" style="display: none;"><?php echo $paging ?></div>
      <p style="text-align: center;"><a href="#" id="more">More</a></p>
    </div>
  </div>
</div>