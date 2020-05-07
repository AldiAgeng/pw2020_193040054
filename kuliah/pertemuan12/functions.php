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

  mysqli_query($conn,$query) or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id){
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data){
  $conn = koneksi();

  $id = $data['id'];
  $nrp = htmlspecialchars($data['nrp']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);


  $query = "UPDATE mahasiswa
            SET
            nrp = '$nrp',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id ";

  mysqli_query($conn,$query) or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword){
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa
            WHERE
            nrp LIKE '%$keyword%' OR  
            nama LIKE '%$keyword%'";
  
  $result = mysqli_query($conn,$query);
  $rows=[];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
  
}
function login($data){
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if($user = query("SELECT * FROM user WHERE username = '$username'")){
    if(password_verify($password, $user['password'])){

      $_SESSION['login'] = true;
      header("Location: index.php");
      exit;

    }
  }
    return [
      'error' => true,
      'pesan' => 'Username / Password Salah!'
    ];
}

function registrasi($data){
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn,$data['password1']);
  $password2 = mysqli_real_escape_string($conn,$data['password2']);

  if(empty($username) || empty($password1) || empty($password2)){
    echo "<script>
      alert('Username / Password tidak boleh kosong!');
      document.location.href= 'registrasi.php';
    </script>";
    return false;
  }

  if(query("SELECT * FROM user WHERE username = '$username'")){
    echo "<script>
      alert('Username sudah terdaftar');
      document.location.href= 'registrasi.php';
    </script>";
    return false;
  }

  if($password1 !== $password2){
    echo "<script>
      alert('Konfirmasi password tidak sesuai');
      document.location.href= 'registrasi.php';
    </script>";
    return false;
  }

  if(strlen($password1) < 5){
    echo "<script>
      alert('Password terlalu pendek');
      document.location.href= 'registrasi.php';
    </script>";
    return false;
  }

  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  $query = "INSERT INTO user VALUES ('','$username','$password_baru')";
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
?>