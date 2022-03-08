<?php include 'header.php' ?>
<div id="main">
<?php
     include 'koneksi.php';
     ?>

<html>
<body>
    <header>
        <center> <h3>Input Data Produksi Barang </h3> </center>
        <form method="post" action="simpan_data.php">
            <table cellpadding="2">
            <tr>
                    <td>ID Produksi</td>
                    <td><input type="text" name="idproduksi" required=""></td>
                </tr>
            <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal"></td>
                </tr>
                <tr>
                    <td>Jenis Kopi</td>
                <td>
                    <select name="jenis_kopi" id="jenis_kopi">
                    <option value="">Pilih Jenis Kopi</option>
                    <option value="Kopi 20 Gram">Kopi 20 Gram</option>
			        <option value="Kopi 50 Gram">Kopi 50 Gram</option>
			        <option value="Kopi 100 Gram">Kopi 100 Gram</option>
        			<option value="Kopi 150 Gram">Kopi 150 Gram</option>
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
            </table>

            <hr>
            <center>
            <input type="submit" value="Simpan">
            <tr>
                </tr>
            <a href="index.php"><input type="button" value="Batal"></a>
            </center>           
    <form>
    <table border="1">
         <tr>
             <th>No</th>
             <th>Id Produksi</th>
             <th>Tanggal</th>
             <th>Jenis Kopi</th>
             <th>Permintaan</th>
             <th>Persediaan</th>
             <th>Produksi</th>
             <th colspan=2>Aksi</th>
         </tr>
         

                        <?php
                            $no=0;
                            $query = mysqli_query($koneksi, "SELECT * FROM perhitungan");
                            {
                                while ($hasil = mysqli_fetch_assoc($query))
                                {
                                    $no++;
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td>$hasil[idproduksi]</td>
                                            <td>$hasil[tanggal]</td>
                                            <td>$hasil[jenis_kopi]</td>
                                            <td>$hasil[permintaan]</td>
                                            <td>$hasil[persediaan]</td>
                                            <td>$hasil[produksi]</td>
                                            <td><a href='edit.php?idproduksi=$hasil[idproduksi]'>Edit</td>
                                            <td><a href='delete.php?idproduksi=$hasil[idproduksi]' onclick='return hapus()'>Hapus</td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>

     </table>

<body>
<html>