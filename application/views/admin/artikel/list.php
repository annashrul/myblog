<script type="text/javascript" src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 500,
    width:825,
    plugins: [
      "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
    ],
    toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
    toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
    toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
    menubar: false,
    toolbar_items_size: 'small',
    table_default_attributes: {
      'border': '1px soli blue'
    },
    table_default_styles: {
      'border-collapsed': 'collapse',
      'width': '100%'
    },
    style_formats: [
      {title: 'Bold text', inline: 'b'},
      {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
      {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
      {title: 'Example 1', inline: 'span', classes: 'example1'},
      {title: 'Example 2', inline: 'span', classes: 'example2'},
      {title: 'Table styles'},
      {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],
    templates: [
      {title: 'Test template 1', content: 'Test 1'},
      {title: 'Test template 2', content: 'Test 2'}
    ]
  });
  
</script>

<style type="text/css" media="screen">
  .label{color:white!important;padding:5px 5px 5px 5px;border-radius:0px;}
</style>
<div class="x_panel">
  <div class="x_content">
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#largeModal">
      <span class="fa fa-plus"></span> Tambah
    </a>
    <table id="datatable" class="table table-striped table-bordered" style="font-size: 11px;">
      <thead>
        <tr>
          <th>No</th>
          <th>judul</th>
          <th>status</th>
          <th>Author</th>
          <th>Waktu</th>
          <th>Pilihan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($post->result() as $p):?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$p->judul_post?><br/><small style="color:#2A3F54!important;font-weight:bold;"><?=$p->nama_kategori?> / <?=$p->nama_sub_kategori?></small></td>
          <td>
            <?php if($p->status_post == 'Publish'): ?>
              <label class="label label-success">Publish</label>
            <?php else: ?>
              <label class="label label-default">Draft</label>
            <?php endif ?>
          </td>
          <td><?=$p->username?></td>
          <td><?php $waktu_posting = $p->tanggal; echo waktu_lalu($waktu_posting);?></td>
          <td>
            <a class="btn btn-warning" href="#Edit<?=$p->id_post?>" data-toggle="modal" title="Edit">
              <span class="fa fa-edit"></span> Edit
            </a>
            <a class="btn btn-danger" href="#hapus<?=$p->id_post?>" data-toggle="modal" title="Hapus">
              <span class="fa fa-close"></span> Hapus
            </a>
            <!-- Small modal -->
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?=$p->id_post?>">Detail</button>
            <!-- Modal -->
            <div id="myModal<?=$p->id_post?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?=$p->judul_post?></h4>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped table-bordered">
                      <tr>
                        <img src="<?=base_url('assets/upload/image/posts/'.$p->gambar_post)?>" alt="" style="width:100%;height:400px;">
                      </tr>
                      <tr>
                        <td>Penulis</td>
                        <td><?=$p->username?></td>
                      </tr>
                      <tr>
                        <td>Kategori</td>
                        <td><?=$p->nama_kategori?></td>
                      </tr>
                      <tr>
                        <td>Sub Kategori</td>
                        <td><?=$p->nama_sub_kategori?></td>
                      </tr>
                      <tr>
                        <td>Status Artikel</td>
                        <td><?=$p->status_post?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Posting</td>
                        <td><?php $waktu_posting = $p->tanggal; echo waktu_lalu($waktu_posting);?></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <?=$p->artikel_post?>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /modals -->
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<style type="text/css" media="screen">
  .modal-dialog{width:60%;}
  .modal-contetn{border-radius:0px;}
  .pilihan{padding:0px 0px 0px;}
</style>
<!-- ==========================MODAL ADD=============================-->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Artikel</h3>
      </div>
      <form class="form-horizontal form-label-left" method="post" action="<?=base_url('admin/post/insert')?>" enctype="multipart/form-data">
        <div class="modal-body" style="border-top:none;">
          <div class="form-group">
            <label>Judul Artikel</label>
            <input type="text" name="judul_post" class="form-control" placeholder="Judul Artikel" required>
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar_post" class="form-control" required>
          </div>
          <div class="col-md-4 pilihan">
            <div class="form-group">
              <label>Kategori</label>
              <select name="id_kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Kategori" required>
                <?php foreach($kategori->result() as $k):?>
                <option value="<?=$k->id_kategori?>"><?=$k->nama_kategori?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-md-4 pilihan">
            <div class="form-group">
              <label>Sub Kategori</label>
              <select name="id_sub_kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Sub Kategori" required>
                <?php foreach($subKategori->result() as $sk):?>
                <option value="<?=$sk->id_sub_kategori?>"><?=$sk->nama_sub_kategori?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-md-4 pilihan">
            <div class="form-group">
              <label>Status Artikel</label>
              <select name="status_post" class="selectpicker show-tick form-control" data-live-search="true" title="status" required>
                <option value="Publish">Publish</option>
                <option value="Draft">Draft</option>
              </select>
            </div>
          </div>
          <div class="clearfix"></div>
          <textarea name="artikel_post" class="form-control"></textarea>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ==========================END MODAL ADD=============================-->
<!-- ==========================MODAL UPDATE=============================-->
<?php foreach($post->result() as $p) :?>
<div class="modal fade" id="Edit<?=$p->id_post?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Artikel</h3>
      </div>
      <form class="form-horizontal form-label-left" method="post" action="<?=base_url('admin/post/update')?>" enctype="multipart/form-data">
        <div class="modal-body" style="border-top:none;">
          <div class="form-group">
            <label>Judul Artikel</label>
            <input name="id_post" value="<?=$p->id_post?>" type="hidden">
            <input type="text" name="judul_post" value="<?=$p->judul_post?>" class="form-control" placeholder="Judul Artikel">
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <?php if(isset($p->gambar_post)):?>
            <input type="file" name="gambar_post" class="form-control">
            <img src="<?=base_url('assets/upload/image/posts/'.$p->gambar_post)?>" alt="" style="width:30%;height:30%;">  
            <?php endif ?>  
            <input type="hidden" name="old_pic" class="form-control" value="<?=$p->gambar_post?>">
          </div>
          <div class="col-md-4 pilihan">
            <div class="form-group">
              <label>Kategori</label>
              <select name="id_kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Kategori">
                <?php foreach($kategori->result() as $k) { ?>
                <option value="<?=$k->id_kategori ?>"<?php if ($p->id_kategori==$k->id_kategori){echo "selected";}?>>
                  <?=$k->nama_kategori ?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-4 pilihan">
            <div class="form-group">
              <label>Sub Kategori</label>
              <select name="id_sub_kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Sub Kategori">
                <?php foreach($subKategori->result() as $sk) { ?>
                <option value="<?=$sk->id_sub_kategori ?>"<?php if ($p->id_sub_kategori==$sk->id_sub_kategori){echo "selected";}?>>
                  <?=$sk->nama_sub_kategori ?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-4 pilihan">
            <div class="form-group">
              <label>Status Artikel</label>
              <select name="status_post" class="selectpicker show-tick form-control" data-live-search="true" title="status">
                <option value="Publish" <?php if($p->status_post == 'Publish'){echo "selected";}?>>Publish</option>
                <option value="Draft" <?php if($p->status_post == 'Draft'){echo "selected";}?>>Draft</option>
              </select>
            </div>
          </div>
          <div class="clearfix"></div>
          <textarea name="artikel_post" class="form-control"><?=$p->artikel_post?></textarea>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?>

<!-- ============ MODAL HAPUS =============== -->
<?php foreach($post->result() as $p): ?>
<div id="hapus<?=$p->id_post?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Hapus Artikel</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?=base_url('admin/post/delete')?>">
        <div class="modal-body">
          <p>Yakin mau menghapus artikel <b><?=$p->judul_post?></b>..?</p>
          <input name="id_post" type="hidden" value="<?=$p->id_post; ?>">
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button type="submit" class="btn btn-primary">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?>