<?php

    if(isset($_GET['kode'])){
        $id=$_GET['id_buku'];
    $sql_ubah = "UPDATE tb_tpeminjaman SET status='KEM' WHERE id_sk='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    $sqlstock = "UPDATE tb_buku SET jumlah_buku=(jumlah_buku+1) WHERE id_buku='".$_GET['id_buku']."'";
    $querystock = mysqli_query($koneksi, $sqlstock);
    if ($query_ubah && $querystock) {
        echo "<script>
        Swal.fire({title: 'Kembalikan Buku Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?hal=data_sirkulasi';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Kembalikan Buku Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?hal=data_sirkulasi';
            }
        })</script>";
    }
	}
