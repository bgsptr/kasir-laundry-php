<?php
require "functioncs.php";

if(isset($_POST["tambah"])){
    if(insert($_POST) > 0){
        echo "Data berhasil ditambahkan";
        header("Location: order.php");
    }
    else{
        echo "Data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Laundry</title>
    <style>
        ul{
            list-style: none;
        }    
    </style>
</head>
<body>
    <h2>Laundry</h2>
    <div>
    <form action="" method="post">
        <ul>
            <li>Nama : <input type="text" name="nama" required></li><br>
            <li>No HP : <input type="number" name="nomerhp" required></li><br>
            <li>Alamat : <input type="text" name="provinsi" required></li><br>
            <button type="submit" name="tambah">TAMBAH</button>
        </ul>
    </form>
    </div>
</body>
</html>