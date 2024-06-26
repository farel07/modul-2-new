<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
  </head>
  <body>
    <!--Navbar-->
    <!-- component -->
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        />
      </head>

      <body>
        <!-- Navbar -->
       <?php include('navbar.php') ?>
       <!-- End Navbar -->
      </body>
      <!--Navbar Selesai-->
      <!--jumbotron-->
      <!-- component -->
      <div class="w-full">
        <div class="flex bg-white h-screen">
          <div class="flex items-center text-center lg:text-left px-8 md:px-12 w-full" style="background-image: url(Asset/jumbotron-2.jpg); background-size: cover; background-position: center">
            <div>
              <h1 class="py-5 text-5xl font-semibold text-gray-800 md:text-6xl">Care<span class="ml-2 text-purple-700">Self</span></h1>
              <h5 class="py-5 text-2xl font-semibold text-gray-800 md:text-2xl">Lets Care About Our<span class="ml-2 text-purple-700">Hair</span></h5>

              <p class="mt-2 text-sm text-gray-700 md:text-lg">Let's care about your hair like you care about your style.</p>
              <div class="flex space-x-3 justify-center lg:justify-start mt-6"></div>
              <button class="rounded-full bg-purple-700 p-3 text-white" onclick="window.location.href = 'list_produk.php';">Check Now</button>
            </div>
          </div>
          <!-- <div class="hidden lg:block w-full lg:h-screen">
            <div class="h-screen" style="background-image: url(Asset/Violet.jpeg); background-size: cover; background-position: center"></div>
          </div> -->
        </div>
      </div>
      <!--jumbotron Selesai-->

      <!-- about us -->
      <div class="w-full my-0 bg-purple-700 h-screen">
        <h1 class="py-20 text-3xl text-center font-semibold text-white md:text-4xl">About<span class="ml-2 text-white">Us</span></h1>
        <div class="flex">
          <div class="flex m-auto w-full justify-around">
            <div class="w-1/3 h-96 mx-4" style="background-image: url(Asset/about-us.jpg); background-size: cover; background-position: center"></div>
            <div class="w-1/3">
              <!-- <h1 class="text-3xl  font-semibold text-gray-800 md:text-3xl">CareSelf</span></h1> -->
              <p class="mt-2 text-sm text-white md:text-lg">
                Selami dunia perawatan rambut mewah dengan Careself, merek yang mendefinisikan ulang seni memanjakan rambut. Dibuat dengan presisi dan komitmen terhadap kesempurnaan, Careself hair care memberikan Anda pengalaman
                transformatif untuk rambut Anda. Hanyutkan diri Anda dalam perpaduan bahan-bahan alami yang mempesona dan formula canggih yang dirancang untuk menutrisi, menguatkan, dan meningkatkan kilau rambut Anda. Dari aroma menyegarkan
                yang melekat dengan lembut hingga busa yang kaya dan lezat yang memanjakan indera Anda. Creself hair care lebih dari sekadar produk, ini adalah ritual harian untuk perawatan diri dan kepercayaan diri. Rangkullah kilau rambut
                Anda dengan GlowLux, di mana setiap keramas adalah perayaan kecantikan dan vitalitas.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- about us selesai -->

      <!-- Visi Misi -->
      <div class="w-full my-10">
        <h1 class="py-20 text-3xl text-center font-semibold text-gray-800 md:text-4xl">Our Vision<span class="ml-2 text-purple-700">& Mission</span></h1>
        <div class="flex bg-white">
          <div class="flex m-auto w-full justify-around">
            <div class="w-1/3">
              <h1 class="py-20 text-3xl text-center font-semibold text-gray-800 md:text-4xl">Vision</h1>
              <!-- <h1 class="text-3xl  font-semibold text-gray-800 md:text-3xl">CareSelf</span></h1> -->
              <p class="mt-2 text-sm text-gray-700 md:text-lg">
                Menjadi pemimpin dalam industri perawatan rambut dengan memberikan solusi inovatif dan terpercaya untuk semua jenis dan masalah rambut, serta meningkatkan kepercayaan diri dan kesejahteraan pelanggan kami.
              </p>
            </div>
            <div class="w-1/3">
              <!-- <h1 class="text-3xl  font-semibold text-gray-800 md:text-3xl">CareSelf</span></h1> -->
              <h1 class="py-20 text-3xl text-center font-semibold text-gray-800 md:text-4xl">Mission</h1>
                <div class="flex flex-col leading-8">
                <p class="mt-2 text-sm text-gray-700 md:text-lg">1. Memberikan produk perawatan rambut berkualitas tinggi yang mengutamakan kesehatan dan keindahan rambut pelanggan.</p>
                <p class="mt-2 text-sm text-gray-700 md:text-lg">2. Mengembangkan formula inovatif berdasarkan riset ilmiah untuk mengatasi berbagai masalah rambut.</p>
                <p class="mt-2 text-sm text-gray-700 md:text-lg"> 3. Memberikan layanan pelanggan yang unggul melalui pengetahuan dan pemahaman yang mendalam tentang kebutuhan individual setiap pelanggan.</p>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!--  Visi Misi End -->

      <!--promo-->
      <!-- component -->
      <!-- This is an example component -->
      <div class="max-w-1xl mx-4 my-4 py-6 h-screen">
        <div style="height: 100px">
          <h1 class="text-3xl text-center font-semibold text-gray-800 md:text-4xl">CareSelf<span class="ml-2 text-purple-700">Promo</span></h1>
        </div>
        <div id="default-carousel" class="relative m-auto" data-carousel="static" style="max-width: 70%">
          <!-- Carousel wrapper -->
          <div class="overflow-hidden relative rounded-lg  bg-cover" style="height: 500px;">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
              <img src="Asset/promo1.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="..." />
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="Asset/promo2.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="..." />
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="Asset/PROMO.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="..." />
            </div>
          </div>
          <!-- Slider indicators -->
          <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          </div>
          <!-- Slider controls -->
          <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span
              class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-purple-700/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
            >
              <svg class="w-5 h-5 text-pink-700 sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg>
              <span class="hidden">Previous</span>
            </span>
          </button>
          <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span
              class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-purple-700/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
            >
              <svg class="w-5 h-5 text-pink-700 sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
              <span class="hidden">Next</span>
            </span>
          </button>
        </div>
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
      </div>
      <!--promo selesai-->
      <!-- component -->
    </html>
  <!--profil pendiri-->
  <footer>
    <section class="bg-white dark:bg-gray-900">
      <div class="container px-6 py-10 mx-auto">
        <div class="xl:flex xl:items-center xL:-mx-4">
          <div class="xl:w-1/2 xl:mx-4">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Our Team</h1>

            <p class="max-w-2xl mt-4 text-gray-500 dark:text-gray-300">
              Dengan tekad yang kuat untuk memberikan solusi perawatan rambut terbaik kepada pelanggan, tim PT CareSelf menjunjung tinggi integritas, kualitas, dan pelayanan yang luar biasa.
            </p>
          </div>

          <div class="grid grid-cols-1 gap-4 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
            <div>
              <img class="object-cover rounded-xl h-70 w-full" src="Asset/Orang 1.jpg" alt="" />

              <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Rachmad Fadillah</h1>

              <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Full stack developer</p>
            </div>
            <div>
              <img class="object-cover rounded-xl h-70 w-full" src="Asset/Orang 2.jpg" alt="" />

              <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">M. Habibur R.</h1>

              <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Web Programmer</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </footer>
  <!--profil pendiri selesai-->
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</html>
