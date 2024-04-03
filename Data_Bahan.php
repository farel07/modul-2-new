<?php 

require 'config.php';
session_start();

if(!isset($_SESSION['login'])){
  header('Location: login.php');
   die;
}

$data = ambilData("SELECT * FROM persediaan");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data bahan</title>
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
        <!-- main content page -->
        <div class="w-full">
            <!-- component -->
  </div>
        </div>
        <!-- main content page -->
        <div class="w-full">
            <!-- component -->
<div class="px-4 sm:px-6 lg:px-8">


        <div class="mt-5 mb-0 ">
          <button type="button" class="block text-1x1 rounded-md bg-balck px-3 py-2 text-center text-sm font-semibold text-black shadow-sm hover:text-white hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" onclick="window.location.href = './tambah_bahan.php';">Tambah Bahan</button>
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
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">Nama</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">ID</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">jumlah masuk</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">jumlah keluar</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">Total Stok</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                      <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="px-1 py-3"></th>
                  </tr>
                </thead>
                <tbody class="">
                  <tbody class="">

                    <?php foreach($data as $d) : ?>

                  <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-black sm:pl-0"><?= $d['tanggal']; ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><?= $d['nama_persediaan']; ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black">BHN-<?= $d['id']; ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><?= $d['jumlah_masuk']; ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><?= $d['jumlah_keluar']; ?></td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><?= $d['stok']; ?></td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-left space-x-3 text-sm font-medium sm:pr-0">
                      <a href="editDataBahan.php?id=<?= $d['id'] ?>" class="text-black hover:text-yellow-500">Edit<span class="sr-only">, Najib Ahmed</span></a>
                      <a href="hapusBahan.php?id=<?= $d['id'] ?>" class="text-black hover:text-red-500">Delete<span class="sr-only">, Najib Ahmed</span></a>
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