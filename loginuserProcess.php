<?php
session_start();
include 'koneksi.php';
$error = '';

if (isset($_POST["login"])) {
    if (!empty($_POST["id_kelompok"]) || !empty($_POST["pass"]) || !empty($_POST["username"])) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];

        $query = "SELECT * FROM kelompok 
        WHERE username='$username' AND pass='$pass'";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // var_dump($row);
            // return;


            $_SESSION["id_kelompok"] = $row['id_kelompok'];
            $_SESSION["username"] = $username;
            $_SESSION["nama"] = $row['nama'];
            header("Location: index.php");
        } else {
            $error = urlencode("Username atau password salah!");
            header("Location: loginuser.php?pesan=$error");
        }

        mysqli_close($koneksi);
    } else {
        $error = urlencode("Username atau password kosong!");
        header("Location: loginuser.php?pesan=$error");
    }
}
