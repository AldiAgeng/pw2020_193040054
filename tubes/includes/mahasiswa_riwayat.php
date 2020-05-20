<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: new_login.php");
  exit;
}
  require '../config/functions.php';

  $username = $_SESSION['username'];
  $mahasiswa = query("SELECT * FROM mahasiswa WHERE username = '$username' ")[0];

  $query_riwayat = "SELECT 
                  peminjaman.tgl_pinjam,
                  peminjaman.tgl_kembali,
                  peminjaman.jam_pinjam,
                  peminjaman.jam_kembali,
                  alat_musik.nama_alat_musik
                  FROM peminjaman,alat_musik,mahasiswa
                  WHERE peminjaman.id_alat_musik = alat_musik.id
                  AND peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
                  AND username = $username";
  $riwayat = query($query_riwayat);

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
    .nav-link:hover {
    background-color: gray;
    }
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
    }
    </style>


    <title>HappyMusical | Riwayat</title>
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
          <p class="text-white text-center"><?= $mahasiswa['nama'] ?></p>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" href="mahasiswa_riwayat.php">
            <i class="fas fa-history"></i> Riwayat Peminjaman</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="mahasiswa_pinjam_alat_musik.php">
            <i class="fas fa-music mr-2"></i> Pinjam Alat Musik</a>
          <hr class="bg-secondary">
        </li>
        <?php for($i = 1; $i <=20; $i++) : ?>
        <li>&nbsp;</li>
        <?php endfor ?>
      </ul>
    </div>

    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-history"></i> Riwayat Peminjaman</a></h3><hr>

      <div class="row">
        <div class="col">
          <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark ">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Jam Pinjam</th>
                <th scope="col">Jam Kembali</th>
                <th scope="col">Nama Alat Musik</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach($riwayat as $rwy) :
            ?>
              <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $rwy['tgl_pinjam'] ?></td>
                <td><?= $rwy['tgl_kembali'] ?></td>
                <td><?= $rwy['jam_pinjam'] ?></td>
                <td><?= $rwy['jam_kembali'] ?></td>
                <td><?= $rwy['nama_alat_musik'] ?></td>
              </tr>
            <?php
            $i++;
            endforeach;
            ?>
            </tbody>
          </table>
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