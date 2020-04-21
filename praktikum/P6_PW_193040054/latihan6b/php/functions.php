<?php
  function koneksi(){
    $conn = mysqli_connect("localhost","root","") or die ("Koneksi ke DB gagal");
    mysqli_select_db($conn,"tubes_193040054") or die ("Database salah");

    return $conn;
  }

  function query($sql){
    $conn = koneksi();
    $result = mysqli_query($conn,"$sql");

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }
    return $rows;
  }

  function tambah($data){
    $conn = koneksi();

    $nama_alat_musik = htmlspecialchars($data['nama_alat_musik']);
    $merk = htmlspecialchars($data['merk']);
    $harga = htmlspecialchars($data['harga']);
    $cara_dimainkan = htmlspecialchars($data['cara_dimainkan']);
    $jumlah_alat = htmlspecialchars($data['jumlah_alat']);
    $gambar = htmlspecialchars($data['gambar']);

    $query =  "INSERT INTO alat_musik
              VALUES
              ('','$nama_alat_musik','$merk','$harga','$cara_dimainkan','$jumlah_alat','$gambar')";
    
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }
?>