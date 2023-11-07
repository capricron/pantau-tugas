<?php
    session_start();

    require '../func/functions.php';

   $id = $_GET['id'];

   $username = $_SESSION['username'];

   $sql = "SELECT * FROM {$username} WHERE id = $id";
   
   $data = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));

    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
      header('Location: ../login');
    };

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        if(isset($_POST['check'])){
          $check = $_POST['check'];
        }else if(!isset($_POST['check'])){
          $check = 'off';
        };

        switch($check){
          case 'on': 
            $check = 1;
            break;
          case 'off' :
            $check = 0;
            break;
        };
        update($username,$id,$nama,$tanggal,$jam,$check);
        
    };

    if(isset($_POST['hapus'])){
      hapus($username,$id);  
    }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">

    <title>Detail Tugas</title>
  
  
   </head>

  <body>
    <div class="gambar container text-center">
    <img src="../pp.png" alt="" srcset="" class="text-center">
    </div>
    <div class="form">
        <h1 class="text-center">Detail Tugas</h1>
        <form class="text-center login" action="" method="post">
          <p>Nama Tugas</p>
          <input class="x no-outline" type="text" name="nama" value="<?= $data['nama'] ?>" required>
          <br>
          <br>
          <p>Deadline Tanggal</p>
          <input type="date" class="x no-outline" name="tanggal" placeholder="" value="<?= $data['tanggal'] ?>" required>
          <br>
          <br>
          <p>Deadline Jam</p>
          <input type="time" class="x no-outline" name="jam" value="<?= $data['jam'] ?>" required>
          <br>
          <br>
          <label class="check" for="check">Apakah Anda sudah mengerjakan?</label>
          <input type='checkbox' <?= ($data['checked'] >= 1  ? 'checked' : 'none')?> name="check" >
          <br>
          <br>
          <button type="button" class="btn btn-danger submit" data-toggle="modal" data-target="#exampleModal" >Hapus</button>
          <br>
          <br>
          <button class="btn btn-warning submit" name="submit" type="submit" >Update</button>
          <br>
          <br>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body text-dark">
                  Apakah anda yakin ingin menghapus data tugas?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                  <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>