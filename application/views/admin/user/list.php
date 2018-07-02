<div class="x_content">
  <?php 
    if($this->session->flashdata('sukses')){
      echo "<div class='alert alert-success'> <i class='fa fa-check'></i>  ";
      echo $this->session->flashdata('sukses');
      echo "</div>";
    }
  ?>
  <p class="text-danger">Jumlah data user (<?=count($user)?>)</p>
  <table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Uesername</th>
        <th>email</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($user as $user):?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$user->first_name?> <?=$user->last_name?></td>
        <td><?=$user->username?></td>
        <td><?=$user->email?></td>
        <td>
          <a href="<?=base_url('delete_user/'.$user->id_user)?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ??');">Hapus</a>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?=$user->id_user?>">Detail</button>
          <!-- Modal -->
          <div id="myModal<?=$user->id_user?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?=$user->first_name?> <?=$user->last_name?></h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped table-bordered">
                    <tr>
                      <img src="<?=base_url('assets/upload/image/user/'.$user->photo)?>" class="img img-responsive" style="width:100%;height:400px;">
                      <td>Nama</td>
                      <td><?=$user->first_name?> <?=$user->last_name?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?=$user->email?></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><?=$user->username?></td>
                    </tr>
                    <tr>
                      <td colspan="2">Quotes: <br/> <?=$user->quotes?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Buat AKun</td>
                      <td><?=date('F d Y', strtotime($user->last_active))?></td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

