<?php 
session_start();
require '../config/functions.php';
//cek apakah yg tadi login admin atau mahasiswa
if(isset($_SESSION['username']) AND $_SESSION['level'] == 'admin'){
  //cek apakah admin sudah melakukan login jika sudah direct ke halaman dashoard admin
    header("Location: ../admin/dashboard.php");
    exit;
  }else{
  //cek apakah mahasiswa sudah melakukan login jika sudah direct ke halaman mahasiswa_riwayat
  if(isset($_SESSION['username'])){
    header("Location: mahasiswa_riwayat.php");
    exit;
  }
}
  //Login
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek_admin = mysqli_query(koneksi(), "SELECT * FROM admin WHERE username = '$username'");
    $cek_mahasiswa = mysqli_query(koneksi(), "SELECT * FROM mahasiswa WHERE username = '$username'");

    //cocokan USERNAME dan PASSWORD
    if(mysqli_num_rows($cek_admin) > 0){
      $row = mysqli_fetch_assoc($cek_admin);
      if(password_verify($password,$row['password'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['hash'] = hash('sha256', $row['id_admin'], false);
        $_SESSION['level'] = 'admin';
      if(hash('sha256', $row['id_admin']) == $_SESSION['hash']){
        header("Location: ../admin/dashboard.php");
        die;
      }
      header("Location: ../index.php");
      die;
    }
  }
    
    if(mysqli_num_rows($cek_mahasiswa) > 0){
      $row = mysqli_fetch_assoc($cek_mahasiswa);
      if(password_verify($password,$row['password'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['hash'] = hash('sha256', $row['id_mahasiswa'], false);
        $_SESSION['level'] = 'mahasiswa';
      if(hash('sha256', $row['id_mahasiswa']) == $_SESSION['hash']){
        header("Location: mahasiswa_riwayat.php");
        die;
      }
      header("Location: ../index.php");
      die;
    }
  }
  $error = true;
}

// REGISTRASI
if(isset($_POST['register'])){
  if(registrasi($_POST) > 0){
    echo "<script>
    alert('Registrasi Berhasil');
    document.location.href = 'new_login.php';
    </script>";
  }else{
    echo "<script>
    alert('Registrasi Gagal');
    document.location.href = 'new_login.php';
    </script>";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>new_login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- FONTAWESOWE -->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome-free/css/all.min.css">

    <style>
    nav{
      background: rgb(130, 14, 208);
    }

    .copyright{
      background: rgb(130, 14, 208);
    }

  .register-photo {
    margin-top: -25px;
    background: #f1f7fc;
    padding: 80px 0;
  }

.register-photo .image-holder {
  display: table-cell;
  width: auto;
  background: url(../assets/image/5984123.jpg);
  background-size: cover;
}

.register-photo .form-container {
  display: table;
  max-width: 900px;
  width: 90%;
  margin: 0 auto;
  box-shadow: 1px 1px 5px rgba(0,0,0,0.1);
}

.register-photo form {
  display: table-cell;
  width: 400px;
  background-color: #ffffff;
  padding: 40px 60px;
  color: #505e6c;
}

@media (max-width:991px) {
  .register-photo form {
    padding: 40px;
  }
}

.register-photo form h2 {
  font-size: 24px;
  line-height: 1.5;
  margin-bottom: 30px;
}

.register-photo form .form-control {
  background: #f7f9fc;
  border: none;
  border-bottom: 1px solid #dfe7f1;
  border-radius: 0;
  box-shadow: none;
  outline: none;
  color: inherit;
  text-indent: 6px;
  height: 40px;
}

.register-photo form .form-check {
  font-size: 13px;
  line-height: 20px;
}

.register-photo form .btn-primary {
  background: rgb(130, 14, 208);
  border: none;
  border-radius: 4px;
  padding: 11px;
  box-shadow: none;
  margin-top: 35px;
  text-shadow: none;
  outline: none !important;
}

.register-photo form .btn-primary:hover, .register-photo form .btn-primary:active {
  background: #5b34bf;
}

.register-photo form .btn-primary:active {
  transform: translateY(1px);
}

.register-photo form .already {
  display: block;
  text-align: center;
  font-size: 12px;
  color: #6f7a85;
  opacity: 0.9;
  text-decoration: none;
}
@media (min-width: 768px) { 
.remember{
  position: absolute;
  top: 60px;
  color: white;
  right: 380px;
  font-size: 12px;
}
}
.remember{
  color: white;
  font-size: 12px;
  margin-right: 5px;
}
.navbar-brand,
.navbar-nav a {
    line-height: 65px;
    height: 65px;
    padding-top: 0;
    font-size: 25px;
}
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
  <a class="navbar-brand" href="../index.php"> <i class="fas fa-compact-disc"></i> HappyMusical</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  </button>
    <form class="form-inline my-2 my-lg-0" action="" method="post">
      <?php if(isset($error)) : 
        echo "<script>
              alert('Username atau Password salah');
        </script>";
    endif ?>
    <?php if(isset($error1)) : 
        echo "<script>
              alert('Akun anda belum diaktifkan oleh Admin');
        </script>";
    endif ?>
      <input class="form-control mr-sm-2 mb-2" name="username" type="text" placeholder="Username" aria-label="Username" autofocus autocomplete="off" required>
      <input class="form-control mr-sm-2 mb-2" name="password" type="password" placeholder="Password" aria-label="Password" autocomplete="off" required>
      <div class="remember float-left">
        <input type="checkbox" name="remember" id="remember">Remember Me. 
        </div>
      <button name="submit" class="btn btn-outline-light my-2 my-sm-0" type="submit">Login</button>
    </form>
  </div>
  </div>
</nav>


    
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="text" name="nrp" placeholder="NRP" autocomplete="off" required></div>
                <div class="form-group"><input class="form-control" type="text" name="nama" placeholder="Nama Mahasiswa" autocomplete="off" required></div>
                <div class="form-group"><input class="form-control" type="text" name="jurusan" placeholder="Jurusan" autocomplete="off" required></div>
                <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" autocomplete="off" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password1" placeholder="Password" autocomplete="off" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password2" placeholder="Password (repeat)" autocomplete="off" required></div>
                <div class="form-group">
                </div>
                <div class="form-group"><button name="register" class="btn btn-primary btn-block" type="submit">Sign Up</button></div>
        </div>
    </div>

    <div class="copyright text-center text-white font-weight-bold p-2">
    <p style="font-weight: 200; padding-top:20px;">AldiAgeng Copyright &#169; 2020 </p>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>