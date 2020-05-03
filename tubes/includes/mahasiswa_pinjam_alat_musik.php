<?php
session_start();
  require '../config/functions.php';

  $username = $_SESSION['username'];
  $mahasiswa = query("SELECT * FROM mahasiswa WHERE username = '$username' ")[0];
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

    <!-- MYCSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">

    <style>
    .nav-link:hover {
  background-color: gray;
  }
    .card-body-icon{
      position: absolute;
      z-index: 0;
      top : 25px;
      right: 4px;
      opacity: 0.5;
      font-size: 90px;
    }
    .icon a{
      color: white;
    }
    </style>


    <title>Hello, world!</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#">Selamat Datang <?= $mahasiswa['nama'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
      <div class="icon ml-auto">
        <h5>
          <a href="../config/logout.php"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></a></i>
        </h5>
      </div>
    </div>
    </div>
  </nav>

  <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link active text-white" href="mahasiswa_riwayat.php">
            <i class="fas fa-history"></i> Riwayat Peminjaman</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="mahasiswa_pinjam_alat_musik.php">
            <i class="fas fa-music mr-2"></i> Pinjam Alat Musik</a>
          <hr class="bg-secondary">
        </li>
        <?php for($i = 1; $i <=20; $i++) : ?>
        <li>&nbsp;</li>
        <?php endfor ?>
      </ul>
    </div>

    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-music mr-2"> Pinjam Alat Musik</i></h3><hr>

      <div class="row">
        
        </div>
      </div>

    </div>
  </div>

    
    <!-- MYJS -->
    <script>
      $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
    <script src="../assets/js/admin.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>