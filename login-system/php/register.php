<?php
include './function.php';

if(isset($_POST['kirim'])) {
  
  if(register($_POST) > 0) {
    echo  "<script>
    alert('user berhasil ditambahkan')
    </script>";
    // var_dump(mysqli_affected_rows($conn));
  }else {
    echo mysqli_error($conn);
    // var_dump(mysqli_affected_rows($conn));
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
  </head>
  <body>
    <h1>Register</h1>
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
        <li>
          <label for="cpass">cofirm password : </label> 
          <input type="password" id="cpass" name="cpass" />
        </li><br>

        <li><button type="submit" name="kirim">Kirim</button></li>
      </ul>

    </form>
  </body>
</html>
