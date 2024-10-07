<?php include 'koneksi.php' ?>

<?php
$ambil = $koneksi->query("SELECT * FROM bantuan WHERE id_bantuan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

?>

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
          <li class="active ">
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
                <h4 class="card-title">Ubah Data Bantuan ALSINTAN</h4>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Bantuan</label>
                        <input type="text" class="form-control" name="jenis" required value="<?php echo $pecah['jenis']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Jumlah Unit</label>
                        <input type="number" class="form-control" name="jumlah" required value="<?php echo $pecah['jumlah']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" value="<?php echo $pecah['foto']; ?>"><br><img src="../foto_bantuan/<?php echo $pecah['foto']; ?>" width="100" height="100">
                      </div>
                      <div class="form-group">
                        <label>Spesifikasi Bantuan</label>
                        <input type="text" class="form-control" name="spesifikasi" required value="<?php echo $pecah['spesifikasi']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button class="btn btn-primary btn-round" name="ubah">Simpan</button>
                    </div>
                  </div>
                </form>

                <?php
                if (isset($_POST['ubah'])) {
                  $namafoto = $_FILES['foto']['name'];
                  $lokasifoto = $_FILES['foto']['tmp_name'];
                  if (!empty($lokasifoto)) {
                    move_uploaded_file($lokasifoto, "../foto_bantuan/$namafoto");
                    $koneksi->query("UPDATE bantuan SET jenis='$_POST[jenis]',jumlah='$_POST[jumlah]',spesifikasi='$_POST[spesifikasi]',foto='$namafoto' WHERE id_bantuan='$_GET[id]'");
                  } else {
                    $koneksi->query("UPDATE bantuan SET jenis='$_POST[jenis]',jumlah='$_POST[jumlah]',spesifikasi='$_POST[spesifikasi]' WHERE id_bantuan='$_GET[id]'");
                  }
                  echo "<script>alert('Data Bantuan ALSINTAN berhasil Dibuah');</script>";
                  echo "<script>location='bantuan.php';</script>";
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