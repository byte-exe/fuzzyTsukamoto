<?php include 'header.php' ?>
<?php 
include 'koneksi.php';
$idproduksi = $_GET['idproduksi'];
$results = mysqli_query($koneksi, "SELECT * FROM perhitungan where idproduksi='$idproduksi'"); 
$row     = mysqli_fetch_array($results);
$jenis_kopi    = array('Kopi 20 Gram','Kopi 50 Gram','Kopi 100 Gram','Kopi 120 Gram','Kopi 250 Gram');
?>
<div id="main">
<html>
<body>
    <header>
        <center> <h3>Update Produksi Barang </h3> </center>
        <form method="post" action="update.php">
            <table cellpadding="2">
                <tr hidden>
                    <td>ID Permintaan</td>
                    <td><input type="text" name="idproduksi" value="<?php echo $row['idproduksi'];?>" ></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal"  value="<?php echo $row['tanggal'];?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kopi</td>
                <td>
                <select name="jenis_kopi">
                            <?php
                            foreach ($jenis_kopi as $j){
                                echo "<option value='$j' ";
                                echo $row['jenis_kopi']==$j?'selected="selected"':'';
                                echo ">$j</option>";
                            }
                            ?>
                        </select>
                </select>
                </td>
                </tr>
                <tr>
                    <td>Permintaan</td>
                    <td><input type="text" name="permintaan" value="<?php echo $row['permintaan'];?>"></td>
                </tr>
                <tr>
                    <td>Persediaan</td>
                    <td><input type="text" name="persediaan" value="<?php echo $row['persediaan'];?>"></td>
                </tr>
                <tr>
                    <td>Produksi</td>
                    <td><input type="text" name="produksi" value="<?php echo $row['produksi'];?>"></td>
                </tr>
                
            </table>

            <hr>
            <center>
            <input type="submit" value="Update">
            <tr>
                </tr>
            <a href="index.php"><input type="button" value="Batal"></a>
            </center>           
    <form>
<body>
<html>