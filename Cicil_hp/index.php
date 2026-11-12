
<?php
// INISIALISASI VARIABEL
$nama_gadget = "";
$seri_gadget = "";
$harga_gadget = 0;
$dp_persen = 0;
$masa_cicil = 0;

$nominal_dp = 0;
$jumlah_pinjaman = 0;
$suku_bunga = 10;
$total_bunga = 0;
$total_bayar = 0;
$cicilan_per_bulan = 0;

$is_submitted = false;

// PROSES PERHITUNGAN CICILAN
if (isset($_POST['hitung'])) {

    $nama_gadget = htmlspecialchars($_POST['nama_gadget']);
    $seri_gadget = htmlspecialchars($_POST['seri_gadget']);
    $harga_gadget = (float) $_POST['harga_gadget'];
    $dp_persen = (int) $_POST['dp_persen'];
    $masa_cicil = (int) $_POST['masa_cicil'];

    if (
        $nama_gadget != "" &&
        $seri_gadget != "" &&
        $harga_gadget > 0 &&
        $dp_persen > 0 &&
        $masa_cicil > 0
    ) {

    // MENGHITUNG DP
    $nominal_dp = $harga_gadget * ($dp_persen / 100);

    // MENGHITUNG JUMLAH PINJAMAN
    $jumlah_pinjaman = $harga_gadget - $nominal_dp;

    // BUNGA 10%
    $total_bunga = $jumlah_pinjaman * ($suku_bunga /100) * $masa_cicil;

    // TOTAL YANG DIBAYAR
    $total_bayar = $jumlah_pinjaman + $total_bunga;

    // TOTAL BULAN
    $total_bulan = $masa_cicil * 12;

    // CICILAN BULAN
    $cicilan_per_bulan = $total_bayar / $total_bulan;

   $is_submitted = true;
      }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cicil HP Redmi</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>

        /* BACKGROUND UTAMA */
        body {
            background-color: #010736;
            color: #FFFFFF;
        }

        /* NAVBAR */
        .navbar {
            background-color: #010736 !important;
            border-bottom: 1px solid #263365;
        }

        .navbar-brand {
            font-weight: bold;
            color: #FFFFFF;
        }

        .navbar-brand:hover {
            color: #AFC7FF;
        }

        .navbar-brand i {
            color: #AFC7FF;
        }

        .navbar .nav-link {
            color: #FFFFFF;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #AFC7FF;
        }

        .navbar-toggler {
            border-color: #FFFFFF;
        }

        .navbar-toggler-icon {
            filter: brightness(0) invert(1);
        }

        /* BANNER */
        .carousel {
            overflow: hidden;
            border-radius: 8px;
        }

        .carousel-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        /* JUDUL FORM */
        .judul-form {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            color: #FFFFFF;
        }

        /* FORM */
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 25px 20px 20px;
            border: 1px solid #263365;
            border-radius: 12px;
            background-color: #10194F;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #FFFFFF;
        }

        .form-control {
            border-radius: 8px;
            background-color: #19265E;
            color: #FFFFFF;
            border: 1px solid #52669B;
        }

        .form-control::placeholder {
            color: #B5C3E5;
        }

        .form-control:focus {
            background-color: #19265E;
            color: #FFFFFF;
            border-color: #AFC7FF;
            box-shadow: 0 0 0 0.2rem rgba(175, 199, 255, 0.2);
        }

        .input-group-text {
            background-color: #26396F;
            color: #FFFFFF;
            border-color: #52669B;
        }

        /* PILIHAN DP DAN MASA CICIL */
        .pilihan {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pilihan input {
            display: none;
        }

        .pilihan label {
            border: 1px solid #52669B;
            border-radius: 7px;
            padding: 7px 10px;
            cursor: pointer;
            background-color: #19265E;
            color: #FFFFFF;
            font-size: 14px;
            transition: 0.2s;
        }

        .pilihan label:hover {
            background-color: #26396F;
        }

        .pilihan input:checked + label {
            background-color: #AFC7FF;
            color: #010736;
            border-color: #AFC7FF;
            font-weight: bold;
        }

        /* INFORMASI BUNGA */
        .alert-secondary {
            background-color: #19265E;
            color: #D5DDF5;
            border: 1px solid #52669B;
        }

        /* TOMBOL */
        .btn-hitung {
            background-color: #AFC7FF;
            color: #010736;
            border: none;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-hitung:hover {
            background-color: #FFFFFF;
            color: #010736;
        }

        /* HASIL */
        .hasil-container {
            max-width: 650px;
            margin: auto;
            padding: 0 20px 30px;
        }

        .hasil-judul {
            font-weight: bold;
            margin-bottom: 15px;
            color: #FFFFFF;
        }

        /* HASIL CICILAN UTAMA */
        .hasil-utama {
            background-color: #19265E;
            border: 1px solid #52669B;
            border-radius: 10px;
            text-align: center;
            padding: 15px;
            margin-bottom: 10px;
            color: #D5DDF5;
        }

        .hasil-utama h3 {
            font-weight: bold;
            margin: 0;
            color: #AFC7FF;
        }

        /* ITEM HASIL */
        .hasil-item {
            display: flex;
            border: 1px solid #52669B;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .hasil-icon {
            width: 45px;
            background-color: #26396F;
            color: #AFC7FF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .hasil-label {
            width: 45%;
            background-color: #19265E;
            color: #FFFFFF;
            padding: 9px;
            font-size: 14px;
        }

        .hasil-value {
            flex: 1;
            padding: 9px;
            font-size: 14px;
            font-weight: 500;
            border-left: 1px solid #52669B;
            background-color: #10194F;
            color: #D5DDF5;
        }

        /* TOTAL PEMBAYARAN */
        .hasil-total .hasil-label,
        .hasil-total .hasil-value {
            background-color: #26396F;
            color: #FFFFFF;
            font-weight: bold;
        }

        /* PESAN HASIL KOSONG */
        .hasil-container .alert-light {
            background-color: #10194F;
            color: #D5DDF5;
            border-color: #52669B !important;
        }

        .hasil-container .alert-light i {
            color: #AFC7FF;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {

            .carousel-item img {
                height: 180px;
            }

            .form-container {
                padding: 20px 15px;
            }

            .hasil-label,
            .hasil-value {
                font-size: 12px;
            }
        }

    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="index.php">
                <i class="fas fa-mobile-alt"></i>
                CICIL HP
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- BANNER SLIDE -->
    <div class="container my-4">

        <div id="bannerSlider"
            class="carousel slide"
            data-bs-ride="carousel">

            <!-- INDICATOR -->
            <div class="carousel-indicators">

                <button type="button" data-bs-target="#bannerSlider"
                    data-bs-slide-to="0" class="active"></button>

                <button type="button" data-bs-target="#bannerSlider"
                    data-bs-slide-to="1"></button>

                <button type="button" data-bs-target="#bannerSlider"
                    data-bs-slide-to="2"></button>

                <button type="button" data-bs-target="#bannerSlider"
                    data-bs-slide-to="3"></button>

                <button type="button" data-bs-target="#bannerSlider"
                    data-bs-slide-to="4"></button>

            </div>

            <!-- ISI SLIDE -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="image/Note%2015.png"
                        class="d-block w-100"
                        alt="Redmi Note 15">
                </div>

                <div class="carousel-item">
                    <img src="image/Note%2014.png"
                        class="d-block w-100"
                        alt="Redmi Note 14">
                </div>

                <div class="carousel-item">
                    <img src="image/15C.png"
                        class="d-block w-100"
                        alt="Redmi 15C">
                </div>

                <div class="carousel-item">
                    <img src="image/A5.jpeg"
                        class="d-block w-100"
                        alt="Redmi A5">
                </div>

                <div class="carousel-item">
                    <img src="image/A7%20pro.png"
                        class="d-block w-100"
                        alt="Redmi A7 Pro">
                </div>

            </div>

            <!-- TOMBOL KIRI -->
            <button class="carousel-control-prev"
                type="button"
                data-bs-target="#bannerSlider"
                data-bs-slide="prev">

                <span class="carousel-control-prev-icon"
                    aria-hidden="true"></span>

                <span class="visually-hidden">Previous</span>

            </button>

            <!-- TOMBOL KANAN -->
            <button class="carousel-control-next"
                type="button"
                data-bs-target="#bannerSlider"
                data-bs-slide="next">

                <span class="carousel-control-next-icon"
                    aria-hidden="true"></span>

                <span class="visually-hidden">Next</span>

            </button>

        </div>

    </div>


    <!-- JUDUL FORM -->
    <h5 class="judul-form">FORM PENGAJUAN</h5>


    <!-- FORM PENGAJUAN -->
    <div class="container">

        <div class="form-container">

            <form method="POST" action="">

                <!-- NAMA GADGET -->
                <div class="mb-3">

                    <label class="form-label">
                        1. Nama Gadget
                    </label>

                    <input type="text"
                        name="nama_gadget"
                        class="form-control"
                        placeholder="Masukkan nama gadget"
                        value="<?= htmlspecialchars($nama_gadget) ?>"
                        required>

                </div>


                <!-- SERI GADGET -->
                <div class="mb-3">

                    <label class="form-label">
                        2. Seri Gadget
                    </label>

                    <input type="text"
                        name="seri_gadget"
                        class="form-control"
                        placeholder="Masukkan seri gadget"
                        value="<?= htmlspecialchars($seri_gadget) ?>"
                        required>

                </div>


                <!-- HARGA GADGET -->
                <div class="mb-3">

                    <label class="form-label">
                        3. Harga Gadget (Rp)
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">Rp</span>

                        <input type="number"
                            name="harga_gadget"
                            class="form-control"
                            placeholder="Masukkan harga gadget"
                            min="1"
                            value="<?= $harga_gadget > 0 ? $harga_gadget : '' ?>"
                            required>

                    </div>

                </div>


                <!-- DP -->
                <div class="mb-3">

                    <label class="form-label">
                        4. DP (Persen)
                    </label>

                    <div class="pilihan">

                        <?php foreach ([10, 20, 30, 40, 50, 60] as $dp): ?>

                            <div>
                                <input type="radio"
                                    name="dp_persen"
                                    id="dp<?= $dp ?>"
                                    value="<?= $dp ?>"
                                    <?= $dp_persen == $dp ? 'checked' : '' ?>
                                    required>

                                <label for="dp<?= $dp ?>">
                                    <?= $dp ?>%
                                </label>
                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>


                <!-- MASA CICIL -->
                <div class="mb-3">

                    <label class="form-label">
                        5. Masa Cicil (Tahun)
                    </label>

                    <div class="pilihan">

                        <?php foreach ([1, 2, 3] as $tahun): ?>

                            <div>
                                <input type="radio"
                                    name="masa_cicil"
                                    id="bulan<?= $tahun ?>"
                                    value="<?= $tahun ?>"
                                    <?= $masa_cicil == $tahun ? 'checked' : '' ?>
                                    required>

                                <label for="bulan<?= $tahun ?>">
                                    <?= $tahun ?> Tahun
                                </label>
                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>


                <!-- INFORMASI BUNGA -->
                <div class="mb-3">

                    <label class="form-label">
                        6. Informasi Bunga
                    </label>

                    <div class="alert alert-secondary py-2 mb-0">

                        <i class="fas fa-info-circle me-2"></i>

                        Bunga cicilan tetap sebesar 10% per tahun untuk simulasi perhitungan.

                    </div>

                </div>


                <!-- TOMBOL HITUNG -->
                <button type="submit"
                    name="hitung"
                    class="btn btn-hitung w-100 py-2">

                    <i class="fas fa-calculator me-2"></i>
                    Hitung Cicilan

                </button>

            </form>

        </div>

    </div>


    <!-- HASIL PERHITUNGAN -->
    <h5 class="text-center fw-bold mt-4 mb-3">
        Hasil Perhitungan
    </h5>


    <div class="container">

        <div class="hasil-container">

            <h6 class="hasil-judul">
                <i class="fas fa-mobile-alt me-2"></i>
                Hasil Perhitungan Gadget
            </h6>


            <?php if ($is_submitted): ?>

                <!-- CICILAN PER BULAN -->
                <div class="hasil-utama">

                    <div>Cicilan Per Bulan</div>

                    <h3>
                        Rp. <?= number_format($cicilan_per_bulan, 0, ',', '.') ?>
                    </h3>

                </div>


                <!-- NAMA GADGET -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>

                    <div class="hasil-label">
                        Nama Gadget
                    </div>

                    <div class="hasil-value">
                        <?= $nama_gadget ?>
                    </div>

                </div>


                <!-- SERI GADGET -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-barcode"></i>
                    </div>

                    <div class="hasil-label">
                        Seri Gadget
                    </div>

                    <div class="hasil-value">
                        <?= $seri_gadget ?>
                    </div>

                </div>


                <!-- DP -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-percent"></i>
                    </div>

                    <div class="hasil-label">
                        DP (Persen)
                    </div>

                    <div class="hasil-value">
                        <?= $dp_persen ?>%
                    </div>

                </div>


                <!-- NOMINAL DP -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>

                    <div class="hasil-label">
                        Nominal DP
                    </div>

                    <div class="hasil-value">
                        Rp. <?= number_format($nominal_dp, 0, ',', '.') ?>
                    </div>

                </div>


                <!-- JUMLAH PINJAMAN -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-sack-dollar"></i>
                    </div>

                    <div class="hasil-label">
                        Jumlah Pinjaman
                    </div>

                    <div class="hasil-value">
                        Rp. <?= number_format($jumlah_pinjaman, 0, ',', '.') ?>
                    </div>

                </div>


                <!-- MASA CICIL -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="hasil-label">
                        Masa Cicil (Tahun)
                    </div>

                    <div class="hasil-value">
                        <?= $masa_cicil ?> Tahun
                    </div>

                </div>


                <!-- SUKU BUNGA -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-arrow-up"></i>
                    </div>

                    <div class="hasil-label">
                        Suku Bunga
                    </div>

                    <div class="hasil-value">
                        <?= $suku_bunga ?>% per tahun
                    </div>

                </div>


                <!-- TOTAL BUNGA -->
                <div class="hasil-item">

                    <div class="hasil-icon">
                        <i class="fas fa-coins"></i>
                    </div>

                    <div class="hasil-label">
                        Total Bunga Selama Tenor
                    </div>

                    <div class="hasil-value">
                        Rp. <?= number_format($total_bunga, 0, ',', '.') ?>
                    </div>

                </div>


                <!-- TOTAL BAYAR -->
                <div class="hasil-item hasil-total">

                    <div class="hasil-icon">
                        <i class="fas fa-coins"></i>
                    </div>

                    <div class="hasil-label">
                        Total yang Dibayarkan
                        <small class="d-block">(Pokok + Bunga)</small>
                    </div>

                    <div class="hasil-value">
                        Rp. <?= number_format($total_bayar, 0, ',', '.') ?>
                    </div>

                </div>


            <?php else: ?>

                <div class="alert alert-light text-center border">

                    <i class="fas fa-calculator fa-2x mb-2"></i>

                    <p class="mb-0">
                        Isi form pengajuan terlebih dahulu untuk melihat hasil perhitungan.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>


    <!-- FOOTER -->
    <footer style="background-color: #010736; color: white; text-align: center; padding: 18px; border-top: 1px solid #263365;">

        <p class="mb-0">
            &copy; 2026 Cicil HP. All Rights Reserved.
        </p>

    </footer>


    <!-- BOOTSTRAP JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
