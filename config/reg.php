<?php
session_start();
require_once('conf.php');
$koneksi = bukakoneksi();

define('ENCRYPTION_KEY', 'farhan'); // Define the encryption key

function encrypt($data) {
    $key = substr(hash('sha256', ENCRYPTION_KEY, true), 0, 32); // Create a 256-bit key
    $iv = openssl_random_pseudo_bytes(16); // Generate an initialization vector
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv); // Encrypt the data
    return base64_encode($encrypted . '::' . $iv); // Return the encrypted data with the IV
}

function decrypt($data) {
    $key = substr(hash('sha256', ENCRYPTION_KEY, true), 0, 32); // Create a 256-bit key
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2); // Split the data and the IV
    return openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, 0, $iv); // Decrypt the data
}

if(isset($_POST['daftar'])){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];

    if($pw !== $pw2){
        $_SESSION['error'] = "Password Harus sama";
    } else {
        $encrypted_pw = encrypt($pw); // Encrypt the password
        $query = "INSERT INTO pengguna (nip, nama, tgl_lahir, email, pw) VALUES ('$nip', '$nama', '$tgl_lahir', '$email', '$encrypted_pw')";
        $masuk = mysqli_query($koneksi, $query);
        if(!$masuk) {
            if(mysqli_errno($koneksi) == 1062) {
                $_SESSION['error2'] = "NIP telah dipakai";
            } else {
                $_SESSION['error'] = "Gagal mendaftar, silakan coba lagi.";
            }
        } else {
            $_SESSION['login'] = "Berhasil Daftar, Silahkan ";
        }
    }
}

if(isset($_POST['masuk'])){
    $nip = $_POST['nip'];
    $pass = $_POST['pass'];

    $cek = "SELECT * FROM pengguna WHERE nip = '$nip'";
    $hasil = mysqli_query($koneksi, $cek);
    
    if(mysqli_num_rows($hasil) > 0){
        $data = mysqli_fetch_assoc($hasil);
        if(decrypt($data['pw']) === $pass) { // Decrypt the password and check
            $_SESSION['login'] = $data['nama'];
            header("location: dashboard.php");
        } else {
            $_SESSION['error-masuk'] = "NIP atau Password Salah";
        }
    } else {
        $_SESSION['error-masuk'] = "NIP atau Password Salah";
    }
}
?>