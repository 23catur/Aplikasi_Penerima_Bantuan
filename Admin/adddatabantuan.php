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
                <h4 class="card-title">Tambah Data Bantuan</h4>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Bantuan</label>
                        <input type="text" class="form-control" name="jenis" required placeholder="Isi Jenis Bantuan...">
                      </div>
                      <div class="form-group">
                        <label>Jumlah Unit</label>
                        <input type="number" class="form-control" name="jumlah" required placeholder="Isi Jumlah Unit...">
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" required onchange="previewImage(event)">
                        <img id="file-preview" src="" alt="Isi Foto Bantuan" style="margin-top:10px; max-width:150px; max-height:150px; height:auto;">
                      </div>

                      <script>
                        function previewImage(event) {
                          var reader = new FileReader();
                          reader.onload = function() {
                            var output = document.getElementById('file-preview');
                            output.src = reader.result;
                          };
                          reader.readAsDataURL(event.target.files[0]);
                        }
                      </script>

                      <div class="form-group">
                        <label>Spesifikasi Bantuan</label>
                        <input type="text" class="form-control" name="spesifikasi" required placeholder="Isi Spesifikasi Bantuan">
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
                  $nama = $_FILES['foto']['name'];
                  $lokasi = $_FILES['foto']['tmp_name'];
                  move_uploaded_file($lokasi, "../foto_bantuan/" . $nama);
                  $koneksi->query("INSERT INTO bantuan(jenis, jumlah, spesifikasi, foto) 
                      VALUES('$_POST[jenis]','$_POST[jumlah]','$_POST[spesifikasi]', '$nama')");
                  echo "<div class='alert alert-info'>Data Tersimpan</div>";
                  echo "<meta http-equiv='refresh' content='1;url=bantuan.php'>";
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