<?php
  session_start();
  if(!isset($_SESSION["username"])){
  header("Location: ../includes/new_login.php");
  exit;
}

  require '../config/functions.php';
  if(isset($_POST['tambah'])){
    if(tambah_mahasiswa($_POST) > 0){
      echo "<script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'mahasiswa.php';
      </script>";
    }else{
      echo "<script>
        alert('Data Gagal Ditambahkan!');
        document.location.href = 'mahasiswa.php';
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

    <link rel="shortcut icon" href="../assets/image/favicon.ico">

    <style>
    nav{
      background: rgb(130, 14, 208);
    }
    </style>

    <title>HappyMusical | Mahasiswa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
    <a class="navbar-brand text-white" href="#"><i class="fas fa-compact-disc"></i> HappyMusical</a>
  
    </div>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-5">
      <div class="col p-5 pt-2">
      <h3><i class="fas fa-users mr-2"></i> TAMBAH MAHASISWA</a></h3><hr>
      
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nrp">NRP</label>
          <input type="text" name="nrp" class="form-control" id="nrp" placeholder="NRP" autofocus autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="nama">Nama Mahasiswa</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mahasiswa" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Username" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-info">Tambah</button>
        <a href="mahasiswa.php" type="submit" class="btn btn-info">Kembali</a>
      </form>
    
    </div>
  </div>
  <div class="row">
        <div class="col">
          <hr>
          <footer><p>Copyright&#169; AldiAgeng2020</p></footer>
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