<?php
if (isset($_POST['edit'])){
    include ("koneksi.php");

$idproduksi=$_POST['idproduksi'];
$tanggal = $_POST['tanggal'];
$jenis_kopi = $_POST['jenis_kopi'];
$permintaan = $_POST['permintaan'];
$persediaan = $_POST['persediaan'];
$produksi = $_POST['produksi'];

$query="UPDATE perhitungan SET tanggal='$tanggal', jenis_kopi='$jenis_kopi', permintaan='$permintaan', persediaan='$persediaan', produksi=$produksi WHERE idproduksi='$idproduksi'";
$result=mysqli_query($link, $query);

if(!$result){
    die ("Query Gagal Dijalankan: ".mysqli_errno($link).
    " - ".mysqli_error($link));
    }
}
header("location:laporan.php");
?>