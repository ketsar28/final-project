<!-- php -->
<?php

// koneksi
require './connect.php';
require './function.php';

// simpan data yang ada didalam function bernilai array ke sebuah variable
$data_user = select("SELECT * FROM users");

if(isset($_POST['cari'])){
  $input_user = $_POST['data_pencarian'];
  $data_user = search($input_user);
}

?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Data</title>
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>

  <div class="btn-add">
    <button type="submit"> <a href="input.php"> Add Data</a></button>
  </div>

    <!-- serach -->
    <form action="" method="post">
  <div class="input-container ic1 search-wrapper">
    <input type="text" class="input" name="data_pencarian" placeholder="masukan kata kunci yang dicari" size="50" autofocus>
    <button type="submit" class="submit btn-cari" name="cari">Search</button>
  </div>
  </form>
  <!-- akhir -->

    <table class="styled-table">
      <thead>
        <tr>
          <th>Aksi </th>
          <th>Gambar</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Password</th>
          <th>Jurusan</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($data_user as $data) : ?>
        <tr>
          <td>
            <a href="./update.php?id=<?= $data['id']?>">update |</a>
            <a href="./delete.php?id=<?= $data['id']?>" onclick="return confirm('bener nih?!')">delete</a>
          </td>

          <td> <div class="wrap"><img src="../img/<?= $data['gambar']; ?>" alt="error!"></div> </td>
          <td><?= $data['nis']; ?></td>
          <td><?= $data['nama']; ?></td>
          <td><?= $data['email']; ?></td>
          <td><?= $data['password']; ?></td>
          <td><?= $data['jurusan']; ?></td>
        </tr>
        <?php endforeach;?>

        <!-- <tr class="active-row">
          <td>nabil.png</td>
          <td>22768</td>
          <td>Nabil</td>
          <td>muhammadnabil@gmail.com</td>
          <td>3333</td>
          <td>Informatika</td>
        </tr> -->
        <!-- and so on... -->
      </tbody>
    </table>
  </body>
</html>
