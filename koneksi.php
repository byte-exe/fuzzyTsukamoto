<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "tsukamoto";

   $koneksi = mysqli_connect($host,$user,$password,$database);
      if($koneksi->connect_error){
          die("Koneksi gagal");
      }
?>