<?php
  $conn = mysqli_connect("localhost","root","","pw_193040054") or die ("Database not connect");
  $result = mysqli_query($conn,"SELECT * FROM mahasiswa");

  $rows=[];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  $mahasiswa = $rows;
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
    <link rel="stylesheet" type="text/css" href="css/fontawesome-free/css/all.min.css">

    <!-- MYCSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <title>Daftar Mahasiswa</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#">Universitas Pasundan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
      <div class="icon ml-auto">
        <h5>
          <i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
          <i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></i>
        </h5>
      </div>
    </div>
    </div>
  </nav>

  <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link active text-white" href="#">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="latihan1.php">
            <i class="fas fa-user-graduate"></i> Daftar Mahasiswa</a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>

  <div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-user-graduate"></i> DAFTAR MAHASISWA</a></h3><hr>

  <div class="row">
    <div class="col">
      <a href="#" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-plus-circle"></i> Tambah Mahasiswa</a>
    </div>
  </div>


  <table class="table mt-5">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">NRP</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Jurusan</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    <?php foreach($mahasiswa as $m) :  ?>
    <tr class="text-center">
      <td class="pt-5"><?= $i ?></td>
      <td><img src="img/<?= $m['gambar'] ?>"></td>
      <td class="pt-5"><?= $m['nrp'] ?></td>
      <td class="pt-5"><?= $m['nama'] ?></td>
      <td class="pt-5"><?= $m['email'] ?></td>
      <td class="pt-5"><?= $m['jurusan'] ?></td>
      <td class="pt-5"><button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i> Edit</button></td>
      <td class="pt-5"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Hapus Data"><i class="fas fa-trash-alt"></i> Hapus</button></td>
    </tr>
    <?php $i++ ?>
    <?php endforeach ?>
  </tbody>
  </table>
    
    <div class="row">
        <div class="col">
          <hr>
          <footer><p>Copyright&#169; AldiAgeng2020</p></footer>
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