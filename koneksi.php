<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $database = "arkademy";
  $koneksi = mysqli_connect($host, $user, $pass, $database);

  if (!$koneksi) {
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());
  }
?>