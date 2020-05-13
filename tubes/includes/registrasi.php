<?php
  require '../config/functions.php';
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
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      text-decoration: none;
      font-family: montserrat;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      background-image: linear-gradient(-90deg,  gray,rgb(130, 14, 208));
    }

    .login-form {
      width: 360px;
      background: #f1f1f1;
      height: 680px;
      padding: 80px 40px;
      border-radius: 10px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }

    .login-form h1 {
      text-align: center;
      margin-bottom: 60px;
    }

    .txtb {
      border-bottom: 2px solid #adadad;
      position: relative;
      margin: 30px 0;
    }

    .txtb input {
      font-size: 15px;
      color: #333;
      border: none;
      width: 100%;
      outline: none;
      background: none;
      padding: 0 5px;
      height: 40px;
    }

    .txtb span::before {
      content: attr(data-placeholder);
      position: absolute;
      top: 50%;
      left: 5px;
      color: #adadad;
      transform: translateY(-50%);
      z-index: -1;
      transition: .5s;
    }

    .txtb span::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      transition: .5s;
    }

    .focus+span::before {
      top: -5px;
    }

    .focus+span::after {
      width: 100%;
    }

    .logbtn {
      display: block;
      border-radius: 120px;
      width: 100%;
      height: 50px;
      border: none;
      background: linear-gradient(120deg, gray, rgb(130, 14, 208), gray);
      background-size: 200%;
      color: #fff;
      outline: none;
      cursor: pointer;
      transition: 1s;
      margin-bottom: 20px;
    }

    .logbtn:hover {
      background-position: right;
    }

    .bottom-text {
      margin-top: 60px;
      text-align: center;
      font-size: 13px;
    }
    .remember{
      margin-bottom: 20px;
    }
    hr{
      position: absolute;
      top: 130px;
      left : 70px;
      border-color: rgb(130, 14, 208);
      width: 220px;
      border-width: 1px;
    }
    .kembali{
      transition-delay: 1s;
      position: absolute;
      top:20px;
      left: 10px;
      width: 100px;
      height: 20px;
      background: linear-gradient(120deg, gray, rgb(130, 14, 208), gray);
      cursor: pointer;
      border-radius: 50px;
      text-align: center;
      
    }
    .kembali a{
      color: white;
    }
  </style>
</head>

<body>

  <form action="" method="post" class="login-form">
    <?php if(isset($error)) : 
        echo "<script>
              alert('Username atau Password salah');
        </script>";
    endif ?>
    <?php if(isset($error1)) : 
        echo "<script>
              alert('Akun anda belum diaktifkan oleh Admin');
        </script>";
    endif ?>
    <h1>Registrasi</h1>
    <hr class="my-4">
    
    <div class="kembali">
    <a href="login.php">Kembali</a>
    </div>

    <form action="" method="post">

    <div class="txtb">
      <input type="text" name="nrp" autofocus autocomplete="off" required>
      <span data-placeholder="NRP"></span>
    </div>

    <div class="txtb">
      <input type="text" name="nama" autocomplete="off" required>
      <span data-placeholder="Nama Lengkap"></span>
    </div>

    <div class="txtb">
      <input type="text" name="jurusan" autocomplete="off" required>
      <span data-placeholder="Jurusan"></span>
    </div>

    <div class="txtb">
      <input type="text" name="username" autocomplete="off" required>
      <span data-placeholder="Username"></span>
    </div>

    <div class="txtb">
      <input type="password" name="password" required>
      <span data-placeholder="Password"></span>
    </div>

    <input type="submit" name="register" class="logbtn" value="REGISTER">
  </form>

  <script type="text/javascript">
    $(".txtb input").on("focus", function () {
      $(this).addClass("focus");
    });

    $(".txtb input").on("blur", function () {
      if ($(this).val() == "")
        $(this).removeClass("focus");
    });
  </script>


</body>

</html>