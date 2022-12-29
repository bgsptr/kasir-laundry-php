<?php

$conn = mysqli_connect("127.0.0.2:8111", "root", "", "laundry");

function insert($data){
    global $conn;
    $nama = $data["nama"];
    $nohp = $data["nomerhp"];
    $provinsi = $data["provinsi"];
    $insert = "INSERT INTO data_customer VALUES
                ('', '$nama', '$nohp', '$provinsi')";
    mysqli_query($conn, $insert);
    return mysqli_affected_rows($conn);
}

function show_name($show){
    global $conn;
    $rows = [];
    $name = mysqli_query($conn, $show);
    while($row = mysqli_fetch_assoc($name)){
        $rows[] = $row;
    }
    return $rows;
}

function method($method){
    global $conn;
    $methods = [];
    $res = mysqli_query($conn, $method);
    while($method = mysqli_fetch_array($res)){
        $methods[] = $method;
    }
    return $methods;
}

// function pilihkode($code){
// global $conn;
// $kode_cuci = $code["kode_cuci"];
// mysqli_query($conn, "SELECT harga FROM jenis_cuci 
//                 WHERE kode_cuci = $kode_cuci");
                
// return mysqli_affected_rows($conn); 
// }

function insert_jeniscuci($cuci){
    global $conn;
    $kode_cuci = $cuci["kode_cuci"];
    $jenis = $cuci["jenis"];
    $harga = $cuci["harga"];
    $berat = $cuci["berat"];
    $query = "INSERT INTO jenis_cuci VALUES 
                ('$kode_cuci', '$jenis', '$harga', '$berat')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_jeniscuci($update){
    global $conn;
    $kode_cuci = $update["kode_cuci"];
    $berat = $update["berat"];
    $query = "UPDATE jenis_cuci SET berat = $berat 
        WHERE kode_cuci ='$kode_cuci'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function transaksi($query){
    global $conn;
    $rows = [];
    while($row = mysqli_query($conn, "SELECT * FROM jenis_cuci WHERE
                kode_cuci = 'A01'")){
            $rows[] = $row;
        }
    $total = $query($rows["harga"]*$rows["berat"]);
    print_r($total);
    $insert = "INSERT INTO pesanan VALUES
                ('', '', '$total', '')";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function update_data($update){
    global $conn;
    $id = $update["id"];
    $kode_cuci = $update["kode_cuci"];
    $query = "UPDATE data_customer SET kode_cuci = $kode_cuci";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function adder_list($list){
    global $conn;
    $nama = $list["nama"];
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));

    $query_read = "INSERT INTO data_pembayaran VALUES
                    ('', '', '$nama', '$date', '')";
    mysqli_query($conn, $query_read);
    return mysqli_affected_rows($conn);
}

function insert_list($list){
    global $conn;
    $nama = $list["nama"];
    $harga = $list["harga"];
    $berat = $list["berat"];
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $status = "Nunggak";
    $insert = "INSERT INTO list VALUES
                ('', '$nama', '$harga', '$berat', '$date', '', '$status')";
    mysqli_query($conn, $insert);
    return mysqli_affected_rows($conn);
}

function insert_bayar($list){
    global $conn;
    $id_pesan = $_GET["id_pesan"];
    $rows = [];
    $res = mysqli_query($conn, "SELECT id_pesan, harga, berat FROM list WHERE id_pesan = '$id_pesan'");
    while($row = mysqli_fetch_assoc($res)){
        $rows[] = $row;
    }
    foreach($rows as $row){
        $id_pesan = $row["id_pesan"];
        $total = $row["harga"]*$row["berat"];
    }
    $jumlah = $list["jumlah"];
    $cara = $list["cara"];
    $kembalian = 0;
    if($_POST["jumlah"]){
        if($total <= $jumlah){
            $tanggal_bayar = date("Y-m-d H:i:s", strtotime('+7 hours'));
            $kembalian = $kembalian + $jumlah - $total;
            if($kembalian > 0){
                $status = "lunas";
            }
            else{
                $status = "nunggak";
            }
            $insert = "INSERT INTO pesanan VALUES
                        ('', '$id_pesan', '$total', '$jumlah', '$tanggal_bayar', '$cara', '$status', '$kembalian')";
            mysqli_query($conn, $insert);
        }
        else{ 
        }
    }
    return mysqli_affected_rows($conn);
}

function update_list(){
    global $conn, $kembalian, $jumlah, $total;
    $id_pesan = $_GET['id_pesan'];
    $tanggal_bayar = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $status = $_POST["status"];
    $kembalian = $jumlah - $total;
    $result = mysqli_query($conn, "UPDATE list SET tanggal_bayar = '$tanggal_bayar', status = '$status'
                    WHERE id_pesan = '$id_pesan'");
    if($result){
        return mysqli_affected_rows($conn);
    }
}

function show_dapat($query){
    $result = mysqli_num_rows($query);
    return $result;
}
    

?>