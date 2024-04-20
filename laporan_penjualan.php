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

$semua_produk_pesanan = ambilData("SELECT * FROM detail_order");

// orders.id, orders.tanggal, orders.name, orders.number, orders.adress, orders.email, orders.harga, orders.shipping_method, orders.foto, produk.nama_produk FROM ((detail_order INNER JOIN orders ON orders.id = detail_order.produk_id)
//   INNER JOIN produk ON produk.id = detail_order.produk_id) 

foreach($semua_produk_pesanan as $spp){
  $produk_id = $spp['produk_id'];
  $order_id = $spp['order_id'];
  $produk_pesanan[] = ambilData("SELECT * FROM ((detail_order INNER JOIN produk ON detail_order.produk_id = produk.id) INNER JOIN orders ON detail_order.order_id = orders.id) WHERE produk_id = $produk_id AND order_id = $order_id"); 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laporan Penjualan</title>
</head>
<body>
<!--Dashboard-->
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- page -->
<main class="min-h-screen w-full bg-white text-gray-700" x-data="layout">
    <!-- header page -->
    

     <!-- Navbar -->
     <?php include('navbar-admin.php') ?>
    <!-- End Navbar -->

        <!-- aside -->
        <!-- tailwind.config.js -->
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="bg-gray-200 font-sans">
    <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-64 h-screen bg-white">
         <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-64 h-screen bg-white"> 

          <!-- Sidebar -->
    <?php include('sidebar.php') ?>
    <!-- Sidebar End -->
        </div>
         </div>
        </div>
        <!-- main content page -->
        <div class="w-full overflow-auto">
            <!-- component -->
            <div class="w-full p-4 bg-gray-200 overflow-auto">
                <h1 class="text-2xl font-bold text-align-left mb-4">Laporan Penjualan</h1>
                <div class="w-auto max-h-96">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm item">
                  <thead class="ltr:text-left rtl:text-right">
                      <tr>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">ID Beli</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tanggal Pesan</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Customer</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No. Telepon</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Alamat Pengiriman</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Produk</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Metode Pengiriman</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Total Harga</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Bukti Pembayaran</th>
                      <th class="px-1 py-2"></th>
                      </tr>
                    </thead>
                
                    <tbody class="divide-y divide-gray-200 text-center">

                      <?php if(!empty($produk_pesanan)) : ?>
                    <?php foreach($produk_pesanan as $pp) : ?>
                      <tr>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">ORD-<?= $pp[0]['order_id'] ?></td>
                      <td class="whitespace-nowrap px-3 py-2 font-medium text-gray-900"><?= $pp[0]['tanggal']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700"><?= $pp[0]['name']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700"><?= $pp[0]['number']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700"><?= $pp[0]['adress']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700"><?= $pp[0]['email']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700"><?= $pp[0]['nama_produk']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700"><?= $pp[0]['shipping_method']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700"><?= $pp[0]['harga']; ?></td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">
                        <a href="<?= $pp[0]['foto'] ?>" target="_blank"><img class="h-48 w-full object-cover object-center" src="<?= $pp[0]['foto'] ?>"></a>
                      </td>
                      <td class="whitespace-nowrap px-3 py-2 "></td>
                      </tr>
                      
                      <?php endforeach; ?>
                      <?php endif; ?>
                      
                              
                    </tbody>
                  </table>
              
                  </div>
                
                </div>
    </div> 
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