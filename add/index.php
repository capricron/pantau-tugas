<?php
    session_start();

    require '../func/functions.php';
    
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
      header('Location: ../login');
  };

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $username = $_SESSION['username'];

        addTugas($username,$nama,$tanggal,$jam);
    };


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Tambah Tugas</title>
  
  
   </head>

  <body>
    <div class="gambar container text-center">
    <img src="../pp.png" alt="" srcset="" class="text-center">
    </div>
    <div class="form">
        <h1 class="text-center">Tambah Tugas</h1>
        <form class="text-center login" action="" method="post">
          <input class="no-outline" type="text" name="nama" placeholder="Nama Tugas" required>
          <br>
          <br>
          <input type="date" class="no-outline" name="tanggal" placeholder="dd-mm-yyyy" required>
          <br>
          <br>
          <input type="time" class="no-outline" name="jam" required>
          <br>
          <br>
          <button class="submit" name="submit" type="submit" >Tambah</button>

        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>