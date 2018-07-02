<div class="x_content">
  <?php 
    if($this->session->flashdata('sukses')){
      echo "<div class='alert alert-success'> <i class='fa fa-check'></i>  ";
      echo $this->session->flashdata('sukses');
      echo "</div>";
    }
  ?>
  <a href="<?=base_url('tambah_video')?>" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
  <p class="text-danger">Jumlah Video (<?=count($videos)?>)</p>
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
      <?php $no=1; foreach($videos as $video):?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$video->video?></td>
        <td><?=$video->judul_video?></td>
        <td><?=$video->first_name?> <?=$video->last_name?></td>
        <td>
          <a href="<?=base_url('edit_video/'.$video->id_video)?>" class="btn btn-info">Edit</a>
          <a href="<?=base_url('delete_video/'.$video->id_video)?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ??');">Hapus</a>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?=$video->id_video?>">Detail</button>
          <!-- Modal -->
          <div id="myModal<?=$video->id_video?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?=$video->judul_video?></h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped table-bordered">
                    <tr>
                      <video controls style="width:570px;">
                        <source src="<?=base_url('assets/upload/image/multimedia/video/'.$video->video)?>" type="video/mp4">
                        <source src="<?=base_url('assets/upload/image/multimedia/video/'.$video->video)?>" type="video/ogg">
                        Your browser does not support the video tag.
                      </video>
                      <td colspan="2"><p class="text-left"><b>Deskripsi : </b><br/><?=$video->deskripsi_video?></p></td>
                    </tr>
                    <tr>
                      <td>Author</td>
                      <td><?=$video->first_name?> <?=$video->last_name?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Posting</td>
                      <td><?=date('F d Y', strtotime($video->tanggal))?></td>
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

