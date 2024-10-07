<?php include 'koneksi.php' ?>

<?php
$ambil = $koneksi->query("SELECT * FROM nilai_kelompok JOIN kelompok ON nilai_kelompok.id_kelompok = kelompok.id_kelompok WHERE id_nilai='$_GET[id]'");
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
          <li class="active ">
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
                <h4 class="card-title">Ubah Data Nilai Kelompok Tani</h4>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="ktp" required value="<?php echo $pecah['ktp']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Kelompok Tani</label>
                        <input type="text" class="form-control" name="kelompok_tani" required value="<?php echo $pecah['kelompok_tani']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Jenis Bantuan Yang Diajukan</label>
                        <input type="text" class="form-control" name="jenis_bantuan" required value="<?php echo $pecah['jenis_bantuan']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Komoditi</label>
                        <input type="text" class="form-control" name="komoditi" required value="<?php echo $pecah['komoditi']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Terdaftar di SIMLUHTAN</label>
                        <input type="number" class="form-control" name="a1" required value="<?php echo $pecah['a1']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Luas Lahan</label>
                        <input type="number" class="form-control" name="a2" required value="<?php echo $pecah['a2']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Riwayat Terima Bantuan</label>
                        <input type="number" class="form-control" name="a3" required value="<?php echo $pecah['a3']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Sumber Air</label>
                        <input type="number" class="form-control" name="a4" required value="<?php echo $pecah['a4']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Lokasi</label>
                        <input type="number" class="form-control" name="a5" required value="<?php echo $pecah['a5']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Proposal</label>
                        <input type="file" class="form-control" name="proposal">
                        <?php if (!empty($pecah['proposal'])): ?>
                          <p>Proposal: <a href="../proposal/<?php echo $pecah['proposal']; ?>" target="_blank"><?php echo $pecah['proposal']; ?></a></p>
                        <?php endif; ?>
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
                  if (isset($_FILES['proposal']) && $_FILES['proposal']['error'] == 0) {
                    $targetDirectory = "../proposal/";
                    $targetFile = $targetDirectory . basename($_FILES['proposal']['name']);
                    $uploadOk = 1;
                    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                    $allowedTypes = array('pdf');
                    if (!in_array($fileType, $allowedTypes)) {
                      echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
                      $uploadOk = 0;
                    }

                    if ($uploadOk == 1) {
                      if (move_uploaded_file($_FILES['proposal']['tmp_name'], $targetFile)) {
                        $proposalFileName = basename($_FILES['proposal']['name']);
                        $koneksi->query("UPDATE nilai_kelompok 
                                        SET a1='$_POST[a1]', a2='$_POST[a2]', a3='$_POST[a3]', a4='$_POST[a4]', a5='$_POST[a5]', 
                                        proposal='$proposalFileName', jenis_bantuan='$_POST[jenis_bantuan]', kelompok_tani='$_POST[kelompok_tani]', komoditi='$_POST[komoditi]', ktp='$_POST[ktp]' 
                                        WHERE id_nilai='$_GET[id]'");

                        echo "<script>alert('Data Nilai telah berhasil Diubah!');</script>";
                        echo "<script>location='datanilai.php';</script>";
                      } else {
                        echo "Sorry, there was an error uploading your file.";
                      }
                    }
                  } else {
                    $koneksi->query("UPDATE nilai_kelompok 
                                SET a1='$_POST[a1]', a2='$_POST[a2]', a3='$_POST[a3]', a4='$_POST[a4]', a5='$_POST[a5]', 
                                jenis_bantuan='$_POST[jenis_bantuan]', kelompok_tani='$_POST[kelompok_tani]', komoditi='$_POST[komoditi]', ktp='$_POST[ktp]' 
                                WHERE id_nilai='$_GET[id]'");

                    echo "<script>alert('Data Nilai telah berhasil Diubah!');</script>";
                    echo "<script>location='datanilai.php';</script>";
                  }
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