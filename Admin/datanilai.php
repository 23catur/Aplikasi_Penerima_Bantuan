<?php include 'koneksi.php' ?>

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
          <div class="logo-image-big"></div>
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
                <h4 class="card-title">Nilai Penerima Bantuan ALSINTAN</h4>
              </div>
              <div class="card-body">
                <div class="col-md-8">
                  <p>Keterangan Singkatan Kriteria : <br>
                    Terdaftar Di SIMLUHTAN : A1 <br>
                    Proposal : A2 <br>
                    History Penerimaan Sebelumnya : A3 <br>
                    Luas Lahan : A4 <br>
                    Lokasi Pertanian : A5 <br>
                    Sumber Air : A6 <br>
                  </p>
                </div>
                <div class="input-group col-md-3 ml-auto">
                  <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control" placeholder="Cari...">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <div class="table-responsive">
                  <table class="table" id="dataTable">
                    <thead class=" text-primary">
                      <th class="text-center">No</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Kelompok Tani</th>
                      <th class="text-center">Jenis Bantuan Yang Diajukan</th>
                      <th class="text-center">Jenis Akomodasi</th>
                      <th class="text-center">A1</th>
                      <th class="text-center">A2</th>
                      <th class="text-center">A3</th>
                      <th class="text-center">A4</th>
                      <th class="text-center">A5</th>
                      <th class="text-center">A6</th>
                      <th class="text-center">Proposal</th>
                      <th class="text-center">Status</th>
                    </thead>
                    <tbody class="text-center">
                      <?php $nomor = 1; ?>
                      <?php $ambil = $koneksi->query("SELECT * FROM kelompok JOIN nilai_kelompok ON kelompok.id_kelompok=nilai_kelompok.id_kelompok ORDER BY id_nilai ASC"); ?>
                      <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $nomor; ?></td>
                          <td><?php echo $pecah['ktp']; ?></td>
                          <td><?php echo $pecah['kelompok_tani']; ?></td>
                          <td><?php echo $pecah['jenis_bantuan']; ?></td>
                          <td><?php echo $pecah['akomodasi']; ?></td>
                          <td><?php echo $pecah['a1']; ?></td>
                          <td><?php echo $pecah['a2']; ?></td>
                          <td><?php echo $pecah['a3']; ?></td>
                          <td><?php echo $pecah['a4']; ?></td>
                          <td><?php echo $pecah['a5']; ?></td>
                          <td><?php echo $pecah['a6']; ?></td>
                          <td><a href="../proposal/<?php echo $pecah['proposal']; ?>" target="_blank"><?php echo $pecah['proposal']; ?></a></td>
                          <td>
                            <?php if ($pecah['status'] == 'Terverifikasi') { ?>
                              <button type="button" class="btn btn-success btn-round">Terverifikasi</button>
                            <?php } else { ?>
                              <form method="POST" action="updatestatus.php">
                                <input type="hidden" name="ktp" value="<?php echo $pecah['ktp']; ?>">
                                <input type="hidden" name="status" value="Terverifikasi">
                                <button type="submit" class="btn btn-warning btn-round" onclick="return confirmVerifikasi();">Belum Verifikasi</button>
                              </form>
                            <?php } ?>
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

  <script>
    function confirmVerifikasi() {
      return confirm('Apakah Anda yakin ingin memverifikasi data ini?');
    }
    function searchTable() {
      var input = document.getElementById("searchInput");
      var filter = input.value.toLowerCase();
      var table = document.getElementById("dataTable");
      var tr = table.getElementsByTagName("tr");

      for (var i = 1; i < tr.length; i++) {
        var tdArray = tr[i].getElementsByTagName("td");
        var match = false;
        for (var j = 0; j < tdArray.length; j++) {
          var td = tdArray[j];
          if (td) {
            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
              match = true;
              break;
            }
          }
        }
        if (match) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>
</body>

</html>