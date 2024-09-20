<?php
// session_start();
include 'includes/header.php';
include 'includes/navbar.php';

// Debugging output
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

if (isset($_SESSION['nama'])) {
    $welcomeMessage = "Halo, " . htmlspecialchars($_SESSION['nama']);
} else {
    $welcomeMessage = "Halo, Pengguna";
}
if (isset($_GET['pesan'])) {
    $mess = "<p>{$_GET['pesan']}</p>";
} else {
    $mess = "";
}
?>

<!-- 	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg'); background-size: cover; background-position: center center;">
    <div class="overlay" style="background: rgba(0, 0, 0, 0.6);"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-0 bread" style="color: #fff; font-family: 'Poppins', sans-serif;">Login User</h1>
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
                        <!-- Login Form Section -->
                        <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); background: linear-gradient(135deg, #6b73ff, #000dff);">
                                <h3 class="mb-4 text-center" style="color: #fff; font-family: 'Nunito', sans-serif;">Login User</h3>
                                <form method="POST" action="loginuserProcess.php" id="contactForm" name="contactForm" class="contactForm">
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
                                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" style="border-radius: 8px; border: 1px solid #fff;">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="login" style="border-radius: 8px; background-color: #ff6347; border: none; font-family: 'Poppins', sans-serif; transition: all 0.3s;">
                                                    Login
                                                </button>
                                                <p class="mt-3" style="color: #fff;">Admin? <a href="loginadmin.php" style="color: #ffef61;">Login berikut</a></p>
                                                <?php echo $mess; ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Image Section -->
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



<!-- Footer -->
<?php include 'includes/footer.php'; ?>
<?php include 'includes/loader.php'; ?>

</body>

</html>