<section class="content-header">
	<h1>
		Rekap Data Pengembalian
		<small>Buku</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php?hal=dashboard">
				<i class="fa fa-home"></i>
				<b>SMKN 4 PALEMBANG</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="export/pdfpengembalian.php" title="Tambah Data" class="btn btn-success">
				<i class="fa fa-file-pdf-o"></i>  Export PDF</a>
			<a href="export/excelpengembalian.php" title="Tambah Data" class="btn btn-warning">
				<i class="fa fa-file-excel-o"></i>  Excel</a>
			
				<div class="col text-right">
		<form method="post" class="form-inline">
			<input type="date" name="tgl_mulai" class="form-control">
			<input type="date" name="tgl_selesai" class="form-control ml-3">
			<button type="submit" name="filter_tgl" class="btn btn-warning ml-3">Filter</button>
		</form>
		</div>

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
							<th>Tanggal Kembali</th>
						</tr>
					</thead>
					<tbody>
					<?php
				if(isset($_POST['filter_tgl'])){
					$mulai = $_POST['tgl_mulai'];
					$selesai = $_POST['tgl_selesai'];

					if($mulai != null || $selesai != null){					
						$query =mysqli_query($koneksi,"SELECT * from tb_pengembalian WHERE tgl_kembali BETWEEN '$mulai' and DATE_ADD('$selesai',INTERVAL 1 DAY) order by id_pengembalian DESC");
					}else{
						$query =mysqli_query($koneksi,"SELECT * from tb_pengembalian order by tgl_kembali Asc");
					}
				}else{
					
				  	$query =mysqli_query($koneksi,"SELECT * from tb_pengembalian order by tgl_kembali Asc");
				}
				$no = 1;
				  while($data =mysqli_fetch_assoc($query)) { 
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nomor_induk']; ?>
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
								<?php  $tgl = $data['tgl_kembali']; echo date("d/M/Y", strtotime($tgl))?>
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