<?php
include 'koneksi2.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header.php' ?>
</head>

<body>
    <?php include 'includes/navbar.php' ?>


    <!-- <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Login<i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Login Admin</h1>
				</div>
			</div>
		</div>
	</section> -->

    <!-- <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4 text-center">Halaman Login Admin</h3>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="name">Username</label>
													<input type="text" class="form-control" name="username" id="username" placeholder="Username">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Password</label>
													<input type="password" class="form-control" name="password" id="password" placeholder="Password">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>

													<p class="mb-4">User? <a href="loginuser.php"> Login berikut</a></p>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<img src="images/pnup11.png" width="270px">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section> -->

    <section class="ftco-section" style="height: 100vh; display: flex; align-items: center; justify-content: center; background-image: url('images/latar.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); background: linear-gradient(135deg, #6b73ff, #000dff);">
                                    <h3 class="mb-4 text-center" style="color: #fff; font-family: 'Nunito', sans-serif;">Halaman Login Admin</h3>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="name" style="color: #fff;">Username</label>
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" style="border-radius: 8px; border: 1px solid #fff;">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject" style="color: #fff;">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="border-radius: 8px; border: 1px solid #fff;">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="login" style="border-radius: 8px; background-color: #ff6347; border: none; font-family: 'Poppins', sans-serif; transition: all 0.3s;">
                                                        Login
                                                    </button>
                                                    <p class="mt-3" style="color: #fff;">User? <a href="loginuser.php" style="color: #ffef61;">Login berikut</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap bg-light w-100 p-md-5 p-4 d-flex justify-content-center align-items-center" style="border-radius: 20px;">
                                    <img src="images/tani1.png" width="270px" style="border-radius: 8px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['login'])) {
        $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[username]' AND password = '$_POST[password]'");
        $sama = $ambil->num_rows;
        if ($sama == 1) {
            $_SESSION['admin'] = $ambil->fetch_assoc();
            echo "<div class='alert alert-info'>Login Sukses</div>";
            echo "<meta http-equiv='refresh' content='1;url=Admin/index.php'>";
        } else {
            echo "<div class='alert alert-danger'>Login Gagal</div>";
            echo "<meta http-equiv='refresh' content='1;url=loginadmin.php'>";
        }
    }
    ?>

    <?php include 'includes/footer.php' ?>
    <?php include 'includes/loader.php' ?>
</body>

</html>