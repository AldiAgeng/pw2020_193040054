<!-- Image By https://id.yamaha.com/ -->
<!-- Boostrap Online -->
<!-- Aldi Ageng Tri Seftian (193040054) -->
<?php
  require "php/functions.php";
  $alat_musik = query("SELECT * FROM alat_musik ORDER BY id ASC");
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
  .card-img-top{
    min-height: 250px;
    max-height: 250px;
  }
  .navbar{
    border-bottom: solid 0.5px rgba(0,0,0,0.10);"
  }
  h1{
    margin-top: 400px !important;
  }
  </style>

    <title>Data Alat Music</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Peminjaman Alat Musik</a>
      <form class="form-inline" action="" method="get">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" placeholder="Cari" name="keyword" id="keyword" autofocus>
            </div>
            <button type="submit" class="btn btn-dark mb-2 mr-3" name="cari" id="tombol-cari">Cari</button>
            <a href="php/admin.php" type="submit" class="btn btn-dark mb-2" name="refresh">Admin</a>
          </form>
        </div>
    </div>
    </nav>

  <!-- CARD -->
  <section class="alat">
    <h1 class="text-primary text-center mt-5 pt-5">DAFTAR ALAT MUSIK</h1>
  <div class="container" id="container">
    <div class="row">
    <?php foreach($alat_musik as $am) : ?>
      <div class="col-sm-3 mb-3">
        <div class="card  mt-3">
        <img class="card-img-top" src="assets/img/<?= $am["gambar"] ?>" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><?= $am["nama_alat_musik"] ?></h5>
        <a href="php/detail.php?id=<?= $am['id']; ?>" class="btn btn-primary">Detail</a>
        </div>
        </div>
      </div>
  <?php endforeach ?>
  </div>
  </div>
  </section>

    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>