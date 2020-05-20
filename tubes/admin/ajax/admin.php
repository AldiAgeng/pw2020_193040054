<?php
  require '../../config/functions.php';
  $keyword = $_GET['keyword'];

  $jumlahDataPerHalaman = 5;
  $jumlahData = count(query("SELECT * FROM admin"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

  $query = ("SELECT * FROM admin WHERE 
            username LIKE '%$keyword%' OR
            nama_admin LIKE '%$keyword%' OR
            no_hp LIKE '%$keyword%' LIMIT $awalData, $jumlahDataPerHalaman");
  $admin = query($query);
  ?>

  <table class="table text-center mt-3 table-hover">
        <thead class="thead-dark table-bordered">
          <tr>
            <th scope="col">#</th>
            <th scope="col">USERNAME</th>
            <th scope="col">NAMA ADMIN</th>
            <th scope="col">NO HP</th>
            <th colspan="3" scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($admin)) : ?>
          <tr>
            <td colspan="9">
              <h3>Data Tidak Ditemukan</h3>
            </td>
          </tr>
          <?php else : ?>
          <?php $i =1; ?>
          <?php foreach ($admin as $adm) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $adm["username"] ?></td>
            <td><?= $adm["nama_admin"] ?></td>
            <td><?= $adm["no_hp"] ?></td>
            <td><a href="ubah_admin.php?id_admin=<?= $adm['id_admin'] ?>" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i> Edit</a></td>
            <td><a href="hapus_admin.php?id_admin=<?= $adm['id_admin'] ?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data"><i class="fas fa-trash-alt"></i> Hapus</a></td>
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