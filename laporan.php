<?php include ("header.php") ?>
    <div id="main">

<!DOCTYPE html>
<html>
    <body>
        <center>
        <h1>Laporan Produksi Kopi Bubuk Cap Matahari</h1>
        </center>
  <?php
     include 'koneksi.php';
     ?>

     <table border="1">
         <tr>
             <th>No</th>
             <th>Id Produksi</th>
             <th>Tanggal</th>
             <th>Jenis Kopi</th>
             <th>Permintaan</th>
             <th>Persediaan</th>
             <th>Produksi</th>
         </tr>
         <?php
         $no=1;
         $sql=mysqli_query($koneksi," select * from perhitungan");
         while($data=mysqli_fetch_array($sql)){
             ?>
             <tr>
                 <td><?php echo $no++;?></td>
                 <td><?php echo $data['idproduksi'];?></td>
                 <td><?php echo $data['tanggal'];?></td>
                 <td><?php echo $data['jenis_kopi'];?></td>
                 <td><?php echo $data['permintaan'];?></td>
                 <td><?php echo $data['persediaan'];?></td>
                 <td><?php echo $data['produksi'];?></td>
                 <td>
            
                </td>
             </tr>
             <?php
         }
         ?>
     </table>
    <br/>
    <a href="print.php" target="_BLANK">CETAK</a>
  </body>
</html>