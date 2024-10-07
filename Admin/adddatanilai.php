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
          <li class="active ">
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
          <li>
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
              <p>Hasil Perhitungan</p>
            </a>
          </li>
          <li>
            <a href="./riwayat.php">
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
                <h4 class="card-title">Menambahkan Data Nilai Mahasiswa</h4>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" required placeholder="Isi dengan nama mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Teknik Elektro (a1)</label>
                        <input type="text" class="form-control" name="a1" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Teknologi Informasi (a2)</label>
                        <input type="text" class="form-control" name="a2" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Ilmu Komputer (a3)</label>
                        <input type="text" class="form-control" name="a3" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Cyber Security (a4)</label>
                        <input type="text" class="form-control" name="a4" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Mobile Programming (b1)</label>
                        <input type="text" class="form-control" name="b1" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Web Programming (b2)</label>
                        <input type="text" class="form-control" name="b2" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Administrasi Database (b3)</label>
                        <input type="text" class="form-control" name="b3" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Cyber Security (b4)</label>
                        <input type="text" class="form-control" name="b4" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Internet Of Thing (IoT) (b5)</label>
                        <input type="text" class="form-control" name="b5" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Jaringan Komputer (b6)</label>
                        <input type="text" class="form-control" name="b6" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Big Data (b7)</label>
                        <input type="text" class="form-control" name="b7" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Machine Learning (b8)</label>
                        <input type="text" class="form-control" name="b8" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Manajemen Teknologi Informasi (b9)</label>
                        <input type="text" class="form-control" name="b9" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Software Engineering (b10)</label>
                        <input type="text" class="form-control" name="b10" required placeholder="Isi nilai mahasiswa...">
                      </div>
                      <div class="form-group">
                        <label>Rekayasa Perangkat Lunak (b11)</label>
                        <input type="text" class="form-control" name="b11" required placeholder="Isi nilai mahasiswa...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button class="btn btn-primary btn-round" name="save">Simpan</button>
                    </div>
                  </div>
                </form>

                <?php
                if (isset($_POST['save'])) {
                  $koneksi->query("INSERT INTO nilai_mahasiswa(nama_mahasiswa, a1, a2, a3, a4, b1, b2, b3, b4, b5, b6, b7, b8, b9, b10, b11) 
                        VALUES('$_POST[nama]','$_POST[a1]','$_POST[a2]','$_POST[a3]','$_POST[a4]','$_POST[b1]','$_POST[b2]','$_POST[b3]','$_POST[b4]','$_POST[b5]','$_POST[b6]','$_POST[b7]','$_POST[b8]','$_POST[b9]','$_POST[b10]','$_POST[b11]')");
                  echo "<div class='alert alert-info'>Data Tersimpan</div>";
                  echo "<meta http-equiv='refresh' content='1;url=datanilai.php'>";
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