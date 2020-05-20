<?php
  require '../../config/functions.php';

  $jumlahDataPerHalaman = 5;
  $jumlahData = count(query("SELECT * FROM peminjaman"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

  $keyword = $_GET['keyword'];
  $query = ("SELECT 
            peminjaman.id_peminjaman,
            peminjaman.tgl_pinjam,
            peminjaman.tgl_kembali,
            peminjaman.jam_pinjam,
            peminjaman.jam_kembali,
            mahasiswa.id_mahasiswa,
            mahasiswa.nama,
            peminjaman.id_alat_musik,
            alat_musik.nama_alat_musik
            FROM peminjaman 
            INNER JOIN mahasiswa ON peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
            INNER JOIN alat_musik ON peminjaman.id_alat_musik = alat_musik.id
            WHERE 
            peminjaman.tgl_pinjam LIKE '%$keyword%' OR
            peminjaman.tgl_kembali LIKE '%$keyword%' OR
            peminjaman.jam_pinjam LIKE '%$keyword%' OR 
            peminjaman.jam_kembali LIKE '%$keyword%' OR
            peminjaman.id_mahasiswa LIKE '%$keyword%' OR
            mahasiswa.nama LIKE '%$keyword%' OR
            peminjaman.id_alat_musik LIKE '%$keyword%' OR
            alat_musik.nama_alat_musik LIKE '%$keyword%' 
            GROUP BY peminjaman.id_peminjaman
            ORDER BY peminjaman.id_peminjaman DESC  LIMIT $awalData, $jumlahDataPerHalaman");
  $peminjaman = query($query);
  ?>
  <div class="table-responsive">
<table class="table text-center mt-3 table-hover">
        <thead class="thead-dark table-bordered">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Jam Pinjam</th>
            <th scope="col">Jam Kembali</th>
            <th scope="col">Id Mahasiswa</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Id Alat Musik</th>
            <th scope="col">Nama Alat Musik</th>
            <th colspan="3" scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($peminjaman)) : ?>
          <tr>
            <td colspan="9">
              <h3>Data Tidak Ditemukan</h3>
            </td>
          </tr>
          <?php else : ?>
          <?php $i =1; ?>
          <?php foreach ($peminjaman as $pm) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $pm['tgl_pinjam'] ?></td>
            <td><?= $pm['tgl_kembali'] ?></td>
            <td><?= $pm['jam_pinjam'] ?></td>
            <td><?= $pm['jam_kembali'] ?></td>
            <td><?= $pm['id_mahasiswa'] ?></td>
            <td><?= $pm['nama'] ?></td>
            <td><?= $pm['id_alat_musik'] ?></td>
            <td><?= $pm['nama_alat_musik'] ?></td>
            <td><a href="ubah_peminjaman.php?id_peminjaman=<?= $pm['id_peminjaman'] ?>" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i> Edit</a></td>
            <td><a href="hapus_peminjaman.php?id_peminjaman=<?= $am['id_peminjaman'] ?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data"><i class="fas fa-trash-alt"></i> Hapus</a></td>
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