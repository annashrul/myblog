<style type="text/css">
  .photo-profile{padding:0px 0px 0px 0px;}
  .photo-profile img{height:200px;width:100%;}
  /* .data-user{border:1px solid black;} */
</style>
<?php echo form_open_multipart('profile/'.$user->id_user);?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="col-md-3 photo-profile">
      <h3 class="text-left" style="color:rgb(63,81,181);">Profile Avatar</h3>
      <img src="<?=base_url('assets/upload/image/user/'.$user->photo)?>" alt="" class="img img-responsive"><br/>
      <input type="file" name="photo" class="dropify" data-height="280">
    </div>
    <div class="col-md-9 data-user">
      
        <?php echo validation_errors("<div class='alert alert-info'><i class='fa fa-exclamation-circle'></i> " , " </div>"); ?>
        <div class="col-md-6">
          <h3 class="text-left" style="color:rgb(63,81,181);">Profile Anda</h3>
          <div class="form-group">
            <label>Nama Depan</label>
            <input type="text" name="first_name" class="form-control" placeholder="Nama Depan" value="<?=$user->first_name?>">
          </div>
          <div class="form-group">
            <label>Nama Belakang</label>
            <input type="text" name="last_name" class="form-control" placeholder="Nama Belakang" value="<?=$user->last_name?>">
          </div>
          <div class="form-group">
            <label>No Handphone</label>
            <input type="number" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="<?=$user->no_hp?>">
          </div>
          <!-- <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
          </div> -->
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" class="form-control" placeholder="Alamat" style="height:80px;"><?=$user->address?></textarea>
          </div>
          <div class="form-group">
            <label>Quotes</label>
            <textarea name="quotes" class="form-control" placeholder="Quotes" style="height:170px;"><?=$user->quotes?></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <h3 class="text-left" style="color:rgb(63,81,181);">Profile Akun</h3>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$user->email?>">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$user->username?>" readonly disabled title="anda tidak bisa ubah username">
          </div>
          <div class="form-group">
            <label>Password <small>(kosongkan bila tidak akan diubah)</small></label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="">
          </div>
        </div>
        <div class="col-md-6">
          <h3 class="text-left" style="color:rgb(63,81,181);">Profile Social Media</h3>
          <div class="form-group">
            <label>Facebook</label>
            <input type="url" name="fb" class="form-control" placeholder="https://www.facebook.com/Facebook_Username" value="<?=$user->fb?>">
          </div>
          <div class="form-group">
            <label>Twitter</label>
            <input type="url" name="tw" class="form-control" placeholder="https://www.twitter.com/Twitter_Username" value="<?=$user->tw?>">
          </div>
          <div class="form-group">
            <label>Instagram</label>
            <input type="url" name="ig" class="form-control" placeholder="https://www.instagram.com/Instagram_Username" value="<?=$user->ig?>">
          </div>
          <div class="form-group"style="margin-top:35px;">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <button type="reset" name="reset" class="btn btn-default">Batal</button>
            <!-- <a href="<?=base_url('dashboard')?>" class="btn btn-dark">Kembali</a> -->
          </div>
        </div>     
    </div>
  </div>
</div>
<?php form_close() ?>
                