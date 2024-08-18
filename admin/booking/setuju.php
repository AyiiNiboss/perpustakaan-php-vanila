<?php
    $id=$_GET['kode'];
    $query=mysqli_query($koneksi, "Select * from tb_bookingbuku where id_booking='$id' ");
    $row=mysqli_fetch_assoc($query);
    $judul=$row['judul_buku'];
    $id_booking=$row['id_booking'];
    $nomorinduk=$row['nomor_induk'];
    $nama=$row['nama'];
    $kategori=$row['kategori'];
    $tgl=date('Y-m-d');
    
    $jml=$row['jumlah_buku'];

    if(isset($_GET['kode'])){

       
		//membuat tgl kembali
		$tgl_k=date('Y-m-d', strtotime('+7 days', strtotime($tgl)));
    
        $sql_simpan1 = "INSERT INTO tb_transaksi (id_peminjam,id_booking,nomor_induk,judul_buku,nama,kategori,tgl_pinjam,tgl_kembali,jumlah_buku) VALUES (
			'',
           '".$id_booking."',
		   '".$nomorinduk."',
		   '".$judul."',
		   '".$nama."',
		   '".$kategori."',
		   '".$tgl."',
		   '".$tgl_k."',
		   '1');";
		   $query1 = mysqli_query($koneksi, $sql_simpan1);

           $sql_hapus = "DELETE FROM tb_bookingbuku WHERE id_booking='".$_GET['kode']."'";
           $query_hapus = mysqli_query($koneksi, $sql_hapus);

           $sql_simpan2 = "INSERT INTO tb_peminjaman (id_pinjam,nomor_induk,judul_buku,nama,kategori,tgl_pinjam) VALUES (
			'',
		   '".$nomorinduk."',
		   '".$judul."',
		   '".$nama."',
		   '".$kategori."',
		   '".$tgl."');";

		   $query2 = mysqli_query($koneksi, $sql_simpan2);
    
    if ($query1 && $query_hapus) {
        echo "<script>
        Swal.fire({title: 'Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?hal=booking';
            }
        })</script>";
        }  if ($query2) {
                echo "<script>
                Swal.fire({title: 'Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=booking';
                    }
                })</script>";
            
        }else{
        echo "<script>
        Swal.fire({title: 'Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?hal=booking';
            }
        })</script>";
    }
	}
