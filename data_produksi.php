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


 $produksi = ambilData("SELECT produksi.id, produksi.produk_id, produksi.tanggal, produksi.jumlah_bahan, produksi.jumlah_produksi, produk.nama_produk FROM produksi INNER JOIN produk ON produksi.produk_id = produk.id");

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
   <?php include('navbar-admin.php') ?>
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


    <div class="px-4 sm:px-6 lg:px-8">


        <div class="mt-5 mb-0 ">
          <button type="button" class="block text-1x1 rounded-md bg-balck px-3 py-2 text-center text-sm font-semibold text-black shadow-sm hover:text-white hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" onclick="window.location.href = './tambah_produksi.php';">Tambah Hasil Produksi</button>
        </div>
    
     <div class="mt-8 flow-root fullscreen">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">


        <?php 
                
                if(isset($_SESSION['flash_message'])){


                  echo $_SESSION['flash_message'];
        
                  unset($_SESSION['flash_message']);
                }
                
                ?>


            <table class="w-full divide-y divide-gray-300">
                <thead>
                  <tr class="border-b-2 border-slate-500">
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm front-semibold text-black sm:pl-0">Tanggal</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">Id Produk</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">Nama Produk</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">Jumlah Produksi</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                      <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="px-1 py-3"></th>
                  </tr>
                </thead>
                <tbody class="">
                  <tbody class="">
                    <?php foreach($produksi as $p) : ?>
                  <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-black sm:pl-0"><?= $p['tanggal']; ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black">PD-<?= $p['produk_id'] ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><?= $p['nama_produk']; ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><?= $p['jumlah_produksi']; ?></td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-left space-x-3 text-sm font-medium sm:pr-0">
                      <a href="jual_produksi.php?id=<?= $p["id"] ?>" class="text-black hover:text-green-500">Jual<span class="sr-only">, Najib Ahmed</span></a>
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-left space-x-3 text-sm font-medium sm:pr-0">
                      <a href="hapusProduksi.php?id=<?= $p["id"] ?>" class="text-black hover:text-red-500">Delete<span class="sr-only">, Najib Ahmed</span></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
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