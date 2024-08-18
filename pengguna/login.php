<?php
include "../koneksi/koneksi.php";
   
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome To Library</title>
	<link rel="icon" href="../dist/img/logo4.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

	
</head>
<style type="text/css">
  
.login-box-body{
	background: rgba(0, 0, 0, 0.5);
	box-shadow: 0 0 10px 5px black;
	
}

h3{
	font-family: "Times New Roman", Times, serif;
	color: white;

}
b{
	color: black;
}
</style>
<body class="hold-transition login-page">
	<div class="login-box">
		<br><br><br><br><br><br>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<br>
			<h3 class="login-box-msg">Harap Mengisi NIS / NIP </h3>
			<form action="#" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="nomor_induk" placeholder="NIS / NIP" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>

				<div class="row">
					<div class="col-xs-8">
					<button type="submit" class="btn btn-warning btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
						<i class="fa fa-sign-in"></i>  <b>Masuk</b>
						</button>
						
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
							<a href="../halamanpengguna.php" title="Kembali"
								 class="btn btn-success">
									<i class="fa fa-sign-out"> Kembali</i>
								</a>
						</button>
						
					</div>
					<!-- /.col -->
				</div>
			</form>
			<!-- /.social-auth-links -->

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- jQuery 2.2.3 -->
	
	<!-- Bootstrap 3.3.6 -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- sweet alert -->
</body>





<?php 
		if (isset($_POST['btnLogin'])) {  

		$username=mysqli_real_escape_string($koneksi,$_POST['nomor_induk']);



		$sql_login = "SELECT * FROM tb_anggota WHERE BINARY nomor_induk='$username'";
		$query_login = mysqli_query($koneksi, $sql_login);
		$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
		$jumlah_login = mysqli_num_rows($query_login);
        

            if ($jumlah_login == 1 ){
              session_start();
              $_SESSION["ses_ni"]=$data_login["nomor_induk"];
              $_SESSION["ses_nama"]=$data_login["nama"];
              $_SESSION["ses_kategori"]=$data_login["kategori"];
            
              
                
              echo "<script>
                    Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = '../halamanpengguna.php?hal=peminjamanpengguna';
                        }
                    })</script>";
              }else{
              echo "<script>
                    Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'login.php';
                        }
                    })</script>";
                }
			  }
