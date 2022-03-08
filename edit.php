<?php
   include 'koneksi.php';
   $sql = mysqli_query($koneksi, "select * from perhitungan where idproduksi='$_GET[idproduksi]'");
   $hasil = mysqli_fetch_array($sql);
?>

<?php include 'header.php' ?>
<div id="main">
<html>
   <body>
    <header>
       <center><h3>EDIT DATA PRODUKSI</h3></center>
      <form id="perhitungan" action="edit_proses.php" method="post">
      <table cellpadding="2">
                <tr>
                    <td>Id Produksi</td>
                    <td><input type="text" name="idproduksi" id="idproduksi" value="<?php echo "$hasil[idproduksi]";?>" readonly></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal" value="<?php echo "$hasil[tanggal]";?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kopi</td>
                <td>
                    <select name="jenis_kopi" id="jenis_kopi" require>
                    <option value="Kopi 20 Gram">Kopi 20 Gram</option>
			        <option value="Kopi 50 Gram">Kopi 50 Gram</option>
			        <option value="Kopi 100 Gram">Kopi 100 Gram</option>
        			<option value="Kopi 120 Gram">Kopi 120 Gram</option>
		        	<option value="Kopi 250 Gram">Kopi 250 Gram</option>
                </select>
                </td>
                </tr>
                <tr>
                    <td>Permintaan</td>
                    <td><input type="text" name="permintaan" value="<?php echo "$hasil[permintaan]";?>"></td>
                </tr>
                <tr>
                    <td>Persediaan</td>
                    <td><input type="text" name="persediaan"value="<?php echo "$hasil[persediaan]";?>"></td>
                </tr>
                <tr>
                    <td>Produksi</td>
                    <td><input type="text" name="produksi" value="<?php echo "$hasil[produksi]";?>"></td>
                </tr>
                <center>
                <tr>
         <td><input type="submit" name="edit" value="Update Data"></td>
      </tr>
      </center>
 
</table>
</header>
  </form>
 </body>
</html>