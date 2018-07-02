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
  <a href="<?=base_url('admin/kategori')?>" class="btn btn-success"><i class="fa fa-tasks"></i> kelola kategori artikel</a>  
  <p class="text-danger">Jumlah data kategori artikel (<?=$sub?>)</p>
  <table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Sub Kategori</th>
        <th>Author</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody id="data_sub_kategori"></tbody>
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
            <label>nama sub kategori artikel</label>
            <input type="text" name="nama_sub_kategori" id="nama_sub_kategori" class="form-control">
            <input type="hidden" name="id_sub_kategori" id="id_sub_kategori" value="">
        </div>
        <div class="form-group">
          <label>Kategori Artikel</label>
          <select name="id_kategori" class="form-control" id="id_kategori">
            <option value="">MISAL</option>
          </select>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary" name="btn-tambah" id="btn-tambah" onclick="tambahData()">Tambah</button>
          <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit" onclick="editData()">Edit</button>
          <button type="button" data-dismiss="modal" class="btn btn-default" id="btn-batal" onclick="submit('batal')">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript">
  sub_kategori();
  function sub_kategori(){
    $.ajax({
      url:"<?=base_url('admin/kategori/ambil_sub')?>",
      type:"POST",
      dataType:"JSON",
      success:function(sub){
        var tampung = "";
        var i = 0;
        var no = 1;
        for(i=0;i<sub.length;i++){
          tampung +=
            "<tr>"+
              "<td>"+no+"</td>"+
              "<td>"+sub[i].nama_sub_kategori+" / "+"<b>"+sub[i].nama_kategori+"</b>"+"</td>"+
              "<td>"+sub[i].first_name+" "+sub[i].last_name+"</td>"+
              "<td>"+
                "<a href='#form' data-toggle='modal' class='btn btn-info' onClick='submit("+sub[i].id_sub_kategori+")'>Ubah</a>" + " " +
                "<a class='btn btn-danger' onClick='hapusData("+sub[i].id_sub_kategori+")'>Hapus</a>"+
              "</td>"+
            "</tr>";
          no++;
        }
        $("#data_sub_kategori").html(tampung);
      }
    });
  }
  function tambahData(){
    var sub ={
      'nama_sub_kategori':$("#nama_sub_kategori").val(),
      'id_kategori':$("#id_kategori").val()
    }
    $.ajax({
      url:"<?=base_url('admin/kategori/tambah_sub')?>",
      type:"POST",
      dataType:"JSON",
      data:sub,
      success:function(hasil){
        $("#pesan").html(hasil.pesan);
        if(hasil.pesan == ""){
          $("#form").modal("hide");
          $("#nama_sub_kategori").val("");
          $("#id_kategori").val("");
          alert("Data Anda Berhasil diinpus");
          location.reload();
          sub_kategori();
        }
      }
    });
  }
  function submit(param){
    if(param == 'tambah'){
      $("#btn-tambah").show();
      $("#btn-edit").hide();
      get_kategori();
    }else if(param == 'batal'){
      location.reload();
    }else{
      $("#btn-tambah").hide();
      $("#btn-edit").show();
      get_kategori();
      $.ajax({
        url:"<?=base_url('admin/kategori/ambilIdSub')?>",
        type:"POST",
        data:'id_sub_kategori='+param,
        dataType:"JSON",
        success:function(hasil){
          if(param != "btn-tambah"){
            $("#id_sub_kategori").val(hasil[0].id_sub_kategori);
            $("#id_kategori").val(hasil[0].id_kategori);
            $("#nama_sub_kategori").val(hasil[0].nama_sub_kategori);
          }else{
            $("#nama_sub_kategori").val(hasil[0].nama_sub_kategori);
          }
        }
      });
    }
  }
  function editData(){
    var sub={
      'nama_sub_kategori': $('#nama_sub_kategori').val(),
      'id_sub_kategori': $('#id_sub_kategori').val(),
      'id_kategori': $('#id_kategori').val()
    }
    $.ajax({
      url:"<?=base_url('admin/kategori/edit_sub')?>",
      data:sub,
      type:"POST",
      dataType:"JSON",
      success:function(hasil){
        $("#pesan").html(hasil.pesan);
        if(hasil.pesan == ""){
          $("#form").modal("hide");
          alert("Data Anda Berhasil diedit");
          location.reload();
          $("#id_sub_kategori").val("");
					$("#id_kategori").val("");
					$("#nama_sub_kategori").val("");
          sub_kategori();
        }
      }
    });
  }
  function get_kategori(){
		$.ajax({
			url:"<?=base_url('admin/kategori/kategori_by_artikel')?>",
			type:"GET",
			dataType:"JSON",
			success:function(hasil){
				var html="";
				for(var i=0; i<hasil.length;i++){
					html += 
						"<option value='"+hasil[i].id_kategori+"'>"+hasil[i].nama_kategori+"</option>"
				}
				$("#id_kategori").html(html);
				
			}
		});
  }
  function hapusData(id_sub_kategori){
    var nanya = confirm('Anda Yakin Akan Menghapus Data Ini ??');
    if(nanya){
      $.ajax({
        url:"<?=base_url('admin/kategori/delete_sub')?>",
        type:"POST",
        dataType:"JSON",
        data: "id_sub_kategori="+id_sub_kategori,
        success:function(){
          location.reload();
					sub_kategori();
				}
      });
    }
  }
</script>

