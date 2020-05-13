<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location: login.php");
  exit;
}
  require 'functions.php';

  if(isset($_POST['tambah'])){
    if(tambah($_POST)>0){
      echo "<script>
      alert('Data Berhasil Ditambahkan');
      document.location.href = 'index.php';
      </script>";
    }else {
      echo "<script>
      alert('Data Gagal Ditambahkan');
      document.location.href = 'index.php';
      </script>";
    }
  }
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


    <title>Tambah Mahasiswa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#">Universitas Pasundan</a>
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

  <div class="container">
    <div class="row mt-5">
      <div class="col p-5 pt-2">
      <h3><i class="fas fa-music mr-2"></i> TAMBAH MAHASISWA</a></h3><hr>
      
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nrp">NRP</label>
          <input type="text" name="nrp" class="form-control" id="nrp" placeholder="NRP" required>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" required>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" name="gambar" onchange="previewImage()" class="gambar form-control" id="gambar" placeholder="Gambar">
        </div>
        <img src="img/nophoto.jpg" width="100px" style="display: block; margin-bottom: 10px;" class="img-preview">
        <button type="submit" name="tambah" class="btn btn-info">Tambah</button>
        <a href="index.php" type="submit" class="btn btn-info">Kembali</a>
      </form>
    
    </div>
  </div>
  </div>
      

  <script src="js/script.js"></script>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>