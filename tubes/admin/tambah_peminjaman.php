<?php
  session_start();
  if(!isset($_SESSION["username"])){
  header("Location: ../includes/new_login.php");
  exit;
}


  require '../config/functions.php';

  $mahasiswa = query("SELECT * FROM mahasiswa");
  $alat_musik = query("SELECT * FROM alat_musik");

  if(isset($_POST['tambah'])){
    if(tambah_peminjaman($_POST) > 0){
      echo "<script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'peminjaman.php';
      </script>";
    }else{
      echo "<script>
        alert('Data Gagal Ditambahkan!');
        document.location.href = 'peminjaman.php';
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

    <title>HappyMusical | Peminjaman</title>
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
      <h3><i class="fas fa-book-open mr-2"></i> TAMBAH PEMINJAMAN</a></h3><hr>
      
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="tgl_pinjam">Tanggal Pinjam</label>
          <input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" placeholder="Tanggal Pinjam"  autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="tgl_kembali">Tanggal Kembali</label>
          <input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" placeholder="Tanggal Kembali" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="jam_pinjam">Jam Pinjam</label>
          <input type="time" name="jam_pinjam" class="form-control" id="jam_pinjam" placeholder="Jam Pinjam" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="jam_kembali">Jam Kembali</label>
          <input type="time" name="jam_kembali" class="form-control" id="jam_kembali" placeholder="Jam Kembali" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="id_mahasiswa">Id Mahasiswa</label>
          <select id="id_mahasiswa" name="id_mahasiswa" class="custom-select" required>
            <?php foreach ($mahasiswa as $mhs) : ?>
            <option value="<?= $mhs['id_mahasiswa'] ?>"><?= $mhs['id_mahasiswa'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label for="id_alat_musik">Id Alat Musik</label>
          <select id="id_alat_musik" name="id_alat_musik" class="custom-select" required>
            <?php foreach ($alat_musik as $am) : ?>
            <option value="<?= $am['id'] ?>"><?= $am['id'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" name="tambah" class="btn btn-info">Tambah</button>
        <a href="peminjaman.php" type="submit" class="btn btn-info">Kembali</a>
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