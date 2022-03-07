<?php


 include 'koneksi.php';

	$idproduksi = $_GET['idproduksi'];

 	
 	mysqli_query($koneksi,"DELETE FROM `perhitungan` WHERE idproduksi='$idproduksi'")or die (mysqli_error($koneksi));
 	
 header("location:laporan.php");
 ?>