<?php
$koneksi = new mysqli("localhost", "root", "", "pertanian");
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <!-- Mengatur warna latar belakang tulisan menjadi merah -->
        <a class="navbar-brand" href="index.php" style="background: green; color: white; padding: 0.5rem 1rem; border-radius: 5px;">
            <span>Pasti Tani</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['id_kelompok'])) { ?>
            <li class="nav-item">
                <a class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">Halo, <?= isset($_SESSION['nama']) ? htmlspecialchars($_SESSION['nama']) : 'Pengguna' ?></a>
            </li>
        <?php } ?>

        <li class="nav-item">
            <a href="index.php" class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">Home</a>
        </li>
        <li class="nav-item">
            <a href="listbantuan.php" class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">List Bantuan ALSINTAN</a>
        </li>

        <?php if (isset($_SESSION['id_kelompok'])) { ?>
        <li class="nav-item">
            <a href="hasilseleksi.php" class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">Hasil Seleksi</a>
        </li>
            <li class="nav-item">
                <a href="inputnilai.php" class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">Input Nilai</a>
            </li>
            <li class="nav-item">
                <a href="nilai.php" class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">Lihat Nilai</a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">Logout</a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a href="loginuser.php" class="nav-link" style="color: #06290E; font-weight: bold; font-size: 1.2em;">Login</a>
            </li>
        <?php } ?>
    </ul>
</div>

    </div>
</nav>
<!-- END nav -->
