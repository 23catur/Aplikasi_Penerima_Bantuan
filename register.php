<?php include 'koneksi2.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/header.php' ?>
</head>

<body>
  <?php include 'includes/navbar.php' ?>

  <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
          <span class="subheading">Welcome to StudyLab</span>
          <h1 class="mb-4">We Are Online Platform For Make Learn</h1>
          <p class="caps">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          <p class="mb-0"><a href="#" class="btn btn-primary">Our Course</a> <a href="#" class="btn btn-white">Learn More</a></p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-5 order-md-last">
          <div class="login-wrap p-4 p-md-5">
            <h3 class="mb-4">Register Now</h3>
            <form method="post" enctype="multipart/form-data" class="signup-form">
              <div class="form-group">
                <label class="label" for="nama">Full Name</label>
                <input type="text" name="nama" required class="form-control" placeholder="John Doe">
              </div>
              <div class="form-group">
                <label class="label" for="email">Email Address</label>
                <input type="text" name="email" required class="form-control" placeholder="johndoe@gmail.com">
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
            <!-- database -->
            <?php
            if (isset($_POST['simpan'])) {
              $koneksi->query("INSERT INTO kelompok(nama, email, username, pass) 
                        VALUES('$_POST[nama]','$_POST[email]','$_POST[username]','$_POST[pass]')");
              echo "<div class='alert alert-info'>Data Tersimpan</div>";
              // echo "<meta http-equiv='refresh' content='1;url=loginuser.php'>";
            }
            ?>

            <p class="text-center">Already have an account? <a href="#signin">Sign In</a></p>

          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php' ?>
  <?php include 'includes/loader.php' ?>
</body>

</html>