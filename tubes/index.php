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

  <link rel="shortcut icon" href="assets/image/favicon.ico">

  <style>
    .jika_scroll {
		background: rgba(130, 14, 208,0.7);
		}
    nav{
      transition: 0.4s;
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
      background-attachment: fixed;
      -webkit-filter: brightness(90%);
      background-size: cover;
      height: 860px;
      margin-top: -100px;
    }

    .jumbotron .display-4 {
      margin-top: 290px;
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

  .row .card:hover{
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
    transform: scale(1.02);
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
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  
  <script type="text/javascript">
  // Scroll navbar
    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 450) {
        $(".navbar").addClass("jika_scroll");
      } else {
        $(".navbar").removeClass("jika_scroll");
      }
    });
      </script>

  <title>HappyMusical</title>
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
            <a class="nav-link text-white" href="includes/produk.php">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="includes/new_login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="jumbotron text-center">
    <div class="container">
      <h1 class="display-4 text-white">ENJOY YOU LOAN</h1>
      <hr class="my-4">
      <p class="text-white">Peminjaman Alat Musik untuk Mahasiswa Universitas Pasundan</p>
      <a href="includes/new_login.php" class="btn btn-lg text-white"><i class="fas fa-play"></i> Let's Start</a>
    </div>
  </div>

  <section class="home mt-4" id="home">
    <div class="container">
      <h1 class="text-center">Popular Musical Instrument</h1>
      <hr class="my-4">
      <div class="row">
        <?php foreach ($alat_musik as $am) : ?>
        <div class="col-md-4">
          <div class="card mb-5 mt-5" style="width: 16rem; margin: auto;">
            <img class="card-img-top" src="assets/image/upload/<?= $am['gambar'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?= $am['nama_alat_musik'] ?></h5>
              <a href="includes/details.php?id=<?= $am['id'] ?>" class="view_data btn btn-dark" style="background-color: rgb(130, 14, 208);">Details</a>
            </div>
          </div>
      </div>
      <?php endforeach ?>
    </div>
    <div class="lebih_banyak text-center mt-5">
      <a href="includes/produk.php">See More Product</a>
      <hr class="my-4">
    </div>
    </div>
  </section>

  <footer class="text-white bg-dark mt-5 pt-5">
    <div class="container">
      <div class="row p-3">
        <div class="col">
          <h5>Social Media</h5>
          <ul type="none">
            <li>
              <a href="https://www.instagram.com/sqlite3/" class="badge badge-light"><i class="fab fa-instagram"></i> Instagram</a>
            </li>
            <li>
            <a href="https://github.com/AldiAgeng" class="badge badge-light"><i class="fab fa-github"></i> Github</a>
            </li>
            <li>
              <a href="https://twitter.com/aldiageng48" class="badge badge-light"><i class="fab fa-twitter"></i> Twitter</a>
            </li>
          </ul>
        </div>
        <div class="col">
          <h5>About Us</h5>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, atque possimus labore accusamus quasi qui
            enim, nulla unde dolore molestias tenetur beatae libero eaque commodi reprehenderit? Aliquam illum itaque
            error!</p>
        </div>
        <div class="col">
          <h5>Collaboration</h5>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>