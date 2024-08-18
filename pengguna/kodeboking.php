<?php
session_start();

$id=$_SESSION["ses_ni"];
$query=mysqli_query($koneksi, "Select * from tb_anggota where nomor_induk='$id' ");
$row=mysqli_fetch_assoc($query); 
$nama=$row['nama'];   
?>
<div class="container">
   
<center><section class="content mt-5 ml-5">	
	<div class="row justify">
		<div class="col-lg-4 col-xs-6">			
			<div class="small-box bg-blue">
				<div class="inner">
               
					<h4>
                        Kode Booking
					</h4>
                    <b><h4>BO-<?php echo $nama?>-<?php echo $row['id']?></h4>
					
				</div>
			</div>
		</div>
        </div>