<?php
$koneksi = new mysqli("localhost", "root", "", "pertanian");

session_start();
if (!isset($_SESSION["kelompok"])) {
    header('Location:loginuser.php?first=true');
}
