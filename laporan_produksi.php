<?php 

require 'config.php';
session_start();

if(!isset($_SESSION['login'])){
     header('Location: login.php');
      die;
 }

 $produksi = ambilData("SELECT produksi.id, produksi.produk_id, produksi.tanggal, produksi.jumlah_bahan, produksi.jumlah_produksi, produk.nama_produk, persediaan.nama_persediaan FROM ((produksi INNER JOIN produk ON produksi.produk_id = produk.id) INNER JOIN persediaan ON produksi.bahan_id = persediaan.id);");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laporan Produksi</title>
</head>
<body>
<!--Dashboard-->
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- page -->
<main class="min-h-screen w-full bg-white text-gray-700" x-data="layout">
    <!-- header page -->
    

    <!-- Navbar -->
    <?php include('navbar.php') ?>
    <!-- End Navbar -->
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
        <!-- main content page -->
        <div class="w-full">
            <!-- component -->
  </div>
        </div>
            <!-- component -->
            <div class="w-full p-4 bg-gray-200">
            <h1 class="text-2xl font-bold text-align-left mb-4">Produksi Harian</h1>
            <div class="w-auto overflow-auto max-h-96">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm item">
              <thead class="ltr:text-left rtl:text-right">
                <tr>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tanggal Produksi</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Bahan</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jumlah Bahan</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Produk</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jumlah Produk</th>
                  <th class="px-4 py-2"></th>
                </tr>
              </thead>
          
              <tbody class="divide-y divide-gray-200 text-center">

              <?php foreach($produksi as $p) : ?>
                <tr>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-900"><?= $p['tanggal']; ?></td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $p['nama_persediaan']; ?></td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $p['jumlah_bahan']; ?></td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $p['nama_produk']; ?></td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $p['jumlah_produksi']; ?></td>
                  <td class="whitespace-nowrap px-4 py-2"></td>
                </tr>
                <?php endforeach; ?>

        </div>



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