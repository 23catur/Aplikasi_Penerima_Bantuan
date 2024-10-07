<?php
include 'koneksi2.php';

$tanggal = $_GET['tanggal'];
$status = $_GET['status'];

$koneksi->query("UPDATE hasilhitung SET status='$status' WHERE tanggal='$tanggal'");

if ($status == 'Terverifikasi' || $status == 'Belum Verifikasi') {
    $ambilData = $koneksi->query("SELECT * FROM hasilhitung WHERE tanggal='$tanggal'");
    $data = $ambilData->fetch_assoc();

    $koneksi->query("INSERT INTO riwayat (tanggal, id_kelompok, hasil, status) VALUES ('{$data['tanggal']}', '{$data['id_kelompok']}', '{$data['hasil']}', '$status')");

    $koneksi->query("DELETE FROM hasilhitung WHERE tanggal='$tanggal'");
}

header('Location: hasil.php');
exit;
?>
