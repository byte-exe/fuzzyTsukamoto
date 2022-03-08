<?php include 'header.php' ?>
<?php include "koneksi.php"?>

<?php
	for($a=0;$a<=2;$a++) {
		@$pmMin[$a] = $_POST['vMin'.$a];
		@$pmMax[$a] = $_POST['vMax'.$a];
	}
	for($b=0;$b<=1;$b++) {
		@$nil[$b] = $_POST['nil'.$b];
	}

	for($c=0; $c<=3;$c++) {
		@$rbyr[$c] = $_POST['rbyr'.$c];
		@$rop[$c] = $_POST['rop'.$c];
		@$rlyn[$c] = $_POST['rlyn'.$c];
		@$rtip[$c] = $_POST['rtip'.$c];
	}
?>

<html>
<head>
	<title>PENENTUAN JUMLAH PRODUKSI TSUKAMOTO</title>
    <script src='bootstrap.min.js'></script>
    <style type='text/css'>
		input {
			size: 20;
			text-align: center;
			marquee-direction:reverse;
		}
	</style>
</head>
<body>
	<center>
    <h3>PERHITUNGAN PENENTUAN JUMLAH PRODUKSI PABRIK KOPI BUBUK CAP MATAHARI</h3>
	<h3>MENGGUNAKAN METODE TSUKAMOTO</h3>


    <form method='post'>
    	<table><tr><td colspan='4' style='text-align:center'><b>VARIABEL</b></td></tr>
    		<?php

				$con = mysqli_connect ("localhost","root","","tsukamoto");
				$result = mysqli_query($con,"SELECT MIN(permintaan) FROM perhitungan");
				$dataPermintaanMin = mysqli_fetch_array($result);
				$permintaanMin = $dataPermintaanMin['MIN(permintaan)'];

				$result1 = mysqli_query($con,"SELECT MIN(persediaan) FROM perhitungan");
				$dataPersediaanMin = mysqli_fetch_array($result1);
				$persediaanMin = $dataPersediaanMin['MIN(persediaan)'];

				$result2 = mysqli_query($con,"SELECT MIN(produksi) FROM perhitungan");
				$dataProduksiMin = mysqli_fetch_array($result2);
				$produksiMin = $dataProduksiMin['MIN(produksi)'];

				$result3 = mysqli_query($con,"SELECT MAX(permintaan) FROM perhitungan");
				$dataPermintaanMax = mysqli_fetch_array($result3);
				$permintaanMax = $dataPermintaanMax['MAX(permintaan)'];

				$result4 = mysqli_query($con,"SELECT MAX(persediaan) FROM perhitungan");
				$dataPersediaanMax = mysqli_fetch_array($result4);
				$persediaanMax = $dataPersediaanMax['MAX(persediaan)'];

				$result5 = mysqli_query($con,"SELECT MAX(produksi) FROM perhitungan");
				$dataProduksiMax = mysqli_fetch_array($result5);
				$produksiMax = $dataProduksiMax['MAX(produksi)'];
				

				$pmMin = array($permintaanMin,$persediaanMin,$produksiMin);
				$pmMax = array($permintaanMax,$persediaanMax,$produksiMax);
		
				
				$mn = array("Permintaan Terendah","Persediaan Terendah","Produksi Terendah");
				$mx = array("Permintaan Tertinggi","Persediaan Tertinggi","Produksi Tertinggi");
				$nl = array("Permintaan", "Persediaan");
				for($i=0;$i<=2;$i++) {
					echo "<tr>
							<td>".$mn[$i]."</td><td><input type='text' name='vMin".$i."' value='$pmMin[$i]'</td>
							<td>".$mx[$i]."</td><td><input type='text' name='vMax".$i."' value='$pmMax[$i]'</td>
						  </tr>";
				}

				echo "<tr><td colspan='4' style='text-align:center'><b><br/>INPUT DATA PERHITUNGAN</b></td></tr><tr>";
				for($i=0;$i<=1;$i++) {
					echo "<td>".$nl[$i]."</td><td><input type='text' name='nil".$i."' value='".$nil[$i]."' width='30px;' height='10px'/></td>";
				}
				echo "</tr></table><br /><br />
				<table><tr><td colspan='6' style='text-align:center;'><b>ATURAN FUZZY (RULE)</b></td></tr>";
				for($i=0;$i<=3;$i++) {
					echo "<tr>
							<td>IF</td>
							<td>
								<select name='rbyr".$i."'>";
								if ($rbyr[$i]==0) {
									echo "<option value='0' selected>Permintaan Turun</option>
									<option value='1'>Permintaan Naik</option>";
								}
								echo "</select>
							</td>
							<td>
								<select name='rop".$i."'>";
								if ($rop[$i]==0) {
									echo "<option value='0' selected>And</option>
									<option value='1'>Or</option>";
								}
								echo "</select>
							</td>
							<td>
								<select name='rlyn".$i."'>";
								if ($rlyn[$i]==0) {
									echo "<option value='0' selected>Persediaan Sedikit</option>
									<option value='1'>Persediaan Banyak</option>";
								}
								echo "</select>
							</td>
							<td>THEN</td>
							<td>
								<select name='rtip".$i."'>";
								if ($rbyr[$i]==0) {
									echo "<option value='0' selected>Produksi Berkurang</option>
									<option value='1'>Produksi Bertambah</option>";
								}
								echo "</select>
							</td></tr>";
				}
				echo "<tr><td colspan='6' style='text-align:center;'><br/>***********************************************************</td></tr>";
			?>

            <tr>
            	<td colspan='6' style='text-align:center;'><input type='submit' value='PROSES' /></td>
            </tr>
            <tr><td colspan='6' style='text-align:center;'>***********************************************************</td></tr>
    	</table><br>
		<?php
		for($i=0;$i<=2;$i++) {
			if ($pmMin[$i]==null) { exit; }
			if ($pmMax[$i]==null) { exit; }
		}

		

		for ($i=0;$i<=1;$i++) {
			if ($nil[$i]==null) { exit; }
		}

		for($i=0;$i<=1;$i++) {
			if ($nil[$i]<=$pmMin[$i]) {
				$K[$i][0] = 1;
			} else if ($nil[$i]>=$pmMin[$i] && $nil[$i]<=$pmMax[$i]) {
				$K[$i][0] = ($pmMax[$i] - $nil[$i])/($pmMax[$i]-$pmMin[$i]);
			} else if ($nil[$i]>=$pmMax[$i]) {
				$K[$i][0] = 0;
			}

			if ($nil[$i]<=$pmMin[$i]) {
				$K[$i][1] = 0;
			} else if ($nil[$i]>=$pmMin[$i] && $nil[$i]<=$pmMax[$i]) {
				$K[$i][1] = ($nil[$i]-$pmMin[$i])/($pmMax[$i]-$pmMin[$i]);
			} else if ($nil[$i]>=$pmMax[$i]) {
				$K[$i][1] = 1;
			}

		}

		for($i=0;$i<=1;$i++) {
			for ($j=0;$j<=1;$j++) {
				$c++;
			}
		}

		for ($i=0;$i<=3;$i++) {
			switch($rop[$i]) {
				case 0:
					if ($K[0][$rbyr[$i]] >= $K[1][$rlyn[$i]]) {
						$rule[$i] = $K[1][$rlyn[$i]];
					} else {
						$rule[$i] = $K[0][$rbyr[$i]];
					}
					break;
				case 1:
					if ($K[0][$rbyr[$i]] <= $K[1][$rlyn[$i]]) {
						$rule[$i] = $K[1][$rlyn[$i]];
					} else {
						$rule[$i] = $K[0][$rbyr[$i]];
					}
					break;
			}

			@$jumRule += $rule[$i];

			switch($rtip[$i]) {
				case 0:
					$nilZ[$i] = ($pmMax[2] - ($rule[$i] * ($pmMax[2]-$pmMin[2])));
					break;
				case 1:
					$nilZ[$i] = (($rule[$i] * ($pmMax[2] - $pmMin[2])) + $pmMin[2]);
					break;
			}
			@$JumZ = ($JumZ + ($rule[$i] * $nilZ[$i]));
		}

		for($i=0;$i<=3;$i++) {
			$b=$i+1;

		}
		@$hasil = $JumZ/$jumRule;
		echo "<span style='font-size:xx-large;'><b>Jumlah Yang Harus Di Produksi : ".round($hasil)." Barang</b></span>";
	?>
    </form>

   

    </center>
</body>
</html>