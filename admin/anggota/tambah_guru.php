<?php
include "koneksi/koneksi.php";
if(isset($_POST['simpan']))
{
	$ni=$_POST['nomor_induk'];
	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$query="INSERT INTO tb_anggota values ('','$ni','$nama','$jk','guru')";
	mysqli_query($koneksi, $query);
	
	if($query){
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=data_guru';
			}
		})</script>";
		}else{
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=tambah_guru';
			}
		})</script>";
	  }
	}
	?>
<section class="content-header">
	<h1>
		Master Data
		<small>Data Guru</small>
	</h1>
	<ol class="breadcrumb">
		
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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Guru</h3>
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
						<div class="form-group">
							<label>NIP</label>
							<input type="text" name="nomor_induk" id="nomor_induk" class="form-control" placeholder="Masukan NIP">
						</div>

						<div class="form-group">
							<label>NAMA</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Guru">
						</div>
						
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jk" id="jk" class="form-control" required>
								<option>-- Pilih --</option>
								<option>Laki-laki</option>
								<option>Perempuan</option>
							</select>
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
						<a href="index.php?hal=data_guru" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

