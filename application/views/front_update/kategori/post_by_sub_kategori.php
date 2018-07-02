<section class="category">
  <div class="container">
    <div class="row">
      <div class="col-md-8 text-left">
        <div class="row">
          <div class="col-md-12">        
            <ol class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li><a href="<?=base_url('kategori/'.$postBySubKategori[0]->slug_kategori)?>"><?=$postBySubKategori[0]->nama_kategori?></a></li>
              <li class="active"><?=$postBySubKategori[0]->nama_sub_kategori?></li>
            </ol>
          </div>
        </div>
        <div class="line"></div>
        <div class="row">
          <?php foreach($postBySubKategori as $pk):?>
          <article class="col-md-12 article-list">
            <div class="inner">
              <figure>
                <a href="<?=base_url($pk->slug_artikel_post)?>">
                  <img src="<?=base_url('assets/upload/image/posts/'.$pk->gambar_post)?>" class="img img-responsive" style="height:100%;">
                </a>
              </figure>
              <div class="details">
                <div class="detail">
                  <div class="category">
                  <a style="color:black!important;text-decoration:none;">post by : <?=$pk->first_name?> <?=$pk->last_name?></a> 
                  <a href="<?=base_url('sub/'.$pk->slug_sub_kategori)?>"><?=$pk->nama_sub_kategori?></a>
                  </div>
                  <div class="time"><?php $waktu_posting = $pk->tanggal; echo waktu_lalu($waktu_posting);?></div>
                </div>
                <div class="col-md-12" style="height:130px;padding:0px 0px 0px 0px;">
                  <h1><a href="<?=base_url($pk->slug_artikel_post)?>"><?=$pk->judul_post?></a></h1>
                  <p class="text-left"><?=substr($pk->artikel_post,0,150)?></p>
                </div>
                <footer>
                  <a class="btn btn-primary more" href="<?=base_url($pk->slug_artikel_post)?>">
                    <div>More</div>
                    <div><i class="ion-ios-arrow-thin-right"></i></div>
                  </a>
                </footer>
              </div>
            </div>
          </article>
          <?php endforeach ?>
          <div class="col-md-12 text-center">
            <?=$pagination?>
          </div>
        </div>
      </div>
      <div class="col-md-4 sidebar">
        <aside>
          <h1 class="aside-title">Berita Lainnya</h1>
          <div class="aside-body">
            <?php foreach($artikelTerkaitByKategori as $atbk):?>
            <article class="article-mini">
              <div class="inner">
              <figure>
                <a href="<?=base_url($atbk->slug_artikel_post)?>">
                  <img src="<?=base_url('assets/upload/image/posts/'.$atbk->gambar_post)?>" style="height:100%;">
                </a>
              </figure>
              <div class="padding">
                <h1><a href="<?=base_url($atbk->slug_artikel_post)?>"><?=substr($atbk->judul_post,0,50)?></a></h1>
                <div class="detail">
                  <div class="category"><a href="<?=base_url('kategori/'.$atbk->slug_kategori)?>"><?=$atbk->nama_kategori?></a></div>
                  <div class="time"><?php $waktu_posting = $atbk->tanggal; echo waktu_lalu($waktu_posting);?></div>
                </div>
              </div>
            </article>
            <?php endforeach ?>
          </div>
        </aside>
      </div>
    </div>
  </div>
</section>