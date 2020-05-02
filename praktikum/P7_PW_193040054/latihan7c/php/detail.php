<!-- Image By https://id.yamaha.com/ -->
<!-- Boostrap Online -->
<!-- Aldi Ageng Tri Seftian (193040054) -->
<?php
  if(!isset($_GET['id'])){
    header("location: ../index.php");
    exit;
  }
  require 'functions.php';

  $id = $_GET['id'];
  
  $alat_musik = query("SELECT * FROM alat_musik WHERE id = $id")[0];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS ME -->
    <style>
  .latar{
    margin: auto;
    margin-top: 30px !important;
    width: 1000px;
    height: 500px;
    border: 1px solid black;
  }
  img{
    min-height: 450px;
    max-height: 450px;
    max-width: 396px;
  }
  </style>

    <title>Data Alat Music</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Peminjaman Alat Musik</a>
    </div>
    </nav>

    <div class="container">
      <div class="row mt-5 pt-5 text-center">
        <div class="col">
          <h1>Detail</h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="latar bg-white">
        <div class="row">
          <div class="col">
            <img src="../assets/img/<?= $alat_musik["gambar"] ?>" class="rounded float-left mt-1" alt="...">
          </div>
          <div class="col">
            <h1 class="mt-5"><?= $alat_musik["nama_alat_musik"] ?></h1>
            <div class="card mt-5" style="width: 25rem;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Merk : <b><?= $alat_musik["merk"] ?></b></li>
                <li class="list-group-item">Harga : <b>Rp.<?= $alat_musik["harga"] ?></b></li>
                <li class="list-group-item">Cara Dimainkan : <b><?= $alat_musik["cara_dimainkan"] ?></b></li>
                <li class="list-group-item">Jumlah : <b><?= $alat_musik["jumlah_alat"] ?></b></li>
              </ul>
            </div>
            <a href="../index.php" type="button" class="btn btn-primary mt-2">Kembali</a>
          </div>
        </div>
      </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>