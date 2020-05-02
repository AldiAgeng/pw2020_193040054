<?php
  require 'functions.php';
  if(isset($_POST['register'])){
    if(registrasi($_POST) > 0){
      echo "<script>
            alert('Registrasi Berhasil');
            document.location.href = 'login.php';
            </script>";
    }else{
      echo "<script>
            alert('Registrasi Gagal');
            </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registrasi</title>
</head>
<body>
  <form action="" method="post">
    <table>
      <tr>
        <td><label for="username">username</label></td>
        <td>:</td>
        <td><input type="text" name="username" id="username"></td>
      </tr>
      <tr>
        <td><label for="password">password</label></td>
        <td>:</td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
    </table>
    <button type="submit" name="register">REGISTER</button>
  </form>
</body>
</html>