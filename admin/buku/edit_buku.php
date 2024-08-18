<?php
include "koneksi/koneksi.php";
$id=$_GET['id_buku'];
$query=mysqli_query($koneksi, "Select * from tb_buku where id_buku='$id' ");
$row=mysqli_fetch_assoc($query);

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $judul=$_POST['judul_buku'];
	$pengarang=$_POST['pengarang'];
	$penerbit=$_POST['penerbit'];
	$tt=$_POST['th_terbit'];
	$isbn=$_POST['isbn'];
	$jb=$_POST['jumlah_buku'];
	$tgl=$_POST['tgl_input'];
	$query_ubah="Update tb_buku set judul_buku='$judul',pengarang='$pengarang',penerbit='$penerbit',th_terbit='$tt',isbn='$isbn',jumlah_buku='$jb',tgl_input='$tgl' where id_buku='$id' ";            
	mysqli_query($koneksi, $query_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?hal=data_buku';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?hal=data_buku';
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
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah buku</h3>
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
							<input type='text' class="form-control" name="judul_buku" value="<?=$row['judul_buku'];?>"
							/>
						</div>

						<div class="form-group">
							<label>Pengarang</label>
							<input type='text' class="form-control" name="pengarang" value="<?=$row['pengarang'];?>"
							/>
						</div>

						<div class="form-group">
							<label>Penerbit</label>
							<input class="form-control" name="penerbit" value="<?=$row['penerbit'];?>"
							/>
						</div>

						<div class="form-group">
							<label>Th Terbit</label>
							<input class="form-control" name="th_terbit" value="<?=$row['th_terbit'];?>">
						</div>
						<div class="form-group">
							<label>ISBN</label>
							<input class="form-control" name="isbn" value="<?=$row['isbn'];?>">
						</div>
						<div class="form-group">
							<label>Jumlah Buku</label>
							<input class="form-control" name="jumlah_buku" value="<?=$row['jumlah_buku'];?>">
						</div>
						<div class="form-group">
							<label>Tanggal Input</label>
							<input type="date"  class="form-control" name="tgl_input" value="<?=$row['tgl_input'];?>">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="index.php?hal=data_buku" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php



