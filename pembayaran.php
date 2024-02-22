<?php
require 'resource/data/dataList.php';
$id = $_GET['id'];
$no_pembayaran = "INV" . date('Ymd') . $id;

session_start();

// Periksa apakah pengguna telah login, jika tidak, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data pengguna dari session
$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

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

    <!-- Booking -->
    <section class="booking" id="booking">
        <div class="container">
            <h3 class="mb-5" style="color: #550f11">Informasi Pembayaran</h3>
            <div class="row gx-5">
                <div class="col-md-6">
                    <img src="resource/img/<?= $data[$id]['gambar'] ?>" alt="double-bad" class="img-fluid mb-2">

                    <div class="information">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h5 style="color: #f5cc4f;"><?= $data[$id]['nama'] ?></h5>
                            </div>
                        </div>

                        <h5>Description</h5>
                        <p><?= $data[$id]['deskripsi'] ?></p>

                        <h5>Pilihan Warna</h5>
                        <ul>
                            <?php foreach ($data[$id]['harga-warna'] as $warna => $harga) : ?>
                                <li><?= $warna ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <form action="invoice.php?id=<?= $data[$id]['id'] ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $data[$id]['id'] ?>">
                        <input type="hidden" name="harga" value="<?= $data[$id]['harga'] ?>">

                        <div class="mb-3">
                            <label for="no-pembayaran" class="form-label">No. Pembayaran</label>
                            <input type="text" class="form-control" id="no-pembayaran" value="<?= $no_pembayaran ?>" name="no-pembayaran" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="nama-motor" class="form-label">Motor</label>
                            <input type="text" class="form-control" id="nama-motor" value="<?= $data[$id]['nama'] ?>" name="motor" readonly>
                        </div>


                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $username ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                        </div>

                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <select class="form-select" id="warna" name="selected-warna">
                                <option selected>Pilih Warna</option>
                                <?php foreach ($data[$id]['harga-warna'] as $warna => $harga) : ?>
                                    <option data-harga="<?= $harga ?>" value="<?= $warna ?>"><?= $warna ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="harga-warna" id="warna-harga" value="">
                        </div>

                        <!-- <div class="mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" min="1" class="form-control" required>
                        </div> -->

                        <div class="info-price mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Harga</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h5 id="harga">Rp. 0</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>Harga Warna</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h5 id="harga-warna">Rp. 0</h5>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="info-price">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Total Harga</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h5 id="total-harga">Rp. 0</h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>Tax</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h5 id="tax">Rp. 0</h5>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <h5>Total Harga (Termasuk PPN 10%)</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h5 id="total-harga-tax">Rp. 0</h5>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <!-- <a href="invoice.php?id=<?= $data[$id]['id'] ?>" class="btn btn-primary custom mt-3">Order Now</a> -->
                                <button type="submit" class="btn btn-primary-custom mt-3">Order Now</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Booking -->

    <!-- Footer -->
    <?php
    include 'components/partials/footer.php';
    ?>
    <!-- End Footer -->

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script>
        // Get Element
        let warna = document.getElementById('warna');
        // let jumlah = document.getElementById('jumlah');

        let harga = document.getElementById('harga');
        let hargaWarna = document.getElementById('harga-warna');

        let totalHarga = document.getElementById('total-harga');
        let tax = document.getElementById('tax');

        let totalHargaTax = document.getElementById('total-harga-tax');

        // Event Change
        warna.addEventListener('input', function() {
            // jumlah.value = 0;
            let hargaMotor = <?= $data[$id]['harga'] ?>;
            let hargaWarnaMotor;

            // Mengambil harga warna berdasarkan warna yang dipilih
            let selectedOption = this.options[this.selectedIndex];
            let selectedHarga = selectedOption.getAttribute('data-harga');
            document.getElementById('warna-harga').value = selectedHarga;


            <?php foreach ($data[$id]['harga-warna'] as $warna => $harga) : ?>
                switch (warna.value) {
                    case '<?= $warna ?>':
                        hargaWarnaMotor = <?= $harga ?>;
                        break;
                }
            <?php endforeach; ?>

            let hargaMotorTotal = hargaMotor;
            let hargaWarnaMotorTotal = hargaWarnaMotor;

            let totalHargaMotor = hargaMotorTotal + hargaWarnaMotorTotal;
            let taxMotor = totalHargaMotor * 0.1;

            let totalHargaMotorTax = totalHargaMotor + taxMotor;

            harga.innerHTML = 'Rp. ' + hargaMotorTotal.toLocaleString('id-ID');
            hargaWarna.innerHTML = 'Rp. ' + hargaWarnaMotorTotal.toLocaleString('id-ID');

            totalHarga.innerHTML = 'Rp. ' + totalHargaMotor.toLocaleString('id-ID');
            tax.innerHTML = 'Rp. ' + taxMotor.toLocaleString('id-ID') + ' (10%)';

            totalHargaTax.innerHTML = 'Rp. ' + totalHargaMotorTax.toLocaleString('id-ID');
        });

        // jumlah.addEventListener('input', function() {
        //     if (jumlah.value < 0) {
        //         jumlah.value = 0;

        //         harga.innerHTML = 'Rp. 0';
        //         hargaWarna.innerHTML = 'Rp. 0';

        //         totalHarga.innerHTML = 'Rp. 0';
        //         tax.innerHTML = 'Rp. 0';

        //         totalHargaTax.innerHTML = 'Rp. 0';
        //     }

        //     let hargaMotorTotal = hargaMotor * jumlah.value;
        //     let hargaWarnaMotorTotal = hargaWarnaMotor * jumlah.value;

        //     let totalHargaMotor = hargaMotorTotal + hargaWarnaMotorTotal;
        //     let taxMotor = totalHargaMotor * 0.1;

        //     let totalHargaMotorTax = totalHargaMotor + taxMotor;

        //     harga.innerHTML = 'Rp. ' + hargaMotorTotal.toLocaleString('id-ID');
        //     hargaWarna.innerHTML = 'Rp. ' + hargaWarnaMotorTotal.toLocaleString('id-ID');

        //     totalHarga.innerHTML = 'Rp. ' + totalHargaMotor.toLocaleString('id-ID');
        //     tax.innerHTML = 'Rp. ' + taxMotor.toLocaleString('id-ID') + ' (10%)';

        //     totalHargaTax.innerHTML = 'Rp. ' + totalHargaMotorTax.toLocaleString('id-ID');
        // });
    </script>
</body>

</html>