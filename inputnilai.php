<?php include 'koneksi2.php'; ?>

<?php
if (isset($_GET['id'])) {
    $ambil = $koneksi->query("SELECT * FROM kelompok WHERE id_kelompok='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header.php'; ?>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/latar.jpg'); background-size: cover; background-position: center center; height: 50vh;">
        <div class="overlay" style="background: rgba(0, 0, 0, 0.6);"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Input Data <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread" style="margin-top: -50px; padding: 110px;transform: translateY(-60px);">Input Data</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-12 col-md-12 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-12">Masukkan Data Kelompok Tani</h3>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="nama">Nama Sesuai KTP</label>
                                                    <input type="text" class="form-control" name="ktp" id="ktp" required placeholder="Nama Sesuai KTP">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="kelompok">Kelompok Tani</label>
                                                    <input type="text" class="form-control" name="kelompok" id="kelompok" required placeholder="Kelompok Tani">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="jenis_bantuan">Jenis Bantuan Yang Diajukan</label>
                                                    <input type="text" class="form-control" name="jenis_bantuan" id="jenis_bantuan" required placeholder="Jenis Bantuan Yang Diajukan">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="jenis_bantuan">Komoditi</label>
                                                    <input type="text" class="form-control" name="komoditi" id="komoditi" required placeholder="Komoditi Yang Diusahakan">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="a1">Terdaftar di SIMLUHTAN</label>
                                                    <select class="form-control" name="a1" id="a1" required>
                                                        <option value="" disabled selected>-- Pilih --</option>
                                                        <option value="5">Iya</option>
                                                        <option value="1">Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="a2">Luas Lahan</label>
                                                    <select class="form-control" name="a4" id="a4" required>
                                                        <option value="" disabled selected>-- Pilih --</option>
                                                        <option value="1">&lt;Tidak Punya Lahan</option>
                                                        <option value="2">&lt;2hk</option>
                                                        <option value="3">2hk</option>
                                                        <option value="4">&gt;2hk</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="a3">Riwayat Terima Bantuan</label>
                                                    <select class="form-control" name="a3" id="a3" required>
                                                        <option value="" disabled selected>-- Pilih --</option>
                                                        <option value="1">Baru / 1 tahun</option>
                                                        <option value="2">2-3 tahun</option>
                                                        <option value="3">4-5 tahun</option>
                                                        <option value="4">Belum Pernah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="a4">Sumber Air</label>
                                                    <select class="form-control" name="a6" id="a6" required>
                                                        <option value="" disabled selected>-- Pilih --</option>
                                                        <option value="1">Kurang</option>
                                                        <option value="2">Cukup</option>
                                                        <option value="3">Melimpah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="a5">Lokasi</label>
                                                    <select class="form-control" name="a5" id="a5" required>
                                                        <option value="" disabled selected>-- Pilih --</option>
                                                        <option value="1">Sulit di lalui alat</option>
                                                        <option value="2">Akses bisa</option>
                                                        <option value="3">Akses mudah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="proposal">Masukkan Proposal (PDF)</label>
                                                    <input type="file" class="form-control" name="proposal" id="proposal" accept=".pdf" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="checkbox" name="keterangan" value="keterangan" required> Data yang sudah terisi tidak bisa diubah<br>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Simpan" class="btn btn-primary" name="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['submit'])) {

                                        $id_kelompok = $_SESSION["id_kelompok"];

                                        $ambil = $koneksi->query("SELECT * FROM nilai_kelompok WHERE id_kelompok='$id_kelompok'");

                                        if ($ambil->num_rows > 0) {
                                            echo "<div class='alert alert-info'>Anda sudah input nilai</div>";
                                        } else {
                                            $ktp = $_POST['ktp'];
                                            $kelompok = $_POST['kelompok'];
                                            $komoditi = $_POST['komoditi'];
                                            $jenis_bantuan = $_POST['jenis_bantuan'];
                                            $a1 = $_POST['a1'];
                                            $a6 = $_POST['a6'];
                                            $a3 = $_POST['a3'];
                                            $a4 = $_POST['a4'];
                                            $a5 = $_POST['a5'];

                                            $proposal = $_FILES['proposal']['name'];
                                            $proposal_tmp = $_FILES['proposal']['tmp_name'];
                                            $proposal_folder = "proposal/" . basename($proposal);

                                            if (!is_dir('proposal')) {
                                                mkdir('proposal', 0777, true);
                                            }

                                            if (move_uploaded_file($proposal_tmp, $proposal_folder)) {
                                                $query = $koneksi->query("INSERT INTO nilai_kelompok(id_kelompok, ktp, kelompok_tani, komoditi, jenis_bantuan, a1, a6, a3, a4, a5, a2, proposal, status) 
                          VALUES('$id_kelompok', '$ktp', '$kelompok', '$komoditi', '$jenis_bantuan', '$a1', '$a6', '$a3', '$a4', '$a5', 5, '$proposal', 'belum verifikasi')");

                                                if ($query) {
                                                    echo "<div class='alert alert-info'>Data Tersimpan</div>";
                                                    echo "<meta http-equiv='refresh' content='1;url=nilai.php'>";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Gagal menyimpan data ke database.</div>";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>Gagal mengupload file proposal.</div>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/loader.php'; ?>

</body>

</html>