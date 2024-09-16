<?php
include('koneksi.php');
$sql = "DELETE FROM nilai_kelompok WHERE id_nilai='$_GET[id]'";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('HAPUS berhasil');window.location='datanilai.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
