<?php
  require '../config/functions.php';

  $mahasiswa = query("SELECT * FROM mahasiswa");

  // if(isset($_POST['cari'])){
  //   $keyword = $_POST['keyword'];
  //   $mahasiswa = query("SELECT * FROM mahasiswa WHERE 
  //                       nama_mahasiswa LIKE '%$keyword%' OR
  //                       merk LIKE '%$keyword%' OR
  //                       harga LIKE '%$keyword%' OR 
  //                       cara_dimainkan LIKE '%$keyword%' OR
  //                       jumlah_alat LIKE '%$keyword%' ");
  // }else{
  //   $mahasiswa = query("SELECT * FROM mahasiswa");
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

    <!-- MYCSS -->
    
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
      top:-13px;
      right: 10px;
      z-index: 1;
      display: none;
    }
    </style>

    
    <title>Hello, world!</title>
    <!-- <script src="../asset/js/jquery-3.2.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>

    </script>
    <script src="../assets/js/script1.js"></script>
    
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container">
    <a class="navbar-brand" href="#">Selamat Datang Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
      <div class="icon ml-auto">
        <h5>
          <a href="../config/logout.php"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></a></i>
        </h5>
      </div>
    </div>
    </div>
  </nav>

  <div class="row no-gutters">
    <div class="col-md-2 bg-dark pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
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
          <a class="nav-link text-white" href="#">
            <i class="fas fa-users-cog mr-2"></i> Daftar Admin</a>
          <hr class="bg-secondary">
        </li>
        <?php for($i = 1; $i <=11; $i++) : ?>
        <li>&nbsp;</li>
        <?php endfor ?>
      </ul>
    </div>

    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-users mr-2"></i> DAFTAR MAHASISWA</a></h3><hr>

      <div class="row">
        <div class="col">
          <a href="tambah_mahasiswa.php" type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-plus-circle"></i> Tambah Mahasiswa</a>
        </div>

        <div class="col" style="margin-left:670px;">
          <form class="form-inline" action="" method="post">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" placeholder="Cari" name="keyword" autocomplete="off" id="keyword-mahasiswa" autofocus>
            </div>
            <button type="submit" class="btn btn-dark mb-2 mr-3" name="cari" id="tombol-cari-mahasiswa">Cari</button>
            <img src="../assets/image/Ring-Loading.gif" class="loader">
          </form>
        </div>
      </div>


      <div id="tabel-mahasiswa">
      <table class="table text-center mt-3">
        <thead class="thead-dark table-bordered">
          <tr>
            <th scope="col">#</th>
            <th scope="col">NRP</th>
            <th scope="col">NAMA MAHASISWA</th>
            <th scope="col">JURUSAN</th>
            <th scope="col">USERNAME</th>
            <th colspan="3" scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($mahasiswa)) : ?>
          <tr>
            <td colspan="9">
              <h3>Data Tidak Ditemukan</h3>
            </td>
          </tr>
          <?php else : ?>
          <?php $i =1; ?>
          <?php foreach ($mahasiswa as $mhs) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $mhs["nrp"] ?></td>
            <td><?= $mhs["nama"] ?></td>
            <td><?= $mhs["jurusan"] ?></td>
            <td><?= $mhs["username"] ?></td>
            <td><a href="ubah_mahasiswa.php?id_mahasiswa=<?= $mhs['id_mahasiswa'] ?>" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i> Edit</a></td>
            <td><a href="hapus_mahasiswa.php?id_mahasiswa=<?= $mhs['id_mahasiswa'] ?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data"><i class="fas fa-trash-alt"></i> Hapus</a></td>
          </tr>
          <?php $i++ ?>
          <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
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