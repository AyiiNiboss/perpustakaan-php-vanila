<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
		header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
      $data_level = $_SESSION["ses_level"];
    }

    //KONEKSI DB
    include "koneksi/koneksi.php";
	
	$sql = $koneksi->query("SELECT count(id_booking) as booking from tb_bookingbuku");
	while ($data= $sql->fetch_assoc()) {
	
		$booking=$data['booking'];
	}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PERPUSTAKAAN SMKN 4</title>
	<link rel="icon" href="dist/img/logo4.png">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="bootstrap/datatables/dataTables.bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>


<style type="text/css">
  .content-wrapper{
    font-family: system-ui;
    background-color: #d5f4e6;
  }
</style>
<body class="hold-transition skin-purple sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<span class="logo-lg">
					<img src="dist/img/logoo.png" width="37px">
					<b>SMK N 4 Library</b>
				</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">						
						<li class="dropdown messages-menu">
							<a class="dropdown-toggle">
								<span>
									<b>
										Perpustakaan SMK Negeri 4 Palembang
									</b>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<b>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/avatar2.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-danger">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>
				</br>
				
				<ul class="sidebar-menu">
					<li class="header">MAIN MENU</li>

					
					<?php
					if ($data_level=="Administrator"){
					?>

					<li class="treeview">
						<a href="index.php?hal=dashboard">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>
					<li class="treeview">
						<a href="index.php?hal=booking">
							<i class="fa fa-check"></i>
							<span>Booking Buku </span>
							<span class="pull-right-container"><span class="label label-warning">
								<?= $booking; ?>
							</span>
						</a>
					</li>
					<li class="treeview">
						<a href="index.php?hal=data_buku">
							<i class="fa fa-book"></i>
							<span>Data Buku</span>
							<span class="pull-right-container">
							</span>
						</a>
						
					</li>
				
					<li class="treeview">
						<a href="index.php?hal=data_peminjaman">
							<i class="fa fa-rotate-right"></i>
							<span>Transaksi Peminjaman</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>
				    <!-- <li class="treeview">
						<a href="index.php?hal=data_pengembalian">
							<i class="fa fa-book"></i>
							<span>Data Pengembalian</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-database"></i>
							<span>Data Anggota</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="index.php?hal=data_siswa">
									<i class="fa fa-file-text"></i>Siswa</a>
							</li>
							<li>
								<a href="index.php?hal=data_guru">
									<i class="fa fa-file-text"></i>Guru</a>
							</li>
						</ul>
					</li>

					

					<li class="treeview">
						<a href="#">
							<i class="fa fa-files-o"></i>
							<span>Rekapan</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="index.php?hal=laporanbuku">
									<i class="fa fa-file-text"></i>Data Buku</a>
							</li>
							<li>
								<a href="index.php?hal=laporanpeminjaman">
									<i class="fa fa-file-text"></i>Data Peminjaman</a>
							</li>
							<li>
								<a href="index.php?hal=laporanpengembalian">
									<i class="fa fa-file-text"></i>Data Pengembalian</a>
							</li>
						</ul>
					</li>




					<li class="header">SETTING</li>

					<li class="treeview">
						<a href="index.php?hal=data_pengguna">
							<i class="fa fa-user"></i>
							<span>Pengguna Sistem</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					
					<?php
            } elseif($data_level=="Kepala Sekolah"){
          ?>
					<li class="treeview">
						<a href="index.php?hal=dashboard">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-files-o"></i>
							<span>Rekapan</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="index.php?hal=laporanbuku1">
									<i class="fa fa-file-text"></i>Rekap Buku</a>
							</li>
							<li>
								<a href="index.php?hal=laporanpeminjaman1">
									<i class="fa fa-file-text"></i>Rekap Peminjaman</a>
							</li>
							<li>
								<a href="index.php?hal=laporanpengembalian1">
									<i class="fa fa-file-text"></i>Rekap Pengembalian</a>
							</li>
						</ul>
					</li>




					<li class="header">SETTING</li>

					<?php
            }
          ?>


					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>


			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
			<?php
                        $hal=@$_GET['hal'];
                        if($hal=='dashboard'){
                        include "admin/dashboard/dashboard.php";
						} else if($hal=='data_buku'){
                        include "admin/buku/data_buku.php";
                        } else if($hal=='edit_buku'){
                        include "admin/buku/edit_buku.php";
                        } else if($hal=='tambah_buku'){
                        include "admin/buku/tambah_buku.php";
                        } else if($hal=='del_buku'){
                        include "admin/buku/del_buku.php";
						} else if($hal=='booking'){
                        include "admin/booking/databooking.php";
						} else if($hal=='setuju'){
                        include "admin/booking/setuju.php";
						} else if($hal=='tolak'){
                        include "admin/booking/tolak.php";

						//peminjaman
						} else if($hal=='data_peminjaman'){
                        include "admin/peminjaman/datapeminjaman.php";
						} else if($hal=='perpanjang'){
                        include "admin/peminjaman/panjang.php";
						} else if($hal=='kembalikan'){
                        include "admin/peminjaman/kembali.php";

						//pengembalian
						} else if($hal=='data_pengembalian'){
                        include "admin/pengembalian/data_pengembalian.php";
		

						//anggota
					    } else if($hal=='data_siswa'){
                        include "admin/anggota/data_siswa.php";
					    } else if($hal=='data_guru'){
                        include "admin/anggota/data_guru.php";
						} else if($hal=='tambah_siswa'){
						include "admin/anggota/tambah_siswa.php";
						} else if($hal=='tambah_guru'){
						include "admin/anggota/tambah_guru.php";
						} else if($hal=='hapus_anggota'){
						include "admin/anggota/hapus_agt.php";
						} else if($hal=='edit_anggota'){
						include "admin/anggota/edit_agt.php";
						} else if($hal=='hapus_anggota'){
						include "admin/anggota/hapus_agt.php";
						} else if($hal=='edit_anggota'){
						include "admin/anggota/edit_agt.php";


						//pengguna	
                        } else if($hal=='data_pengguna'){
                            include "admin/pengguna/data_pengguna.php";
						} else if($hal=='tambah_pengguna'){
                            include "admin/pengguna/tambah_pengguna.php";
						} else if($hal=='hapus_pengguna'){
                            include "admin/pengguna/del_pengguna.php";
						} else if($hal=='edit_pengguna'){
                            include "admin/pengguna/edit_pengguna.php";

						//laporan	
                        } else if($hal=='laporanbuku'){
                            include "admin/laporan/laporan buku/laporanbuku.php";
						} else if($hal=='laporanpengembalian'){
                            include "admin/laporan/laporan pengembalian/laporanpengembalian.php";
						} else if($hal=='laporanpeminjaman'){
                            include "admin/laporan/laporan peminjaman/laporanpeminjaman.php";

						//kepala sekolah	
						} else if($hal=='laporanbuku1'){
                            include "kepalasekolah/laporan/laporan buku/laporanbuku.php";
					
						} else if($hal=='laporanpengembalian1'){
                            include "kepalasekolah/laporan/laporan pengembalian/laporanpengembalian.php";
						} else if($hal=='laporanpeminjaman1'){
                            include "kepalasekolah/laporan/laporan peminjaman/laporanpeminjaman.php";

                        }else{
							include "admin/dashboard/dashboard.php";  
                        }   
					        
					
					?>


			</section>
		</div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<strong>Copyright &copy;
				<a href="https://smkn4palembang.sch.id/">SMK Negeri 4 Palembang</a>.</strong> 
		</footer>
		
		<!-- jQuery 2.2.3 -->
		<script src="bootstrap/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script src="bootstrap/datatables/jquery.dataTables.min.js"></script>
		<script src="bootstrap/datatables/dataTables.bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
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