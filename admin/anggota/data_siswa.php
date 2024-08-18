<section class="content-header">
	<h1>
		Master Data
		<small>Data Siswa</small>
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
			<a href="index.php?hal=tambah_siswa" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
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
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>                                     
                        </tr>
                    </thead>
                <tbody>
			<?php 
				include "koneksi/koneksi.php";
				$no = 1;
				$query =mysqli_query($koneksi,"SELECT * from tb_anggota where kategori='siswa'");
				while($row =mysqli_fetch_assoc($query)) {  
						
						
			?>
						<tr>
							<td><?=$no++;?></td>
							<td><?=$row['nomor_induk'];?></td>
							<td><?=$row['nama'];?></td>
							<td><?=$row['jk'];?></td>
							<td>
								<a href="index.php?hal=edit_anggota&id=<?=$row['id'];?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="index.php?hal=del_buku&id=<?=$row['id'];?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
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