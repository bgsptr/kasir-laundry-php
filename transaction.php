<?php
require "functioncs.php";

$id_pesan = $_GET["id_pesan"];
$datas = show_name("SELECT * FROM list WHERE id_pesan = '$id_pesan'");
$datas2 = show_name("SELECT * FROM pesanan WHERE id_pesan = '$id_pesan'");
// $datas3 = show_name("SELECT * FROM pesanan");

if(isset($_POST["bayar"])){
    if(insert_bayar($_POST) > 0){
        header("Location: list_bayar.php");
    }
}

if(isset($_POST["bayar"])){
    if(update_list($_GET) > 0){
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry</title>
</head>
<body>  
    <h2>Pembayaran</h2>
    <?php global $row; ?>
    <form action="" method="post">
        <ul>
        <li>Nama :<fieldset>
            <legend>Masukkan nama</legend>
            <?php foreach($datas as $data) : ?>
            <p><?php echo $data["nama"]; ?></p>
            <?php endforeach; ?>
        </fieldset></li>
        <li>Total : <fieldset>
            <legend>Masukkan total</legend>
            <?php foreach($datas as $data) : ?>
                <?php $data["total"] = $data["harga"]*$data["berat"] ?>
            <p><?php echo $data["total"]; ?></p>
            <?php endforeach; ?>
        </fieldset></li>
        <li>Cara Bayar : <fieldset>
            <legend>Masukkan cara bayar</legend>
            <select name="cara" required>
                <option value ="">(Select Payment Method)</option>
                <option value ="cash">Cash</option>
            </select>
        </fieldset>Status : </li>
        <li><fieldset>
            <legend>Masukkan status</legend>
            <select name="status">
                <option value ="">(Select Status)</option>
                <option value ="Lunas">Lunas</option>
            </select>
        </fieldset></li>
        </fieldset>Jumlah Uang : </li>
        <li><fieldset>
            <legend>Masukkan jumlah uang</legend>
            <input type="text" name="jumlah" required>
        </fieldset></li>
        </fieldset>Kembalian : </li>
        <li><fieldset>
            <legend>Masukkan kembalian</legend>
            <?php foreach($datas2 as $data2) : ?>
            <p><?php echo $data2["kembalian"]; ?></p>
            <?php endforeach; ?>
        </fieldset></li>
        <li>
            <button type="submit" name="bayar">BAYAR</button>
        </li>
        </ul>
    </form>
</body>
</html>