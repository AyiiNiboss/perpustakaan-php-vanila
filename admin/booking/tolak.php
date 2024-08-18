<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_bookingbuku WHERE id_booking='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Berhasil Ditolak',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=booking';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Gagal Ditolak',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=booking';
                    }
                })</script>";
            }
        }

