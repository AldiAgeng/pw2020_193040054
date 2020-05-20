<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../includes/new_login.php");
  exit;
}
    

  require '../config/functions.php';

  $username = $_SESSION['username'];
  $user_admin = query("SELECT * FROM admin WHERE username = '$username' ")[0];


  $jumlah_alat_musik = mysqli_query(koneksi(),"SELECT * FROM alat_musik");
  $jumlah_mahasiswa = mysqli_query(koneksi(), "SELECT * FROM mahasiswa");
  $jumlah_peminjaman = mysqli_query(koneksi(), "SELECT * FROM peminjaman");
  $data_musik = mysqli_num_rows($jumlah_alat_musik);
  $data_mahasiswa = mysqli_num_rows($jumlah_mahasiswa);
  $data_peminjaman = mysqli_num_rows($jumlah_peminjaman);
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

    <!-- MYCSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">

    <link rel="shortcut icon" href="../assets/image/favicon.ico">

    <style>
    nav{
      background: rgb(130, 14, 208);
    }
    .card-body-icon{
      position: absolute;
      z-index: 0;
      top : 25px;
      right: 4px;
      opacity: 0.5;
      font-size: 90px;
    }
    .icon a{
      color: white;
      font-size: 12px;
    }
    @media (min-width: 576px) {
      .card{
        margin-left: 20px;
      }
    }
    .cetak a{
      display : block;
    }
    </style>


    <title>HappyMusical | Dashboard</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
    <a class="navbar-brand text-white" href="#"><i class="fas fa-compact-disc"></i> HappyMusical</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <div class="icon ml-auto">
              <p class="mt-1">
                <a href="../config/logout.php"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"> Sign Out</a></i>
              </p>
            </div>
          </li>
        </ul>
      </div>
    
  </div>
  
  </nav>


  <div class="row no-gutters">
    <div class="col-md-2 bg-dark pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <h4 class="text-white text-center"><i class="far fa-user-circle"></i></h4>
          <p class="text-white text-center">SELAMAT DATANG</p>
          <p class="text-white text-center"><?= $user_admin['nama_admin'] ?></p>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" href="dashboard.php">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="alat_musik.php">
            <i class="fas fa-music mr-2"></i> Daftar Alat Musik</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="peminjaman.php">
            <i class="fas fa-book-open mr-2"></i> Daftar Peminjaman</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="mahasiswa.php">
            <i class="fas fa-users mr-2"></i> Daftar Mahasiswa</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="admin.php">
            <i class="fas fa-users-cog mr-2"></i> Daftar Admin</a>
          <hr class="bg-secondary">
        </li>
        <?php for($i = 1; $i <=11; $i++) : ?>
        <li>&nbsp;</li>
        <?php endfor ?>
      </ul>
    </div>

    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a></h3><hr>

      <div class="row text-white">

      <div class="cetak">
      <div class="row">
      <div class="col">
      <a  href="../laporan_alat_musik.php" target="_blank" type="button" class="btn btn-dark mb-4 mt-3" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-print"></i> Laporan Alat Musik</a>

      <a href="../laporan_peminjaman.php" type="button" class="btn btn-dark mb-4" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-print"></i> Laporan Peminjaman</a>

      <a href="../laporan_mahasiswa.php" type="button" class="btn btn-dark mb-4" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-print"></i> Laporan Mahasiswa</a>
    </div>
    </div>
    </div>

        <div class="card bg-danger mb-1" style="width: 18rem;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-music mr-2"></i>
            </div>
            <h5 class="card-title">JUMLAH ALAT MUSIK : </h5>
            <div class="display-4"><b><?= $data_musik ?></b></div>
            <a href="alat_musik.php"><p class="card-text text-white">Lihat Detail >>></p></a>
          </div>
        </div>

        <div class="card bg-primary mb-1" style="width: 18rem;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-book-open mr-2"></i>
            </div>
            <h5 class="card-title">JUMLAH PEMINJAMAN : </h5>
            <div class="display-4"><b><?= $data_peminjaman ?></b></div>
            <a href="peminjaman.php"><p class="card-text text-white">Lihat Detail >>></p></a>
          </div>
        </div>

        <div class="card bg-success mb-1" style="width: 18rem;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-users mr-2"></i>
            </div>
            <h5 class="card-title">JUMLAH MAHASISWA : </h5>
            <div class="display-4"><b><?= $data_mahasiswa ?></b></div>
            <a href="mahasiswa.php"><p class="card-text text-white">Lihat Detail >>></p></a>
          </div>
        </div>

      </div>

      <div class="row">
          <div class="col">
            <hr>
            <footer><p>Copyright&#169; AldiAgeng2020</p></footer>
          </div>
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