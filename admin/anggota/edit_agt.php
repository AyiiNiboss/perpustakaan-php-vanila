<?php
		include "koneksi/koneksi.php";
		$id=$_GET['id'];
		$query=mysqli_query($koneksi, "Select * from tb_anggota where id='$id' ");
		$row=mysqli_fetch_assoc($query);
		$kategori=$row['kategori'];

		if (isset ($_POST['Ubah'])){
			//mulai proses ubah
			$ni=$_POST['nomor_induk'];
			$nama=$_POST['nama'];
			$jk=$_POST['jk'];
			$query_ubah="Update tb_anggota set nomor_induk='$ni',nama='$nama',jk='$jk' where id='$id' ";            
			mysqli_query($koneksi, $query_ubah);
		
			
				if($kategori=='siswa'){
					if($query_ubah){
					echo "<script>
					Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
					}).then((result) => {
						if (result.value) {
							window.location = 'index.php?hal=data_siswa';
						}
					})</script>";
					}else{
					echo "<script>
					Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
					}).then((result) => {
						if (result.value) {
							window.location = 'index.php?hal=data_siswa';
						}
					})</script>";
					}
				}else if($kategori=='guru'){
					if($query_ubah){
					echo "<script>
					Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
					}).then((result) => {
						if (result.value) {
							window.location = 'index.php?hal=data_guru';
						}
					})</script>";
					}else{
					echo "<script>
					Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
					}).then((result) => {
						if (result.value) {
							window.location = 'index.php?hal=data_guru';
						}
					})</script>";

				}
			
		}
		}
?>


<section class="content-header">
	<h1>
		Master Data
		<small>Data Anggota</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>SMK Negeri 4 Palembang</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Data</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<?php if($kategori=='guru'){?>
						<div class="form-group">
							<label>NIP</label>
							<input type="text" name="nomor_induk" id="nomor_induk" value="<?=$row['nomor_induk'];?>" class="form-control" placeholder="Masukan NIP">
						</div>
						<?php
							 }else if($kategori=='siswa'){?>
							<div class="form-group">
							<label>NIS</label>
							<input type="text" name="nomor_induk" id="nomor_induk" value="<?=$row['nomor_induk'];?>" class="form-control" placeholder="Masukan NIS">
						</div>
						<?php }  ?>
						<div class="form-group">
							<label>NAMA</label>
							<input type="text" name="nama" id="nama" value="<?=$row['nama'];?>" class="form-control" placeholder="Masukan Nama">
						</div>
						
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jk" id="jk" class="form-control" required>
								<option value="<?=$row['jk'];?>"><?=$row['jk'];?></option>
								<option>Laki-laki</option>
								<option>Perempuan</option>
							</select>
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<?php
						 if($kategori=='siswa'){?>
						<a href="index.php?hal=data_siswa" class="btn btn-warning">Batal</a>
						<?php
						 }else if($kategori=='guru'){?>
						<a href="index.php?hal=data_guru" class="btn btn-warning">Batal</a>

						<?php }?>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>
