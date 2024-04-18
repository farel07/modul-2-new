<?php 
session_start();
require 'config.php';

// data untuk tabel order
$order['name'] = $_POST['name'];
$order['email'] =  $_POST['email'];
$order['number'] =  $_POST['number'];
$order['adress'] = $_POST['adress'];
$order['shipping_method'] = $_POST['shipping_method'];
$order['harga'] = $_POST['harga'];
// data untuk tabel detail 

if(tambahOrder($order) > 0){

    $detailOrder['order_id'] = ambilData("SELECT * FROM orders WHERE id = LAST_INSERT_ID()")[0]['id'];
    $detailOrder['produk_id'] = $_POST['id_produk'];
    $detailOrder['qty'] = $_POST['qty'];
    
    if(tambahDetailOrder($detailOrder) > 0){
        $_SESSION['flash_message'] = '<div class="p-4 mb-4 text-sm text-grey-800 rounded-lg bg-grey-50 dark:bg-green-200            dark:text-grey-400" role="alert">
        <span class="font-medium">Pesanan sudah ditambahakan, tunggu kabar admin!</span> </div>';
    } else {
            echo "<script>
            alert('Data gagal ditambahkan')
        </script>";
        echo mysqli_error($conn);
    }
}

 echo "
    <script>
        document.location.href = 'list_produk.php';
    </script>
    ";


?>