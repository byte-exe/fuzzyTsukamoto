<?php
    include "koneksi.php";
    $sql = mysqli_query($koneksi,"delete from perhitungan where idproduksi='$_GET[idproduksi]'");
    if($sql)
    {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=tambah_data.php'>";
    }
    else
    {
        echo "<script>alert('Gagal')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=tambah_data.php'>";
    }
?>