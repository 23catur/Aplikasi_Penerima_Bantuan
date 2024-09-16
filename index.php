<?php include 'koneksi2.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/header.php' ?>
</head>

<body>
  <?php include 'includes/navbar.php' ?>

  <div class="hero-wrap js-fullheight" style="position: relative; height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

    <div class="container" style="position: relative; z-index: 2; max-width: 800px;">
      <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-md-12 ftco-animate" style="color: #000;">
          <span class="subheading" style="display: block; font-size: 1.2em; margin-bottom: 10px; color: #fff;">Welcome to Sistem Penerima Bantuan</span>
          <h1 class="mb-4" style="font-size: 2.5em; color: #000;">Sistem Pendukung Keputusan Penerima Bantuan ALSINTAN</h1>
          <p class="caps" style="font-size: 1.1em; margin-bottom: 20px; color: #fff;">Sistem Pendukung Keputusan Penerima Bantuan Alat dan Mesin Pertanian, solusi tepat guna mendukung produktivitas pertanian melalui evaluasi berbasis data yang transparan dan akurat.</p>
          <p class="mb-0">
            <a href="listdospem.php" class="btn btn-primary" style="margin-right: 10px;">List Bantuan ALSINTAN</a>
            <?php if (!isset($_SESSION["id_mahasiswa"])) { ?>
              <a href="#" class="btn btn-white" id="loginButton">Register</a>
            <?php } ?>
          </p>
        </div>
      </div>
    </div>

    <div class="background-image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('images/latar.jpg'); background-size: cover; background-position: center; z-index: 0;"></div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container" style="position: relative; z-index: 3;">
      <div class="row">
        <div class="col-md-12">
          <div class="login-wrap p-1 p-md-5" id="registerForm" style="display: none; position: fixed; top: 70%; right: 5%; width: 400px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.3); z-index: 4;">
            <h3 class="mb-4 text-center">Register Now</h3>
            <form method="post" enctype="multipart/form-data" class="signup-form">
              <div class="form-group">
                <label class="label" for="nama">Full Name</label>
                <input type="text" name="nama" required class="form-control" placeholder="John Doe">
              </div>
              <div class="form-group">
                <label class="label" for="email">Email Address</label>
                <input type="email" name="email" required class="form-control" placeholder="johndoe@gmail.com">
              </div>
              <div class="form-group">
                <label class="label" for="username">Username</label>
                <input name="username" required type="text" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                <label class="label" for="pass">Password</label>
                <input name="pass" required type="password" class="form-control" placeholder="Password">
              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button class="btn btn-primary btn-round" name="simpan">Simpan</button>
                </div>
              </div>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
              $koneksi->query("INSERT INTO kelompok(nama, email, username, pass) 
                        VALUES('$_POST[nama]','$_POST[email]','$_POST[username]','$_POST[pass]')");
              echo "<div class='alert alert-info'>Data Tersimpan</div>";
              echo "<meta http-equiv='refresh' content='1;url=loginuser.php'>";
            }
            ?>
            <p class="text-center" style="color: black;">Already have an account? <a href="loginuser.php">Log In</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.getElementById('loginButton').addEventListener('click', function() {
      var registerForm = document.getElementById('registerForm');
      if (registerForm.style.display === 'none') {
        registerForm.style.display = 'block';
      } else {
        registerForm.style.display = 'none';
      }
    });
  </script>



  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">List Kriteria Penilaian</span>
          <h2 class="mb-4">Kriteria Penerima Bantuan ALSINTAN</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-3 col-lg-2 text-center">
          <a class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(images/terdaftar.png);">
          </a>
          <h3 style="font-weight: bold; color: black; font-size: 20px; margin-top: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Terdaftar</br>SIMLUHTAN</h3>
        </div>
        <div class="col-md-3 col-lg-2 text-center">
          <a class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(images/luas.png); height: 150px;">
          </a>
          <h3 style="font-weight: bold; color: black; font-size: 20px; margin-top: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Luas Lahan</h3>
        </div>
        <div class="col-md-3 col-lg-2 text-center">
          <a class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(images/histori.png);">
          </a>
          <h3 style="font-weight: bold; color: black; font-size: 20px; margin-top: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Riwayat</br>Terima</br>Bantuan</h3>
        </div>
        <div class="col-md-3 col-lg-2 text-center">
          <a class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(images/air.png); height: 150px;">
          </a>
          <h3 style="font-weight: bold; color: black; font-size: 20px; margin-top: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Sumber Air</h3>
        </div>
        <div class="col-md-3 col-lg-2 text-center">
          <a class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(images/lokasi.png);">
          </a>
          <h3 style="font-weight: bold; color: black; font-size: 20px; margin-top: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Lokasi Lahan</h3>
        </div>
        <div class="col-md-3 col-lg-2 text-center">
          <a class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(images/proposal.png); height: 150px;">
          </a>
          <h3 style="font-weight: bold; color: black; font-size: 20px; margin-top: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Proposal</h3>
        </div>
        <div class="col-md-12 text-center mt-5">
          <a href="listbantuan.php" class="btn btn-secondary">Lihat Semua Bantuan ALSINTAN</a>
        </div>
      </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">List Bantuan ALSINTAN</span>
          <h2 class="mb-4">Pilih Bantuan ALSINTAN</h2>
        </div>
      </div>

      <div class="row">
        <?php $ambil = $koneksi->query("SELECT * FROM bantuan ORDER BY id_bantuan ASC"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
          <div class="col-md-4 ftco-animate">
            <div class="project-wrap">
              <a href="detailbantuan.php?id=<?php echo $pecah["id_bantuan"] ?>" class="img" style="background-image: url(foto_bantuan/<?php echo $pecah['foto']; ?>)">
                <span class="price">Bantuan ALSINTAN</span>
              </a>
              <div class="text p-4">
                <h3><a href="detailbantuan.php?id=<?php echo $pecah["id_bantuan"] ?>"><?php echo $pecah['jenis']; ?></a></h3>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    </div>
    </div>
  </section>

  <section class="contact-section" style="padding: 60px 0; background-color: #f0f4f8;">
    <div class="container" style="max-width: 1200px; margin: auto;">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center mb-5">
          <h2 class="section-title" style="font-size: 32px; font-weight: bold; color: #333;">Hubungi Kami</h2>
          <p style="font-size: 18px; color: #777; line-height: 1.7;">
            Kami siap mendengar masukan, kritik, atau saran dari Anda untuk terus meningkatkan pelayanan kami. Jangan ragu untuk menghubungi kami melalui kontak di bawah ini.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="info-box" style="display: flex; align-items: center; margin-bottom: 30px; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div class="icon" style="font-size: 28px; color: #007bff; margin-right: 15px;">
              <i class="icon-map-marker"></i>
            </div>
            <div class="info-content">
              <h5 style="margin-bottom: 5px; font-size: 18px; color: #333;">Telepon</h5>
              <p style="margin: 0; font-size: 16px; color: #555;">(0411) 21037</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-box" style="display: flex; align-items: center; margin-bottom: 30px; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div class="icon" style="font-size: 28px; color: #007bff; margin-right: 15px;">
              <i class="icon-instagram"></i>
            </div>
            <div class="info-content">
              <h5 style="margin-bottom: 5px; font-size: 18px; color: #333;">Instagram</h5>
              <p style="margin: 0; font-size: 16px;"><a href="https://www.instagram.com/dinaspertanian_kab.bone" target="_blank" style="color: #007bff; text-decoration: none;">@dinaspertanian_kab.bone</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-box" style="display: flex; align-items: center; margin-bottom: 30px; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div class="icon" style="font-size: 28px; color: #007bff; margin-right: 15px;">
              <i class="icon-facebook"></i>
            </div>
            <div class="info-content">
              <h5 style="margin-bottom: 5px; font-size: 18px; color: #333;">Facebook</h5>
              <p style="margin: 0; font-size: 16px;"><a href="https://www.facebook.com/profile.php?id=100078470933838" target="_blank" style="color: #007bff; text-decoration: none;">Dinas TPHP Kab. Bone</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-lg-12">
          <div style="width: 100%; height: 400px; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d320.7604354870175!2d120.32682860227726!3d-4.539927548011698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbde56e7069d955%3A0x9a7eb4dfc0c8df8c!2sDinas%20Pertanian%20Tanaman%20Pangan%2C%20Hortikultura%20Dan%20Perkebunan!5e1!3m2!1sid!2sid!4v1726057147347!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
  </section>
  <?php include 'includes/footer.php' ?>
  <?php include 'includes/loader.php' ?>
</body>

</html>