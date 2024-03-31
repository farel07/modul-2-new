<?php 

require 'config.php';
session_start();

if(!isset($_SESSION['login'])){
     header('Location: login.php');
      die;
 }

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

    <nav class="bg-purple-700">
        <div class="max-w-7xl">
          <div class=" flex h-16 items-center">

            <div class="flex flex-1 ">
              <div class="flex flex-shrink-0">
                <img class="h-8 w-auto" src="CareSelf.png" alt="Your Company" onclick="window.location.href = 'index.php';">
              </div>
            </div>

            <div class="flex flex-2 space-x-4">
   
              <a href="./index.php" class=" text-white hover:bg-gray-700 rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
              <a href="./list_produk.php" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Product</a>
              <a href="./dashboard.php" class="bg-gray-900 text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
              <a href="logout.php" class="bg-red-600 text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Logout</a>

              </div>
                     
                </div>
      
                
                
              </div>
        </div>
      
       
      </nav>
      

    <div class="flex">
        <!-- aside -->
        <!-- tailwind.config.js -->
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-64 h-screen bg-white">
            
        <nav class="mt-10">
                <div x-data="{ open: false }">
                    <button class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            <a href="Dashboard.php"
                    class="flex items-center">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                <span class="mx-4 font-medium">Dashboard</span>
            </a>
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Gudang</span>
                        </span>

                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>

                    <div x-show="open" class="bg-gray-100">
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="Data_Bahan.php">Data Bahan</a>
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="./data_produksi.php">Data Hasil Produksi</a>
                    </div>
                </div>
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Produksi</span>
                        </span>

                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>

                    <div x-show="open" class="bg-gray-100">
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="laporan_produksi.php">Laporan Produksi</a>
                        <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="laporan_produksi.php">Laporan Produksi</a>
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                            <span class="flex items-center">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
    
                                <span class="mx-4 font-medium">Pemasaran</span>
                            </span>
    
                            <span>
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                    <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </button>
    
                        <div x-show="open" class="bg-gray-100">
                            <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="data_product.php">Data Produk</a>
                            <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="./data_pesanan.php">Data Pesanan</a>
                            <a class="py-2 px-16 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="laporan_penjualan.php">Laporan Penjualan</a>
                        </div>
                        
                    </div>
            </nav>

            <div class="absolute bottom-0 my-8">
                <a class="flex items-center py-2 px-8 text-gray-700 hover:text-gray-600" href="#">
                    <img class="h-6 w-6 rounded-full mr-3 object-cover" src="https://lh3.googleusercontent.com/a-/AOh14Gi0DgItGDTATTFV6lPiVrqtja6RZ_qrY91zg42o-g" alt="avatar">
                    <span>Khatabwedaa</span>
                </a>
            </div>
        </div>
       
    </div>

 <!-- main content page -->
 <div class="w-full p-4 bg-gray-200">

  <h2 class="font-light text-3xl">Selamat Datang <?= $_SESSION['name']; ?>!</h2>

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