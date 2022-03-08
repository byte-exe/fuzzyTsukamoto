<?php
    include "koneksi.php";
    $sql = mysqli_query($koneksi, "select * from perhitungan where idproduksi='$_GET[idproduksi]'");
    $hasil = mysqli_fetch_array($sql);
?>
<html>
    <style>
        .tabel { border-collapse:collapse; }
        .tabel table, .tabel tr, .tabel th, .tabel td { border: 1px solid black;}
        .tabel table, .tabel tr, .tabel th, .tabel td { padding-right:30px; padding-left:30px; text-align:center;}
        th { padding-right:30px; padding-left:30px; text-align:center;}
        td { padding:10px; }
    </style>
    <head>
        <title>Edit Barang</title>
        <BODY>
        <table style="padding:5px;">
        	<body >
            <tr>
                <button><a href="index.php">Kembali</a></button>
            </tr>
        </table>
        <h4 style="text-align:center;">EDIT DATA BARANG</h4>
        <table>
            <tr>
                <td style="text-align:center;"><b>Daftar Data Barang</b></td>
            </tr>
            <tr>
                <td>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Kode barang</td>
                            <td><input type="text" id="kode_barang" name="kode_barang" value="<?php echo "$hasil[kode_barang]";?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td><input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama barang" value="<?php echo "$hasil[nama_barang]";?>" required></td>
                        </tr>
                        <tr>
                            <td>Harga Barang</td>
                            <td><input type="text" id="harga_barang" name="harga_barang" placeholder="Masukkan Harga Barang" required></td>
                        </tr>
                        <tr>
                            <th colspan="4"><input type="submit" name="ubah" id="ubah" value="EDIT"></th>
                        </tr>
                    </table>
                </form>
                </td>
                <?php
                    if(isset($_POST['ubah']))
                    {
                        $kode_kamar = $_POST['kode_barang'];
                        $nama_kamar = $_POST['nama_barang'];
                        $harga_kamar = $_POST['harga_barang'];
                        
                        $sql = mysqli_query ($mysqli,"UPDATE tb_barang set nama_barang = '$nama_barang',harga_barang='$harga_barang' where kode_barang='$kode_barang'");
                        if($sql)   
                        {
                            echo "<script>alert('Data berhasil diubah.')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_barang.php'>";
                        }
                        else
                        {
                            echo "<script>alert('Gagal mengubah data!')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_barang.php'>";
                        }
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_barang.php'>";
                    }
                ?>
                <td>
                    <table class="tabel">
                        <tr>
                            <th>NO.</th>
                            <th>KODE BARANG</th>
                            <th>NAMA BARANG</th>
                            <th>HARGA BARANG</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <script>
                            function hapus ()
                            { return confirm ("Hapus Data ini ?"); }
                        </script>
                        <?php
                            $no=0;
                            $query = mysqli_query($mysqli,"SELECT * FROM tb_barang");
                            {
                                while ($hasil = mysqli_fetch_assoc($query))
                                {
                                    $no++;
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td>$hasil[kode_barang]</td>
                                            <td>$hasil[nama_barang]</td>
                                            <td>$hasil[harga_barang]</td>
                                            <td><a href='edit_barang.php?kode_barang=$hasil[kode_barang]'>Edit</td>
                                            <td><a href='hapus_barang.php?kode_barang=$hasil[kode_barang]' onclick='return hapus()'>Hapus</td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                    </table>
                    <center><font face = candara color = black>Created By. Rivandi 18101152610666</font> </center>
                </td>
            </tr>
        </table>
    </head>
</html>