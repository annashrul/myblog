<?php echo form_open_multipart('edit_video/'.$video->id_video);?>
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
      <input type="text" class="form-control" name="judul_video" value="<?=$video->judul_video?>">
    </div>
		<div class="form-group">
			<label for="">Deskripsi</label>
			<textarea name="deskripsi_video" style="height:245px;" class="form-control"><?=$video->deskripsi_video?></textarea>
		</div>
  </div>
  <!-- <div class="col-md-6">
    <label for="">Video Anda Saat Ini</label>
    <video controls style="width:400px;height:360px;padding:0px 0px 0px 0px;">
      <source src="<?=base_url('assets/upload/image/multimedia/video/'.$video->video)?>" type="video/mp4">
      <source src="<?=base_url('assets/upload/image/multimedia/video/'.$video->video)?>" type="video/ogg">
      Your browser does not support the video tag.
    </video>
  </div> -->
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
      <button type="reset" name="reset" class="btn btn-default">Batal</button>
      <a href="<?=base_url('m_video')?>" class="btn btn-dark">Kembali</a>
    </div>
  </div>
<?php form_close() ?>