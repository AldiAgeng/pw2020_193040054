<?php
function koneksi(){ 
  $conn = mysqli_connect("localhost","root","","pw_193040054") or die ("Database not connect");
  return $conn;
}

function query($query){
  $conn = koneksi();

  $result = mysqli_query($conn,$query);

  if(mysqli_num_rows($result) == 1){
    return mysqli_fetch_assoc($result);
  }

  $rows=[];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data){
  $conn = koneksi();

  $nrp = htmlspecialchars($data['nrp']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);


  $query = "INSERT INTO mahasiswa
          VALUES
          (null,
          '$nrp',
          '$nama',
          '$email',
          '$jurusan',
          '$gambar')";

  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);
}
?>