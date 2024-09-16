<?php
include 'koneksi2.php';

if (isset($_POST['tanggal']) && isset($_POST['status'])) {
  $tanggal = $_POST['tanggal'];
  $status = $_POST['status'];

  $query = "UPDATE hasilhitung SET status = '$status' WHERE tanggal = '$tanggal'";

  if ($koneksi->query($query)) {
    header("Location: hasil.php");
  } else {
    echo "Error: " . $koneksi->error;
  }
}
