<?php include 'koneksi2.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php' ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
          <li class="active ">
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
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Riwayat Perhitungan Penerima Bantuan ALSINTAN</h4>
              </div>
              <div class="card-body">
                <div class="input-group col-md-3 ml-auto">
                  <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control" placeholder="Cari...">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      <th class="text-center">No</th>
                      <th class="text-center">Tanggal Perhitungan</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Kelompok Tani</th>
                      <th class="text-center">Nilai</th>
                      <th class="text-center">Status</th>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      $nomor = 1;
                      $ambil = $koneksi->query("SELECT nilai_kelompok.ktp, hasilhitung.tanggal, nilai_kelompok.kelompok_tani, hasilhitung.hasil, hasilhitung.status 
                            FROM nilai_kelompok
                            JOIN hasilhitung ON nilai_kelompok.id_kelompok = hasilhitung.id_kelompok
                            ORDER BY hasilhitung.tanggal DESC");

                      if (!$ambil) {
                        echo "<tr><td colspan='6'>Query Error: " . $koneksi->error . "</td></tr>";
                      } else {
                        while ($pecah = $ambil->fetch_assoc()) {
                          // Mengubah status berdasarkan kondisi
                          $status = ($pecah['status'] == 'Terverifikasi') ? 'Terima Bantuan' : 'Tolak Bantuan';
                      ?>
                          <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['tanggal']; ?></td>
                            <td><?php echo $pecah['ktp']; ?></td>
                            <td><?php echo $pecah['kelompok_tani']; ?></td>
                            <td><?php echo $pecah['hasil']; ?></td>
                            <td><?php echo $status; ?></td>
                          </tr>
                      <?php $nomor++;
                        }
                      } ?>
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

  <script>
    // Fungsi pencarian tabel
    function searchTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toLowerCase();
      table = document.querySelector(".table");
      tr = table.getElementsByTagName("tr");

      for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        tdArray = tr[i].getElementsByTagName("td");

        for (var j = 0; j < tdArray.length; j++) {
          if (tdArray[j]) {
            txtValue = tdArray[j].textContent || tdArray[j].innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
              break;
            }
          }
        }
      }
    }

    $(document).ready(function() {
      demo.initChartsPages();
    });
  </script>
</body>

</html>