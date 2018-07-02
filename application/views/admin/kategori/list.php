<div class="x_content">
  <?php 
    if($this->session->flashdata('sukses')){
      echo "<div class='alert alert-success'> <i class='fa fa-check'></i>  ";
      echo $this->session->flashdata('sukses');
      echo "</div>";
    }
  ?>
  <a href="#form" class="btn btn-primary" data-toggle="modal" onclick="submit('tambah')"><i class="fa fa-plus"></i> tambah</a>
  <a href="<?=base_url('admin/post')?>" class="btn btn-info"><i class="fa fa-tasks"></i> kelola artikel</a>
  <a href="<?=base_url('admin/kategori/sub_kategori')?>" class="btn btn-dark"><i class="fa fa-tasks"></i> kelola sub kategori</a>
  
  <p class="text-danger">Jumlah data kategori artikel (<?=$post?>)</p>
  <table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Author</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody id="data_kategori"></tbody>
  </table>
</div>
<div class="modal fade" id="form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="text-center"><?=$title?></h3>
      </div>
      <div class="modal-body">
        <p class="text-center" id="pesan" style="color:red!important;font-weight:600;"></p>
        <div class="form-group">
            <label>nama kategori artikel</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
            <input type="hidden" name="id_kategori" id="id_kategori" value="">
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary" name="btn-tambah" id="btn-tambah" onclick="tambahData()">Tambah</button>
          <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit" onclick="editData()">Edit</button>
          <button type="reset" data-dismiss="modal" class="btn btn-default" id="btn-batal" onclick="submit('batal')">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript">
  ambilData();
	function ambilData(){
		$.ajax({
			type 		: 'POST',
			url 		: '<?=base_url("admin/kategori/ambil")?>',
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
							'<td>'+data[i].nama_kategori+'</td>'+
							'<td>'+data[i].first_name+' '+data[i].last_name+'</td>'+
							'<td>'+
								'<a href="#form" data-toggle="modal" class="btn btn-info" onClick="submit('+data[i].id_kategori+')">Ubah</a>' + " " +
								'<a class="btn btn-danger" onClick="hapusData('+data[i].id_kategori+')">Hapus</a>'+
							'</td>'+
						'</tr>';
					no++;
				}
				$('#data_kategori').html(tampung);
			}
		});
	}//end ambilData
  function submit(param){
    if(param == 'tambah'){
      $("#btn-tambah").show();
      $("#btn-edit").hide();
    }else if(param == 'batal'){
      location.reload();
    }else{
      $("#btn-tambah").hide();
      $("#btn-edit").show();
      
      $.ajax({
				type:'POST',
				data:'id_kategori='+param,
				dataType:'JSON',
				url:'<?=base_url('admin/kategori/ambilId')?>',
				success:function(hasil){
          if(param != "tambah"){
            $('#id_kategori').val(hasil[0].id_kategori);
					  $('#nama_kategori').val(hasil[0].nama_kategori);
          }else if(param == ""){
            $('#nama_kategori').val(hasil[0].nama_kategori);
          }
				}
			});
    }
  }
  function tambahData(){
    var kategori={'nama_kategori' : $("#nama_kategori").val()}
    $.ajax({
      url : "<?=base_url('admin/kategori/tambah')?>",
      type: 'POST',
      dataType : 'JSON',
      data: kategori,
      success: function(hasil){
        // console.log(hasil);
        $("#pesan").html(hasil.pesan);
        if(hasil.pesan == ""){
          $("#form").modal('hide');
          $("#nama_kategori").val("");
          alert('data berhasil diinput');
          location.reload();
          ambilData();
        }
      }
    });
  }
  function editData(){
    var kategoris={
      'id_kategori' : $("#id_kategori").val(),
      'nama_kategori' : $("#nama_kategori").val()
    }
    $.ajax({
      url:"<?=base_url('admin/kategori/edit')?>",
      type:"POST",
      dataType:"JSON",
      data:kategoris,
      success:function(hasil){
        console.log(hasil);
        $("#pesan").html(hasil.pesan);
        if(hasil.pesan == ""){
          $("#form").modal("hide");
          alert('data berhasil diupdate');
          location.reload();
          ambilData();
        }
      }
    });
  }
  function hapusData(id_kategori){
    var nanya = confirm('Anda Yakin Akan Menghapus Data Ini ??');
    if(nanya){
      $.ajax({
        url:"<?=base_url('admin/kategori/delete')?>",
        type:"POST",
        dataType:"JSON",
        data: "id_kategori="+id_kategori,
        success:function(){
          location.reload();
					ambilData();
				}
      });
    }
  }
</script>

