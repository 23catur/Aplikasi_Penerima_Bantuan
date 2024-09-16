<?php include 'koneksi.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php' ?>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.instagram.com/dinaspertanian_kab.bone/" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../images/tani1.png" width="50px">
          </div>
        </a>
        <a href="index.php" class="simple-text logo-normal">
          Bantuan ALSINTAN
          <div class="logo-image-big">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./bantuan.php">
              <i class="nc-icon nc-chart-pie-36"></i>
              <p>Data ALSINTAN</p>
            </a>
          </li>
          <li class="active ">
            <a href="./kriteria.php">
              <i class="nc-icon nc-chart-pie-36"></i>
              <p>Data Kriteria</p>
            </a>
          </li>
          <li>
            <a href="./datanilai.php">
              <i class="nc-icon nc-user-run"></i>
              <p>Data Kelompok Tani</p>
            </a>
          </li>
          <li>
            <a href="./hasil.php">
              <i class="nc-icon nc-box"></i>
              <p>Riwayat Perhitungan</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./logout.php">
              <i class="nc-icon nc-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <?php include 'includes/navbar.php' ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tambah Data Kriteria</h4>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria" required placeholder="Isi nama kriteria...">
                      </div>
                      <div class="form-group">
                        <label>Bobot Nilai</label>
                        <input type="number" class="form-control" name="bobot_nilai" required placeholder="Berisi angka 1-5">
                      </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button class="btn btn-primary btn-round" name="save">Simpan</button>
                    </div>
                  </div>
                </form>

                <!-- database -->
                <?php
                if (isset($_POST['save'])) {
                  $koneksi->query("INSERT INTO kriteria(nama_kriteria, bobot_nilai) 
                        VALUES ('" . $_POST['nama_kriteria'] . "', '" . $_POST['bobot_nilai'] . "')");

                  // Menampilkan pesan konfirmasi
                  echo "<div class='alert alert-info'>Data Tersimpan</div>";

                  // Redirect otomatis setelah 1 detik
                  echo "<meta http-equiv='refresh' content='1;url=kriteria.php'>";
                }
                ?>


              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'includes/footer.php' ?>
    </div>
  </div>
  <?php include 'includes/script.php' ?>
</body>

</html>