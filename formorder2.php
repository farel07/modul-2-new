<?php 

require 'config.php';
session_start();
// if(!isset($_SESSION['login'])){
//      header('Location: login.php');
//       die;
//  }
if(!isset($_POST['shipping_method'])){
    header('Location: chart.php');
    
}


?>

<!DOCTYPE html>
<html class="border-l" lang="en">
<head>
     <title>Form Pemesanan</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        fieldset label span {
            min-width: 125px;
        }
        fieldset .select::after {
            content: '';
            position: absolute;
            width: 9px;
            height: 5px;
            right: 20px;
            top: 50%;
            margin-top: -2px;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='9' height='5' viewBox='0 0 9 5'><title>Arrow</title><path d='M.552 0H8.45c.58 0 .723.359.324.795L5.228 4.672a.97.97 0 0 1-1.454 0L.228.795C-.174.355-.031 0 .552 0z' fill='%23CFD7DF' fill-rule='evenodd'/></svg>");
            pointer-events: none;
        }
    </style>
</head>
<body>
    <header class="">
        <nav class="flex  bg-gray-50 text-gray-600">
            <div class="w-full xl:px-12 py-6 px-5 flex space-x-12 items-center justify-between">
                <div>
                    <a class="text-2xl font-bold" href="./index.php">
                        <img src="CareSelf.png" alt="CareSelf" srcset="" class="w-1/2">
                    </a>
                </div>
                <!-- <ul class="hidden md:flex mx-auto px-5 font-semibold space-x-12">
                    <li><a class="hover:text-gray-900" href="#">Home</a></li>
                    <li><a class="hover:text-gray-900" href="#">Products</a></li>
                    <li><a class="hover:text-gray-900" href="#">Contact Us</a></li>
                </ul>
                <div class="flex-grow border-2 py-1 px-3 lg:flex justify-between round hidden">
                    <input class="flex-grow text-gray-600 focus:outline-none" type="text" placeholder="Search Product ..." />
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 hover:text-gray-600 transition duration-100 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                </div> -->
                <div class=" xl:flex  text-gray-600 space-x-5">
                   
                    <a class="flex items-center hover:text-gray-900" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute flex ml-4 -mt-5">
                            <span class="h-3 w-3 animate-ping absolute inline-flex rounded-full bg-pink-500 opacity-75"></span>
                            <span class="h-3 w-3 relative inline-flex rounded-full bg-pink-600"></span>
                        </span>
                    </a>

                    <a class="hover:text-gray-900" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                </div>
            </a>
        </nav>
    </header>
    <div class="h-screen grid grid-cols-2">
        <div class="lg:col-span-2 col-span-3 bg-indigo-50 space-y-8 px-12">
            <div class="rounded-md mb-2">
                <form id="payment-form" method="POST" action="checkout.php">
                    <section>
                        <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping & Billing Information</h2>
                        <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Name</span>
                                <input name="name" class="focus:outline-none px-3" placeholder="Your Name" required="">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Email</span>
                                <input name="email" type="" class="focus:outline-none px-3" placeholder="@example.com" required="">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Number</span>
                                <input name="number" class="focus:outline-none px-3" placeholder="Your Number">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Address</span>
                                <input name="adress" class="focus:outline-none px-3" placeholder="City & Adress">
                            </label>
            <div class="rounded-md">
                <section>
                    <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2 mx-4">Payment Information</h2>
                    <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">Method</span>
                            <select id="underline_select" required name="payment_method" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option value="bca">BCA</option>
                                <option value="mandiri">Mandiri</option>
                                <option value="dana">Dana</option>
                                <option value="shopeepay">Shopeepay</option>
                        </select>
                        </label>
                    </fieldset>
                </section>
            </div>
        </div>

        <?php foreach($_POST['qty'] as $q) : ?>
            <input type="hidden" name="qty[]" value="<?= $q ?>">
            <?php endforeach; ?>

            <input type="hidden" name="shipping_method" value="<?= $_POST['shipping_method'] ?>">
        

        <button type="submit" name="submit" class=" submit-button px-4 py-3 rounded-full bg-purple-700 text-white focus:ring focus:outline-none text-xl font-semibold transition-colors">
            Bayar
        </button>
    </form>
        
        </div>
    </div>
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</html>