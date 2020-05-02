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

  function hapus($id){
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM alat_musik WHERE id = $id");

    return mysqli_affected_rows($conn);
  }

  function ubah($data){
    $conn = koneksi();

    $id = $data['id'];
    $nama_alat_musik = htmlspecialchars($data['nama_alat_musik']);
    $merk = htmlspecialchars($data['merk']);
    $harga = htmlspecialchars($data['harga']);
    $cara_dimainkan = htmlspecialchars($data['cara_dimainkan']);
    $jumlah_alat = htmlspecialchars($data['jumlah_alat']);
    $gambar = htmlspecialchars($data['gambar']);

    $queryubah = "UPDATE alat_musik SET
                nama_alat_musik = '$nama_alat_musik',
                merk = '$merk',
                harga = '$harga',
                cara_dimainkan = '$cara_dimainkan',
                jumlah_alat = '$jumlah_alat',
                gambar = '$gambar'
                WHERE id = '$id' ";
    mysqli_query($conn,$queryubah);
    return mysqli_affected_rows($conn);
    
  }

  function registrasi($data){
    $conn = koneksi();
    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($conn,$data['password']);

    //cek username sudah ada apa belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)){
      echo "<script>
            alert('username sudah digunakan');
          </script>";
      return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru
    $query_tambah = "INSERT INTO user VALUES ('','$username','$password')";
    mysqli_query($conn, $query_tambah);

    return mysqli_affected_rows($conn);
  }

?>