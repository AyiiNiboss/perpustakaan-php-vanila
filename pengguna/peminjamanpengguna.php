<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_ni"])==""){
		header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_ni"];
      $data_nama = $_SESSION["ses_nama"];
      $data_kat = $_SESSION["ses_kategori"];
     
      
    }
	?>
<style>
	
	.row {
    font-family: sans-serif;
    
  }
  thead{
	  background : #E9967A;
  }
 
</style>
<div class ="container mt-5">
 <div class="row">
 <div class="col-sm-12">
  
<section class="content-header">
	<h1>
		HAI, <?php echo $data_nama;?>
		<small>Booking Buku</small>
	</h1>
	
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Jumlah Buku</th>
                            <th>Action</th>                                     
                        </tr>
                    </thead>
                <tbody>
			<?php 
				include "koneksi/koneksi.php";
				$no = 1;
				$query =mysqli_query($koneksi,"SELECT * from tb_buku");
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
							
						

							<td>
								<a href="halamanpengguna.php?hal=tambahsirkul&id_buku=<?php echo $row['id_buku']; ?>&nomorinduk=<?php echo $data_id;?>" title="BOKING" id="id_buku"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"> Booking</i>
								</a>
								
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
				
			</div>
		</div>
		<div class="box-footer">
			<a href="pengguna/logout.php" class="btn btn-danger"><i class=" fa-2x fa fa-sign-out"> Logout</i></a>
		</div>

	</div>
	
</section>
