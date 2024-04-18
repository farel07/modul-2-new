<?php 


require 'config.php';
session_start();

if(!isset($_SESSION['login'])){
  header('Location: login.php');
   die;
}


if( $_SESSION['user']['role_id'] != 1){
 header('Location: index.php');
 die;
}
$id = $_GET['id'];
$data_pesanan = ambilData("SELECT * FROM orders WHERE id = $id")[0];

$order_id = $data_pesanan['id'];


// $produksi = ambilData("SELECT produksi.id, produksi.produk_id, produksi.tanggal, produksi.jumlah_bahan, produksi.jumlah_produksi, produk.nama_produk FROM produksi INNER JOIN produk ON produksi.produk_id = produk.id");

$produk_pesanan = ambilData("SELECT detail_order.produk_id, detail_order.qty, produk.nama_produk, produk.harga FROM detail_order INNER JOIN produk ON detail_order.produk_id = produk.id WHERE order_id = $order_id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Dashboard</title>
</head>
<body>
<!--Dashboard-->
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- page -->
<main class="min-h-screen w-full bg-white text-gray-700" x-data="layout">
    <!-- header page -->
    <!-- <header class="flex w-full items-center justify-between p-8  bg-gray-100 p-2" >
        // logo 
        <div class="flex items-center justify-center">
            <a href="./index.php">
            <img class="h-6" src="CareSelf.png" >
        </a>
        </div>

        
        



    </header> -->

     <!-- Navbar -->
     <?php include('navbar.php') ?>
    <!-- End Navbar -->
      

    <div class="flex">
        <!-- aside -->
        <!-- tailwind.config.js -->
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="flex flex-col sm:flex-row sm:justify-around">
  <div class="w-64 h-screen bg-white">
      
  <!-- Sidebar -->
  <?php include('sidebar.php') ?>
    <!-- Sidebar End -->
  </div>
 
</div>

 <!-- main content page -->
 <div class="w-full p-4 bg-gray-200">


    

<div class="relative overflow-x-auto">
    <h2 class="text-3xl	 mb-5">Detail Order</h2>
    <table class="w-full text-sm text-left rtl:text-right text-dark dark:text-gray-800">
        <tbody>
            <tr class="bg-white dark:bg-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Tanggal Order
                </th>
                <td class="px-6 py-4">
                    <?= $data_pesanan['tanggal']; ?>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Pengiriman 
                </th>
                <td class="px-6 py-4">
                    <?= $data_pesanan['shipping_method']; ?>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Nama Customer
                </th>
                <td class="px-6 py-4">
                    <?= $data_pesanan['name']; ?>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Total 
                </th>
                <td class="px-6 py-4">
                    <?= $data_pesanan['harga']; ?>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Adress
                </th>
                <td class="px-6 py-4">
                    <?= $data_pesanan['adress']; ?>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Bukti Pembayaran
                </th>
                <td class="px-6 py-4">
                <a href="<?= $data_pesanan['foto'] ?>" download target="_blank" class="text-black hover:text-red-500"><b>Unduh Bukti</b><span class="sr-only">, Najib Ahmed</span></a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Email
                </th>
                <td class="px-6 py-4">
                    <?= $data_pesanan['email']; ?>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Number
                </th>
                <td class="px-6 py-4">
                    <?= $data_pesanan['number']; ?>
                </td>
            </tr>

            <tr class="bg-white dark:bg-gray-200 dark:border-gray-700 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    Produk :
                </th>
            </tr>
    
            <?php foreach($produk_pesanan as $p) : ?>

                <tr class="bg-white dark:bg-gray-200 dark:border-gray-700 border-b">
                    <td></td>
                <td class="px-6 py-4">
                    <?= $p['nama_produk'] ?>
                </td>
                <td class="px-6 py-4">
                    x<?= $p['qty'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $p['harga'] ?>
                </td>
            </tr>

                <?php endforeach; ?>
                <tr class="bg-white dark:bg-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                    <a href="data_pesanan.php" class="text-black hover:text-red-500">Kembali<span class="sr-only">, Najib Ahmed</span></a>
                    </td>
                </tr>
        </tbody>
    </table>
</div>



</div>
</main>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>
<!--dashboard selesai-->
</body>
</html>