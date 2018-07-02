<?php echo form_open_multipart('tambah_video');?>
  <?php 
    echo validation_errors("<div class='alert alert-info'><i class='fa fa-exclamation-circle'></i> " , " </div>"); 
    if(isset($error)){
      echo "<div class='alert alert-danger'>";
      echo $error;
      echo "</div>";
    }  
  ?>
  <div class="col-md-6">
    <div class="form-group">
      <label>Video</label>
      <input type="file" name="video" class="dropify" data-height="300">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="">Judul</label>
      <input type="text" class="form-control" name="judul_video" placeholder="Teknologi & Dunia">
    </div>
		<div class="form-group">
			<label for="">Deskripsi</label>
			<textarea name="deskripsi_video" style="height:245px;" class="form-control"></textarea>
		</div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
      <button type="reset" name="reset" class="btn btn-default">Batal</button>
      <a href="<?=base_url('m_video')?>" class="btn btn-dark">Kembali</a>
    </div>
  </div>
<?php form_close() ?>