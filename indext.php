<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Arsip | D3 Teknologi Komputer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylet.css"> <!-- Hubungkan file CSS eksternal di sini -->
    <style>
        /* Menambah gaya tambahan */
        body {
            font-family: 'Roboto', sans-serif; /* Menggunakan font Roboto */
            background-color: #f7f7f7; /* Warna latar belakang */
        }
        .navbar-inverse .navbar-brand,
        .navbar-inverse .navbar-nav > li > a {
            color: #fff; /* Warna teks untuk navbar */
        }
        .banner {
            background: #006df0; /* Warna latar belakang banner */
            color: white; /* Warna teks pada banner */
            padding: 100px 0; /* Padding atas dan bawah */
            text-align: center; /* Posisi teks menjadi tengah */
        }
        .banner h1 {
            font-size: 36px; /* Ukuran font judul */
        }
        .banner p {
            font-size: 18px; /* Ukuran font paragraf */
            margin-bottom: 30px; /* Margin bawah */
        }
        .banner a {
            padding: 15px 30px; /* Padding tombol */
            margin-right: 20px; /* Margin kanan */
            border: 1px solid white; /* Garis tepi */
            border-radius: 5px; /* Radius sudut */
            transition: all 0.5s; /* Transisi untuk efek hover */
            color: white; /* Warna teks tombol */
            text-decoration: none; /* Hapus garis bawah */
        }
        .banner a:last-child {
            margin-right: 20px; /* Hapus margin kanan untuk elemen terakhir */
        }
        .banner a:hover {
            background: white; /* Warna latar belakang saat dihover */
            color: #006df0; /* Warna teks saat dihover */
        }
        /* Gaya untuk teks Arsip Digital */
        .navbar-brand {
            text-transform: uppercase; /* Mengubah teks menjadi huruf kapital */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-siad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://id.wikipedia.org/wiki/Arsip_digital">ARSIP DIGITAL</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            </div>
        </div>
    </nav>


    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div style="margin-top: 140px;">
                        <h1>Sistem Informasi E-Arsip Digital</h1>
                        <p>Manajemen file arsip dengan mudah dan cepat.</p>

                        <br>
                        <br>

                        <a href="user_login.php">LOGIN USER</a>
                        <a href="login.php">LOGIN ADMIN / DOSEN</a>
                    </div>
                </div>
                <div class="col-lg-6">

                    <img src="gambar/depan/4.png">
                    
                </div>
            </div>

        </div>
    </div>


    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
