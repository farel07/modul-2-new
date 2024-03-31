<?php
require 'config.php';
session_start();

// if ( isset($_SESSION["login"]) ){
//   header("Location: dashboard.php");
// }

// if(isset($_POST["submit"])){
  
//   $error_message = '';

//   $username = $_POST['username'];
//   $password = $_POST['password'];

//   $query = "SELECT * FROM account WHERE username = '$username';";
//   $result = mysqli_query($conn, $query);
//   $akun = mysqli_fetch_assoc($result);
  
//   if($akun){

//     if (password_verify($password, $akun['password'])) { 
     
//       $_SESSION['login'] = true;
//       $_SESSION['name'] = $akun['name'];

//       header('Location: dashboard.php');
//       die;
   
//     } 
//   } 

//     $error_message = 'username atau password salah';
  
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login | Careself</title>
</head>
<body>
        
    </body>
    <!-- component -->
<!-- component -->
<div class="min-h-screen bg-emerald-100 flex flex-col justify-center sm:py-12"  style="background-image: url(Asset/login3.jpg); background-size: cover; background-position: center">
    <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
      <h1 class="font-bold text-center text-2xl mb-5"><img src="CareSelf.png" alt="" srcset=""></h1>  
      <div class="bg-purple-700 shadow w-full rounded-lg divide-y divide-purple-700">
        <div class="px-5 py-7">


        <?php if($error_message != '') { ?>

          <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium"><?php echo $error_message; ?></span>
    </div>
  </div>

          <?php } ?>

        <form action="" method="post">
        <label class="font-semibold text-sm text-black pb-1 block">Name</label>
          <input type="text" name="name" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
          <label class="font-semibold text-sm text-black pb-1 block">Email</label>
          <input type="email" name="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />

          <label class="font-semibold text-sm text-black pb-1 block">Username</label>
          <input type="text" name="username" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
          <label class="font-semibold text-sm text-black pb-1 block">Password</label>
          <input type="text" name="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
          <button type="submit" name="submit" class="transition duration-200 bg-blue-300 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-black w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
              <span class="inline-block mr-2">=</span>Create
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
              
          </button>

        </form>

        </div>
        <div class="p-5">
            <div class="grid">
                <button type="text" class="transition duration-200 backdrop-brightness-50 text-blue-300 w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-normal text-center inline-block">Login</text>
            </div>
    </div>
    <div class="py-2">
          <div class="grid grid-cols-2 gap-1">
            <div class="text-center sm:text-left whitespace-nowrap">
              <button class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-neutral-950 hover:bg-gray-200 focus:outline-none focus:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset" onclick="redirectToPage()">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
                  <span class="inline-block ml-1">Back to home</span>
              </button>
              
              <script>
                function redirectToPage() {
                    window.location.href = "index.php";
                }
            </script>
            </div>
          </div>
        </div>
  </div>
<body>