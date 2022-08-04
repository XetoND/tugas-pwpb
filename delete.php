<?php

session_start();

if($_SESSION['posisi'] != "Guru"){
    header("location:login.php");
  }

include'koneksi.php';

$no=$_GET['no'];
mysqli_query($host,"DELETE FROM siswa WHERE no='$no'");

header("location:page_guru.php");
?>
