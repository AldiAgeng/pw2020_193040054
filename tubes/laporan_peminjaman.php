<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'config/functions.php';
$query = "SELECT 
                  peminjaman.id_peminjaman,
                  peminjaman.tgl_pinjam,
                  peminjaman.tgl_kembali,
                  peminjaman.jam_pinjam,
                  peminjaman.jam_kembali,
                  mahasiswa.id_mahasiswa,
                  mahasiswa.nama,
                  peminjaman.id_alat_musik,
                  alat_musik.nama_alat_musik
                  FROM peminjaman,alat_musik,mahasiswa
                  WHERE peminjaman.id_alat_musik = alat_musik.id
                  AND peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa ORDER BY peminjaman.id_peminjaman DESC";

$peminjaman = query($query);
$jumlah_peminjaman = mysqli_query(koneksi(),"SELECT * FROM peminjaman");
$data_peminjaman = mysqli_num_rows($jumlah_peminjaman);
$tanggal_sekarang = date('d-m-Y');

$html = '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Alat Musik</title>
    <style>
    h1{
      text-align: center;
    }
    table{
      text-align: center;
    }
    thead tr{
      background-color: rgb(130, 14, 208);
    }
    thead tr th{
      color: white;
    }
    tr:nth-child(even){
      background-color: #C0C0C0;
    }
    </style>
  </head>
  <body>
    <h1>Laporan Peminjaman</h1>
    <hr>
    <p>Jumlah Peminjaman : <b>'.$data_peminjaman.'</b></p>
    <p>Dicetak Tanggal : <b>'.$tanggal_sekarang.'</b></p>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Jam Pinjam</th>
            <th>Jam Kembali</th>
            <th>Id Mahasiswa</th>
            <th>Nama Mahasiswa</th>
            <th>Id Alat Musik</th>
            <th>Nama Alat Musik</th>
          </tr>
        </thead>
        <tbody>';
        $i =1;
        foreach ($peminjaman as $pm) {
          $html .= '<tr>
          <td>'. $i++ .'</td>
          <td>'.$pm["tgl_pinjam"].'</td>
          <td>'.$pm["tgl_kembali"].'</td>
          <td>'.$pm["jam_pinjam"].'</td>
          <td>'.$pm["jam_kembali"].'</td>
          <td>'.$pm["id_mahasiswa"].'</td>
          <td>'.$pm["nama"].'</td>
          <td>'.$pm["id_alat_musik"].'</td>
          <td>'.$pm["nama_alat_musik"].'</td>
          </tr>';
        }

$html .= '</tbody>
  </table>
  </body>
  </html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('laporan_peminjaman.pdf', \Mpdf\Output\Destination::DOWNLOAD);