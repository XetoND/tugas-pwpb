<?php
session_start();

require_once "koneksi.php";

  if($_SESSION['posisi'] != "Murid"){
    header("location:login.php");
  }

  if (isset($_POST['submit'])) {
    if(lapor($_POST) > 0){
      echo"<script>
              alert('input data succesful');
              window.location = 'page_siswa.php';
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
    <title>Laporan Masalah</title>
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
    <form class="row" action="" method="post" enctype="multipart/form-data">
        <h1 class="my-5">Buat Laporan</h1>
        <div class="col-md-6 my-3">
          <label for="nama_siswa" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama_siswa" id="nama_siswa">
        </div>

        <div class="col-md-6 my-3">
            <label for="nis_siswa" class="form-label">Nis</label>
            <input type="text" class="form-control" name="nis_siswa" id="nis_siswa">
        </div>

        <div class="col-md-6 my-3">
          <label for="tanggal_laporan" class="form-label">Tanggal</label>
          <input type="date" class="form-control" name="tanggal_laporan" id="tanggal_laporan">
        </div>

        <div class="col-12 my-3">
          <label for="laporan_masalah" class="form-label">Isi Laporan</label>
          <textarea class="form-control" name="laporan_masalah" id="laporan_masalah"></textarea>
        </div>

        <div class="col-1 mt-3">
            <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
        </div>

        <div class="col-1 mt-3">
            <a href="page_guru.php" class="btn btn-primary">Back</a>
        </div>

      <form>
</div>
</body>
</html>
