<?php
require "functioncs.php";


$datas = show_name("SELECT * FROM list");
$datas2 = show_name("SELECT * FROM pesanan");


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
    <?php global $rows; ?>
    <h2>List Order</h2>
    <form action="" method="post">
    <table border="2" cellspacing ="0" cellpadding ="10">
        <tr>
            <th>Nama</th>
            <th>Tanggal Order</th>
            <th>Tanggal Pembayaran</th>
            <th>Status</th>
            <th>Ubah</th>
        </tr>
        <?php foreach($datas as $data) : ?> 
        <tr>
            <td><?php echo $data["nama"]; ?></td>
            <td><?php echo $data["tanggal"]; ?></td>
            <td><?php echo $data["tanggal_bayar"]; ?></td>
            <td><?php echo $data["status"]; ?></td>
            <td><a href="transaction.php?id_pesan=<?php echo $data['id_pesan']; ?>">Ubah</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </form>
    <p>Kembali ke <a href="dashboard.php">Dashboard</a></p>
</body>
</html>