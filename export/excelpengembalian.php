<?php
    include "../koneksi/koneksi.php";
    $nama_file = "Laporan Data Pengembalian";
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attechment; filename=".$nama_file.".xls");
?>
<html> 
<head>
		<title>SMK Negeri 4 Palembang - Laporan Perpustakaan</title>
	</head>
	

	<body>
	
	<h3 align="center">PEMERINTAH PROVINSI SUMATERA SELATAN<br>
								DINAS PENDIDIKAN<br>
		    			SEKOLAH MENENGAH KEJURUAN NEGERI 4 PALEMBANG</h3>
			<p align="center">Jl. Sersan Sani 1019 Palembang Provinsi Sumatera Selatan<br>
									Telp./ Fax (0711) 810364 Kode Pos 30127<br>
							email : <u>smkn4plg@yahoo.com</u> website : <u>www.smkn4plg.sch.id</u>
		<b>________________________________________________________________________________________</b>
		<br>
			<br>
			<h2 align="center">LAPORAN DATA PENGEMBALIAN</h2>
				<table border="1" cellpadding="10" cellspacing="0" align="center">
					
					
					    <tr>
                            <th>No</th>
							<th>NIS/NIP</th>
							<th>Buku</th>
							<th>Nama</th>
							<th>Peminjam</th>
							<th>Tgl Kembali</th>                             
                        </tr>
						<?php
                  $no = 1;
				  $query =mysqli_query($koneksi,"SELECT * from tb_pengembalian order by tgl_kembali Asc");
				  while($data =mysqli_fetch_assoc($query)) { 
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nomor_induk']; ?>
							</td>
                           
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>

								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['kategori']; ?>
							</td>	
                            
							<td>
								<?php  $tgl = $data['tgl_kembali']; echo date("d/M/Y", strtotime($tgl))?>
							</td>
							
						</tr>
						<?php
                  }
                ?>
					

				</table>
                </body>
			</html>