<?php


 include 'koneksi.php';

 	$idproduksi = $_POST['idproduksi'];
 	$tanggal = $_POST['tanggal'];
 	$jenis_kopi = $_POST['jenis_kopi'];
 	$permintaan = $_POST['permintaan'];
 	$persediaan = $_POST['persediaan'];
 	$produksi = $_POST['produksi'];

 	
 	mysqli_query($koneksi,"INSERT INTO perhitungan VALUES('$idproduksi','$tanggal','$jenis_kopi','$permintaan','$persediaan','$produksi')")or die (mysqli_error($koneksi));
 	
 header("location:tambah_data.php");
 ?>