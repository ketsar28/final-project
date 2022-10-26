<?php
require './function.php';

// cek data ketika tombol kirim di klik
if(isset($_POST['kirim'])) {
  // tangkap semua element input
  $username = $_POST['username'];
  $password = $_POST['password'];
  // $result = "nama : $username dan password : $password";
  // echo $result;

  // lakukan query select untuk menampilkan data nama yang spesifik
  $sql = "SELECT * FROM `login_system` WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  // cek apakah didalam query tersebut ada data username yang tersimpan
  if(mysqli_num_rows($result) == 1) {

    // ubah data tersebut menjadi array assoc
    $row = mysqli_fetch_assoc($result);
  
    // cek password menggunakan password_verify('password', data pass di dbms)
    if(password_verify($password, $row['password'])) {
      echo "<script>
            alert('password anda benar, anda berhasil login')
            document.location.href = 'result.php'
            </script>";
      exit;
    }
      
  }

// config errornya
$error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <!-- kalau error tampilkan tag p berikut -->
    <?php if(isset($error)) { ?>
      <p style="font-style:italic; color:red;">username/password tidak valid</p>
     <?php } ?> 
    
    <!-- == -->
    <form action="" method="post">
      <ul>
        <li>
          <label for="username">username : </label>
          <input type="text" id="username" name="username" />
        </li><br>
        <li>
          <label for="password">password : </label> 
          <input type="password" id="password" name="password" />
        </li><br>
       

        <li><button type="submit" name="kirim">Kirim</button></li>
      </ul>

    </form>
  </body>
</html>
