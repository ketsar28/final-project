<!-- php -->
<?php
require './connect.php';
require './function.php';

  if(isset($_POST["submit"])) {
    if(insert($_POST) > 0) {
    echo "
    <script>
    alert('data berhasil ditambahkan.')
    document.location.href='display.php'
    </script>
    
    ";
   
    }  else {
      echo "
      <script>
      alert('data gagal ditambahkan.')
      document.location.href='display.php'
      </script>
      
      ";
     
    }
  }  
?>

<!-- html -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Input Data</title>
    <!-- costum css -->
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <form action="" class="form" method="post">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's Input Spesific Data!</div>
      <div class="input-wrap">
        <div class="input-container ic1">
          <input id="gambar" class="input" type="text" placeholder=" " name="image" required/>
          <div class="cut"></div>
          <label for="gambar" class="placeholder">Gambar</label>
        </div>
        <div class="input-container ic1">
          <input id="nis" class="input" type="text" placeholder=" " name="code" required/>
          <div class="cut"></div>
          <label for="nis" class="placeholder">NIS</label>
        </div>
        <div class="input-container ic1">
          <input id="nama" class="input" type="text" placeholder=" " name="name" required/>
          <div class="cut"></div>
          <label for="nama" class="placeholder">Nama</label>
        </div>
      </div>

      <div class="input-wrap">
        <div class="input-container ic2">
          <input id="email" class="input" type="text" placeholder=" " name="email" required/>
          <div class="cut"></div>
          <label for="email" class="placeholder">Email</label>
        </div>
        <div class="input-container ic2">
          <input id="password" class="input" type="text" placeholder=" " name="password" required/>
          <div class="cut cut-short"></div>
          <label for="password" class="placeholder">Sandi</label>
        </div>
        <div class="input-container ic2">
          <input id="jurusan" class="input" type="text" placeholder=" " name="major" required/>
          <div class="cut cut-short"></div>
          <label for="jurusan" class="placeholder">Jurusn</label>
        </div>
      </div>
      <button type="text" class="submit" name="submit">Submit</button>
    </form>
  </body>
</html>
