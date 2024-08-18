<?php

$id=$_GET['id_buku'];
$query=mysqli_query($koneksi, "Select * from tb_buku where id_buku='$id' ");
$row=mysqli_fetch_assoc($query);
$stock= $row['jumlah_buku'];


//menangkap nomor induk
$idnomor=$_GET['nomorinduk'];
$querynomor=mysqli_query($koneksi, "Select * from tb_anggota where nomor_induk='$idnomor' ");
$row1=mysqli_fetch_assoc($querynomor);
?>
  <div class ="container mt-5">
 <div class="row">
  <div class="col-sm-12">
<section class="content-header">
	<h1>
		Booking
		<small>Buku</small>
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
<style>
	.box-body{
		font-size: 13px

	}
	.box box-info{
	  background : #E9967A;
  }
</style>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info" id="id_buku">
				<div class="box-header with-border">
					<h3 class="box-title">Booking</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" >
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Judul Buku</label>
							<input type="text" name="judul_buku" id="id_buku" class="form-control" value="<?php echo $row['judul_buku'] ?>" readonly>
		 
						</div> 
                        <div class="form-group">
							<label>Stock Buku</label>
							<input type="text" name="jumlah_buku1" id="jumlah_buku" class="form-control" value="<?php echo $row['jumlah_buku'] ?>" readonly>
							 
						</div>
                        <div class="form-group">
							<label>NIS/NIP</label>
							<input type="text" name="nomor_induk" id="nomor_induk" value="<?php echo $row1['nomor_induk'] ?>"class="form-control" readonly>							 
						</div>

						<div class="form-group">
                        <label>Nama</label>
							<input type="text" name="nama" id="nama" value="<?php echo $row1['nama'] ?>" class="form-control" readonly>							 
						</div>

						<div class="form-group">
                        <label>Kategori</label>
							<input type="text" name="kategori" id="kategori" value="<?php echo $row1['kategori'] ?>" class="form-control" readonly>							 
						</div>
                        				
						<div class="form-group">
							<label>Tgl Pinjam</label>
							<input type="date" name="tgl_booking" id="tgl_pinjam" class="form-control" />
						</div>

					</div>
					

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="halamanpengguna.php?hal=peminjamanpengguna" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php
	
    if (isset ($_POST['Simpan'])){
		
		//menangkap post tgl pinjam
		//$tgl_p=$_POST['tgl_pinjam'];
		//membuat tgl kembali
	//	$tgl_k=date('Y-m-d', strtotime('+7 days', strtotime($tgl_p)));
		//$id=$_POST['nama'];
		

		if($stock >= 1){
			$sql_simpan1 = "INSERT INTO tb_bookingbuku (judul_buku,nama,nomor_induk,kategori,tgl_booking,jumlah_buku) VALUES (
			'".$_POST['judul_buku']."',
			'".$_POST['nama']."',
			'".$_POST['nomor_induk']."',
			'".$_POST['kategori']."',
			'".$_POST['tgl_booking']."',
			'1');";
			$query1 = mysqli_query($koneksi, $sql_simpan1);

      	if ($query1){
		
				echo "<script>
				Swal.fire({title: 'Booking Buku Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'halamanpengguna.php?hal=kodeboking';
					}
				})</script>";		
				}else{
				echo "<script>
				Swal.fire({title: 'Booking Buku Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'halamanpengguna.php?hal=peminjamanpengguna';
					}
				})</script>";
			}
					 		 
		}else{
			echo "<script>
			Swal.fire({title: 'Stock Buku Kosong',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'halamanpengguna.php?hal=peminjamanpengguna';
				}
			})</script>";
} 
}
