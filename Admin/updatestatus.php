<?php
include 'koneksi2.php';

if (isset($_GET['ktp']) && isset($_GET['status'])) {
  $ktp = $_GET['ktp'];
  $status = $_GET['status'];

  $query = "UPDATE nilai_kelompok SET status = '$status' WHERE ktp = '$ktp'";

  if ($koneksi->query($query)) {
    header("Location: datanilai.php");
  } else {
    echo "Error: " . $koneksi->error;
  }
}
 