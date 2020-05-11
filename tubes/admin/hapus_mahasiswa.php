<?php
  require '../config/functions.php';
  $id_mahasiswa = $_GET['id_mahasiswa'];
  if(hapus_mahasiswa($id_mahasiswa) > 0){
    echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'mahasiswa.php';
      </script>";
  }else{
    echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'mahasiswa.php';
      </script>";
  }
?>