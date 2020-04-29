<?php
  require 'functions.php';
  $id = $_GET['id'];
  
  $mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");
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
    max-width: 300px;
  }
  table{
    font-size: 22px;
    margin-left: -80px;
  }
  table td{
    padding: 5px;
  }
  </style>

    <title>Detail Mahasiswa</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Universitas Pasundan</a>
    </div>
    </nav>

    <div class="container">
      <div class="row mt-5 pt-5 text-center">
        <div class="col">
          <h1>Detail Data Mahasiswa</h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="latar bg-white">
        <div class="row">
          <div class="col pt-5 pl-5 pb-5">
            <img src="img/<?= $mahasiswa['gambar'] ?>" class="rounded float-left mt-1" alt="...">
            <br>
          </div>
          <div class="col mt-5 pt-5">
            <div class="card mt-2 border-0">
              <table border="0">
                <tr>
                  <td><b>NRP</b></td>
                  <td>:</td>
                  <td><b><?= $mahasiswa['nrp'] ?></b></td>
                </tr>
                <tr>
                  <td><b>Nama</b></td>
                  <td>:</td>
                  <td><b><?= $mahasiswa['nama'] ?></b></td>
                </tr>
                <tr>
                  <td><b>Email</b></td>
                  <td>:</td>
                  <td><b><?= $mahasiswa['email'] ?></b></td>
                </tr>
                <tr>
                  <td><b>Jurusan</b></td>
                  <td>:</td>
                  <td><b><?= $mahasiswa['jurusan'] ?></b></td>
                </tr>
              </table>
            </div>
            <div class="tombol mt-5">
            <a href="index.php" type="button" class="btn btn-primary mt-2">Kembali</a>
            <a href="ubah.php?id=<?= $mahasiswa['id'] ?>" type="button" class="btn btn-info mt-2">Ubah</a>
            <a href="hapus.php?id=<?= $mahasiswa['id'] ?>" onclick="return confirm('Apakah anda yakin?');" type="button" class="btn btn-danger mt-2">Hapus</a>
            </div>
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