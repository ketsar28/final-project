<?php
require './connect.php';

function insert($query) {
    global $conn;

  $gambar = htmlspecialchars($query['image']);
  $nis = htmlspecialchars($query['code']);
  $nama = htmlspecialchars($query['name']);
  $email = htmlspecialchars($query['email']);
  $password = htmlspecialchars($query['password']);
  $jurusan = htmlspecialchars($query['major']);

  $sql = "INSERT INTO users VALUES('','$gambar', '$nis', '$nama', '$email', '$password', '$jurusan')";


  $result = mysqli_query($conn, $sql);
  $check = mysqli_affected_rows($conn);


  return $check;
}


function update($query) {
    global $conn;

  $id = $query['id'];
  $gambar = htmlspecialchars($query['image']);
  $nis = htmlspecialchars($query['code']);
  $nama = htmlspecialchars($query['name']);
  $email = htmlspecialchars($query['email']);
  $password = htmlspecialchars($query['password']);
  $jurusan = htmlspecialchars($query['major']);

  $sql = "UPDATE users 
        SET gambar = '$gambar',
            nis = '$nis', 
            nama = '$nama', 
            email = '$email', 
            password = '$password', 
            jurusan = '$jurusan' 
        WHERE id = $id
  ";


  $result = mysqli_query($conn, $sql);
  $check = mysqli_affected_rows($conn);


  return $check;
}


function select($sql) {
    global $conn; 
    $query = mysqli_query($conn, $sql);
    $rows = [];

    // looping semua data yang ada di dbms
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row; 
    }

    return $rows;
}

function search($query) {
    $sql = "SELECT * FROM users WHERE 
            nis like '%$query%' OR
            nama like '%$query%' OR
            email like '%$query%' OR
            jurusan like '%$query%'   
            ";

    return select($sql);
}



function drop($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

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