<?php ?>
<!DOCTYPE html>
<head profile="http://gmpg.org/xfn/11">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Fuzzy</title>
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
</head>
<body>
  <span class="globeworld">&shy;</span>
  <div id="container">

	<header id="header-wrap">
	<section id="header" class="row">
		<div id="header-left" class="six columns">
			<h1 class="title"><a href="./"> KOPI BUBUK CAP MATAHARI</a></h1>
      <h2 class="desc">Sistem Pendukung Keputusan Penentuan Jumlah Produksi</h2>
		</div>
		<aside id="header-right" class="six columns">
			<?php 
			?>
		</aside>
	</section>
	</header>

	<nav id="nav-wrap">
	  <div id="navi" class="row" role="navigation">
		  <a class="togglenav" href="#" onclick="$('.menu').slideToggle('slow'); return false;">MENU</a>
      <ul class="menu">
        <li><a href = "perhitungan.php">PERHITUNGAN</a></li>
        <?php 
		?>
              <li><a href ="./tambah_data.php">TAMBAH DATA</a></li>
              <li><a href ="./laporan.php">LAPORAN</a></li>
              <li><a href ="./logout.php">LOGOUT</a></li>
            <?php
			?>
      </ul>
	  </div>
	</nav>

	<section id="content" itemprop='mainContentOfPage'>
	  <div class="row">