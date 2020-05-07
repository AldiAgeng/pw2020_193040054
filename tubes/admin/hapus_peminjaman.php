<?php
  require '../config/functions.php';
  $id_peminjaman = $_GET['id_peminjaman'];
  if(hapus_peminjaman($id_peminjaman) > 0){
    echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'peminjaman.php';
      </script>";
  }else{
    echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'peminjaman.php';
      </script>";
  }
?>