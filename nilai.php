<?php include 'koneksi2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header.php'; ?>
    <style>
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .info-group h3 {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .course-category.img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/latar.jpg'); background-size: cover; background-position: center center; height: 50vh;">
        <div class="overlay" style="background: rgba(0, 0, 0, 0.6);"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Nilai <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread" style="margin-top: -50px; padding: 110px;transform: translateY(-60px);">Nilai</h1>
                </div>
            </div>
        </div>
    </section>
    <br><br>

    <?php
    $id_kelompok = $_SESSION["id_kelompok"];

    $ambil = $koneksi->query("SELECT * FROM nilai_kelompok JOIN kelompok ON nilai_kelompok.id_kelompok='$id_kelompok' AND kelompok.id_kelompok='$id_kelompok'");

    $statusQuery = $koneksi->query("SELECT status FROM nilai_kelompok WHERE id_kelompok = '$id_kelompok'");
    $statusData = $statusQuery->fetch_assoc();

    if ($statusData) {
        $status = $statusData['status'];
    } else {
        $status = 'Status tidak tersedia';  
    }
    ?>

    <?php while ($pecah = $ambil->fetch_assoc()) { ?>

        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading"></span>
                <h2 class="mb-4">Nilai Penerima</h2>
                <h3 class="mb-4"><?php echo $pecah['nama']; ?></h3>
                <h4 class="mb-4"><?php echo $pecah['kelompok_tani']; ?></h4>
            </div>
        </div>

        <div class="row justify-content-center pb-4">
            <p><a href="hitung.php" name="save" class="btn btn-primary">Hitung Profile Matching</a></p>
        </div>

        <br><br> <br><br>
        <br><br> <br><br>
        <br><br> <br><br>
        <br><br> <br><br>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="login-wrap p-1 p-md-10 text-center">
                        <div class="col-md-12">
                            <a class="course-category img d-flex align-items-center justify-content-center mx-auto"
                                style="background-image: url(images/tani1.png); background-size: cover; background-position: center; width: 200px; height: 200px; border-radius: 50%; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease;">
                            </a>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="info-group">
                                <h3><i class="fa fa-check-circle" style="color: #27ae60; margin-right: 8px;"></i> Terdaftar SIMLUHTAN: <?php echo $pecah['a1']; ?></h3>
                                <h3><i class="fa fa-tree" style="color: #2980b9; margin-right: 8px;"></i> Luas Lahan: <?php echo $pecah['a4']; ?></h3>
                                <h3><i class="fa fa-history" style="color: #8e44ad; margin-right: 8px;"></i> Riwayat Terima Bantuan: <?php echo $pecah['a3']; ?></h3>
                                <h3><i class="fa fa-water" style="color: #16a085; margin-right: 8px;"></i> Sumber Air: <?php echo $pecah['a6']; ?></h3>
                                <h3><i class="fa fa-map-marker-alt" style="color: #e74c3c; margin-right: 8px;"></i> Lokasi Lahan: <?php echo $pecah['a5']; ?></h3>
                                <h3><i class="fa fa-file" style="color: #f39c12; margin-right: 8px;"></i> Proposal: <?php echo $pecah['a2']; ?></h3>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <h4 style="font-size: 1.5rem; font-weight: 600; color: #FFFFFFFF;">
                                <span class="badge" style="background-color: #e74c3c; padding: 10px 20px; border-radius: 30px; font-size: 1rem; animation: pulse 1.5s infinite;">
                                    Status Data Anda: <?php echo ($status); ?>
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </section>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/loader.php'; ?>

        <script>
            document.querySelector("form").addEventListener("submit", function() {
                document.querySelector("button[name='save']").disabled = true;
            });
        </script>
</body>

</html>
