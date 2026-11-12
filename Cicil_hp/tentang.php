
<?php
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang Kami - Cicil HP</title>

    <!-- BOOTSTRAP 5 CSS -->
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
            background-color: #010736;
            border-bottom: 1px solid #263365 !important;
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

        /* CONTAINER */
        .about-container {
            max-width: 900px;
            margin: 50px auto;
        }

        /* KARTU TENTANG */
        .about-card {
            background-color: #10194F;
            color: #FFFFFF;
            padding: 35px;
            border-radius: 12px;
            border: 1px solid #263365;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .about-icon {
            font-size: 45px;
            color: #AFC7FF;
        }

        .about-title {
            font-weight: bold;
            margin-bottom: 15px;
            color: #FFFFFF;
        }

        .about-card p {
            color: #D5DDF5;
        }

        /* KARTU LAYANAN */
        .feature-box {
            background-color: #10194F;
            color: #FFFFFF;
            padding: 20px;
            border-radius: 10px;
            height: 100%;
            border: 1px solid #263365;
            transition: 0.3s;
        }

        .feature-box:hover {
            background-color: #1B286B;
            transform: translateY(-5px);
        }

        .feature-box i {
            font-size: 28px;
            color: #AFC7FF;
            margin-bottom: 12px;
        }

        .feature-box h5 {
            color: #FFFFFF;
            font-weight: bold;
        }

        .feature-box p {
            color: #D5DDF5 !important;
        }

        /* JUDUL LAYANAN */
        h4 {
            color: #FFFFFF;
        }

        /* GARIS */
        hr {
            border-color: #AFC7FF;
        }

        /* FOOTER */
        footer {
            background-color: #010736;
            color: #FFFFFF;
            text-align: center;
            padding: 18px;
            margin-top: 50px;
            border-top: 1px solid #263365;
        }

    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg shadow-sm">

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
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="tentang.php">Tentang</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- KONTEN TENTANG -->
    <div class="container">

        <div class="about-container">

            <div class="about-card text-center">

                <i class="fas fa-mobile-alt about-icon mb-3"></i>

                <h2 class="about-title">Tentang Cicil HP</h2>

                <p>
                    Cicil HP merupakan website yang dibuat untuk membantu
                    pengguna memperkirakan biaya pembelian gadget melalui
                    sistem cicilan. Website ini menyediakan fitur
                    perhitungan uang muka, jumlah pinjaman, bunga, dan
                    angsuran per bulan.
                </p>

                <hr class="my-4">

                <h4 class="about-title">Tujuan Kami</h4>

                <p>
                    Kami bertujuan memberikan kemudahan kepada pengguna
                    dalam mengetahui perkiraan biaya cicilan sebelum
                    melakukan pembelian gadget.
                </p>

            </div>


            <!-- LAYANAN KAMI -->
            <h4 class="text-center fw-bold mt-5 mb-4">
                Layanan Kami
            </h4>

            <div class="row g-3">

                <!-- LAYANAN 1 -->
                <div class="col-md-4">

                    <div class="feature-box text-center">

                        <i class="fas fa-calculator"></i>

                        <h5>Hitung Cicilan</h5>

                        <p class="small">
                            Menghitung perkiraan angsuran gadget
                            berdasarkan DP dan masa cicil.
                        </p>

                    </div>

                </div>


                <!-- LAYANAN 2 -->
                <div class="col-md-4">

                    <div class="feature-box text-center">

                        <i class="fas fa-mobile-alt"></i>

                        <h5>Pilihan Gadget</h5>

                        <p class="small">
                            Menampilkan beberapa pilihan gadget
                            Redmi yang dapat dipilih pengguna.
                        </p>

                    </div>

                </div>


                <!-- LAYANAN 3 -->
                <div class="col-md-4">

                    <div class="feature-box text-center">

                        <i class="fas fa-file-invoice-dollar"></i>

                        <h5>Rincian Biaya</h5>

                        <p class="small">
                            Menampilkan rincian DP, pinjaman,
                            bunga, dan total pembayaran.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <footer>

        <p class="mb-0">
            &copy; 2026 Cicil HP. All Rights Reserved.
        </p>

    </footer>


    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
