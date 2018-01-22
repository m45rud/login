<?php
    $server   = "localhost";    //server database
    $username = "root";         //username database
    $password = "root";         //password database
    $database = "login";        //nama database

    //koneksi ke database
    $connect_db = mysqli_connect($server, $username, $password, $database);
    if (!$connect_db)
    {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>
