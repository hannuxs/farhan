<?php
require_once('conf.php');
$koneksi = bukakoneksi();

if(isset($_POST['daftar'])){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];

    if($pw !== $pw2){
        $_SESSION['error'] = "Password Harus sama";
    }else{
        $query = "insert into pengguna (nip, nama, tgl_lahir, email, pw) values('$nip', '$nama', '$tgl_lahir', '$email', '$pw')";
        $masuk = mysqli_query($koneksi, $query);
    }
}else {
    echo "erorr";
}
?>