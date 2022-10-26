<?php
require './connect.php';

// fungsi register

function register($method) {
    // koneksi global
    global $conn;
    // tangkap data inputan username dan password dan lakukan config
    $username = strtolower(stripslashes($method['username'])) ;
    $password = mysqli_real_escape_string($conn,$method['password']);
    $cpass = mysqli_real_escape_string($conn,$method['cpass']);

    $result = mysqli_query($conn, "SELECT * FROM `login_system` WHERE username = '$username'");
    // jika usernamenya sama dengan yang ada di database, jangan beri masuk 
    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
        alert('username tersebut sudah ada')
        </script>";

        return false;
    }

    // jika password tidak sama dengan konfirmasinya, jangan beri masuk 
    if($password !== $cpass) {
        echo "
        <script>
        alert('password tidak cocok')
        </script>";

        return false;
    }

    // convert password supaya tidak dibaca oleh sembarangan orang
    $password = password_hash($password, PASSWORD_DEFAULT);

    // jika berhasil, lakukan query insert supaya data dimasukan ke database
    mysqli_query($conn, "INSERT INTO `login_system` VALUES('', '$username', '$password')");

    // kembalikan hasilnya menggunakan mysqli_affected_rows($conn)
    return mysqli_affected_rows($conn);
}

?>