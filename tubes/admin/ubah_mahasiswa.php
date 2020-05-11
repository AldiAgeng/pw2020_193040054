<?php
  require '../config/functions.php';
  $id_mahasiswa = $_GET['id_mahasiswa'];
  
  $mahasiswa = query("SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa' ")[0];
  if(isset($_POST['ubah'])){
    if(ubah_mahasiswa($_POST) > 0){
      echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href = 'mahasiswa.php';
      </script>";
    }else{
      echo "<script>
        alert('Data Gagal Diubah');
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
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome-free/css/all.min.css">

    <style>
    nav{
      background: rgb(130, 14, 208);
    }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#">Selamat Datang Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    </div>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-5">
      <div class="col p-5 pt-2">
      <h3><i class="fas fa-users mr-2"></i> UBAH MAHASISWA</a></h3><hr>
      
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa'] ?>">
          <label for="nrp">NRP</label>
          <input type="text" name="nrp" value="<?= $mahasiswa['nrp'] ?>" class="form-control" id="nrp" placeholder="NRP" autofocus autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="nama">Nama Mahasiswa</label>
          <input type="text" name="nama" value="<?= $mahasiswa['nama'] ?>" class="form-control" id="nama" placeholder="Nama Mahasiswa" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" value="<?= $mahasiswa['jurusan'] ?>" class="form-control" id="jurusan" placeholder="Jurusan" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" value="<?= $mahasiswa['username'] ?>" class="form-control" id="username" placeholder="Username" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" value="<?= $mahasiswa['password'] ?>" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
        <a href="mahasiswa.php" type="submit" class="btn btn-info">Kembali</a>
      </form>
    
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