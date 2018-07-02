<div class="x_content">
  <?php 
    if($this->session->flashdata('sukses')){
      echo "<div class='alert alert-success'> <i class='fa fa-check'></i>  ";
      echo $this->session->flashdata('sukses');
      echo "</div>";
    }
  ?>
  <a href="<?=base_url('tambah_image')?>" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
  <p class="text-danger">Jumlah image (<?=count($images)?>)</p>
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
      <?php $no=1; foreach($images as $image):?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$image->image?></td>
        <td><?=$image->judul_image?></td>
        <td><?=$image->first_name?> <?=$image->last_name?></td>
        <td>
          <a href="<?=base_url('edit_image/'.$image->id_image)?>" class="btn btn-info">Edit</a>
          <a href="<?=base_url('delete_image/'.$image->id_image)?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ??');">Hapus</a>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?=$image->id_image?>">Detail</button>
          <!-- Modal -->
          <div id="myModal<?=$image->id_image?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?=$image->judul_image?></h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped table-bordered">
                    <tr>
                      <img src="<?=base_url('assets/upload/image/multimedia/image/'.$image->image)?>" class="img img-responsive" style="width:100%;height:400px;">
                      <td colspan="2"><p class="text-left"><b>Deskripsi : </b><br/><?=$image->deskripsi_image?></p></td>
                    </tr>
                    <tr>
                      <td>Author</td>
                      <td><?=$image->first_name?> <?=$image->last_name?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Posting</td>
                      <td><?=date('F d Y', strtotime($image->tanggal))?></td>
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

