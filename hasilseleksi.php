<?php include 'koneksi2.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header.php'; ?>
    <style>
        .hero-wrap {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .img {
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }

        .img:hover {
            transform: scale(1.1);
        }

        .badge {
            padding: 8px 15px;
            font-size: 1em;
            border-radius: 50px;
            color: white;
            display: inline-block;
            margin-top: 10px;
            max-width: 450px;
            word-wrap: break-word;
            white-space: normal;
            text-align: center;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .badge-default {
            background-color: #6c757d;
        }


        h3 {
            color: #333;
            margin: 10px 0;
        }

        .ftco-section {
            padding: 4em 0;
        }

        @media (max-width: 768px) {
            .badge {
                font-size: 0.9em;
                padding: 6px 12px;
            }
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
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Hasil Seleksi <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread" style="margin-top: -50px; padding: 110px;transform: translateY(-60px);">Hasil Seleksi</h1>
                </div>
            </div>
        </div>
    </section>
    <br><br>

    <?php
    $id_kelompok = $_SESSION["id_kelompok"];

    $ambil = $koneksi->query("SELECT * FROM nilai_kelompok JOIN kelompok ON nilai_kelompok.id_kelompok='$id_kelompok' AND kelompok.id_kelompok='$id_kelompok'");

    $statusQuery = $koneksi->query("SELECT status FROM hasilhitung WHERE id_kelompok = '$id_kelompok'");
    $statusData = $statusQuery->fetch_assoc();

    if ($statusData) {
        $status = $statusData['status'];
    } else {
        $status = 'Status tidak tersedia';
    }
    ?>

    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="col-md-12">
                                <a class="course-category img d-flex align-items-center justify-content-center mx-auto" style="background-image: url(images/tani1.png); background-size: cover; background-position: center; width: 200px; height: 200px;">
                                </a>
                            </div>
                            <div class="col-md-12 mt-4">
                                <h3>Nama : <?php echo $pecah['ktp']; ?></h3>
                                <h3>Kelompok Tani: <?php echo $pecah['kelompok_tani']; ?></h3>
                                <h3>Bantuan Yang Diajukan : <?php echo $pecah['jenis_bantuan']; ?></h3>

                                <h3>Status :<br>
                                    <?php
                                    if ($status == 'Terverifikasi') {
                                        echo '<span class="badge badge-success">Selamat, Anda berhak menerima bantuan!</span>';
                                    } elseif ($status == 'Belum Verifikasi') {
                                        echo '<span class="badge badge-danger">Mohon maaf, Anda belum bisa menerima bantuan. Coba di lain waktu.</span>';
                                    } else {
                                        echo '<span class="badge badge-default">' . $status . '</span>';
                                    }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/loader.php'; ?>
</body>

</html>