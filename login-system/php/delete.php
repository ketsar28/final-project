<?php
require './connect.php';
require './function.php';

$id = $_GET['id'];

if(drop($id) > 0) {
    echo "
    <script>
    alert('data berhasil dihapus.')
    document.location.href='display.php'
    </script>
    
    ";
} else {
    echo "
    <script>
    alert('data gagal dihapus.')
    document.location.href='display.php'
    </script>
    
    ";
}

?>