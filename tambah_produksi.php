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


$bahan = ambilData("SELECT * FROM persediaan");
$produk = ambilData("SELECT * FROM produk");

if(isset($_POST['submit'])){


  if(tambahProduksi($_POST) > 0){

    $_SESSION['flash_message'] = '<div class="p-4 mb-4 text-sm text-grey-800 rounded-lg bg-grey-50 dark:bg-green-200            dark:text-grey-400" role="alert">
    <span class="font-medium">Data berhasil ditambahkan</span> </div>';

  } else {

    echo "<script>
        alert('Data gagal ditambahkan')
    </script>";
    echo mysqli_error($conn);

  }

  echo "
    <script>
        document.location.href = 'data_produksi.php';
    </script>
    ";


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
   
              <a href="./index.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
              <a href="./list_produk.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Product</a>
              <a href="./dashboard.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>

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
  <h2 class="font-semibold text-2xl">Tambah Produksi</h2>
  </div>


  
<form action="" method="post" enctype="multipart/form-data" class="space-y-4">


  <label for="countries" class="sr-only">Select an option</label>
  <select id="countries" name="produk_id" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
    <option selected>Choose product</option>
    <?php foreach($produk as $p): ?>
    <option value="<?= $p['id'] ?>"><?= $p['nama_produk']; ?></option>
    <?php endforeach; ?>
  </select>

  <!-- stock product -->
<label for="product_stock" class="sr-only">Jumlah Produksi</label>

<div class="relative">
  <input required="" type="number" name="jumlah_produksi" min="1" max="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Masukkan jumlah produksi">
</div>

  <label for="countries" class="sr-only">Select an option</label>
  <select id="countries" name="bahan_id" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
    <option selected>Choose bahan</option>
    <?php foreach($bahan as $b): ?>
    <option value="<?= $b['id'] ?>"><?= $b['nama_persediaan']; ?></option>
    <?php endforeach; ?>
  </select>

    <!-- stock product -->
<label for="product_stock" class="sr-only">Jumlah Bahan</label>

<div class="relative">
  <input required="" type="number" name="jumlah_bahan" min="1" max="" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Masukkan jumlah bahan">
</div>



<!-- submit -->
<div class="flex items-center justify-start">
    <input type="submit" name="submit" value="Tambah Produksi" class="rounded-lg bg-purple-700 hover:bg-gray-700 px-5 py-3 text-sm font-medium text-white cursor-pointer mr-4">
    
    <button  class="rounded-lg bg-gray-400 hover:bg-gray-700 px-5 py-3 text-sm font-medium text-white cursor-pointer" onclick="redirectToPage()"> Cancel </button>
    <script>
        function redirectToPage() {
                        window.location.href = "./data_produksi.php";
                    }
    </script>
    
    </div>

</form>

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