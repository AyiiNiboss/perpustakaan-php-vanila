<?php
    $id=$_GET['kode'];
    $query=mysqli_query($koneksi, "Select * from tb_transaksi where id_peminjam='$id' ");
    $row=mysqli_fetch_assoc($query);
    $id_peminjam=$row['id_peminjam'];
    $judul=$row['judul_buku'];
    $nomorinduk=$row['nomor_induk'];
    $nama=$row['nama'];
    $kategori=$row['kategori'];
    $tgl=date('Y-m-d');
    $jml=$row['jumlah_buku'];
    $tgl_k=$row['tgl_kembali'];

    if(isset($_GET['kode'])){
           
            $sql_simpan1 = "INSERT INTO tb_pengembalian (id_pengembalian,id_peminjam,nomor_induk,judul_buku,nama,kategori,tgl_kembali,jumlah_buku) VALUES (
               '',
               '".$id_peminjam."',
               '".$nomorinduk."',
               '".$judul."',
               '".$nama."',
               '".$kategori."',
               '".$tgl_k."',
                    '1');";
               $query1 = mysqli_query($koneksi, $sql_simpan1);


               $sql_hapus = "DELETE FROM tb_transaksi WHERE id_peminjam='".$_GET['kode']."'";
               $query_hapus = mysqli_query($koneksi, $sql_hapus);
            if ($query1 && $query_hapus) {
                echo "<script>
                Swal.fire({title: 'Kembalikan Buku Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_peminjaman';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Kembalikan Buku Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_peminjaman';
                    }
                })</script>";
            }
            }
