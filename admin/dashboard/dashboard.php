<?php
	$sql = $koneksi->query("SELECT count(id_buku) as buku from tb_buku");
	while ($data= $sql->fetch_assoc()) {
	
		$buku=$data['buku'];
	}
?>



<?php
	$sql = $koneksi->query("SELECT count(id_pinjam) as pin from tb_peminjaman ");
	while ($data= $sql->fetch_assoc()) {
	
		$pin=$data['pin'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_pengembalian) as kem from tb_pengembalian ");
	while ($data= $sql->fetch_assoc()) {
	
		$kem=$data['kem'];
	}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Perpustakaan SMK Negeri 4</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h4>
						<?= $buku; ?>
					</h4>

					<p>Buku</p>
				</div>
				<div class="icon">
					<i class="ion ion-ios-book"></i>
				</div>
				<a href="index.php?hal=laporanbuku" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h4>
						<?= $pin; ?>
					</h4>

					<p>Peminjaman</p>
				</div>
				<div class="icon">
					<i class="ion ion-arrow-up-c"></i>
				</div>
				<a href="index.php?hal=laporanpeminjaman" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4>
						<?= $kem; ?>
					</h4>

					<p>Pengembalian</p>
				</div>
				<div class="icon">
					<i class="ion ion-arrow-down-c"></i>
				</div>
				<a href="index.php?hal=laporanpengembalian" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-12 col-xs-6">
		<br>
					<h4>
						<strong>VISI</strong>
					</h4>
					<h4>- Mempersiapkan lulusan yang berkualitas, propfesional, bertaqwa dan berwawasan lingkungan</h4><br>

					<h4>
						<strong>MISI</strong>
					</h4>
					<h4>- Menciptakan lulusan yang berkualitas dan bertaqwa</h4><p>
					<h4>- Meningkatkan profesional siswa, guru dan karyawan sesuai dengan standar ISO 9001:2008</h4><p>
					<h4>- Meningkatkan lingkungan yang berwawasan adiwiyata</h4><p>
					<h4>- Meningkatkan kerjasama dan mempromosikan SMK Negeri 4 Palembang kepada masysrakat Dunia Usaha / Dunia Industri</h4><p>
		
		
