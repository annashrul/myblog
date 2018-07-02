<script type="text/javascript" src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
<script>
	tinymce.init({
	  selector: 'textarea',
	  height: 500,
    width:960,
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
<?php echo form_open_multipart('edit_artikel/'.$post->id_post);?>
<!-- <form class="form-horizontal form-label-left" method="post" action="<?=base_url('admin/post/edit/'.$post->id_post)?>"> -->
  <?php echo validation_errors("<div class='alert alert-info'><i class='fa fa-exclamation-circle'></i> " , " </div>"); ?>
  <div class="col-md-6">
    <div class="form-group">
      <label>Judul Artikel</label>
      <input type="text" name="judul_post" class="form-control" placeholder="Masukan Judul Artikel" value="<?=$post->judul_post?>" required>
    </div>
    <div class="form-group">
      <label>Status</label>
      <select name="status_post" class="form-control">
        <option value="Publish">Publish</option>
        <option value="Draft" <?php if($post->status_post == 'Draft'){echo "selected";}?>>Draft</option>
      </select>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
			<label>Kategori Artikel</label>
			<select name="id_kategori" class="form-control">
				<?php foreach ($kategori as $kategori) { ?>
				<option value="<?=$kategori->id_kategori ?>"<?php if ($post->id_kategori==$kategori->id_kategori){echo "selected";}?>>
				  <?=$kategori->nama_kategori ?>
				</option>
				<?php } ?>
			</select>
		</div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
			<label>Sub Kategori Artikel</label>
			<select name="id_sub_kategori" class="form-control">
				<option value="">tikda</option>
				<?php foreach ($sub_kategori as $sub_kategori) { ?>
        <option value="<?=$sub_kategori->id_sub_kategori ?>"<?php if ($post->id_sub_kategori==$sub_kategori->id_sub_kategori){echo "selected";}?>>
				  <?=$sub_kategori->nama_sub_kategori ?>
				</option>
				<?php } ?>
			</select>
		</div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Gambar Artikel</label>
      <input type="file" name="gambar_post" class="form-control"><br/>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <label>Isi Artikel</label>
      <textarea name="artikel_post" class="form-control"><?=$post->artikel_post?></textarea>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
      <button type="reset" name="reset" class="btn btn-default">Batal</button>
      <a href="<?=base_url('artikel')?>" class="btn btn-dark">Kembali</a>
    </div>
  </div>
<?php form_close(); ?>