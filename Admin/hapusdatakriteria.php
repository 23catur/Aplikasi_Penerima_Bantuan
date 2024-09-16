<?php
include('koneksi.php');
$sql = "DELETE FROM kriteria WHERE id_kriteria='$_GET[id]'";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('HAPUS BERHASIL');window.location='kriteria.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
