<?php
  require '../config/functions.php';
  $id_admin = $_GET['id_admin'];
  if(hapus_admin($id_admin) > 0){
    echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'admin.php';
      </script>";
  }else{
    echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'admin.php';
      </script>";
  }
?>