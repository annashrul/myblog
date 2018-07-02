<?php echo form_open_multipart('edit_image/'.$image->id_image);?>
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
      <label>Image</label>
      <input type="file" name="image" class="dropify" data-height="300">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="">Judul</label>
      <input type="text" class="form-control" name="judul_image" value="<?=$image->judul_image?>">
    </div>
		<div class="form-group">
			<label for="">Deskripsi</label>
			<textarea name="deskripsi_image" class="form-control" style="height:245px;"><?=$image->deskripsi_image?></textarea>
		</div>
  </div>
  <!-- <div class="col-md-6">
    <label for="">Image Anda Saat Ini</label>
    <img src="<?=base_url('assets/upload/image/multimedia/image/'.$image->image)?>" alt="" class="img img-responsive" style="height:313px;width:470px;">
  </div> -->
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
      <button type="reset" name="reset" class="btn btn-default">Batal</button>
      <a href="<?=base_url('m_image')?>" class="btn btn-dark">Kembali</a>
    </div>
  </div>
<?php form_close() ?>