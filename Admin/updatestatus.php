<?php
include 'koneksi2.php';

if (isset($_POST['ktp']) && isset($_POST['status'])) {
  $ktp = $_POST['ktp'];
  $status = $_POST['status'];

  $query = "UPDATE nilai_kelompok SET status = '$status' WHERE ktp = '$ktp'";

  if ($koneksi->query($query)) {
    header("Location: datanilai.php");
  } else {
    echo "Error: " . $koneksi->error;
  }
}
