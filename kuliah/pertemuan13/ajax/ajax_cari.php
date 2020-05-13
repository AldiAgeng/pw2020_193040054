<?php
require '../functions.php';
  $mahasiswa = cari($_GET['keyword']);
?>

<table class="table mt-5">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if(empty($mahasiswa)) : ?>
    <tr>
      <td colspan="4" class="text-center"><h5>Data Mahasiswa Tidak Ditemukan</h5></td>
    </tr>
    <?php endif ?>
    <?php $i=1 ?>
    <?php foreach($mahasiswa as $m) :  ?>
    <tr class="text-center">
      <td class="pt-5"><?= $i ?></td>
      <td><img src="img/<?= $m['gambar'] ?>"></td>
      <td class="pt-5"><?= $m['nama'] ?></td>
      <td class="pt-5"><a href="detail.php?id=<?= $m['id'] ?>" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Hapus Data"><i class="fas fa-info-circle"></i> Lihat Detail</a></td>
    </tr>
    <?php $i++ ?>
    <?php endforeach ?>
  </tbody>
  </table>