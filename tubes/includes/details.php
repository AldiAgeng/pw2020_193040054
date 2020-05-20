<?php
require '../config/functions.php';
$id = $_GET['id'];
$alat_musik = query("SELECT * FROM alat_musik WHERE id = '$id' ")[0];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- FONTAWESOWE -->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome-free/css/all.min.css">

    <link rel="shortcut icon" href="../assets/image/favicon.ico">

    <style>
    nav{
      transition: 0.4s;
      background: rgb(130, 14, 208);
      height: 50px;
    }
    .navbar-brand {
      text-shadow: 5px 5px black;
    }

    .nav-item .nav-link {
      background: rgb(130, 14, 208);
      text-shadow: 2px 2px black;
      transition: 0.7s;
      color: rgb(130, 14, 208);
    }

    .nav-item .nav-link:hover{
      border-bottom: 1px black solid;
      border-color: white;
    }
    </style>

    <title>HappyMusical | Detail</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id='nav'>
    <div class="container">
      <a class="navbar-brand text-white" href="#"><i class="fas fa-compact-disc"></i> HappyMusical</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-white font-weight-bold" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="produk.php">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="new_login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Awal Detail Product -->
  <section id="detail" class="detail mt-5 pt-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col text-center text-dark">
          <h2>Detail Product</h2>
          <hr>
        </div>
      </div>
      <div class="row justify-content-center text-dark">
        <div class="col-md-5 text-center mb-3">
          <img src="../assets/image/upload/<?= $alat_musik["gambar"]; ?>" class="img-thumbnail shadow-lg p-3 mb-5 bg-white rounded" width="300">
        </div>
        <div class="col-md-5 text-left">
          <h1><span><?= $alat_musik["nama_alat_musik"]; ?></span></h1>
          <hr>
          <p>Merk <?= $alat_musik["merk"]; ?></p>
          <p>Rp.<?= $alat_musik["harga"]; ?></p>
          <p>Cara Dimainkan <?= $alat_musik["cara_dimainkan"]; ?></p>
          <p>Jumlah <?= $alat_musik["jumlah_alat"]; ?></p>
          <a href="../includes/new_login.php" class="tombol-kembali btn btn-dark">Pinjam</a>
        </div>
      </div>
    </div>
  </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>