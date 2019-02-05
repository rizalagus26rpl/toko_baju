
<h1>Kasir</h1>
<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
	

<?php endif?>



<?php if($this->session->userdata('level')=="admin"){?>
<a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: right;">Tambah</a>
<?php }?>



<table class="table table-hover table-stripped"> 

<thead>
	
	<tr>
		
		<td>no</td><td>kode user</td><td>nama user</td><td>username</td><td>password</td><td>level</td><td></td><td></td>

	</tr>

</thead>

<tbody>
	

<?php $no = 0; foreach($user as $sr): $no++;?>


	<tr>
		
		<td><?=$no?></td><td><?=$sr->kode_user?></td><td><?=$sr->nama_user?></td><td><?=$sr->username?></td><td><?=$sr->password?></td><td><?=$sr->level?></td>

		<td><?php if($this->session->userdata('level')=="admin"){?> <a href="#ubah" data-toggle="modal" onclick="edit(<?=$sr->kode_user?>)"  class="btn btn-warning">Ubah</a><?php }else{ 		echo "anda kasir"; }?></td>

		<td><?php if($this->session->userdata('level')=="admin"){?><a href="<?=base_url('index.php/Kasir/hapus/'.$sr->kode_user)?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin untuk menghapus')" >Hapus</a><?php }else{ echo "anda kasir"; }?></td>

	</tr>



<?php endforeach?>


</tbody>	

</table>







<div class="modal fade" id="tambah" >
	<div class="modal-dialog">
		
	<div class="modal-content">
	<div class="modal-header">
	
		<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Tambah Kasir</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
				</div>
	<div class="modal-body">


	<form action="<?=base_url('index.php/Kasir/tambah')?>" method="post" >

	<table>
	

		<tr>
		<td>nama user</td>
		<td><input type="text" name="nama_user" required style="margin-left: 20px;"></td>
		</tr>

		<tr>
		<td>username</td>
		<td><input type="text" name="username" required style="margin-left: 20px;"></td>
		</tr>

		<tr>
		<td>password</td>
		<td><input type="text" name="password" required style="margin-left: 20px;"></td>
		</tr>


		<td><input type="hidden" name="level" style="margin-left: 20px;"></td>
		
	</table>
				

	<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

</form>

	</div>	
	</div>
	</div>

</div>



<div class="modal fade" id="ubah" >
	<div class="modal-dialog">
		
	<div class="modal-content">
	<div class="modal-header">
	
		<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Ubah Kasir</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>

	<div class="modal-body">


	<form action="<?=base_url('index.php/Kasir/update')?>" method="post" >

	<table>


	<td><input type="hidden" name="kode_user" required id="kode_user" style="margin-left: 20px;"></td>
	

		<tr>
		<td>nama user</td>
		<td><input type="text" name="nama_user" required id="nama_user" style="margin-left: 20px;"></td>
		</tr>

		<tr>
		<td>username</td>
		<td><input type="text" name="username" required id="username" style="margin-left: 20px;"></td>
		</tr>

		<tr>
		<td>password</td>
		<td><input type="text" name="password" id="password" required style="margin-left: 20px;"></td>
		</tr>

		<td><input type="hidden" name="level"  required id="level" style="margin-left: 20px;"></td>
		
	</table>
				

	<center><input type="submit" name="tambah" value="Ubah" class="btn btn-warning" style="margin-top: 30px;"></center>

</form>

	</div>	
	</div>
	</div>

</div>












<script >
	

function edit(kode_user){
	$.ajax({
	type:"post",
	url:"<?=base_url()?>index.php/Kasir/tampil_ubah_user/"+kode_user,
	dataType:"json",
	success:function(data){
	$("#kode_user").val(data.kode_user);
	$("#nama_user").val(data.nama_user);
	$("#username").val(data.username);
	$("#password").val(data.password);
	$("#level").val(data.level);
	}
});
}

</script>




