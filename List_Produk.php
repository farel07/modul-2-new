<?php 
session_start();
require 'config.php';
$produk = ambilData("SELECT * FROM produk");

if(isset($_POST['submit'])){
    // if(!isset($_SESSION['login'])){
    //     header('Location: login.php');
    //      die;
    // }

    $is_produk = false;

    if(isset($_SESSION['cart'])){
        for($i = 0; $i < count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i] == $_POST['product_id']){
                $is_produk = true;
            }
        }
    }
   
    if($is_produk == false){
        $_SESSION['cart'][] = $_POST['product_id'];
        echo " <script>
        alert('produk ditambahkan ke keranjang')
    </script>";
    } else {
        echo " <script>
        alert('produk sudah ada di keranjang')
    </script>";
    }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product</title>
</head>
<body>
     <!--Navbar-->
     <div class=""></div>
     <!-- component -->
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
         integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>
 
 <body>
 <?php include('navbar.php') ?>
     <script>
         var navItems = document.getElementById("navItems");
         var mobileNav = document.getElementById("mobileNav");
         var hamburger = document.getElementById("hamburger");
 
 
         function adjustNavbar() {
             screenWidth = parseInt(window.innerWidth);
 
             if (screenWidth < 541) {
                 navItems.style.display = "none";
                 hamburger.style.display = "flex";
             }
             else {
                 navItems.style.display = "flex";
                 hamburger.style.display = "none";
             }
         }
 
         adjustNavbar();
 
         window.addEventListener("resize", adjustNavbar);
 
         hamburger.addEventListener("click", function () {
             mobileNav.classList.toggle("left-[-70%]");
             hamburger.classList.toggle("fa-bars");
             hamburger.classList.toggle("fa-close");
         })
     </script>
 </body>
 <!--Navbar Selesai-->
 

 <!--List Produk-->
 <!-- component -->

 <?php 
                
                if(isset($_SESSION['flash_message'])){


                  echo $_SESSION['flash_message'];
        
                  unset($_SESSION['flash_message']);
                }
                
                ?>

 
<div class="flex flex-wrap m-auto justify-between mt-20" style="max-width: 100%;">


                    
         <div class="bottom-0 right-0 h-16 w-16 fixed z-40">
         <a class="flex items-center hover:text-gray-900" href="chart.php">

         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) : ?> 
                        
                            <span class="absolute flex ml-4 -mt-5">
                            <span class="h-3 w-3 animate-ping absolute inline-flex rounded-full bg-pink-500 opacity-75"></span>
                            <span class="h-3 w-3 relative inline-flex rounded-full bg-pink-600"></span>
                        </span>

                        <?php endif; ?>
         </a>
         </div>

         

         <?php 
         foreach($produk as $p) : 
            ?>
      
      <div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
        <img class="h-48 w-full object-cover object-center" src="<?= ($p['foto'] == '') ? 'img/default.png' : $p['foto']; ?>" alt="Product Image"  style="background-size: cover;"/>
        <div class="p-5">
          <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900"><?= $p['nama_produk']; ?></h2>
          <p class="mb-2 text-base dark:text-gray-300 text-gray-700"><?= $p['deskripsi']; ?></p>
          <div class="flex items-center">
            <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">Rp. <?= $p['harga']; ?></p>
          </div>
          <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            <form action="" method="post">
                <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
            <button type="submit" name="submit" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">
                Add to Chart
            </button>
            </form>
        </p>
        </div>
      </div>

                <?php
             endforeach; 
             ?>

        </div>
      </div>
        
</div>
</body>
</html>