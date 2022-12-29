<?php
require "functioncs.php";
$pesanan = show_name("SELECT total FROM pesanan");
$total = mysqli_query($conn, "SELECT SUM(total) from pesanan");
while($row = mysqli_fetch_assoc($total)){
    $sum = $row["SUM(total)"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>DASHBOARD</h2>
    <?php $total ?>
    <p>Pendapatan : <?php echo $sum; ?></p>
    <a href= "list_bayar.php">List Order</a>
    <a href= "customer.php">Customer</a>
    <a href= "order.php">Order</a>

</body>
</html>