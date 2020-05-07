<?php 
session_start();
if(isset($_SESSION['login'])){
  header("Location: index.php");
  exit;
}
  require 'functions.php';

  if(isset($_POST['login'])){
    $login = login($_POST);
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
      height: 580px;
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
      transition: .5s;
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
  </style>
</head>

<body>

  <form action="" method="post" class="login-form">
    <h1>Login</h1>
    <?php if (isset($login['error'])) : ?>
    <p style="color: red;"><?= $login['pesan'] ?></p>
    <?php endif ?>
    <hr class="my-4">

    <div class="txtb">
      <input type="text" name="username" autofocus autocomplete="off" required>
      <span data-placeholder="Username"></span>
    </div>

    <div class="txtb">
      <input type="password" name="password" required>
      <span data-placeholder="Password"></span>
    </div>

    <input type="submit" name="login" class="logbtn" value="Login">

    <div class="bottom-text">
      Tidak punya akun? <a href="registrasi.php">Buat disini</a>
    </div>

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