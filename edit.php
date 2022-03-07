<?php
   include 'koneksi.php';

if(isset($_GET['idproduksi'])){
    $idbarang=($_GET["idproduksi"]);
    $query="SELECT*FROM perhitungan WHERE idproduksi='$idproduksi'";
    $result=mysqli_query($link,$query);

    if(!$result){
        die("Query Error:".mysqli_errno($link).
        " - ".mysqli_error($link));
    }
    $data=mysqli_fetch_assoc($result);
    $tanggal=$data["tanggal"];
    $jenis_kopi=$data["jenis_kopi"];
    $permintaan=$data["permintaan"];
    $persediaan=$data["persediaan"];
    $produksi=$data["produksi"];

} else{
    header("locaton.tambah_data.php");
}
?>

<?php include 'header.php' ?>
<div id="main">
<html>
   <body>
    <header>
       <center><h3>EDIT DATA BARANG</h3></center>
      <form id="perhitungan" action="edit_proses.php" method="post">
      <table cellpadding="2">
                <tr>
                    <td>Id Produksi</td>
                    <td><input type="text" name="idproduksi" id="idproduksi" required=""></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal"></td>
                </tr>
                <tr>
                    <td>Jenis Kopi</td>
                <td>
                    <select name="jenis_kopi" id="jenis_kopi" required="">
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
                    <td><input type="text" name="permintaan"></td>
                </tr>
                <tr>
                    <td>Persediaan</td>
                    <td><input type="text" name="persediaan"></td>
                </tr>
                <tr>
                    <td>Produksi</td>
                    <td><input type="text" name="produksi"></td>
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