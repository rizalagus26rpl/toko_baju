
<h1>PRODUCT</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>


<?php endif?>



<?php if($this->session->userdata('level')=="admin"){?>
<a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: right;">Tambah</a>

<?php }?>
<table class="table table-hover table-stripped">

	<thead>

		<tr>

			<td>No</td><td>Kode Produk</td><td>Nama Produk</td><td>Kategori</td><td>Harga</td><td>Stock</td><td></td><td></td>

		</tr>

	</thead>

	<tbody>


		<?php $no = 0; foreach($buku as $bk): $no++;?>


		<tr>

			<td><?=$no?></td><td><?=$bk->kode_buku?></td><td><?=$bk->judul_buku?></td><td><?=$bk->nama_kategori?></td><td><?=$bk->harga?></td><td><?=$bk->stok?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?> <a href="#ubah" data-toggle="modal" onclick="edit(<?=$bk->kode_buku?>)"  class="btn btn-warning">Ubah</a><?php }else{ 		echo "anda kasir"; }?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?><a href="<?=base_url('index.php/Buku/hapus/'.$bk->kode_buku)?>" onclick="return confirm('apakah anda yakin untuk menghapus')" class="btn btn-danger">Hapus</a><?php }else{ echo "anda kasir"; }?></td>

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
				<div class="modal-title">Tambah Produk</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>

			</div>

			<div class="modal-body">


				<form action="<?=base_url('index.php/Buku/tambah')?>" method="post" enctype="multipart/form-data">

					<table>

						<tr>
							<td>Nama Produk</td>
							<td><input type="text" name="judul_buku" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; ">
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>
								</select>
							</td>
						</tr>

						<tr>
							<td>harga</td>
							<td><input type="text" name="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>stok</td>
							<td><input type="number" name="stok" style="margin-left: 20px;"></td>
						</tr>

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
				<div class="modal-title">Ubah Buku</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
			</div>

			<div class="modal-body">


				<form action="<?=base_url('index.php/Buku/update')?>" method="post" enctype="multipart/form-data">

					<table>

						<input type="hidden" name="kode_buku" required id="kode_buku" style="margin-left: 20px;">

						<tr>
							<td>judul buku</td>
							<td><input type="text" name="judul_buku"  required  id="judul_buku" style="margin-left: 20px;"></td>
						</tr>


						<tr>
							<td>kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; " id="kategori" required >
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>
								</select>
							</td>
						</tr>

						<tr>
							<td>harga</td>
							<td><input type="text" name="harga" required  id="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>stok</td>
							<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>
		</div>
	</div>

</div>




<script >


	function edit(kode_buku){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/Buku/tampil_ubah_buku/"+kode_buku,
			dataType:"json",


			success:function(data){
				$("#kode_buku").val(data.kode_buku);
				$("#judul_buku").val(data.judul_buku);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				$("#stok").val(data.stok);
			}
		});
	}

</script>
