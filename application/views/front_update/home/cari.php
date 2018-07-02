<section class="search">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="row">
          <?php if(count($post)>0){?>
          <div class="search-result">
            <h4 class="text-center">Search results for keyword "<?=$this->session->userdata('sess_ringkasan')?>" found in <?=count($post)?> posts.</h4>
          </div>
          <?php foreach($post as $p):?>
            <article class="article col-md-4">
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
                </div>
                <div class="col-md-12" style="padding:0px 0px 0px 0px;">
                  <h2 style="height:100px;"><a href="<?=base_url($p->slug_artikel_post)?>"><?=htmlspecialchars(strip_tags(substr($p->artikel_post,0,200)))?></p>
                </div>
                <footer>
                  <a class="btn btn-primary more" href="<?=base_url($p->slug_artikel_post)?>">
                    <div>More</div>
                    <div><i class="ion-ios-arrow-thin-right"></i></div>
                  </a>
                </footer>
              </div>
            </div>
          </article>
        <?php endforeach ?>
        <?php }else{?>
        <div class="col-md-4 col-md-offset-4" id="no-result" style="height:430px;padding:25px 0px 20px 0px;">
          
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $("#no-result").html('<center><img src="<?=base_url('assets/sad.png')?>" class="img img-responsive" style="height:230px;"></center><br><h2 class="text-center">Hasil Pencarian Tidak Ditemukan</h2>').fadeIn('slow');
</script>