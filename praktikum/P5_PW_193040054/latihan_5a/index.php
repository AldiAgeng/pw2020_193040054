<!-- Image By https://id.yamaha.com/ -->
<!-- Boostrap Online -->
<!-- Aldi Ageng Tri Seftian (193040054) -->
<?php
  $conn = mysqli_connect("localhost","root","") or die ("Koneksi ke DB gagal");

  mysqli_select_db($conn,"tubes_193040054") or die ("Database salah");

  $query = mysqli_query($conn,"SELECT * FROM alat_musik ORDER BY id ASC");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS ME -->
    <style>
    *{
      margin: auto;
    }
  img{
    height: 150px;
  }
  table{
    text-align: center;
  }
  table td{
    line-height: 150px;
  }
  </style>

    <title>Data Alat Music</title>
  </head>
  <body>
    <div class="container">
    <table class="table table-bordered table-striped table-responsive-sm table-dark">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Merk</th>
      <th scope="col">Harga</th>
      <th scope="col">Cara Dimainkan</th>
      <th scope="col">Jumlah Alat</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php while($row = mysqli_fetch_assoc($query)) : ?>
    <tr>
      <td><?= $i ?></td>
      <td><img src="assets/img/<?= $row["gambar"] ?>"></td>
      <td><?= $row["nama_alat_musik"] ?></td>
      <td><?= $row["merk"] ?></td>
      <td><?= $row["harga"]?></td>
      <td><?= $row["cara_dimainkan"]?></td>
      <td><?= $row["jumlah_alat"]?></td>
    </tr>
    <?php $i++ ?>
    <?php endwhile ?>
  </tbody>
</table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>