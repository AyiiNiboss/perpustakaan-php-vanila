<section class="content-header">
	<h1>
		Transaksi
		<small>Buku</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php?hal=dashboard">
				<i class="fa fa-home"></i>
				<b>SMK Negeri 4 Palembang</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			
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
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>NIS/NIP</th>
							<th>Judul Buku</th>
							<th>Nama</th>
							<th>Peminjam</th>
							<th>Tgl Pinjam</th>
							<th>Tgl Kembali</th>
							<th>Denda</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT a.id_sk, a.id_tpeminjaman, b.id_buku, b.judul_buku, a.nama, a.kategori, a.jumlah_buku, a.tgl_pinjam, a.tgl_kembali
                  from tb_tpeminjaman a INNER JOIN tb_buku b on a.id_buku=b.id_buku where status='PIN' order by tgl_pinjam desc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_tpeminjaman']; ?>
							</td>
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>

								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['kategori']; ?>
							</td>	
							<td>
								<?php  $tgl = $data['tgl_pinjam']; echo date("d/M/Y", strtotime($tgl))?>
							</td>
							<td>
								<?php  $tgl = $data['tgl_kembali']; echo date("d/M/Y", strtotime($tgl))?>
							</td>

							<?php

							$u_denda = 1000;

							$tgl1 = date("Y-m-d");
							$tgl2 = $data['tgl_kembali'];

							$pecah1 = explode("-", $tgl1);
							$date1 = $pecah1[2];
							$month1 = $pecah1[1];
							$year1 = $pecah1[0];

							$pecah2 = explode("-", $tgl2);
							$date2 = $pecah2[2];
							$month2 = $pecah2[1];
							$year2 =  $pecah2[0];

							$jd1 = GregorianToJD($month1, $date1, $year1);
							$jd2 = GregorianToJD($month2, $date2, $year2);

							$selisih = $jd1 - $jd2;
							$denda = $selisih * $u_denda;
							?>

							<td>
								<?php if ($selisih <= 0) { ?>
								<span class="label label-primary">Masa Peminjaman</span>
								<?php } elseif ($selisih > 0) { ?>
								<span class="label label-danger">
									Rp.
									<?=$denda?>
								</span>
								<br> Terlambat :
								<?=$selisih?>
								Hari
							</td>
							<?php } ?>

							<td>
								<a href="index.php?hal=perpanjang&kode=<?=$data['id_sk'];?>" onclick="return confirm('Perpanjang Data Ini ?')"
								 title="Perpanjang" class="btn btn-success">
									<i class="glyphicon glyphicon-upload"></i>
								</a>
								<a href="index.php?hal=kembalikan&kode=<?=$data['id_sk'];?>&id_buku=<?=$data['id_buku'];?>" onclick="return confirm('Kembalikan Buku Ini ?')"
								 title="Kembalikan" class="btn btn-danger">
									<i class="glyphicon glyphicon-download"></i>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>