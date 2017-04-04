<?php
    session_start();

    //jika tidak ada session/session kosong, maka user akan di arahkan ke halaman login
    if (empty($_SESSION['username'])) {
        header("Location: ./");
    }

    //include koneksi database
    require_once "connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Halo <u><?php echo $_SESSION['nama']; ?></u></h1>
        <h3>Anda berhasil login</h3>
        <br>
        <a href="logout.php">Logout</a>
    </body>
</html>
