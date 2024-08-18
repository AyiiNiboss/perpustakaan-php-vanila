<section class="content-header">
	<h1>
		Rekap Data Buku
		<small> Buku</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php?hal=dashboard">
				<i class="fa fa-home"></i>
				<b>SMK N 4 Palembang</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="export/pdfbuku.php" title="Tambah Data" class="btn btn-success">
				<i class="fa fa-file-pdf-o"></i>  Export PDF</a>
			<a href="export/excelbuku.php" title="Tambah Data" class="btn btn-warning">
				<i class="fa fa-file-excel-o"></i>  Excel</a>
		</div>

				<div class="col text-right">
				<form method="post" class="form-inline">
					<input type="date" name="tgl_mulai" class="form-control">
					<input type="date" name="tgl_selesai" class="form-control ml-3">
					<button type="submit" name="filter_tgl" class="btn btn-warning ml-3">Filter</button>
				</form>
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
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Jumlah Buku</th>
                            <th>Tanggal Input</th>                                   
                        </tr>
                    </thead>
                <tbody>
			<?php 
				include "koneksi/koneksi.php";
                if(isset($_POST['filter_tgl'])){
					$mulai = $_POST['tgl_mulai'];
					$selesai = $_POST['tgl_selesai'];

					if($mulai != null || $selesai != null){					
						$query =mysqli_query($koneksi,"SELECT * from tb_buku where tgl_input BETWEEN '$mulai' and DATE_ADD('$selesai',INTERVAL 1 DAY) order by id_buku DESC");
					}else{
						$query = mysqli_query($koneksi,"SELECT * from tb_buku");
					}
				}else{
					
					$query =mysqli_query($koneksi,"SELECT * from tb_buku");
				}
				$no = 1;
				while($row =mysqli_fetch_assoc($query)) {  
				
				
				
						
						
			?>
						<tr>
							<td><?=$no++;?></td>
							<td><?=$row['judul_buku'];?></td>
							<td><?=$row['pengarang'];?></td>
							<td><?=$row['penerbit'];?></td>
							<td><?=$row['th_terbit'];?></td>
							<td><?=$row['isbn'];?></td>
							<td><?=$row['jumlah_buku'];?></td>
							<td><?=$row['tgl_input'];?></td>
						

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