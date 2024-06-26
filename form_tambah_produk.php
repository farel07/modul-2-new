<?php 

require 'config.php';
session_start();

if(!isset($_SESSION['login'])){
  header('Location: login.php');
   die;
}

if(isset($_POST['submit'])){
    if(updateProduk($_POST) > 0){
  
      echo "<script>
          alert('Data berhasil ditambahkan')
      </script>";
  
    } else {
  
      echo "<script>
          alert('Data gagal ditambahkan')
      </script>";
  
    }
  
    echo "
      <script>
          document.location.href = 'data_produksi.php';
      </script>
      ";
  } 
  
  $id = $_GET['id'];
  
  $produk = ambilData("SELECT nama_produk as nama FROM produk WHERE id = $id")[0];

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
                     
                </div>
      
                <!--
                  Dropdown menu, show/hide based on menu state.
      
                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                
              </div>
        </div>
      
        <!-- Mobile menu, show/hide based on menu state. -->
        <!-- <div class="sm:hidden" id="mobile-menu" >
          <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
          </div>
        </div> -->
      </nav>
      

    <div class="flex">
        <!-- aside -->
        <!-- tailwind.config.js -->
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


 <!-- main content page -->
 <div class="w-full p-4 bg-gray-200 h-screen">
  <div class="max-w-lg mx-6 mx-auto" >

    <div class="max-w-xs my-3">
  <h2 class="font-semibold text-2xl">Jual Produk</h2>
  <h2 class="font-semibold text-l"><?= $produk['nama']; ?></h2>
  </div>


  
<form action="" method="post" enctype="multipart/form-data" class="space-y-4">

  <!-- id product -->
  <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
<label for="product_id" class="sr-only">Harga</label>

<div class="relative">
  <input required="" type="number" name="harga" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Masukkan harga">
</div>

  <label for="product_name" class="sr-only">Stok</label>

  <div class="relative">
    <input required="" type="number" name="stok" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Masukkan stok">
  </div>

<!-- jumlah masuk -->
<label for="jumlah_masuk" class="sr-only">Deskripsi</label>

<div class="relative">
    <textarea placeholder="Masukkan deskripsi" name="deskripsi" id="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" cols="30" rows="5"></textarea>
</div>

<label for="product_image" class="sr-only">Image</label>

<div class="relative">
  <input required="" type="file" name="foto" accept="image/png, image/jpg, image/jpeg" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Masukkan gambar">
</div>


<!-- submit -->
<div class="flex items-center justify-start">
<input type="submit" name="submit" value="Tambah Bahan" class="rounded-lg bg-purple-700 hover:bg-gray-700 px-5 py-3 text-sm font-medium text-white cursor-pointer mr-4">

</form>

<button  class="rounded-lg bg-gray-400 hover:bg-gray-700 px-5 py-3 text-sm font-medium text-white cursor-pointer" onclick="redirectToPage()"> Cancel </button>
<script>
    function redirectToPage() {
                    window.location.href = "data_produksi.php";
                }
</script>

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