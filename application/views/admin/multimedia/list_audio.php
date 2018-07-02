<div class="x_content">
  <?php 
    if($this->session->flashdata('sukses')){
      echo "<div class='alert alert-success'> <i class='fa fa-check'></i>  ";
      echo $this->session->flashdata('sukses');
      echo "</div>";
    }
  ?>
  <a href="<?=base_url('tambah_audio')?>" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
  <p class="text-danger">Jumlah Audio (<?=count($audios)?>)</p>
  <table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama File</th>
        <th>Judul</th>
        <th>Author</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($audios as $audio):?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$audio->audio?></td>
        <td><?=$audio->judul_audio?></td>
        <td><?=$audio->first_name?> <?=$audio->last_name?></td>
        <td>
          <a href="<?=base_url('edit_audio/'.$audio->id_audio)?>" class="btn btn-info">Edit</a>
          <a href="<?=base_url('delete_audio/'.$audio->id_audio)?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ??');">Hapus</a>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?=$audio->id_audio?>">Detail</button>
          <!-- Modal -->
          <div id="myModal<?=$audio->id_audio?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?=$audio->judul_audio?></h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped table-bordered">
                    <tr>
                      <audio controls>
                        <source src="<?=base_url('assets/upload/image/multimedia/audio/'.$audio->audio)?>" type="audio/ogg">
                        <source src="<?=base_url('assets/upload/image/multimedia/audio/'.$audio->audio)?>" type="audio/mpeg">
                      </audio>
                      <td colspan="2"><p class="text-left"><b>Deskripsi : </b><br/><?=$audio->deskripsi_audio?></p></td>
                    </tr>
                    <tr>
                      <td>Author</td>
                      <td><?=$audio->first_name?> <?=$audio->last_name?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Posting</td>
                      <td><?=date('F d Y', strtotime($audio->tanggal))?></td>
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

