<?php
  session_start();
  if(!isset($_SESSION["username"])){
  header("Location: ../includes/new_login.php");
  exit;
}

  require '../config/functions.php';
  $id = $_GET['id'];
  if(hapus($id) > 0){
    echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'alat_musik.php';
      </script>";
  }else{
    echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'alat_musik.php';
      </script>";
  }
?>