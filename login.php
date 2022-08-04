<?php
  session_start();
  
  require_once "koneksi.php";

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($host,"SELECT * FROM user WHERE username='$username' and password='$password'");
    $cek = mysqli_num_rows($login);


    if($cek>0){
        $data = mysqli_fetch_assoc($login);
        if($data['posisi']=="Guru"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['posisi'] = "Guru";

            header("location:page_guru.php");
        }

        else if($data['posisi']=="Siswa"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['posisi'] = "Siswa";

            header("location:page_siswa.php");
        }

        else{
            echo "
            <script> 
                alert('Data Gagal');
                window.location = 'login.php'
            </script>";
        }
    }
    else{
        echo "<script> 
                alert('Data Gagal');
                window.location = 'login.php'
            </script>";
        
        
    }
    }

  

?>

<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <style>
      *{
        font-family: "open sans";
      }
      .form-signin {
        width: 100%;
        max-width: 350px;
        padding: 15px;
        margin: auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
    
      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-floating {
        margin-bottom: 10px;
      }

      .form-signin input{
        margin-top: 7px;
      }
    
      .form-signin input[type="email"] {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
    
      .form-signin input[type="password"] {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

  
    </style>
</head>
<body>
<div class="container md-5">
    <main class="form-signin outline-secondary mt-5">
        <h1 class="h3 mb-3 text-center">Login</h1>

        <form action="" method="POST">

        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="Username">
            <label for="floatingUsername">Username</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <select class="form-select form-select mb-3" aria-label=".form-select-lg example" name="posisi">
            <option selected>Posisi</option>
            <option value="Guru">Guru</option>
            <option value="Siswa">Siswa</option>
        </select>

        <button class="buttonrslg w-100 btn btn-lg btn-primary" type="submit" name="submit">Login</button>
        <p class="mt-2 mb-3 text-muted text-center">Doesn't have account <a href="sign-up.php">Register</a></p>
        </form>
    </main>
</div>
</body>
</html>