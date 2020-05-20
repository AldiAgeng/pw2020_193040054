<?php
  require '../../config/functions.php';


  $jumlahDataPerHalaman = 5;
  $jumlahData = count(query("SELECT * FROM mahasiswa"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

  $keyword = $_GET['keyword'];
  $query = ("SELECT * FROM mahasiswa WHERE 
            nrp LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword' OR
            username LIKE '%$keyword%' LIMIT $awalData, $jumlahDataPerHalaman");
  $mahasiswa = query($query);
  ?>
  <div class="table-responsive">
<table class="table text-center mt-3 table-hover">
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