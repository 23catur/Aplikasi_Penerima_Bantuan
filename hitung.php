<?php include 'koneksi2.php';

if (isset($_SESSION['user'])) {
  $id_kelompok = $_SESSION["id_kelompok"];
  $ambil = $koneksi->query("SELECT * from nilai_kelompok,kelompok WHERE nilai_kelompok.id_kelompok='$id_kelompok' and kelompok.id_kelompok='$id_kelompok'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/header.php' ?>
</head>

<body>
  <?php include 'includes/navbar.php' ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/latar.jpg'); background-size: cover; background-position: center center; height: 50vh;">
    <div class="overlay" style="background: rgba(0, 0, 0, 0.6);"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="listbantuan.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hitung Profile Matching <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread" style="margin-top: -10px; padding: 60px;transform: translateY(-30px);">Proses Profile Matching</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Proses Perhitungan</span>
          <h2 class="mb-4">Data Nilai Penerima Bantuan ALSINTAN</h2>
        </div>
      </div>

      <div class="row">
        <div class="table-responsive">
          <table class="table">
            <p style="border:2px solid Tomato;" class="breadcrumbs text-center">Nilai Kriteria Penerima ALSINTAN</p>
            <thead class=" text-primary">
              <th class="text-center">No</th>
              <th class="text-center">Kriteria</th>
              <th class="text-center">Bobot Nilai</th>
            </thead>
            <tbody class="text-center">
              <?php $nomor = 1; ?>
              <?php $ambil = $koneksi->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC"); ?>
              <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $pecah['nama_kriteria']; ?></td>
                  <td><?php echo $pecah['bobot_nilai']; ?></td>
                </tr>
                <?php $nomor++; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="table-responsive">
          <table class="table">
            <p style="border:2px solid Tomato;" class="breadcrumbs text-center">Mencari GAP</p>
            <thead class=" text-primary">
              <th class="text-center">No</th>
              <th class="text-center">Kriteria</th>
              <th class="text-center">Nilai GAP</th>
            </thead>
            <tbody class="text-center">

              <?php
              $nomor = 1;
              $gaps = [];
              $id_kelompok = $_SESSION["id_kelompok"];
              $ambil = $koneksi->query("SELECT * FROM kriteria, nilai_kelompok WHERE id_kelompok='$id_kelompok' ORDER BY id_kriteria ASC");

              while ($pecah = $ambil->fetch_assoc()) {
                $id_kriteria = $pecah['id_kriteria'];
                $bobot_nilai = floatval($pecah['bobot_nilai']);

                $gap = 0;

                if ($id_kriteria == 1) {
                  $gap = floatval($pecah['a1'] - $bobot_nilai);
                } elseif ($id_kriteria == 2) {
                  $gap = floatval($pecah['a2'] - $bobot_nilai);
                } elseif ($id_kriteria == 3) {
                  $gap = floatval($pecah['a3'] - $bobot_nilai);
                } elseif ($id_kriteria == 4) {
                  $gap = floatval($pecah['a4'] - $bobot_nilai);
                } elseif ($id_kriteria == 5) {
                  $gap = floatval($pecah['a5'] - $bobot_nilai);
                } elseif ($id_kriteria == 6) {
                  $gap = floatval($pecah['a6'] - $bobot_nilai);
                }

                $gaps[$id_kriteria] = $gap;

              ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $pecah['nama_kriteria']; ?></td>
                  <td><?php echo $gap; ?></td>
                </tr>
              <?php
                $nomor++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="table-responsive">
          <table class="table">
            <p style="border:2px solid Tomato;" class="breadcrumbs text-center">Mencari Nilai Bobot</p>
            <thead class="text-primary">
              <th class="text-center">No</th>
              <th class="text-center">Kriteria</th>
              <th class="text-center">Nilai Bobot</th>
            </thead>
            <tbody class="text-center">
              <?php
              $nomor = 1;

              function calculateWeight($gap)
              {
                switch ($gap) {
                  case 0:
                    return 5;
                  case 1:
                    return 4.5;
                  case -1:
                    return 4;
                  case 2:
                    return 3.5;
                  case -2:
                    return 3;
                  case 3:
                    return 2.5;
                  case -3:
                    return 2;
                  case 4:
                    return 1.5;
                  case -4:
                    return 1;
                  default:
                    return "-";
                }
              }

              $ambil = $koneksi->query("SELECT * FROM kriteria, nilai_kelompok WHERE id_kelompok='$id_kelompok' ORDER BY id_kriteria ASC");

              $nilaiBobotList = [];

              while ($pecah = $ambil->fetch_assoc()) {
                $id_kriteria = $pecah['id_kriteria'];

                $gap = isset($gaps[$id_kriteria]) ? $gaps[$id_kriteria] : 0;

                $nilai_bobot = calculateWeight($gap);
                $nilaiBobotList[$id_kriteria] = $nilai_bobot;

              ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $pecah['nama_kriteria']; ?></td>
                  <td><?php echo $nilai_bobot; ?></td>
                </tr>
              <?php
                $nomor++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="table-responsive">
          <table class="table">
            <p style="border:2px solid Tomato;" class="breadcrumbs text-center">Mencari Hasil Perhitungan</p>
            <thead class="text-primary">
              <th class="text-center">Nomor</th>
              <th class="text-center">Kriteria</th>
              <th class="text-center">Core Factory</th>
              <th class="text-center">Secondary Factory</th>
            </thead>
            <tbody class="text-center">
              <?php
              $totalCoreFactory = 0;
              $totalSecondaryFactory = 0;
              $countCore = 0;
              $countSecondary = 0;

              $ambil = $koneksi->query("SELECT * FROM kriteria, nilai_kelompok WHERE id_kelompok='$id_kelompok' ORDER BY id_kriteria ASC");
              $nomor = 1;

              while ($pecah = $ambil->fetch_assoc()) {
                $id_kriteria = $pecah['id_kriteria'];
                $nilai_bobot = isset($nilaiBobotList[$id_kriteria]) ? $nilaiBobotList[$id_kriteria] : 0;

                $tampilkan_di_core = in_array($id_kriteria, [1, 2, 3, 4]);
                $tampilkan_di_secondary = in_array($id_kriteria, [5, 6]);

              ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $pecah['nama_kriteria']; ?></td>
                  <td><?php echo $tampilkan_di_core ? number_format($nilai_bobot) : '-'; ?></td>
                  <td><?php echo $tampilkan_di_secondary ? number_format($nilai_bobot) : '-'; ?></td>
                </tr>

              <?php
                if ($tampilkan_di_core) {
                  $totalCoreFactory += $nilai_bobot;
                  $countCore++;
                }
                if ($tampilkan_di_secondary) {
                  $totalSecondaryFactory += $nilai_bobot;
                  $countSecondary++;
                }
                $nomor++;
              }
              $averageCoreFactory = ($countCore > 0) ? $totalCoreFactory / $countCore : 0;
              $averageSecondaryFactory = ($countSecondary > 0) ? $totalSecondaryFactory / $countSecondary : 0;
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2" class="text-center">Total</th>
                <th class="text-center"><?php echo number_format($totalCoreFactory, 2); ?></th>
                <th class="text-center"><?php echo number_format($totalSecondaryFactory, 2); ?></th>
              </tr>
              <tr>
                <th colspan="2" class="text-center">Rata-rata</th>
                <th class="text-center"><?php echo number_format($averageCoreFactory, 2); ?></th>
                <th class="text-center"><?php echo number_format($averageSecondaryFactory, 2); ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>


      <div class="row">
        <div class="table-responsive">
          <table class="table">
            <p style="border:2px solid Tomato;" class="breadcrumbs text-center">Hasil Perhitungan</p>
            <thead class="text-primary">
              <th class="text-center">Core Factory</th>
              <th class="text-center">Secondary Factory</th>
              <th class="text-center">Hasil Akhir</th>
            </thead>
            <tbody class="text-center">
              <?php
              $totalRank = 0;
              $count = 0;

              $ambil = $koneksi->query("SELECT * FROM nilai_kelompok WHERE id_kelompok='$id_kelompok'");

              while ($pecah = $ambil->fetch_assoc()) {
                $cf1 = $averageCoreFactory;
                $cf2 = $averageSecondaryFactory;

                $core = $cf1 * 0.60;
                $secondary = $cf2 * 0.40;

                $rank = $core + $secondary;

                $totalRank += $rank;
                $count++;

                $cek_hasil = $koneksi->query("SELECT * FROM hasilhitung WHERE id_kelompok='$id_kelompok'");
                if ($cek_hasil->num_rows == 0) {
                  date_default_timezone_set('Asia/Jakarta');
                  $tanggal = date("Y-m-d H:i");
                  $koneksi->query("INSERT INTO hasilhitung(id_kelompok, hasil, tanggal, status) 
     VALUES('$id_kelompok', '$rank', '$tanggal', 'belum verifikasi')");

                } else {
                  // echo "<div class='alert alert-info'>Data untuk id_kelompok ini sudah ada, tidak akan di-insert lagi.</div>";
                }
              }

              $averageRank = ($count > 0) ? $totalRank / $count : 0;
              ?>

              <tr>
                <td><?php echo number_format($core, 2); ?></td>
                <td><?php echo number_format($secondary, 2); ?></td>
                <td><?php echo number_format($averageRank, 2); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    </div>
    </div>
  </section>

  <?php include 'includes/footer.php' ?>
  <?php include 'includes/loader.php' ?>

</body>

</html>