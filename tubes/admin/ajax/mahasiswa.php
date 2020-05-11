<?php
  require '../../config/functions.php';
  $keyword = $_GET['keyword'];
  $query = ("SELECT * FROM mahasiswa WHERE 
            nrp LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword' OR
            username LIKE '%$keyword%'");
  $mahasiswa = query($query);
  ?>
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