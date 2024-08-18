<?php
include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PERPUSTAKAAN SMKN 4</title>
	<link rel="icon" href="dist/img/logo4.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href="dist/css/styles.css" rel="stylesheet" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="bootstrap/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<style>
	th{
	    font-size: 11pt;
	}
	td{
		font-size: 10pt;
	}
	body{
		background: ;
	
  }
 
</style>
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Perpustakaan Online</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pengguna/login.php">Booking Buku</a></li>
                       
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
		<br>
		<br>
		
          <div class="row mt-5">
            <div class="col-sm-12">
			<?php
                        $hal=@$_GET['hal'];
                        if($hal=='peminjamanpengguna'){
                        include "pengguna/peminjamanpengguna.php";
						} else if($hal=='tambahsirkul'){
                        include "pengguna/tambah_sirkul.php";                       
						} else if($hal=='kodeboking'){
                        include "pengguna/kodeboking.php";
                        }else{
							include "pengguna/home.php";  
                        }   
					        
					
					?>


			</section>
			<!-- /.content -->
	
        </div>
		
		<script src="bootstrap/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<link href="dist/css/styles.css" rel="stylesheet" />
		<!-- DataTables -->
		<script src="bootstrap/datatables/jquery.dataTables.min.js"></script>
		<script src="bootstrap/datatables/dataTables.bootstrap.min.js"></script>
		<script src="dist/js/app.min.js"></script>
		<script src="dist/js/demo.js"></script>
		


		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>
</body>

</html>