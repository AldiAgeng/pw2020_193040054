<?php
  require '../config/functions.php';
  $id_admin = $_GET['id_admin'];
  
  $admin = query("SELECT * FROM admin WHERE id_admin = '$id_admin' ")[0];
  if(isset($_POST['ubah'])){
    if(ubah_admin($_POST) > 0){
      echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href = 'admin.php';
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
      <h3><i class="fas fa-users-cog mr-2"></i> UBAH admin</a></h3><hr>
      
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" value="<?= $admin['username'] ?>" class="form-control" id="username" placeholder="Username" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" value="<?= $admin['password'] ?>" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="nama_admin">Nama Admin</label>
          <input type="text" name="nama_admin" value="<?= $admin['nama_admin'] ?>" class="form-control" id="nama_admin" placeholder="Nama Admin" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="no_hp">No HP</label>
          <input type="text" name="no_hp" value="<?= $admin['no_hp'] ?>" class="form-control" id="no_hp" placeholder="NO HP" autocomplete="off" required>
        </div>
        <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
        <a href="admin.php" type="submit" class="btn btn-info">Kembali</a>
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