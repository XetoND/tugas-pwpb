<?php
session_start();
require_once "koneksi.php";

if($_SESSION['posisi'] != "Guru"){
  header("location:login.php");
}
$data = query("SELECT * FROM siswa");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Siswa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <style>
            *{
              font-family: "open sans";
            }
            hr{
              border: none;
              height: 4px;
              background-color: #000;
            }
            td{
              text-align: center;
            }
            th{
              text-align: center;
            }
            td a{
              text-decoration: none;
              color: #000;
            }
            .foto{
              width: 7em;
              height: auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
          <h1 class="my-4">Data Siswa</h1>
          <a href="input.php" class="btn btn-outline-primary btn-lg">Input Data</a>
          <a href="page_laporan.php" class="btn btn-outline-primary btn-lg">Lihat Laporan</a>
          <a href="logout.php" class="btn btn-outline-danger btn-lg">Log out</a>
          <hr>
          <table class="table table-bordered border-dark table-md align-middle">
          <thead>
              <tr>
                  <th style="text-align:center;">No</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Jurusan</th>
                  <th>Nisn</th>
                  <th>Nis</th>
                  <th style="text-align:center;">Foto Siswa</th>
                  <th style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $i = 1;
                foreach( $data as $d ):
              ?>
              <tr>
                  <td style="text-align:center;"><?= $i++?></td>
                  <td><?= $d['nama_lengkap'] ?></td>
                  <td><?= $d['jenis_kelamin'] ?></td>
                  <td><?= $d['jurusan'] ?></td>
                  <td><?= $d['nis'] ?></td>
                  <td><?= $d['nisn'] ?></td>
                  <td>
                    <img class="foto" src="img/<?= $d['gambar']?>">
                  </td>
                  <td style="text-align:center;">
                    <a href="update.php?no=<?= $d['no'] ?>"><i class="bi bi-pencil-square btn btn-warning btn-sm"></i></a>
                    <a onclick="return confirm('are you sure?')" href="delete.php?no=<?= $d['no'] ?>"><i class="bi bi-trash3-fill btn btn-danger btn-sm"></i></a>
                  </td>
              </tr>
              <?php
                endforeach;
              ?>
            </tbody>
          </table>
        </div>
    </body>
</html>
