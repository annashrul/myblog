<?php echo form_open_multipart('edit_audio/'.$audio->id_audio);?>
  <div class="col-md-6">
    <?php 
      echo validation_errors("<div class='alert alert-info'><i class='fa fa-exclamation-circle'></i> " , " </div>"); 
      if(isset($error)){
        echo "<div class='alert alert-danger'>";
        echo $error;
        echo "</div>";
      }  
    ?>
    <div class="form-group">
      <label>Audio</label>
      <input type="file" name="audio" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Judul</label>
      <input type="text" class="form-control" name="judul_audio" value="<?=$audio->judul_audio?>">
    </div>
		<div class="form-group">
			<label for="">Deskripsi</label>
			<textarea name="deskripsi_audio" id="" cols="30" rows="10" class="form-control"><?=$audio->deskripsi_audio?></textarea>
		</div>
  </div>
  <div class="col-md-6">
    <label for="">Audio Anda Saat Ini</label>
    <audio controls style="border:1px solid #ccc;height:34px;width:470px;background-color:#FFFFFF;">
      <source src="<?=base_url('assets/upload/image/multimedia/audio/'.$audio->audio)?>" type="audio/ogg">
      <source src="<?=base_url('assets/upload/image/multimedia/audio/'.$audio->audio)?>" type="audio/mpeg">
    </audio>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
      <button type="reset" name="reset" class="btn btn-default">Batal</button>
      <a href="<?=base_url('m_audio')?>" class="btn btn-dark">Kembali</a>
    </div>
  </div>
<?php form_close() ?>