<section class="content-header">
	<h1>
		Booking
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
							<th>Tgl Booking</th>
							<th>Kode Boking</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1; 

				  $query =mysqli_query($koneksi,"SELECT * from tb_bookingbuku order by tgl_booking desc");
				  while($data =mysqli_fetch_assoc($query)) { 
				  $nama=$data['nama'];
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
								<?php  $tgl = $data['tgl_booking']; echo date("d/M/Y", strtotime($tgl))?>
							</td>
							<td>
								<?php
									 $x =mysqli_query($koneksi,"SELECT * from tb_anggota WHERE nama='$nama'");
									 $row=mysqli_fetch_assoc($x);
									 $id_anggota=$row['id'];
								?>
							BO-<?php echo $data['nama']?>-<?php echo  $id_anggota?>
							</td>


							<td>
								
								<span class="label label-danger">Booking Buku</span>
								
							</td>
							

							<td>
								<a href="index.php?hal=setuju&kode=<?=$data['id_booking'];?>" onclick="return confirm('Setuju Booking Buku Ini ?')"
								 title="Setuju" class="btn btn-success">
									<i class="glyphicon glyphicon-check"></i></a>
								<a href="index.php?hal=tolak&kode=<?=$data['id_booking'];?>" onclick="return confirm('Tolak Booking Buku Ini ?')"
								 title="Tolak" class="btn btn-danger">
									<i class="fa fa-close"></i>
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