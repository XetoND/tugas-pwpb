<?php
$host = mysqli_connect("localhost","root","","uprakxi");

function query($query){
    global $host;
    $result = mysqli_query($host,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] =$row;
    }
    return $rows;
}

function store($data) {
    global $host;

    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $jurusan = $data['jurusan'];
    $nis = $data['nis'];
    $nisn = $data['nisn'];

    $gambar = upload();
    if(!$gambar){
      return false;
    }

    $query = "INSERT INTO siswa(nama_lengkap,jenis_kelamin,jurusan,nis,nisn,gambar)
        VALUES ('$nama_lengkap','$jenis_kelamin','$jurusan','$nis','$nisn','$gambar')
                 ";
    mysqli_query($host,$query);

    return mysqli_affected_rows($host);

}

function upload(){
    $nameFile =$_FILES["gambar"]["name"];
    $sizeFile =$_FILES["gambar"]["size"];
    $error =$_FILES["gambar"]["error"];
    $tmpName =$_FILES["gambar"]["tmp_name"];

    if($error === 4){
      echo"<script>
            alert('Anda Belum Memasukan Gambar!!! &#128544;')
      </script>";
      return false;
    }

    $ekstensiFile = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiFile)){
      echo"<script>
            alert('Yang Anda bukan Upload Gambar!!!')
            </script>";
      return false;
    }

    if($sizeFile > 3000000 ){
      echo"<script>
            alert('Ukuran Gambar Terlalu Besar!!!')
      </script>";
      return false;
    }

    $nameFileNew = uniqid();
    $nameFileNew .= '.';
    $nameFileNew .= $ekstensiGambar;

    move_uploaded_file($tmpName,'img/'.$nameFileNew);
    return $nameFileNew;
}

function update($data) {
    global $host;

    $no = $data['no'];
    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $jurusan = $data['jurusan'];
    $nis = $data['nis'];
    $nisn = $data['nisn'];
    $gambar = $data['oldGambar'];

    if ($_FILES['gambar']['error'] !== 4){
        $gambar = upload();
    }

    if (!$gambar) {
        return false;
    }

    $query = "UPDATE siswa
                SET nama_lengkap='$nama_lengkap',
                    jenis_kelamin='$jenis_kelamin' ,
                    jurusan='$jurusan',
                    nis='$nis',
                    nisn='$nisn',
                    gambar='$gambar'
                WHERE no='$no'";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function signup($data) {
    global $host;

    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $posisi = $data['posisi'];
    $create_date = date("Y-m-d");

    //pengecekan unique email
    $validasi = query("SELECT (email) FROM user WHERE email= '$email'");
    if ( count($validasi) > 0) {
        return 0;
    }

    mysqli_query($host, "INSERT INTO user(email,username,password,posisi,create_date)
    VALUE('$email','$username','$password','$posisi','$create_date')");

    return mysqli_affected_rows($host);
}
