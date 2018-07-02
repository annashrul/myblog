<div class="x_content">
  <?php 
    if($this->session->flashdata('sukses')){
      echo "<div class='alert alert-success'> <i class='fa fa-check'></i>  ";
      echo $this->session->flashdata('sukses');
      echo "</div>";
    }

  ?>
  <a href="<?=base_url('tambah_artikel')?>" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
  <a href="<?=base_url('komentar')?>" class="btn btn-info"><i class="fa fa-comment"></i> kelola Komentar artikel</a>
  <!-- <a href="<?=base_url('admin/post/tambah')?>" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a> -->
  <p class="text-danger">Jumlah Komentar (<?=count($komentar)?>)</p>
  <table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Artikel</th>
        <th>Nama</th>
        <th>komentar</th>
        <th>Tanggal</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody id="data_komentar"></tbody>
  </table>
</div>

<div class="modal fade" id="form" role="dialog" style="margin-top:80px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<p class="text-center"  id="error_balas"></p>
				<!-- <p class="text-center"  id="sukses"></p> -->
				<div class="form-group">
					<label>Komentar</label>
          <input type="hidden" name="id_komentar" id="id_komentar" value="">
          <input type="hidden" name="id_post" id="id_post" value="">
          <!-- <input type="hidden" name="id_user" id="id_user" value=""> -->
					<textarea cols="30" rows="10" class="form-control" name="isi_balas_komentar" id="isi_balas_komentar"></textarea>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary" name="btn-reply" id="btn-reply">Tambah</button>
					<button type="button" data-dismiss="modal" class="btn btn-info">Batal</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
  ambilData();
  moment.locale('id');
	function ambilData(){
		$.ajax({
			type 		: 'POST',
			url 		: '<?=base_url("ambil_data_komentar")?>',
			dataType 	: 'json',
			success 	: function(data){
				// console.log(data);
				var tampung = "";
				var i = 0;
				var no = 1;
				for(i=0;i<data.length;i++){
					tampung+=
						'<tr>'+
							'<td>'+no+'</td>'+
							'<td style="word-wrap:break;">'+data[i].judul_post+'</td>'+
							'<td>'+data[i].nama_komentar+'</td>'+
							'<td>'+data[i].isi_komentar+'<br/><a href="#form" data-toggle="modal" onClick="submit('+data[i].id_komentar+')">balas</a></td>'+
							'<td>'+moment(data[i].tanggal_komentar).fromNow()+'</td>'+
							'<td>'+
								'<a class="btn btn-danger" onClick="hapusData('+data[i].id_detail_komentar+')">Hapus</a>'+
							'</td>'+
						'</tr>';
					no++;
				}
				$('#data_komentar').html(tampung);
			}
		});
	}//end ambilData
  $("#btn-reply").click(function(){
    if($("#isi_balas_komentar").val() == ""){
      $("#error_balas").html('<h5 style="color:#FFFFFF;">maaf, form tidak boleh kosong</h5>').slideDown('slow/400/fast');
      $("#isi_balas_komentar").focus();
    }else{
      var balas = {
        "id_komentar"         : $("#id_komentar").val(),
        "id_post"             : $("#id_post").val(),
        "isi_balas_komentar"  : $("#isi_balas_komentar").val(),
      }
      // console.log(komentar);
      $.ajax({
        url:"<?=base_url('simpan_balas_komentar')?>",
        data:balas,
        dataType:"JSON",
        type:"POST",
        success:function(hasil){
          console.log(hasil);
          $("#isi_balas_komentar").val("");
          location.reload();
          // $("#sukses").html('<i class="fa fa-check"></i> Terimakasih telah berkomentar').slideDown('slow/400/fast');
        }
      });
    }
  });
});

</script>
<script type="text/javascript" src="<?=base_url('assets/js/moment-with-locales.min.js')?>"></script>

