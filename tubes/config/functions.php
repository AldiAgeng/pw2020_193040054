<?php
  function koneksi(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tubes_193040054";
    $conn = mysqli_connect($host,$user,$pass,$db) or die ("Not Connect to database awkaowoa");
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
?>