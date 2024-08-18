<?php
include "koneksi/koneksi.php";
if(isset($_POST['simpan']))
{
	$judul=$_POST['judul_buku'];
	$pengarang=$_POST['pengarang'];
	$penerbit=$_POST['penerbit'];
	$tt=$_POST['th_terbit'];
	$isbn=$_POST['isbn'];
	$jb=$_POST['jumlah_buku'];
	$tgl=$_POST['tgl_input'];
	$query="INSERT INTO tb_buku values ('','$judul','$pengarang','$penerbit','$tt','$isbn','$jb','$tgl') ";
	mysqli_query($koneksi, $query);
	
	if($query){
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=data_buku';
			}
		})</script>";
		}else{
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=tambah_buku';
			}
		})</script>";
	  }
	}
	?>
<section class="content-header">
	<h1>
		Master Data
		<small>Data Buku</small>
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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Buku</h3>
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
							<label>Judul Buku</label>
							<input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Judul Buku">
						</div>

						<div class="form-group">
							<label>Pengarang</label>
							<input type="text" name="pengarang" id="pengarang" class="form-control" placeholder="Nama Pengarang">
						</div>

						<div class="form-group">
							<label>Penerbit</label>
							<input type="text" name="penerbit" id="penerbiit" class="form-control" placeholder="Penerbit">
						</div>

						<div class="form-group">
							<label>Tahun Terbit</label>
							<input type="number" name="th_terbit" id="th_terbit" class="form-control" placeholder="Tahun Terbit">
						</div>
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" name="isbn" id="isbn" class="form-control" placeholder="isbn">
						</div>
						<div class="form-group">
							<label>Jumlah Buku</label>
							<input type="number" name="jumlah_buku" id="jumlah buku" class="form-control" placeholder="Jumlah Buku">
						</div>
						<div class="form-group">
							<label>Tanggal Input</label>
							<input type="date" name="tgl_input" id="tgl_input" class="form-control" placeholder="Tanggal Input">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
						<a href="index.php?hal=data_buku" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

