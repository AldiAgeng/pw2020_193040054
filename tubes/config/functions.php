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

    //upload 
    $gambar = upload();
    if($gambar == false){
      return false;
    }

    $query =  "INSERT INTO alat_musik
              VALUES
              ('','$nama_alat_musik','$merk','$harga','$cara_dimainkan','$jumlah_alat','$gambar')";
    
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }

  function upload(){
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek gambar diupload apa tidak
    if($error ===4){
      echo "<script>
        alert('Anda tidak memilih gambar, pilih gambar dahulu');
      </script>";
      return false;
    }

    //cek ektensi gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    //pecah nama file
    $ekstensiGambar = explode('.',$namaFile);
    //mengambil nama yang paling akhir (ekstensi filenya)
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
      echo "<script>
        alert('yang Anda upload bukan gambar');
      </script>";
      return false;
    }

    //cek ukuran file jangan lebih dari 1mb
    if( $ukuranFile > 1000000){
      echo "<script>
        alert('ukuran gambar terlalu besar');
      </script>";
      return false;
    }

    //lolos pengecekan, dan di upload
    move_uploaded_file($tmpName, '../assets/image/upload/' . $namaFile);
    
    return $namaFile;
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
    
    $gambar = upload();
    if($gambar == false){
      return false;
    }

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

?>