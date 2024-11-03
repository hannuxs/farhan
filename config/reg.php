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
        $encrypted_pw = encrypt($pw); 
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
        if(decrypt($data['pw']) === $pass) { 
            $_SESSION['login1'] = $data['nama'];
            $_SESSION['login2'] = $data['nip'];
            header("location: ../index.php");
        } else {
            $_SESSION['error-masuk'] = "NIP atau Password Salah";
        }
    } else {
        $_SESSION['error-masuk'] = "NIP atau Password Salah";
    }
}

if(isset($_POST['keluar'])){
    session_destroy();
    session_abort();
    header("location: ../index.php");
}

function generateCsrfToken($session_id) {
    $secret_key = 'kunci_rahasia_sangat_panjang_dan_aman';
    $token = hash_hmac('sha256', $session_id . time(), $secret_key);
    $_SESSION['csrf_token'] = $token;
    return $token;
}

function verifyCsrfToken($token) {
    return hash_equals($_SESSION['csrf_token'], $token);
}

$uploadDir = 'uploads/';
$maxFileSize = 2 * 1024 * 1024;
$allowedExtensions = ['docx', 'xlsx', 'pptx', 'pdf', 'jpeg', 'png'];
$allowedMimeTypes = [
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',       // .xlsx
    'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx
    'application/pdf', // .pdf
    'image/jpeg',      // .jpg
    'image/png',       // .png
    'image/gif'        // .gif
];

function isAllowedFileType($filePath, $fileExtension, $fileMimeType, $allowedExtensions, $allowedMimeTypes) {
    return in_array(strtolower($fileExtension), $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        die("Error: File tidak valid atau terjadi kesalahan upload.");
    }

    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileName = $_FILES['file']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileMimeType = mime_content_type($fileTmpPath);

    if ($fileSize > $maxFileSize) {
        die("Error: File terlalu besar. Maksimal ukuran file adalah 2MB.");
    }

    if (!isAllowedFileType($fileTmpPath, $fileExtension, $fileMimeType, $allowedExtensions, $allowedMimeTypes)) {
        die("Error: Jenis file tidak diizinkan. Hanya file .docx, .xlsx, dan .pptx yang diperbolehkan.");
    }

    $newFileName = uniqid() . '.' . $fileExtension;
    $uploadPath = $uploadDir . $newFileName;

    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        chmod($uploadPath, 0644); 
        $query_menyimpan = "INSERT INTO arsip (id, path, tanggal, jam, user, file, status) VALUES ('".htmlspecialchars($newFileName)."', '$uploadPath', CURRENT_DATE(), CURRENT_TIME(), '".$_SESSION['login2']."', '".htmlspecialchars($fileName)."', '1')";
        $masuk = mysqli_query($koneksi, $query_menyimpan);
        if($masuk){
            header("Location: index.php");
        }else{
            echo "Gagal";
        }
    } else {
        echo "Error: Gagal mengunggah file.";
    }
}

    if(isset($_POST['tombol_hapus'])){
        $id=$_POST['hapus'];
        $query_menghapus = "update arsip set status = '0' where id = '$id'";
        $hhasil = mysqli_query($koneksi, $query_menghapus);
        if($hhasil){
            header("Location: index.php");
        }
    }

?>