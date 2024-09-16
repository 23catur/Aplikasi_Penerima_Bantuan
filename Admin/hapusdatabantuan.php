<?php
include('koneksi.php');
$sql = "DELETE FROM bantuan WHERE id_bantuan='$_GET[id]'";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('HAPUS berhasil');window.location='bantuan.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
