<?php
  require 'config/functions.php';
  $alat_musik = query("SELECT * FROM alat_musik ORDER BY id ASC LIMIT 3");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- MYCSS
  <link rel="stylesheet" type="css" href="assets/css/index.css"> -->

      <!-- FONTAWESOWE -->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-free/css/all.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .jika_scroll {
		background: rgb(130, 14, 208);
		}
    nav{
      background-color: transparent;
      height: 50px;
    }
    .navbar-brand {
      text-shadow: 5px 5px black;
    }

    .nav-item .nav-link {
      text-shadow: 2px 2px black;
      transition: 0.7s;
      color: rgb(130, 14, 208);
    }

    .nav-item .nav-link:hover{
      border-bottom: 1px black solid;
      border-color: white;
    }

    .jumbotron {
      background-image: url("assets/image/1344.jpg");
      -webkit-filter: brightness(90%);
      background-size: cover;
      height: 820px;
      margin-top: -60px;
    }

    .jumbotron .display-4 {
      margin-top: 240px;
      font-weight: bold;
      text-shadow: 5px 5px rgb(130, 14, 208);
    }

    .jumbotron p {
      margin-top: 50px;
      font-size: 25px;
      text-shadow: 3px 3px rgb(130, 14, 208);
    }

    .jumbotron .btn {
      background-color: rgb(130, 14, 208);
      transition: 1s;
    }

    .jumbotron hr {
      border-color: rgb(130, 14, 208);
      width: 220px;
      border-width: 5px;
    }


    .home hr{
      border-color: rgb(130, 14, 208);
      width: 100px;
      border-width: 5px;
    }

    .card-img-top{
    min-height: 250px;
    max-height: 250px;
  }

  .lebih_banyak a{
    font-size: 25px;
    text-decoration: none;
    border:none;
    color: black;
    transition: 1s;

  }
  .lebih_banyak a:hover{
    color: rgb(130, 14, 208);
  }
  .lebih_banyak hr:hover{
    color: black;
  }


    .copyright {
      background-color: rgb(130, 14, 208);
    }
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <script type="text/javascript">
    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 100) {
        $(".navbar").addClass("jika_scroll");
      } else {
        $(".navbar").removeClass("jika_scroll");
      }
    });
  </script>

  <title>Hello, world!</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id='nav'>
    <div class="container">
      <a class="navbar-brand text-white" href="#">HappyMusical</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-white font-weight-bold" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Pinjam</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="jumbotron text-center">
    <div class="container">
      <h1 class="display-4 text-white">NIKMATI PEMINJAMAN TANPA RIBET</h1>
      <hr class="my-4">
      <p class="text-white">Peminjaman Alat Musik Untuk Mahasiswa Unviersitas Pasundan</p>
      <a href="#home" class="btn btn-lg text-white"><i class="fas fa-play"></i> Let's Start</a>
    </div>
  </div>

  <section class="home pt-5 mt-5" id="home">
    <div class="container">
      <h1 class="text-center">Alat Musik Populer</h1>
      <hr class="my-4">
      <div class="row">
        <?php foreach ($alat_musik as $am) : ?>
        <div class="col-md">
          <div class="card border-dark" style="width: 18rem;">
            <img class="card-img-top" src="assets/image/upload/<?= $am['gambar'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?= $am['nama_alat_musik'] ?></h5>
              <p class="card-text">Harga : <?= $am['harga'] ?>
              </p>
              <a href="#" class="btn btn-dark" style="background-color: rgb(130, 14, 208);">Details</a>
            </div>
          </div>
      </div>
      <?php endforeach ?>
    </div>
    <div class="lebih_banyak text-center mt-5">
      <a href="">Lihat Lebih Banyak</a>
      <hr class="my-4">
    </div>
    </div>
  </section>

  <footer class="text-white bg-dark mt-5 pt-5">
    <div class="container">
      <div class="row p-3">
        <div class="col">
          <h5>Sosial Media</h5>
          <ul>
            <li>Instagram</li>
            <li>Facebook</li>
            <li>Twitter</li>
          </ul>
        </div>
        <div class="col">
          <h5>Tentang Kami</h5>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, atque possimus labore accusamus quasi qui
            enim, nulla unde dolore molestias tenetur beatae libero eaque commodi reprehenderit? Aliquam illum itaque
            error!/p>
        </div>
        <div class="col">
          <h5>Mitra Kerjasama</h5>
          <ul>
            <li>Yamaha Music</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
  <div class="copyright text-center text-white font-weight-bold p-2">
    <p style="font-weight: 200; padding-top:20px;">AldiAgeng Copyright &#169; 2020 </p>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</body>
</html>