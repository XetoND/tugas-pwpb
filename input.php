<?php 
session_start();

require_once "koneksi.php";

  if($_SESSION['posisi'] != "Guru"){
    header("location:login.php");
  }

  if (isset($_POST['submit'])) {
    if(store($_POST) > 0){
      echo"<script>
              alert('input data succesful');
              window.location = 'page_guru.php';
          </script>";
    }else{
      echo"<script>
              alert('input data failed');
          </script>";
  }
  }
?>

<html lang="en">
<head>
    <title>Input Data</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <style>
      *{
        font-family: "open sans";
      }
    </style>
</head>
<body>
<div class="container">
    <form class="row" action="" method="post">
        <h1 class="my-5">Input Data</h1>
        <div class="col-md-6">
          <label for="nama_lengkap" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
        </div>

        <div class="col-md-6">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <select class="form-select form-select" aria-label=".form-select-lg example" name="jenis_kelamin">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>

        <div class="col-12 my-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" id="jurusan">
        </div>
            
        <div class="col-md-6">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control" name="nis" id="nis">
        </div>

        <div class="col-md-6">
          <label for="nisn" class="form-label">NISN</label>
          <input type="text" class="form-control" name="nisn" id="nisn">
        </div>

        <div class="col-1 mt-3">
            <button type="submit" class="btn btn-primary" name="submit">Input</button>
        </div>

        <div class="col-1 mt-3">
            <a href="page_guru.php" class="btn btn-primary">Back</a>
        </div>
    
      </form>
</div>
</body>
</html>
