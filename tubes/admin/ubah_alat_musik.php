<?php
  session_start();
  if(!isset($_SESSION["username"])){
  header("Location: ../includes/new_login.php");
  exit;
}

  require '../config/functions.php';

  $id = $_GET['id'];
  $alat_musik = query("SELECT * FROM alat_musik WHERE id = $id")[0];

  if(isset($_POST['ubah'])){
    if(ubah($_POST) > 0){
      echo "<script>
        alert('Data Berhasil Diubah!');
        document.location.href = 'alat_musik.php';
      </script>";
    }else{
      echo "<script>
        alert('Data Gagal Diubah!');
        document.location.href = 'alat_musik.php';
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
    form img{
      width: 50px;
      height: 50px;
    }
    nav{
      background: rgb(130, 14, 208);
    }
    </style>


    <title>HappyMusical | Alat Musik</title>
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
      <h3><i class="fas fa-music mr-2"></i> UBAH ALAT MUSIK</a></h3><hr>
      
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $alat_musik['id'] ?>">
        <div class="form-group">
          <label for="nama_alat_musik">Nama Alat Musik</label>
          <input type="text" name="nama_alat_musik" class="form-control" id="nama_alat_musik" placeholder="Nama Alat Musik" required value="<?= $alat_musik['nama_alat_musik'] ?>">
        </div>
        <div class="form-group">
          <label for="merk">Merk</label>
          <input type="text" name="merk" class="form-control" id="merk" placeholder="Merk" required value="<?= $alat_musik['merk'] ?>">
        </div>
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" required value="<?= $alat_musik['harga'] ?>">
        </div>
        <div class="form-group">
          <label for="cara_dimainkan">Cara Dimainkan</label>
          <input type="text" name="cara_dimainkan" class="form-control" id="cara_dimainkan" placeholder="Cara Dimainkan" required value="<?= $alat_musik['cara_dimainkan'] ?>">
        </div>
        <div class="form-group">
          <label for="jumlah_alat">Jumlah Alat</label>
          <input type="text" name="jumlah_alat" class="form-control" id="jumlah_alat" placeholder="Jumlah Alat" required value="<?= $alat_musik['jumlah_alat'] ?>">
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="hidden" name="gambar_lama" value="<?= $alat_musik['gambar'] ?>">
          <input type="file" name="gambar" class="form-control" id="gambar" placeholder="Gambar" value="<?= $alat_musik['gambar'] ?>">
        </div>
        <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
        <a href="alat_musik.php" type="submit" class="btn btn-info">Kembali</a>
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