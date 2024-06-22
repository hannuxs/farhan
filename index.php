<?php
session_destroy();
require_once('config/reg.php');

if(!isset($_SESSION['login1'])){
    header("location: login");
}else{
    header("location: dashboard");
}
?>