<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'config/functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
$jumlah_mahasiswa = mysqli_query(koneksi(),"SELECT * FROM mahasiswa");
$data_mahasiswa = mysqli_num_rows($jumlah_mahasiswa);
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
      margin: auto;
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
    <h1>Laporan Mahasiswa</h1>
    <hr>
    <p>Jumlah Mahasiswa : <b>'.$data_mahasiswa.'</b></p>
    <p>Dicetak Tanggal : <b>'.$tanggal_sekarang.'</b></p>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>NRP</th>
            <th>NAMA MAHASISWA</th>
            <th>JURUSAN</th>
            <th>USERNAME</th>
          </tr>
        </thead>
        <tbody>';
        $i =1;
        foreach ($mahasiswa as $mhs) {
          $html .= '<tr>
          <td>'. $i++ .'</td>
          <td>'.$mhs["nrp"].'</td>
          <td>'.$mhs["nama"].'</td>
          <td>'.$mhs["jurusan"].'</td>
          <td>'.$mhs["username"].'</td>
          </tr>';
        }

$html .= '</tbody>
  </table>
  </body>
  </html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('laporan_mahasiswa.pdf', \Mpdf\Output\Destination::DOWNLOAD);