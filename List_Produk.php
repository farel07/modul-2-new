<?php 

session_start();

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
<div class="flex flex-wrap m-auto justify-between mt-20" style="max-width: 100%;">


      
      <div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
        <img class="h-48 w-full object-cover object-center" src="./Asset/shampoo.jpg" alt="Product Image"  style="background-size: cover;"/>
        <div class="p-5">
          <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">CareSelf Hair Shampoo</h2>
          <p class="mb-2 text-base dark:text-gray-300 text-gray-700">Product description goes here.</p>
          <div class="flex items-center">
            <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">$16.00</p>
            <p class="text-base  font-medium text-gray-500 line-through dark:text-gray-300">$20.00</p>
            <p class="ml-auto text-base font-medium text-green-500">20% off</p>
          </div>
          <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            <button type="button" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900" onclick="redirectToPage()">
                Add to Chart
            </button>
            <script>
                function redirectToPage() {
                    window.location.href = "chart.html";
                }
            </script>
        </p>
        </div>
      </div>
        </div>
      </div>
        
</div>
</body>
</html>