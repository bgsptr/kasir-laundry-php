<?php
require "functioncs.php";
$data_customer = show_name("SELECT * FROM data_customer");
// $codes = method("SELECT kode_cuci FROM jenis_cuci");

if(isset($_POST["order"])){
    if(insert_list($_POST) > 0){        
        header("Location: list_bayar.php");
    }
}

if(isset($_POST["generate"])){
    $kode_cuci = $_POST["kode_cuci"];
    if($rows = method("SELECT * FROM jenis_cuci WHERE kode_cuci = '$kode_cuci'")){
            foreach($rows as $row){
                // print_   r($row);
            }
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
    <h2>Order</h2>
    <?php global $row; ?>
    <form action ="" method ="post">
        <?php global $row; ?>
        <ul>
        <li>Kode Cuci : <fieldset>
            <legend>Masukkan Kode Cuci</legend>
            <input type ="text" name="kode_cuci" required>
            <button type="submit" name="generate">Generate</button>
        </fieldset>

        </li>
        <li>Jenis Cuci : <fieldset>
            <legend>Masukkan jenis</legend>
                    <?php if(isset($_POST["generate"])) : ?>
                    <?php echo $row["jenis"]; ?>
                    <?php endif; ?>
            </fieldset>
        </li>
        <li>Harga Jenis Cuci : <fieldset>
            <legend>Masukkan Harga Jenis Cuci</legend>
            <select name ="harga">
            <option value ="">(Select Customer)</option>
            <?php if(isset($_POST["generate"])) : ?>
            <option value="<?php echo $row["harga"];?>">
            <?php echo $row["harga"]; ?></option>
            <?php endif; ?>
            </select>
            </fieldset>
        </li>
        <li>Berat(kg) : <fieldset>
            <legend>Masukkan Berat</legend>
            <input type="text" name ="berat"> 
            </fieldset>
        </li>
        <li>Nama : <fieldset>
            <legend>Masukkan nama</legend>
            <select name="nama">
                <option value ="">(Select Customer)</option>
                <?php foreach($data_customer as $customer) : ?>
                <option value="<?php echo $customer["nama"];?>">
                <?php echo $customer["nama"]; ?></option>
                <?php endforeach ?>
            </select>
            </fieldset>
        </li>
        <li>
            <button type="submit" name="order">ORDER</a></button>
        </li>
        </ul>
    </form>
</body>
</html>
