<?php
  session_start();
  if(!isset($_SESSION["username"])){
  header("Location: ../includes/new_login.php");
  exit;
}
  require '../config/functions.php';

  $username = $_SESSION['username'];
  $user_admin = query("SELECT * FROM admin WHERE username = '$username' ")[0];


  $jumlahDataPerHalaman = 5;
  $jumlahData = count(query("SELECT * FROM alat_musik"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

  $alat_musik = query("SELECT * FROM alat_musik LIMIT $awalData, $jumlahDataPerHalaman");

  // if(isset($_POST['cari'])){
  //   $keyword = $_POST['keyword'];
  //   $alat_musik = query("SELECT * FROM alat_musik WHERE 
  //                       nama_alat_musik LIKE '%$keyword%' OR
  //                       merk LIKE '%$keyword%' OR
  //                       harga LIKE '%$keyword%' OR 
  //                       cara_dimainkan LIKE '%$keyword%' OR
  //                       jumlah_alat LIKE '%$keyword%' ");
  // }else{
  //   $alat_musik = query("SELECT * FROM alat_musik");
  // }

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

    .table img{
      width: 50px;
      height: 50px;
    }
    .icon a{
      color: white;
    }
    .loader{
      width: 100px;
      position: absolute;
      top:30px;
      right: 910px;
      z-index: 1;
      display: none;
    }
    .icon a{
      color: white;
      font-size: 12px;
    }
    </style>

    
    <title>HappyMusical | Alat Musik</title>
    <!-- <script src="../asset/js/jquery-3.2.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#tombol-cari-musik').hide();
        $('#keyword-musik').on('keyup', function () {
          $('.loader').show();
          $('#tabel-musik').load('ajax/alat_musik.php?keyword=' + $('#keyword-musik').val());
        });
      });
    </script>
    
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
      <h3><i class="fas fa-music mr-2"></i> DAFTAR ALAT MUSIK</a></h3><hr>

      <div class="row">
        <div class="col">
          <a href="tambah_alat_musik.php" type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-plus-circle"></i> Tambah Alat Musik</a>
          <form class="form-inline mt-2" style="margin-left: -10px;" action="" method="post">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" placeholder="Cari" name="keyword" autocomplete="off" id="keyword-musik" autofocus>
            </div>
            <button type="submit" class="btn btn-dark mb-2 mr-3" name="cari" id="tombol-cari-musik">Cari</button>
            <img src="../assets/image/Ring-Loading.gif" class="loader">
          </form>
        
      </div>
        </div>

        


      <div id="tabel-musik">
      <div class="table-responsive">
      <table class="table text-center mt-3 table-hover">
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
          <?php if (empty($alat_musik)) : ?>
          <tr>
            <td colspan="9">
              <h3>Data Tidak Ditemukan</h3>
            </td>
          </tr>
          <?php else : ?>
          <?php $i =1; ?>
          <?php foreach ($alat_musik as $am) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><img src="../assets/image/upload/<?= $am["gambar"] ?>"></td>
            <td><?= $am["nama_alat_musik"] ?></td>
            <td><?= $am["merk"] ?></td>
            <td><?= $am["harga"] ?></td>
            <td><?= $am["cara_dimainkan"] ?></td>
            <td><?= $am["jumlah_alat"] ?></td>
            <td><a href="ubah_alat_musik.php?id=<?= $am['id'] ?>" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i> Edit</a></td>
            <td><a href="hapus_alat_musik.php?id=<?= $am['id'] ?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data"><i class="fas fa-trash-alt"></i> Hapus</a></td>
          </tr>
          <?php $i++ ?>
          <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
      </div>
      
        <div aria-label="Page navigation example float-right">
            <ul class="pagination">
              <?php if($halamanAktif > 1) : ?>
              <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif - 1 ?>">Previous</a></li>
              <?php endif ?>

              <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if($i == $halamanAktif) : ?>
              <li class="page-item"><a class="page-link" href="?page=<?= $i ?>" style="font-weight: bold;"><?= $i ?></a></li>
                <?php else : ?>
              <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                <?php endif ?>
              <?php endfor ?>

              <?php if($halamanAktif < $jumlahHalaman) : ?>
              <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif + 1 ?>">Next</a></li>
              <?php endif ?>
            </ul>
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

    
    <!-- MYJS -->
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>