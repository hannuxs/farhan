<?php
    $db_hostname            = "localhost";
    $db_username            = "root";
    $db_password            = ""; 
    $db_name                = "projectweb";
    
    function bukakoneksi(){
     	global $db_hostname, $db_username, $db_password, $db_name;
         $konektor=mysqli_connect($db_hostname,$db_username,$db_password)
         or die ("<font color=red><h3>gak konekkk ..!!</h3></font>");
         $db_select=mysqli_select_db($konektor, $db_name)
         or die("<font color=red><h3>gabisa milih database..!!</h3></font>". mysqli_error());
	return $konektor;
    }


    ?>