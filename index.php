<?php
include 'resource/data/dataList.php';
session_start();

// Periksa apakah pengguna telah login, jika tidak, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda - Motorcycle</title>
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="resource/img/logo.png" alt="Logo" width="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="#">Beranda</a>
                    <a class="nav-link" href="#">Pembayaran</a>
                    <a class="nav-link" href="#">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Banner -->
    <section class="banner" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mt-5">Honda Faster Motorcycle, <br> Easy Going</h1>
                    <p class="mt-3">We provide what you need to enjoy your <br />Riding. Time to make safety</p>
                    <a href="#content" class="btn btn-primary-custom mt-3 px-4 shadow">Show Me Now</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="resource/img/banner.jpg" alt="Banner" class="img-fluid mt-5">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner -->

    <!-- Content -->
    <section class="content" id="content">
        <div class="container">
            <h3 class="mb-4 fw-medium">Motorcycles </h3>

            <div class="list_room">
                <div class="row">
                    <?php foreach ($data as $key => $value) : ?>
                        <div class="col-lg-3 mb-3">
                            <img src="resource/img/<?= $value['gambar']; ?>" alt="<?= $value['nama']; ?>" class="img-fluid mb-2">
                            <h5><?= $value['nama']; ?></h5>
                            <p><?= $value['deskripsi']; ?></p>
                            <p class="fw-medium">Rp. <?= number_format($value['harga'], 0, ',', '.'); ?></p>
                            <a href="pembayaran.php?id=<?= $value['id'] ?>" class="btn btn-primary-custom-sm shadow">Check out</a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Content -->

    <!-- Story -->
    <section class="story" id="story">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="resource/img/story.jpg" alt="story" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <h4>Safety Riding, Happy Ride</h4>
                    <h3>What a great ride with safety riding and <br /> Happy riding with partners ...</h3>

                    <a href="#" class="btn btn-primary-custom px-4 mt-5 shadow">Read Their Story</a>

                </div>
            </div>
        </div>
    </section>
    <!-- End Story -->

    <!-- Footer -->
    <?php include 'components/partials/footer.php'; ?>
    <!-- End Footer -->

    <script src="resource/js/bootstrap.bundle.min.js"></script>
</body>

</html>