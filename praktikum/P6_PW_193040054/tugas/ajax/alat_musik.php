<?php
  require '../php/functions.php';
  $keyword = $_GET["keyword"];
  $query = "SELECT * FROM alat_musik WHERE 
                        nama_alat_musik LIKE '%$keyword%' OR
                        merk LIKE '%$keyword%' OR
                        harga LIKE '%$keyword%' OR 
                        cara_dimainkan LIKE '%$keyword%' OR
                        jumlah_alat LIKE '%$keyword%' ";
  $alat_musik = query($query);
?>
<div class="row">
    <?php foreach($alat_musik as $am) : ?>
      <div class="col-sm-3 mb-3">
        <div class="card  mt-3">
        <img class="card-img-top" src="assets/img/<?= $am["gambar"] ?>" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><?= $am["nama_alat_musik"] ?></h5>
        <a href="php/detail.php?id=<?= $am['id']; ?>" class="btn btn-primary">Detail</a>
        </div>
        </div>
      </div>
  <?php endforeach ?>
  </div>    