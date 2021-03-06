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

  // ADMIN ALAT MUSIK
  function tambah($data){
    $conn = koneksi();

    $nama_alat_musik = htmlspecialchars($data['nama_alat_musik']);
    $merk = htmlspecialchars($data['merk']);
    $harga = htmlspecialchars($data['harga']);
    $cara_dimainkan = htmlspecialchars($data['cara_dimainkan']);
    $jumlah_alat = htmlspecialchars($data['jumlah_alat']);

    //upload 
    $gambar = upload();
    if(!$gambar){
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
    $tipeFile = $_FILES['gambar']['type'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek gambar diupload apa tidak
    if($error ===4){
      // echo "<script>
      //   alert('Anda tidak memilih gambar, pilih gambar dahulu');
      // </script>";
      return 'nophoto.jpg';
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

    if($tipeFile != "image/png" && $tipeFile != "image/jpeg"){
      echo "<script>
        alert('yang Anda upload bukan gambar');
      </script>";
      return false;
    }

    //cek ukuran file jangan lebih dari 1mb
    if( $ukuranFile > 3000000){
      echo "<script>
        alert('ukuran gambar terlalu besar');
      </script>";
      return false;
    }

    //lolos pengecekan, dan di upload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/image/upload/' . $namaFileBaru);

    
    return $namaFileBaru;
  }

  function hapus($id){
    $conn = koneksi();
    
    $alat_musik = query("SELECT * FROM alat_musik WHERE id = $id")[0];
    if($alat_musik['gambar'] != 'nophoto.jpg'){
      unlink('../assets/image/upload/' . $alat_musik['gambar']);
    }
    
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
    $gambar_lama = htmlspecialchars($data['gambar_lama']);
    
    $gambar = upload();
    if(!$gambar){
      return false;
    }
    if($gambar == 'nophoto.jpg'){
      $gambar = $gambar_lama;
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

  function registrasi($data){
    $conn = koneksi();
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $username = strtolower(stripcslashes($data['username']));
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $level = 'mahasiswa';

    //cek username dan pw di isi tidak
    if(empty($nrp) || empty($nama) || empty($jurusan) ||  empty($username) || empty($password1) || empty($password2)){
    echo "<script>
      alert('Data tidak boleh kosong!');
    </script>";
    return false;
  }

    //mencegah username sama
    $result = mysqli_query($conn, "SELECT username,nrp FROM mahasiswa WHERE username = '$username' OR nrp = '$nrp'");
    if(mysqli_fetch_assoc($result)){
      echo "<script>
        alert('Username & NRP sudah digunakan');
      </script>";
      return false;
    }

    if($password1 !== $password2){
    echo "<script>
      alert('Konfirmasi password tidak sesuai');
    </script>";
    return false;
  }

    $password = password_hash($password1, PASSWORD_DEFAULT);

    //menambahkan mahasiswa baru
    $query_tambah = "INSERT INTO mahasiswa VALUES
    ('',
    '$nrp',
    '$nama',
    '$jurusan',
    '$username',
    '$password',
    '$level')";
    mysqli_query($conn, $query_tambah) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }

  // MAHASISWA PINJAM ALAT MUSIK
  function tambah_peminjaman_mahasiswa($data){
    $conn = koneksi();

    $nama_alat_musik = $data['nama_alat_musik'];
    $id_alat_musik = query("SELECT * FROM alat_musik WHERE nama_alat_musik = '$nama_alat_musik' ")[0];
    $id_musik = $id_alat_musik['id'];

    $id_mahasiswa = $data['id_mahasiswa']; 
    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);
    $jam_pinjam = htmlspecialchars($data['jam_pinjam']);
    $jam_kembali = htmlspecialchars($data['jam_kembali']);

    $query =  "INSERT INTO peminjaman 
              VALUES 
              ('','$tgl_pinjam','$tgl_kembali','$jam_pinjam','$jam_kembali','$id_mahasiswa','$id_musik')";
    
    mysqli_query($conn,$query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }

  // ADMIN PEMINJAMAN
  function tambah_peminjaman($data){
    $conn = koneksi();

    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);
    $jam_pinjam = htmlspecialchars($data['jam_pinjam']);
    $jam_kembali = htmlspecialchars($data['jam_kembali']);
    $id_mahasiswa = htmlspecialchars($data['id_mahasiswa']);
    $id_alat_musik = htmlspecialchars($data['id_alat_musik']);

    
    $query =  "INSERT INTO peminjaman
              VALUES
              ('','$tgl_pinjam','$tgl_kembali','$jam_pinjam','$jam_kembali','$id_mahasiswa','$id_alat_musik')";
    mysqli_query($conn,$query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }

  function hapus_peminjaman($id_peminjaman){
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman = $id_peminjaman") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
  }

  function ubah_peminjaman($data){
    $conn = koneksi();

    $id_peminjaman = $data['id_peminjaman'];
    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);
    $jam_pinjam = htmlspecialchars($data['jam_pinjam']);
    $jam_kembali = htmlspecialchars($data['jam_kembali']);
    $id_mahasiswa = htmlspecialchars($data['id_mahasiswa']);
    $id_alat_musik = htmlspecialchars($data['id_alat_musik']);

    $queryubah = "UPDATE peminjaman SET
                tgl_pinjam = '$tgl_pinjam',
                tgl_kembali = '$tgl_kembali',
                jam_pinjam = '$jam_pinjam',
                jam_kembali = '$jam_kembali',
                id_mahasiswa = '$id_mahasiswa',
                id_alat_musik = '$id_alat_musik'
                WHERE id_peminjaman = '$id_peminjaman' ";
    mysqli_query($conn,$queryubah) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
    
  }

  // ADMIN MAHASISWA
  function tambah_mahasiswa($data){
    $conn = koneksi();

    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $level = 'mahasiswa';

    if(empty($nrp) || empty($nama) || empty($jurusan) ||  empty($username) || empty($password)){
    echo "<script>
      alert('Data tidak boleh kosong!');
    </script>";
    return false;
  }

    $result = mysqli_query($conn, "SELECT username,nrp FROM mahasiswa WHERE username = '$username' OR nrp = '$nrp'");
    if(mysqli_fetch_assoc($result)){
      echo "<script>
        alert('Username & NRP sudah digunakan');
      </script>";
      return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan mahasiswa baru
    $query_tambah = "INSERT INTO mahasiswa VALUES
    ('',
    '$nrp',
    '$nama',
    '$jurusan',
    '$username',
    '$password',
    '$level')";
    mysqli_query($conn, $query_tambah) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }

  function hapus_mahasiswa($id_mahasiswa){
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
  }

  function ubah_mahasiswa($data){
    $conn = koneksi();

    $id_mahasiswa = $data['id_mahasiswa'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $level = 'mahasiswa';

    if(empty($nrp) || empty($nama) || empty($jurusan) ||  empty($username) || empty($password)){
    echo "<script>
      alert('Data tidak boleh kosong!');
    </script>";
    return false;
  }

    // $result = mysqli_query($conn, "SELECT username,nrp FROM mahasiswa WHERE username = '$username' OR nrp = '$nrp'");
    // if(mysqli_fetch_assoc($result)){
    //   echo "<script>
    //     alert('Username & NRP sudah digunakan');
    //   </script>";
    //   return false;
    // }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE mahasiswa SET
          nrp = '$nrp',
          nama = '$nama',
          jurusan = '$jurusan',
          username = '$username',
          password = '$password',
          level = '$level'
          WHERE id_mahasiswa = '$id_mahasiswa'";
  
  mysqli_query($conn,$sql) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
  }

  // ADMIN ADMIN
  function tambah_admin($data){
    $conn = koneksi();

    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $nama_admin = htmlspecialchars($data['nama_admin']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $level = 'admin';

    if(empty($username) || empty($password) || empty($nama_admin) || empty($no_hp)){
    echo "<script>
      alert('Data tidak boleh kosong!');
    </script>";
    return false;
  }

    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)){
      echo "<script>
        alert('Username & NRP sudah digunakan');
      </script>";
      return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin VALUES
          ('',
          '$username',
          '$password',
          '$nama_admin',
          '$no_hp',
          '$level')";
  
  mysqli_query($conn,$sql) or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
  }

  function hapus_admin($id_admin){
    $conn = koneksi();

    if($id_admin === '3' || $id_admin === '6'){
      echo "<script>
        alert('Mohon Maaf Data Admin Ini Tidak Bisa Dihapus & Diubah Datanya Karna Diset Secara Permanen, Ty XD');
      </script>";
      return false;
    }

    $sql = "DELETE FROM admin WHERE id_admin = '$id_admin' ";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }

  function ubah_admin($data){
    $conn = koneksi();

    $id_admin = $data['id_admin'];
    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $nama_admin = htmlspecialchars($data['nama_admin']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $level = 'admin';

    if(empty($username) || empty($password) || empty($nama_admin) || empty($no_hp)){
    echo "<script>
      alert('Data tidak boleh kosong!');
    </script>";
    return false;
  }

    if($id_admin === '3' || $id_admin === '6'){
      echo "<script>
        alert('Mohon Maaf Data Admin Ini Tidak Bisa Dihapus & Diubah Datanya Karna Diset Secara Permanen, Ty XD');
      </script>";
      return false;
    }

  // $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username' ");
  //   if(mysqli_fetch_assoc($result)){
  //     echo "<script>
  //       alert('Username & NRP sudah digunakan');
  //     </script>";
  //     return false;
  //   }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE admin SET
          username = '$username',
          password = '$password',
          level = '$level',
          nama_admin = '$nama_admin',
          no_hp = '$no_hp'
          WHERE id_admin = '$id_admin'";
  
  mysqli_query($conn,$sql) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
  }
?>