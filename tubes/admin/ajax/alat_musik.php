<?php
  require '../../config/functions.php';
  $keyword = $_GET['keyword'];
  $query = ("SELECT * FROM alat_musik WHERE 
            nama_alat_musik LIKE '%$keyword%' OR
            merk LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR 
            cara_dimainkan LIKE '%$keyword%' OR
            jumlah_alat LIKE '%$keyword%' ");
  $alat_musik = query($query);
  ?>
<table class="table text-center mt-3">
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