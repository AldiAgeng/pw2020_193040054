<?php
  require '../config/functions.php';
  if(isset($_POST['register'])){
  if(registrasi($_POST) > 0){
    echo "<script>
    alert('Registrasi Berhasil');
    document.location.href = 'login.php';
    </script>";
  }else{
    echo "<script>
    alert('Registrasi Gagal');
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

    <title>Hello, world!</title>
  </head>
  <body>

  <!-- FORM -->
  <div class="container">
  <form action="" method="post">
    <div class="form-group mt-5">
      <input type="text" class="form-control" placeholder="Masukan NRP" name="nrp">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Masukan Nama" name="nama">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Masukan Jurusan" name="jurusan">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Masukan Username" name="username">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" placeholder="Masukan Password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="register">Register</button>
  </form>
  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>