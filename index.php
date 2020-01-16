<?php

    //memulai session
    session_start();

    //jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin
    if (isset($_SESSION['username'])) {
        header("Location: admin.php");
    }

    //include koneksi database
    require_once "connect.php";

    //jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $userpass = $_POST['password']; //password yang di inputkan oleh user lewat form login

        //query ke database
        $sql = mysqli_query($connect_db, "SELECT username, password, nama FROM login WHERE username = '$username'");

        list($username, $password, $nama) = mysqli_fetch_array($sql);

        //jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify
        if (mysqli_num_rows($sql) > 0) {

            /*
            validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
            */
            if (password_verify($userpass, $password)) {

                //buat session baru
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['nama']     = $nama;

                //jika login berhasil, user akan diarahkan ke halaman admin
                header("Location: admin.php");
                die();
            } else {
                //Jika password tidak cocok, maka user akan diarahkan ke form login dan menampilkan pesan error
                echo '<script language="javascript">
                        window.alert("LOGIN GAGAL! Silakan coba lagi");
                        window.location.href="./";
                      </script>';
            }
        } else {
            //jika data tidak ditemukan dalam database, maka user akan diarahkan ke halaman error maka user akan diarahkan ke form login dan menampilkan pesan error
            echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                  </script>';
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login dengan password_hash dan password_verify - MasRud.com</title>
        <style type="text/css">
            body {
                font-family: Arial, serif;
                margin: 0;
            }
            .container {
                display: table;
                margin: 0 auto;
                height: 100vh;
            }
            .box {
                background: #eee;
                border-radius: 3px;
                padding: 20px;
                top: 30vh;
                position: relative;
                vertical-align: middle;
                margin: 0 auto;
                width: 275px;
                height: 175px;
            }
            .form-group {
                margin-bottom: 10px;
            }
            button {
                cursor: pointer;
                font-size: 16px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="box">
                <h2>Login</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Username :</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </body>
</html>
