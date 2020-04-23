<?php
  require 'functions.php';
   $alat_musik = query("SELECT * FROM alat_musik");
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
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-free/css/all.min.css">

    <!-- MYCSS -->
    
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

    .table img{
      width: 50px;
      height: 50px;
    }
    </style>


    <title>Hello, world!</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#">Selamat Datang Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
      <div class="icon ml-auto">
        <h5>
          <i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
          <i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></i>
        </h5>
      </div>
    </div>
    </div>
  </nav>

  <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link active text-white" href="#">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="admin.php">
            <i class="fas fa-music mr-2"></i> Daftar Alat Musik</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-book-open mr-2"></i> Daftar Peminjaman</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-users mr-2"></i> Daftar User</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <i class="fas fa-users-cog mr-2"></i> Daftar Admin</a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>

    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-music mr-2"></i> DAFTAR ALAT MUSIK</a></h3><hr>

      <div class="row">
        <div class="col">
          <a href="tambah.php" type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-plus-circle"></i> Tambah Alat Musik</a>
        </div>

        <div class="col" style="margin-left:560px;">
          <form class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" placeholder="Cari">
            </div>
            <button type="submit" class="btn btn-dark mb-2">Cari</button>
          </form>
        </div>
      </div>


      <table class="table text-center mt-3">
        <thead class="thead-dark table-bordered">
          <tr>
            <th scope="col">#</th>
            <th scope="col">GAMBAR</th>
            <th scope="col">NAMA ALAT MUSIK</th>
            <th scope="col">MERK</th>
            <th scope="col">HARGA</th>
            <th scope="col">CARA DIMAINKAN</th>
            <th scope="col">JUMLAH ALAT</th>
            <th colspan="3" scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php $i =1; ?>
          <?php foreach ($alat_musik as $am) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><img src="../assets/img/<?= $am["gambar"] ?>"></td>
            <td><?= $am["nama_alat_musik"] ?></td>
            <td><?= $am["merk"] ?></td>
            <td><?= $am["harga"] ?></td>
            <td><?= $am["cara_dimainkan"] ?></td>
            <td><?= $am["jumlah_alat"] ?></td>
            <td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i> Edit</button></td>
            <td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Hapus Data"><i class="fas fa-trash-alt"></i> Hapus</button></td>
          </tr>
          <?php $i++ ?>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col">
          <hr>
          <footer><p>Copyright&#169; AldiAgeng2020</p></footer>
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