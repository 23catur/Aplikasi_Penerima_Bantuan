<?php include 'koneksi2.php' ?>

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
					<p class="breadcrumbs"><span class="mr-2"><a href="listbantuan.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Daftar Bantuan ALSINTAN<i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread" style="margin-top: -10px; padding: 60px;transform: translateY(-30px);">Daftar Bantuan ALSINTAN</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 sidebar">
					<div class="sidebar-box bg-white ftco-animate">
						<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="search-form">
							<div class="form-group">
								<?php
								$kata_kunci = "";
								if (isset($_POST['kata_kunci'])) {
									$kata_kunci = $_POST['kata_kunci'];
								}
								?>
								<span class="icon fa fa-search"></span>
								<input type="text" name="kata_kunci" value="<?php echo $kata_kunci; ?>" class="form-control" placeholder="Search...">
							</div>
							<div class="form-group">
								<button type="submit" value="Pilih" name="submit" class="btn btn-warning"><i class="fa fa-search"></i> Cari</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-lg-9">
					<div class="row">
						<?php
						if (isset($_POST['kata_kunci'])) {
							$kata_kunci = trim($_POST['kata_kunci']);
							$ambil = $koneksi->query("SELECT * FROM bantuan WHERE jenis LIKE '%" . $kata_kunci . "%' OR spesifikasi LIKE '%" . $kata_kunci . "%' ORDER BY id_bantuan ASC");
						} else {
							$ambil = $koneksi->query("SELECT * FROM bantuan ORDER BY id_bantuan ASC");
						}
						?>
						<?php while ($pecah = $ambil->fetch_assoc()) { ?>
							<div class="col-md-6 d-flex align-items-stretch ftco-animate">
								<div class="project-wrap">
									<a href="detailbantuan.php?id=<?php echo $pecah["id_bantuan"] ?>" class="img" style="background-image: url(foto_bantuan/<?php echo $pecah['foto']; ?>);">
										<span class="price">Bantuan ALSINTAN</span>
									</a>
									<div class="text p-4">
										<h3><a href="detailbantuan.php?id=<?php echo $pecah["id_bantuan"] ?>"><?php echo $pecah['jenis']; ?></a></h3>
										<ul class="d-flex justify-content-between">
											<li><span class="flaticon-shower"></span><?php echo $pecah['jumlah']; ?></li>
										</ul>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include 'includes/footer.php' ?>
	<?php include 'includes/loader.php' ?>

	</script>
</body>

</html>