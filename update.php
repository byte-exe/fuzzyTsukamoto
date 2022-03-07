<?php


 include 'koneksi.php';

	
 	$tanggal = $_POST['tanggal'];
 	$jenis_kopi = $_POST['jenis_kopi'];
 	$permintaan = $_POST['permintaan'];
 	$persediaan = $_POST['persediaan'];
 	$produksi = $_POST['produksi'];
    $idproduksi = $_POST['idproduksi'];

 	
 	mysqli_query($koneksi,"UPDATE perhitungan SET tanggal='$tanggal',jenis_kopi='$jenis_kopi',permintaan='$permintaan',persediaan='$persediaan' ,produksi='$produksi' where  idproduksi='$idproduksi'")or die (mysqli_error($koneksi));
 	
 header("location:laporan.php");
 ?>