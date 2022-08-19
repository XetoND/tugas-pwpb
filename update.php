<?php
session_start();
require_once "koneksi.php";
//mengecek sesion guru atau tidak
  if($_SESSION['posisi'] != "Guru"){
    header("location:login.php");
  }

//mengecek apakah no/id sudah terkirim
  if (!isset($_GET['no'])) {
    header("location:page_guru.php");
  }

//mengecek apakah tombol submit sudah di tekan atau belum
  if (isset($_POST['submit'])) {
    if(update($_POST) > 0){
      echo"<script>
              alert('update data succesful');
              window.location = 'page_guru.php';
          </script>";
    }else{
      echo"<script>
              alert('update data failed');
          </script>";
    }
  }

  //mengambil data lama dengan no/id dikirim
  $oldData = query("SELECT * FROM siswa WHERE no = '{$_GET['no']}'");
?>

<html lang="en">
<head>
    <title>Update Data</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <style>
      *{
      font-family: "open sans";
      }
      hr{
      border: none;
      height: 4px;
      width: 50px;
      background-color: #000000;
      }
    </style>
</head>
<body>
<div class="container">
    <form class="row" action="" method="post">
      <?php
        foreach($oldData as $old):
      ?>
        <h1 class="my-5">Update Data</h1>
        <input type="hidden" name="no" value="<?=$old['no']?>">
        <div class="col-md-6">
          <label for="nama_lengkap" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $old['nama_lengkap']?>">
        </div>

        <div class="col-md-6">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <select class="form-select form-select" aria-label=".form-select-lg example" name="jenis_kelamin">
            <?php
              $gender = ['Laki-laki','Perempuan'];
              foreach($gender as $g):
              if($g == $old['jenis_kelamin']) :
            ?>
            <option value="<?= $g ?>" selected><?= $g ?></option>
            <?php else:?>
            <option value="<?= $g ?>"><?= $g ?></option>
            <?php
              endif;
              endforeach;
            ?>
          </select>
        </div>

        <div class="col-12 my-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $old['jurusan']?>">
        </div>

        <div class="col-md-6">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control" name="nis" id="nis" value="<?= $old['nis']?>">
        </div>

        <div class="col-md-6">
          <label for="nisn" class="form-label">NISN</label>
          <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $old['nisn']?>">
        </div>

        <div class="col-md-12">
          <label for="gambar" class="form-label">FOTO SISWA</label>
          <input type="file" class="form-control" name="gambar" id="gambar">
        </div>

        <div class="col-1 mt-3">
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>

        <div class="col-1 mt-3">
            <a href="page_guru.php" class="btn btn-primary">Back</a>
        </div>
        <?php endforeach;?>
      </form>
</div>
</body>
</html>
