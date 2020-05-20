<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'config/functions.php';
$alat_musik = query("SELECT * FROM alat_musik");
$jumlah_alat_musik = mysqli_query(koneksi(),"SELECT * FROM alat_musik");
$data_musik = mysqli_num_rows($jumlah_alat_musik);
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
    <h1>Laporan Alat Musik</h1>
    <hr>
    <p>Jumlah Alat Musik : <b>'.$data_musik.'</b></p>
    <p>Dicetak Tanggal : <b>'.$tanggal_sekarang.'</b></p>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>GAMBAR</th>
            <th>NAMA ALAT MUSIK</th>
            <th>MERK</th>
            <th>HARGA</th>
            <th>CARA DIMAINKAN</th>
            <th>JUMLAH ALAT</th>
          </tr>
        </thead>
        <tbody>';
        $i =1;
        foreach ($alat_musik as $am) {
          $html .= '<tr>
          <td>'. $i++ .'</td>
          <td><img src="assets/image/upload/'. $am["gambar"] .'" width="50" height="50"></td>
          <td>'.$am["nama_alat_musik"].'</td>
          <td>'.$am["merk"].'</td>
          <td>'.$am["harga"].'</td>
          <td>'.$am["cara_dimainkan"].'</td>
          <td>'.$am["jumlah_alat"].'</td>
          </tr>';
        }

$html .= '</tbody>
  </table>
  </body>
  </html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('laporan_alat_musik.pdf', \Mpdf\Output\Destination::DOWNLOAD);