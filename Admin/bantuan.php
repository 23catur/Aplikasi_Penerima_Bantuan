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
                <h4 class="card-title">Daftar Bantuan ALSINTAN</h4>
              </div>
              <div class="card-body">
                <div class="card-body">
                  <div class="col-md-8">
                    <div class="update ml-auto mr-auto">
                      <a href="adddatabantuan.php"> <button type="submit" class="btn btn-primary btn-round">Tambah Bantuan ALSINTAN</button></a>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th class="text-center">No</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Jenis Bantuan</th>
                        <th class="text-center">Jumlah Unit</th>
                        <th class="text-center">Spesifikasi</th>
                        <th class="text-center">Aksi</th>
                      </thead>
                      <tbody class="text-center">
                        <?php $nomor = 1; ?>
                        <?php $ambil = $koneksi->query("SELECT * FROM bantuan ORDER BY id_bantuan ASC"); ?>
                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><img src="../foto_bantuan/<?php echo $pecah['foto']; ?>" width="60" height="60"></td>
                            <td><?php echo $pecah['jenis']; ?></td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td><?php echo $pecah['spesifikasi']; ?></td>
                            <td><a href="ubahdatabantuan.php?id=<?php echo $pecah["id_bantuan"] ?>"><button type="submit" class="btn btn-success btn-round"><i class="nc-icon nc-settings"></i></button></a>
                              <a href="hapusdatabantuan.php?id=<?php echo $pecah["id_bantuan"] ?>"><button type="submit" class="btn btn-danger btn-round"><i class="nc-icon nc-basket"></i></button></a>
                            </td>
                          </tr>
                          <?php $nomor++; ?>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
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