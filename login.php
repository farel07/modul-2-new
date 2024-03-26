<?php
require 'config.php';

if(isset($_POST["submit"])){
  

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM account WHERE username = '$username';";
  $result = mysqli_query($conn, $query);
  $akun = mysqli_fetch_assoc($result);
  
  if(!$akun){
    echo "pass atau usernm salah";
    die;
  }

  echo "ads";
  // verif pass
  if (password_verify($password, $akun['password'])) { 
     
    header('Location: dashboard.html');
    die;
 
  } else { 
 
    echo 'Password kamu salah, silakan coba lagi..'; 
 
  } 

}


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

        <form action="" method="post">

          <label class="font-semibold text-sm text-black pb-1 block">Username</label>
          <input type="text" name="username" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
          <label class="font-semibold text-sm text-black pb-1 block">Password</label>
          <input type="text" name="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
          <button type="submit" name="submit" class="transition duration-200 bg-blue-300 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-black w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
              <span class="inline-block mr-2">=</span>Login
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
              
          </button>

        </form>

        </div>
        <div class="p-5">
            <div class="grid">
                <button type="text" class="transition duration-200 backdrop-brightness-50 text-blue-300 w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-normal text-center inline-block">Welcome to CareSelf</text>
            </div>
            <div style="padding: 20px;">
            <div class="text-center">
                <a class="inline-block right-0 align-baseline font-light text-sm text-500 hover:text-blue-500">
                    Create Your Account!
                </a>
        </div>
          <div class="py-5">
          <div class="grid grid-cols-2 gap-1">
            <div class="text-center sm:text-left whitespace-nowrap">
              <button class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-neutral-950 hover:bg-gray-100 focus:outline-none focus:bg-white focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                  </svg>
                  <span class="inline-block ml-1">Forgot Password</span>
              </button>
            </div>
            <div class="text-center sm:text-right whitespace-nowrap">
              <button class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-neutral-950 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-bottom	">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                  <span class="inline-block ml-1">Help</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="py-2">
          <div class="grid grid-cols-2 gap-1">
            <div class="text-center sm:text-left whitespace-nowrap">
              <button class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-neutral-950 hover:bg-gray-200 focus:outline-none focus:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
                  <span class="inline-block ml-1">Back to home</span>
              </button>
            </div>
          </div>
        </div>
    </div>
  </div>
<body>