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
    <link rel="stylesheet" href="../css/system.css" />
  </head>

  <body>
      <!-- == -->
    <form action="" method="post">
        <div class="segment">
            <h1>Login</h1>
        </div>
        <!-- kalau error tampilkan tag p berikut -->
        <?php if(isset($error)) { ?>
            <!-- <p style="font-style:italic; color:red;">username/password tidak valid</p> -->
          <script>
              alert('username/password tidak valid')
          </script>
         <?php } ?> 
        

      <label>
        <input type="text" id="username" name="username" placeholder="Username" required />
      </label>
      <label>
        <input type="password" id="password" name="password" placeholder="Password" required/>
      </label>
      <button class="red" type="submit" name="kirim"><ion-icon name="lock-closed-outline"></ion-icon> Sign In</button>
      <div class="asking">
          <p>Don't have an account ? <a href="register.php">Register</a></p>
      </div>

      <div class="segment">
        <button class="unit" type="button"><ion-icon name="logo-google"></ion-icon></button>
        <button class="unit" type="button"><ion-icon name="logo-facebook"></ion-icon></button>
        <button class="unit" type="button"><ion-icon name="logo-instagram"></ion-icon></button>
      </div>
    </form>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
